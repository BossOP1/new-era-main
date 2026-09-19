<?php
/**
 * Shared location page.
 *
 * A page file at the root names its clinic and requires this:
 *
 *   <?php
 *   $location_key = 'huntington-beach';
 *   require __DIR__ . '/includes/location-page.php';
 *
 * Everything specific to the clinic is in includes/data-locations.php. Who
 * works there is read from includes/data-team.php, filtered to whoever is
 * tagged with that clinic — tag somebody there and they appear here, with
 * their photograph, credentials and bio, without this file being touched.
 *
 * The hero wants assets/img/locations/<key>.jpg, a photograph of the place
 * rather than the office. Where one is missing the panel falls back to the
 * brand wash, so a clinic without a photograph yet still has a working page.
 *
 * Booking: where a clinician has a verified ZocDoc profile their card links
 * to it. Where there is not one, the card falls back to the site's own
 * booking flow rather than guessing at a URL.
 */

$locations = require __DIR__ . '/data-locations.php';

if (!isset($location_key, $locations[$location_key])) {
    http_response_code(500);
    exit('location-page.php: unknown location key.');
}

$loc = $locations[$location_key];

$page_title        = 'Psychiatrist in ' . $loc['name'] . ', ' . $loc['address']['region'];
$page_description  = $loc['meta'];
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/header.php';

$team   = require __DIR__ . '/data-team.php';
$people = array_values(array_filter(
    $team['people'],
    static fn (array $p): bool => in_array($loc['name'] . ', ' . $loc['address']['region'], $p['clinics'], true)
));

// Prescribers first, then therapists — the order somebody scanning for "a
// psychiatrist near me" is looking in.
usort($people, static function (array $a, array $b): int {
    $rank = ['psychiatry' => 0, 'leadership' => 1, 'therapy' => 2];
    return [$rank[$a['group']] ?? 9, $a['name']] <=> [$rank[$b['group']] ?? 9, $b['name']];
});

$prescribers = array_filter($people, static fn (array $p): bool => $p['group'] !== 'therapy');
$therapists  = array_filter($people, static fn (array $p): bool => $p['group'] === 'therapy');

$conditions = array_values(array_filter(
    $data['conditions'],
    static fn (array $c): bool => in_array($c['name'], $loc['conditions'], true)
));

$addr      = $loc['address'];
$addr_line = $addr['street'] . ', ' . $addr['city'] . ', ' . $addr['region'] . ' ' . $addr['postcode'];

// Shared spacing and type, lifted from team.php so the hub pages match.
$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';

/** Initials, for a clinician whose headshot has not been supplied. */
$initials = static function (string $name): string {
    $parts = preg_split('/\s+/', trim($name)) ?: [];
    return strtoupper(mb_substr($parts[0] ?? '', 0, 1) . mb_substr(count($parts) > 1 ? end($parts) : '', 0, 1));
};
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-white sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="background-color: #0d1a21">
    <?php
      /* A real photograph of the place, at full strength — the veil puts the
         darkness behind the copy rather than over the whole frame. Office
         photography replaces it later. A clinic without a photograph yet gets
         the brand wash instead, so its page still works. */
      $hero_photo = 'assets/img/locations/' . $location_key . '.jpg';
      if (is_file(__DIR__ . '/../' . $hero_photo)):
    ?>
      <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset($hero_photo)) ?>')"></div>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-place-veil"></div>
    <?php else: ?>
      <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-aurora opacity-40"></div>
    <?php endif; ?>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[350px]">
      <div class="max-w-[600px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-white/65">
            <li><a href="index.php#top" class="transition-colors hover:text-white">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="team.php#<?= e($loc['state']) ?>" class="transition-colors hover:text-white"><?= e($loc['state_name']) ?></a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-sky"><?= e($loc['name']) ?></li>
          </ol>
        </nav>

        <?php // The break is held back on a phone, where "Psychiatry and TMS in"
              // does not fit on one line and leaves "in" stranded on its own. ?>
        <h1 class="on-footage m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-white text-[34px] sm:text-[52px] lg:text-[58px]">
          <?= e($loc['h1']) ?><br class="hidden sm:inline"> <em class="not-italic text-brand-sky"><?= e($loc['name']) ?>.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[50ch] text-[15px] leading-[1.75] text-white/80 sm:mt-6 sm:text-base">
          <?= e($loc['lede']) ?>
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#clinicians" class="<?= $btn_blue ?>">Meet the Clinicians <?= arrow_icon(16) ?></a>
          <a href="<?= e($loc['maps']) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/45 bg-white/10 px-7 py-[14px] text-[15px] font-extrabold text-white backdrop-blur-sm transition-colors hover:border-white/80 hover:bg-white/20">
            Get Directions
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"/></svg>
          </a>
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-white/85 sm:mt-6">
          <?php if ($addr['building'] !== ''): ?><?= e($addr['building']) ?>, <?php endif; ?><?= e($addr['street']) ?> &middot;
          <a href="<?= e($loc['phone_href']) ?>" class="font-extrabold text-brand-sky underline decoration-brand-sky/40 underline-offset-4 hover:decoration-brand-sky"><?= e($loc['phone']) ?></a>
        </p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-white/30 pt-4 text-[11px] text-white/85 sm:mt-8">
      <span><?= e(count($people)) ?> clinicians at this clinic &middot; In person and by telehealth</span>
      <span>Serving <?= e(implode(', ', array_slice($loc['serves'], 0, 4))) ?> and nearby</span>
    </div>
  </section>
</div>

<!-- ─── Visit details ────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-2 pt-10 sm:pt-14">
  <div class="grid gap-3 md:grid-cols-3 md:gap-4">

    <div data-reveal class="rounded-[22px] border border-[#e3e7ea] bg-white p-7">
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">Address</p>
      <address class="m-0 mt-3 not-italic text-[15px] leading-[1.7] text-ink/80">
        <?php if ($addr['building'] !== ''): ?><span class="block font-extrabold text-ink"><?= e($addr['building']) ?></span><?php endif; ?>
        <?= e($addr['street']) ?><br>
        <?= e($addr['city']) ?>, <?= e($addr['region']) ?> <?= e($addr['postcode']) ?>
      </address>
      <a href="<?= e($loc['maps']) ?>" target="_blank" rel="noopener" class="mt-4 inline-flex items-center gap-2 text-[13.5px] font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">
        Get Directions <?= arrow_icon(13) ?>
      </a>
    </div>

    <div data-reveal class="rounded-[22px] border border-[#e3e7ea] bg-white p-7">
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">Hours</p>
      <dl class="m-0 mt-3">
        <?php foreach ($loc['hours'] as $row): ?>
          <div class="flex items-baseline justify-between gap-4 border-b border-ink/[0.07] py-2 last:border-b-0">
            <dt class="m-0 text-[14px] text-ink/70"><?= e($row['days']) ?></dt>
            <dd class="m-0 text-[14px] font-extrabold text-ink"><?= e($row['time']) ?></dd>
          </div>
        <?php endforeach; ?>
      </dl>
      <p class="m-0 mt-3 text-[12.5px] leading-[1.6] text-ink/55"><?= e($loc['hours_note']) ?></p>
    </div>

    <div data-reveal class="flex flex-col rounded-[22px] bg-[#10202c] bg-reviews-glow p-7 text-white">
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-brand-green">Book</p>
      <p class="m-0 mt-3 font-serif text-[22px] font-normal leading-[1.25] tracking-[-0.02em]">Most new patients are seen within a week.</p>
      <p class="m-0 mt-2.5 text-[13.5px] leading-[1.65] text-white/70">We check your insurance before your first visit, so you know what it costs before you walk in.</p>
      <div class="mt-auto pt-5">
        <a href="<?= e($loc['phone_href']) ?>" class="inline-flex items-center gap-2.5 rounded-full bg-white px-6 py-3.5 text-[14px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
          <?= e($loc['phone']) ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── The clinicians ───────────────────────────────────────────────── -->
<section id="clinicians" class="<?= $wrap ?> scroll-mt-[110px] <?= $pad ?>">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Who you would see</p>
      <h2 class="<?= $h2 ?>">The clinicians at<br><em class="italic font-normal text-brand-blue"><?= e($loc['name']) ?>.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
      <?php
        // Allen has one prescriber and no therapist; "and 0 therapists" is
        // technically true and reads like a fault, so the clause drops out.
        $plural = static fn (int $n, string $w): string => $n . ' ' . $w . ($n === 1 ? '' : 's');
        $who = $plural(count($prescribers), 'prescriber');
        if ($therapists) {
            $who .= ' and ' . $plural(count($therapists), 'therapist');
        }
        echo e($who), count($people) === 1 ? ' works' : ' work';
      ?> from this clinic. Book with one by name, or let the intake team match you.
    </p>
  </div>

  <?php
    // Prescribers lead, in their own band, because "psychiatrist near me" is
    // what brings most people to a page like this. Therapists follow.
    $blocks = [
        ['label' => 'Psychiatry and medication', 'note' => 'Diagnosis, and medication management where it is the right tool.', 'people' => $prescribers],
        ['label' => 'Therapy',                   'note' => 'CBT, DBT, EMDR and ACT, in person or by telehealth.',            'people' => $therapists],
    ];
    foreach ($blocks as $block):
      if (!$block['people']) continue;
  ?>
    <div class="mb-4 mt-8 flex flex-wrap items-baseline gap-x-4 gap-y-1 first:mt-0">
      <h3 class="m-0 text-[13px] font-bold uppercase tracking-[0.14em] text-ink"><?= e($block['label']) ?></h3>
      <p class="m-0 text-[13px] text-ink/50"><?= e($block['note']) ?></p>
    </div>

    <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-3">
      <?php foreach ($block['people'] as $p): ?>
        <?php $has_zocdoc = !empty($p['zocdoc']); ?>
        <li data-reveal class="flex h-full flex-col overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-white">
          <div class="flex items-center gap-4 p-6 pb-5 sm:p-7 sm:pb-5">
            <?php if ($p['photo'] !== '' && is_file(__DIR__ . '/../assets/img/' . $p['photo'])): ?>
              <img src="<?= e(asset('assets/img/' . $p['photo'])) ?>" alt="<?= e($p['name']) ?>" width="200" height="250" loading="lazy" decoding="async"
                   class="h-[84px] w-[68px] shrink-0 rounded-[14px] object-cover">
            <?php else: ?>
              <span aria-hidden="true" class="flex h-[84px] w-[68px] shrink-0 items-center justify-center rounded-[14px] bg-mist font-serif text-[22px] text-brand-blue"><?= e($initials($p['name'])) ?></span>
            <?php endif; ?>
            <div class="min-w-0">
              <h4 class="m-0 font-serif text-[21px] font-normal leading-[1.15] tracking-[-0.02em] text-ink"><?= e($p['name']) ?></h4>
              <?php if ($p['credentials'] !== ''): ?>
                <p class="m-0 mt-1 text-[10.5px] font-extrabold uppercase tracking-[0.12em] text-brand-blue"><?= e($p['credentials']) ?></p>
              <?php endif; ?>
              <p class="m-0 mt-1.5 text-[13px] leading-[1.45] text-[#58616a]"><?= e($p['role']) ?></p>
            </div>
          </div>

          <?php if (!empty($p['bio'][0])): ?>
            <p class="m-0 line-clamp-4 px-6 text-[13.5px] leading-[1.65] text-[#58616a] sm:px-7"><?= e($p['bio'][0]) ?></p>
          <?php endif; ?>

          <div class="mt-auto flex flex-wrap items-center gap-x-4 gap-y-2 px-6 pb-6 pt-5 sm:px-7 sm:pb-7">
            <?php if ($has_zocdoc): ?>
              <a href="<?= e($p['zocdoc']) ?>" target="_blank" rel="noopener"
                 class="inline-flex items-center gap-2 rounded-full bg-brand-blue px-5 py-2.5 text-[13px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">
                Book on Zocdoc
                <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"/></svg>
              </a>
            <?php else: ?>
              <a href="index.php#book" class="inline-flex items-center gap-2 rounded-full bg-brand-blue px-5 py-2.5 text-[13px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">
                Request an Appointment <?= arrow_icon(12) ?>
              </a>
            <?php endif; ?>
            <a href="team.php#<?= e($p['slug']) ?>" class="text-[13px] font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">Full Bio</a>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  <?php endforeach; ?>

  <p class="m-0 mt-6 text-[13.5px] leading-[1.7] text-ink/60">
    Not sure who to ask for? Call <a href="<?= e($loc['phone_href']) ?>" class="font-extrabold text-brand-blue underline underline-offset-4"><?= e($loc['phone']) ?></a> and the
    intake team will match you — and you can change clinician later at no cost.
    <a href="team.php#<?= e($loc['state']) ?>" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">See the Whole <?= e($loc['state_name']) ?> Team</a>.
  </p>
</section>

<!-- ─── Treatments here ──────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9">
    <p class="<?= $eyebrow ?>"><?= $dot ?> What we offer here</p>
    <h2 class="<?= $h2 ?>"><?= e(count($loc['treatments'])) ?> treatments,<br><em class="italic font-normal text-brand-blue">under one roof.</em></h2>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 md:grid-cols-3 md:gap-4">
    <?php foreach ($loc['treatments'] as $t): ?>
      <li>
        <a href="<?= e($t['page']) ?>" data-reveal class="lift group flex h-full flex-col rounded-[24px] border border-[#e3e7ea] bg-white p-7 transition-colors hover:border-brand-blue/35 sm:p-8">
          <?= nav_icon($t['icon'], 'h-[26px] w-[26px] shrink-0 text-brand-blue') ?>
          <h3 class="m-0 mt-4 font-serif text-[24px] font-normal leading-[1.1] tracking-[-0.03em] text-ink"><?= e($t['name']) ?></h3>
          <p class="m-0 mt-2.5 text-[14.5px] leading-[1.7] text-[#58616a]"><?= e($t['copy']) ?></p>
          <span class="mt-auto pt-5 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue">
            About <?= e($t['name']) ?>
            <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
          </span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php if ($conditions): ?>
    <div data-reveal class="mt-3 rounded-[24px] border border-[#e3e7ea] bg-white p-7 sm:p-9 md:mt-4">
      <div class="md:flex md:items-center md:gap-10">
        <div class="md:max-w-[300px]">
          <h3 class="m-0 font-serif text-[23px] font-normal leading-[1.12] tracking-[-0.03em] text-ink">Most asked about here.</h3>
          <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]">Every plan starts with a full diagnostic assessment, whichever of these brought you.</p>
        </div>
        <ul class="m-0 mt-5 grid list-none gap-2 p-0 sm:grid-cols-2 md:mt-0 md:flex-1">
          <?php foreach ($conditions as $c): ?>
            <li>
              <a href="<?= e($c['page']) ?>" class="group/c flex items-center gap-3 rounded-[16px] border border-[#e3e7ea] px-4 py-3 transition-colors hover:border-brand-blue/35 hover:bg-[#faf8f3]">
                <?= condition_mark($c, 'h-7 w-7 shrink-0 [filter:brightness(0.62)_saturate(1.25)]') ?>
                <span class="text-[14.5px] font-extrabold text-ink"><?= e($c['name']) ?></span>
                <span class="ml-auto text-brand-blue opacity-0 transition group-hover/c:opacity-100"><?= arrow_icon(13) ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  <?php endif; ?>
</section>

<!-- ─── Getting here ─────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Finding us</p>
      <h2 class="<?= $h2 ?>">Getting to<br><em class="italic font-normal text-brand-blue"><?= e($loc['street_name']) ?>.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
      We also see patients from <?= e(implode(', ', array_slice($loc['serves'], 0, -1))) ?> and <?= e(end($loc['serves'])) ?>.
    </p>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 md:grid-cols-3 md:gap-4">
    <?php foreach ($loc['getting_here'] as $item): ?>
      <li data-reveal class="rounded-[22px] bg-white p-7">
        <h3 class="m-0 text-[15.5px] font-extrabold tracking-[-0.01em] text-ink"><?= e($item['name']) ?></h3>
        <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]"><?= e($item['copy']) ?></p>
      </li>
    <?php endforeach; ?>
  </ul>

  <div data-reveal class="mt-3 flex flex-col gap-4 rounded-[22px] border border-[#e3e7ea] bg-white p-7 sm:flex-row sm:items-center sm:justify-between md:mt-4">
    <div>
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">Insurance</p>
      <p class="m-0 mt-2 max-w-[62ch] text-[14.5px] leading-[1.7] text-[#58616a]">
        We are in-network with most major <?= e($loc['state_name']) ?> carriers and verify your benefits before your first appointment.
      </p>
    </div>
    <a href="insurance.php" class="shrink-0 inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 px-6 py-3 text-[14px] font-extrabold text-ink transition-colors hover:border-ink/45">
      See the Carriers <?= arrow_icon(14) ?>
    </a>
  </div>
</section>

<!-- ─── Questions ────────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-6 sm:mb-8">
    <p class="<?= $eyebrow ?>"><?= $dot ?> Questions</p>
    <h2 class="<?= $h2 ?>">About this<br><em class="italic font-normal text-brand-blue">clinic.</em></h2>
  </div>

  <div class="overflow-hidden rounded-[20px] border border-[#e3e7ea] bg-white">
    <?php foreach ($loc['faqs'] as $i => $faq): ?>
      <details class="group border-b border-ink/10 last:border-b-0"<?= $i === 0 ? ' open' : '' ?>>
        <summary class="flex cursor-pointer list-none items-start justify-between gap-5 px-6 py-5 text-[15.5px] font-extrabold leading-[1.45] tracking-[-0.01em] text-ink transition-colors hover:text-brand-blue [&::-webkit-details-marker]:hidden sm:px-7 sm:text-[17px]">
          <span><?= e($faq['q']) ?></span>
          <span aria-hidden="true" class="mt-0.5 shrink-0 text-[22px] font-normal leading-none text-brand-blue">
            <span class="group-open:hidden">+</span><span class="hidden group-open:inline">&minus;</span>
          </span>
        </summary>
        <p class="m-0 max-w-[70ch] px-6 pb-6 text-[14.5px] leading-[1.75] text-[#58616a] sm:px-7"><?= e($faq['a']) ?></p>
      </details>
    <?php endforeach; ?>
  </div>

  <p class="m-0 mt-5 text-[13.5px] leading-[1.7] text-ink/60">
    More on first visits, insurance and treatment in our
    <a href="faq.php" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">full FAQ</a>.
  </p>
</section>

<!-- ─── Book ─────────────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-12 sm:pb-[80px]">
  <div data-reveal class="relative flex flex-col items-center justify-center gap-5 rounded-[28px] bg-cream bg-cta-glow px-6 py-10 text-center sm:gap-6 sm:px-12 sm:py-14">
    <?= brand_glyph('h-16 w-auto') ?>
    <h2 class="m-0 max-w-[20ch] font-serif text-[30px] font-normal leading-[1.08] tracking-[-0.035em] text-ink sm:text-[42px]">
      Start in <?= e($loc['name']) ?>.
    </h2>
    <p class="m-0 max-w-[54ch] text-[15px] leading-[1.75] text-ink/70">
      Most new patients are seen within a week, and we check your insurance before your first visit.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($loc['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($loc['phone']) ?></a>
    </div>
    <p class="m-0 text-[12px] text-ink/55">In crisis? Call or text 988 any time.</p>
  </div>
</section>

</div>

<?php
/* Structured data, so the clinic can be understood as a place: address, hours,
   phone and the clinicians who work there. Figures are the ones printed above. */
$schema = [
    '@context' => 'https://schema.org',
    '@type'    => 'MedicalClinic',
    'name'     => $site['name'] . ' — ' . $loc['name'],
    'url'      => $loc['page'],
    'telephone'=> $loc['phone'],
    'address'  => [
        '@type'           => 'PostalAddress',
        'streetAddress'   => $addr['street'],
        'addressLocality' => $addr['city'],
        'addressRegion'   => $addr['region'],
        'postalCode'      => $addr['postcode'],
        'addressCountry'  => 'US',
    ],
    'openingHoursSpecification' => [[
        '@type'     => 'OpeningHoursSpecification',
        'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
        'opens'     => '06:00',
        'closes'    => '18:00',
    ]],
    'medicalSpecialty' => 'Psychiatric',
    'areaServed'       => array_map(static fn (string $c): array => ['@type' => 'City', 'name' => $c], $loc['serves']),
    'employee'         => array_map(static fn (array $p): array => array_filter([
        '@type'          => 'Person',
        'name'           => $p['name'],
        'honorificSuffix'=> $p['credentials'] ?: null,
        'jobTitle'       => $p['role'],
        'sameAs'         => $p['zocdoc'] ?? null,
    ]), $people),
];
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

<?php require __DIR__ . '/footer.php'; ?>
