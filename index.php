<?php
/**
 * Anew Era Health — homepage.
 * Header and footer come from includes/; all copy comes from includes/data.php.
 */
require __DIR__ . '/includes/header.php';

$btn_white  = 'inline-flex items-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white';
$eyebrow    = 'm-0 text-xs font-extrabold uppercase tracking-[0.16em]';
?>

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<section id="top" class="relative flex min-h-[720px] flex-col overflow-hidden bg-night pt-[92px] sm:pt-[114px] lg:min-h-[840px]">
  <div class="absolute inset-0">
    <?= image_slot('hero', 'Drop hero photo or video still', 'A group therapy session in a sunlit room', true) ?>
  </div>
  <div class="pointer-events-none absolute inset-0 bg-hero-veil"></div>

  <div class="pointer-events-none relative z-10 flex flex-1 flex-col items-center justify-center px-6 py-16 text-center sm:px-10 lg:py-24">
    <div class="mb-7 flex gap-1.5">
      <span class="block h-1 w-11 bg-brand-blue"></span>
      <span class="block h-1 w-11 bg-brand-orange"></span>
      <span class="block h-1 w-11 bg-brand-green"></span>
    </div>

    <h1 class="m-0 max-w-[17ch] text-balance text-[40px] leading-[1.04] tracking-[-0.035em] text-white sm:text-[56px] lg:text-[74px]">A new era of mental health care.</h1>

    <p class="mb-9 mt-6 max-w-[54ch] text-base leading-relaxed text-white/85 sm:text-[19px]">Evidence-based psychiatry, therapy and TMS — delivered by clinicians who take the time to know you. In-person and telehealth, most insurance accepted.</p>

    <div class="pointer-events-auto flex flex-wrap justify-center gap-3">
      <a href="#book" class="inline-flex items-center gap-2.5 rounded-full bg-white px-7 py-[17px] text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">Get started</a>
      <a href="<?= e($site['phone_href']) ?>" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/55 px-7 py-[17px] text-[15px] font-extrabold text-white transition-colors hover:bg-white/15"><?= e($site['phone']) ?></a>
    </div>

    <a href="#tms" class="pointer-events-auto mt-8 inline-flex items-center gap-2 text-sm font-extrabold text-white transition-colors hover:text-brand-green">
      Learn about TMS
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M7 17 17 7M9 7h8v8"></path></svg>
    </a>
  </div>
</section>

<!-- ─── Insurer marquee ──────────────────────────────────────────────── -->
<section class="border-b-2 border-ink/10">
  <div class="mx-auto flex max-w-[1280px] flex-wrap items-center gap-6 px-5 py-9 sm:px-10 lg:gap-12">
    <p class="m-0 whitespace-nowrap text-xs font-extrabold uppercase tracking-[0.14em] text-ink/50">In-network with</p>
    <div class="marquee-mask min-w-0 flex-1 overflow-hidden">
      <div class="flex w-max animate-marquee items-center gap-14">
        <?php for ($copy = 0; $copy < 2; $copy++): ?>
          <?php foreach ($data['insurers'] as $insurer): ?>
            <span class="whitespace-nowrap text-[19px] font-extrabold tracking-[-0.01em] text-ink/40"<?= $copy ? ' aria-hidden="true"' : '' ?>><?= e($insurer) ?></span>
          <?php endforeach; ?>
        <?php endfor; ?>
      </div>
    </div>
    <a href="#book" class="whitespace-nowrap text-[13px] font-extrabold text-brand-blue transition-colors hover:text-brand-blue-dark">Verify my coverage →</a>
  </div>
</section>

<!-- ─── Conditions ───────────────────────────────────────────────────── -->
<section id="conditions" class="mx-auto max-w-[1280px] px-5 py-20 sm:px-10 lg:py-[104px]">
  <div class="mb-12 flex flex-wrap items-end justify-between gap-10 border-b-2 border-ink/15 pb-6">
    <div>
      <p class="<?= $eyebrow ?> mb-3.5 text-brand-orange-dark">Conditions we treat</p>
      <h2 class="m-0 max-w-[20ch] text-[32px] leading-[1.06] tracking-[-0.025em] sm:text-[44px]">Care for the whole range of what you're carrying.</h2>
    </div>
    <p class="m-0 max-w-[34ch] text-[15px] leading-relaxed text-ink/60">Every plan starts with a full diagnostic assessment — never a fifteen-minute script.</p>
  </div>

  <div class="grid items-stretch gap-10 lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)]" data-conditions>
    <div class="flex flex-col gap-2.5">
      <?php foreach ($data['conditions'] as $i => $condition): ?>
        <button type="button"
                data-cond-tab="<?= $i ?>"
                data-active="<?= $i === 0 ? 'true' : 'false' ?>"
                aria-controls="cond-panel-<?= $i ?>"
                class="grid w-full flex-1 cursor-pointer grid-cols-[minmax(0,1fr)_auto] items-center gap-4 rounded-2xl border-0 border-l-4 border-ink/15 bg-white px-6 py-5 text-left font-sans transition-colors data-[active=true]:border-brand-orange data-[active=true]:bg-psych">
          <span class="min-w-0 text-lg font-extrabold tracking-[-0.02em] text-ink sm:text-xl"><?= e($condition['name']) ?></span>
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#0f639b" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>
        </button>
      <?php endforeach; ?>
      <a href="#book" class="mt-6 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue transition-colors hover:text-brand-blue-dark">
        See all conditions we treat <?= arrow_icon(15) ?>
      </a>
    </div>

    <div class="relative min-h-[520px] min-w-0 overflow-hidden rounded-3xl bg-night lg:min-h-[620px]">
      <?php foreach ($data['conditions'] as $i => $condition): ?>
        <div id="cond-panel-<?= $i ?>"
             data-cond-panel="<?= $i ?>"
             data-active="<?= $i === 0 ? 'true' : 'false' ?>"
             class="invisible absolute inset-0 opacity-0 transition-opacity duration-300 data-[active=true]:visible data-[active=true]:opacity-100">
          <div class="absolute inset-0">
            <?= image_slot($condition['slot'], $condition['name'] . ' photo', $condition['alt'], false, $condition['focus'] ?? '') ?>
          </div>
          <div class="pointer-events-none absolute inset-0 bg-cond-veil"></div>
          <div class="absolute left-4 top-4 w-[calc(100%-2rem)] rounded-[18px] bg-night/60 p-6 backdrop-blur-[14px] sm:left-8 sm:top-8 sm:w-[min(400px,calc(100%-64px))] sm:p-[30px]">
            <div class="mb-3.5 flex items-center gap-2.5">
              <span class="h-1 w-7 bg-brand-sky"></span>
              <h3 class="m-0 text-[26px] tracking-[-0.025em] text-white"><?= e($condition['name']) ?></h3>
            </div>
            <p class="m-0 mb-[22px] text-[15px] leading-relaxed text-white/80"><?= e($condition['blurb']) ?></p>
            <div class="border-t border-white/25 pt-5">
              <p class="m-0 mb-3 text-[13px] font-semibold text-white/70">How we treat it:</p>
              <div class="mb-6 flex flex-wrap gap-2">
                <?php foreach ($condition['chips'] as $chip): ?>
                  <span class="rounded-full border border-white/40 px-3 py-2 text-[13px] font-semibold text-white"><?= e($chip) ?></span>
                <?php endforeach; ?>
              </div>
              <div class="flex flex-wrap gap-0.5">
                <a href="#book" class="inline-flex items-center gap-2 rounded-full bg-white px-[18px] py-3.5 text-sm font-extrabold text-ink transition-colors hover:bg-brand-orange hover:text-white">
                  Get care <?= arrow_icon(15) ?>
                </a>
                <a href="#treatments" class="inline-flex items-center gap-2 rounded-full bg-white/15 px-[18px] py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-white/30">Treatments</a>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ─── Our focus ────────────────────────────────────────────────────── -->
<section id="focus" class="p-5 sm:p-10">
  <div class="mx-auto max-w-[1400px] rounded-[28px] bg-brand-blue px-6 py-16 sm:px-12 lg:px-20 lg:pb-24 lg:pt-[88px]">
    <p class="m-0 mb-11 text-[15px] font-semibold text-white/70">Our focus</p>
    <div class="flex max-w-[960px] flex-col gap-10 border-l border-white/35 pl-6 sm:pl-14">
      <?php foreach ($data['focus_paragraphs'] as $paragraph): ?>
        <p class="m-0 text-pretty text-xl leading-[1.42] tracking-[-0.02em] text-white/90 sm:text-2xl lg:text-[30px]"><?= e($paragraph) ?></p>
      <?php endforeach; ?>
      <a href="#book" class="mt-2 inline-flex items-center gap-2.5 self-start rounded-full bg-white px-8 py-[17px] text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
        About us <?= arrow_icon(15) ?>
      </a>
    </div>
  </div>
</section>

<!-- ─── Treatments ───────────────────────────────────────────────────── -->
<section id="treatments" class="bg-surface px-5 py-20 sm:px-10 lg:py-[104px]">
  <div class="mx-auto max-w-[1280px]">
    <div class="mb-14 text-center">
      <p class="<?= $eyebrow ?> mb-4 text-brand-blue">Treatments</p>
      <h2 class="m-0 text-[34px] leading-[1.08] tracking-[-0.03em] sm:text-[46px]">A full spectrum of care, under one roof.</h2>
    </div>

    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <?php foreach ($data['treatments'] as $treatment): ?>
        <div class="flex flex-col rounded-[22px] bg-white px-8 pb-8 pt-9">
          <h3 class="m-0 mb-3 text-center text-2xl tracking-[-0.02em] text-brand-blue"><?= e($treatment['name']) ?></h3>
          <p class="m-0 mb-6 text-center text-[15px] leading-[1.55] text-ink/60"><?= e($treatment['detail']) ?></p>
          <div class="relative min-h-[180px] flex-1 overflow-hidden rounded-2xl bg-night">
            <?= image_slot($treatment['slot'], $treatment['name'] . ' photo', $treatment['alt'], false, $treatment['focus'] ?? '') ?>
            <div class="pointer-events-none absolute inset-0 bg-card-veil"></div>
            <div class="absolute inset-x-3 bottom-3 flex flex-wrap gap-2">
              <?php foreach ($treatment['chips'] as $chip): ?>
                <span class="chip-glass"><?= e($chip) ?></span>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="mt-12 text-center">
      <a href="#book" class="inline-flex items-center rounded-full bg-brand-blue px-9 py-[18px] text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">Get care today</a>
    </div>
  </div>
</section>

<!-- ─── TMS ──────────────────────────────────────────────────────────── -->
<section id="tms" class="p-5 sm:p-10">
  <div class="relative mx-auto flex min-h-[560px] max-w-[1400px] items-end overflow-hidden rounded-[28px] bg-night lg:min-h-[640px]">
    <div class="absolute inset-0">
      <?= image_slot('homepage/tms-new-era.webp', 'TMS treatment room photo', 'A smiling patient in the TMS chair, coil positioned, with a clinician talking her through the session') ?>
    </div>
    <div class="pointer-events-none absolute inset-0 bg-tms-veil"></div>

    <div class="relative flex w-full flex-col gap-8 p-6 sm:p-12 lg:px-16 lg:pb-14 lg:pt-16">
      <div class="max-w-[640px]">
        <p class="<?= $eyebrow ?> mb-4 text-brand-green">TMS Therapy</p>
        <h2 class="m-0 mb-4 text-[30px] leading-[1.1] tracking-[-0.03em] text-white sm:text-[42px]">When medication hasn't been enough.</h2>
        <p class="m-0 text-base leading-relaxed text-white/80">Non-invasive, FDA-cleared magnetic stimulation for depression and OCD. No anesthesia, no sedation — you drive yourself home and go back to your day.</p>
      </div>

      <div class="flex flex-wrap items-center justify-between gap-8 border-t border-white/25 pt-7">
        <div class="flex flex-wrap gap-10">
          <?php foreach ($data['tms_stats'] as $stat): ?>
            <div>
              <p class="m-0 text-[32px] font-extrabold tracking-[-0.03em]" style="color:<?= e($stat['color']) ?>"><?= e($stat['value']) ?></p>
              <p class="m-0 mt-0.5 text-[13px] text-white/75"><?= e($stat['label']) ?></p>
            </div>
          <?php endforeach; ?>
        </div>
        <a href="#book" class="inline-flex items-center gap-2.5 whitespace-nowrap rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
          See if TMS is right for you <?= arrow_icon(16) ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── Therapy vs psychiatry ────────────────────────────────────────── -->
<section class="bg-white px-5 py-20 sm:px-10 lg:py-[104px]">
  <div class="mx-auto max-w-[1280px]">
    <div class="mb-14 text-center">
      <h2 class="m-0 mb-4 text-[32px] leading-[1.08] tracking-[-0.03em] sm:text-[46px]">Not sure what kind of support you need?</h2>
      <p class="m-0 text-[17px] text-ink/60">Treatment isn't one-size-fits-all. Therapy and psychiatry can work separately or as a team.</p>
    </div>

    <div class="lg:grid lg:grid-cols-[minmax(160px,0.7fr)_minmax(0,1fr)_minmax(0,1fr)] lg:gap-x-6">
      <div class="hidden lg:block"></div>
      <div class="hidden rounded-t-[20px] bg-therapy px-8 pb-6 pt-9 lg:block">
        <h3 class="m-0 text-[28px] tracking-[-0.02em] text-brand-blue-dark">Therapy</h3>
      </div>
      <div class="hidden rounded-t-[20px] bg-psych px-8 pb-6 pt-9 lg:block">
        <h3 class="m-0 text-[28px] tracking-[-0.02em] text-clay">Psychiatry</h3>
      </div>

      <?php foreach ($data['compare_rows'] as $row): ?>
        <div class="mb-4 overflow-hidden rounded-2xl border border-ink/10 lg:mb-0 lg:contents">
          <div class="flex items-center border-ink/15 px-5 py-5 text-base font-extrabold text-ink lg:border-t lg:px-0 lg:py-6 lg:pr-4"><?= e($row['label']) ?></div>
          <div class="bg-therapy px-5 py-5 sm:px-8 lg:border-t lg:border-brand-blue/20 lg:py-6">
            <span class="mb-1.5 block text-[11px] font-extrabold uppercase tracking-[0.14em] text-brand-blue/70 lg:hidden">Therapy</span>
            <p class="m-0 text-[15px] leading-relaxed text-brand-blue-dark"><?= e($row['therapy']) ?></p>
          </div>
          <div class="bg-psych px-5 py-5 sm:px-8 lg:border-t lg:border-brand-orange/30 lg:py-6">
            <span class="mb-1.5 block text-[11px] font-extrabold uppercase tracking-[0.14em] text-clay/70 lg:hidden">Psychiatry</span>
            <p class="m-0 text-[15px] leading-relaxed text-clay-deep"><?= e($row['psychiatry']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="hidden lg:block"></div>
      <div class="rounded-b-[20px] bg-therapy px-5 pb-10 pt-7 sm:px-8">
        <a href="#book" class="inline-flex items-center gap-2 rounded-full bg-brand-blue px-6 py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-brand-blue-dark">
          Get started <?= arrow_icon(15) ?>
        </a>
      </div>
      <div class="mt-4 rounded-b-[20px] bg-psych px-5 pb-10 pt-7 sm:px-8 lg:mt-0">
        <a href="#book" class="inline-flex items-center gap-2 rounded-full bg-brand-orange px-6 py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-brand-orange-dark">
          Get started <?= arrow_icon(15) ?>
        </a>
      </div>
    </div>
  </div>
</section>

<!-- ─── Reviews ──────────────────────────────────────────────────────── -->
<?php $review_pages = array_chunk($data['reviews'], 6); ?>
<section class="p-5 sm:p-10">
  <div class="mx-auto max-w-[1400px] rounded-[28px] bg-[#10202c] bg-reviews-glow px-6 py-14 sm:px-16 lg:py-[72px]" data-reviews>
    <div class="mb-8 flex items-center justify-between gap-6">
      <div>
        <p class="<?= $eyebrow ?> mb-2.5 text-brand-green">Reviews</p>
        <h2 class="m-0 text-[28px] leading-[1.1] tracking-[-0.02em] text-white sm:text-4xl">In their words.</h2>
      </div>
      <div class="flex gap-2.5">
        <button type="button" data-review-prev aria-label="Previous reviews" class="flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-white/40 bg-transparent text-white transition-colors hover:bg-white/15">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M15 6l-6 6 6 6"></path></svg>
        </button>
        <button type="button" data-review-next aria-label="Next reviews" class="flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-white/40 bg-transparent text-white transition-colors hover:bg-white/15">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M9 6l6 6-6 6"></path></svg>
        </button>
      </div>
    </div>

    <?php foreach ($review_pages as $page => $reviews): ?>
      <div data-review-page="<?= $page ?>" class="grid gap-5 sm:grid-cols-2 lg:grid-cols-3<?= $page > 0 ? ' hidden' : '' ?>">
        <?php foreach ($reviews as $i => $review): ?>
          <figure class="m-0 flex h-[260px] flex-col justify-between rounded-[18px] px-7 py-8 <?= $i % 2 === 0 ? 'bg-surface' : 'bg-white' ?>">
            <blockquote class="m-0 line-clamp-5 text-[17px] leading-[1.5] tracking-[-0.01em] text-ink"><?= e($review['quote']) ?></blockquote>
            <figcaption class="m-0 mt-5 text-sm font-extrabold text-ink"><?= e($review['who']) ?></figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <div class="mt-10 text-center">
      <a href="#book" class="inline-flex items-center rounded-full bg-white px-8 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">More success stories</a>
    </div>
  </div>
</section>

<!-- ─── FAQ ──────────────────────────────────────────────────────────── -->
<section id="faq" class="bg-mist">
  <div class="mx-auto max-w-[1280px] px-5 py-20 sm:px-10 lg:py-[104px]">
    <h2 class="m-0 mb-3.5 text-[38px] leading-[1.04] tracking-[-0.03em] text-brand-blue-dark sm:text-[52px]">Any questions?</h2>
    <p class="m-0 mb-14 text-base text-brand-blue">Find trust-worthy answers on everything we treat and how we treat it.</p>

    <div class="grid items-start gap-10 lg:grid-cols-[minmax(0,0.85fr)_minmax(0,1.15fr)] lg:gap-[72px]">
      <div class="relative h-[280px] overflow-hidden rounded-[20px] bg-night lg:h-[420px]">
        <?= image_slot('homepage/home-ambience-nera.webp', 'Drop a supporting photo', 'A quiet Anew Era treatment room, with a reclining chair and a clinician’s desk') ?>
      </div>

      <div data-faq>
        <div class="mb-9 flex flex-wrap gap-2.5">
          <?php foreach ($data['faq_categories'] as $i => $category): ?>
            <button type="button"
                    data-faq-tab="<?= $i ?>"
                    data-active="<?= $i === 0 ? 'true' : 'false' ?>"
                    aria-controls="faq-group-<?= $i ?>"
                    class="cursor-pointer rounded-full border-2 border-brand-blue-dark/35 bg-transparent px-5 py-3.5 font-sans text-[13px] font-extrabold uppercase tracking-[0.04em] text-brand-blue-dark transition-colors data-[active=true]:border-brand-blue-dark data-[active=true]:bg-brand-blue-dark data-[active=true]:text-white">
              <?= e($category['name']) ?>
            </button>
          <?php endforeach; ?>
        </div>

        <?php foreach ($data['faq_categories'] as $i => $category): ?>
          <div id="faq-group-<?= $i ?>" data-faq-group="<?= $i ?>"<?= $i > 0 ? ' hidden' : '' ?>>
            <?php foreach ($category['faqs'] as $j => $faq): ?>
              <details class="group border-b border-brand-blue/30"<?= $j === 0 ? ' open' : '' ?>>
                <summary class="flex cursor-pointer list-none items-center justify-between gap-6 py-6 text-lg font-extrabold tracking-[-0.015em] text-brand-blue-dark [&::-webkit-details-marker]:hidden sm:text-xl">
                  <span><?= e($faq['q']) ?></span>
                  <span class="shrink-0 text-[22px] font-normal leading-none text-brand-blue" aria-hidden="true">
                    <span class="group-open:hidden">+</span><span class="hidden group-open:inline">−</span>
                  </span>
                </summary>
                <p class="m-0 max-w-[62ch] pb-[26px] pr-0 text-[15px] leading-[1.7] text-brand-blue-dark/75 sm:pr-[60px]"><?= e($faq['a']) ?></p>
              </details>
            <?php endforeach; ?>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!-- ─── Booking CTA ──────────────────────────────────────────────────── -->
<section id="book" class="mx-auto max-w-[1400px] p-5 sm:p-10">
  <div class="relative overflow-hidden rounded-3xl bg-cream bg-cta-glow px-6 py-12 text-center sm:px-16 lg:py-[52px]">
    <h2 class="m-0 mb-3 text-[26px] leading-[1.18] tracking-[-0.02em] text-ink sm:text-[34px]">
      Care designed for <em class="font-serif font-normal italic">real life — and real progress</em>
    </h2>
    <p class="mx-auto m-0 mb-6 max-w-[52ch] text-base text-ink/70">New patient appointments typically available within five days. Insurance verified before your first visit — no surprise bills.</p>
    <a href="#book" class="inline-flex items-center rounded-full bg-ink px-7 py-3.5 text-[15px] font-bold text-white transition-colors hover:bg-brand-blue-dark">Book a consultation</a>
    <p class="m-0 mt-[18px] text-xs text-ink/55">In crisis? Call or text 988 any time.</p>
  </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
