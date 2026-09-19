<?php
/**
 * Anew Era Health — the treatments index.
 *
 * A hub, like conditions.php. It reads $data['treatments'] for the cards and
 * $data['compare_rows'] for the therapy-or-psychiatry table, the same data the
 * homepage uses, so neither is retyped here.
 */
$page_title        = 'Treatments';
$page_description  = 'Psychiatry, therapy, TMS and Spravato® from one team sharing one set of notes. What each treatment is, and how to tell which you need.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';

// TMS leads on its own, as depression does on the conditions page: it is the
// treatment the practice is built around. The rest follow in a grid.
$all      = $data['treatments'];
$featured = $all[0];
$rest     = array_slice($all, 1);
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 241 236 230; background-color: #f1ece6">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/treatments/all-hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[360px]">
      <div class="max-w-[560px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">Treatments</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          Five treatments.<br>One practice.<br><em class="not-italic text-brand-blue">One plan.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[46ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          Psychiatry, therapy, TMS and Spravato®, delivered by one team sharing one set of notes. Start with an assessment, and we will work out which of these is right for you.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#list" class="<?= $btn_blue ?>">See the Treatments <?= arrow_icon(16) ?></a>
          <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-ink/65 sm:mt-6">In person and by telehealth. Most insurance accepted.</p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>In-network with most major plans. FDA-cleared TMS.</span>
      <span>Psychiatry <span aria-hidden="true" class="px-2">/</span> Therapy <span aria-hidden="true" class="px-2">/</span> TMS <span aria-hidden="true" class="px-2">/</span> Spravato<sup>&reg;</sup></span>
    </div>
  </section>
</div>

<!-- ─── The treatments ───────────────────────────────────────────────── -->
<section id="list" class="<?= $wrap ?> <?= $pad ?> scroll-mt-[110px]">
  <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> What we offer</p>
      <h2 class="<?= $h2 ?>">Five routes out.<br><em class="italic font-normal text-brand-blue">One team.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[300px]">
      Most plans use more than one of these. Because your clinicians share notes, adding one is a conversation, not a referral.
    </p>
  </div>

  <a href="<?= e($featured['page']) ?>" data-reveal class="lift group mb-3 grid overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-white transition-colors hover:border-brand-blue/35 md:mb-4 md:grid-cols-[minmax(0,1fr)_minmax(0,1.15fr)]">
    <div class="relative min-h-[240px] overflow-hidden bg-night md:min-h-[320px]">
      <?= image_slot($featured['slot'], $featured['name'] . ' photo', $featured['alt'], true, $featured['focus'] ?? '') ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-card-veil"></div>
    </div>
    <div class="flex flex-col justify-center p-7 sm:p-9 lg:p-11">
      <span class="mb-4 text-[10px] font-bold uppercase tracking-[0.16em] text-ink/45">Our lead treatment</span>
      <h3 class="m-0 font-serif text-[30px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[36px]"><?= e($featured['name']) ?> therapy</h3>
      <p class="m-0 mt-3 max-w-[46ch] text-[15px] leading-[1.75] text-[#58616a]"><?= e($featured['detail']) ?></p>
      <div class="mt-5 flex flex-wrap gap-2">
        <?php foreach ($featured['chips'] as $chip): ?>
          <span class="rounded-full border border-ink/15 px-3 py-1.5 text-[12px] font-bold text-ink/70"><?= e($chip) ?></span>
        <?php endforeach; ?>
      </div>
      <span class="mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue">
        Read About TMS <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
      </span>
    </div>
  </a>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-4">
    <?php foreach ($rest as $treatment): ?>
      <li>
        <a href="<?= e($treatment['page']) ?>" data-reveal class="lift group flex h-full flex-col overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-white transition-colors hover:border-brand-blue/35">
          <div class="relative min-h-[170px] overflow-hidden bg-night sm:min-h-[180px]">
            <?= image_slot($treatment['slot'], $treatment['name'] . ' photo', $treatment['alt'], false, $treatment['focus'] ?? '') ?>
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-card-veil"></div>
            <div class="absolute inset-x-3 bottom-3 flex flex-wrap gap-2">
              <?php foreach ($treatment['chips'] as $chip): ?>
                <span class="chip-glass"><?= e($chip) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="flex flex-1 flex-col p-6">
            <h3 class="m-0 font-serif text-[24px] font-normal leading-[1.15] tracking-[-0.025em] text-brand-blue"><?= e($treatment['name']) ?></h3>
            <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]"><?= e($treatment['detail']) ?></p>
            <span class="mt-auto inline-flex items-center gap-2 pt-6 text-sm font-extrabold text-brand-blue">
              Read More <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
            </span>
          </div>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- ─── Therapy, psychiatry, or both ─────────────────────────────────── -->
<section class="bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> Where to start</p>
        <h2 class="<?= $h2 ?>">Therapy, psychiatry,<br><em class="italic font-normal text-brand-blue">or both?</em></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[300px]">
        Most people start with one and add the other when it helps. Here is the plain difference.
      </p>
    </div>

    <div class="lg:grid lg:grid-cols-[minmax(160px,0.7fr)_minmax(0,1fr)_minmax(0,1fr)] lg:gap-x-6">
      <div class="hidden lg:block"></div>
      <div class="hidden rounded-t-[20px] bg-therapy px-8 pb-6 pt-9 lg:block">
        <h3 class="m-0 font-serif text-[28px] font-normal tracking-[-0.02em] text-brand-blue-dark">Therapy</h3>
      </div>
      <div class="hidden rounded-t-[20px] bg-psych px-8 pb-6 pt-9 lg:block">
        <h3 class="m-0 font-serif text-[28px] font-normal tracking-[-0.02em] text-clay">Psychiatry</h3>
      </div>

      <?php foreach ($data['compare_rows'] as $row): ?>
        <div class="mb-4 overflow-hidden rounded-2xl border border-ink/10 lg:mb-0 lg:contents">
          <div class="flex items-center border-ink/15 bg-[#faf8f3] px-5 py-5 text-base font-extrabold text-ink lg:border-t lg:bg-transparent lg:px-0 lg:py-6 lg:pr-4"><?= e($row['label']) ?></div>
          <div class="bg-therapy px-5 py-5 sm:px-8 lg:border-t lg:border-brand-blue/20 lg:py-6">
            <span class="mb-1.5 block text-[11px] font-extrabold uppercase tracking-[0.14em] text-brand-blue/70 lg:hidden">Therapy</span>
            <p class="m-0 text-[15px] font-medium leading-relaxed text-brand-blue-dark"><?= e($row['therapy']) ?></p>
          </div>
          <div class="bg-psych px-5 py-5 sm:px-8 lg:border-t lg:border-brand-orange/30 lg:py-6">
            <span class="mb-1.5 block text-[11px] font-extrabold uppercase tracking-[0.14em] text-clay/70 lg:hidden">Psychiatry</span>
            <p class="m-0 text-[15px] font-medium leading-relaxed text-clay-deep"><?= e($row['psychiatry']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="hidden lg:block"></div>
      <div class="rounded-b-[20px] bg-therapy px-5 pb-10 pt-7 sm:px-8">
        <a href="therapy.php" class="inline-flex items-center gap-2 rounded-full bg-brand-blue px-6 py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-brand-blue-dark">
          About Therapy <?= arrow_icon(15) ?>
        </a>
      </div>
      <div class="mt-4 rounded-b-[20px] bg-psych px-5 pb-10 pt-7 sm:px-8 lg:mt-0">
        <a href="psychiatry.php" class="inline-flex items-center gap-2 rounded-full bg-brand-orange px-6 py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-brand-orange-dark">
          About Psychiatry <?= arrow_icon(15) ?>
        </a>
      </div>
    </div>

    <div data-reveal class="mt-8 flex flex-col items-start gap-4 rounded-[24px] border border-ink/10 bg-cream bg-aurora px-5 py-5 sm:mt-10 sm:flex-row sm:items-center sm:justify-between sm:gap-8 sm:px-8 sm:py-6">
      <div>
        <p class="m-0 text-[16px] font-extrabold tracking-[-0.01em] text-ink">Still not sure where to start?</p>
        <p class="m-0 mt-1 max-w-[52ch] text-sm leading-relaxed text-ink/65">Start with the PHQ-9. It takes two minutes and gives us somewhere to begin — it is a screening questionnaire, not a diagnosis.</p>
      </div>
      <a href="phq9.php" class="<?= $btn_blue ?> shrink-0">Take the PHQ-9 <?= arrow_icon(15) ?></a>
    </div>
  </div>
</section>

<!-- ─── Closing CTA ──────────────────────────────────────────────────── -->
<section id="book" class="px-3 py-3 pb-8 sm:px-5 sm:py-5 sm:pb-12 lg:px-8">
  <div class="relative isolate overflow-hidden rounded-[28px] bg-cream bg-aurora px-5 py-9 text-center sm:px-12 sm:py-14">
    <h2 class="m-0 mx-auto max-w-[22ch] font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(30px,3.4vw,44px)]">
      One assessment,<br><em class="italic font-normal text-brand-blue">then the right treatment.</em>
    </h2>
    <p class="mx-auto m-0 mt-5 max-w-[54ch] text-[15px] leading-[1.75] text-ink/75 sm:text-base sm:leading-[1.8]">
      New patient appointments are usually available within five business days. We check your benefits first, so you know what a visit costs before you walk in.
    </p>
    <div class="mt-7 flex flex-wrap justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>">Call <?= e($site['phone']) ?></a>
    </div>
    <p class="m-0 mt-6 text-xs text-ink/55">In crisis? Call or text 988 any time.</p>
  </div>
</section>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
