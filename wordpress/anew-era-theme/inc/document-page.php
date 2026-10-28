<?php
/**
 * A plain document: the legal pages' hero and measured column, for pages an
 * editor adds in WordPress, archives, search results and the 404.
 *
 * Set before requiring:
 *   $doc_title  string  the h1
 *   $doc_lede   string  plain-text intro under it (may be empty)
 *   $doc_body   string  HTML for the column
 */

$page_title        = $page_title ?? $doc_title;
$page_description  = $page_description ?? ($doc_lede !== '' ? $doc_lede : null);
$header_hero_light = true;
$header_inset      = true;
if ($page_description === null) {
    unset($page_description);
}
require __DIR__ . '/header.php';

$wrap = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-8 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="background-color: #eef1f3">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-aurora opacity-30"></div>

    <div class="mx-auto max-w-[1160px] py-1">
      <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
        <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
          <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
          <li aria-hidden="true" class="opacity-40">/</li>
          <li aria-current="page" class="text-brand-blue"><?= e($doc_title) ?></li>
        </ol>
      </nav>

      <h1 class="m-0 max-w-[20ch] font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[34px] sm:text-[46px] lg:text-[52px]">
        <?= e($doc_title) ?>
      </h1>

      <?php if ($doc_lede !== ''): ?>
        <p class="m-0 mt-5 max-w-[62ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base"><?= e($doc_lede) ?></p>
      <?php endif; ?>
    </div>
  </section>
</div>

<div class="<?= $wrap ?> py-12 sm:py-16">
  <div class="blog-article-content mx-auto max-w-[820px] text-[16px] leading-[1.8] text-[#3d464f] [&_a]:font-bold [&_a]:text-brand-blue [&_a]:underline [&_a]:underline-offset-4 [&_h2]:mt-10 [&_h2]:font-serif [&_h2]:text-[28px] [&_h2]:text-ink [&_li]:mb-2 [&_p]:mb-5 [&_ul]:list-disc [&_ul]:pl-6">
    <?= $doc_body ?>
  </div>
</div>

</div>
<?php require __DIR__ . '/footer.php'; ?>
