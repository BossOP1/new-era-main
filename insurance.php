<?php
/**
 * Anew Era Health — insurance and cost.
 *
 * The canonical page for coverage. Everything about insurance elsewhere on
 * the site — the homepage marquee, the TMS cost section, the FAQ's insurance
 * category — is a summary that points here.
 *
 * Carriers come from $data['insurers'] so the list stays in one place;
 * everything else is in includes/data-insurance.php, including the TMS
 * coverage criteria that tms.php prints too.
 *
 * Nothing on this page promises coverage: plans differ inside a carrier, so
 * it describes what is usual and ends at a benefits check. It also quotes no
 * prices — see the ⚠ note on 'self_pay' in the data file.
 */
$page_title        = 'Insurance & cost';
$page_description  = 'The carriers Anew Era Health is in-network with, how a benefits check works, what coverage usually looks like for psychiatry, therapy, TMS and Spravato®, and the words insurers use — explained plainly.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$ins       = require __DIR__ . '/includes/data-insurance.php';
$insurers  = $data['insurers'];

// Shared spacing and type, lifted from team.php so the hub pages match.
$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';

// Carriers split by where they operate, so somebody in one state is not
// reading a list of plans they cannot use.
$by_state = ['CA' => [], 'TX' => []];
foreach ($insurers as $insurer) {
    foreach (['CA', 'TX'] as $state) {
        if (strpos($insurer['states'], $state) !== false) {
            $by_state[$state][] = $insurer['name'];
        }
    }
}
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 233 238 241; background-color: #e9eef1">
    <?php // Photograph and wash, the same construction the condition heroes use. ?>
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/insurance/hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto flex min-h-[280px] max-w-[1160px] items-center lg:min-h-[330px]">
      <div class="max-w-[600px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
            <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-blue">Insurance</li>
          </ol>
        </nav>

        <h1 class="m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-ink text-[40px] sm:text-[54px] lg:text-[62px]">
          Know the number<br>before you<br><em class="not-italic text-brand-blue">walk in.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[50ch] text-[15px] leading-[1.75] text-ink/75 sm:mt-6 sm:text-base">
          We are in-network with <?= e((string) count($insurers)) ?> carriers across California and Texas, and we check
          your benefits before your first appointment rather than after it. A first bill should never be
          the first you hear of a cost.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="index.php#book" class="<?= $btn_blue ?>">Check my coverage <?= arrow_icon(16) ?></a>
          <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
        </div>

        <p class="m-0 mt-5 text-[13px] leading-relaxed text-ink/65 sm:mt-6">
          Not insured, or would rather not involve your insurer? <a href="#self-pay" class="font-extrabold text-brand-blue underline decoration-brand-blue/30 underline-offset-4 hover:decoration-brand-blue">Paying privately</a> is straightforward.
        </p>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-ink/20 pt-4 text-[11px] text-ink/65 sm:mt-8">
      <span>Benefits verified before your first visit. Prior authorisation handled by us.</span>
      <span>Psychiatry <span aria-hidden="true" class="px-2">/</span> Therapy <span aria-hidden="true" class="px-2">/</span> TMS <span aria-hidden="true" class="px-2">/</span> Spravato<sup>&reg;</sup></span>
    </div>
  </section>
</div>

<!-- ─── The carriers ─────────────────────────────────────────────────── -->
<section id="carriers" class="<?= $wrap ?> scroll-mt-[110px] pb-2 pt-10 sm:pt-14 md:pt-[76px]">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> In-network</p>
      <h2 class="<?= $h2 ?>">The plans we<br><em class="italic font-normal text-brand-blue">work with.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[320px]">
      Being in-network with a carrier is not the same as being covered on every plan it sells. The
      benefits check is what actually answers it for you.
    </p>
  </div>

  <div class="grid gap-3 md:grid-cols-2 md:gap-4">
    <?php foreach (['CA' => 'California', 'TX' => 'Texas'] as $code => $label): ?>
      <div data-reveal class="rounded-[24px] border border-[#e3e7ea] bg-white p-7 sm:p-9">
        <div class="mb-5 flex items-baseline justify-between gap-4">
          <h3 class="m-0 font-serif text-[24px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[28px]"><?= e($label) ?></h3>
          <span class="text-[11px] font-bold uppercase tracking-[0.14em] text-ink/40"><?= e((string) count($by_state[$code])) ?> carriers</span>
        </div>
        <ul class="m-0 grid list-none gap-x-5 gap-y-2.5 p-0 sm:grid-cols-2">
          <?php foreach ($by_state[$code] as $name): ?>
            <li class="flex items-start gap-2.5 text-[14.5px] leading-[1.5] text-ink/80">
              <svg aria-hidden="true" width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.6" stroke-linecap="round" stroke-linejoin="round" class="mt-1 shrink-0 text-brand-green"><path d="m5 12.5 4.5 4.5L19 7.5"></path></svg>
              <span><?= e($name) ?></span>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endforeach; ?>
  </div>

  <p class="m-0 mt-5 max-w-[80ch] text-[13.5px] leading-[1.7] text-ink/60">
    We also work with Medicare and with Tricare. Medicaid participation depends on the state and the
    clinic, so ask the intake team directly rather than assuming either way. Don’t see your carrier?
    Call us anyway — out-of-network does not automatically mean unaffordable.
  </p>
</section>

<!-- ─── How it works ─────────────────────────────────────────────────── -->
<section id="how" class="<?= $wrap ?> scroll-mt-[110px] <?= $pad ?>">
  <div class="mb-7 sm:mb-9">
    <p class="<?= $eyebrow ?>"><?= $dot ?> How it works</p>
    <h2 class="<?= $h2 ?>">Four steps, and<br><em class="italic font-normal text-brand-blue">three are ours.</em></h2>
  </div>

  <ol class="m-0 grid list-none gap-3 p-0 md:grid-cols-2 md:gap-4 lg:grid-cols-4">
    <?php foreach ($ins['steps'] as $i => $step): ?>
      <li data-reveal class="flex h-full flex-col rounded-[22px] border border-[#e3e7ea] bg-white p-7">
        <span class="font-serif text-[34px] font-normal leading-none text-brand-blue/35"><?= e(str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT)) ?></span>
        <h3 class="m-0 mt-4 text-[16px] font-extrabold leading-[1.35] tracking-[-0.01em] text-ink"><?= e($step['name']) ?></h3>
        <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]"><?= e($step['copy']) ?></p>
      </li>
    <?php endforeach; ?>
  </ol>

  <div data-reveal class="mt-4 flex flex-col gap-5 rounded-[22px] bg-[#10202c] bg-reviews-glow px-7 py-8 sm:flex-row sm:items-center sm:justify-between sm:px-9">
    <div>
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-brand-green">Before you call</p>
      <p class="m-0 mt-2.5 font-serif text-[21px] font-normal leading-[1.25] tracking-[-0.02em] text-white sm:text-[24px]">Have these four things to hand.</p>
    </div>
    <ul class="m-0 grid list-none gap-2 p-0 sm:max-w-[520px] sm:flex-1 sm:grid-cols-2">
      <?php foreach ($ins['ready'] as $item): ?>
        <li class="flex items-start gap-2.5 text-[13.5px] leading-[1.55] text-white/80">
          <span aria-hidden="true" class="mt-[7px] h-1.5 w-1.5 shrink-0 rounded-full bg-brand-orange"></span>
          <span><?= e($item) ?></span>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- ─── By treatment ─────────────────────────────────────────────────── -->
<section id="by-treatment" class="<?= $wrap ?> scroll-mt-[110px] pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> What is usually covered</p>
      <h2 class="<?= $h2 ?>">By treatment,<br><em class="italic font-normal text-brand-blue">and what to ask.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[320px]">
      What follows is what is usual, not a promise about your plan. The second line in each is the
      thing worth asking about on the call.
    </p>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4">
    <?php foreach ($ins['coverage'] as $item): ?>
      <li>
        <a href="<?= e($item['page']) ?>" data-reveal class="lift group flex h-full flex-col rounded-[24px] border border-[#e3e7ea] bg-white p-7 transition-colors hover:border-brand-blue/35 sm:p-8">
          <div class="mb-4 flex items-center gap-3">
            <?= nav_icon($item['icon'], 'h-[22px] w-[22px] shrink-0 text-brand-blue') ?>
            <h3 class="m-0 font-serif text-[23px] font-normal leading-[1.1] tracking-[-0.03em] text-ink sm:text-[26px]"><?= e($item['name']) ?></h3>
          </div>
          <p class="m-0 text-[14.5px] leading-[1.7] text-[#58616a]"><?= e($item['typical']) ?></p>
          <p class="m-0 mt-3.5 flex items-start gap-2.5 rounded-[14px] bg-[#faf8f3] px-4 py-3 text-[13.5px] leading-[1.6] text-ink/70">
            <span aria-hidden="true" class="mt-[3px] shrink-0 font-extrabold text-brand-orange">?</span>
            <span><?= e($item['watch']) ?></span>
          </p>
          <span class="mt-auto pt-5 inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue">
            <?php // Not strtolower(): it would print "tms therapy" and "spravato®". ?>
            About <?= e($item['name']) ?>
            <span class="transition-transform duration-200 group-hover:translate-x-1"><?= arrow_icon(15) ?></span>
          </span>
        </a>
      </li>
    <?php endforeach; ?>
  </ul>

  <?php // TMS is the one people ask about most, and the one with real criteria. ?>
  <div data-reveal class="mt-3 rounded-[24px] border border-[#e3e7ea] bg-white p-7 sm:p-9 md:mt-4">
    <div class="md:flex md:items-start md:gap-12">
      <div class="md:max-w-[380px]">
        <p class="<?= $eyebrow ?> !mb-3"><?= $dot ?> TMS in particular</p>
        <h3 class="m-0 font-serif text-[24px] font-normal leading-[1.12] tracking-[-0.03em] text-ink sm:text-[29px]">When a plan will cover a course.</h3>
        <p class="m-0 mt-4 text-[14.5px] leading-[1.75] text-[#58616a]">
          Insurers worked out some time ago that a course of TMS costs less than years of unsuccessful
          medication and what follows it. Most plans now cover it for treatment-resistant depression
          when three conditions are met.
        </p>
      </div>
      <ol class="m-0 mt-6 list-none p-0 md:mt-0 md:flex-1">
        <?php foreach ($ins['tms_criteria'] as $i => $criterion): ?>
          <li class="flex items-start gap-4 border-b border-ink/10 py-4 first:pt-0 last:border-b-0 last:pb-0">
            <span aria-hidden="true" class="mt-0.5 flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-mist text-[12px] font-extrabold text-brand-blue"><?= e((string) ($i + 1)) ?></span>
            <span class="text-[14.5px] leading-[1.6] text-ink/80"><?= e($criterion) ?></span>
          </li>
        <?php endforeach; ?>
      </ol>
    </div>
    <p class="m-0 mt-6 border-t border-ink/10 pt-5 text-[13.5px] leading-[1.7] text-ink/60">
      Criteria vary between carriers and between plans within a carrier. Tricare covers TMS for
      veterans with major depressive disorder and PTSD.
      <a href="tms.php" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">Read about TMS</a>.
    </p>
  </div>
</section>

<!-- ─── Self-pay ─────────────────────────────────────────────────────── -->
<section id="self-pay" class="<?= $wrap ?> scroll-mt-[110px] pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9">
    <p class="<?= $eyebrow ?>"><?= $dot ?> If you are not covered</p>
    <h2 class="<?= $h2 ?>">Paying privately,<br><em class="italic font-normal text-brand-blue">without the guesswork.</em></h2>
  </div>

  <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-4">
    <?php foreach ($ins['self_pay'] as $item): ?>
      <li data-reveal class="flex h-full flex-col rounded-[22px] bg-white p-7">
        <h3 class="m-0 text-[15.5px] font-extrabold leading-[1.35] tracking-[-0.01em] text-ink"><?= e($item['name']) ?></h3>
        <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]"><?= e($item['copy']) ?></p>
      </li>
    <?php endforeach; ?>
  </ul>
</section>

<!-- ─── Glossary ─────────────────────────────────────────────────────── -->
<section id="glossary" class="<?= $wrap ?> scroll-mt-[110px] pb-10 sm:pb-[60px] md:pb-[76px]">
  <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
    <div>
      <p class="<?= $eyebrow ?>"><?= $dot ?> The paperwork, translated</p>
      <h2 class="<?= $h2 ?>">The words<br><em class="italic font-normal text-brand-blue">insurers use.</em></h2>
    </div>
    <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[320px]">
      None of this is specific to us. It is the vocabulary every plan is written in, and knowing it
      makes the call to your insurer a much shorter one.
    </p>
  </div>

  <dl class="m-0 grid gap-3 md:grid-cols-2 md:gap-4">
    <?php foreach ($ins['glossary'] as $entry): ?>
      <div data-reveal class="rounded-[20px] border border-[#e3e7ea] bg-white px-6 py-6 sm:px-7">
        <dt class="m-0 text-[15.5px] font-extrabold tracking-[-0.01em] text-ink"><?= e($entry['term']) ?></dt>
        <dd class="m-0 mt-2 text-[14px] leading-[1.7] text-[#58616a]"><?= e($entry['copy']) ?></dd>
      </div>
    <?php endforeach; ?>
  </dl>

  <p class="m-0 mt-5 text-[13.5px] leading-[1.7] text-ink/60">
    More on first visits, referrals and billing in the
    <a href="faq.php#cat-cost" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">insurance questions on our FAQ</a>.
  </p>
</section>

<!-- ─── Book ─────────────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> pb-12 sm:pb-[80px]">
  <div data-reveal class="relative flex flex-col items-center justify-center gap-5 rounded-[28px] bg-cream bg-cta-glow px-6 py-10 text-center sm:gap-6 sm:px-12 sm:py-14">
    <?= brand_glyph('h-16 w-auto') ?>
    <h2 class="m-0 max-w-[20ch] font-serif text-[30px] font-normal leading-[1.08] tracking-[-0.035em] text-ink sm:text-[42px]">
      Let us check it for you.
    </h2>
    <p class="m-0 max-w-[54ch] text-[15px] leading-[1.75] text-ink/70">
      Tell us who you are insured with and we will come back with what your plan covers and what it
      leaves you — before anything is booked.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="index.php#book" class="<?= $btn_blue ?>">Check my coverage <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
    </div>
  </div>
</section>

</div>

<?php require __DIR__ . '/includes/footer.php'; ?>
