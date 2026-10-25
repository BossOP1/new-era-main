const fs = require('fs');
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
      .replace(/&#8230;/g, '…');
  }
};

function cleanContent(html, currentSlug) {
  let cleaned = html;

  // Replace old site links with internal new site links
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/depression\/?/gi, 'depression.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/anxiety\/?/gi, 'anxiety.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/postpartum\/?/gi, 'postpartum.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/ocd\/?/gi, 'ocd.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/ptsd\/?/gi, 'ptsd.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/migraines\/?/gi, 'migraines.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/contact(?:-us)?\/?/gi, 'contact.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/insurance\/?/gi, 'insurance.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/about(?:-us)?\/?/gi, 'about.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/locations\/?/gi, 'index.php#locations');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/what-tms-therapy\/?/gi, 'tms.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/tms-therapy\/?/gi, 'tms.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/reviews\/?/gi, 'reviews.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/meet-the-team\/?/gi, 'team.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/team\/?/gi, 'team.php');
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/blog\/?/gi, 'blogs.php');

  // Any remaining https://aneweratms.com/<slug>/ -> <slug>.php
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/([a-z0-9\-]+)\/?/gi, (match, slug) => {
    return slug + '.php';
  });
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/?/gi, 'index.php');

  // Replace content image sources to local assets
  cleaned = cleaned.replace(/https?:\/\/aneweratms\.com\/wp-content\/uploads\/[^\/]+\/[^\/]+\/([^\s"'>]+)/gi, (match, filename) => {
    return 'assets/img/blog/' + filename;
  });

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

const posts = JSON.parse(fs.readFileSync('all_145_posts.json', 'utf8'));
const sample = posts[0];
console.log('Original Title:', sample.title.rendered);
console.log('Decoded Title:', he.decode(sample.title.rendered));
console.log('\n--- Cleaned Content Sample ---');
console.log(cleanContent(sample.content.rendered, sample.slug).slice(0, 1000));
