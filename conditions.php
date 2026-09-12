<?php
/**
 * Anew Era Health — the conditions index.
 *
 * A hub rather than a condition page, so it does not use
 * includes/condition-page.php. Everything on it is read from
 * $data['conditions'], which is also what the homepage selector and every
 * condition page's related list read — so a condition added there appears
 * here, on the homepage and in six related grids without another edit.
 */
$page_title        = 'Conditions we treat';
$page_description  = 'Depression, anxiety, postpartum depression, PTSD, tinnitus, migraines and OCD — the conditions we treat, and how we treat each one.';
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

// Depression leads the page on its own, because it is the condition with the
// most to say and the one the practice is built around. The rest follow in a
// grid of three, which is why the first row is split off here.
$all      = $data['conditions'];
$featured = $all[0];
$rest     = array_slice($all, 1);
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 240 236 229; background-color: #f0ece5">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/conditions/all-hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[360px]">
      <div class="max-w-[560px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">Conditions</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          Care for the whole<br>range of what<br>you’re <em class="not-italic text-brand-blue">carrying.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[46ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          Seven conditions, one team, and a full diagnostic assessment before anybody writes anything down. Start with whichever of these sounds most like your week.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#list" class="<?= $btn_blue ?>">See the conditions <?= arrow_icon(16) ?></a>
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

<!-- ─── The conditions ───────────────────────────────────────────────── -->
<section id="list" class="<?= $wrap ?> <?= $pad ?> scroll-mt-[110px]">
  <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Conditions we treat</p>
      <h2 class="<?= $h2 ?>">Seven conditions.<br><em class="italic font-normal text-brand-blue">One assessment.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[290px]">
      Every plan starts with a full diagnostic assessment, never a fifteen-minute script.
    </p>
  </div>

  <?php // The lead condition gets a wide card of its own: photograph on one
        // side, the summary and how we treat it on the other. ?>
  <a href="<?= e($featured['page']) ?>" data-reveal class="lift group mb-3 grid overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-white transition-colors hover:border-brand-blue/35 md:mb-4 md:grid-cols-[minmax(0,1fr)_minmax(0,1.15fr)]">
    <div class="relative min-h-[220px] overflow-hidden bg-night md:min-h-[300px]">
      <?= image_slot($featured['slot'], $featured['name'] . ' photo', $featured['alt'], true, 'object-[50%_35%]') ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-card-veil"></div>
    </div>
    <div class="flex flex-col justify-center p-7 sm:p-9 lg:p-11">
      <div class="mb-4 flex items-center gap-3">
        <?= condition_mark($featured, 'h-9 w-9 shrink-0 [filter:brightness(0.62)_saturate(1.25)]') ?>
        <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-ink/45">Most treated</span>
      </div>
      <h3 class="m-0 font-serif text-[30px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[36px]"><?= e($featured['name']) ?></h3>
      <p class="m-0 mt-3 max-w-[46ch] text-[15px] leading-[1.75] text-[#58616a]"><?= e($featured['blurb']) ?></p>
      <div class="mt-5 flex flex-wrap gap-2">
        <?php foreach ($featured['chips'] as $chip): ?>
          <span class="rounded-full border border-ink/15 px-3 py-1.5 text-[12px] font-bold text-ink/70"><?= e($chip) ?></span>
        <?php endforeach; ?>
      </div>
      <span class="mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue">
        Read about <?= e(strtolower($featured['name'])) ?>
        <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
      </span>
    </div>
  </a>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-3">
    <?php foreach ($rest as $condition): ?>
      <li>
        <a href="<?= e($condition['page']) ?>" data-reveal class="lift group flex h-full flex-col overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-white transition-colors hover:border-brand-blue/35">
          <div class="relative min-h-[170px] overflow-hidden bg-night sm:min-h-[190px]">
            <?= image_slot($condition['slot'], $condition['name'] . ' photo', $condition['alt'], false, 'object-[50%_35%]') ?>
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-card-veil"></div>
            <div class="absolute left-4 top-4 flex h-11 w-11 items-center justify-center rounded-full border border-white/60 bg-white/85 backdrop-blur-md">
              <?= condition_mark($condition, 'h-6 w-6 [filter:brightness(0.62)_saturate(1.25)]') ?>
            </div>
          </div>
          <div class="flex flex-1 flex-col p-6 sm:p-7">
            <h3 class="m-0 font-serif text-[24px] font-normal leading-[1.15] tracking-[-0.025em] text-ink"><?= e($condition['name']) ?></h3>
            <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]"><?= e($condition['blurb']) ?></p>
            <div class="mt-4 flex flex-wrap gap-1.5">
              <?php foreach ($condition['chips'] as $chip): ?>
                <span class="rounded-full border border-ink/15 px-2.5 py-1 text-[11px] font-bold text-ink/60"><?= e($chip) ?></span>
              <?php endforeach; ?>
            </div>
            <span class="mt-auto inline-flex items-center gap-2 pt-6 text-sm font-extrabold text-brand-blue">
              Read more
              <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
            </span>
          </div>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <p class="m-0 mt-8 max-w-[68ch] text-sm leading-[1.85] text-[#6c7680]">
    Not seeing yours? These are the conditions we treat most, not the only ones we see. Call and describe what is going on, and we will tell you honestly whether we are the right people.
  </p>
</section>

<!-- ─── One treatment, several conditions ────────────────────────────── -->
<section class="px-3 py-3 sm:px-5 sm:py-5 lg:px-8">
  <div class="grid gap-3 md:gap-4 lg:grid-cols-[minmax(0,0.92fr)_minmax(0,1.08fr)]">

    <div class="relative isolate overflow-hidden rounded-[28px] bg-[#0e537c] px-6 py-8 text-white sm:px-7 sm:py-[38px] lg:px-[45px] lg:py-14">
      <div aria-hidden="true" class="pointer-events-none absolute -bottom-[110px] -right-[210px] h-[370px] w-[370px] rounded-full border border-white/10 shadow-[0_0_0_40px_#ffffff06,0_0_0_80px_#ffffff04]"></div>
      <div class="relative">
        <p class="m-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-white/60 md:mb-[26px]"><?= $dot ?> Why one treatment recurs</p>
        <h2 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-white text-[clamp(30px,3.4vw,44px)]">
          Seven conditions.<br><em class="italic font-normal text-[#cde3de]">One piece of biology.</em>
        </h2>
        <p class="m-0 mt-6 max-w-[44ch] text-[15px] leading-[1.75] text-[#dbe6ee] sm:mt-7 sm:leading-[1.8]">
          TMS appears on all seven of these pages, and that is not a sales tactic. Each of these conditions involves circuits in the prefrontal cortex that have gone underactive or over-excitable, and magnetic stimulation is how you reach them without a drug.
        </p>
        <p class="m-0 mt-4 max-w-[44ch] text-[15px] leading-[1.75] text-[#dbe6ee] sm:leading-[1.8]">
          It is FDA-cleared for depression and for OCD. For the rest, it rests on trial evidence of varying strength, and we will tell you which is which before you start rather than after.
        </p>
        <a href="tms.php" class="mt-7 inline-flex items-center justify-center gap-[22px] rounded-full bg-white px-[25px] py-[17px] text-sm font-bold text-[#154c69] transition-colors hover:bg-[#e6eddc] sm:mt-8">
          How TMS works <?= arrow_icon(17) ?>
        </a>
      </div>
    </div>

    <div class="relative flex min-h-[380px] items-end overflow-hidden rounded-[28px] bg-night sm:min-h-[460px] lg:min-h-[560px]">
      <div class="absolute inset-0">
        <?= image_slot('homepage/tms-new-era.webp', 'TMS treatment photo', 'A smiling patient in the TMS chair while a clinician talks her through the session', false, 'object-[70%_35%]') ?>
      </div>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.40)_0%,rgba(9,20,28,0.58)_22%,rgba(9,20,28,0.84)_52%,rgba(9,20,28,0.94)_100%)]"></div>
      <div class="relative w-full p-6 sm:p-10 lg:p-12">
        <p class="m-0 mb-4 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-green">The through line</p>
        <h3 class="m-0 mb-4 font-serif text-[27px] font-normal leading-[1.1] tracking-[-0.03em] text-white sm:text-[34px]">
          Non-invasive, drug-free, and you drive yourself home.
        </h3>
        <p class="m-0 max-w-[52ch] text-[15px] font-medium leading-[1.7] text-white/85">
          Sessions run between fifteen and forty minutes depending on the protocol, a course spans four to six weeks, and there is no recovery period at the end of any of them.
        </p>
        <div class="mt-6 grid grid-cols-3 gap-3 border-t border-white/25 pt-6 sm:mt-8 sm:flex sm:flex-wrap sm:gap-12 sm:pt-7">
          <?php foreach ([
            ['value' => '2',  'label' => 'conditions FDA-cleared', 'color' => '#e8922f'],
            ['value' => '7',  'label' => 'conditions treated here', 'color' => '#86be52'],
            ['value' => '0',  'label' => 'days of recovery time',   'color' => '#ffffff'],
          ] as $fact): ?>
            <div>
              <p class="display-mark m-0 text-[19px] font-extrabold tracking-[-0.03em] sm:text-[30px]" style="color:<?= e($fact['color']) ?>" data-count="<?= e($fact['value']) ?>"><?= e($fact['value']) ?></p>
              <p class="m-0 mt-1 text-[12px] leading-[1.35] text-white/75 sm:text-[13px]"><?= e($fact['label']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── Treatments ───────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> <?= $pad ?>">
  <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> How we treat them</p>
      <h2 class="<?= $h2 ?>">Five routes out.<br><em class="italic font-normal text-brand-blue">One plan.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[290px]">
      Whichever condition brought you here, the care is delivered by one team reading the same notes.
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

  <div data-reveal class="mt-7 flex flex-col items-start gap-4 rounded-[24px] border border-ink/10 bg-cream bg-aurora px-5 py-5 sm:mt-9 sm:flex-row sm:items-center sm:justify-between sm:gap-8 sm:px-8 sm:py-6">
    <div>
      <p class="m-0 text-[16px] font-extrabold tracking-[-0.01em] text-ink">Not sure which of these is yours?</p>
      <p class="m-0 mt-1 max-w-[52ch] text-sm leading-relaxed text-ink/65">That is what the assessment is for. The PHQ-9 takes two minutes and gives us somewhere to start — it is a screening questionnaire, not a diagnosis.</p>
    </div>
    <a href="index.php#book" class="<?= $btn_blue ?> shrink-0">Take the PHQ-9 <?= arrow_icon(15) ?></a>
  </div>
</section>

<!-- ─── Closing CTA ──────────────────────────────────────────────────── -->
<section id="book" class="px-3 pb-8 sm:px-5 sm:pb-12 lg:px-8">
  <div class="relative isolate overflow-hidden rounded-[28px] bg-cream bg-aurora px-5 py-9 text-center sm:px-12 sm:py-14">
    <h2 class="m-0 mx-auto max-w-[20ch] font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(30px,3.4vw,44px)]">
      Start with a name for it,<br><em class="italic font-normal text-brand-blue">then a plan.</em>
    </h2>
    <p class="mx-auto m-0 mt-5 max-w-[54ch] text-[15px] leading-[1.75] text-ink/75 sm:text-base sm:leading-[1.8]">
      Most new patients are seen within a week. We check your benefits first, so you know what a visit costs before you walk in.
    </p>
    <div class="mt-7 flex flex-wrap justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Book a consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>">Call <?= e($site['phone']) ?></a>
    </div>
    <p class="m-0 mt-6 text-xs text-ink/55">In crisis? Call or text 988 any time.</p>
  </div>
</section>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
