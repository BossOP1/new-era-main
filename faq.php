<?php
/**
 * Anew Era Health — frequently asked questions.
 *
 * Eighty-odd questions from includes/data-faq.php, rendered server-side in
 * eight categories with a sticky rail beside them. A text search filters the
 * lot in the browser and opens whatever it matched, which is the only thing
 * on the page that needs JavaScript — without it every question and every
 * answer is still there, open to a reader and to a search engine.
 *
 * Every question carries an id built from its text, so a single answer can be
 * linked to directly. Arriving on one opens it and scrolls to it.
 */
$page_title        = 'Frequently asked questions';
$page_description  = 'Answers on first visits, insurance and prior authorisation, TMS, psychiatry, therapy and Spravato® — from the team at Anew Era Health. Eighty-one questions, answered plainly.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$faq = require __DIR__ . '/includes/data-faq.php';

// Shared spacing and type, lifted from team.php so the hub pages match.
$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';

$total = array_sum(array_map(static fn (array $c): int => count($c['faqs']), $faq));

/**
 * A stable id for a question, so one answer can be linked to on its own.
 * Built from the text and kept unique across the page.
 */
$used_ids = [];
$question_id = static function (string $question) use (&$used_ids): string {
    $base = trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($question)), '-');
    $base = 'q-' . substr($base, 0, 58);
    $id   = $base;
    $n    = 2;
    while (isset($used_ids[$id])) {
        $id = $base . '-' . $n++;
    }
    $used_ids[$id] = true;
    return $id;
};

// Answers are a string or a list of paragraphs; the template and the
// structured data both want the list form.
$paragraphs = static fn ($answer): array => is_array($answer) ? $answer : [$answer];

// Ids are assigned once, up front, so the rail, the sections and the
// structured data all name the same anchors.
foreach ($faq as $key => $category) {
    foreach ($category['faqs'] as $i => $item) {
        $faq[$key]['faqs'][$i]['id'] = $item['key'] ?? $question_id($item['q']);
    }
}
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 238 241 240; background-color: #eef1f0">
    <?php // Photograph and wash, the same construction the condition heroes use. ?>
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/faq/hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[280px] max-w-[1160px] items-center lg:min-h-[330px]">
      <div class="max-w-[620px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">FAQs</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          The questions<br>people actually<br><em class="not-italic text-brand-blue">ask us.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[50ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          <?= e((string) $total) ?> of them, answered plainly — including the ones about cost, side effects and
          what happens if it does not work. Search, or pick a subject.
        </p>

        <div class="relative mt-6 max-w-[440px] sm:mt-7">
          <svg aria-hidden="true" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" class="pointer-events-none absolute left-5 top-1/2 -translate-y-1/2 text-ink/40"><circle cx="11" cy="11" r="7"></circle><path d="m20 20-3.5-3.5"></path></svg>
          <label for="faq-search" class="sr-only">Search the questions</label>
          <input id="faq-search" type="search" autocomplete="off" placeholder="Search — insurance, TMS, side effects…"
                 class="w-full rounded-full border border-ink/12 bg-white py-4 pl-[52px] pr-4 text-[15px] text-ink shadow-sm placeholder:text-ink/40 focus:border-brand-blue focus:outline-none focus:ring-2 focus:ring-brand-blue/20">
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-ink/65 sm:mt-6">
          In crisis right now? Call or text <a href="tel:988" class="font-extrabold text-brand-blue underline decoration-brand-blue/30 underline-offset-4 hover:decoration-brand-blue">988</a>, any time.
        </p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>Can’t find it? Call us on <?= e($site['phone']) ?> and ask.</span>
      <span>Adults and adolescents from 13 <span aria-hidden="true" class="px-2">/</span> In person and by telehealth</span>
    </div>
  </section>
</div>

<!-- ─── The questions ────────────────────────────────────────────────── -->
<section id="questions" class="<?= $wrap ?> scroll-mt-[110px] py-10 sm:py-14 md:py-[76px]">
  <div class="lg:grid lg:grid-cols-[236px_minmax(0,1fr)] lg:gap-12 xl:gap-16">

    <?php // The rail. Chips that scroll sideways on a phone, a sticky list from lg. ?>
    <nav aria-label="Question categories" class="mb-8 lg:mb-0">
      <p class="m-0 mb-3 hidden text-[11px] font-bold uppercase tracking-[0.17em] text-ink/45 lg:block">Subjects</p>
      <div class="lg:sticky lg:top-[104px]">
        <ul class="m-0 -mx-[22px] flex list-none snap-x scroll-pl-[22px] gap-2 overflow-x-auto px-[22px] pb-1 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden md:-mx-7 md:scroll-pl-7 md:px-7 lg:mx-0 lg:scroll-pl-0 lg:flex-col lg:gap-0.5 lg:overflow-visible lg:px-0">
          <?php foreach ($faq as $key => $category): ?>
            <li class="snap-start lg:w-full">
              <a href="#cat-<?= e($key) ?>" data-faq-jump="<?= e($key) ?>"
                 class="flex items-center gap-2.5 whitespace-nowrap rounded-full border border-ink/12 bg-white px-4 py-2.5 text-[13px] font-extrabold text-ink/70 transition-colors hover:border-ink/30 hover:text-ink lg:whitespace-normal lg:rounded-xl lg:border-0 lg:bg-transparent lg:px-3 lg:py-2.5 lg:hover:bg-white">
                <?= nav_icon($category['icon'], 'h-[18px] w-[18px] shrink-0 text-brand-blue') ?>
                <span class="lg:flex-1"><?= e($category['name']) ?></span>
                <span class="text-[11px] font-bold text-ink/35"><?= e((string) count($category['faqs'])) ?></span>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>

        <div class="mt-6 hidden rounded-[18px] border border-[#e3e7ea] bg-white p-5 lg:block">
          <p class="m-0 text-[13px] font-extrabold text-ink">Still stuck?</p>
          <p class="m-0 mt-1.5 text-[13px] leading-[1.6] text-[#58616a]">The intake team answers these all day and will check your insurance while you are on the phone.</p>
          <a href="<?= e($site['phone_href']) ?>" class="mt-3 inline-flex items-center gap-1.5 text-[13px] font-extrabold text-brand-blue underline underline-offset-4"><?= e($site['phone']) ?></a>
        </div>
      </div>
    </nav>

    <div>
      <p data-faq-count aria-live="polite" hidden class="m-0 mb-5 text-[13px] font-semibold text-ink/55"></p>

      <?php foreach ($faq as $key => $category): ?>
        <section id="cat-<?= e($key) ?>" data-faq-section="<?= e($key) ?>" class="mb-10 scroll-mt-[104px] last:mb-0 sm:mb-14">
          <div class="mb-4 flex items-start gap-3 sm:mb-5">
            <?= nav_icon($category['icon'], 'mt-1 h-6 w-6 shrink-0 text-brand-blue') ?>
            <div>
              <h2 class="m-0 font-serif text-[26px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[32px]"><?= e($category['name']) ?></h2>
              <p class="m-0 mt-1.5 max-w-[58ch] text-[14px] leading-[1.6] text-[#58616a]"><?= e($category['blurb']) ?></p>
            </div>
          </div>

          <div class="overflow-hidden rounded-[20px] border border-[#e3e7ea] bg-white">
            <?php foreach ($category['faqs'] as $item): ?>
              <details id="<?= e($item['id']) ?>" data-faq-item
                       class="group scroll-mt-[104px] border-b border-ink/10 last:border-b-0">
                <summary class="flex cursor-pointer list-none items-start justify-between gap-5 px-6 py-5 text-[15.5px] font-extrabold leading-[1.45] tracking-[-0.01em] text-ink transition-colors hover:text-brand-blue [&::-webkit-details-marker]:hidden sm:px-7 sm:text-[17px]">
                  <span data-faq-q><?= e($item['q']) ?></span>
                  <span aria-hidden="true" class="mt-0.5 shrink-0 text-[22px] font-normal leading-none text-brand-blue">
                    <span class="group-open:hidden">+</span><span class="hidden group-open:inline">&minus;</span>
                  </span>
                </summary>
                <div data-faq-a class="px-6 pb-6 sm:px-7">
                  <?php foreach ($paragraphs($item['a']) as $para): ?>
                    <p class="m-0 mb-3 max-w-[70ch] text-[14.5px] leading-[1.75] text-[#58616a] last:mb-0"><?= e($para) ?></p>
                  <?php endforeach; ?>
                  <?php if (!empty($item['link'])): ?>
                    <a href="<?= e($item['link'][1]) ?>" class="mt-3.5 inline-flex items-center gap-2 text-[13.5px] font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">
                      <?= e($item['link'][0]) ?> <?= arrow_icon(14) ?>
                    </a>
                  <?php endif; ?>
                </div>
              </details>
            <?php endforeach; ?>
          </div>
        </section>
      <?php endforeach; ?>

      <p data-faq-empty hidden class="m-0 rounded-[20px] border border-dashed border-ink/20 bg-white px-6 py-14 text-center text-base leading-[1.75] text-ink/60">
        Nothing matches that.
        <span class="mt-1 block text-[14px]">Call us on <a href="<?= e($site['phone_href']) ?>" class="font-extrabold text-brand-blue underline underline-offset-4"><?= e($site['phone']) ?></a> and ask — somebody will know.</span>
      </p>
    </div>
  </div>
</section>

<!-- ─── Still have questions ─────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-12 sm:pb-[80px]">
  <div data-reveal class="relative flex flex-col items-center justify-center gap-5 rounded-[28px] bg-cream bg-cta-glow px-6 py-10 text-center sm:gap-6 sm:px-12 sm:py-14">
    <?= brand_glyph('h-16 w-auto') ?>
    <h2 class="m-0 max-w-[20ch] font-serif text-[30px] font-normal leading-[1.08] tracking-[-0.035em] text-ink sm:text-[42px]">
      Ask us the one that isn’t here.
    </h2>
    <p class="m-0 max-w-[54ch] text-[15px] leading-[1.75] text-ink/70">
      Most new patients are seen within a week, and we check your insurance before your first visit.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
    </div>
  </div>
</section>

</div>

<?php
/* Structured data. The whole set, not a sample — the page is the answer to
   every one of these, and a reader arriving on a single question should find
   it here rather than a summary of it. */
$entities = [];
foreach ($faq as $category) {
    foreach ($category['faqs'] as $item) {
        $entities[] = [
            '@type'          => 'Question',
            'name'           => $item['q'],
            'acceptedAnswer' => [
                '@type' => 'Answer',
                'text'  => implode(' ', $paragraphs($item['a'])),
            ],
        ];
    }
}
$schema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => $entities,
];
?>
<script type="application/ld+json"><?= json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>

<script>
/* FAQ — search, and linking to a single answer.
   Every question is already rendered; this only hides, shows and opens. */
(function () {
  var search = document.getElementById('faq-search');
  var items  = Array.prototype.slice.call(document.querySelectorAll('[data-faq-item]'));
  if (!items.length) return;

  var sections = Array.prototype.slice.call(document.querySelectorAll('[data-faq-section]'));
  var counter  = document.querySelector('[data-faq-count]');
  var empty    = document.querySelector('[data-faq-empty]');

  /* Question and answer text, read once, so typing does not walk the DOM.
     The category's own heading goes in too: someone searching "insurance"
     means the insurance questions, including the ones that say "covered" or
     "your plan" and never use the word. */
  var haystacks = items.map(function (item) {
    var section = item.closest('[data-faq-section]');
    var heading = section ? section.querySelector('h2').textContent + ' ' : '';
    return (heading + item.textContent).replace(/\s+/g, ' ').toLowerCase();
  });

  var AUTO_OPEN_UPTO = 5;

  function apply(query) {
    var q = query.trim().toLowerCase();
    var hits = items.map(function (_, i) {
      return q === '' || haystacks[i].indexOf(q) !== -1;
    });
    var matched = hits.filter(Boolean).length;

    /* A search matches on the answer as often as on the question, so a short
       result set opens to show why. A broad one — a whole category — stays
       closed, because thirteen open answers is a wall, not a result. */
    var autoOpen = q !== '' && matched <= AUTO_OPEN_UPTO;

    items.forEach(function (item, i) {
      item.hidden = !hits[i];
      if (q !== '') item.open = autoOpen && hits[i];
    });

    // A category with nothing left in it goes too, heading and all.
    sections.forEach(function (section) {
      var any = section.querySelectorAll('[data-faq-item]:not([hidden])').length;
      section.hidden = any === 0;
    });

    if (empty) empty.hidden = matched !== 0;
    if (counter) {
      counter.hidden = q === '';
      counter.textContent = matched === 1
        ? '1 question matches “' + query.trim() + '”'
        : matched.toLocaleString() + ' questions match “' + query.trim() + '”';
    }
  }

  if (search) {
    var t;
    search.addEventListener('input', function () {
      clearTimeout(t);
      t = setTimeout(function () { apply(search.value); }, 140);
    });
    // Escape clears, which is what the browser's own clear button does too.
    search.addEventListener('keydown', function (event) {
      if (event.key === 'Escape') { search.value = ''; apply(''); }
    });
  }

  /* ---- One answer, linked to directly -------------------------------- */

  function openFromHash() {
    var id = (location.hash || '').replace('#', '');
    if (!id) return;
    var target = document.getElementById(id);
    if (!target) return;
    if (target.matches('[data-faq-item]')) {
      target.open = true;
      target.scrollIntoView({
        behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth',
        block: 'start'
      });
    }
  }

  window.addEventListener('hashchange', openFromHash);
  openFromHash();

  // Opening a question puts it in the address bar, so it can be shared without
  // the reader having to hunt for a link to copy. replaceState, not pushState:
  // the back button should leave the page, not close an accordion.
  items.forEach(function (item) {
    item.addEventListener('toggle', function () {
      if (item.open && item.id && history.replaceState) {
        history.replaceState(null, '', '#' + item.id);
      }
    });
  });
}());
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
