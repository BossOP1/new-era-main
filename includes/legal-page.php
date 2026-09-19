<?php
/**
 * Shared legal page — privacy, HIPAA, terms, accessibility.
 *
 * A page file at the root names its document and requires this:
 *
 *   <?php
 *   $legal_key = 'privacy';
 *   require __DIR__ . '/includes/legal-page.php';
 *
 * All copy is in includes/data-legal.php, which carries the warnings about
 * these being unreviewed drafts. Read that before publishing any of them.
 *
 * The layout is deliberately plain: these are documents, so they get a
 * measured column, a contents list that sticks beside them on a wide screen,
 * and nothing that moves.
 */

$legal = require __DIR__ . '/data-legal.php';

if (!isset($legal_key, $legal[$legal_key])) {
    http_response_code(500);
    exit('legal-page.php: unknown legal key.');
}

$doc = $legal[$legal_key];

$page_title        = $doc['title'];
$page_description  = $doc['meta'];
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/header.php';

$wrap = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';

/** A stable anchor for each heading, so a clause can be linked to. */
$slug = static function (string $heading): string {
    return trim(preg_replace('/[^a-z0-9]+/', '-', strtolower(strip_tags($heading))), '-');
};

// The other three documents, for the row at the foot of each one.
$siblings = array_filter(
    $legal,
    static fn (string $k): bool => $k !== $legal_key,
    ARRAY_FILTER_USE_KEY
);
$page_of = static fn (string $k): string => ($k === 'hipaa' ? 'hipaa' : $k) . '.php';
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
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
          <li aria-current="page" class="text-brand-blue">Legal</li>
        </ol>
      </nav>

      <h1 class="m-0 max-w-[20ch] font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[34px] sm:text-[46px] lg:text-[52px]">
        <?= e($doc['title']) ?>
      </h1>

      <p class="m-0 mt-5 max-w-[62ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
        <?= e($doc['lede']) ?>
      </p>

      <p class="m-0 mt-5 text-[12px] font-bold uppercase tracking-[0.14em] text-ink/45">
        Last updated <?= e($doc['updated']) ?>
      </p>
    </div>
  </section>
</div>

<!-- ─── The document ─────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> py-10 sm:py-14 md:py-[76px]">
  <div class="lg:grid lg:grid-cols-[220px_minmax(0,1fr)] lg:gap-14 xl:gap-20">

    <nav aria-label="On this page" class="mb-9 lg:mb-0">
      <div class="lg:sticky lg:top-[104px]">
        <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/45">On this page</p>
        <ol class="m-0 list-none space-y-1 p-0">
          <?php foreach ($doc['sections'] as $i => $section): ?>
            <li>
              <a href="#<?= e($slug($section['heading'])) ?>"
                 class="block rounded-lg px-3 py-2 -mx-3 text-[13px] leading-snug text-ink/60 transition-colors hover:bg-white hover:text-brand-blue">
                <?= e($section['heading']) ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ol>
      </div>
    </nav>

    <article class="max-w-[68ch]">
      <?php if (!empty($doc['notice'])): ?>
        <?php // Required to appear prominently and verbatim. See data-legal.php. ?>
        <p class="m-0 mb-9 rounded-[20px] border-2 border-ink/25 bg-white px-7 py-6 text-[13.5px] font-extrabold uppercase leading-[1.7] tracking-[0.04em] text-ink">
          <?= e($doc['notice']) ?>
        </p>
      <?php endif; ?>

      <?php foreach ($doc['sections'] as $section): ?>
        <section id="<?= e($slug($section['heading'])) ?>" class="mb-10 scroll-mt-[110px] last:mb-0">
          <h2 class="m-0 mb-4 font-serif text-[24px] font-normal leading-[1.2] tracking-[-0.025em] text-ink sm:text-[28px]">
            <?= e($section['heading']) ?>
          </h2>

          <?php foreach ($section['paras'] ?? [] as $para): ?>
            <p class="m-0 mb-4 text-[15px] leading-[1.8] text-[#58616a] last:mb-0"><?= e($para) ?></p>
          <?php endforeach; ?>

          <?php if (!empty($section['terms'])): ?>
            <dl class="m-0 mt-5">
              <?php foreach ($section['terms'] as [$term, $definition]): ?>
                <div class="border-t border-ink/10 py-4 first:border-t-0 first:pt-0">
                  <dt class="m-0 text-[15px] font-extrabold tracking-[-0.01em] text-ink"><?= e($term) ?></dt>
                  <dd class="m-0 mt-1.5 text-[14.5px] leading-[1.75] text-[#58616a]"><?= e($definition) ?></dd>
                </div>
              <?php endforeach; ?>
            </dl>
          <?php endif; ?>

          <?php if (!empty($section['list'])): ?>
            <ul class="m-0 mt-4 list-none p-0">
              <?php foreach ($section['list'] as $line): ?>
                <li class="flex items-start gap-3 py-1.5 text-[15px] leading-[1.75] text-[#58616a]">
                  <span aria-hidden="true" class="mt-[10px] h-1.5 w-1.5 shrink-0 rounded-full bg-brand-blue/45"></span>
                  <span><?= e($line) ?></span>
                </li>
              <?php endforeach; ?>
            </ul>
          <?php endif; ?>

          <?php if (!empty($section['note'])): ?>
            <p class="m-0 mt-5 rounded-[16px] bg-mist px-5 py-4 text-[14px] leading-[1.7] text-ink/75"><?= e($section['note']) ?></p>
          <?php endif; ?>
        </section>
      <?php endforeach; ?>

      <!-- Contact, the same on every one of these documents. -->
      <section id="contact-us-about-this" class="mt-12 scroll-mt-[110px] rounded-[22px] border border-[#e3e7ea] bg-white p-7 sm:p-8">
        <h2 class="m-0 font-serif text-[22px] font-normal leading-[1.2] tracking-[-0.025em] text-ink sm:text-[25px]">Questions about this document</h2>
        <p class="m-0 mt-3 text-[14.5px] leading-[1.75] text-[#58616a]">
          Contact <?= e($legal_contact['practice']) ?>, attention <?= e($legal_contact['officer']) ?>.
        </p>
        <dl class="m-0 mt-4 grid gap-3 sm:grid-cols-3">
          <div>
            <dt class="m-0 text-[11px] font-bold uppercase tracking-[0.14em] text-ink/45">Phone</dt>
            <dd class="m-0 mt-1"><a href="tel:+18668262061" class="text-[14px] font-extrabold text-brand-blue underline underline-offset-4"><?= e($legal_contact['phone']) ?></a></dd>
          </div>
          <div>
            <dt class="m-0 text-[11px] font-bold uppercase tracking-[0.14em] text-ink/45">Email</dt>
            <dd class="m-0 mt-1 break-all text-[14px] font-semibold text-ink/75"><?= e($legal_contact['email']) ?></dd>
          </div>
          <div>
            <dt class="m-0 text-[11px] font-bold uppercase tracking-[0.14em] text-ink/45">Post</dt>
            <dd class="m-0 mt-1 text-[14px] font-semibold text-ink/75"><?= e($legal_contact['post']) ?></dd>
          </div>
        </dl>
        <p class="m-0 mt-5 border-t border-ink/10 pt-4 text-[13px] leading-[1.7] text-ink/60">
          In a crisis, do not use these channels. Call or text
          <a href="tel:988" class="font-extrabold text-brand-blue underline underline-offset-4">988</a> — any time.
        </p>
      </section>

      <!-- The other documents. -->
      <nav aria-label="Other legal documents" class="mt-8">
        <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/45">Also worth reading</p>
        <ul class="m-0 grid list-none gap-2 p-0 sm:grid-cols-3">
          <?php foreach ($siblings as $key => $sibling): ?>
            <li>
              <a href="<?= e($page_of($key)) ?>" class="flex h-full items-center justify-between gap-3 rounded-[16px] border border-[#e3e7ea] bg-white px-5 py-4 text-[14px] font-extrabold text-ink transition-colors hover:border-brand-blue/40 hover:text-brand-blue">
                <?= e($sibling['title']) ?>
                <span class="shrink-0 text-brand-blue"><?= arrow_icon(14) ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </nav>
    </article>
  </div>
</section>

</div>

<?php require __DIR__ . '/footer.php'; ?>
