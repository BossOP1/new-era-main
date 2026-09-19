<?php
/**
 * Anew Era Health — the Magstim Horizon® 3.0 with StimGuide® PRO.
 *
 * The equipment page. tms.php explains the treatment; this explains the
 * machine it is delivered on, for the readers who want to know what is
 * actually going to be pointed at their head.
 *
 * ⚠ Everything factual here is Magstim's, taken from magstim.com: the
 * specifications, the FDA clearance dates and indications, the navigation
 * accuracy figures and the product photography. It is attributed as theirs on
 * the page and in assets/img/CREDITS.md, the same way tms.php handles their
 * films. Two things to settle before this goes live:
 *   · Confirm the practice has Magstim's permission to use their product
 *     photography. Manufacturers usually supply it to providers for exactly
 *     this, but "usually" is not a licence.
 *   · Confirm which Horizon the clinics actually run. This page describes the
 *     3.0 with StimGuide PRO. Magstim also sells Horizon Inspire and Horizon
 *     Lite, which do not have the navigation, so if any clinic is on one of
 *     those the targeting section is wrong for that clinic.
 *
 * Nothing here claims an outcome. Cleared is not the same as approved and not
 * the same as effective for you, and the page says so.
 */
$page_title        = 'Magstim Horizon® 3.0 with StimGuide® PRO';
$page_description  = 'The TMS system we treat on: the Magstim Horizon® 3.0 with StimGuide® PRO navigation. What it is, what the navigation does, what the FDA has cleared it for, and what any of it means from the chair.';
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

/** A Magstim photograph, captioned as theirs. */
$shot = static function (string $file, string $alt, string $classes = 'aspect-[16/10]'): string {
    return sprintf(
        '<div class="relative overflow-hidden rounded-[20px] bg-[#eef1f3] %s">'
        . '<img src="%s" alt="%s" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover">'
        . '<span class="absolute bottom-3 right-3 rounded-full bg-white/85 px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.12em] text-ink/55 backdrop-blur-sm">Magstim</span>'
        . '</div>',
        e($classes),
        e(asset('assets/img/magstim/' . $file)),
        e($alt)
    );
};

// What the FDA has cleared the system for. Dates and wording from Magstim's
// own clearance announcement — see the note at the top of this file.
$indications = [
    ['name' => 'Major depressive disorder',
     'who'  => 'Adults who have not responded to prior antidepressant medication.'],
    ['name' => 'Obsessive-compulsive disorder',
     'who'  => 'Adults, as an adjunct — alongside other treatment rather than instead of it.'],
    ['name' => 'Anxious depression',
     'who'  => 'Decreasing anxiety symptoms in adults with MDD and comorbid anxiety.'],
    ['name' => 'Adolescent depression',
     'who'  => 'Ages 15 to 21. We see patients from 13, but this indication starts at 15.'],
];

// The four things the navigation holds steady, from Magstim's description.
$parameters = [
    ['name' => 'Contact',     'copy' => 'That the coil is actually against your head, not hovering a few millimetres off it.'],
    ['name' => 'XY location', 'copy' => 'The spot on the scalp, found at your first session and returned to at every one after.'],
    ['name' => 'Tilt',        'copy' => 'The angle the coil sits at against the curve of your head.'],
    ['name' => 'Rotation',    'copy' => 'Which way round the coil is, which changes the direction of the field.'],
];

// What the hardware choices mean once you are in the chair.
$in_the_chair = [
    ['name' => 'Air-cooled, so the day keeps moving',
     'copy' => 'The coil is cooled as it works, with the cooling adjusting to the coil and the room. In practice that is what lets a clinic run appointments back to back instead of waiting for equipment to cool between them.'],
    ['name' => 'No pulse decay',
     'copy' => 'Magstim states the system holds its output steady rather than weakening across a session, so the last pulses of a treatment are the same as the first.'],
    ['name' => 'Your dose, measured first',
     'copy' => 'Before a course starts, your motor threshold is measured — the power level at which a pulse over the motor cortex produces a small movement in your hand. Your treatment is set from that, not from an average.'],
    ['name' => 'One coil, four indications',
     'copy' => 'Magstim describes the Horizon as the only TMS system covering its four cleared indications with a single treatment coil, which means no coil change if your plan changes.'],
];
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-white sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="background-color: #0d1a21">
    <?php // Magstim's photograph, flipped so the patient sits clear of the copy
          // column — the same move the condition heroes make. The veil puts the
          // darkness behind the type rather than over the whole frame. ?>
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10 scale-x-[-1]" style="background-image:url('<?= e(asset('assets/img/magstim/technology.jpg')) ?>')"></div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-place-veil"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[350px]">
      <div class="max-w-[620px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-white/65">
            <li><a href="index.php#top" class="transition-colors hover:text-white">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="tms.php" class="transition-colors hover:text-white">TMS therapy</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-sky">Our system</li>
          </ol>
        </nav>

        <h1 class="on-footage m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-white text-[34px] sm:text-[50px] lg:text-[56px]">
          The machine we<br class="hidden sm:inline"> treat you <em class="not-italic text-brand-sky">on.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[50ch] text-[15px] leading-[1.75] text-white/80 sm:mt-6 sm:text-base">
          The Magstim Horizon<sup>&reg;</sup> 3.0 with StimGuide<sup>&reg;</sup> PRO. It is the navigated version of
          the system — the coil is tracked by camera, so the spot found at your first session is the
          spot treated at every session after it.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="index.php#book" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
          <a href="#watch" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/45 bg-white/10 px-7 py-[14px] text-[15px] font-extrabold text-white backdrop-blur-sm transition-colors hover:border-white/80 hover:bg-white/20">Watch It Explained</a>
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-white/75 sm:mt-6">
          FDA-cleared for four indications. Cleared is not the same as approved, and neither is a
          promise it will work for you — <a href="#cleared" class="font-extrabold text-brand-sky underline decoration-brand-sky/40 underline-offset-4 hover:decoration-brand-sky">what that means</a>.
        </p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-white/30 pt-4 text-[11px] text-white/85 sm:mt-8">
      <span>Horizon<sup>&reg;</sup>, StimGuide<sup>&reg;</sup> and the photography on this page are Magstim's.</span>
      <span>Specifications as published by Magstim</span>
    </div>
  </section>
</div>

<!-- ─── What it is ───────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pt-10 sm:pt-14 md:pt-[76px]">
  <div class="grid items-center gap-8 lg:grid-cols-[minmax(0,1fr)_minmax(0,1fr)] lg:gap-16">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> What it is</p>
      <h2 class="<?= $h2 ?>">A TMS system,<br><em class="italic font-normal text-brand-blue">and a camera.</em></h2>
      <p class="m-0 mt-6 max-w-[52ch] text-base leading-[1.8] text-[#58616a]">
        A TMS system is three things in a room: a chair you sit in, a coil held against your head, and
        a stimulator that drives it. The Horizon<sup>&reg;</sup> 3.0 is Magstim's clinical model, and
        StimGuide<sup>&reg;</sup> PRO is the navigation built into it — a camera that watches where the
        coil is and tells the technician when it is in the right place.
      </p>
      <p class="m-0 mt-4 max-w-[52ch] text-base leading-[1.8] text-[#58616a]">
        That is the whole of the difference, and it is not a small one. A course of TMS is around
        thirty sessions. Hitting the same square centimetre thirty times in a row is a harder problem
        than it sounds, and it is the problem the camera exists to solve.
      </p>
      <p class="m-0 mt-6 text-[13.5px] leading-[1.7] text-ink/60">
        Magstim cleared the Horizon 3.0 with StimGuide PRO with the FDA on 30 January 2024.
      </p>
    </div>
    <?= $shot('h3-stimguide.jpg', 'The Magstim Horizon 3.0 system with StimGuide PRO: treatment chair, stimulator cart and navigation arm') ?>
  </div>
</section>

<!-- ─── StimGuide PRO ────────────────────────────────────────────────── -->
<section id="navigation" class="<?= $wrap ?> scroll-mt-[110px] <?= $pad ?>">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> StimGuide PRO</p>
      <h2 class="<?= $h2 ?>">Four things it<br><em class="italic font-normal text-brand-blue">holds steady.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
      Magstim describes the navigation as aligning four parameters at once. Get one wrong and the
      pulse lands somewhere other than where it was meant to.
    </p>
  </div>

  <div class="grid gap-3 md:gap-4 lg:grid-cols-[minmax(0,1.1fr)_minmax(0,1fr)]">
    <ul class="m-0 grid list-none content-start gap-3 p-0 sm:grid-cols-2 md:gap-4">
      <?php foreach ($parameters as $i => $param): ?>
        <li data-reveal class="flex h-full flex-col rounded-[22px] border border-[#e3e7ea] bg-white p-7">
          <span class="font-serif text-[30px] font-normal leading-none text-brand-blue/35"><?= e(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)) ?></span>
          <h3 class="m-0 mt-3.5 text-[16px] font-extrabold tracking-[-0.01em] text-ink"><?= e($param['name']) ?></h3>
          <p class="m-0 mt-2 text-[14px] leading-[1.7] text-[#58616a]"><?= e($param['copy']) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>
    <?= $shot('range.jpg', 'A clinician using the StimGuide PRO navigation screen while positioning the coil', 'aspect-[4/3] min-h-full') ?>
  </div>

  <?php // The numbers get the full width: they are the point of the section,
        // and at two-fifths of it they read as a footnote to the photograph. ?>
  <div data-reveal class="mt-3 overflow-hidden rounded-[24px] bg-[#10202c] bg-reviews-glow px-7 py-8 text-white md:mt-4 sm:px-10 sm:py-9">
    <div class="lg:flex lg:items-center lg:gap-14">
      <div class="lg:w-[260px] lg:shrink-0">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-brand-green">Magstim's figures</p>
        <p class="m-0 mt-2.5 font-serif text-[22px] font-normal leading-[1.2] tracking-[-0.02em] sm:text-[25px]">How close the camera holds it.</p>
      </div>

      <dl class="m-0 mt-6 grid gap-6 sm:grid-cols-2 lg:mt-0 lg:flex-1 lg:gap-12">
        <div class="border-t border-white/20 pt-5 lg:border-l lg:border-t-0 lg:pl-10 lg:pt-0">
          <dt class="m-0 font-serif text-[40px] leading-none tracking-[-0.02em] sm:text-[48px]">&le;&thinsp;&plusmn;0.2<span class="text-[22px] sm:text-[26px]">mm</span></dt>
          <dd class="m-0 mt-2.5 text-[13px] leading-[1.55] text-white/65">Typical positional accuracy of the navigation camera.</dd>
        </div>
        <div class="border-t border-white/20 pt-5 lg:border-l lg:border-t-0 lg:pl-10 lg:pt-0">
          <dt class="m-0 font-serif text-[40px] leading-none tracking-[-0.02em] sm:text-[48px]">&le;&thinsp;&plusmn;0.1<span class="text-[22px] sm:text-[26px]">&deg;</span></dt>
          <dd class="m-0 mt-2.5 text-[13px] leading-[1.55] text-white/65">Typical rotational accuracy, so the coil returns the same way round.</dd>
        </div>
      </dl>
    </div>

    <p class="m-0 mt-7 border-t border-white/20 pt-5 text-[12.5px] leading-[1.65] text-white/60">
      These are the camera's published specifications, not a claim about how well treatment works.
    </p>
  </div>
</section>

<!-- ─── Cleared for ──────────────────────────────────────────────────── -->
<section id="cleared" class="<?= $wrap ?> scroll-mt-[110px] pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> FDA clearance</p>
      <h2 class="<?= $h2 ?>">What it is<br><em class="italic font-normal text-brand-blue">cleared for.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
      Clearance means the FDA accepted the system as substantially equivalent to one already on the
      market. It is a regulatory bar, not a prediction about you.
    </p>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4">
    <?php foreach ($indications as $ind): ?>
      <li data-reveal class="flex items-start gap-4 rounded-[22px] border border-[#e3e7ea] bg-white p-7">
        <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" class="mt-1 shrink-0 text-brand-green"><path d="m5 12.5 4.5 4.5L19 7.5"></path></svg>
        <div>
          <h3 class="m-0 text-[16.5px] font-extrabold tracking-[-0.01em] text-ink"><?= e($ind['name']) ?></h3>
          <p class="m-0 mt-2 text-[14px] leading-[1.7] text-[#58616a]"><?= e($ind['who']) ?></p>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>

  <p class="m-0 mt-5 max-w-[86ch] text-[13.5px] leading-[1.7] text-ink/60">
    Whether a course is right for you is a clinical decision made at your evaluation, and whether your
    insurer will pay for it is a separate question again —
    <a href="insurance.php" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">we check that before you commit</a>.
  </p>
</section>

<!-- ─── In the chair ─────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9">
    <p class="<?= $eyebrow ?>"><?= $dot ?> From the chair</p>
    <h2 class="<?= $h2 ?>">What any of it<br><em class="italic font-normal text-brand-blue">means for you.</em></h2>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4">
    <?php foreach ($in_the_chair as $item): ?>
      <li data-reveal class="flex h-full flex-col rounded-[22px] bg-white p-7 sm:p-8">
        <h3 class="m-0 font-serif text-[21px] font-normal leading-[1.2] tracking-[-0.02em] text-ink"><?= e($item['name']) ?></h3>
        <p class="m-0 mt-3 text-[14.5px] leading-[1.75] text-[#58616a]"><?= e($item['copy']) ?></p>
      </li>
    <?php endforeach; ?>
  </ul>

  <div data-reveal class="mt-3 grid items-center gap-8 rounded-[24px] border border-[#e3e7ea] bg-white p-7 md:mt-4 md:grid-cols-[minmax(0,1fr)_minmax(0,0.9fr)] md:gap-12 sm:p-9">
    <div>
      <p class="<?= $eyebrow ?> !mb-3"><?= $dot ?> Between sessions</p>
      <h3 class="m-0 font-serif text-[24px] font-normal leading-[1.12] tracking-[-0.03em] text-ink sm:text-[29px]">Your targeting travels with you.</h3>
      <p class="m-0 mt-4 max-w-[48ch] text-[14.5px] leading-[1.75] text-[#58616a]">
        Magstim Connect stores the navigation data, so the target found at your first session can be
        recalled on another Horizon 3.0 in the same organisation. If your course has to move clinic
        mid-way, the map of your head moves with it.
      </p>
      <a href="tms.php" class="mt-5 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">
        What a Course Involves <?= arrow_icon(14) ?>
      </a>
    </div>
    <?= $shot('connect.jpg', 'The Magstim Connect software shown on a desktop monitor and a laptop', 'aspect-[16/10]') ?>
  </div>
</section>

<!-- ─── Watch ────────────────────────────────────────────────────────────
     Both films are Magstim's, and the section says so in the eyebrow, the copy
     and on each card. Tish is Magstim's patient, not ours, and a practice page
     must not leave anyone thinking otherwise.

     Each card is a facade — a local poster frame and a button that swaps in the
     YouTube iframe on click. Nothing is requested from YouTube, and no cookie
     is set, until a visitor chooses to play something. -->
<section id="watch" class="scroll-mt-[110px] bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> From Magstim, our equipment maker</p>
        <h2 class="<?= $h2 ?>">See the system,<br><em class="italic font-normal text-brand-blue">and hear a patient.</em></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[400px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
        Two short films made by Magstim, who build the system we treat on. The patient in the second
        is theirs rather than ours.
      </p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 md:gap-[22px]">
      <?php foreach ([
        ['NRnDHaiaRFA', 'horizon-stimguide', 'Horizon 3.0 with StimGuide PRO', 'Magstim\'s own walkthrough of the system described on this page.'],
        ['937QadE0j1U', 'tish-story',        'TMS Stories: Tish\'s story',      'One of Magstim\'s patients on what a course of TMS did for her.'],
      ] as [$id, $slug, $title, $blurb]): ?>
        <figure class="m-0 overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-[#faf8f3]">
          <div class="relative aspect-video bg-night" data-video="<?= e($id) ?>" data-video-title="<?= e($title) ?>">
            <img src="<?= e(asset('assets/img/magstim/video-' . $slug . '.jpg')) ?>" alt="" aria-hidden="true" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover">
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.15)_0%,rgba(9,20,28,0.45)_100%)]"></div>
            <button type="button" data-video-play
                    class="group absolute inset-0 flex cursor-pointer items-center justify-center border-0 bg-transparent p-0">
              <span class="sr-only">Play &ldquo;<?= e($title) ?>&rdquo; on YouTube</span>
              <span aria-hidden="true" class="flex h-16 w-16 items-center justify-center rounded-full border border-white/50 bg-white/90 shadow-lg backdrop-blur-md transition-transform duration-200 group-hover:scale-110 sm:h-[76px] sm:w-[76px]">
                <svg width="26" height="26" viewBox="0 0 24 24" fill="#0f639b" class="ml-1"><path d="M6 4.5v15l13-7.5z"/></svg>
              </span>
            </button>
          </div>
          <figcaption class="p-6 sm:p-7">
            <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-ink/45">Magstim</span>
            <h3 class="m-0 mt-2 font-serif text-[23px] font-normal leading-[1.15] tracking-[-0.025em] text-ink"><?= e($title) ?></h3>
            <p class="m-0 mt-2 text-[14px] leading-[1.7] text-[#58616a]"><?= e($blurb) ?></p>
          </figcaption>
        </figure>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ─── Attribution ──────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-10 sm:pb-[60px]">
  <div class="rounded-[22px] border border-dashed border-ink/20 px-7 py-6">
    <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">About this page</p>
    <p class="m-0 mt-3 max-w-[92ch] text-[13.5px] leading-[1.75] text-ink/65">
      Horizon<sup>&reg;</sup>, StimGuide<sup>&reg;</sup> and Magstim Connect are Magstim's products and
      trademarks, and we are a clinic that treats on their equipment rather than a party to it. The
      specifications, clearance dates and photographs on this page are Magstim's own, published at
      <a href="https://www.magstim.com/" target="_blank" rel="noopener" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">magstim.com</a>.
      Nothing here is a claim by us about how well treatment works — for that, see
      <a href="tms.php" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">what TMS is and what it does not do</a>.
    </p>
  </div>
</section>

<!-- ─── Book ─────────────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-12 sm:pb-[80px]">
  <div data-reveal class="relative flex flex-col items-center justify-center gap-5 rounded-[28px] bg-cream bg-cta-glow px-6 py-10 text-center sm:gap-6 sm:px-12 sm:py-14">
    <?= brand_glyph('h-16 w-auto') ?>
    <h2 class="m-0 max-w-[20ch] font-serif text-[30px] font-normal leading-[1.08] tracking-[-0.035em] text-ink sm:text-[42px]">
      See it for yourself.
    </h2>
    <p class="m-0 max-w-[54ch] text-[15px] leading-[1.75] text-ink/70">
      Ask to see the room at your consultation. Most people find the machine a good deal less
      intimidating once they have sat next to it.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
    </div>
  </div>
</section>

</div>

<script>
/* Video facades — the poster frame is local, and nothing is requested from
   YouTube until somebody presses play. Swapping the iframe in on click keeps
   the page fast and keeps YouTube's cookies off it for visitors who never
   watch anything. Same construction as tms.php. */
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
