<?php
/**
 * Shared treatment page.
 *
 *   <?php
 *   $treatment_key = 'psychiatry';
 *   require __DIR__ . '/includes/treatment-page.php';
 *
 * Copy lives in includes/data-treatments.php. The structure follows tms.php:
 * hero, what it is beside a photograph, a one-line band, optional cards, a
 * numbered walk-through beside a photograph, an optional conditions grid, a
 * photo panel paired with a plain "honest answers" panel, FAQs, the other
 * treatments, and the booking panel. tms.php is not built from this — it has
 * its videos, the mechanism and the coverage strip — so changes here do not
 * touch it.
 */

$treatments_content = require __DIR__ . '/data-treatments.php';

if (!isset($treatment_key, $treatments_content[$treatment_key])) {
    http_response_code(500);
    exit('treatment-page.php: unknown treatment key.');
}

$t = $treatments_content[$treatment_key];

$page_title        = $t['title'];
$page_description  = $t['meta'];
$header_hero_light = true;
$header_inset      = true;   // the bar sits inside the gutter-framed hero

require __DIR__ . '/header.php';

$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$lede     = 'm-0 text-[15px] leading-[1.7] text-[#58616a] sm:text-base sm:leading-[1.85]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';
$anchor   = 'scroll-mt-[148px] sm:scroll-mt-[164px]';
$em       = 'italic font-normal text-brand-blue';

/**
 * A headline broken where the data breaks it, with one line picked out in
 * blue. An accent that matches no line fails the build rather than quietly
 * rendering a headline with no accent — the same guard as the condition pages.
 */
$headline = static function (array $lines, string $accent, string $em_class): string {
    if (!in_array($accent, $lines, true)) {
        fwrite(STDERR, sprintf(
            "treatment-page.php: accent %s matches no line in [%s]\n",
            var_export($accent, true),
            implode(' | ', $lines)
        ));
        exit(1);
    }

    $out = [];
    foreach ($lines as $line) {
        $out[] = $line === $accent
            ? sprintf('<em class="%s">%s</em>', $em_class, e($line))
            : e($line);
    }
    return implode('<br>', $out);
};

// Column counts spelled out in full, so Tailwind sees every class it needs.
$option_cols = [
    2 => 'sm:grid-cols-2',
    3 => 'sm:grid-cols-2 lg:grid-cols-3',
    4 => 'sm:grid-cols-2 lg:grid-cols-4',
    5 => 'sm:grid-cols-2 lg:grid-cols-3',
    6 => 'sm:grid-cols-2 lg:grid-cols-3',
];

$rail = ['#what' => 'What it is'];
if ($t['options']) {
    $rail['#options'] = $t['options']['rail'];
}
$rail['#process'] = $t['process']['rail'];
if ($t['treats']) {
    $rail['#treats'] = 'What it treats';
}
$rail['#faq'] = 'FAQs';

// Everything on $data['treatments'] except this page, for the closing row.
$others = array_values(array_filter(
    $data['treatments'],
    static fn (array $row): bool => ($row['page'] ?? '') !== $t['page']
));
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: <?= e($t['hero']['wash']) ?>; background-color: <?= e($t['hero']['panel']) ?>">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/' . $t['hero']['image'])) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[360px]">
      <div class="max-w-[560px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="treatments.php" class="transition-colors hover:text-brand-blue">Treatments</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue"><?= e($t['name']) ?></li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          <?= $headline($t['hero']['lines'], $t['hero']['accent'], 'not-italic text-brand-blue') ?>
        </h1>

        <p class="m-0 mt-5 max-w-[46ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base"><?= e($t['hero']['lede']) ?></p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#book" class="<?= $btn_blue ?>"><?= e($t['hero']['cta']) ?> <?= arrow_icon(16) ?></a>
          <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-ink/65 sm:mt-6"><?= e($t['hero']['note']) ?></p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span><?= e($t['hero']['meta_left']) ?></span>
      <span><?= e($t['hero']['meta_right']) ?></span>
    </div>
  </section>
</div>

<!-- ─── Section rail ─────────────────────────────────────────────────── -->
<nav aria-label="On this page" class="sticky top-[98px] z-30 border-b border-ink/10 bg-[#faf8f3]/92 backdrop-blur-md sm:top-[114px]">
  <div class="<?= $wrap ?> flex items-center gap-1 overflow-x-auto py-2.5 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
    <?php foreach ($rail as $href => $label): ?>
      <a href="<?= e($href) ?>" class="whitespace-nowrap rounded-full px-3.5 py-2 text-[13px] font-bold text-ink/65 transition-colors hover:bg-white hover:text-brand-blue"><?= e($label) ?></a>
    <?php endforeach; ?>
  </div>
</nav>

<!-- ─── 01 · What it is ──────────────────────────────────────────────── -->
<section id="what" class="<?= $wrap ?> <?= $pad ?> <?= $anchor ?> grid items-start gap-7 sm:gap-[34px] md:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)] md:gap-[45px] lg:gap-[70px]">
  <div>
    <p class="<?= $eyebrow ?>"><?= $dot ?> 01 / What it is</p>
    <h2 class="<?= $h2 ?>"><?= $headline($t['what']['lines'], $t['what']['accent'], $em) ?></h2>

    <div class="mt-5 space-y-3.5 sm:mt-6 sm:space-y-4 md:mt-7">
      <p class="m-0 font-serif text-[19px] leading-[1.45] text-[#24333c] sm:text-[20px] sm:leading-[1.5] md:text-[22px]"><?= e($t['what']['serif']) ?></p>
      <?php foreach ($t['what']['paras'] as $para): ?>
        <p class="<?= $lede ?>"><?= e($para) ?></p>
      <?php endforeach; ?>
    </div>

    <dl class="m-0 mt-7 grid grid-cols-2 gap-x-5 gap-y-4 rounded-[20px] border border-[#e3e7ea] bg-white px-6 py-5 sm:mt-8 sm:gap-x-8 sm:gap-y-5 sm:px-7 sm:py-6">
      <?php foreach ($t['what']['facts'] as [$term, $def]): ?>
        <div>
          <dt class="m-0 text-[14px] font-extrabold leading-[1.3] tracking-[-0.01em] text-ink"><?= e($term) ?></dt>
          <dd class="m-0 mt-1 text-[12px] leading-[1.45] text-[#6c7680]"><?= e($def) ?></dd>
        </div>
      <?php endforeach; ?>
    </dl>

    <p class="m-0 mt-4 max-w-[60ch] text-[13px] leading-[1.7] text-[#6c7680]"><?= e($t['what']['note']) ?></p>

    <a href="<?= e($t['what']['link'][1]) ?>" class="mt-6 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-sm font-bold text-brand-blue transition-colors hover:border-brand-blue sm:mt-7">
      <?= e($t['what']['link'][0]) ?> <?= arrow_icon(16) ?>
    </a>
  </div>

  <figure class="relative isolate m-0 overflow-hidden rounded-[28px] border border-[#e5e9ec] bg-white p-2.5 shadow-[0_20px_50px_rgba(20,32,43,0.07)] md:sticky md:top-[176px]">
    <div class="relative h-[260px] overflow-hidden rounded-[20px] bg-night sm:h-[460px] md:h-[580px]">
      <?= image_slot($t['what']['photo'], $t['name'] . ' photo', $t['what']['photo_alt'], false, $t['what']['focus']) ?>
      <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-transparent"></div>
      <figcaption class="absolute inset-x-5 bottom-5 font-serif text-[21px] leading-[1.25] text-white sm:text-[23px]"><?= e($t['what']['caption']) ?></figcaption>
    </div>
  </figure>
</section>

<!-- ─── Band ─────────────────────────────────────────────────────────── -->
<section class="px-3 pb-3 sm:px-5 sm:pb-5 lg:px-8">
  <div class="relative isolate flex flex-col gap-3 overflow-hidden rounded-[24px] bg-[#0e537c] px-6 py-7 text-white sm:flex-row sm:items-center sm:justify-between sm:gap-10 sm:px-10 sm:py-8">
    <div aria-hidden="true" class="pointer-events-none absolute -right-[150px] -top-[120px] h-[300px] w-[300px] rounded-full border border-white/10 shadow-[0_0_0_36px_#ffffff06]"></div>
    <p class="relative m-0 max-w-[34ch] font-serif text-[21px] leading-[1.3] tracking-[-0.02em] sm:text-[26px]">
      <em class="not-italic text-[#cde3de]" data-count="<?= e($t['band']['value']) ?>"><?= e($t['band']['value']) ?></em> <?= e($t['band']['rest']) ?>
    </p>
    <p class="relative m-0 shrink-0 text-[13px] leading-[1.6] text-white/70 sm:max-w-[26ch] sm:text-right">
      <?= e($t['band']['note']) ?>
      <span class="mt-1 block text-[10px] font-bold uppercase tracking-[0.15em] text-[#8fc7e8]"><?= e($t['band']['source']) ?></span>
    </p>
  </div>
</section>

<?php if ($t['options']): ?>
<!-- ─── 02 · Options ─────────────────────────────────────────────────── -->
<section id="options" class="<?= $anchor ?> bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($t['options']['eyebrow']) ?></p>
        <h2 class="<?= $h2 ?>"><?= $headline($t['options']['lines'], $t['options']['accent'], $em) ?></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[300px]"><?= e($t['options']['intro']) ?></p>
    </div>

    <?php // Below sm these become a swipe rail rather than a tall stack. ?>
    <div class="-mx-[22px] flex snap-x snap-mandatory gap-3 overflow-x-auto scroll-pl-[22px] px-[22px] pb-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden sm:mx-0 sm:grid sm:snap-none sm:overflow-visible sm:px-0 sm:pb-0 lg:gap-3.5 <?= $option_cols[count($t['options']['items'])] ?? 'sm:grid-cols-2' ?>">
      <?php foreach ($t['options']['items'] as $i => [$name, $copy, $tag]): ?>
        <article data-reveal class="flex w-[80%] shrink-0 snap-center flex-col rounded-[20px] bg-[#faf8f3] p-6 sm:w-auto sm:shrink lg:p-7">
          <div class="mb-7 flex items-center justify-between text-[11px] text-[#6c756f] md:mb-9">
            <span><?= sprintf('%02d', $i + 1) ?></span>
            <span aria-hidden="true" class="h-[9px] w-[9px] rounded-full bg-brand-blue/70"></span>
          </div>
          <h3 class="m-0 mb-3.5 font-serif text-[24px] font-normal leading-[1.15] tracking-[-0.03em] text-ink lg:text-[26px]"><?= e($name) ?></h3>
          <p class="m-0 text-sm leading-[1.8] text-[#58616a]"><?= e($copy) ?></p>
          <span class="mt-6 border-t border-ink/15 pt-4 text-[10px] font-bold uppercase tracking-[0.15em] text-ink/55 md:mt-auto"><?= e($tag) ?></span>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ─── 03 · Process ─────────────────────────────────────────────────── -->
<section id="process" class="<?= $wrap ?> <?= $pad ?> <?= $anchor ?>">
  <div class="grid items-start gap-7 sm:gap-[34px] md:grid-cols-[minmax(0,0.78fr)_minmax(0,1.22fr)] md:gap-[45px] lg:gap-[70px]">

    <figure class="relative isolate m-0 overflow-hidden rounded-[28px] border border-[#e5e9ec] bg-white p-2.5 shadow-[0_20px_50px_rgba(20,32,43,0.07)] md:sticky md:top-[176px]">
      <div class="relative h-[240px] overflow-hidden rounded-[20px] bg-night sm:h-[440px] md:h-[520px]">
        <?= image_slot($t['process']['photo'], $t['name'] . ' photo', $t['process']['photo_alt'], false, $t['process']['focus']) ?>
        <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-transparent"></div>
        <figcaption class="absolute inset-x-5 bottom-5 font-serif text-[21px] leading-[1.25] text-white sm:text-[23px]"><?= e($t['process']['caption']) ?></figcaption>
      </div>
    </figure>

    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($t['process']['eyebrow']) ?></p>
      <h2 class="<?= $h2 ?>"><?= $headline($t['process']['lines'], $t['process']['accent'], $em) ?></h2>
      <p class="m-0 mt-6 max-w-[46ch] text-base leading-[1.8] text-[#58616a]"><?= e($t['process']['intro']) ?></p>

      <ol class="m-0 mt-6 list-none p-0 sm:mt-7">
        <?php foreach ($t['process']['steps'] as $i => [$name, $copy]): ?>
          <li class="flex items-start gap-5 border-b border-ink/12 py-4 last:border-0 sm:py-5">
            <span aria-hidden="true" class="display-mark mt-0.5 w-6 shrink-0 text-[15px] text-brand-blue/60"><?= sprintf('%02d', $i + 1) ?></span>
            <div>
              <h3 class="m-0 font-serif text-[20px] font-normal leading-snug tracking-[-0.02em] text-ink"><?= e($name) ?></h3>
              <p class="m-0 mt-1.5 max-w-[56ch] text-sm leading-[1.75] text-[#58616a]"><?= e($copy) ?></p>
            </div>
          </li>
        <?php endforeach; ?>
      </ol>

      <div class="mt-7 grid grid-cols-3 gap-3 rounded-[24px] border border-ink/10 bg-white px-5 py-5 sm:gap-6 sm:px-8">
        <?php foreach ($t['process']['facts'] as [$value, $label, $colour]): ?>
          <div>
            <p class="display-mark m-0 text-[22px] font-extrabold tracking-[-0.03em] sm:text-[30px]" style="color:<?= e($colour) ?>" data-count="<?= e($value) ?>"><?= e($value) ?></p>
            <p class="m-0 mt-1 text-[12px] leading-[1.35] text-ink/60 sm:text-[13px]"><?= e($label) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php if ($t['treats']): ?>
<!-- ─── 04 · What it treats ──────────────────────────────────────────── -->
<section id="treats" class="<?= $anchor ?> bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($t['treats']['eyebrow']) ?></p>
        <h2 class="<?= $h2 ?>"><?= $headline($t['treats']['lines'], $t['treats']['accent'], $em) ?></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[400px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[320px]"><?= e($t['treats']['intro']) ?></p>
    </div>

    <ul class="m-0 grid list-none grid-cols-2 gap-2.5 p-0 sm:gap-3 lg:grid-cols-3">
      <?php foreach ($data['conditions'] as $condition): ?>
        <?php $flagged = in_array($condition['art'], $t['treats']['flag'], true); ?>
        <li>
          <a href="<?= e($condition['page'] ?? 'conditions.php') ?>" class="lift group flex h-full items-center gap-3 rounded-2xl border border-[#e3e7ea] bg-white px-4 py-4 transition-colors hover:border-brand-blue/35 sm:gap-4 sm:px-6 sm:py-5">
            <?= condition_mark($condition, 'h-7 w-7 shrink-0 [filter:brightness(0.62)_saturate(1.25)] sm:h-9 sm:w-9') ?>
            <span class="min-w-0 flex-1">
              <span class="block text-[14px] font-extrabold tracking-[-0.02em] text-ink sm:text-[17px]"><?= e($condition['name']) ?></span>
              <?php if ($flagged): ?>
                <span class="mt-0.5 block text-[10px] font-bold uppercase tracking-[0.14em] text-brand-green-dark"><?= e($t['treats']['flag_label']) ?></span>
              <?php endif; ?>
            </span>
            <span class="hidden text-brand-blue transition-transform duration-200 group-hover:translate-x-1 sm:inline"><?= arrow_icon(17) ?></span>
          </a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php endif; ?>

<!-- ─── Feature and honest answers ───────────────────────────────────── -->
<?php $feature = $t['panels']['feature']; $honest = $t['panels']['honest']; ?>
<section class="px-3 py-3 sm:px-5 sm:py-5 lg:px-8">
  <div class="grid gap-3 md:gap-4 lg:grid-cols-2">

    <div class="relative flex min-h-[420px] items-end overflow-hidden rounded-[28px] bg-night sm:min-h-[480px]">
      <div class="absolute inset-0">
        <?= image_slot($feature['photo'], $feature['eyebrow'], $feature['photo_alt']) ?>
      </div>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.35)_0%,rgba(9,20,28,0.62)_30%,rgba(9,20,28,0.92)_100%)]"></div>
      <div class="relative w-full p-6 sm:p-9 lg:p-11">
        <p class="m-0 mb-4 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-green"><?= e($feature['eyebrow']) ?></p>
        <h3 class="m-0 mb-4 font-serif text-[27px] font-normal leading-[1.1] tracking-[-0.03em] text-white sm:text-[32px]"><?= e($feature['heading']) ?></h3>
        <p class="m-0 max-w-[48ch] text-[15px] font-medium leading-[1.7] text-white/85"><?= e($feature['copy']) ?></p>
        <a href="#book" class="mt-7 inline-flex items-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
          <?= e($feature['cta']) ?> <?= arrow_icon(16) ?>
        </a>
      </div>
    </div>

    <div class="rounded-[28px] border border-[#e3e7ea] bg-white p-7 sm:p-9 lg:p-11">
      <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($honest['eyebrow']) ?></p>
      <h3 class="m-0 font-serif text-[27px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[32px]">
        <?= e($honest['heading']) ?> <em class="<?= $em ?>"><?= e($honest['accent']) ?></em>
      </h3>
      <p class="m-0 mt-5 text-[15px] leading-[1.75] text-[#58616a]"><?= e($honest['intro']) ?></p>

      <ul class="m-0 mt-6 list-none p-0">
        <?php foreach ($honest['items'] as [$label, $copy, $dot_class]): ?>
          <li class="flex items-start gap-3.5 border-b border-ink/10 py-4 last:border-0 last:pb-0">
            <span aria-hidden="true" class="mt-[7px] h-[7px] w-[7px] shrink-0 rounded-full <?= e($dot_class) ?>"></span>
            <span class="text-[14px] leading-[1.7] text-[#58616a]"><strong class="font-extrabold text-ink"><?= e($label) ?>.</strong> <?= e($copy) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>

      <p class="m-0 mt-6 rounded-2xl border border-brand-blue/20 bg-mist px-5 py-4 text-[14px] leading-[1.7] text-brand-blue-dark"><?= e($honest['note']) ?></p>
    </div>
  </div>
</section>

<!-- ─── FAQ ──────────────────────────────────────────────────────────── -->
<section id="faq" class="<?= $anchor ?> bg-mist">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="grid items-start gap-7 sm:gap-10 lg:grid-cols-[minmax(0,0.8fr)_minmax(0,1.2fr)] lg:gap-[72px]">
      <div>
        <p class="m-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-blue/70 md:mb-[26px]"><?= $dot ?> Questions</p>
        <h2 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-brand-blue-dark text-[clamp(33px,3.9vw,52px)]"><?= e($t['name']) ?>,<br><em class="italic font-normal text-brand-blue">answered plainly.</em></h2>
        <p class="m-0 mt-6 max-w-[34ch] text-base leading-[1.8] text-brand-blue">Still stuck on something? Ask us on the call — there is no question we have not heard before.</p>
        <a href="<?= e($site['phone_href']) ?>" class="mt-6 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-sm font-bold text-brand-blue transition-colors hover:border-brand-blue sm:mt-7">
          <?= e($site['phone']) ?> <?= arrow_icon(16) ?>
        </a>
      </div>

      <div>
        <?php foreach ($t['faqs'] as $i => [$q, $a]): ?>
          <details class="group border-b border-brand-blue/25"<?= $i === 0 ? ' open' : '' ?>>
            <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-lg font-extrabold tracking-[-0.015em] text-brand-blue-dark [&::-webkit-details-marker]:hidden sm:py-6 sm:text-xl">
              <span><?= e($q) ?></span>
              <span aria-hidden="true" class="shrink-0 text-[22px] font-normal leading-none text-brand-blue">
                <span class="group-open:hidden">+</span><span class="hidden group-open:inline">&minus;</span>
              </span>
            </summary>
            <p class="m-0 max-w-[62ch] pb-5 text-[15px] font-medium leading-[1.7] text-brand-blue-dark/80 sm:pb-[26px] sm:leading-[1.75]"><?= e($a) ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ─── Other treatments ─────────────────────────────────────────────── -->
<section class="<?= $wrap ?> <?= $pad ?>">
  <div class="mb-7 flex flex-wrap items-end justify-between gap-6 border-b-2 border-ink/15 pb-5 sm:mb-9 sm:gap-8 sm:pb-6">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Other treatments</p>
      <h2 class="<?= $h2 ?>">Often combined.<br><em class="<?= $em ?>">One team.</em></h2>
    </div>
    <a href="treatments.php" class="flex items-center gap-4 pb-2 text-xs font-bold text-ink transition-colors hover:text-brand-blue md:gap-8">
      All Treatments <span aria-hidden="true" class="text-2xl text-brand-blue">&#8600;</span>
    </a>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 lg:grid-cols-4">
    <?php foreach ($others as $row): ?>
      <li>
        <a href="<?= e($row['page'] ?? 'treatments.php') ?>" class="lift group flex h-full flex-col rounded-[20px] border border-[#e3e7ea] bg-white p-6 transition-colors hover:border-brand-blue/35">
          <h3 class="m-0 font-serif text-[23px] font-normal leading-[1.15] tracking-[-0.02em] text-brand-blue"><?= e($row['name']) ?></h3>
          <div class="mt-3 flex flex-wrap gap-1.5">
            <?php foreach ($row['chips'] as $chip): ?>
              <span class="rounded-full border border-ink/15 px-2.5 py-1 text-[11px] font-bold text-ink/60"><?= e($chip) ?></span>
            <?php endforeach; ?>
          </div>
          <span class="mt-auto inline-flex items-center gap-2 pt-6 text-sm font-extrabold text-brand-blue">
            Read More <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
          </span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- ─── Closing CTA ──────────────────────────────────────────────────── -->
<section id="book" class="<?= $anchor ?> px-3 pb-8 sm:px-5 sm:pb-12 lg:px-8">
  <div class="relative isolate overflow-hidden rounded-[28px] bg-cream bg-aurora px-5 py-9 text-center sm:px-12 sm:py-14">
    <h2 class="m-0 mx-auto max-w-[22ch] font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(30px,3.4vw,44px)]">
      <?= $headline($t['cta']['lines'], $t['cta']['accent'], $em) ?>
    </h2>
    <p class="mx-auto m-0 mt-5 max-w-[56ch] text-[15px] leading-[1.75] text-ink/75 sm:text-base sm:leading-[1.8]"><?= e($t['cta']['copy']) ?></p>
    <div class="mt-7 flex flex-wrap justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>">Call <?= e($site['phone']) ?></a>
    </div>
    <p class="m-0 mt-6 text-xs text-ink/55">In crisis? Call or text 988 any time.</p>
  </div>
</section>

</div>

<?php require __DIR__ . '/footer.php'; ?>
