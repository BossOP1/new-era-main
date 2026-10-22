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

// Pagination settings: 2 pages total
// Requirement: 9 blogs on 1st page and rest on 2nd page
$total_blogs  = count($blogs);
$total_pages  = 2; // Exactly 2 pages as requested
$page1_count  = 9;

$current_page = max(1, min(2, (int) ($_GET['page'] ?? 1)));

if ($current_page === 2) {
    // Rest on 2nd page (the older articles)
    $page_blogs = array_slice($blogs, $page1_count);
} else {
    // 9 blogs on 1st page (the newest articles)
    $page_blogs = array_slice($blogs, 0, $page1_count);
}

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

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>Written and clinically reviewed by Anew Era mental health professionals.</span>
      <span>TMS Therapy <span aria-hidden="true" class="px-2">/</span> Insurance Guides <span aria-hidden="true" class="px-2">/</span> Psychiatry</span>
    </div>
  </section>
</div>

<!-- ─── 3x3 Articles Grid (9 per page) ───────────────────────────────── -->
<div id="articles" class="<?= $wrap ?> <?= $pad ?>">
  <div class="mb-10 sm:mb-14">
    <p class="<?= $eyebrow ?>"><?= $dot ?> Latest Publications</p>
    <div class="flex flex-wrap items-baseline justify-between gap-4">
      <h2 class="<?= $h2 ?>">Articles & Clinical Resources</h2>
      <p class="m-0 text-[13px] font-bold text-ink/50 uppercase tracking-wider">
        Page <?= $current_page ?> of <?= $total_pages ?>
      </p>
    </div>
  </div>

  <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
    <?php foreach ($page_blogs as $post): ?>
      <article class="group flex flex-col overflow-hidden rounded-[22px] bg-white border border-gray-100 shadow-[0_4px_24px_rgba(0,0,0,0.06)] transition-all duration-300 hover:-translate-y-1 hover:shadow-xl">
        <!-- Image with Category Badge -->
        <div class="relative aspect-[16/10] w-full overflow-hidden bg-gray-100">
          <span class="absolute left-4 top-4 z-10 rounded-full px-3.5 py-1 text-[11px] font-extrabold uppercase tracking-wider text-white shadow-md" style="background-color: #0f639b; color: #ffffff;">
            <?= e($post['category']) ?>
          </span>
          <a href="<?= e($post['href']) ?>" class="block h-full w-full">
            <img src="<?= e(asset($post['hero_image'])) ?>"
                 alt="<?= e($post['image_alt']) ?>"
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

  <!-- ─── Scoped Styles for Pagination & Visual Guarantee ──────────── -->
  <style>
    .blog-pagination-wrapper {
      margin-top: 64px !important;
      margin-bottom: 36px !important;
      display: flex !important;
      align-items: center !important;
      justify-content: center !important;
      gap: 10px !important;
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
      font-size: 16px !important;
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

  <!-- ─── Blog Pagination Navigation (2 Pages, Blue Accent) ───────────── -->
  <nav aria-label="Blog pages" class="blog-pagination-wrapper" style="margin-top: 64px !important; margin-bottom: 36px !important; display: flex !important; align-items: center !important; justify-content: center !important; gap: 10px !important; flex-wrap: wrap !important; width: 100% !important;">
    <!-- Prev Button: Disabled on Page 1 -->
    <?php if ($current_page <= 1): ?>
      <span aria-disabled="true" 
            class="blog-page-nav-btn is-disabled" 
            style="background-color: #ffffff !important; color: #cbd5e1 !important; border: 1px solid #edf0f2 !important; height: 44px; padding: 0 18px; border-radius: 12px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; cursor: default; user-select: none; pointer-events: none;">
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
        <span>Prev</span>
      </span>
    <?php else: ?>
      <a href="blogs.php?page=<?= $current_page - 1 ?>#articles" 
         class="blog-page-nav-btn" 
         style="background-color: #ffffff !important; color: #1e293b !important; border: 1px solid #dedae8 !important; height: 44px; padding: 0 18px; border-radius: 12px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; text-decoration: none;">
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m15 18-6-6 6-6"/></svg>
        <span>Prev</span>
      </a>
    <?php endif; ?>

    <!-- Numbered Buttons 1 and 2 -->
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <?php if ($i === $current_page): ?>
        <span aria-current="page" 
              class="blog-page-btn is-active" 
              style="background-color: #0f639b !important; color: #ffffff !important; border: 1px solid #0f639b !important; width: 44px; height: 44px; border-radius: 12px; font-size: 16px; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; box-shadow: 0 4px 14px rgba(15, 99, 155, 0.32); text-decoration: none;">
          <?= $i ?>
        </span>
      <?php else: ?>
        <a href="blogs.php?page=<?= $i ?>#articles" 
           class="blog-page-btn" 
           style="background-color: #ffffff !important; color: #1e293b !important; border: 1px solid #dedae8 !important; width: 44px; height: 44px; border-radius: 12px; font-size: 16px; font-weight: 700; display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">
          <?= $i ?>
        </a>
      <?php endif; ?>
    <?php endfor; ?>

    <!-- Next Button: Disabled on Page 2 -->
    <?php if ($current_page >= $total_pages): ?>
      <span aria-disabled="true" 
            class="blog-page-nav-btn is-disabled" 
            style="background-color: #ffffff !important; color: #cbd5e1 !important; border: 1px solid #edf0f2 !important; height: 44px; padding: 0 18px; border-radius: 12px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; cursor: default; user-select: none; pointer-events: none;">
        <span>Next</span>
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
      </span>
    <?php else: ?>
      <a href="blogs.php?page=<?= $current_page + 1 ?>#articles" 
         class="blog-page-nav-btn" 
         style="background-color: #ffffff !important; color: #1e293b !important; border: 1px solid #dedae8 !important; height: 44px; padding: 0 18px; border-radius: 12px; font-size: 14px; font-weight: 600; display: inline-flex; align-items: center; justify-content: center; gap: 6px; text-decoration: none;">
        <span>Next</span>
        <svg style="width: 14px; height: 14px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
      </a>
    <?php endif; ?>
  </nav>

</div>

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
