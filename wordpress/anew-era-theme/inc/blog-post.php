<?php
/**
 * Shared Blog Post Page Template.
 *
 * Renders the WordPress post single.php is showing. See anew_blog_entry().
 */

// The article being viewed: single.php has already set up the WordPress
// post. anew_blog_entry() returns it in the shape data-blogs.php used.
$blog = anew_blog_entry(get_queried_object());

$page_title        = $blog['title'];
$page_description  = $blog['meta_description'] ?? $blog['excerpt'];
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/header.php';

$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-4 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';

// The post body as edited in WordPress. Until a post has been imported with
// its body, the original includes/posts/{slug}.html file stands in.
$content_html = trim((string) get_post_field('post_content', get_queried_object_id())) !== ''
    ? apply_filters('the_content', get_post_field('post_content', get_queried_object_id()))
    : (is_file(__DIR__ . '/posts/' . $blog['slug'] . '.html') ? file_get_contents(__DIR__ . '/posts/' . $blog['slug'] . '.html') : '');

// Hero image fallback if missing. A media-library URL (the featured image) is
// taken as it is; a theme path has to exist on disk.
$hero_img = $blog['hero_image'] ?: 'assets/img/blog/how-long-does-tms-take-to-work.jpg';
$hero_asset_path = __DIR__ . '/../' . ltrim(strtok($hero_img, '?#'), '/');
if (!preg_match('~^(?:https?:)?//~i', $hero_img) && !file_exists($hero_asset_path)) {
    $hero_img = 'assets/img/blog/how-long-does-tms-take-to-work.jpg';
}
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero / Header ─────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-8 pt-[108px] text-ink sm:px-8 sm:pb-12 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 233 238 241; background-color: #e9eef1">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset($hero_img)) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto max-w-[860px]">
      <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
        <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
          <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
          <li aria-hidden="true" class="opacity-40">/</li>
          <li><a href="blogs.php" class="transition-colors hover:text-brand-blue">Blog</a></li>
          <li aria-hidden="true" class="opacity-40">/</li>
          <li aria-current="page" class="text-brand-blue truncate max-w-[320px] sm:max-w-[480px]"><?= e($blog['title']) ?></li>
        </ol>
      </nav>

      <div class="mb-4 flex flex-wrap items-center gap-3 text-[12px] font-semibold text-ink/60">
        <span class="rounded-full px-3.5 py-1 text-white font-extrabold text-[11px] uppercase tracking-wider" style="background-color: #0f639b; color: #ffffff;"><?= e($blog['category']) ?></span>
        <span aria-hidden="true">&bull;</span>
        <time datetime="<?= e($blog['date_iso']) ?>">Published <?= e($blog['publish_date']) ?></time>
        <span aria-hidden="true">&bull;</span>
        <span><?= e($blog['read_time']) ?></span>
      </div>

      <h1 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[34px] sm:text-[46px] lg:text-[52px]">
        <?= e($blog['title']) ?>
      </h1>

      <?php if (!empty($blog['excerpt'])): ?>
        <p class="m-0 mt-6 text-[16px] sm:text-[18px] leading-[1.75] text-ink/80 max-w-[58ch]">
          <?= e($blog['excerpt']) ?>
        </p>
      <?php endif; ?>
    </div>
  </section>
</div>

<!-- ─── Article Body ─────────────────────────────────────────────────── -->
<article class="<?= $wrap ?> py-12 sm:py-16">
  <div class="mx-auto max-w-[820px]">

    <?php if (!empty($blog['takeaway'])): ?>
      <!-- Direct Answer / Key Takeaway Callout -->
      <div class="mb-10 rounded-[18px] border-l-4 border-brand-blue bg-[#f0f4f7] p-6 sm:p-7 shadow-sm">
        <p class="text-[17px] sm:text-[18px] leading-[1.75] text-ink font-medium m-0">
          <strong class="text-brand-blue font-bold">Key Clinical Insight:</strong> <?= e($blog['takeaway']) ?>
        </p>
      </div>
    <?php endif; ?>

    <!-- Article Content -->
    <div class="blog-article-content">
      <?= $content_html ?>
    </div>

    <!-- Section: CTA -->
    <div class="mt-14 rounded-[20px] bg-white border border-ink/10 p-8 sm:p-10 shadow-sm text-center">
      <p class="<?= $eyebrow ?> justify-center"><?= $dot ?> Compassionate Care</p>
      <h2 class="font-serif font-normal text-[28px] sm:text-[36px] text-ink m-0 mb-4">Have Questions About Mental Health or TMS?</h2>
      <p class="m-0 mb-6 text-[15px] sm:text-[16px] leading-[1.8] text-[#58616a] max-w-[54ch] mx-auto">
        Our clinical team at Anew Era TMS & Psychiatry is here to answer your questions, address your concerns, and tailor an evidence-based care program around your unique needs.
      </p>
      <div class="flex flex-wrap items-center justify-center gap-3">
        <a href="contact.php" class="<?= $btn_blue ?>">Schedule a Consultation</a>
        <a href="<?= e($site['phone_href'] ?? 'tel:8885031549') ?>" class="<?= $btn_line ?>"><?= e($site['phone'] ?? '(888) 503-1549') ?></a>
      </div>
      <p class="m-0 mt-4 text-[13px] text-ink/55">
        Call us at (888) 503-1549 or book an appointment online to get started.
      </p>
    </div>

    <!-- Back to blog link -->
    <div class="mt-10 pt-6 border-t border-ink/10 flex items-center justify-between">
      <a href="blogs.php" class="inline-flex items-center gap-2 text-[14px] font-bold text-brand-blue hover:text-brand-blue-dark">
        &larr; Back to all articles
      </a>
      <a href="#top" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-ink/50 hover:text-ink">
        Back to top &uarr;
      </a>
    </div>

  </div>
</article>

</div>
<?php require __DIR__ . '/footer.php'; ?>
