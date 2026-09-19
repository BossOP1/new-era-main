<?php
/**
 * Anew Era Health — Meet our team.
 *
 * The roster for both regions in one place. Everyone renders server-side and
 * the grid is filtered in the browser by location, role and a text search, so
 * the page works without JavaScript and every bio is in the markup for search
 * engines. includes/data-team.php carries the people; each one is tagged with
 * the states and the individual clinics they work from, which is the same
 * shape the location pages will read when they list their own team.
 */
$page_title        = 'Meet our team';
$page_description  = 'Meet the psychiatrists, nurse practitioners and therapists at Anew Era Health across California and Texas. Filter by location and role, read their bios, and book with the clinician who fits.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$team      = require __DIR__ . '/includes/data-team.php';
$locations = $team['locations'];
$roles     = $team['roles'];
$people    = $team['people'];

// Shared spacing and type, lifted from treatments.php so the hub pages match.
$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';

/* ---- Counts, so the tabs and the location cards can say how many ---- */

$count_state = array_fill_keys(array_keys($locations), 0);
$count_role  = array_fill_keys(array_keys($roles), 0);
foreach ($people as $person) {
    foreach ($person['states'] as $state) {
        if (isset($count_state[$state])) {
            $count_state[$state]++;
        }
    }
    $count_role[$person['group']]++;
}
$total   = count($people);
$clinics = array_sum(array_map(static fn (array $l): int => count($l['clinics']), $locations));

// The hero marquee shows the faces we actually have photographs of.
$portraits = array_values(array_filter($people, static fn (array $p): bool => $p['photo'] !== ''));

/**
 * Initials, for the handful of people whose headshot has not been supplied.
 * Keeps the card the same shape as every other rather than leaving a hole.
 */
$initials = static function (string $name): string {
    $parts = preg_split('/\s+/', trim($name)) ?: [];
    $first = $parts[0] ?? '';
    $last  = count($parts) > 1 ? end($parts) : '';
    return strtoupper(mb_substr($first, 0, 1) . mb_substr($last, 0, 1));
};

/** The search string a card is matched against — name, letters, role, place. */
$haystack = static function (array $p) use ($locations): string {
    $states = array_map(static fn (string $s): string => $locations[$s]['label'] ?? $s, $p['states']);
    return strtolower(implode(' ', array_merge(
        [$p['name'], $p['credentials'], $p['role']],
        $p['clinics'],
        $states
    )));
};
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px] [&_button:focus-visible]:outline [&_button:focus-visible]:outline-[3px] [&_button:focus-visible]:outline-brand-orange [&_button:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <?php /* Photograph behind a wash, the same treatment the conditions and
           treatments hubs use — .cond-hero-photo / .cond-hero-wash in
           src/input.css, with --cond-wash set to this page's tint. */ ?>
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 231 241 250; background-color: #e7f1fa">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/treatments/all-hero.jpg')) ?>'); background-position: 66% 30%"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[360px]">
      <div class="max-w-[580px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="about.php#top" class="transition-colors hover:text-brand-blue">About</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">Meet our team</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          Meet the people<br>behind <em class="not-italic text-brand-blue">the care.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[48ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          Psychiatrists, nurse practitioners and therapists across California and Texas. Find the clinician who fits, read how they work, and book with them directly.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#roster" class="<?= $btn_blue ?>">Browse the team <?= arrow_icon(16) ?></a>
          <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
        </div>

        <dl class="m-0 mt-8 grid max-w-[460px] grid-cols-3 gap-3 border-t border-ink/20 pt-5 sm:gap-5 sm:pt-6">
          <?php foreach ([
            [$total, 'clinicians'],
            [$clinics, 'clinics'],
            [count($locations), 'states'],
          ] as [$value, $label]): ?>
            <div>
              <dt class="sr-only"><?= e($label) ?></dt>
              <dd class="m-0 font-serif text-[30px] font-normal leading-none tracking-[-0.03em] text-brand-blue sm:text-[36px]"><?= e((string) $value) ?></dd>
              <dd class="m-0 mt-1.5 text-[11px] font-bold uppercase tracking-[0.15em] text-ink/55"><?= e($label) ?></dd>
            </div>
          <?php endforeach; ?>
        </dl>
      </div>

    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>In person and by telehealth. Most insurance accepted.</span>
      <span>California <span aria-hidden="true" class="px-2">/</span> Texas</span>
    </div>
  </section>
</div>

<?php /* ─── Face marquee ──────────────────────────────────────────────────
     The whole roster, drifting past. Decorative and hidden from assistive
     tech: it repeats the grid below. Pauses on hover and for reduced motion. */ ?>
<div aria-hidden="true" class="marquee-mask overflow-hidden bg-white py-6 sm:py-8">
  <div class="flex w-max gap-3 animate-marquee hover:[animation-play-state:paused] motion-reduce:animate-none sm:gap-4">
    <?php for ($pass = 0; $pass < 2; $pass++): ?>
      <?php foreach ($portraits as $p): ?>
        <span class="block h-[76px] w-[76px] shrink-0 overflow-hidden rounded-full border-2 border-white bg-[#e7f1fa] shadow-[0_6px_16px_rgba(20,32,43,0.1)] sm:h-[92px] sm:w-[92px]">
          <img src="<?= e(asset('assets/img/' . $p['photo'])) ?>" alt="" width="92" height="92" loading="lazy" decoding="async" class="h-full w-full object-cover object-[center_12%] grayscale-[35%] transition duration-500 hover:grayscale-0 hover:scale-105 motion-reduce:transition-none">
        </span>
      <?php endforeach; ?>
    <?php endfor; ?>
  </div>
</div>

<!-- ─── The two regions ──────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-2 pt-10 sm:pb-4 sm:pt-[60px] md:pt-[76px]">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> Two regions</p>
      <h2 class="<?= $h2 ?>">Same standard.<br><em class="italic font-normal text-brand-blue">Two states.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[320px]">
      Our California and Texas teams share one set of protocols and one approach to care. Pick a region to see the clinicians near you.
    </p>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 md:grid-cols-2 md:gap-4">
    <?php foreach ($locations as $key => $loc): ?>
      <?php
        // A handful of that region's faces, so the card shows who it means.
        $faces = array_slice(array_values(array_filter(
            $portraits,
            static fn (array $p): bool => in_array($key, $p['states'], true)
        )), 0, 6);
      ?>
      <li>
        <button type="button" data-region-card="<?= e($key) ?>" data-reveal
                class="lift group relative flex h-full w-full flex-col overflow-hidden rounded-[24px] <?= e($loc['theme']) ?> p-7 text-left text-white sm:p-9">
          <div aria-hidden="true" class="pointer-events-none absolute -bottom-[110px] -right-[190px] h-[340px] w-[340px] rounded-full border border-white/10 shadow-[0_0_0_40px_#ffffff06,0_0_0_80px_#ffffff04]"></div>

          <div class="relative z-10 flex items-start justify-between gap-5">
            <div>
              <h3 class="m-0 font-serif text-[32px] font-normal leading-[1.08] tracking-[-0.035em] sm:text-[38px]"><?= e($loc['label']) ?></h3>
              <p class="m-0 mt-2 text-[11px] font-bold uppercase tracking-[0.15em] text-white/55"><?= e($loc['region']) ?></p>
            </div>
            <span class="shrink-0 text-right">
              <span class="block font-serif text-[42px] font-normal leading-none tracking-[-0.03em] sm:text-[52px]"><?= e((string) $count_state[$key]) ?></span>
              <span class="mt-1.5 block text-[10px] font-bold uppercase tracking-[0.15em] text-white/55">clinicians</span>
            </span>
          </div>

          <p class="relative z-10 m-0 mt-5 max-w-[48ch] text-[14.5px] leading-[1.75] text-white/70"><?= e($loc['blurb']) ?></p>

          <div aria-hidden="true" class="relative z-10 mt-6 flex items-center">
            <?php foreach ($faces as $face): ?>
              <span class="-ml-3 h-12 w-12 shrink-0 overflow-hidden rounded-full border-2 border-white/85 bg-[#e7f1fa] first:ml-0">
                <img src="<?= e(asset('assets/img/' . $face['photo'])) ?>" alt="" width="48" height="48" loading="lazy" decoding="async" class="h-full w-full object-cover object-[center_12%]">
              </span>
            <?php endforeach; ?>
            <?php if ($count_state[$key] > count($faces)): ?>
              <span class="ml-3.5 text-[12.5px] font-semibold text-white/55">+<?= e((string) ($count_state[$key] - count($faces))) ?> more</span>
            <?php endif; ?>
          </div>

          <p class="relative z-10 m-0 mt-6 border-t border-white/15 pt-4 text-[12.5px] leading-[1.9] text-white/50">
            <?= e(implode(' · ', $loc['clinics'])) ?>
          </p>

          <span class="relative z-10 mt-auto inline-flex items-center gap-2 pt-6 text-sm font-extrabold text-white">
            See the <?= e($loc['label']) ?> team <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
          </span>
        </button>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- ─── Filters ──────────────────────────────────────────────────────── -->
<section id="roster" class="<?= $wrap ?> scroll-mt-[150px] pb-10 pt-10 sm:pb-[60px] sm:pt-[60px] md:pb-[76px] md:pt-[76px]">
  <div class="mb-6 sm:mb-8">
    <p class="<?= $eyebrow ?>"><?= $dot ?> The roster</p>
    <h2 class="<?= $h2 ?>">Find your<br><em class="italic font-normal text-brand-blue">clinician.</em></h2>
  </div>

  <div data-team-filters
       class="sticky top-[84px] z-30 -mx-[22px] mb-6 border-y border-ink/10 bg-[#faf8f3]/92 px-[22px] py-3.5 backdrop-blur-md sm:top-[100px] md:-mx-7 md:px-7 lg:-mx-10 lg:px-10">
    <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between lg:gap-6">

      <div class="flex flex-wrap items-center gap-x-5 gap-y-3">
        <div role="tablist" aria-label="Filter by location" class="flex items-center gap-1 rounded-full border border-ink/10 bg-white p-1">
          <?php foreach (array_merge(['all' => ['label' => 'All locations']], $locations) as $key => $loc): ?>
            <button type="button" role="tab" data-filter-state="<?= e($key) ?>"
                    aria-selected="<?= $key === 'all' ? 'true' : 'false' ?>"
                    class="whitespace-nowrap rounded-full px-3.5 py-2 text-[13px] font-extrabold text-ink/65 transition-colors hover:text-ink aria-selected:bg-brand-blue aria-selected:text-white sm:px-4">
              <?= e($loc['label']) ?><?php if ($key !== 'all'): ?><span class="ml-1.5 font-bold text-current opacity-55"><?= e((string) $count_state[$key]) ?></span><?php endif; ?>
            </button>
          <?php endforeach; ?>
        </div>

        <div class="flex flex-wrap items-center gap-1.5" role="group" aria-label="Filter by role">
          <?php foreach (array_merge(['all' => 'All roles'], $roles) as $key => $label): ?>
            <button type="button" data-filter-role="<?= e($key) ?>"
                    aria-pressed="<?= $key === 'all' ? 'true' : 'false' ?>"
                    class="whitespace-nowrap rounded-full border border-ink/12 bg-white px-3.5 py-[7px] text-[12.5px] font-bold text-ink/65 transition-colors hover:border-ink/30 hover:text-ink aria-pressed:border-ink aria-pressed:bg-ink aria-pressed:text-white">
              <?= e($label) ?><?php if ($key !== 'all'): ?><span class="ml-1.5 opacity-55"><?= e((string) $count_role[$key]) ?></span><?php endif; ?>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="flex items-center gap-3">
        <div class="relative flex-1 lg:w-[250px] lg:flex-none">
          <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-ink/40"><circle cx="11" cy="11" r="7"></circle><path d="m20 20-3.5-3.5"></path></svg>
          <label for="team-search" class="sr-only">Search the team by name, role or city</label>
          <input id="team-search" type="search" autocomplete="off" placeholder="Search name, role or city"
                 class="w-full rounded-full border border-ink/12 bg-white py-2.5 pl-10 pr-3.5 text-[13.5px] text-ink placeholder:text-ink/40 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20">
        </div>
        <button type="button" data-team-reset hidden
                class="whitespace-nowrap rounded-full border border-ink/12 bg-white px-3.5 py-2.5 text-[12.5px] font-bold text-ink/65 transition-colors hover:border-ink/30 hover:text-ink">Clear</button>
      </div>
    </div>

    <p data-team-count aria-live="polite" class="m-0 mt-2.5 text-[12px] font-semibold text-ink/50">
      Showing all <?= e((string) $total) ?> clinicians
    </p>
  </div>

  <!-- ─── The grid ───────────────────────────────────────────────────── -->
  <ul data-team-grid class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-3 xl:grid-cols-4">
    <?php foreach ($people as $i => $p): ?>
      <?php
        $full  = $p['name'] . ($p['credentials'] !== '' ? ', ' . $p['credentials'] : '');
        $state_labels = array_map(static fn (string $s): string => $locations[$s]['short'] ?? $s, $p['states']);
      ?>
      <li data-team-card
          data-states="<?= e(implode(' ', $p['states'])) ?>"
          data-role="<?= e($p['group']) ?>"
          data-search="<?= e($haystack($p)) ?>"
          data-index="<?= e((string) $i) ?>"
          itemscope itemtype="https://schema.org/Person">
        <button type="button" data-open-bio="<?= e($p['slug']) ?>"
                class="lift group flex h-full w-full flex-col overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-white text-left transition-colors hover:border-brand-blue/35">
          <div class="relative aspect-[4/5] overflow-hidden bg-[#e7f1fa]">
            <?php if ($p['photo'] !== ''): ?>
              <img src="<?= e(asset('assets/img/' . $p['photo'])) ?>" alt="<?= e($p['name']) ?>, <?= e($p['role']) ?> at <?= e($site['name']) ?>"
                   loading="lazy" decoding="async" itemprop="image"
                   class="absolute inset-0 h-full w-full object-cover object-center transition-transform duration-500 group-hover:scale-[1.04] motion-reduce:transition-none">
            <?php else: ?>
              <span aria-hidden="true" class="absolute inset-0 flex items-center justify-center bg-[linear-gradient(150deg,#e7f1fa,#d5e6f2)] font-serif text-[52px] font-normal tracking-[-0.03em] text-brand-blue/55"><?= e($initials($p['name'])) ?></span>
            <?php endif; ?>
            <div aria-hidden="true" class="pointer-events-none absolute inset-0 bg-card-veil"></div>
            <div class="absolute inset-x-3 bottom-3 flex flex-wrap gap-1.5">
              <?php foreach ($state_labels as $label): ?>
                <span class="chip-glass !px-2.5 !py-1 !text-[10px]"><?= e($label) ?></span>
              <?php endforeach; ?>
            </div>
            <?php if ($p['video'] !== ''): ?>
              <span aria-hidden="true" class="absolute right-3 top-3 inline-flex h-8 w-8 items-center justify-center rounded-full bg-white/92 text-brand-blue shadow-sm backdrop-blur-md">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5.5v13l11-6.5z"></path></svg>
              </span>
            <?php endif; ?>
          </div>

          <div class="flex flex-1 flex-col p-5">
            <h3 class="m-0 font-serif text-[20px] font-normal leading-[1.2] tracking-[-0.025em] text-ink" itemprop="name"><?= e($p['name']) ?></h3>
            <?php if ($p['credentials'] !== ''): ?>
              <p class="m-0 mt-1 text-[11px] font-extrabold uppercase tracking-[0.1em] text-brand-blue"><?= e($p['credentials']) ?></p>
            <?php endif; ?>
            <p class="m-0 mt-2 text-[13px] leading-[1.6] text-[#58616a]" itemprop="jobTitle"><?= e($p['role']) ?></p>
            <?php if ($p['clinics']): ?>
              <p class="m-0 mt-2.5 flex items-start gap-1.5 text-[12px] leading-[1.5] text-ink/50">
                <svg aria-hidden="true" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="mt-[2px] shrink-0"><path d="M12 21s7-5.7 7-11a7 7 0 1 0-14 0c0 5.3 7 11 7 11Z"></path><circle cx="12" cy="10" r="2.5"></circle></svg>
                <span><?= e(implode(' · ', $p['clinics'])) ?></span>
              </p>
            <?php endif; ?>
            <span class="mt-auto inline-flex items-center gap-2 pt-5 text-[13px] font-extrabold text-brand-blue">
              Read bio <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(13) ?></span>
            </span>
          </div>
        </button>

        <?php /* Hidden, not in a <template>: template content is inert, so it
                 would be invisible to search engines. This is in the document,
                 indexed with the rest of the page, and cloned into the dialog. */ ?>
        <div data-bio-for="<?= e($p['slug']) ?>" hidden>
          <div itemprop="description">
            <?php foreach ($p['bio'] as $para): ?>
              <p class="m-0 mb-4 text-[15px] leading-[1.8] text-[#4b5560] last:mb-0"><?= e($para) ?></p>
            <?php endforeach; ?>
            <?php if (!$p['bio']): ?>
              <p class="m-0 text-[15px] leading-[1.8] text-[#4b5560]"><?= e($p['name']) ?> sees patients at <?= e($site['name']) ?>. Call us and we will talk you through their availability and approach.</p>
            <?php endif; ?>
          </div>
        </div>
      </li>
    <?php endforeach; ?>
  </ul>

  <p data-team-empty hidden class="m-0 rounded-[24px] border border-dashed border-ink/20 bg-white px-6 py-14 text-center text-base leading-[1.75] text-ink/60">
    No one matches that yet.<br>
    <button type="button" data-team-reset class="mt-3 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue underline underline-offset-4">Clear the filters</button>
  </p>
</section>

<!-- ─── Choosing ─────────────────────────────────────────────────────── -->
<section class="bg-[#efeee8]">
  <div class="<?= $wrap ?> <?= $pad ?>">
    <div class="mb-7 sm:mb-9 md:mb-11 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> Not sure who to see</p>
        <h2 class="<?= $h2 ?>">You don't have to<br><em class="italic font-normal text-brand-blue">pick first.</em></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[360px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[300px]">
        Most people start with an assessment and we match them from there. Choosing a name yourself is welcome, not required.
      </p>
    </div>

    <ol class="m-0 grid list-none gap-4 p-0 md:grid-cols-3 md:gap-3.5 lg:gap-[22px]">
      <?php foreach ([
        ['01', 'Tell us what is going on.', 'A short call covers your symptoms, what you have already tried and what your insurance will cover.', 'Call'],
        ['02', 'We match you to a clinician.', 'Usually a psychiatric provider, a therapist, or both — chosen on fit, location and how soon they can see you.', 'Match'],
        ['03', 'Meet them, then decide.', 'If the fit is not right after the first session, say so. Moving to a different clinician is a conversation, not a referral.', 'Meet'],
      ] as [$number, $heading, $copy, $word]): ?>
        <li data-reveal class="flex flex-col rounded-[20px] bg-[#faf8f3] p-7 md:p-[25px] lg:p-[30px]">
          <div class="mb-[25px] flex items-center justify-between text-[11px] text-[#6c756f] md:mb-[42px]">
            <span><?= e($number) ?></span>
            <span aria-hidden="true" class="text-[34px] font-normal leading-none text-brand-blue"><?= $number === '01' ? '◎' : ($number === '02' ? '↗' : '⊕') ?></span>
          </div>
          <h3 class="m-0 mb-[18px] font-serif text-[27px] font-normal leading-[1.15] tracking-[-0.03em] text-ink md:text-[25px] lg:text-[28px]"><?= e($heading) ?></h3>
          <p class="m-0 text-sm leading-[1.85] text-[#58616a]"><?= e($copy) ?></p>
          <span class="mt-[25px] border-t border-ink/15 pt-5 text-[10px] font-bold uppercase tracking-[0.15em] md:mt-8"><?= e($word) ?></span>
        </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- ─── Booking CTA ──────────────────────────────────────────────────── -->
<section id="book" class="mx-auto max-w-[1280px] px-5 py-8 sm:px-10 sm:py-12">
  <div data-reveal class="relative flex flex-col items-center justify-center gap-5 rounded-[28px] bg-cream bg-cta-glow px-6 py-10 text-center sm:gap-6 sm:px-12 sm:py-14">
    <h2 class="m-0 font-serif text-[30px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[40px]">
      Ready when you are.
    </h2>
    <p class="m-0 max-w-[50ch] text-base font-medium leading-relaxed text-ink/75 sm:text-[17px]">
      Book with a name from this page, or let us match you. Either way, we check your benefits before your first visit.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="index.php#book" class="inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-8 py-4 text-[15px] font-extrabold text-white shadow-md shadow-brand-blue/20 transition-all hover:-translate-y-0.5 hover:bg-brand-blue-dark hover:shadow-lg">
        Book a consultation <?= arrow_icon(16) ?>
      </a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
    </div>
  </div>
</section>

<?php /* ─── Bio dialog ────────────────────────────────────────────────────
     One dialog, refilled from the card that opened it. Native <dialog> gives
     us the backdrop, Escape and the focus trap for free; the arrows step
     through whatever the filters currently show, so reading four therapists
     in a row never means closing and hunting again. */ ?>
<?php /* The height cap and overflow-hidden belong on the dialog itself. Left to
         size by its content, a long bio pushes the panel past the viewport, the
         browser's own dialog scrolling takes over, and the opening focus scrolls
         the name and the close button up out of sight. */ ?>
<dialog data-bio-dialog
        <?php /* open:flex, never a bare flex: a closed <dialog> is display:none
                 by the browser's own stylesheet, and any display utility on it
                 overrides that — the panel then sits in the page above the
                 footer, permanently open. Only style the open state. */ ?>
        class="m-auto hidden max-h-[min(88dvh,800px)] w-[min(900px,calc(100vw-24px))] overflow-hidden rounded-[24px] border-0 bg-white p-0 text-ink shadow-[0_40px_90px_rgba(9,20,28,0.3)] open:flex backdrop:bg-night/55 backdrop:backdrop-blur-sm">
  <?php /* grid-cols-1 is not decoration: without it the single implicit column
           is sized to max-content and the panel grows past a phone screen. The
           explicit sm row is what makes the bio scroll instead of stretching. */ ?>
  <div class="grid w-full grid-cols-1 grid-rows-[auto_minmax(0,1fr)] overflow-hidden sm:grid-cols-[minmax(0,0.82fr)_minmax(0,1fr)] sm:grid-rows-[minmax(0,1fr)]">

    <?php /* The portrait sits in a fixed 4:5 frame rather than stretching to the
             full column: a tall column would crop a head-and-shoulders shot down
             to a nose. Centred on a tint, it reads as a deliberate frame. */ ?>
    <div class="relative flex min-w-0 items-center justify-center bg-[#e7f1fa] p-4 sm:p-5">
      <div data-bio-frame class="relative aspect-[16/10] w-full overflow-hidden rounded-[16px] bg-[#dbe7ef] sm:aspect-[4/5]">
        <div data-bio-media class="absolute inset-0"></div>
        <div class="absolute inset-x-3 bottom-3 flex flex-wrap gap-1.5">
          <span data-bio-states class="contents"></span>
        </div>
      </div>
    </div>

    <div class="flex min-h-0 min-w-0 flex-col">
      <div class="flex shrink-0 items-start justify-between gap-4 border-b border-ink/10 px-6 pb-5 pt-6 sm:px-8 sm:pt-7">
        <div class="min-w-0">
          <h2 data-bio-name class="m-0 font-serif text-[26px] font-normal leading-[1.12] tracking-[-0.03em] text-ink sm:text-[31px]"></h2>
          <p data-bio-credentials class="m-0 mt-1.5 text-[11px] font-extrabold uppercase tracking-[0.12em] text-brand-blue"></p>
          <p data-bio-role class="m-0 mt-2 text-[14px] leading-[1.6] text-[#58616a]"></p>
          <p data-bio-clinics class="m-0 mt-2.5 text-[13px] leading-[1.6] text-ink/50"></p>
        </div>
        <button type="button" data-bio-close aria-label="Close"
                class="-mr-1 -mt-1 inline-flex h-11 w-11 shrink-0 items-center justify-center rounded-full border-2 border-ink/25 bg-white text-ink/80 transition-colors hover:border-ink hover:bg-ink hover:text-white">
          <svg width="17" height="17" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"></path></svg>
        </button>
      </div>

      <?php /* Opening focus lands here, not on the close button: the dialog is
               announced, the bio scrolls with the arrow keys straight away, and
               a mouse user does not get a focus ring thrown at them. */ ?>
      <div data-bio-body autofocus tabindex="-1"
           class="min-h-0 flex-1 overflow-y-auto overscroll-contain px-6 py-6 outline-none sm:px-8"></div>

      <div class="flex shrink-0 flex-wrap items-center justify-between gap-3 border-t border-ink/10 px-6 py-4 sm:px-8">
        <div class="flex items-center gap-1.5">
          <button type="button" data-bio-prev aria-label="Previous clinician"
                  class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-ink/12 text-ink/60 transition-colors hover:border-ink/35 hover:text-ink disabled:opacity-30">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M19 12H5M11 6l-6 6 6 6"></path></svg>
          </button>
          <button type="button" data-bio-next aria-label="Next clinician"
                  class="inline-flex h-9 w-9 items-center justify-center rounded-full border border-ink/12 text-ink/60 transition-colors hover:border-ink/35 hover:text-ink disabled:opacity-30">
            <?= arrow_icon(15) ?>
          </button>
          <span data-bio-position class="ml-2 text-[12px] font-semibold text-ink/45"></span>
        </div>
        <a href="index.php#book" data-bio-book class="inline-flex items-center gap-2 rounded-full bg-brand-blue px-5 py-2.5 text-[13.5px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">
          Book a consultation <?= arrow_icon(14) ?>
        </a>
      </div>
    </div>
  </div>
</dialog>

<script>
/* Meet our team — filtering and the bio dialog.
   Everything is already rendered; this only hides, shows and re-reads it. */
(function () {
  var root = document.querySelector('[data-team-filters]');
  var grid = document.querySelector('[data-team-grid]');
  if (!root || !grid) return;

  var cards   = Array.prototype.slice.call(grid.querySelectorAll('[data-team-card]'));
  var counter = root.querySelector('[data-team-count]');
  var search  = root.querySelector('#team-search');
  var empty   = document.querySelector('[data-team-empty]');
  var resets  = document.querySelectorAll('[data-team-reset]');
  var people  = <?= json_encode(array_map(static function (array $p) use ($locations): array {
      return [
          'slug'   => $p['slug'],
          'name'   => $p['name'],
          'creds'  => $p['credentials'],
          'role'   => $p['role'],
          'photo'  => $p['photo'] !== '' ? asset('assets/img/' . $p['photo']) : '',
          'video'  => $p['video'],
          'states' => array_map(static fn (string $s): string => $locations[$s]['label'] ?? $s, $p['states']),
          'clinics'=> $p['clinics'],
      ];
  }, $people), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;

  var state = { location: 'all', role: 'all', query: '' };
  var visible = [];

  /* ---- Filtering ------------------------------------------------------ */

  function apply() {
    var q = state.query.trim().toLowerCase();
    visible = [];

    cards.forEach(function (card) {
      var okState = state.location === 'all' ||
                    card.dataset.states.split(' ').indexOf(state.location) !== -1;
      var okRole  = state.role === 'all' || card.dataset.role === state.role;
      var okQuery = q === '' || card.dataset.search.indexOf(q) !== -1;
      var show    = okState && okRole && okQuery;

      card.hidden = !show;
      if (show) visible.push(Number(card.dataset.index));
    });

    var dirty = state.location !== 'all' || state.role !== 'all' || q !== '';
    if (empty) empty.hidden = visible.length !== 0;
    // Only the toolbar's Clear toggles; the one inside the empty state is shown
    // and hidden with that whole block.
    resets.forEach(function (b) {
      if (!b.closest('[data-team-empty]')) b.hidden = !dirty;
    });

    if (counter) {
      counter.textContent = !dirty
        ? 'Showing all ' + cards.length + ' clinicians'
        : 'Showing ' + visible.length + ' of ' + cards.length +
          (visible.length === 1 ? ' clinician' : ' clinicians');
    }
  }

  root.querySelectorAll('[data-filter-state]').forEach(function (tab) {
    tab.addEventListener('click', function () {
      state.location = tab.dataset.filterState;
      root.querySelectorAll('[data-filter-state]').forEach(function (t) {
        t.setAttribute('aria-selected', String(t === tab));
      });
      apply();
    });
  });

  root.querySelectorAll('[data-filter-role]').forEach(function (chip) {
    chip.addEventListener('click', function () {
      state.role = chip.dataset.filterRole;
      root.querySelectorAll('[data-filter-role]').forEach(function (c) {
        c.setAttribute('aria-pressed', String(c === chip));
      });
      apply();
    });
  });

  if (search) {
    var t;
    search.addEventListener('input', function () {
      clearTimeout(t);
      t = setTimeout(function () { state.query = search.value; apply(); }, 140);
    });
  }

  resets.forEach(function (button) {
    button.addEventListener('click', function () {
      state = { location: 'all', role: 'all', query: '' };
      if (search) search.value = '';
      root.querySelectorAll('[data-filter-state]').forEach(function (t) {
        t.setAttribute('aria-selected', String(t.dataset.filterState === 'all'));
      });
      root.querySelectorAll('[data-filter-role]').forEach(function (c) {
        c.setAttribute('aria-pressed', String(c.dataset.filterRole === 'all'));
      });
      apply();
    });
  });

  function showRoster(smooth) {
    document.getElementById('roster').scrollIntoView({
      behavior: smooth && !window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'smooth' : 'auto',
      block: 'start'
    });
  }

  // The region cards above set the location filter and bring the grid up.
  document.querySelectorAll('[data-region-card]').forEach(function (card) {
    card.addEventListener('click', function () {
      var tab = root.querySelector('[data-filter-state="' + card.dataset.regionCard + '"]');
      if (tab) tab.click();
      showRoster(true);
    });
  });

  /* ---- The URL ---------------------------------------------------------
     #ca or #tx picks a region — what the location pages will link to — and
     #someones-slug opens that person, so a clinician has a shareable link. */

  function fromUrl() {
    var key = (location.hash || '').replace('#', '').toLowerCase();
    if (!key) return false;

    // Arriving on #ca or #tx — from a location page, say — should land on the
    // filtered roster, not at the top of a hero the reader has to scroll past.
    var tab = root.querySelector('[data-filter-state="' + key + '"]');
    if (tab) { tab.click(); showRoster(false); return true; }

    var seat = people.findIndex(function (p) { return p.slug === key; });
    if (seat !== -1) {
      apply();
      openAt(seat);
      return true;
    }
    return false;
  }
  window.addEventListener('hashchange', fromUrl);

  /* ---- Bio dialog ----------------------------------------------------- */

  var dialog = document.querySelector('[data-bio-dialog]');
  var opener = null;
  var at = -1;

  function fill(index) {
    var card = cards[index];
    var p = people[index];
    if (!card || !p || !dialog) return;
    at = index;

    dialog.querySelector('[data-bio-name]').textContent = p.name;

    var creds = dialog.querySelector('[data-bio-credentials]');
    creds.textContent = p.creds;
    creds.hidden = !p.creds;

    dialog.querySelector('[data-bio-role]').textContent = p.role;

    var clinics = dialog.querySelector('[data-bio-clinics]');
    clinics.textContent = p.clinics.length ? p.clinics.join(' · ') : '';
    clinics.hidden = !p.clinics.length;

    var media = dialog.querySelector('[data-bio-media]');
    var frame = dialog.querySelector('[data-bio-frame]');
    media.innerHTML = '';

    // A 16:9 clip in a 4:5 frame is two black bars; give video its own shape.
    frame.classList.toggle('aspect-video', !!p.video);
    frame.classList.toggle('aspect-[16/10]', !p.video);
    frame.classList.toggle('sm:aspect-[4/5]', !p.video);

    if (p.video) {
      var frame = document.createElement('iframe');
      frame.src = 'https://www.youtube-nocookie.com/embed/' + p.video + '?rel=0';
      frame.title = p.name + ' introduces themselves';
      frame.loading = 'lazy';
      frame.allow = 'accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture';
      frame.allowFullscreen = true;
      frame.className = 'absolute inset-0 h-full w-full border-0';
      media.appendChild(frame);
    } else if (p.photo) {
      var img = document.createElement('img');
      img.src = p.photo;
      img.alt = p.name;
      img.className = 'absolute inset-0 h-full w-full object-cover object-center';
      media.appendChild(img);
    } else {
      media.innerHTML = '<span class="absolute inset-0 flex items-center justify-center bg-[linear-gradient(150deg,#e7f1fa,#d5e6f2)] font-serif text-[64px] text-brand-blue/50">' +
        p.name.split(/\s+/).map(function (w) { return w[0]; }).slice(0, 2).join('').toUpperCase() + '</span>';
    }

    var states = dialog.querySelector('[data-bio-states]');
    states.innerHTML = '';
    p.states.forEach(function (label) {
      var chip = document.createElement('span');
      chip.className = 'chip-glass';
      chip.textContent = label;
      states.appendChild(chip);
    });

    var body = dialog.querySelector('[data-bio-body]');
    var source = card.querySelector('[data-bio-for]');
    body.innerHTML = '';
    if (source) {
      var clone = source.cloneNode(true);
      clone.removeAttribute('hidden');
      clone.removeAttribute('data-bio-for');
      body.appendChild(clone);
    }
    body.scrollTop = 0;

    var book = dialog.querySelector('[data-bio-book]');
    book.textContent = 'Book with ' + p.name.split(/\s+/)[0] + ' ';
    book.appendChild(document.createRange().createContextualFragment(
      '<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>'
    ));

    // Whoever is on screen is what the address bar says, so the link shares.
    if (history.replaceState) history.replaceState(null, '', '#' + p.slug);

    // Stepping moves through what the filters left on screen, not all 40-odd.
    var seat = visible.indexOf(index);
    var prev = dialog.querySelector('[data-bio-prev]');
    var next = dialog.querySelector('[data-bio-next]');
    prev.disabled = seat <= 0;
    next.disabled = seat === -1 || seat >= visible.length - 1;
    dialog.querySelector('[data-bio-position]').textContent =
      seat === -1 ? '' : (seat + 1) + ' of ' + visible.length;
  }

  function step(delta) {
    var seat = visible.indexOf(at);
    if (seat === -1) return;
    var target = visible[seat + delta];
    if (target !== undefined) fill(target);
  }

  function openAt(index) {
    if (!dialog || dialog.open) return;
    fill(index);
    if (typeof dialog.showModal === 'function') dialog.showModal();
    else dialog.setAttribute('open', '');
  }

  if (dialog) {
    grid.addEventListener('click', function (event) {
      var button = event.target.closest('[data-open-bio]');
      if (!button) return;
      opener = button;
      openAt(Number(button.closest('[data-team-card]').dataset.index));
    });

    dialog.querySelector('[data-bio-close]').addEventListener('click', function () { dialog.close(); });
    dialog.querySelector('[data-bio-prev]').addEventListener('click', function () { step(-1); });
    dialog.querySelector('[data-bio-next]').addEventListener('click', function () { step(1); });

    dialog.addEventListener('keydown', function (event) {
      if (event.key === 'ArrowLeft') step(-1);
      if (event.key === 'ArrowRight') step(1);
    });

    // Clicking the backdrop — anywhere outside the panel — closes it.
    dialog.addEventListener('click', function (event) {
      if (event.target === dialog) dialog.close();
    });

    dialog.addEventListener('close', function () {
      dialog.querySelector('[data-bio-media]').innerHTML = '';  // stop any video
      if (history.replaceState) history.replaceState(null, '', location.pathname + location.search);
      if (opener) { opener.focus(); opener = null; }
    });
  }

  if (!fromUrl()) apply();
})();
</script>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
