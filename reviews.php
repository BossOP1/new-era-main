<?php
/**
 * Anew Era Health — patient reviews.
 *
 * Every five-star review from the practice's own export, rendered server-side
 * and filtered in the browser by region, clinic, topic and a text search —
 * the same construction as team.php, so the page works without JavaScript and
 * every word is in the markup for search engines.
 *
 * includes/data-reviews.php carries the reviews and is generated from
 * assets/reviews_list/5-Start GMB Reviews.xlsx. That export holds five-star
 * reviews only, so the page counts them and never claims an average across
 * all ratings — a number this data cannot support.
 */
$page_title        = 'Patient reviews';
$page_description  = 'Real five-star reviews from patients at Anew Era Health, across fourteen clinics in California and Texas. Filter by location and treatment, and read what people say about TMS, psychiatry and therapy.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$rv        = require __DIR__ . '/includes/data-reviews.php';
$meta      = $rv['meta'];
$locations = $rv['locations'];
$topics    = $rv['topics'];
$reviews   = $rv['reviews'];

// Shared spacing and type, lifted from team.php so the hub pages match.
$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';
// The same eyebrow for the dark spotlight band — the shared one is ink, which
// disappears against it.
$eyebrow_light = str_replace('text-ink/55', 'text-brand-green', $eyebrow);

/* ---- Counts the filters and the location cards print ----------------- */

$regions = [
    'ca' => ['label' => 'California', 'count' => 0],
    'tx' => ['label' => 'Texas',      'count' => 0],
];
foreach ($locations as $loc) {
    $regions[$loc['state']]['count'] += $loc['count'];
}

$total = count($reviews);
$years = (int) $meta['last_year'] - (int) $meta['first_year'];

/**
 * The five gold stars, as one label rather than five characters an assistive
 * reader would spell out.
 */
$stars = static function (string $classes = 'text-[15px] text-brand-orange'): string {
    return sprintf(
        '<span class="%s leading-none tracking-[0.12em]" role="img" aria-label="Rated 5 out of 5">★★★★★</span>',
        e($classes)
    );
};

// How many render before the reader asks for more. Everything else is in the
// markup already, just hidden — see the noscript rule below the toolbar.
$first_page = 24;
$page_step  = 24;

/* ---- The three reviews that lead the page ----------------------------
   Long enough to be worth reading, about how treatment actually went, and
   one per clinic so the band is not three voices from the same waiting room.
   Picked from the data rather than pinned by name, so the newest good ones
   come forward on their own as the export is refreshed. */

$spotlight = [];
$used_clinics = [];
foreach (array_slice($reviews, $first_page) as $r) {
    $len = mb_strlen($r['text']);
    if ($len < 330 || $len > 820 || !in_array('results', $r['topics'], true)) {
        continue;
    }
    if (isset($used_clinics[$r['clinic']])) {
        continue;
    }
    $used_clinics[$r['clinic']] = true;
    $spotlight[] = $r;
    if (count($spotlight) === 3) {
        break;
    }
}
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 240 236 229; background-color: #f0ece5">
    <?php // Photograph and wash, the same construction the condition heroes use. ?>
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/reviews/hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[300px] max-w-[1160px] items-center lg:min-h-[360px]">
      <div class="max-w-[600px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">Reviews</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          <?= e(number_format($meta['five_star'])) ?> people<br>left five<br><em class="not-italic text-brand-blue">stars.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[48ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          Every one of them is below, unedited, from <?= e((string) $meta['clinics']) ?> clinics across California and Texas.
          Filter by the one nearest you, or by the treatment you are weighing up.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#all" class="<?= $btn_blue ?>">Read the reviews <?= arrow_icon(16) ?></a>
          <a href="index.php#book" class="<?= $btn_line ?>">Book a consultation</a>
        </div>

        <div class="mt-6 flex items-center gap-3 sm:mt-7">
          <?= $stars('text-[17px] text-brand-orange') ?>
          <span class="text-[13.5px] font-semibold text-ink/70">
            <?= e(number_format($meta['five_star'])) ?> five-star reviews &middot; <?= e($meta['first_year']) ?>–<?= e($meta['last_year']) ?>
          </span>
        </div>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>Collected on <?= e(implode(', ', array_keys($meta['sources']))) ?>. Nothing here was written by us.</span>
      <span>Last review <?= e($meta['updated']) ?></span>
    </div>
  </section>
</div>

<!-- ─── The numbers ──────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-2 pt-10 sm:pb-4 sm:pt-14">
  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-4">
    <?php
      $figures = [
          [number_format($meta['five_star']), 'Five-star reviews', 'Across Google, ZocDoc, Healthgrades and WebMD.'],
          [(string) $meta['clinics'],          'Clinics reviewed',  'Seven in California, seven in Texas.'],
          [$years . ' years',                  'Of feedback',       'The first landed in ' . $meta['first_year'] . ', the latest in ' . $meta['updated'] . '.'],
          [number_format($total),              'Published here',    'The rest carry a rating but no written review.'],
      ];
      foreach ($figures as [$figure, $label, $note]):
    ?>
      <li data-reveal class="flex flex-col rounded-[22px] border border-[#e3e7ea] bg-white px-6 py-7">
        <span class="font-serif text-[38px] font-normal leading-none tracking-[-0.03em] text-brand-blue sm:text-[44px]"><?= e($figure) ?></span>
        <span class="mt-3 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/55"><?= e($label) ?></span>
        <span class="mt-2 text-[13.5px] leading-[1.65] text-[#58616a]"><?= e($note) ?></span>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<?php if ($spotlight): ?>
<!-- ─── Spotlight ────────────────────────────────────────────────────── -->
<section class="px-5 py-8 sm:px-10 sm:py-12">
  <div class="mx-auto max-w-[1280px] rounded-[28px] bg-[#10202c] bg-reviews-glow px-6 py-12 sm:px-16 lg:py-[56px]">
    <div class="mb-8">
      <p class="<?= $eyebrow_light ?>"><?= $dot ?> In their words</p>
      <h2 class="m-0 font-serif text-[28px] font-normal leading-[1.1] tracking-[-0.03em] text-white sm:text-4xl">
        Three of them, at length.
      </h2>
    </div>

    <ul class="m-0 grid list-none gap-4 p-0 md:grid-cols-3 md:gap-5">
      <?php foreach ($spotlight as $r): ?>
        <li>
          <figure class="m-0 flex h-full flex-col justify-between rounded-[20px] bg-white px-7 py-8">
            <div>
              <?= $stars() ?>
              <blockquote class="m-0 mt-4 text-[15px] leading-[1.65] tracking-[-0.005em] text-ink">
                <?= e($r['text']) ?>
              </blockquote>
            </div>
            <figcaption class="m-0 mt-6 border-t border-ink/10 pt-4 text-sm font-extrabold text-ink">
              <?= e($r['name']) ?>
              <span class="mt-1 block text-[12px] font-semibold text-ink/50"><?= e($r['city']) ?> &middot; <?= e($r['when']) ?></span>
            </figcaption>
          </figure>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>
<?php endif; ?>

<!-- ─── Every review ─────────────────────────────────────────────────── -->
<section id="all" class="<?= $wrap ?> scroll-mt-[150px] pb-10 pt-8 sm:pb-[60px] sm:pt-[60px] md:pb-[76px]">
  <div class="mb-6 sm:mb-8">
    <p class="<?= $eyebrow ?>"><?= $dot ?> All <?= e(number_format($total)) ?> reviews</p>
    <h2 class="<?= $h2 ?>">Find the ones<br><em class="italic font-normal text-brand-blue">that sound like you.</em></h2>
  </div>

  <?php // Sticky only where it is one short row. Stacked on a phone the toolbar
        // is most of the screen, so there it scrolls away with the page. ?>
  <div data-review-filters
       class="relative z-30 -mx-[22px] mb-6 border-y border-ink/10 bg-[#faf8f3]/92 px-[22px] py-3.5 backdrop-blur-md md:-mx-7 md:px-7 lg:sticky lg:top-[100px] lg:-mx-10 lg:px-10">
    <div class="flex flex-col gap-3 lg:flex-row lg:items-center lg:justify-between lg:gap-6">

      <div class="flex flex-wrap items-center gap-x-4 gap-y-3">
        <div role="tablist" aria-label="Filter by region" class="flex items-center gap-1 rounded-full border border-ink/10 bg-white p-1">
          <?php foreach (array_merge(['all' => ['label' => 'Everywhere']], $regions) as $key => $region): ?>
            <button type="button" role="tab" data-filter-region="<?= e($key) ?>"
                    aria-selected="<?= $key === 'all' ? 'true' : 'false' ?>"
                    class="whitespace-nowrap rounded-full px-3.5 py-2 text-[13px] font-extrabold text-ink/65 transition-colors hover:text-ink aria-selected:bg-brand-blue aria-selected:text-white sm:px-4">
              <?= e($region['label']) ?><?php if ($key !== 'all'): ?><span class="ml-1.5 font-bold text-current opacity-55"><?= e(number_format($region['count'])) ?></span><?php endif; ?>
            </button>
          <?php endforeach; ?>
        </div>

        <div>
          <label for="review-clinic" class="sr-only">Filter by clinic</label>
          <select id="review-clinic" data-filter-clinic
                  class="cursor-pointer rounded-full border border-ink/12 bg-white py-2.5 pl-3.5 pr-8 text-[13px] font-bold text-ink/75 transition-colors hover:border-ink/30 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20">
            <option value="all">All clinics</option>
            <?php foreach ($regions as $state => $region): ?>
              <optgroup label="<?= e($region['label']) ?>">
                <?php foreach ($locations as $slug => $loc): ?>
                  <?php if ($loc['state'] !== $state) continue; ?>
                  <option value="<?= e($slug) ?>" data-region="<?= e($loc['state']) ?>"><?= e($loc['label']) ?> (<?= e((string) $loc['count']) ?>)</option>
                <?php endforeach; ?>
              </optgroup>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="flex flex-wrap items-center gap-1.5" role="group" aria-label="Filter by topic">
          <?php
            $topic_chips = ['all' => ['label' => 'Everything', 'count' => $total]] + $topics;
            foreach ($topic_chips as $key => $topic):
          ?>
            <button type="button" data-filter-topic="<?= e($key) ?>"
                    aria-pressed="<?= $key === 'all' ? 'true' : 'false' ?>"
                    class="whitespace-nowrap rounded-full border border-ink/12 bg-white px-3.5 py-[7px] text-[12.5px] font-bold text-ink/65 transition-colors hover:border-ink/30 hover:text-ink aria-pressed:border-ink aria-pressed:bg-ink aria-pressed:text-white">
              <?= e($topic['label']) ?><?php if ($key !== 'all'): ?><span class="ml-1.5 opacity-55"><?= e((string) $topic['count']) ?></span><?php endif; ?>
            </button>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="flex items-center gap-3">
        <div class="relative flex-1 lg:w-[230px] lg:flex-none">
          <svg aria-hidden="true" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="pointer-events-none absolute left-3.5 top-1/2 -translate-y-1/2 text-ink/40"><circle cx="11" cy="11" r="7"></circle><path d="m20 20-3.5-3.5"></path></svg>
          <label for="review-search" class="sr-only">Search the reviews</label>
          <input id="review-search" type="search" autocomplete="off" placeholder="Search the reviews"
                 class="w-full rounded-full border border-ink/12 bg-white py-2.5 pl-10 pr-3.5 text-[13.5px] text-ink placeholder:text-ink/40 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20">
        </div>
        <button type="button" data-review-reset hidden
                class="whitespace-nowrap rounded-full border border-ink/12 bg-white px-3.5 py-2.5 text-[12.5px] font-bold text-ink/65 transition-colors hover:border-ink/30 hover:text-ink">Clear</button>
      </div>
    </div>

    <p data-review-count aria-live="polite" class="m-0 mt-2.5 text-[12px] font-semibold text-ink/50">
      Showing all <?= e(number_format($total)) ?> reviews, newest first
    </p>
  </div>

  <?php // Without JavaScript nothing can page, so every card shows instead. ?>
  <noscript><style>[data-review-card][hidden]{display:block}[data-review-more]{display:none}</style></noscript>

  <ul data-review-grid class="m-0 grid list-none items-start gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-3">
    <?php foreach ($reviews as $i => $r): ?>
      <?php
        // Long reviews are clamped with a control to open them; short ones are
        // left alone, so most cards carry no button at all.
        $long = mb_strlen($r['text']) > 360;
      ?>
<li data-review-card data-region="<?= e($locations[$r['clinic']]['state']) ?>" data-clinic="<?= e($r['clinic']) ?>" data-topics="<?= e(implode(' ', $r['topics'])) ?>"<?= $i >= $first_page ? ' hidden' : '' ?>><figure class="rv-card"><div class="rv-head"><span class="rv-stars" role="img" aria-label="Rated 5 out of 5">★★★★★</span><span class="rv-source"><?= e($r['source']) ?></span></div><blockquote class="rv-quote"><span<?= $long ? ' data-review-text class="line-clamp-6"' : '' ?>><?= e($r['text']) ?></span><?php if ($long): ?><button type="button" data-review-expand class="rv-expand">Read more</button><?php endif; ?></blockquote><figcaption class="rv-foot"><span aria-hidden="true" class="rv-avatar"><?= e($r['initials']) ?></span><span class="min-w-0"><span class="rv-name"><?= e($r['name']) ?></span><span class="rv-place"><?= e($r['city']) ?> &middot; <?= e($r['when']) ?></span></span></figcaption></figure></li>
    <?php endforeach; ?>
  </ul>

  <p data-review-empty hidden class="m-0 rounded-[24px] border border-dashed border-ink/20 bg-white px-6 py-14 text-center text-base leading-[1.75] text-ink/60">
    No reviews match that yet.
    <button type="button" data-review-reset class="mt-3 block w-full text-sm font-extrabold text-brand-blue underline underline-offset-4">Clear the filters</button>
  </p>

  <div class="mt-8 text-center">
    <button type="button" data-review-more class="<?= $btn_blue ?> cursor-pointer">
      Show <?= e((string) $page_step) ?> more <?= arrow_icon(16) ?>
    </button>
  </div>
</section>

<!-- ─── By location ──────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-12 sm:pb-[70px]">
  <div class="mb-6 sm:mb-8">
    <p class="<?= $eyebrow ?>"><?= $dot ?> By clinic</p>
    <h2 class="<?= $h2 ?>">Reviews from<br><em class="italic font-normal text-brand-blue">your clinic.</em></h2>
  </div>

  <ul class="m-0 grid list-none gap-2.5 p-0 sm:grid-cols-2 md:gap-3 lg:grid-cols-4">
    <?php foreach ($locations as $slug => $loc): ?>
      <li>
        <button type="button" data-clinic-card="<?= e($slug) ?>"
                class="lift flex w-full cursor-pointer items-center justify-between gap-3 rounded-[18px] border border-[#e3e7ea] bg-white px-5 py-4 text-left transition-colors hover:border-brand-blue/35">
          <span class="min-w-0">
            <span class="block truncate text-[14.5px] font-extrabold text-ink"><?= e($loc['label']) ?></span>
            <span class="block text-[11px] font-bold uppercase tracking-[0.14em] text-ink/45"><?= e($regions[$loc['state']]['label']) ?></span>
          </span>
          <span class="shrink-0 font-serif text-[22px] font-normal leading-none text-brand-blue"><?= e((string) $loc['count']) ?></span>
        </button>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- ─── Book ─────────────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-12 sm:pb-[80px]">
  <div data-reveal class="relative flex flex-col items-center justify-center gap-5 rounded-[28px] bg-cream bg-cta-glow px-6 py-10 text-center sm:gap-6 sm:px-12 sm:py-14">
    <?= brand_glyph('h-16 w-auto') ?>
    <h2 class="m-0 max-w-[18ch] font-serif text-[30px] font-normal leading-[1.08] tracking-[-0.035em] text-ink sm:text-[42px]">
      Write the next one.
    </h2>
    <p class="m-0 max-w-[52ch] text-[15px] leading-[1.75] text-ink/70">
      Most new patients are seen within a week, and we check your insurance before your first visit.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Book a consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
    </div>
  </div>
</section>

</div>

<?php
/* Structured data. The aggregate is a count of five-star reviews, not an
   average across all ratings — the export only holds the five-star ones, so
   bestRating and worstRating are both 5 and the figure stays honest. */
$schema = [
    '@context'        => 'https://schema.org',
    '@type'           => 'MedicalBusiness',
    'name'            => $site['name'],
    'aggregateRating' => [
        '@type'       => 'AggregateRating',
        'ratingValue' => 5,
        'bestRating'  => 5,
        'worstRating' => 5,
        'reviewCount' => $meta['five_star'],
    ],
    'review' => array_map(static fn (array $r): array => [
        '@type'         => 'Review',
        'author'        => ['@type' => 'Person', 'name' => $r['name']],
        'datePublished' => $r['date'],
        'reviewBody'    => $r['text'],
        'reviewRating'  => ['@type' => 'Rating', 'ratingValue' => 5, 'bestRating' => 5, 'worstRating' => 1],
    ], array_slice($reviews, 0, 12)),
];
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

<script>
/* Patient reviews — filtering and paging.
   Every review is already in the markup; this only hides, shows and counts. */
(function () {
  var root = document.querySelector('[data-review-filters]');
  var grid = document.querySelector('[data-review-grid]');
  if (!root || !grid) return;

  var cards   = Array.prototype.slice.call(grid.querySelectorAll('[data-review-card]'));
  var counter = root.querySelector('[data-review-count]');
  var search  = root.querySelector('#review-search');
  var clinic  = root.querySelector('[data-filter-clinic]');
  var empty   = document.querySelector('[data-review-empty]');
  var more    = document.querySelector('[data-review-more]');
  var resets  = document.querySelectorAll('[data-review-reset]');

  var FIRST = <?= (int) $first_page ?>;
  var STEP  = <?= (int) $page_step ?>;

  var state = { region: 'all', clinic: 'all', topic: 'all', query: '' };
  var limit = FIRST;

  /* The review text is long and there is a lot of it, so it is not repeated
     into a data- attribute. Searching reads it off the card the first time a
     query is typed, then keeps it. */
  var haystacks = null;
  function haystack(i) {
    if (haystacks === null) {
      haystacks = cards.map(function (card) {
        return card.textContent.replace(/\s+/g, ' ').toLowerCase();
      });
    }
    return haystacks[i];
  }

  /* ---- Filtering ------------------------------------------------------ */

  function apply() {
    var q = state.query.trim().toLowerCase();
    var matched = 0;

    cards.forEach(function (card, i) {
      var ok = (state.region === 'all' || card.dataset.region === state.region) &&
               (state.clinic === 'all' || card.dataset.clinic === state.clinic) &&
               (state.topic  === 'all' || card.dataset.topics.split(' ').indexOf(state.topic) !== -1) &&
               (q === '' || haystack(i).indexOf(q) !== -1);

      if (ok) matched++;
      // Matching but past the current page is still hidden — that is what the
      // Show more button is releasing.
      card.hidden = !ok || matched > limit;
    });

    var shown = Math.min(matched, limit);
    var dirty = state.region !== 'all' || state.clinic !== 'all' || state.topic !== 'all' || q !== '';

    if (empty) empty.hidden = matched !== 0;
    if (more)  more.hidden  = matched <= limit;

    // Only the toolbar's Clear toggles; the one inside the empty state is
    // shown and hidden with that whole block.
    resets.forEach(function (b) {
      if (!b.closest('[data-review-empty]')) b.hidden = !dirty;
    });

    if (counter) {
      var noun = (dirty ? 'matching review' : 'review') + (matched === 1 ? '' : 's');
      counter.textContent = !dirty && shown === cards.length
        ? 'Showing all ' + cards.length.toLocaleString() + ' reviews, newest first'
        : 'Showing ' + shown.toLocaleString() + ' of ' + matched.toLocaleString() + ' ' + noun;
    }
  }

  // A new filter starts the reader at the top of the results again.
  function refilter() {
    limit = FIRST;
    apply();
  }

  root.querySelectorAll('[data-filter-region]').forEach(function (tab) {
    tab.addEventListener('click', function () {
      state.region = tab.dataset.filterRegion;
      root.querySelectorAll('[data-filter-region]').forEach(function (t) {
        t.setAttribute('aria-selected', String(t === tab));
      });
      // A clinic in the other region would filter to nothing, so it is dropped.
      if (clinic && state.region !== 'all' && state.clinic !== 'all') {
        var picked = clinic.querySelector('option[value="' + state.clinic + '"]');
        if (picked && picked.dataset.region !== state.region) {
          state.clinic = 'all';
          clinic.value = 'all';
        }
      }
      refilter();
    });
  });

  if (clinic) {
    clinic.addEventListener('change', function () {
      state.clinic = clinic.value;
      refilter();
    });
  }

  root.querySelectorAll('[data-filter-topic]').forEach(function (chip) {
    chip.addEventListener('click', function () {
      state.topic = chip.dataset.filterTopic;
      root.querySelectorAll('[data-filter-topic]').forEach(function (c) {
        c.setAttribute('aria-pressed', String(c === chip));
      });
      refilter();
    });
  });

  if (search) {
    var t;
    search.addEventListener('input', function () {
      clearTimeout(t);
      t = setTimeout(function () { state.query = search.value; refilter(); }, 160);
    });
  }

  if (more) {
    more.addEventListener('click', function () {
      limit += STEP;
      apply();
    });
  }

  resets.forEach(function (button) {
    button.addEventListener('click', function () {
      state = { region: 'all', clinic: 'all', topic: 'all', query: '' };
      if (search) search.value = '';
      if (clinic) clinic.value = 'all';
      root.querySelectorAll('[data-filter-region]').forEach(function (t) {
        t.setAttribute('aria-selected', String(t.dataset.filterRegion === 'all'));
      });
      root.querySelectorAll('[data-filter-topic]').forEach(function (c) {
        c.setAttribute('aria-pressed', String(c.dataset.filterTopic === 'all'));
      });
      refilter();
    });
  });

  /* ---- Opening a long review ------------------------------------------ */

  grid.addEventListener('click', function (event) {
    var button = event.target.closest('[data-review-expand]');
    if (!button) return;
    var text = button.parentElement.querySelector('[data-review-text]');
    if (!text) return;
    var open = text.classList.toggle('line-clamp-6');
    button.textContent = open ? 'Read more' : 'Show less';
  });

  /* ---- The clinic cards below the grid -------------------------------- */

  document.querySelectorAll('[data-clinic-card]').forEach(function (card) {
    card.addEventListener('click', function () {
      state.region = 'all';
      state.clinic = card.dataset.clinicCard;
      if (clinic) clinic.value = state.clinic;
      root.querySelectorAll('[data-filter-region]').forEach(function (t) {
        t.setAttribute('aria-selected', String(t.dataset.filterRegion === 'all'));
      });
      refilter();
      document.getElementById('all').scrollIntoView({
        behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
        block: 'start'
      });
    });
  });

  apply();
}());
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
