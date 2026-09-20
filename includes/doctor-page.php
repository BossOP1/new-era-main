<?php
/**
 * Shared clinician page.
 *
 * A page file at the root names its clinician and requires this:
 *
 *   <?php
 *   $doctor_key = 'dexter-jones';
 *   require __DIR__ . '/includes/doctor-page.php';
 *
 * The person comes from includes/data-team.php, keyed by their slug, and the
 * clinics they work at come from includes/data-locations.php via the
 * 'clinics' entry on the person. Tag somebody with another clinic there and
 * this page picks it up — the clinic panel, the schema and the colleagues
 * list all follow from it, without this file being touched.
 *
 * One page per clinician, not one per clinician-and-clinic: Terry Eagan works
 * at four sites and four near-identical pages would compete with each other
 * in search. The clinic panel lists all four and links to each location page.
 *
 * Booking: where a clinician has a verified ZocDoc profile the buttons link
 * to it. Where there is not one, they fall back to the clinic's phone number
 * and the site's own booking flow rather than guessing at a URL.
 *
 * These pages replaced the bio dialog on the location pages. team.php still
 * uses its own dialog for the full roster.
 */

$team = require __DIR__ . '/data-team.php';

$person = null;
foreach ($team['people'] as $candidate) {
    if ($candidate['slug'] === ($doctor_key ?? null)) {
        $person = $candidate;
        break;
    }
}

if ($person === null) {
    http_response_code(500);
    exit('doctor-page.php: unknown clinician key.');
}

$locations = require __DIR__ . '/data-locations.php';

// The clinics this person works at, as full location records, in the order
// data-locations.php lists them so every page agrees on the running order.
$clinics = [];
foreach ($locations as $key => $loc) {
    if (in_array($loc['name'] . ', ' . $loc['address']['region'], $person['clinics'], true)) {
        $clinics[$key] = $loc;
    }
}

$is_therapist = $person['group'] === 'therapy';
$full_name    = $person['name'] . ($person['credentials'] !== '' ? ', ' . $person['credentials'] : '');

// Where the page's phone number and booking fall back to: the first clinic
// this person works at, or the admissions line for somebody with none.
$home    = $clinics ? reset($clinics) : null;
$phone      = $home['phone']      ?? '(866) 826-2061';
$phone_href = $home['phone_href'] ?? 'tel:+18668262061';

$city_list = array_values(array_map(static fn (array $c): string => $c['name'], $clinics));
$states    = array_values(array_filter(array_map(
    static fn (string $s): ?string => $team['locations'][$s]['label'] ?? null,
    $person['states']
)));

$page_title       = $full_name . ' — ' . $person['role'];
$page_description = $person['name'] . ($person['credentials'] !== '' ? ', ' . $person['credentials'] : '')
    . ' is a ' . lcfirst($person['role']) . ' with Anew Era TMS & Psychiatry'
    . ($city_list ? ' in ' . implode(' and ', array_slice($city_list, 0, 3)) : '')
    . '. Read their background and book an appointment.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/header.php';

// Shared spacing and type, lifted from the location pages so the two match.
$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(30px,3.5vw,46px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';

/** Initials, for a clinician whose headshot has not been supplied. */
$initials = static function (string $name): string {
    $parts = preg_split('/\s+/', trim($name)) ?: [];
    return strtoupper(mb_substr($parts[0] ?? '', 0, 1) . mb_substr(count($parts) > 1 ? end($parts) : '', 0, 1));
};

$has_photo  = $person['photo'] !== '' && is_file(__DIR__ . '/../assets/img/' . $person['photo']);
$has_zocdoc = !empty($person['zocdoc']);

// What this clinician offers, from their discipline. A therapist does not
// run a TMS course, so the panel does not offer one under their name.
$offers = $is_therapist
    ? ['therapy', 'telepsychiatry']
    : ['psychiatry', 'telepsychiatry'];
$treatments = require __DIR__ . '/data-treatments.php';

// TMS is a clinic service rather than a treatment page keyed like the others,
// and only prescribers oversee a course, so it is added by hand.
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-8 pt-[108px] text-white sm:px-8 sm:pb-11 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="background-color: #0d1a21">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-aurora opacity-40"></div>

    <div class="mx-auto max-w-[1160px]">
      <nav aria-label="Breadcrumb" class="mb-6 sm:mb-8">
        <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-white/65">
          <li><a href="index.php#top" class="transition-colors hover:text-white">Home</a></li>
          <li aria-hidden="true" class="opacity-40">/</li>
          <li><a href="team.php" class="transition-colors hover:text-white">Team</a></li>
          <?php if ($home !== null): ?>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="<?= e($home['page']) ?>" class="transition-colors hover:text-white"><?= e($home['name']) ?></a></li>
          <?php endif; ?>
          <li aria-hidden="true" class="opacity-40">/</li>
          <li aria-current="page" class="text-brand-sky"><?= e($person['name']) ?></li>
        </ol>
      </nav>

      <div class="gap-10 md:flex md:items-center lg:gap-16">

        <?php /* The headshot leads on a phone: a face is what a reader came
                 for, and it sets the tone before a word of the bio. */ ?>
        <div class="mb-7 md:order-2 md:mb-0 md:shrink-0">
          <?php if ($has_photo): ?>
            <img src="<?= e(asset('assets/img/' . $person['photo'])) ?>" alt="<?= e($person['name']) ?>"
                 width="400" height="500" decoding="async"
                 class="h-[260px] w-[208px] rounded-[22px] object-cover shadow-[0_24px_60px_rgba(0,0,0,0.38)] ring-1 ring-white/20 sm:h-[320px] sm:w-[256px] md:h-[360px] md:w-[288px]">
          <?php else: ?>
            <span aria-hidden="true"
                  class="flex h-[260px] w-[208px] items-center justify-center rounded-[22px] bg-white/10 font-serif text-[64px] text-brand-sky ring-1 ring-white/20 sm:h-[320px] sm:w-[256px] md:h-[360px] md:w-[288px]"><?= e($initials($person['name'])) ?></span>
          <?php endif; ?>
        </div>

        <div class="min-w-0 md:order-1 md:flex-1">
          <h1 class="on-footage m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-white text-[36px] sm:text-[50px] lg:text-[56px]">
            <?= e($person['name']) ?>
          </h1>
          <?php if ($person['credentials'] !== ''): ?>
            <p class="m-0 mt-3 text-[12px] font-extrabold uppercase tracking-[0.16em] text-brand-sky"><?= e($person['credentials']) ?></p>
          <?php endif; ?>
          <p class="m-0 mt-3 text-[17px] leading-[1.5] text-white/85 sm:text-[19px]"><?= e($person['role']) ?></p>

          <?php if ($clinics): ?>
            <?php
              /* Built as one string rather than looped in the markup: the
                 separators sit tight against the links, and a stray newline
                 between a link and its comma is a space the reader sees. */
              $clinic_links = array_map(static fn (array $c): string =>
                  '<a href="' . e($c['page']) . '" class="font-extrabold text-brand-sky underline decoration-brand-sky/40 underline-offset-4 hover:decoration-brand-sky">' . e($c['name']) . '</a>',
                  array_values($clinics));
              $last     = array_pop($clinic_links);
              $sentence = $clinic_links ? implode(', ', $clinic_links) . ' and ' . $last : $last;
            ?>
            <p class="m-0 mt-5 text-[15px] leading-[1.7] text-white/70">
              Seeing patients at <?= $sentence ?><?php if ($states): ?>, and by telehealth across <?= e(implode(' and ', $states)) ?><?php endif; ?>.
            </p>
          <?php endif; ?>

          <div class="mt-7 flex flex-wrap gap-3">
            <?php if ($has_zocdoc): ?>
              <a href="<?= e($person['zocdoc']) ?>" target="_blank" rel="noopener" class="<?= $btn_blue ?>">
                Book on Zocdoc
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"/></svg>
              </a>
            <?php else: ?>
              <a href="index.php#book" class="<?= $btn_blue ?>">Request an Appointment <?= arrow_icon(16) ?></a>
            <?php endif; ?>
            <a href="<?= e($phone_href) ?>" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/45 bg-white/10 px-7 py-[14px] text-[15px] font-extrabold text-white backdrop-blur-sm transition-colors hover:border-white/80 hover:bg-white/20">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
              <?= e($phone) ?>
            </a>
          </div>
        </div>
      </div>

      <div class="mt-8 flex flex-wrap items-center justify-between gap-3 border-t border-white/30 pt-4 text-[11px] text-white/85">
        <span><?= e($is_therapist ? 'Therapy' : 'Psychiatry and medication management') ?> &middot; In person and by telehealth</span>
        <?php if ($city_list): ?>
          <span><?= e(count($city_list)) ?> clinic<?= count($city_list) === 1 ? '' : 's' ?> &middot; <?= e(implode(', ', $city_list)) ?></span>
        <?php endif; ?>
      </div>
    </div>
  </section>
</div>

<!-- ─── About ────────────────────────────────────────────────────────── -->
<section id="about" class="<?= $wrap ?> scroll-mt-[110px] pt-10 sm:pt-14">
  <div class="grid gap-3 md:grid-cols-[minmax(0,1.55fr)_minmax(0,1fr)] md:gap-4">

    <div data-reveal class="rounded-[24px] border border-[#e3e7ea] bg-white p-7 sm:p-9 lg:p-11">
      <p class="<?= $eyebrow ?>"><?= $dot ?> About <?= e($person['name']) ?></p>
      <h2 class="<?= $h2 ?>">Who you would<br><em class="italic font-normal text-brand-blue">be working with.</em></h2>

      <div class="mt-6 sm:mt-8">
        <?php foreach ($person['bio'] as $para): ?>
          <p class="m-0 mb-4 text-[15.5px] leading-[1.8] text-[#4b5560] last:mb-0"><?= e($para) ?></p>
        <?php endforeach; ?>
        <?php if (!$person['bio']): ?>
          <p class="m-0 text-[15.5px] leading-[1.8] text-[#4b5560]">
            <?= e($person['name']) ?> sees patients<?= $city_list ? ' at ' . e(implode(' and ', $city_list)) : '' ?>.
            Call <a href="<?= e($phone_href) ?>" class="font-extrabold text-brand-blue underline underline-offset-4"><?= e($phone) ?></a>
            and the intake team will talk you through their availability and approach.
          </p>
        <?php endif; ?>
      </div>

      <?php if ($person['video'] !== ''): ?>
        <div class="mt-8 overflow-hidden rounded-[18px] bg-[#dbe7ef]">
          <div class="relative aspect-video">
            <iframe class="absolute inset-0 h-full w-full" loading="lazy"
                    src="https://www.youtube-nocookie.com/embed/<?= e($person['video']) ?>"
                    title="<?= e($person['name']) ?> introduces themselves"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </div>
        </div>
      <?php endif; ?>
    </div>

    <div class="grid gap-3 md:gap-4">
      <div data-reveal class="rounded-[24px] border border-[#e3e7ea] bg-white p-7">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">At a glance</p>
        <dl class="m-0 mt-4">
          <div class="border-b border-ink/[0.07] py-3 first:pt-0">
            <dt class="m-0 text-[12.5px] uppercase tracking-[0.1em] text-ink/45">Role</dt>
            <dd class="m-0 mt-1 text-[15px] font-extrabold leading-[1.45] text-ink"><?= e($person['role']) ?></dd>
          </div>
          <?php if ($person['credentials'] !== ''): ?>
            <div class="border-b border-ink/[0.07] py-3">
              <dt class="m-0 text-[12.5px] uppercase tracking-[0.1em] text-ink/45">Credentials</dt>
              <dd class="m-0 mt-1 text-[15px] font-extrabold leading-[1.45] text-ink"><?= e($person['credentials']) ?></dd>
            </div>
          <?php endif; ?>
          <?php if ($states): ?>
            <div class="border-b border-ink/[0.07] py-3">
              <dt class="m-0 text-[12.5px] uppercase tracking-[0.1em] text-ink/45">Practising in</dt>
              <dd class="m-0 mt-1 text-[15px] font-extrabold leading-[1.45] text-ink"><?= e(implode(', ', $states)) ?></dd>
            </div>
          <?php endif; ?>
          <div class="py-3 last:pb-0">
            <dt class="m-0 text-[12.5px] uppercase tracking-[0.1em] text-ink/45">Appointments</dt>
            <dd class="m-0 mt-1 text-[15px] font-extrabold leading-[1.45] text-ink">In person and by secure video</dd>
          </div>
        </dl>
      </div>

      <div data-reveal class="flex flex-col rounded-[24px] bg-[#10202c] bg-reviews-glow p-7 text-white">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-brand-green">Book</p>
        <p class="m-0 mt-3 font-serif text-[22px] font-normal leading-[1.25] tracking-[-0.02em]">Most new patients are seen within a week.</p>
        <p class="m-0 mt-2.5 text-[13.5px] leading-[1.65] text-white/70">We check your insurance before your first visit, so you know what it costs before you walk in.</p>
        <div class="mt-auto pt-5">
          <a href="<?= e($phone_href) ?>" class="inline-flex items-center gap-2.5 rounded-full bg-white px-6 py-3.5 text-[14px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
            <?= e($phone) ?>
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php if ($clinics): ?>
<!-- ─── Where they practise ──────────────────────────────────────────── -->
<section id="clinics" class="<?= $wrap ?> scroll-mt-[110px] pt-10 sm:pt-[60px] md:pt-[76px]">
  <div class="mb-7 sm:mb-9">
    <p class="<?= $eyebrow ?>"><?= $dot ?> Where to find them</p>
    <h2 class="<?= $h2 ?>"><?= e(count($clinics)) ?> clinic<?= count($clinics) === 1 ? '' : 's' ?>,<br><em class="italic font-normal text-brand-blue">and telehealth either way.</em></h2>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 <?= count($clinics) > 2 ? 'lg:grid-cols-3' : '' ?>">
    <?php foreach ($clinics as $key => $c): $a = $c['address']; ?>
      <li data-reveal class="flex h-full flex-col rounded-[24px] border border-[#e3e7ea] bg-white p-7 sm:p-8">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45"><?= e($c['region']) ?></p>
        <h3 class="m-0 mt-2 font-serif text-[25px] font-normal leading-[1.1] tracking-[-0.03em] text-ink"><?= e($c['name']) ?></h3>
        <address class="m-0 mt-3.5 not-italic text-[14.5px] leading-[1.7] text-[#58616a]">
          <?php if ($a['building'] !== ''): ?><span class="block font-extrabold text-ink"><?= e($a['building']) ?></span><?php endif; ?>
          <?= e($a['street']) ?><br>
          <?= e($a['city']) ?>, <?= e($a['region']) ?> <?= e($a['postcode']) ?>
        </address>
        <a href="<?= e($c['phone_href']) ?>" class="mt-3 inline-block text-[14.5px] font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark"><?= e($c['phone']) ?></a>

        <div class="mt-auto flex flex-wrap items-center gap-x-5 gap-y-2 pt-5">
          <a href="<?= e($c['page']) ?>" class="inline-flex items-center gap-2 text-[13.5px] font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">
            About This Clinic <?= arrow_icon(13) ?>
          </a>
          <a href="<?= e($c['maps']) ?>" target="_blank" rel="noopener" class="inline-flex items-center gap-2 text-[13.5px] font-extrabold text-ink/65 underline underline-offset-4 hover:text-ink">
            Directions
            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"/></svg>
          </a>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>
</section>
<?php endif; ?>

<!-- ─── What they offer ──────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pt-10 sm:pt-[60px] md:pt-[76px]">
  <div class="mb-7 sm:mb-9">
    <p class="<?= $eyebrow ?>"><?= $dot ?> What they offer</p>
    <h2 class="<?= $h2 ?>">How <?= e($person['name']) ?><br><em class="italic font-normal text-brand-blue">works with patients.</em></h2>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 md:grid-cols-2 md:gap-4">
    <?php foreach ($offers as $slug):
            $t = $treatments[$slug] ?? null;
            if (!$t) continue; ?>
      <li>
        <a href="<?= e($t['page']) ?>" data-reveal class="lift group flex h-full flex-col rounded-[24px] border border-[#e3e7ea] bg-white p-7 transition-colors hover:border-brand-blue/35 sm:p-8">
          <h3 class="m-0 font-serif text-[24px] font-normal leading-[1.1] tracking-[-0.03em] text-ink"><?= e($t['name']) ?></h3>
          <p class="m-0 mt-2.5 text-[14.5px] leading-[1.7] text-[#58616a]"><?= e($t['hero']['lede'] ?? $t['meta'] ?? '') ?></p>
          <span class="mt-auto pt-5 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue">
            About <?= e($t['name']) ?>
            <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
          </span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php if (!$is_therapist): ?>
    <div data-reveal class="mt-3 rounded-[24px] border border-[#e3e7ea] bg-white p-7 sm:p-9 md:mt-4">
      <div class="md:flex md:items-center md:gap-10">
        <div class="md:max-w-[340px]">
          <h3 class="m-0 font-serif text-[23px] font-normal leading-[1.12] tracking-[-0.03em] text-ink">TMS, where medication has not been enough.</h3>
          <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]">
            A prescriber can refer you for a TMS course<?= $city_list ? ' at ' . e($city_list[0]) : '' ?>. It is FDA-cleared,
            drug-free and non-invasive, and you drive yourself home afterwards.
          </p>
          <a href="tms.php" class="mt-4 inline-flex items-center gap-2 text-[13.5px] font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">
            How TMS Works <?= arrow_icon(13) ?>
          </a>
        </div>
        <ul class="m-0 mt-5 grid list-none gap-2 p-0 sm:grid-cols-2 md:mt-0 md:flex-1">
          <?php foreach ($data['conditions'] as $c): ?>
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

<?php
  // Colleagues at the same clinics, so a reader who is not sure about this
  // clinician has somewhere to go that is not the back button. Self excluded,
  // and deduplicated for anybody who shares two clinics with them.
  $colleagues = [];
  foreach ($team['people'] as $other) {
      if ($other['slug'] === $person['slug'] || !$other['clinics']) {
          continue;
      }
      if (array_intersect($other['clinics'], $person['clinics'])) {
          $colleagues[$other['slug']] = $other;
      }
  }
  usort($colleagues, static function (array $a, array $b): int {
      $rank = ['psychiatry' => 0, 'leadership' => 1, 'therapy' => 2];
      return [$rank[$a['group']] ?? 9, $a['name']] <=> [$rank[$b['group']] ?? 9, $b['name']];
  });
?>
<?php if ($colleagues): ?>
<!-- ─── Colleagues ───────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> <?= $pad ?>">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <?php
        // Naming the clinics only reads well up to two; past that it is a list
        // the reader has already seen further up the page.
        $also = match (true) {
            count($city_list) === 0 => 'Also at this clinic',
            count($city_list) <= 2  => 'Also at ' . implode(' and ', $city_list),
            default                 => 'Also at these ' . count($city_list) . ' clinics',
        };
      ?>
      <p class="<?= $eyebrow ?>"><?= $dot ?> <?= e($also) ?></p>
      <h2 class="<?= $h2 ?>">Other clinicians<br><em class="italic font-normal text-brand-blue">you could see.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
      You can change clinician later at no cost, so the first choice does not have to be the final one.
    </p>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-4">
    <?php foreach ($colleagues as $c): ?>
      <li data-reveal>
        <a href="<?= e($c['slug']) ?>.php" class="lift group flex h-full items-center gap-4 rounded-[20px] border border-[#e3e7ea] bg-white p-5 transition-colors hover:border-brand-blue/35">
          <?php if ($c['photo'] !== '' && is_file(__DIR__ . '/../assets/img/' . $c['photo'])): ?>
            <img src="<?= e(asset('assets/img/' . $c['photo'])) ?>" alt="" width="200" height="250" loading="lazy" decoding="async"
                 class="h-[72px] w-[58px] shrink-0 rounded-[12px] object-cover">
          <?php else: ?>
            <span aria-hidden="true" class="flex h-[72px] w-[58px] shrink-0 items-center justify-center rounded-[12px] bg-mist font-serif text-[19px] text-brand-blue"><?= e($initials($c['name'])) ?></span>
          <?php endif; ?>
          <div class="min-w-0">
            <h3 class="m-0 font-serif text-[18px] font-normal leading-[1.18] tracking-[-0.02em] text-ink"><?= e($c['name']) ?></h3>
            <p class="m-0 mt-1 text-[12.5px] leading-[1.45] text-[#58616a]"><?= e($c['role']) ?></p>
            <span class="mt-1.5 inline-flex items-center gap-1.5 text-[12.5px] font-extrabold text-brand-blue">
              Profile
              <span class="transition-transform duration-200 group-hover:translate-x-0.5"><?= arrow_icon(11) ?></span>
            </span>
          </div>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <p class="m-0 mt-6 text-[13.5px] leading-[1.7] text-ink/60">
    Not sure who to ask for? Call <a href="<?= e($phone_href) ?>" class="font-extrabold text-brand-blue underline underline-offset-4"><?= e($phone) ?></a>
    and the intake team will match you.
    <a href="team.php<?= $person['states'] ? '#' . e($person['states'][0]) : '' ?>" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">See the Whole Team</a>.
  </p>
</section>
<?php else: ?>
<div class="<?= $pad ?>"></div>
<?php endif; ?>

<!-- ─── Book ─────────────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-10 sm:pb-[60px] md:pb-[76px]">
  <div data-reveal class="overflow-hidden rounded-[26px] bg-[#10202c] bg-reviews-glow px-7 py-10 text-white sm:px-10 sm:py-12 lg:px-14">
    <div class="md:flex md:items-center md:justify-between md:gap-12">
      <div class="md:max-w-[560px]">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.17em] text-brand-green">Book with <?= e($person['name']) ?></p>
        <h2 class="m-0 mt-4 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-white text-[clamp(28px,3.2vw,42px)]">
          Start where you are.<br><em class="italic font-normal text-brand-sky">We will take it from there.</em>
        </h2>
        <p class="m-0 mt-4 max-w-[52ch] text-[15px] leading-[1.75] text-white/70">
          We verify your benefits before the first visit, so there is no surprise at the desk.
          <?php if ($city_list):
                  $where = $city_list;
                  $tail  = array_pop($where);
                  $where = $where ? implode(', ', $where) . ' or ' . $tail : $tail;
          ?>In person at <?= e($where) ?>, or by secure video.<?php endif; ?>
        </p>
      </div>
      <div class="mt-7 flex flex-wrap gap-3 md:mt-0 md:shrink-0 md:flex-col">
        <?php if ($has_zocdoc): ?>
          <a href="<?= e($person['zocdoc']) ?>" target="_blank" rel="noopener"
             class="inline-flex items-center justify-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
            Book on Zocdoc
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"/></svg>
          </a>
        <?php else: ?>
          <a href="index.php#book"
             class="inline-flex items-center justify-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
            Request an Appointment <?= arrow_icon(16) ?>
          </a>
        <?php endif; ?>
        <a href="<?= e($phone_href) ?>"
           class="inline-flex items-center justify-center gap-2.5 rounded-full border-2 border-white/45 px-7 py-[14px] text-[15px] font-extrabold text-white transition-colors hover:border-white/80 hover:bg-white/10">
          <?= e($phone) ?>
        </a>
      </div>
    </div>
  </div>
</section>

</div>

<?php
/* Schema for the clinician. Physician for a prescriber, Person for a
   therapist — schema.org's Physician means a medical doctor, and tagging a
   therapist as one would be a claim we should not make. */
$schema = array_filter([
    '@context'         => 'https://schema.org',
    '@type'            => $is_therapist ? 'Person' : 'Physician',
    'name'             => $full_name,
    'honorificSuffix'  => $person['credentials'] ?: null,
    'jobTitle'         => $person['role'],
    'description'      => $person['bio'][0] ?? null,
    'image'            => $has_photo ? 'assets/img/' . $person['photo'] : null,
    'url'              => $person['slug'] . '.php',
    'sameAs'           => !empty($person['zocdoc']) ? [$person['zocdoc']] : null,
    'medicalSpecialty' => $is_therapist ? null : 'Psychiatric',
    'worksFor'         => [
        '@type' => 'MedicalOrganization',
        'name'  => 'Anew Era TMS & Psychiatry',
    ],
    'workLocation'     => array_values(array_map(static fn (array $c): array => [
        '@type'   => 'MedicalClinic',
        'name'    => 'Anew Era TMS & Psychiatry — ' . $c['name'],
        'address' => array_filter([
            '@type'           => 'PostalAddress',
            'streetAddress'   => $c['address']['street'],
            'addressLocality' => $c['address']['city'],
            'addressRegion'   => $c['address']['region'],
            'postalCode'      => $c['address']['postcode'],
            'addressCountry'  => 'US',
        ]),
        'telephone' => $c['phone'],
    ], $clinics)) ?: null,
]);
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

<?php require __DIR__ . '/footer.php'; ?>
