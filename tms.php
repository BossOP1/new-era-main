<?php
/**
 * Anew Era Health — TMS therapy.
 *
 * The treatment page rather than a condition page, so it does not use
 * includes/condition-page.php. It reads $data['conditions'] for the list of
 * what TMS treats and $data['insurers'] for the coverage strip, so both stay
 * in step with the rest of the site.
 *
 * The two videos are Magstim's, not ours, and the section that holds them says
 * so plainly — see the note above it.
 */
$page_title        = 'TMS therapy';
$page_description  = 'Transcranial magnetic stimulation is FDA-cleared, drug-free and non-invasive. What it is, how a session works, what it treats, and what it costs.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

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
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 233 238 241; background-color: #e9eef1">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/tms/session.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[360px]">
      <div class="max-w-[560px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="treatments.php" class="transition-colors hover:text-brand-blue">Treatments</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">TMS therapy</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          Magnetic pulses.<br>No medication.<br><em class="not-italic text-brand-blue">No downtime.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[46ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          Transcranial magnetic stimulation is FDA-cleared, non-invasive and drug-free. You sit in a chair fully awake for about half an hour, then drive yourself home and get on with your day.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#book" class="<?= $btn_blue ?>">See If TMS Is Right for You <?= arrow_icon(16) ?></a>
          <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-ink/65 sm:mt-6">
          Most plans cover TMS once two medications have been tried. <a href="#cost" class="font-extrabold text-brand-blue underline decoration-brand-blue/30 underline-offset-4 hover:decoration-brand-blue">What It Costs</a>.
        </p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>FDA-cleared for depression and OCD. In-network with most major plans.</span>
      <span>Delivered on Magstim equipment</span>
    </div>
  </section>
</div>

<!-- ─── Section rail ─────────────────────────────────────────────────── -->
<nav aria-label="On this page" class="sticky top-[98px] z-30 border-b border-ink/10 bg-[#faf8f3]/92 backdrop-blur-md sm:top-[114px]">
  <div class="<?= $wrap ?> flex items-center gap-1 overflow-x-auto py-2.5 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
    <?php foreach ([
      '#what'    => 'What it is',
      '#how'     => 'How it works',
      '#session' => 'A session',
      '#watch'   => 'Watch',
      '#treats'  => 'What it treats',
      '#cost'    => 'Cost & insurance',
      '#faq'     => 'FAQs',
    ] as $href => $label): ?>
      <a href="<?= e($href) ?>" class="whitespace-nowrap rounded-full px-3.5 py-2 text-[13px] font-bold text-ink/65 transition-colors hover:bg-white hover:text-brand-blue"><?= e($label) ?></a>
    <?php endforeach; ?>
  </div>
</nav>

<!-- ─── 01 · What it is ──────────────────────────────────────────────── -->
<section id="what" class="<?= $wrap ?> <?= $pad ?> <?= $anchor ?> grid items-start gap-7 sm:gap-[34px] md:grid-cols-[minmax(0,1.15fr)_minmax(0,0.85fr)] md:gap-[45px] lg:gap-[70px]">
  <div>
    <p class="<?= $eyebrow ?>"><?= $dot ?> 01 / What it is</p>
    <h2 class="<?= $h2 ?>">Not shock therapy.<br><em class="<?= $em ?>">Not a drug.</em></h2>

    <div class="mt-5 space-y-3.5 sm:mt-6 sm:space-y-4 md:mt-7">
      <p class="m-0 font-serif text-[19px] leading-[1.45] text-[#24333c] sm:text-[20px] sm:leading-[1.5] md:text-[22px]">
        A coil rests against your scalp and delivers magnetic pulses to a specific part of the brain. That is the whole intervention.
      </p>
      <p class="<?= $lede ?>">
        The pulses are the same class of magnetic field an MRI scanner uses. They pass painlessly through the skull and induce a small electrical current in the tissue underneath, which stimulates nerve cells that have gone underactive. Nothing is implanted, nothing is swallowed, and you are awake for all of it.
      </p>
      <p class="<?= $lede ?>">
        It is worth saying plainly what TMS is not, because people arrive braced for something else. It is not electroconvulsive therapy. There is no seizure, no general anesthetic, and no memory loss associated with it.
      </p>
    </div>

    <?php // The four facts that used to sit in a card on the right, compressed
          // into a strip so the photograph can have that side. ?>
    <dl class="m-0 mt-7 grid grid-cols-2 gap-x-5 gap-y-4 rounded-[20px] border border-[#e3e7ea] bg-white px-6 py-5 sm:mt-8 sm:gap-x-8 sm:gap-y-5 sm:px-7 sm:py-6">
      <?php foreach ([
        ['FDA-cleared',   'Depression 2008, OCD 2018'],
        ['Outpatient',    'No hospital stay'],
        ['No anesthesia', 'Awake, and you drive home'],
        ['Drug-free',     'Nothing in your bloodstream'],
      ] as [$term, $def]): ?>
        <div>
          <dt class="m-0 text-[14px] font-extrabold leading-[1.3] tracking-[-0.01em] text-ink"><?= e($term) ?></dt>
          <dd class="m-0 mt-1 text-[12px] leading-[1.45] text-[#6c7680]"><?= e($def) ?></dd>
        </div>
      <?php endforeach; ?>
    </dl>

    <p class="m-0 mt-4 max-w-[60ch] text-[13px] leading-[1.7] text-[#6c7680]">
      Whether TMS is right for you is a clinical judgement, not a form. The assessment is where that gets decided.
    </p>

    <a href="#how" class="mt-6 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-sm font-bold text-brand-blue transition-colors hover:border-brand-blue sm:mt-7">
      How It Works on the Brain <?= arrow_icon(16) ?>
    </a>
  </div>

  <figure class="relative isolate m-0 overflow-hidden rounded-[28px] border border-[#e5e9ec] bg-white p-2.5 shadow-[0_20px_50px_rgba(20,32,43,0.07)] md:sticky md:top-[176px]">
    <div class="relative h-[260px] overflow-hidden rounded-[20px] bg-night sm:h-[460px] md:h-[580px]">
      <?= image_slot('homepage/tms-new-era-2.jpg', 'TMS coil in position', 'A patient resting under the Magstim coil during a TMS session', false, 'object-[50%_42%]') ?>
      <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-transparent"></div>
      <figcaption class="absolute inset-x-5 bottom-5 font-serif text-[21px] leading-[1.25] text-white sm:text-[23px]">
        The whole intervention.
      </figcaption>
    </div>
  </figure>
</section>

<!-- ─── Scale ────────────────────────────────────────────────────────── -->
<section class="px-3 pb-3 sm:px-5 sm:pb-5 lg:px-8">
  <div class="relative isolate flex flex-col gap-3 overflow-hidden rounded-[24px] bg-[#0e537c] px-6 py-7 text-white sm:flex-row sm:items-center sm:justify-between sm:gap-10 sm:px-10 sm:py-8">
    <div aria-hidden="true" class="pointer-events-none absolute -right-[150px] -top-[120px] h-[300px] w-[300px] rounded-full border border-white/10 shadow-[0_0_0_36px_#ffffff06]"></div>
    <p class="relative m-0 max-w-[32ch] font-serif text-[21px] leading-[1.3] tracking-[-0.02em] sm:text-[26px]">
      More than <em class="not-italic text-[#cde3de]" data-count="1 million">1 million</em> TMS treatments have been delivered in the United States.
    </p>
    <p class="relative m-0 shrink-0 text-[13px] leading-[1.6] text-white/70 sm:max-w-[26ch] sm:text-right">
      It has been in routine clinical use for well over a decade.
      <span class="mt-1 block text-[10px] font-bold uppercase tracking-[0.15em] text-[#8fc7e8]">Industry figure</span>
    </p>
  </div>
</section>

<!-- ─── 02 · How it works ────────────────────────────────────────────── -->
<section id="how" class="<?= $anchor ?> bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> 02 / How it works</p>
        <h2 class="<?= $h2 ?>">Waking up a circuit<br><em class="<?= $em ?>">that has gone quiet.</em></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[290px]">
        Depression is not only a feeling. It has a measurable signature in how parts of the brain fire.
      </p>
    </div>

    <figure class="relative m-0 mb-3 h-[190px] overflow-hidden rounded-[24px] bg-night sm:mb-4 sm:h-[320px] lg:mb-[22px] lg:h-[360px]">
      <?= image_slot('treat-1', 'Brain imaging', 'A rendering of the human brain with the prefrontal cortex highlighted') ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(90deg,rgba(9,20,28,0.80)_0%,rgba(9,20,28,0.36)_48%,rgba(9,20,28,0.06)_100%)]"></div>
      <figcaption class="absolute bottom-5 left-5 max-w-[26ch] font-serif text-[20px] leading-[1.25] text-white sm:bottom-7 sm:left-9 sm:max-w-[32ch] sm:text-[26px]">
        The target is the <em class="not-italic text-[#cde3de]">prefrontal cortex.</em>
      </figcaption>
    </figure>

    <ol class="-mx-[22px] m-0 flex snap-x snap-mandatory list-none gap-3 overflow-x-auto scroll-pl-[22px] px-[22px] pb-2 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:mx-0 md:grid md:snap-none md:grid-cols-3 md:gap-[22px] md:overflow-visible md:px-0 md:pb-0">
      <?php foreach ([
        ['01', 'Find the spot', 'Your first session is mapping. We locate the motor threshold — the power level at which a pulse makes your thumb twitch — and use it to set your dose. It is specific to you, and it is why the first visit runs longer.'],
        ['02', 'Deliver the pulses', 'The coil sits over the left dorsolateral prefrontal cortex. Pulses arrive in short trains with rests between them. You hear a click and feel a tapping on the scalp.'],
        ['03', 'Let it accumulate', 'One session does very little. The effect is built by repetition across four to six weeks, as the circuit strengthens through neuroplasticity — the brain forming new pathways.'],
      ] as [$n, $name, $copy]): ?>
        <li data-reveal class="relative flex w-[80%] shrink-0 snap-center flex-col rounded-[20px] border-t-2 border-brand-blue/25 bg-[#faf8f3] p-6 md:w-auto md:shrink md:p-[30px]">
          <span class="display-mark m-0 text-[34px] font-medium leading-none tracking-[-0.03em] text-brand-blue/35"><?= e($n) ?></span>
          <h3 class="m-0 mb-3 mt-5 font-serif text-[25px] font-normal leading-[1.15] tracking-[-0.03em] text-ink md:mb-3.5 md:mt-6 lg:text-[27px]"><?= e($name) ?></h3>
          <p class="m-0 text-sm leading-[1.85] text-[#58616a]"><?= e($copy) ?></p>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ─── 03 · A session ───────────────────────────────────────────────── -->
<section id="session" class="<?= $wrap ?> <?= $pad ?> <?= $anchor ?>">
  <div class="grid items-start gap-7 sm:gap-[34px] md:grid-cols-[minmax(0,0.78fr)_minmax(0,1.22fr)] md:gap-[45px] lg:gap-[70px]">

    <figure class="relative isolate m-0 overflow-hidden rounded-[28px] border border-[#e5e9ec] bg-white p-2.5 shadow-[0_20px_50px_rgba(20,32,43,0.07)] md:sticky md:top-[176px]">
      <div class="relative h-[240px] overflow-hidden rounded-[20px] sm:h-[440px] md:h-[520px]">
        <?= image_slot('tms/chair.jpg', 'TMS treatment chair', 'A patient sitting in the TMS chair holding a television remote, with a technician beside her', false, 'object-[50%_30%]') ?>
        <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/55 via-transparent to-transparent"></div>
        <figcaption class="absolute inset-x-5 bottom-5 font-serif text-[21px] leading-[1.25] text-white sm:text-[23px]">
          Most people watch something.
        </figcaption>
      </div>
    </figure>

    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> 03 / A session, start to finish</p>
      <h2 class="<?= $h2 ?>">Thirty-odd minutes.<br><em class="<?= $em ?>">Then your day.</em></h2>
      <p class="m-0 mt-6 max-w-[46ch] text-base leading-[1.8] text-[#58616a]">
        Sessions run Monday to Friday for four to six weeks. The first one is longer because it includes mapping. After that the routine is the same every time.
      </p>

      <ol class="m-0 mt-6 list-none p-0 sm:mt-7">
        <?php foreach ([
          ['You arrive', 'No preparation, no fasting, nothing to stop taking. Come as you are, on your way to or from work.'],
          ['You settle in', 'You sit in a reclining chair, fully clothed and fully awake. Earplugs go in, because the coil clicks.'],
          ['The coil is positioned', 'A technician places it against your scalp using the coordinates from your mapping session, and checks them each time.'],
          ['The pulses run', 'Trains of pulses with rests between them. You feel a tapping. People read, watch something, or listen to a podcast.'],
          ['You leave', 'No recovery period. You drive yourself home, back to work, or wherever you were going.'],
        ] as $i => [$name, $copy]): ?>
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
        <?php foreach ([
          ['19 min', 'a typical session',      '#e8922f'],
          ['36',     'sessions in a course',   '#5f8f38'],
          ['0',      'days of recovery time',  '#0f639b'],
        ] as [$v, $l, $c]): ?>
          <div>
            <p class="display-mark m-0 text-[22px] font-extrabold tracking-[-0.03em] sm:text-[30px]" style="color:<?= e($c) ?>" data-count="<?= e($v) ?>"><?= e($v) ?></p>
            <p class="m-0 mt-1 text-[12px] leading-[1.35] text-ink/60 sm:text-[13px]"><?= e($l) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ─── Watch ────────────────────────────────────────────────────────────
     Both films are Magstim's, the manufacturer of the equipment we treat on,
     and the section says so in the eyebrow, the copy and on each card. That
     matters: the people in the testimonial reel are not our patients, and a
     practice page must not leave anyone thinking otherwise.

     Each card is a facade — a local poster frame and a button that swaps in
     the YouTube iframe on click. Nothing is requested from YouTube, and no
     tracking cookie is set, until a visitor chooses to play something. -->
<section id="watch" class="<?= $anchor ?> bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> From Magstim, our equipment maker</p>
        <h2 class="<?= $h2 ?>">See it explained,<br><em class="<?= $em ?>">and see it work.</em></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[400px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[320px]">
        Two short films made by Magstim, who build the system we treat on. The people in them are their patients rather than ours.
      </p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 md:gap-[22px]">
      <?php foreach ([
        ['IyIEqO2Juig', 'what-is-tms',     'What Is TMS?',      'A two-minute explainer on what the treatment does and why.'],
        ['2WD-ObEHhSg', 'changing-lives',  'TMS Changing Lives','Magstim patients describing what the course did for them.'],
      ] as [$id, $slug, $title, $blurb]): ?>
        <figure class="m-0 overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-[#faf8f3]">
          <div class="relative aspect-video bg-night" data-video="<?= e($id) ?>" data-video-title="<?= e($title) ?>">
            <img src="<?= e(asset('assets/img/tms/video-' . $slug . '.jpg')) ?>" alt="" aria-hidden="true" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.15)_0%,rgba(9,20,28,0.45)_100%)]"></div>
            <button type="button"
                    data-video-play
                    class="group absolute inset-0 flex cursor-pointer items-center justify-center border-0 bg-transparent p-0">
              <span class="sr-only">Play &ldquo;<?= e($title) ?>&rdquo; on YouTube</span>
              <span aria-hidden="true" class="flex h-16 w-16 items-center justify-center rounded-full border border-white/50 bg-white/90 shadow-lg backdrop-blur-md transition-transform duration-200 group-hover:scale-110 sm:h-[76px] sm:w-[76px]">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="#0f639b" class="ml-1"><path d="M6 4.5v15l13-7.5z"/></svg>
              </span>
            </button>
          </div>
          <figcaption class="p-6 sm:p-7">
            <div class="flex items-center gap-2.5">
              <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-ink/45">Magstim</span>
            </div>
            <h3 class="m-0 mt-2 font-serif text-[24px] font-normal leading-[1.15] tracking-[-0.025em] text-ink"><?= e($title) ?></h3>
            <p class="m-0 mt-2 text-[14px] leading-[1.7] text-[#58616a]"><?= e($blurb) ?></p>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>

    <p class="m-0 mt-6 text-[13px] leading-[1.7] text-[#6c7680]">
      Playing a film loads it from YouTube, which sets its own cookies. Nothing is requested from them until you press play.
    </p>
  </div>
</section>

<!-- ─── 04 · What it treats ──────────────────────────────────────────── -->
<section id="treats" class="<?= $wrap ?> <?= $pad ?> <?= $anchor ?>">
  <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> 04 / What it treats</p>
      <h2 class="<?= $h2 ?>">Cleared for two.<br><em class="<?= $em ?>">Used for more.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[400px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[320px]">
      TMS is FDA-cleared for depression and for OCD. Everywhere else it rests on trial evidence of varying strength, and we will tell you which is which.
    </p>
  </div>

  <ul class="m-0 grid list-none grid-cols-2 gap-2.5 p-0 sm:gap-3 lg:grid-cols-3">
    <?php foreach ($data['conditions'] as $condition): ?>
      <?php $cleared = in_array($condition['art'], ['depression', 'ocd'], true); ?>
      <li>
        <a href="<?= e($condition['page']) ?>" class="lift group flex h-full items-center gap-3 rounded-2xl border border-[#e3e7ea] bg-white px-4 py-4 transition-colors hover:border-brand-blue/35 sm:gap-4 sm:px-6 sm:py-5">
          <?= condition_mark($condition, 'h-7 w-7 shrink-0 [filter:brightness(0.62)_saturate(1.25)] sm:h-9 sm:w-9') ?>
          <span class="min-w-0 flex-1">
            <span class="block text-[14px] font-extrabold tracking-[-0.02em] text-ink sm:text-[17px]"><?= e($condition['name']) ?></span>
            <?php if ($cleared): ?>
              <span class="mt-0.5 block text-[10px] font-bold uppercase tracking-[0.14em] text-brand-green-dark">FDA-cleared</span>
            <?php endif; ?>
          </span>
          <span class="hidden text-brand-blue transition-transform duration-200 group-hover:translate-x-1 sm:inline"><?= arrow_icon(17) ?></span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- ─── Accelerated TMS, and safety ──────────────────────────────────── -->
<section class="px-3 py-3 sm:px-5 sm:py-5 lg:px-8">
  <div class="grid gap-3 md:gap-4 lg:grid-cols-2">

    <div class="relative flex min-h-[420px] items-end overflow-hidden rounded-[28px] bg-night sm:min-h-[480px]">
      <div class="absolute inset-0">
        <?= image_slot('treat-2', 'Accelerated TMS', 'Clinicians reviewing brain scans on a screen') ?>
      </div>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.35)_0%,rgba(9,20,28,0.60)_30%,rgba(9,20,28,0.92)_100%)]"></div>
      <div class="relative w-full p-6 sm:p-9 lg:p-11">
        <p class="m-0 mb-4 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-green">Accelerated TMS</p>
        <h3 class="m-0 mb-4 font-serif text-[27px] font-normal leading-[1.1] tracking-[-0.03em] text-white sm:text-[32px]">
          A six-week course, compressed into days.
        </h3>
        <p class="m-0 max-w-[48ch] text-[15px] font-medium leading-[1.7] text-white/85">
          Several sessions a day across a short block rather than one a day for weeks. It suits people who cannot take six weeks out, and people who need the change sooner than that. It is not right for everyone, and the assessment is where we work out whether it is right for you.
        </p>
        <a href="index.php#book" class="mt-7 inline-flex items-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
          Ask About Accelerated TMS <?= arrow_icon(16) ?>
        </a>
      </div>
    </div>

    <div class="rounded-[28px] border border-[#e3e7ea] bg-white p-7 sm:p-9 lg:p-11">
      <p class="<?= $eyebrow ?>"><?= $dot ?> Safety and side effects</p>
      <h3 class="m-0 font-serif text-[27px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[32px]">
        What to expect, <em class="<?= $em ?>">including the bad days.</em>
      </h3>
      <p class="m-0 mt-5 text-[15px] leading-[1.75] text-[#58616a]">
        TMS is well tolerated, which is not the same as having no effects at all. Here is the honest list.
      </p>

      <ul class="m-0 mt-6 list-none p-0">
        <?php foreach ([
          ['Common', 'Scalp discomfort under the coil and headaches, usually in the first week and usually settling as the course goes on.', 'bg-brand-green'],
          ['Less common', 'Lightheadedness, or facial twitching during the pulses that stops when they do.', 'bg-brand-orange'],
          ['Rare', 'Seizure. The risk is real but very low, and it is why we screen for epilepsy, metal implants near the head and certain medications before you start.', 'bg-[#c05621]'],
        ] as [$level, $copy, $colour]): ?>
          <li class="flex items-start gap-3.5 border-b border-ink/10 py-4 last:border-0 last:pb-0">
            <span aria-hidden="true" class="mt-[7px] h-[7px] w-[7px] shrink-0 rounded-full <?= $colour ?>"></span>
            <span class="text-[14px] leading-[1.7] text-[#58616a]"><strong class="font-extrabold text-ink"><?= e($level) ?>.</strong> <?= e($copy) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>

      <p class="m-0 mt-6 rounded-2xl border border-brand-blue/20 bg-mist px-5 py-4 text-[14px] leading-[1.7] text-brand-blue-dark">
        No anesthesia, no sedation, no memory loss. TMS is not electroconvulsive therapy and the two are not comparable on safety.
      </p>
    </div>
  </div>
</section>

<!-- ─── 05 · Cost and insurance ──────────────────────────────────────── -->
<section id="cost" class="<?= $anchor ?> bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="grid items-start gap-7 sm:gap-[34px] md:grid-cols-[minmax(0,1fr)_minmax(0,1fr)] md:gap-[45px] lg:gap-[70px]">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> 05 / Cost and insurance</p>
        <h2 class="<?= $h2 ?>">Covered more often<br><em class="<?= $em ?>">than people expect.</em></h2>
        <p class="m-0 mt-6 max-w-[46ch] text-base leading-[1.8] text-[#58616a]">
          Insurers worked out some time ago that a course of TMS costs less than years of unsuccessful medication and what follows it. Most plans now cover TMS for treatment-resistant depression when three conditions are met.
        </p>

        <ol class="m-0 mt-6 list-none p-0">
          <?php // The criteria live in includes/data-insurance.php, which
                // insurance.php prints too, so the two pages cannot drift apart.
                $tms_criteria = (require __DIR__ . '/includes/data-insurance.php')['tms_criteria'];
                foreach ($tms_criteria as $i => $criterion): ?>
            <li class="flex items-start gap-4 border-b border-ink/12 py-4">
              <span aria-hidden="true" class="w-6 shrink-0 font-serif text-[15px] text-brand-blue/70"><?= sprintf('%02d', $i + 1) ?></span>
              <span class="text-[15px] font-medium leading-[1.6] text-ink"><?= e($criterion) ?></span>
            </li>
          <?php endforeach; ?>
        </ol>

        <p class="m-0 mt-5 text-[13px] leading-[1.7] text-[#6c7680]">
          Criteria vary between carriers and between plans within a carrier. Tricare covers TMS for veterans with PTSD and major depressive disorder.
        </p>
      </div>

      <div class="rounded-[24px] border border-[#e3e7ea] bg-[#faf8f3] p-6 shadow-[0_16px_44px_rgba(20,32,43,0.05)] sm:p-8">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/45">What we do about it</p>
        <div class="mt-5 space-y-5 sm:mt-6">
          <?php foreach ([
            ['We verify your benefits', 'Before your first appointment, not after it. You will know what your plan covers and what it leaves you.'],
            ['We handle prior authorisation', 'The paperwork that gates TMS coverage is ours to do, and we do it.'],
            ['We quote self-pay up front', 'If you are not covered, or you would rather not involve your insurer, we will give you the total for a course before you commit. Private pay also avoids the delays that authorisation can add.'],
          ] as [$name, $copy]): ?>
            <div class="flex items-start gap-3.5">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#5f8f38" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="mt-1 shrink-0"><path d="m5 12.5 4.5 4.5L19 7"/></svg>
              <div>
                <p class="m-0 text-[15px] font-extrabold leading-[1.4] text-ink"><?= e($name) ?></p>
                <p class="m-0 mt-1 text-[13px] leading-[1.7] text-[#6c7680]"><?= e($copy) ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <a href="index.php#book" class="<?= $btn_blue ?> mt-7 w-full justify-center sm:w-auto">Verify My Coverage <?= arrow_icon(16) ?></a>
      </div>
    </div>

    <?php // The same marquee the homepage runs, so the carrier list stays in
          // one place rather than being retyped here. ?>
    <div class="mt-9 border-t border-ink/15 pt-8 sm:mt-12 sm:pt-10">
      <p class="m-0 mb-5 text-center text-xs font-extrabold uppercase tracking-[0.16em] text-ink/50">In-network with</p>
      <div class="marquee-mask w-full min-w-0 overflow-hidden">
        <div class="flex w-max animate-marquee items-center gap-14">
          <?php for ($copy = 0; $copy < 2; $copy++): ?>
            <?php foreach ($data['insurers'] as $insurer): ?>
              <?= insurer_mark($insurer, $copy > 0) ?>
            <?php endforeach; ?>
          <?php endfor; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ─── FAQ ──────────────────────────────────────────────────────────── -->
<section id="faq" class="<?= $anchor ?> bg-mist">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="grid items-start gap-7 sm:gap-10 lg:grid-cols-[minmax(0,0.8fr)_minmax(0,1.2fr)] lg:gap-[72px]">
      <div>
        <p class="m-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-blue/70 md:mb-[26px]"><?= $dot ?> Questions</p>
        <h2 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-brand-blue-dark text-[clamp(33px,3.9vw,52px)]">TMS,<br><em class="italic font-normal text-brand-blue">answered plainly.</em></h2>
        <p class="m-0 mt-6 max-w-[34ch] text-base leading-[1.8] text-brand-blue">
          Still stuck on something? Ask us on the call — there is no question we have not heard before.
        </p>
        <a href="<?= e($site['phone_href']) ?>" class="mt-6 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-sm font-bold text-brand-blue transition-colors hover:border-brand-blue sm:mt-7">
          <?= e($site['phone']) ?> <?= arrow_icon(16) ?>
        </a>
      </div>

      <div>
        <?php foreach ([
          ['Does it hurt?', 'No anesthesia or sedation is involved and you stay awake throughout. Most people describe a tapping sensation on the scalp, and some find the first few sessions uncomfortable under the coil. Scalp soreness and headaches are the common side effects and they usually settle within the first week.'],
          ['Is this the same as electroconvulsive therapy?', 'No, and it is the question we get most. ECT induces a seizure under general anesthetic and can affect memory. TMS does neither. You are awake, you go home on your own, and there is no memory effect associated with it.'],
          ['How soon will I feel something?', 'Most people who respond notice it somewhere between weeks two and four, and it often shows up first as sleep or energy rather than mood. Some feel nothing until later in the course. A full course is four to six weeks for a reason.'],
          ['What if it does not work?', 'Then we say so and change the plan rather than repeating it. TMS does not work for everyone, and your prescriber and therapist are in the same practice precisely so the next option is a conversation rather than a fresh start somewhere else.'],
          ['Can I keep taking my medication?', 'Usually yes. TMS is often run alongside medication rather than instead of it, and nothing needs to be stopped before you begin. Any change is a decision made with your prescriber.'],
          ['Do I need a referral?', 'No. You can call us directly and book an assessment. If you do have a referring clinician we will coordinate with them, with your consent.'],
          ['Am I a candidate?', 'That is what the assessment decides. The things that rule TMS out are mostly physical: a history of seizures, and metal implants or devices in or near the head. We screen for all of it before anything starts.'],
        ] as $i => [$q, $a]): ?>
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

<!-- ─── Closing CTA ──────────────────────────────────────────────────── -->
<section id="book" class="<?= $anchor ?> px-3 pb-8 sm:px-5 sm:pb-12 lg:px-8">
  <div class="relative isolate overflow-hidden rounded-[28px] bg-cream bg-aurora px-5 py-9 sm:px-12 sm:py-12 lg:py-16">
    <div class="mx-auto grid max-w-[1160px] items-center gap-7 sm:gap-10 lg:grid-cols-[minmax(0,1.05fr)_minmax(0,0.95fr)] lg:gap-16">
      <div>
        <h2 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(30px,3.4vw,44px)]">
          Find out whether<br><em class="<?= $em ?>">TMS is for you.</em>
        </h2>
        <p class="m-0 mt-4 max-w-[50ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-5 sm:text-base sm:leading-[1.8]">
          It starts with an assessment, not a commitment. We check whether you are a candidate, verify your benefits, and tell you honestly if something else would serve you better.
        </p>
        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="index.php#book" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
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

<script>
/* Video facades — the poster frame is local, and nothing is requested from
   YouTube until somebody presses play. Swapping the iframe in on click keeps
   the page fast and keeps YouTube's cookies off it for visitors who never
   watch anything. */
(function () {
  document.querySelectorAll('[data-video]').forEach(function (holder) {
    var button = holder.querySelector('[data-video-play]');
    if (!button) { return; }

    button.addEventListener('click', function () {
      var frame = document.createElement('iframe');
      frame.src = 'https://www.youtube-nocookie.com/embed/' + holder.dataset.video + '?autoplay=1&rel=0';
      frame.title = holder.dataset.videoTitle + ' — Magstim, on YouTube';
      frame.width = '560';
      frame.height = '315';
      frame.loading = 'lazy';
      frame.allow = 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
      frame.allowFullscreen = true;
      frame.className = 'absolute inset-0 h-full w-full border-0';
      holder.textContent = '';
      holder.appendChild(frame);
    });
  });
})();
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
