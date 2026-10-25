const fs = require('fs');
const path = require('path');

const he = {
  decode: (str) => {
    if (!str) return '';
    return str
      .replace(/&#8217;/g, "’")
      .replace(/&#8216;/g, "‘")
      .replace(/&#8220;/g, "“")
      .replace(/&#8221;/g, "”")
      .replace(/&#8211;/g, "–")
      .replace(/&#8212;/g, "—")
      .replace(/&#038;/g, "&")
      .replace(/&amp;/g, "&")
      .replace(/&quot;/g, '"')
      .replace(/&#039;/g, "'")
      .replace(/&nbsp;/g, ' ')
      .replace(/&#8230;/g, '…')
      .replace(/&lt;/g, '<')
      .replace(/&gt;/g, '>');
  }
};

const MONTHS = [
  'January', 'February', 'March', 'April', 'May', 'June',
  'July', 'August', 'September', 'October', 'November', 'December'
];

function formatDate(isoDateStr) {
  const d = new Date(isoDateStr);
  if (isNaN(d.getTime())) return { display: isoDateStr, iso: isoDateStr };
  const month = MONTHS[d.getUTCMonth()];
  const day = d.getUTCDate();
  const year = d.getUTCFullYear();
  const iso = `${year}-${String(d.getUTCMonth() + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
  return {
    display: `${month} ${day}, ${year}`,
    iso
  };
}

function calculateReadTime(text) {
  const words = text.replace(/<[^>]+>/g, ' ').trim().split(/\s+/).filter(Boolean).length;
  const minutes = Math.max(4, Math.ceil(words / 200));
  return `${minutes} min read`;
}

function mapCategory(wpCategories) {
  if (!wpCategories || wpCategories.length === 0) return 'TMS Therapy';
  
  const priority = [
    'Postpartum',
    'OCD',
    'Anxiety',
    'Depression',
    'TMS',
    'Insurance',
    'Health Insurance',
    'Psychiatry',
    'Therapy',
    'PTSD',
    'Mental Health'
  ];

  for (const cat of priority) {
    if (wpCategories.includes(cat)) {
      if (cat === 'TMS') return 'TMS Therapy';
      if (cat === 'Health Insurance' || cat === 'Insurance') return 'Insurance Guide';
      return cat;
    }
  }

  const first = wpCategories[0];
  if (first === 'TMS') return 'TMS Therapy';
  if (first === 'Health Insurance' || first === 'Insurance') return 'Insurance Guide';
  return first;
}

function cleanContent(html, currentSlug) {
  let cleaned = html;

  // 1. Replace content image sources to local assets FIRST before domain replacement
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/wp-content\/uploads\/[^\/]+\/[^\/]+\/([^\s"'>]+)/gi, (match, filename) => {
    return 'assets/img/blog/' + filename;
  });

  // 2. Specific primary pages with strict word/slash boundaries
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/depression\/?(?=["'#\s]|$)/gi, 'depression.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/anxiety\/?(?=["'#\s]|$)/gi, 'anxiety.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/postpartum\/?(?=["'#\s]|$)/gi, 'postpartum.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/ocd\/?(?=["'#\s]|$)/gi, 'ocd.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/ptsd\/?(?=["'#\s]|$)/gi, 'ptsd.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/migraines\/?(?=["'#\s]|$)/gi, 'migraines.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/contact(?:-us)?\/?(?=["'#\s]|$)/gi, 'contact.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/insurance\/?(?=["'#\s]|$)/gi, 'insurance.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/about(?:-us)?\/?(?=["'#\s]|$)/gi, 'about.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/locations\/?(?=["'#\s]|$)/gi, 'index.php#locations');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/what-tms-therapy\/?(?=["'#\s]|$)/gi, 'tms.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/tms-therapy\/?(?=["'#\s]|$)/gi, 'tms.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/tms-postpartum-depression\/?(?=["'#\s]|$)/gi, 'postpartum.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/reviews\/?(?=["'#\s]|$)/gi, 'reviews.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/meet-the-team\/?(?=["'#\s]|$)/gi, 'team.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/team\/?(?=["'#\s]|$)/gi, 'team.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/blog\/?(?=["'#\s]|$)/gi, 'blogs.php');

  // 3. Any specific blog slug pointing to old domain
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/([a-z0-9\-]+)\/?(?=["'#\s]|$)/gi, (match, slug) => {
    return slug + '.php';
  });

  // 4. Base domain fallback
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/?(?=["'#\s]|$)/gi, 'index.php');

  // Convert h1 inside body to h2
  cleaned = cleaned.replace(/<h1(\s[^>]*)?>([\s\S]*?)<\/h1>/gi, '<h2$1>$2</h2>');

  // Strip arbitrary inline styles
  cleaned = cleaned.replace(/\s+style="[^"]*"/gi, '');

  // Strip empty paragraphs
  cleaned = cleaned.replace(/<p>\s*(?:&nbsp;)?\s*<\/p>/gi, '');

  // Add Tailwind styling classes to tags
  cleaned = cleaned.replace(/<h2(\s[^>]*)?>/gi, '<h2 class="font-serif font-normal leading-[1.18] tracking-[-0.03em] text-ink text-[28px] sm:text-[34px] lg:text-[38px] mt-12 mb-5">');
  cleaned = cleaned.replace(/<h3(\s[^>]*)?>/gi, '<h3 class="font-sans font-bold text-ink text-[19px] sm:text-[21px] mt-8 mb-3 text-ink/90">');
  cleaned = cleaned.replace(/<h4(\s[^>]*)?>/gi, '<h4 class="font-sans font-bold text-ink text-[17px] sm:text-[18px] mt-6 mb-2 text-ink/90">');
  cleaned = cleaned.replace(/<p(\s[^>]*)?>/gi, '<p class="text-[16px] sm:text-[17px] leading-[1.8] text-[#3d464f] mb-6">');
  cleaned = cleaned.replace(/<ul(\s[^>]*)?>/gi, '<ul class="mb-6 space-y-3 list-disc pl-6 text-[16px] sm:text-[17px] leading-[1.8] text-[#3d464f]">');
  cleaned = cleaned.replace(/<ol(\s[^>]*)?>/gi, '<ol class="mb-6 space-y-3 list-decimal pl-6 text-[16px] sm:text-[17px] leading-[1.8] text-[#3d464f]">');
  cleaned = cleaned.replace(/<blockquote(\s[^>]*)?>/gi, '<blockquote class="my-8 rounded-[16px] border-l-4 border-brand-blue bg-[#f7f9fa] p-6 italic text-[#333d47] text-[17px] leading-[1.7] shadow-sm">');
  cleaned = cleaned.replace(/<a\s+href=/gi, '<a class="font-semibold text-brand-blue underline decoration-brand-blue/40 underline-offset-4 transition-colors hover:text-brand-blue-dark hover:decoration-brand-blue" href=');
  cleaned = cleaned.replace(/<img(\s[^>]*)?>/gi, (match) => {
    if (!match.includes('class=')) {
      return match.replace('<img', '<img class="my-8 w-full rounded-[16px] object-cover shadow-md" loading="lazy"');
    }
    return match;
  });

  return cleaned.trim();
}

function findLocalHeroImage(slug) {
  const exts = ['.webp', '.jpg', '.jpeg', '.png'];
  for (const ext of exts) {
    const filename = `${slug}${ext}`;
    const p = path.join(__dirname, '..', 'assets', 'img', 'blog', filename);
    if (fs.existsSync(p)) {
      return `assets/img/blog/${filename}`;
    }
  }

  // Fallbacks for known posts
  if (slug === 'depression-this-holiday-season-2' && fs.existsSync(path.join(__dirname, '..', 'assets', 'img', 'blog', 'holiday-depression.jpg'))) {
    return 'assets/img/blog/holiday-depression.jpg';
  }
  if (slug === 'anew-era-brings-tms-therapy-to-dallas-tx' && fs.existsSync(path.join(__dirname, '..', 'assets', 'img', 'blog', 'Breanna_016-1-214x300.jpg'))) {
    return 'assets/img/blog/Breanna_016-1-214x300.jpg';
  }

  return 'assets/img/blog/how-long-does-tms-take-to-work.jpg';
}

function escapePhpString(str) {
  if (!str) return "''";
  return "'" + str.replace(/\\/g, '\\\\').replace(/'/g, "\\'") + "'";
}

async function runMigration() {
  const postsRaw = JSON.parse(fs.readFileSync('all_145_posts.json', 'utf8'));
  console.log(`Loaded ${postsRaw.length} posts from all_145_posts.json`);

  const postsDir = path.join(__dirname, '..', 'includes', 'posts');
  if (!fs.existsSync(postsDir)) {
    fs.mkdirSync(postsDir, { recursive: true });
  }

  const dataBlogsRaw = fs.readFileSync(path.join(__dirname, '..', 'includes', 'data-blogs.php'), 'utf8');
  const existingMatches = [...dataBlogsRaw.matchAll(/'slug'\s*=>\s*'([^']+)'[\s\S]*?'href'\s*=>\s*'([^']+)'[\s\S]*?'title'\s*=>\s*'([^']+)'[\s\S]*?'meta_title'\s*=>\s*'([^']+)'[\s\S]*?'meta_description'\s*=>\s*'([^']+)'[\s\S]*?'publish_date'\s*=>\s*'([^']+)'[\s\S]*?'date_iso'\s*=>\s*'([^']+)'[\s\S]*?'category'\s*=>\s*'([^']+)'[\s\S]*?'read_time'\s*=>\s*'([^']+)'[\s\S]*?'hero_image'\s*=>\s*'([^']+)'[\s\S]*?'image_alt'\s*=>\s*'([^']+)'[\s\S]*?'excerpt'\s*=>\s*'([^']+)'/g)];
  
  const existingDataBlogs = existingMatches.map(m => ({
    slug: m[1],
    href: m[2],
    title: m[3],
    meta_title: m[4],
    meta_description: m[5],
    publish_date: m[6],
    date_iso: m[7],
    category: m[8],
    read_time: m[9],
    hero_image: m[10],
    image_alt: m[11],
    excerpt: m[12],
    author: 'Anew Era Clinical Team'
  }));
  console.log(`Existing data-blogs has ${existingDataBlogs.length} entries`);

  const processedSlugs = new Set();
  const allBlogsList = [];

  // Existing custom standalone files in root that already have hand-crafted layouts
  const handCraftedFiles = new Set([
    'how-to-prevent-postpartum-depression.php',
    'how-long-do-migraines-last.php',
    'can-tms-cause-anxiety.php',
    'how-long-can-postpartum-anxiety-last.php',
    'does-ocd-get-worse-with-age.php',
    'who-is-eligible-for-tms-therapy.php',
    'is-tms-therapy-legitimate.php',
    'is-adhd-a-disability.php',
    'cost-of-tms-therapy-without-insurance.php',
    'does-tricare-cover-tms-therapy.php',
    'how-long-does-tms-take-to-work.php'
  ]);

  // First process the 145 posts from aneweratms.com
  for (const post of postsRaw) {
    const slug = post.slug;
    processedSlugs.add(slug);

    const title = he.decode(post.title.rendered).trim();
    const dateInfo = formatDate(post.date);
    const readTime = calculateReadTime(post.content.rendered);
    const categories = post._embedded?.['wp:term']?.[0]?.map(t => t.name) || [];
    const category = mapCategory(categories);
    const heroImage = findLocalHeroImage(slug);
    const altText = post._embedded?.['wp:featuredmedia']?.[0]?.alt_text || `Anew Era TMS & Psychiatry - ${title}`;
    
    // Excerpt: clean html and entities
    let excerpt = he.decode(post.excerpt.rendered.replace(/<[^>]+>/g, ' ')).replace(/\s+/g, ' ').trim();
    if (excerpt.length > 200) {
      excerpt = excerpt.slice(0, 197).trim() + '...';
    }

    // Yoast SEO metadata
    let metaTitle = post.yoast_head_json?.title ? he.decode(post.yoast_head_json.title).trim() : `${title} | Anew Era TMS & Psychiatry`;
    let metaDescription = post.yoast_head_json?.description ? he.decode(post.yoast_head_json.description).trim() : excerpt;
    let takeaway = post.yoast_head_json?.description ? he.decode(post.yoast_head_json.description).trim() : excerpt;

    // Save cleaned content HTML to includes/posts/<slug>.html
    const cleanedHtml = cleanContent(post.content.rendered, slug);
    const postHtmlPath = path.join(postsDir, `${slug}.html`);
    fs.writeFileSync(postHtmlPath, cleanedHtml, 'utf8');

    // Create root page file if not already a hand-crafted file
    const rootPageFile = path.join(__dirname, '..', `${slug}.php`);
    if (!fs.existsSync(rootPageFile) || !handCraftedFiles.has(`${slug}.php`)) {
      const phpCode = `<?php
/**
 * Anew Era TMS & Psychiatry — Blog Post
 * Title: ${title.replace(/\*\//g, '* /')}
 * Original Date: ${dateInfo.display}
 */
$blog_slug = '${slug}';
require __DIR__ . '/includes/blog-post.php';
`;
      fs.writeFileSync(rootPageFile, phpCode, 'utf8');
    }

    allBlogsList.push({
      slug,
      href: `${slug}.php`,
      title,
      meta_title: metaTitle,
      meta_description: metaDescription,
      publish_date: dateInfo.display,
      date_iso: dateInfo.iso,
      category,
      read_time: readTime,
      hero_image: heroImage,
      image_alt: altText,
      excerpt,
      takeaway,
      author: 'Anew Era Clinical Team',
      date_raw: new Date(post.date).getTime()
    });
  }

  // Also include any newly created blogs that were in existing data-blogs.php (like how-to-prevent-postpartum-depression)
  for (const b of existingDataBlogs) {
    if (!processedSlugs.has(b.slug)) {
      processedSlugs.add(b.slug);
      allBlogsList.push({
        ...b,
        takeaway: b.meta_description || b.excerpt,
        date_raw: new Date(b.date_iso).getTime()
      });
    }
  }

  // Sort all blogs by date (newest first)
  allBlogsList.sort((a, b) => b.date_raw - a.date_raw);

  console.log(`Total blogs in final index: ${allBlogsList.length}`);

  // Write includes/data-blogs.php
  let phpOutput = `<?php
/**
 * Anew Era Health — Published blogs and articles index (${allBlogsList.length} articles).
 * Auto-generated with exact publication dates, hero image assets, and metadata.
 */

return [\n`;

  for (const b of allBlogsList) {
    phpOutput += `    [\n`;
    phpOutput += `        'slug'             => ${escapePhpString(b.slug)},\n`;
    phpOutput += `        'href'             => ${escapePhpString(b.href)},\n`;
    phpOutput += `        'title'            => ${escapePhpString(b.title)},\n`;
    phpOutput += `        'meta_title'       => ${escapePhpString(b.meta_title)},\n`;
    phpOutput += `        'meta_description' => ${escapePhpString(b.meta_description)},\n`;
    phpOutput += `        'publish_date'     => ${escapePhpString(b.publish_date)},\n`;
    phpOutput += `        'date_iso'         => ${escapePhpString(b.date_iso)},\n`;
    phpOutput += `        'category'         => ${escapePhpString(b.category)},\n`;
    phpOutput += `        'read_time'        => ${escapePhpString(b.read_time)},\n`;
    phpOutput += `        'hero_image'       => ${escapePhpString(b.hero_image)},\n`;
    phpOutput += `        'image_alt'        => ${escapePhpString(b.image_alt)},\n`;
    phpOutput += `        'excerpt'          => ${escapePhpString(b.excerpt)},\n`;
    phpOutput += `        'takeaway'         => ${escapePhpString(b.takeaway)},\n`;
    phpOutput += `        'author'           => ${escapePhpString(b.author)},\n`;
    phpOutput += `    ],\n`;
  }

  phpOutput += `];\n`;

  const dataBlogsPath = path.join(__dirname, '..', 'includes', 'data-blogs.php');
  fs.writeFileSync(dataBlogsPath, phpOutput, 'utf8');
  console.log(`Saved updated data-blogs.php with ${allBlogsList.length} articles!`);
}

runMigration().catch(err => {
  console.error('Migration failed:', err);
  process.exit(1);
});
