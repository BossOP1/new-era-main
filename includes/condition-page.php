<?php
/**
 * Shared condition page.
 *
 * A page file at the root names its condition and requires this:
 *
 *   <?php
 *   $condition_key = 'anxiety';
 *   require __DIR__ . '/includes/condition-page.php';
 *
 * All copy comes from includes/data-conditions.php. The structure is the one
 * arrived at on depression.php: hero, what it is, a one-line prevalence band,
 * symptoms beside a photograph, an optional second list as cards, the TMS
 * pair, the treatments row, an optional closing on what untreated costs, FAQs,
 * the other conditions, and the booking panel.
 *
 * depression.php is deliberately not built from this template — it carries
 * sections none of the others need — so changes here do not touch it.
 */

$conditions_content = require __DIR__ . '/data-conditions.php';

if (!isset($condition_key, $conditions_content[$condition_key])) {
    http_response_code(500);
    exit('condition-page.php: unknown condition key.');
}

$c = $conditions_content[$condition_key];

$page_title        = $c['title'];
$page_description  = $c['meta'];
$header_hero_light = true;
$header_inset      = true;   // the bar sits inside the gutter-framed hero

require __DIR__ . '/header.php';

/* Shared shorthands, same set the depression page uses. */
$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$lede     = 'm-0 text-[15px] leading-[1.7] text-[#58616a] sm:text-base sm:leading-[1.85]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';
$anchor   = 'scroll-mt-[148px] sm:scroll-mt-[164px]';

/**
 * A headline, broken where the data says to break it, with one line picked out
 * in blue. Takes the <em> classes because the hero sets its accent upright and
 * the section headings set theirs in italic.
 */
$headline = static function (array $lines, string $accent, string $em_class): string {
    // An accent that matches no line used to render a headline with no accent
    // and no complaint. Fail loudly instead — this is a content typo, and it
    // is invisible from the markup.
    if (!in_array($accent, $lines, true)) {
        fwrite(STDERR, sprintf(
            "condition-page.php: accent %s matches no line in [%s]\n",
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

$em_section = 'italic font-normal text-brand-blue';

// The section rail only lists the landings this condition actually has.
$rail = ['#what' => 'What it is', '#symptoms' => 'Symptoms'];
if ($c['groups']) {
    $rail['#groups'] = $c['groups']['tag_label'] ?? 'Types';
}
$rail['#tms'] = 'TMS therapy';
$rail['#faq'] = 'FAQs';
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────────
     One photograph filling the rounded panel, a wash over it that is flat on a
     phone and a left-to-right fade from the tablet up, and a single column of
     copy on the quiet side. The panel colour and the wash colour are the same,
     so the picture dissolves into the panel rather than ending on an edge.
     Both arrive as a custom property because they change per condition — see
     .cond-hero-wash in src/input.css. -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: <?= e($c['hero']['wash']) ?>; background-color: <?= e($c['hero']['panel']) ?>">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/' . $c['hero']['image'])) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[360px]">
      <div class="max-w-[560px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="conditions.php" class="transition-colors hover:text-brand-blue">Conditions</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue"><?= e($c['name']) ?></li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          <?= $headline($c['hero']['lines'], $c['hero']['accent'], 'not-italic text-brand-blue') ?>
        </h1>

        <p class="m-0 mt-5 max-w-[46ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base"><?= e($c['hero']['lede']) ?></p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#book" class="<?= $btn_blue ?>">Book a consultation <?= arrow_icon(16) ?></a>
          <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-ink/65 sm:mt-6">
          In crisis right now? Call or text <a href="tel:988" class="font-extrabold text-brand-blue underline decoration-brand-blue/30 underline-offset-4 hover:decoration-brand-blue">988</a>, any time.
        </p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>In-network with most major plans. FDA-cleared TMS.</span>
      <span>Medication <span aria-hidden="true" class="px-2">/</span> Therapy <span aria-hidden="true" class="px-2">/</span> TMS <span aria-hidden="true" class="px-2">/</span> Spravato<sup>&reg;</sup></span>
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
<section id="what" class="<?= $wrap ?> <?= $pad ?> <?= $anchor ?> grid items-start gap-7 sm:gap-[34px] md:grid-cols-[minmax(0,1.1fr)_minmax(0,0.9fr)] md:gap-[45px] lg:gap-[80px]">
  <div>
    <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($c['what']['eyebrow']) ?></p>
    <h2 class="<?= $h2 ?>"><?= $headline($c['what']['lines'], $c['what']['accent'], $em_section) ?></h2>

    <div class="mt-5 space-y-3.5 sm:mt-6 sm:space-y-4 md:mt-7">
      <p class="m-0 font-serif text-[19px] leading-[1.45] text-[#24333c] sm:text-[20px] sm:leading-[1.5] md:text-[22px]"><?= e($c['what']['serif']) ?></p>
      <?php foreach ($c['what']['paras'] as $para): ?>
        <p class="<?= $lede ?>"><?= e($para) ?></p>
      <?php endforeach; ?>
    </div>

    <a href="index.php#treatments" class="mt-6 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-sm font-bold text-brand-blue transition-colors hover:border-brand-blue sm:mt-8">
      See how we treat it <?= arrow_icon(16) ?>
    </a>
  </div>

  <aside class="rounded-[24px] border border-[#e3e7ea] bg-white p-6 shadow-[0_16px_44px_rgba(20,32,43,0.05)] sm:p-7 md:p-8">
    <p class="m-0 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/45"><?= e($c['what']['signs_title']) ?></p>
    <ul class="m-0 mt-5 list-none space-y-0 p-0 sm:mt-6">
      <?php foreach ($c['what']['signs'] as $sign): ?>
        <li class="flex items-start gap-3.5 border-b border-ink/10 py-3 first:pt-0 last:border-0 last:pb-0 sm:py-4">
          <span aria-hidden="true" class="mt-[7px] h-[7px] w-[7px] shrink-0 rounded-full bg-brand-blue"></span>
          <span class="text-[15px] font-medium leading-[1.6] text-ink"><?= e($sign) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
    <p class="m-0 mt-5 border-t border-ink/10 pt-4 text-[13px] leading-[1.65] text-[#6c7680] sm:mt-6 sm:pt-5"><?= e($c['what']['signs_note']) ?></p>
  </aside>
</section>

<!-- ─── Prevalence ───────────────────────────────────────────────────── -->
<section class="px-3 pb-3 sm:px-5 sm:pb-5 lg:px-8">
  <div class="relative isolate flex flex-col gap-3 overflow-hidden rounded-[24px] bg-[#0e537c] px-6 py-7 text-white sm:flex-row sm:items-center sm:justify-between sm:gap-10 sm:px-10 sm:py-8">
    <div aria-hidden="true" class="pointer-events-none absolute -right-[150px] -top-[120px] h-[300px] w-[300px] rounded-full border border-white/10 shadow-[0_0_0_36px_#ffffff06]"></div>
    <p class="relative m-0 max-w-[32ch] font-serif text-[21px] leading-[1.3] tracking-[-0.02em] sm:text-[26px]">
      <em class="not-italic text-[#cde3de]" data-count="<?= e($c['stat']['value']) ?>"><?= e($c['stat']['value']) ?></em> <?= e($c['stat']['rest']) ?>
    </p>
    <p class="relative m-0 shrink-0 text-[13px] leading-[1.6] text-white/70 sm:max-w-[26ch] sm:text-right">
      <?= e($c['stat']['note']) ?>
      <span class="mt-1 block text-[10px] font-bold uppercase tracking-[0.15em] text-[#8fc7e8]"><?= e($c['stat']['source']) ?></span>
    </p>
  </div>
</section>

<!-- ─── 02 · Symptoms ────────────────────────────────────────────────── -->
<section id="symptoms" class="<?= $wrap ?> <?= $pad ?> <?= $anchor ?>">
  <div class="grid items-start gap-7 sm:gap-[34px] md:grid-cols-[minmax(0,0.78fr)_minmax(0,1.22fr)] md:gap-[45px] lg:gap-[70px]">

    <figure class="relative isolate m-0 overflow-hidden rounded-[28px] border border-[#e5e9ec] bg-white p-2.5 shadow-[0_20px_50px_rgba(20,32,43,0.07)] md:sticky md:top-[176px]">
      <div class="relative h-[200px] overflow-hidden rounded-[20px] sm:h-[420px] md:h-[500px]">
        <?= image_slot($c['symptoms']['photo'], $c['name'] . ' photo', $c['symptoms']['photo_alt']) ?>
        <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-transparent"></div>
        <figcaption class="absolute inset-x-5 bottom-5 font-serif text-[21px] leading-[1.25] text-white sm:text-[23px]"><?= e($c['symptoms']['caption']) ?></figcaption>
      </div>
    </figure>

    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($c['symptoms']['eyebrow']) ?></p>
      <h2 class="<?= $h2 ?>"><?= $headline($c['symptoms']['lines'], $c['symptoms']['accent'], $em_section) ?></h2>
      <p class="m-0 mt-6 max-w-[46ch] text-base leading-[1.8] text-[#58616a]"><?= e($c['symptoms']['intro']) ?></p>

      <?php // Numbered rather than ticked: a checklist invites self-diagnosis,
            // and the note in the card opposite is doing the opposite job. ?>
      <ol class="m-0 mt-6 grid list-none gap-x-[22px] gap-y-0 p-0 sm:mt-7 lg:grid-cols-2">
        <?php foreach ($c['symptoms']['list'] as $i => $symptom): ?>
          <li class="flex items-baseline gap-4 border-b border-ink/12 py-3 sm:gap-5 sm:py-4">
            <span aria-hidden="true" class="w-6 shrink-0 font-serif text-[15px] text-brand-blue/70"><?= sprintf('%02d', $i + 1) ?></span>
            <span class="text-[15px] font-medium leading-[1.55] tracking-[-0.01em] text-ink md:text-[16px]"><?= e($symptom) ?></span>
          </li>
        <?php endforeach; ?>
      </ol>

      <?php if (!empty($c['symptoms']['note'])): ?>
        <p class="m-0 mt-6 rounded-2xl border border-brand-orange/30 bg-blush/60 px-5 py-4 text-[14px] leading-[1.7] text-clay-deep"><?= e($c['symptoms']['note']) ?></p>
      <?php endif; ?>

      <div data-reveal class="mt-7 flex flex-col items-start gap-4 rounded-[24px] border border-ink/10 bg-cream bg-aurora px-5 py-5 sm:mt-8 sm:flex-row sm:items-center sm:justify-between sm:gap-8 sm:px-8 sm:py-6">
        <div>
          <p class="m-0 text-[16px] font-extrabold tracking-[-0.01em] text-ink">Not sure how you are really doing?</p>
          <p class="m-0 mt-1 max-w-[44ch] text-sm leading-relaxed text-ink/65">The PHQ-9 takes two minutes. It is a screening questionnaire, not a diagnosis, and we go through the result with you.</p>
        </div>
        <a href="index.php#book" class="<?= $btn_blue ?> shrink-0">Take the PHQ-9 <?= arrow_icon(15) ?></a>
      </div>
    </div>
  </div>
</section>

<?php if ($c['groups']): ?>
<!-- ─── 03 · Groups ──────────────────────────────────────────────────── -->
<section id="groups" class="<?= $anchor ?> bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($c['groups']['eyebrow']) ?></p>
        <h2 class="<?= $h2 ?>"><?= $headline($c['groups']['lines'], $c['groups']['accent'], $em_section) ?></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[290px]"><?= e($c['groups']['intro']) ?></p>
    </div>

    <?php // Below sm these become a swipe rail rather than a tall stack. ?>
    <div class="-mx-[22px] flex snap-x snap-mandatory gap-3 overflow-x-auto scroll-pl-[22px] px-[22px] pb-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden sm:mx-0 sm:grid sm:snap-none sm:grid-cols-2 sm:overflow-visible sm:px-0 sm:pb-0 lg:grid-cols-<?= count($c['groups']['items']) > 4 ? '3' : '4' ?> lg:gap-3.5">
      <?php foreach ($c['groups']['items'] as $i => $item): ?>
        <article data-reveal class="flex w-[80%] shrink-0 snap-center flex-col rounded-[20px] bg-[#faf8f3] p-6 sm:w-auto sm:shrink lg:p-7">
          <div class="mb-7 flex items-center justify-between text-[11px] text-[#6c756f] md:mb-9">
            <span><?= sprintf('%02d', $i + 1) ?></span>
            <span aria-hidden="true" class="h-[9px] w-[9px] rounded-full bg-brand-blue/70"></span>
          </div>
          <h3 class="m-0 mb-3.5 font-serif text-[24px] font-normal leading-[1.15] tracking-[-0.03em] text-ink lg:text-[26px]"><?= e($item['name']) ?></h3>
          <p class="m-0 text-sm leading-[1.8] text-[#58616a]"><?= e($item['copy']) ?></p>
          <span class="mt-6 border-t border-ink/15 pt-4 text-[10px] font-bold uppercase tracking-[0.15em] text-ink/55 md:mt-auto"><?= e($item['tag']) ?></span>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ─── 04 · TMS ─────────────────────────────────────────────────────── -->
<section id="tms" class="<?= $anchor ?> px-3 py-3 sm:px-5 sm:py-5 lg:px-8">
  <div class="grid gap-3 md:gap-4 lg:grid-cols-[minmax(0,0.92fr)_minmax(0,1.08fr)]">

    <div class="relative isolate overflow-hidden rounded-[28px] bg-[#0e537c] px-6 py-8 text-white sm:px-7 sm:py-[38px] lg:px-[45px] lg:py-14">
      <div aria-hidden="true" class="pointer-events-none absolute -bottom-[110px] -right-[210px] h-[370px] w-[370px] rounded-full border border-white/10 shadow-[0_0_0_40px_#ffffff06,0_0_0_80px_#ffffff04]"></div>

      <div class="relative">
        <p class="m-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-white/60 md:mb-[26px]"><?= $dot ?> <?= e($c['tms']['eyebrow']) ?></p>
        <h2 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-white text-[clamp(30px,3.4vw,44px)]">
          <?= $headline($c['tms']['lines'], $c['tms']['accent'], 'italic font-normal text-[#cde3de]') ?>
        </h2>

        <blockquote class="m-0 mt-6 border-l border-white/30 pl-5 sm:mt-8 sm:pl-6">
          <p class="m-0 font-serif text-[19px] leading-[1.55] text-white/90 sm:text-[21px]">&ldquo;<?= e($c['tms']['quote']) ?>&rdquo;</p>
          <footer class="mt-3 text-[11px] font-bold uppercase tracking-[0.15em] text-[#8fc7e8]"><?= e($c['tms']['quote_source']) ?></footer>
        </blockquote>

        <p class="m-0 mt-6 max-w-[42ch] text-[15px] leading-[1.75] text-[#dbe6ee] sm:mt-7 sm:leading-[1.8]"><?= e($c['tms']['copy']) ?></p>

        <a href="index.php#book" class="mt-7 inline-flex items-center justify-center gap-[22px] rounded-full bg-white px-[25px] py-[17px] text-sm font-bold text-[#154c69] transition-colors hover:bg-[#e6eddc] sm:mt-8">
          See if TMS is right for you <?= arrow_icon(17) ?>
        </a>
      </div>
    </div>

    <div class="relative flex min-h-[440px] items-end overflow-hidden rounded-[28px] bg-night sm:min-h-[520px] lg:min-h-[620px]">
      <div class="absolute inset-0">
        <?= image_slot($c['tms']['photo'], 'TMS treatment photo', $c['tms']['photo_alt'], false, $c['tms']['photo_focus']) ?>
      </div>
      <?php // A full-height scrim: the copy block fills three quarters of this
            // panel, so a veil that only shades the bottom leaves the heading
            // sitting on a bright frame. ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.40)_0%,rgba(9,20,28,0.58)_22%,rgba(9,20,28,0.84)_52%,rgba(9,20,28,0.94)_100%)]"></div>

      <div class="relative w-full p-6 sm:p-10 lg:p-12">
        <p class="m-0 mb-4 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-green">How TMS helps</p>
        <h3 class="m-0 mb-4 font-serif text-[27px] font-normal leading-[1.1] tracking-[-0.03em] text-white sm:text-[34px]"><?= e($c['tms']['heading']) ?></h3>
        <p class="m-0 max-w-[52ch] text-[15px] font-medium leading-[1.7] text-white/85"><?= e($c['tms']['sub']) ?></p>

        <ul class="m-0 mt-6 grid list-none gap-x-6 gap-y-3 p-0 sm:mt-7 sm:grid-cols-2 sm:gap-y-3.5">
          <?php foreach ($c['tms']['benefits'] as $benefit): ?>
            <li class="flex items-start gap-3">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#86be52" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="mt-[3px] shrink-0"><path d="m5 12.5 4.5 4.5L19 7"/></svg>
              <span class="text-[14px] leading-[1.5] text-white/90"><strong class="font-extrabold text-white"><?= e($benefit['name']) ?>.</strong> <?= e($benefit['copy']) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="mt-6 grid grid-cols-3 gap-3 border-t border-white/25 pt-6 sm:mt-8 sm:flex sm:flex-wrap sm:gap-12 sm:pt-7">
          <?php foreach ($c['tms']['facts'] as $fact): ?>
            <div>
              <p class="display-mark m-0 text-[19px] font-extrabold tracking-[-0.03em] sm:text-[30px]" style="color:<?= e($fact['color']) ?>"><?= e($fact['value']) ?></p>
              <p class="m-0 mt-1 text-[12px] leading-[1.35] text-white/75 sm:text-[13px]"><?= e($fact['label']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── Treatments we offer ──────────────────────────────────────────── -->
<section class="<?= $wrap ?> <?= $pad ?>">
  <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Your options here</p>
      <h2 class="<?= $h2 ?>">Five routes out.<br><em class="<?= $em_section ?>">One plan.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[290px]">
      Everything below is delivered by one team, so your prescriber and your therapist are reading the same notes.
    </p>
  </div>

  <div class="-mx-[22px] flex snap-x snap-mandatory gap-4 overflow-x-auto scroll-pl-[22px] px-[22px] pb-3 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:mx-0 md:grid md:snap-none md:grid-cols-2 md:overflow-visible md:px-0 md:pb-0 lg:grid-cols-3">
    <?php foreach ($data['treatments'] as $treatment): ?>
      <article data-reveal class="lift flex w-[82%] shrink-0 snap-center flex-col overflow-hidden rounded-[20px] border border-[#e3e7ea] bg-white md:w-auto md:shrink">
        <div class="relative min-h-[170px] overflow-hidden bg-night sm:min-h-[200px]">
          <?= image_slot($treatment['slot'], $treatment['name'] . ' photo', $treatment['alt'], false, $treatment['focus'] ?? '') ?>
          <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-card-veil"></div>
          <div class="absolute inset-x-3 bottom-3 flex flex-wrap gap-2">
            <?php foreach ($treatment['chips'] as $chip): ?>
              <span class="chip-glass"><?= e($chip) ?></span>
            <?php endforeach; ?>
          </div>
        </div>
        <div class="flex flex-1 flex-col p-6 sm:p-7">
          <h3 class="m-0 mb-2.5 font-serif text-[24px] font-normal tracking-[-0.02em] text-brand-blue"><?= e($treatment['name']) ?></h3>
          <p class="m-0 text-[15px] font-medium leading-[1.6] text-ink/70"><?= e($treatment['detail']) ?></p>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</section>

<?php if ($c['untreated']): ?>
<!-- ─── Left untreated ──────────────────────────────────────────────── -->
<section class="<?= $wrap ?> <?= $pad ?>">
  <div class="grid items-stretch gap-4 md:grid-cols-[minmax(0,1fr)_minmax(0,1.05fr)] md:gap-[22px]">
    <div class="flex flex-col justify-center py-2">
      <p class="<?= $eyebrow ?>"><?= $dot ?> If it goes untreated</p>
      <h2 class="<?= $h2 ?>"><?= $headline($c['untreated']['lines'], $c['untreated']['accent'], $em_section) ?></h2>
      <?php foreach ($c['untreated']['paras'] as $i => $para): ?>
        <p class="<?= $i === 0 ? 'm-0 mt-6 max-w-[44ch] text-base leading-[1.85] text-[#58616a]' : 'm-0 mt-4 max-w-[40ch] font-serif text-[20px] leading-[1.5] text-[#24333c] md:text-[22px]' ?>"><?= e($para) ?></p>
      <?php endforeach; ?>
    </div>

    <?php // The hopeful half is a photograph with the list on it, rather than a
          // third white card in a page that already has several. ?>
    <div class="relative isolate flex min-h-[330px] items-end overflow-hidden rounded-[28px] bg-night sm:min-h-[420px] lg:min-h-[480px]">
      <div class="absolute inset-0">
        <?= image_slot('homepage/results-joy.jpg', 'Recovery photo', 'A father and his daughter laughing together outdoors in autumn light') ?>
      </div>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.16)_0%,rgba(9,20,28,0.72)_38%,rgba(9,20,28,0.93)_100%)]"></div>

      <div class="relative w-full p-6 sm:p-9">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.17em] text-white/65">With the right support, you can</p>
        <ul class="m-0 mt-4 list-none space-y-0 p-0 sm:mt-5">
          <?php foreach ($c['untreated']['gains'] as $gain): ?>
            <li class="flex items-start gap-3.5 border-b border-white/20 py-3 last:border-0 last:pb-0 sm:py-3.5">
              <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="#b0ce87" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="mt-1 shrink-0"><path d="m5 12.5 4.5 4.5L19 7"/></svg>
              <span class="text-[15px] font-medium leading-[1.55] text-white"><?= e($gain) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
        <p class="m-0 mt-5 text-[13px] leading-[1.7] text-white/70">And the part that matters most: the first step towards that can be taken today.</p>
      </div>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- ─── FAQ ──────────────────────────────────────────────────────────── -->
<section id="faq" class="<?= $anchor ?> bg-mist">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="grid items-start gap-7 sm:gap-10 lg:grid-cols-[minmax(0,0.8fr)_minmax(0,1.2fr)] lg:gap-[72px]">
      <div>
        <p class="m-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-blue/70 md:mb-[26px]"><?= $dot ?> Questions</p>
        <h2 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-brand-blue-dark text-[clamp(33px,3.9vw,52px)]"><?= e($c['name']) ?>,<br><em class="italic font-normal text-brand-blue">answered plainly.</em></h2>
        <p class="m-0 mt-6 max-w-[34ch] text-base leading-[1.8] text-brand-blue">Still stuck on something? Ask us on the call — there is no question we have not heard before.</p>
        <a href="<?= e($site['phone_href']) ?>" class="mt-6 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-sm font-bold text-brand-blue transition-colors hover:border-brand-blue sm:mt-7">
          <?= e($site['phone']) ?> <?= arrow_icon(16) ?>
        </a>
      </div>

      <div>
        <?php foreach ($c['faqs'] as $i => $faq): ?>
          <details class="group border-b border-brand-blue/25"<?= $i === 0 ? ' open' : '' ?>>
            <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-5 text-lg font-extrabold tracking-[-0.015em] text-brand-blue-dark [&::-webkit-details-marker]:hidden sm:py-6 sm:text-xl">
              <span><?= e($faq['q']) ?></span>
              <span aria-hidden="true" class="shrink-0 text-[22px] font-normal leading-none text-brand-blue">
                <span class="group-open:hidden">+</span><span class="hidden group-open:inline">&minus;</span>
              </span>
            </summary>
            <p class="m-0 max-w-[62ch] pb-5 text-[15px] font-medium leading-[1.7] text-brand-blue-dark/80 sm:pb-[26px] sm:leading-[1.75]"><?= e($faq['a']) ?></p>
          </details>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ─── Also treated with TMS ────────────────────────────────────────── -->
<?php
// The other conditions, pulled from $data['conditions'] so names, artwork and
// links stay in one place. This page's own condition is left out of its list.
$related = array_values(array_filter(
    $data['conditions'],
    static fn (array $row): bool => ($row['art'] ?? '') !== $c['art']
));
?>
<section class="<?= $wrap ?> <?= $pad ?>">
  <div class="mb-7 flex flex-wrap items-end justify-between gap-6 border-b-2 border-ink/15 pb-5 sm:mb-9 sm:gap-8 sm:pb-6">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Beyond <?= e(strtolower($c['name'])) ?></p>
      <h2 class="<?= $h2 ?>">We also treat these<br><em class="<?= $em_section ?>">with TMS.</em></h2>
    </div>
    <a href="conditions.php" class="flex items-center gap-4 pb-2 text-xs font-bold text-ink transition-colors hover:text-brand-blue md:gap-8">
      All conditions we treat <span aria-hidden="true" class="text-2xl text-brand-blue">&#8600;</span>
    </a>
  </div>

  <ul class="m-0 grid list-none grid-cols-2 gap-2.5 p-0 sm:grid-cols-2 sm:gap-3 lg:grid-cols-3">
    <?php foreach ($related as $row): ?>
      <li>
        <a href="<?= e($row['page'] ?? 'conditions.php') ?>" class="lift group flex h-full items-center gap-3 rounded-2xl border border-[#e3e7ea] bg-white px-4 py-4 transition-colors hover:border-brand-blue/35 sm:gap-4 sm:px-6 sm:py-5">
          <?= condition_mark($row, 'h-7 w-7 shrink-0 [filter:brightness(0.62)_saturate(1.25)] sm:h-9 sm:w-9') ?>
          <span class="min-w-0 flex-1 text-[14px] font-extrabold tracking-[-0.02em] text-ink sm:text-[17px]"><?= e($row['name']) ?></span>
          <span class="hidden text-brand-blue transition-transform duration-200 group-hover:translate-x-1 sm:inline"><?= arrow_icon(17) ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- ─── Closing CTA ──────────────────────────────────────────────────── -->
<section id="book" class="<?= $anchor ?> px-3 pb-8 sm:px-5 sm:pb-12 lg:px-8">
  <div class="relative isolate overflow-hidden rounded-[28px] bg-cream bg-aurora px-5 py-9 sm:px-12 sm:py-12 lg:py-16">
    <div class="mx-auto grid max-w-[1160px] items-center gap-7 sm:gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)] lg:gap-16">
      <div>
        <h2 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(30px,3.4vw,44px)]">
          Take your life back<br><em class="<?= $em_section ?>">from <?= e(strtolower($c['name'])) ?>.</em>
        </h2>
        <p class="m-0 mt-4 max-w-[50ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-5 sm:text-base sm:leading-[1.8]">
          We know how hard appointments are to fit into a week that is already full. After the first visit, a TMS session generally runs fifteen to thirty minutes, with nothing to recover from afterwards.
        </p>
        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="index.php#book" class="<?= $btn_blue ?>">Book a consultation <?= arrow_icon(16) ?></a>
          <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>">Call <?= e($site['phone']) ?></a>
        </div>
        <p class="m-0 mt-6 text-xs text-ink/55">In crisis? Call or text 988 any time.</p>
      </div>

      <figure class="m-0 rounded-[24px] border border-white/70 bg-white/70 p-6 shadow-[0_16px_44px_rgba(20,32,43,0.06)] backdrop-blur-md sm:p-9">
        <span aria-hidden="true" class="text-[15px] leading-none tracking-[0.12em] text-brand-orange">&#9733;&#9733;&#9733;&#9733;&#9733;</span>
        <blockquote class="m-0 mt-4">
          <p class="m-0 font-serif text-[19px] leading-[1.4] tracking-[-0.01em] text-ink sm:text-[23px] sm:leading-[1.45]">
            &ldquo;The TMS treatment results are the miracle I so desperately needed at this time in my life. I&rsquo;m completing my 8th week. It&rsquo;s all good and very true for me.&rdquo;
          </p>
        </blockquote>
        <figcaption class="mt-5 border-t border-ink/10 pt-5 text-sm font-extrabold text-ink">
          Lisa L. <span class="font-medium text-ink/55">&middot; TMS patient</span>
        </figcaption>
      </figure>
    </div>
  </div>
</section>

</div>

<?php require __DIR__ . '/footer.php'; ?>
