<?php
/**
 * Anew Era Health — Blog & Mental Health Articles Index.
 */
$page_title        = 'Blog & Articles';
$page_description  = 'Clinical insights, treatment guides, and patient resources on depression, TMS therapy, psychiatric care, and insurance coverage from Anew Era TMS & Psychiatry.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$blogs = require __DIR__ . '/includes/data-blogs.php';

// Pagination settings: 12 articles per page
$per_page     = 12;
$total_blogs  = count($blogs);
$total_pages  = max(1, (int) ceil($total_blogs / $per_page));

$current_page = max(1, min($total_pages, (int) ($_GET['page'] ?? 1)));
$offset       = ($current_page - 1) * $per_page;
$page_blogs   = array_slice($blogs, $offset, $per_page);

// Collect all unique categories
$categories_count = ['All' => $total_blogs];
foreach ($blogs as $b) {
    $cat = $b['category'] ?? 'Mental Health';
    $categories_count[$cat] = ($categories_count[$cat] ?? 0) + 1;
}

$top_categories = ['All', 'TMS Therapy', 'Depression', 'Anxiety', 'OCD', 'Insurance Guide', 'Postpartum', 'Psychiatry'];

$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 233 238 241; background-color: #e9eef1">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/insurance/hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[280px] max-w-[1160px] items-center lg:min-h-[340px]">
      <div class="max-w-[620px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">Blog & Articles</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          Clinical insights.<br>Treatment guides.<br><em class="not-italic text-brand-blue">Clear answers.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[50ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          Evidence-based articles on depression, non-invasive TMS therapy, mental health conditions, and practical guides to navigating your insurance benefits.
        </p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[13px] text-ink/65 sm:mt-8">
      <span>Written and clinically reviewed by Anew Era mental health professionals.</span>
      <span>TMS Therapy <span aria-hidden="true" class="px-2">/</span> Insurance Guides <span aria-hidden="true" class="px-2">/</span> Psychiatry</span>
    </div>
  </section>
</div>

<!-- ─── Articles Explorer ────────────────────────────────────────────── -->
<div id="articles" class="<?= $wrap ?> <?= $pad ?>">
  <div class="mb-8 sm:mb-12">
    <p class="<?= $eyebrow ?>"><?= $dot ?> Latest Publications</p>
    <div class="flex flex-col gap-6 md:flex-row md:items-end md:justify-between">
      <div>
        <h2 class="<?= $h2 ?>">Articles & Clinical Resources</h2>
        <p class="m-0 mt-2 text-[14px] text-ink/60" id="articles-count-info">
          Showing <span id="count-start"><?= $offset + 1 ?></span>–<span id="count-end"><?= min($offset + $per_page, $total_blogs) ?></span> of <span id="count-total"><?= $total_blogs ?></span> articles
        </p>
      </div>

      <!-- Live Search Bar -->
      <div class="relative w-full md:w-80">
        <label for="blog-search" class="sr-only">Search articles</label>
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4 text-ink/40">
          <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        </div>
        <input type="search"
               id="blog-search"
               placeholder="Search articles..."
               class="w-full rounded-full border border-ink/15 bg-white py-3 pl-11 pr-4 text-sm font-medium text-ink shadow-sm transition placeholder:text-ink/40 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20">
      </div>
    </div>

    <!-- Category Filter Tabs -->
    <div class="mt-8 flex flex-wrap items-center gap-2 border-b border-ink/10 pb-4" id="category-tabs" role="tablist" aria-label="Article categories">
      <?php foreach ($top_categories as $cat): ?>
        <?php $count = $categories_count[$cat] ?? 0; ?>
        <?php if ($cat === 'All' || $count > 0): ?>
          <button type="button"
                  data-cat="<?= e($cat) ?>"
                  class="cat-tab-btn inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold transition-all <?= $cat === 'All' ? 'bg-[#0f639b] text-white shadow-sm' : 'bg-white text-ink/70 hover:bg-gray-100 hover:text-ink border border-ink/10' ?>">
            <span><?= e($cat) ?></span>
            <span class="rounded-full px-1.5 py-0.5 text-[10px] <?= $cat === 'All' ? 'bg-white/20 text-white' : 'bg-gray-100 text-ink/60' ?>"><?= $count ?></span>
          </button>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- Articles Grid -->
  <div id="articles-grid" class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($page_blogs as $post): ?>
      <article class="blog-card group flex flex-col overflow-hidden rounded-[22px] bg-white border border-gray-100 shadow-[0_4px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl"
               data-title="<?= e(strtolower($post['title'])) ?>"
               data-category="<?= e($post['category']) ?>"
               data-slug="<?= e($post['slug']) ?>">
        <!-- Image with Category Badge -->
        <div class="relative aspect-[16/10] w-full overflow-hidden bg-gray-100">
          <span class="absolute left-4 top-4 z-10 rounded-full px-3.5 py-1 text-[11px] font-extrabold uppercase tracking-wider text-white shadow-md" style="background-color: #0f639b; color: #ffffff;">
            <?= e($post['category']) ?>
          </span>
          <a href="<?= e($post['href']) ?>" class="block h-full w-full">
            <img src="<?= e(asset($post['hero_image'])) ?>"
                 alt="<?= e($post['image_alt'] ?? $post['title']) ?>"
                 loading="lazy"
                 class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">
          </a>
        </div>

        <!-- Content Area -->
        <div class="flex flex-1 flex-col p-6 sm:p-7">
          <!-- Date and Author with Calendar Icon -->
          <div class="mb-3.5 flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-gray-400">
            <svg class="h-3.5 w-3.5 shrink-0 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
              <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
              <line x1="16" y1="2" x2="16" y2="6"/>
              <line x1="8" y1="2" x2="8" y2="6"/>
              <line x1="3" y1="10" x2="21" y2="10"/>
            </svg>
            <time datetime="<?= e($post['date_iso']) ?>"><?= strtoupper(e($post['publish_date'])) ?></time>
            <span aria-hidden="true">&bull;</span>
            <span><?= strtoupper(e($post['read_time'])) ?></span>
          </div>

          <!-- Article Title -->
          <h3 class="m-0 mb-3 font-sans text-[19px] sm:text-[20px] font-extrabold leading-[1.3] text-[#111827] transition-colors group-hover:text-brand-blue">
            <a href="<?= e($post['href']) ?>">
              <?= e($post['title']) ?>
            </a>
          </h3>

          <!-- Excerpt -->
          <p class="m-0 mb-6 flex-1 text-[14px] leading-[1.65] text-[#6b7280] line-clamp-3">
            <?= e($post['excerpt']) ?>
          </p>

          <!-- Read More Button -->
          <div class="pt-2">
            <a href="<?= e($post['href']) ?>" class="inline-flex items-center gap-1.5 text-[12px] font-extrabold uppercase tracking-wider text-[#0f639b] transition-all hover:text-brand-blue-dark hover:gap-2">
              <span>READ MORE</span>
              <span aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>

  <!-- Empty State (when search returns 0) -->
  <div id="no-articles" class="hidden py-16 text-center">
    <p class="text-lg font-bold text-ink">No articles found</p>
    <p class="text-sm text-ink/60">Try searching with a different keyword or selecting another category.</p>
    <button type="button" id="reset-filter-btn" class="mt-4 rounded-full bg-brand-blue px-6 py-2.5 text-xs font-bold text-white hover:bg-brand-blue-dark">
      Reset Filters
    </button>
  </div>

  <!-- ─── Scoped Styles for Pagination & Visual Guarantee ──────────── -->
  <style>
    .blog-pagination-wrapper {
      margin-top: 64px !important;
      margin-bottom: 36px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 8px !important;
      flex-wrap: wrap !important;
      width: 100% !important;
      padding: 0 16px !important;
      box-sizing: border-box !important;
    }
    .blog-page-btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      width: 44px !important;
      height: 44px !important;
      border-radius: 12px !important;
      border: 1px solid #dedae8 !important;
      background-color: #ffffff !important;
      color: #1e293b !important;
      font-size: 15px !important;
      font-weight: 700 !important;
      text-decoration: none !important;
      transition: all 0.2s ease !important;
      cursor: pointer !important;
      box-sizing: border-box !important;
      line-height: 1 !important;
    }
    .blog-page-btn:hover {
      border-color: #0f639b !important;
      color: #0f639b !important;
      background-color: #f0f7fb !important;
      transform: translateY(-1px) !important;
    }
    .blog-page-btn.is-active {
      background-color: #0f639b !important;
      border-color: #0f639b !important;
      color: #ffffff !important;
      font-weight: 700 !important;
      box-shadow: 0 4px 14px rgba(15, 99, 155, 0.32) !important;
      cursor: default !important;
      transform: none !important;
    }
    .blog-page-dots {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      width: 32px !important;
      height: 44px !important;
      color: #94a3b8 !important;
      font-weight: 700 !important;
      user-select: none !important;
    }
    .blog-page-nav-btn {
      display: inline-flex !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 6px !important;
      height: 44px !important;
      padding: 0 18px !important;
      border-radius: 12px !important;
      border: 1px solid #dedae8 !important;
      background-color: #ffffff !important;
      color: #1e293b !important;
      font-size: 14px !important;
      font-weight: 600 !important;
      text-decoration: none !important;
      transition: all 0.2s ease !important;
      cursor: pointer !important;
      box-sizing: border-box !important;
      line-height: 1 !important;
    }
    .blog-page-nav-btn:hover {
      border-color: #0f639b !important;
      color: #0f639b !important;
      background-color: #f0f7fb !important;
      transform: translateY(-1px) !important;
    }
    .blog-page-nav-btn.is-disabled {
      border-color: #edf0f2 !important;
      background-color: #ffffff !important;
      color: #cbd5e1 !important;
      cursor: default !important;
      pointer-events: none !important;
      box-shadow: none !important;
      transform: none !important;
    }
  </style>

  <!-- ─── Blog Pagination Navigation ─────────────────────────────────── -->
  <nav id="pagination-nav" aria-label="Blog pages" class="blog-pagination-wrapper">
    <!-- Populated dynamically / server-side fallback below -->
    <?php if ($current_page <= 1): ?>
      <span aria-disabled="true" class="blog-page-nav-btn is-disabled">
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        <span>Prev</span>
      </span>
    <?php else: ?>
      <a href="blogs.php?page=<?= $current_page - 1 ?>#articles" class="blog-page-nav-btn" data-page="<?= $current_page - 1 ?>">
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg>
        <span>Prev</span>
      </a>
    <?php endif; ?>

    <div id="pagination-pages-container" class="inline-flex items-center gap-2 flex-wrap justify-center">
      <?php for ($i = 1; $i <= min($total_pages, 5); $i++): ?>
        <?php if ($i === $current_page): ?>
          <span aria-current="page" class="blog-page-btn is-active"><?= $i ?></span>
        <?php else: ?>
          <a href="blogs.php?page=<?= $i ?>#articles" class="blog-page-btn" data-page="<?= $i ?>"><?= $i ?></a>
        <?php endif; ?>
      <?php endfor; ?>
      <?php if ($total_pages > 5): ?>
        <span class="blog-page-dots">&hellip;</span>
        <a href="blogs.php?page=<?= $total_pages ?>#articles" class="blog-page-btn" data-page="<?= $total_pages ?>"><?= $total_pages ?></a>
      <?php endif; ?>
    </div>

    <?php if ($current_page >= $total_pages): ?>
      <span aria-disabled="true" class="blog-page-nav-btn is-disabled">
        <span>Next</span>
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </span>
    <?php else: ?>
      <a href="blogs.php?page=<?= $current_page + 1 ?>#articles" class="blog-page-nav-btn" data-page="<?= $current_page + 1 ?>">
        <span>Next</span>
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg>
      </a>
    <?php endif; ?>
  </nav>

</div>

<!-- Embed Full Blogs Data for Blazing-Fast Client-Side Filtering & Static Hosting -->
<script id="blogs-data" type="application/json">
<?= json_encode($blogs, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT) ?>
</script>

<script>
(function() {
  var dataElem = document.getElementById('blogs-data');
  if (!dataElem) return;
  var allBlogs = JSON.parse(dataElem.textContent || '[]');
  var perPage = 12;
  var currentPage = 1;
  var currentCategory = 'All';
  var searchQuery = '';

  // Check URL query param for page on initial load
  var urlParams = new URLSearchParams(window.location.search);
  var initPage = parseInt(urlParams.get('page'), 10);
  if (!isNaN(initPage) && initPage >= 1) {
    currentPage = initPage;
  }

  var grid = document.getElementById('articles-grid');
  var noArticles = document.getElementById('no-articles');
  var searchInput = document.getElementById('blog-search');
  var catTabs = document.querySelectorAll('.cat-tab-btn');
  var paginationNav = document.getElementById('pagination-nav');
  var countStart = document.getElementById('count-start');
  var countEnd = document.getElementById('count-end');
  var countTotal = document.getElementById('count-total');

  function getFilteredBlogs() {
    return allBlogs.filter(function(post) {
      var matchCat = currentCategory === 'All' || (post.category && post.category.toLowerCase() === currentCategory.toLowerCase());
      var matchSearch = true;
      if (searchQuery) {
        var q = searchQuery.toLowerCase();
        var title = (post.title || '').toLowerCase();
        var excerpt = (post.excerpt || '').toLowerCase();
        var cat = (post.category || '').toLowerCase();
        matchSearch = title.includes(q) || excerpt.includes(q) || cat.includes(q);
      }
      return matchCat && matchSearch;
    });
  }

  function escapeHtml(str) {
    if (!str) return '';
    return String(str)
      .replace(/&/g, '&amp;')
      .replace(/</g, '&lt;')
      .replace(/>/g, '&gt;')
      .replace(/"/g, '&quot;')
      .replace(/'/g, '&#039;');
  }

  function renderGrid(filtered) {
    var total = filtered.length;
    var totalPages = Math.max(1, Math.ceil(total / perPage));
    if (currentPage > totalPages) currentPage = 1;

    var start = (currentPage - 1) * perPage;
    var end = Math.min(start + perPage, total);
    var pageItems = filtered.slice(start, end);

    if (countStart) countStart.textContent = total > 0 ? (start + 1) : 0;
    if (countEnd) countEnd.textContent = end;
    if (countTotal) countTotal.textContent = total;

    if (total === 0) {
      grid.innerHTML = '';
      grid.classList.add('hidden');
      noArticles.classList.remove('hidden');
      paginationNav.style.display = 'none';
      return;
    }

    noArticles.classList.add('hidden');
    grid.classList.remove('hidden');
    paginationNav.style.display = totalPages > 1 ? 'flex' : 'none';

    var html = '';
    var attrHref = 'href';
    var attrSrc = 'src';
    pageItems.forEach(function(post) {
      var hero = post.hero_image || 'assets/img/blog/how-long-does-tms-take-to-work.jpg';
      var cat = post.category || 'TMS Therapy';
      var pubDate = (post.publish_date || '').toUpperCase();
      var readTime = (post.read_time || '7 MIN READ').toUpperCase();
      var title = post.title || '';
      var href = post.href || '#';
      var excerpt = post.excerpt || '';
      var alt = post.image_alt || title;

      html += '<article class="blog-card group flex flex-col overflow-hidden rounded-[22px] bg-white border border-gray-100 shadow-[0_4px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">';
      html += '  <div class="relative aspect-[16/10] w-full overflow-hidden bg-gray-100">';
      html += '    <span class="absolute left-4 top-4 z-10 rounded-full px-3.5 py-1 text-[11px] font-extrabold uppercase tracking-wider text-white shadow-md" style="background-color: #0f639b; color: #ffffff;">' + escapeHtml(cat) + '</span>';
      html += '    <a ' + attrHref + '="' + escapeHtml(href) + '" class="block h-full w-full">';
      html += '      <img ' + attrSrc + '="' + escapeHtml(hero) + '" alt="' + escapeHtml(alt) + '" loading="lazy" class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-105">';
      html += '    </a>';
      html += '  </div>';
      html += '  <div class="flex flex-1 flex-col p-6 sm:p-7">';
      html += '    <div class="mb-3.5 flex items-center gap-2 text-[11px] font-bold uppercase tracking-wider text-gray-400">';
      html += '      <svg class="h-3.5 w-3.5 shrink-0 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>';
      html += '      <time datetime="' + escapeHtml(post.date_iso || '') + '">' + escapeHtml(pubDate) + '</time>';
      html += '      <span aria-hidden="true">&bull;</span>';
      html += '      <span>' + escapeHtml(readTime) + '</span>';
      html += '    </div>';
      html += '    <h3 class="m-0 mb-3 font-sans text-[19px] sm:text-[20px] font-extrabold leading-[1.3] text-[#111827] transition-colors group-hover:text-brand-blue">';
      html += '      <a ' + attrHref + '="' + escapeHtml(href) + '">' + escapeHtml(title) + '</a>';
      html += '    </h3>';
      html += '    <p class="m-0 mb-6 flex-1 text-[14px] leading-[1.65] text-[#6b7280] line-clamp-3">' + escapeHtml(excerpt) + '</p>';
      html += '    <div class="pt-2">';
      html += '      <a ' + attrHref + '="' + escapeHtml(href) + '" class="inline-flex items-center gap-1.5 text-[12px] font-extrabold uppercase tracking-wider text-[#0f639b] transition-all hover:text-brand-blue-dark hover:gap-2">';
      html += '        <span>READ MORE</span>';
      html += '        <span aria-hidden="true">&rarr;</span>';
      html += '      </a>';
      html += '    </div>';
      html += '  </div>';
      html += '</article>';
    });

    grid.innerHTML = html;
    renderPagination(totalPages);
  }

  function renderPagination(totalPages) {
    if (totalPages <= 1) {
      paginationNav.style.display = 'none';
      return;
    }
    paginationNav.style.display = 'flex';

    var navHtml = '';

    // Prev button
    if (currentPage <= 1) {
      navHtml += '<span aria-disabled="true" class="blog-page-nav-btn is-disabled"><svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg><span>Prev</span></span>';
    } else {
      navHtml += '<button type="button" class="blog-page-nav-btn" data-page="' + (currentPage - 1) + '"><svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m15 18-6-6 6-6"/></svg><span>Prev</span></button>';
    }

    navHtml += '<div class="inline-flex items-center gap-2 flex-wrap justify-center">';

    // Windowed page numbers
    var pages = [];
    if (totalPages <= 7) {
      for (var i = 1; i <= totalPages; i++) pages.push(i);
    } else {
      pages.push(1);
      if (currentPage > 3) pages.push('...');
      var startPage = Math.max(2, currentPage - 1);
      var endPage = Math.min(totalPages - 1, currentPage + 1);
      for (var j = startPage; j <= endPage; j++) {
        if (!pages.includes(j)) pages.push(j);
      }
      if (currentPage < totalPages - 2) pages.push('...');
      if (!pages.includes(totalPages)) pages.push(totalPages);
    }

    pages.forEach(function(p) {
      if (p === '...') {
        navHtml += '<span class="blog-page-dots">&hellip;</span>';
      } else if (p === currentPage) {
        navHtml += '<span aria-current="page" class="blog-page-btn is-active">' + p + '</span>';
      } else {
        navHtml += '<button type="button" class="blog-page-btn" data-page="' + p + '">' + p + '</button>';
      }
    });

    navHtml += '</div>';

    // Next button
    if (currentPage >= totalPages) {
      navHtml += '<span aria-disabled="true" class="blog-page-nav-btn is-disabled"><span>Next</span><svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg></span>';
    } else {
      navHtml += '<button type="button" class="blog-page-nav-btn" data-page="' + (currentPage + 1) + '"><span>Next</span><svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="m9 18 6-6-6-6"/></svg></button>';
    }

    paginationNav.innerHTML = navHtml;
  }

  // Event Delegation for pagination buttons
  paginationNav.addEventListener('click', function(e) {
    var btn = e.target.closest('[data-page]');
    if (!btn) return;
    var targetPage = parseInt(btn.getAttribute('data-page'), 10);
    if (!isNaN(targetPage) && targetPage !== currentPage) {
      currentPage = targetPage;
      renderGrid(getFilteredBlogs());
      var articlesElem = document.getElementById('articles');
      if (articlesElem) {
        articlesElem.scrollIntoView({ behavior: 'smooth' });
      }
      if (history.pushState) {
        var newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?page=' + currentPage + '#articles';
        window.history.pushState({ path: newurl }, '', newurl);
      }
    }
  });

  // Category filter clicks
  catTabs.forEach(function(tab) {
    tab.addEventListener('click', function() {
      var cat = this.getAttribute('data-cat');
      currentCategory = cat;
      currentPage = 1;

      catTabs.forEach(function(t) {
        var countBadge = t.querySelector('span:last-child');
        if (t.getAttribute('data-cat') === cat) {
          t.className = 'cat-tab-btn inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold transition-all bg-[#0f639b] text-white shadow-sm';
          if (countBadge) countBadge.className = 'rounded-full px-1.5 py-0.5 text-[10px] bg-white/20 text-white';
        } else {
          t.className = 'cat-tab-btn inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold transition-all bg-white text-ink/70 hover:bg-gray-100 hover:text-ink border border-ink/10';
          if (countBadge) countBadge.className = 'rounded-full px-1.5 py-0.5 text-[10px] bg-gray-100 text-ink/60';
        }
      });

      renderGrid(getFilteredBlogs());
    });
  });

  // Search input with debounce
  var searchTimeout;
  if (searchInput) {
    searchInput.addEventListener('input', function() {
      clearTimeout(searchTimeout);
      var val = this.value.trim();
      searchTimeout = setTimeout(function() {
        searchQuery = val;
        currentPage = 1;
        renderGrid(getFilteredBlogs());
      }, 250);
    });
  }

  // Reset filter button
  var resetBtn = document.getElementById('reset-filter-btn');
  if (resetBtn) {
    resetBtn.addEventListener('click', function() {
      searchQuery = '';
      if (searchInput) searchInput.value = '';
      currentCategory = 'All';
      currentPage = 1;
      catTabs.forEach(function(t) {
        var countBadge = t.querySelector('span:last-child');
        if (t.getAttribute('data-cat') === 'All') {
          t.className = 'cat-tab-btn inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold transition-all bg-[#0f639b] text-white shadow-sm';
          if (countBadge) countBadge.className = 'rounded-full px-1.5 py-0.5 text-[10px] bg-white/20 text-white';
        } else {
          t.className = 'cat-tab-btn inline-flex items-center gap-1.5 rounded-full px-4 py-2 text-xs font-bold transition-all bg-white text-ink/70 hover:bg-gray-100 hover:text-ink border border-ink/10';
          if (countBadge) countBadge.className = 'rounded-full px-1.5 py-0.5 text-[10px] bg-gray-100 text-ink/60';
        }
      });
      renderGrid(getFilteredBlogs());
    });
  }

  // Initial client-side render check if page > 1 was requested
  if (currentPage > 1) {
    renderGrid(getFilteredBlogs());
  }
})();
</script>

<!-- ─── Consultation Banner ─────────────────────────────────────────── -->
<div class="bg-white py-14 sm:py-20 border-t border-ink/10">
  <div class="<?= $wrap ?> flex flex-col items-center text-center">
    <p class="<?= $eyebrow ?> justify-center"><?= $dot ?> Verify Your Coverage</p>
    <h2 class="m-0 mb-5 font-serif font-normal text-[32px] sm:text-[44px] text-ink">Have questions about your insurance?</h2>
    <p class="m-0 mb-8 max-w-[56ch] text-[15px] sm:text-base leading-[1.8] text-[#58616a]">
      Our intake specialists verify your benefits directly with TRICARE or your commercial insurer before your first visit, giving you clear information on coverage and costs.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="contact.php" class="<?= $btn_blue ?>">Book a Free Benefits Check</a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
    </div>
  </div>
</div>

</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
