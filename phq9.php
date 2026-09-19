<?php
/**
 * Anew Era Health — the PHQ-9 screening questionnaire.
 *
 * Five places on this site already say "Take the PHQ-9" and pointed at
 * index.php#book for want of anywhere better. This is that page.
 *
 * Three decisions worth knowing about, because the obvious build is worse:
 *
 *   1. The items are the PHQ-9's own wording, not a rewrite. The practice's
 *      existing quiz rephrases them in the first person ("I have little
 *      interest...") and changes an option to "At least half of the time".
 *      Those are reasonable-sounding edits that stop the result being a PHQ-9
 *      score at all — the instrument is validated on its wording, not its
 *      gist. See the note above $items.
 *
 *   2. The result is not gated behind a contact form. The practice's version
 *      asks for name, email and phone before it will show you anything. On a
 *      questionnaire whose ninth item asks about wanting to be dead, holding
 *      the answer hostage to a lead capture is not a trade we should make.
 *
 *   3. Nothing is transmitted or stored. Scoring happens in the browser, there
 *      is no form post, no localStorage and no analytics on the answers. The
 *      page says so, because a person answering item nine honestly deserves to
 *      know where it goes. Keep it that way.
 *
 * Item 9 is handled separately from the score: ANY response above "Not at all"
 * surfaces crisis resources with the result, whatever the total came to. A
 * person can score 6 and still be in danger.
 *
 * The PHQ-9 is free to use without permission — developed by Drs Robert
 * Spitzer, Janet Williams and Kurt Kroenke, with an educational grant from
 * Pfizer. The page credits it.
 */
$page_title        = 'PHQ-9 depression screening';
$page_description  = 'The PHQ-9, the nine-question depression screening questionnaire, scored in your browser. Nothing is sent anywhere. It is a screening tool, not a diagnosis — and we go through the result with you.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';

$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$narrow   = 'mx-auto max-w-[860px] px-[22px] md:px-7';
$eyebrow  = 'm-0 mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55 md:mb-[26px]';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2       = 'm-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[clamp(33px,3.9vw,52px)]';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';

/* The nine items, verbatim. Do not rewrite these — see the note above. */
$items = [
    'Little interest or pleasure in doing things',
    'Feeling down, depressed, or hopeless',
    'Trouble falling or staying asleep, or sleeping too much',
    'Feeling tired or having little energy',
    'Poor appetite or overeating',
    'Feeling bad about yourself — or that you are a failure or have let yourself or your family down',
    'Trouble concentrating on things, such as reading the newspaper or watching television',
    'Moving or speaking so slowly that other people could have noticed. Or the opposite — being so fidgety or restless that you have been moving around a lot more than usual',
    'Thoughts that you would be better off dead, or of hurting yourself in some way',
];

$options = [
    0 => 'Not at all',
    1 => 'Several days',
    2 => 'More than half the days',
    3 => 'Nearly every day',
];

// Item 10. Part of the instrument, deliberately not added to the score — it
// describes impact rather than symptoms, and clinicians read it alongside.
$difficulty = ['Not difficult at all', 'Somewhat difficult', 'Very difficult', 'Extremely difficult'];

/* The standard severity bands. 'copy' is what we say about each; none of it
   promises a diagnosis, because a questionnaire cannot make one. */
$bands = [
    ['min' => 0,  'max' => 4,  'name' => 'Minimal',           'copy' => 'This score does not suggest depression. If something still feels wrong, that is worth a conversation anyway — a questionnaire is a blunt instrument and it does not know you.'],
    ['min' => 5,  'max' => 9,  'name' => 'Mild',              'copy' => 'Scores in this range often improve with watchful waiting, exercise, sleep and time. They are also worth mentioning to a clinician, particularly if this has been going on a while.'],
    ['min' => 10, 'max' => 14, 'name' => 'Moderate',          'copy' => 'Ten is the point at which clinicians usually start talking about treatment — therapy, medication, or both. It is a reasonable moment to book an evaluation.'],
    ['min' => 15, 'max' => 19, 'name' => 'Moderately severe', 'copy' => 'A score here usually warrants active treatment rather than waiting to see. Please make an appointment — with us or with anyone.'],
    ['min' => 20, 'max' => 27, 'name' => 'Severe',            'copy' => 'This is a high score and it deserves prompt attention. Please contact a clinician soon. If you are struggling to hold on, call or text 988 now rather than waiting for an appointment.'],
];
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero ─────────────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-7 pt-[108px] text-white sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="background-color: #0d1a21">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/phq9/hero.jpg')) ?>')"></div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-place-veil"></div>

    <div class="mx-auto flex min-h-[270px] max-w-[1160px] items-center lg:min-h-[310px]">
      <div class="max-w-[600px] py-1">
        <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
          <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-white/65">
            <li><a href="index.php#top" class="transition-colors hover:text-white">Home</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li><a href="depression.php" class="transition-colors hover:text-white">Depression</a></li>
            <li aria-hidden="true" class="opacity-40">/</li>
            <li aria-current="page" class="text-brand-sky">PHQ-9</li>
          </ol>
        </nav>

        <h1 class="on-footage m-0 font-serif font-normal leading-[1.05] tracking-[-0.04em] text-white text-[36px] sm:text-[50px] lg:text-[56px]">
          Nine questions,<br class="hidden sm:inline"> <em class="not-italic text-brand-sky">two minutes.</em>
        </h1>

        <p class="m-0 mt-5 max-w-[50ch] text-[15px] leading-[1.75] text-white/80 sm:mt-6 sm:text-base">
          The PHQ-9 is the questionnaire clinicians use to gauge how heavy depression is sitting right
          now. It is a screening tool, not a diagnosis — but it is a good place to start a conversation.
        </p>

        <div class="mt-6 flex flex-wrap gap-3 sm:mt-8">
          <a href="#start" class="<?= $btn_blue ?>">Start the Questionnaire <?= arrow_icon(16) ?></a>
          <a href="#about" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/45 bg-white/10 px-7 py-[14px] text-[15px] font-extrabold text-white backdrop-blur-sm transition-colors hover:border-white/80 hover:bg-white/20">What Is the PHQ-9?</a>
        </div>
      </div>
    </div>

    <div class="mx-auto mt-6 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-white/30 pt-4 text-[11px] text-white/85 sm:mt-8">
      <span>Scored in your browser. Nothing is sent anywhere, and we do not see your answers.</span>
      <span>No sign-up, no email required</span>
    </div>
  </section>
</div>

<!-- ─── Before you start ─────────────────────────────────────────────── -->
<section class="<?= $narrow ?> pt-8 sm:pt-10">
  <div class="flex flex-col gap-4 rounded-[22px] border-2 border-brand-orange/35 bg-[#fdf1e4] px-7 py-6 sm:flex-row sm:items-center sm:justify-between">
    <div>
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-clay">Before you start</p>
      <p class="m-0 mt-2 text-[14.5px] leading-[1.7] text-ink/80">
        If you are thinking about harming yourself, do not wait for a score. Call or text
        <strong>988</strong> — the Suicide and Crisis Lifeline, any time. If someone is in immediate
        danger, call <strong>911</strong>.
      </p>
    </div>
    <div class="flex shrink-0 gap-2.5">
      <a href="tel:988" class="inline-flex items-center rounded-full bg-ink px-6 py-3.5 text-[14px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">Call 988</a>
      <a href="sms:988" class="inline-flex items-center rounded-full border-2 border-ink/25 px-6 py-3 text-[14px] font-extrabold text-ink transition-colors hover:border-ink/50">Text 988</a>
    </div>
  </div>
</section>

<!-- ─── The questionnaire ────────────────────────────────────────────── -->
<section id="start" class="<?= $narrow ?> scroll-mt-[110px] py-10 sm:py-14">
  <div class="mb-6 sm:mb-8">
    <p class="<?= $eyebrow ?>"><?= $dot ?> The questionnaire</p>
    <h2 class="<?= $h2 ?>">Over the last<br><em class="italic font-normal text-brand-blue">two weeks…</em></h2>
    <p class="m-0 mt-5 max-w-[60ch] text-base leading-[1.75] text-[#58616a]">
      …how often have you been bothered by any of the following problems? Answer as honestly as you
      can. Nobody sees this but you.
    </p>
  </div>

  <?php // Progress rides above the questions and is announced politely. ?>
  <div data-phq-progress class="sticky top-[84px] z-20 -mx-[22px] mb-6 border-y border-ink/10 bg-[#faf8f3]/93 px-[22px] py-3 backdrop-blur-md md:-mx-7 md:px-7">
    <div class="flex items-center gap-4">
      <div class="h-1.5 flex-1 overflow-hidden rounded-full bg-ink/10">
        <div data-phq-bar class="h-full w-0 rounded-full bg-brand-blue transition-[width] duration-300"></div>
      </div>
      <p data-phq-count aria-live="polite" class="m-0 shrink-0 text-[12.5px] font-bold text-ink/55"><?= e((string) count($items)) ?> questions</p>
    </div>
  </div>

  <?php /* Scoring happens in the browser, so without JavaScript there is no
           score — but the questions are all here and the rule is simple, so
           this says how to total it by hand rather than leaving a dead end. */ ?>
  <noscript>
    <div class="mb-6 rounded-[22px] border-2 border-ink/20 bg-white px-7 py-6">
      <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/45">Without JavaScript</p>
      <p class="m-0 mt-2.5 max-w-[68ch] text-[14.5px] leading-[1.7] text-ink/80">
        All nine questions are below, but the score is worked out in your browser — so with
        JavaScript off there is nothing to add it up. Score it yourself: <strong>Not at all = 0</strong>,
        <strong>Several days = 1</strong>, <strong>More than half the days = 2</strong>,
        <strong>Nearly every day = 3</strong>. Add the nine.
      </p>
      <p class="m-0 mt-3 max-w-[68ch] text-[14.5px] leading-[1.7] text-ink/80">
        0–4 minimal &middot; 5–9 mild &middot; 10–14 moderate &middot; 15–19 moderately severe &middot;
        20–27 severe. If you answered anything but &ldquo;not at all&rdquo; to question nine, please
        call or text <a href="tel:988" class="font-extrabold text-brand-blue underline underline-offset-4">988</a>
        whatever the total. Or just <a href="contact.php" class="font-extrabold text-brand-blue underline underline-offset-4">book an evaluation</a> and we will go through it with you.
      </p>
    </div>
  </noscript>

  <form data-phq-form novalidate>
    <?php foreach ($items as $i => $item): ?>
      <fieldset data-phq-step="<?= e((string) $i) ?>" class="m-0 mb-3 rounded-[22px] border border-[#e3e7ea] bg-white p-6 sm:p-7">
        <legend class="float-left mb-4 flex w-full items-start gap-3.5 p-0">
          <span aria-hidden="true" class="mt-px flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-mist text-[12px] font-extrabold text-brand-blue"><?= e((string) ($i + 1)) ?></span>
          <span class="text-[15.5px] font-extrabold leading-[1.5] tracking-[-0.01em] text-ink sm:text-[16.5px]"><?= e($item) ?></span>
        </legend>

        <div class="clear-both grid gap-2 sm:grid-cols-2">
          <?php foreach ($options as $value => $label): ?>
            <label class="flex cursor-pointer items-center gap-3 rounded-[14px] border border-ink/12 px-4 py-3 text-[14px] leading-snug text-ink/80 transition-colors hover:border-brand-blue/40 hover:bg-[#f7fafc] has-[:checked]:border-brand-blue has-[:checked]:bg-mist has-[:checked]:font-extrabold has-[:checked]:text-ink">
              <input type="radio" name="q<?= e((string) $i) ?>" value="<?= e((string) $value) ?>"
                     class="h-[18px] w-[18px] shrink-0 cursor-pointer border-ink/30 text-brand-blue focus:ring-brand-blue/30">
              <span><?= e($label) ?></span>
            </label>
          <?php endforeach; ?>
        </div>
      </fieldset>
    <?php endforeach; ?>

    <?php // Item ten. Recorded and reported, deliberately not scored. ?>
    <fieldset data-phq-step="<?= e((string) count($items)) ?>" class="m-0 mb-3 rounded-[22px] border border-dashed border-ink/25 bg-white p-6 sm:p-7">
      <legend class="float-left mb-2 w-full p-0">
        <span class="text-[15.5px] font-extrabold leading-[1.5] tracking-[-0.01em] text-ink sm:text-[16.5px]">
          If you checked off any problems, how difficult have they made it to do your work, take care
          of things at home, or get along with other people?
        </span>
      </legend>
      <p class="clear-both m-0 mb-4 text-[13px] text-ink/55">Part of the questionnaire, but not part of the score.</p>
      <div class="grid gap-2 sm:grid-cols-2">
        <?php foreach ($difficulty as $value => $label): ?>
          <label class="flex cursor-pointer items-center gap-3 rounded-[14px] border border-ink/12 px-4 py-3 text-[14px] leading-snug text-ink/80 transition-colors hover:border-brand-blue/40 hover:bg-[#f7fafc] has-[:checked]:border-brand-blue has-[:checked]:bg-mist has-[:checked]:font-extrabold has-[:checked]:text-ink">
            <input type="radio" name="difficulty" value="<?= e((string) $value) ?>"
                   class="h-[18px] w-[18px] shrink-0 cursor-pointer border-ink/30 text-brand-blue focus:ring-brand-blue/30">
            <span><?= e($label) ?></span>
          </label>
        <?php endforeach; ?>
      </div>
    </fieldset>

    <?php /* Without JavaScript every question is already on the page and this
             row is the whole control. With it, the questions become a stepper
             and Back/Next appear — see the script at the foot of the file. */ ?>
    <div class="mt-6 flex flex-wrap items-center gap-3">
      <button type="button" data-phq-back hidden
              class="cursor-pointer rounded-full border-2 border-ink/20 bg-white px-6 py-[14px] text-[15px] font-extrabold text-ink transition-colors hover:border-ink/45">
        Back
      </button>
      <button type="button" data-phq-next hidden
              class="<?= $btn_blue ?> cursor-pointer disabled:cursor-not-allowed disabled:opacity-45">
        Next <?= arrow_icon(16) ?>
      </button>
      <button type="submit" data-phq-submit class="<?= $btn_blue ?> cursor-pointer disabled:cursor-not-allowed disabled:opacity-45" disabled>
        See My Score <?= arrow_icon(16) ?>
      </button>
      <p data-phq-hint class="m-0 w-full text-[13px] text-ink/55 sm:w-auto">Answer all nine to see a score.</p>
    </div>
  </form>

  <?php /* The result. No display utility on the wrapper — a Tailwind display
           class would beat the hidden attribute and it would show on load. */ ?>
  <div data-phq-result hidden class="mt-10 scroll-mt-[120px]">
    <div class="overflow-hidden rounded-[24px] border border-[#e3e7ea] bg-white">
      <div class="bg-[#10202c] bg-reviews-glow px-7 py-8 text-white sm:px-9">
        <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-brand-green">Your score</p>
        <div class="mt-3 flex flex-wrap items-baseline gap-x-5 gap-y-1">
          <span data-phq-score class="font-serif text-[52px] leading-none tracking-[-0.03em] sm:text-[62px]">0</span>
          <span class="font-serif text-[22px] leading-none text-white/50">of 27</span>
        </div>
        <p data-phq-band class="m-0 mt-3 font-serif text-[24px] font-normal leading-[1.2] tracking-[-0.02em] sm:text-[28px]"></p>
        <p data-phq-difficulty class="m-0 mt-3 text-[13.5px] leading-[1.6] text-white/65"></p>
      </div>

      <div class="px-7 py-7 sm:px-9">
        <p data-phq-copy class="m-0 max-w-[62ch] text-[15px] leading-[1.75] text-[#58616a]"></p>

        <?php // Item nine gets its own panel, shown on any response above zero. ?>
        <div data-phq-risk hidden class="mt-6">
          <div class="rounded-[18px] border-2 border-brand-orange/45 bg-[#fdf1e4] px-6 py-5">
            <p class="m-0 text-[11px] font-bold uppercase tracking-[0.16em] text-clay">Please read this one</p>
            <p class="m-0 mt-2 max-w-[62ch] text-[14.5px] leading-[1.7] text-ink/80">
              You said you have had thoughts of being better off dead or of hurting yourself. Whatever
              the total came to, that answer matters on its own and it is worth telling somebody today.
              Call or text <strong>988</strong> — any time, free, and you do not have to be in crisis
              to use it.
            </p>
            <div class="mt-4 flex flex-wrap gap-2.5">
              <a href="tel:988" class="inline-flex items-center rounded-full bg-ink px-5 py-3 text-[13.5px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark">Call 988</a>
              <a href="sms:988" class="inline-flex items-center rounded-full border-2 border-ink/25 px-5 py-[10px] text-[13.5px] font-extrabold text-ink transition-colors hover:border-ink/50">Text 988</a>
            </div>
          </div>
        </div>

        <div class="mt-7 flex flex-wrap items-center gap-3 border-t border-ink/10 pt-6">
          <a href="contact.php" class="<?= $btn_blue ?>">Book an Evaluation <?= arrow_icon(16) ?></a>
          <button type="button" data-phq-reset class="cursor-pointer border-0 bg-transparent p-0 text-sm font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">Start Again</button>
        </div>
        <p class="m-0 mt-4 text-[12.5px] leading-[1.65] text-ink/55">
          This is a screening score, not a diagnosis. Only a clinical assessment can make one, and
          plenty of things — thyroid trouble, sleep, grief, medication — produce scores like these
          without being depression. We go through the result with you at a first visit.
        </p>
      </div>
    </div>
  </div>
</section>

<!-- ─── About the questionnaire ──────────────────────────────────────── -->
<section id="about" class="bg-mist scroll-mt-[110px]">
  <div class="<?= $wrap ?> py-10 sm:py-14 md:py-[76px]">
    <div class="mb-7 sm:mb-9 md:flex md:items-end md:justify-between md:gap-10">
      <div>
        <p class="<?= $eyebrow ?>"><?= $dot ?> About the PHQ-9</p>
        <h2 class="<?= $h2 ?>">What it is,<br><em class="italic font-normal text-brand-blue">and what it is not.</em></h2>
      </div>
      <p class="m-0 mt-[22px] max-w-[380px] text-base leading-[1.75] text-[#58616a] md:mt-0 md:max-w-[330px]">
        It is the most widely used depression screener in primary care, and it is nine questions long
        for a reason — it was built to be quick.
      </p>
    </div>

    <ul class="m-0 grid list-none gap-3 p-0 sm:grid-cols-2 md:gap-4 lg:grid-cols-3">
      <?php foreach ([
        ['A screen, not a diagnosis', 'It tells you whether a conversation is warranted. It cannot tell you what is wrong, and it does not know your history, your thyroid or what happened last month.'],
        ['Scored 0 to 27',            'Nine items, each worth 0 to 3. Ten and above is the point at which clinicians usually start discussing treatment.'],
        ['A way to track change',      'Its real strength is repetition. The same nine questions every few weeks show whether treatment is moving anything, which is why we use it through a course.'],
        ['Question nine stands alone', 'Any answer above "not at all" is followed up regardless of the total. A low score with a positive item nine is still a reason to talk to somebody.'],
        ['Nothing leaves your browser','There is no form post, no account and no analytics on your answers. Close the tab and it is gone — we have no copy.'],
        ['Free to use',                'The PHQ-9 was developed by Drs Robert Spitzer, Janet Williams and Kurt Kroenke, with an educational grant from Pfizer. No permission is required to use or reproduce it.'],
      ] as [$name, $copy]): ?>
        <li data-reveal class="flex h-full flex-col rounded-[22px] bg-white p-7">
          <h3 class="m-0 text-[15.5px] font-extrabold tracking-[-0.01em] text-ink"><?= e($name) ?></h3>
          <p class="m-0 mt-2.5 text-[14px] leading-[1.7] text-[#58616a]"><?= e($copy) ?></p>
        </li>
      <?php endforeach; ?>
    </ul>

    <p class="m-0 mt-6 max-w-[86ch] text-[13.5px] leading-[1.7] text-ink/60">
      More about how depression is assessed and treated on the
      <a href="depression.php" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">depression page</a>,
      and what a first visit involves in the
      <a href="faq.php" class="font-extrabold text-brand-blue underline underline-offset-4 hover:text-brand-blue-dark">FAQ</a>.
    </p>
  </div>
</section>

<!-- ─── Book ─────────────────────────────────────────────────────────── -->
<section class="<?= $wrap ?> py-12 sm:py-[80px]">
  <div data-reveal class="relative flex flex-col items-center justify-center gap-5 rounded-[28px] bg-cream bg-cta-glow px-6 py-10 text-center sm:gap-6 sm:px-12 sm:py-14">
    <?= brand_glyph('h-16 w-auto') ?>
    <h2 class="m-0 max-w-[22ch] font-serif text-[30px] font-normal leading-[1.08] tracking-[-0.035em] text-ink sm:text-[42px]">
      Whatever the number said.
    </h2>
    <p class="m-0 max-w-[54ch] text-[15px] leading-[1.75] text-ink/70">
      A first visit is a full diagnostic assessment, not a questionnaire. Most new patients are seen
      within a week, and we check your insurance first.
    </p>
    <div class="flex flex-wrap items-center justify-center gap-3">
      <a href="contact.php" class="<?= $btn_blue ?>">Book a Consultation <?= arrow_icon(16) ?></a>
      <a href="<?= e($site['phone_href']) ?>" class="inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink transition-colors hover:border-ink/45 hover:bg-white"><?= e($site['phone']) ?></a>
    </div>
    <p class="m-0 text-[12px] text-ink/55">In crisis? Call or text 988 any time.</p>
  </div>
</section>

</div>

<script>
/* PHQ-9: one question at a time, and scoring.

   Progressive enhancement. The page ships every question in the markup, so
   without JavaScript all nine are readable and answerable as one long form.
   This turns that same markup into a stepper — nothing is generated here that
   a reader without JavaScript would miss.

   Everything runs in the browser and stays there: no fetch, no form post, no
   storage, no analytics. If you add to this file, keep it that way — see the
   note at the top of phq9.php. */
(function () {
  var form = document.querySelector('[data-phq-form]');
  if (!form) { return; }

  var ITEMS  = <?= (int) count($items) ?>;          // scored questions
  var BANDS  = <?= json_encode($bands, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?>;
  var EFFORT = <?= json_encode($difficulty, JSON_UNESCAPED_UNICODE) ?>;

  var steps  = Array.prototype.slice.call(form.querySelectorAll('[data-phq-step]'));
  var LAST   = steps.length - 1;                    // the unscored item ten
  var bar    = document.querySelector('[data-phq-bar]');
  var count  = document.querySelector('[data-phq-count]');
  var back   = document.querySelector('[data-phq-back]');
  var next   = document.querySelector('[data-phq-next]');
  var submit = document.querySelector('[data-phq-submit]');
  var hint   = document.querySelector('[data-phq-hint]');
  var result = document.querySelector('[data-phq-result]');
  var risk   = document.querySelector('[data-phq-risk]');

  var at = 0;

  function smooth() {
    return window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth';
  }

  function answers() {
    var out = [];
    for (var i = 0; i < ITEMS; i++) {
      var picked = form.querySelector('input[name="q' + i + '"]:checked');
      out.push(picked ? Number(picked.value) : null);
    }
    return out;
  }

  function answeredHere() {
    return !!steps[at].querySelector('input:checked');
  }

  function render() {
    steps.forEach(function (step, i) { step.hidden = i !== at; });

    var done = answers().filter(function (v) { return v !== null; }).length;
    if (bar) { bar.style.width = (Math.min(at, ITEMS) / ITEMS * 100) + '%'; }
    if (count) {
      count.textContent = at < ITEMS
        ? 'Question ' + (at + 1) + ' of ' + ITEMS
        : 'One last question';
    }

    if (back) { back.hidden = at === 0; }
    // The last step is item ten, which is optional — that is where the score
    // button lives, and it does not wait for an answer.
    if (next)   { next.hidden = at >= LAST; next.disabled = !answeredHere(); }
    if (submit) { submit.hidden = at < LAST; submit.disabled = done < ITEMS; }

    if (hint) {
      hint.textContent = at >= LAST
        ? (done < ITEMS ? 'Go back and finish the nine to see a score.' : 'This one is optional — skip it if you like.')
        : (answeredHere() ? '' : 'Choose the answer closest to how it has been.');
    }
  }

  function go(to, focus) {
    at = Math.max(0, Math.min(LAST, to));
    render();
    var heading = steps[at];
    heading.scrollIntoView({ behavior: smooth(), block: 'center' });
    if (focus) {
      // Move focus into the new question so a keyboard or screen reader user
      // lands on it rather than back at the top of the form.
      var first = heading.querySelector('input');
      if (first) { first.focus({ preventScroll: true }); }
    }
  }

  if (back) { back.addEventListener('click', function () { go(at - 1, true); }); }
  if (next) { next.addEventListener('click', function () { go(at + 1, true); }); }

  /* Choosing an answer moves on by itself. The pause is long enough to see
     the selection land, and Back is always there if it was a misclick. */
  form.addEventListener('change', function (event) {
    render();
    if (at >= LAST || !event.target.checked) { return; }
    var from = at;
    setTimeout(function () { if (at === from) { go(at + 1, false); } }, 280);
  });

  form.addEventListener('submit', function (event) {
    event.preventDefault();
    var values = answers();
    if (values.indexOf(null) !== -1) { return; }

    var total = values.reduce(function (a, b) { return a + b; }, 0);
    var band  = BANDS.filter(function (b) { return total >= b.min && total <= b.max; })[0];

    document.querySelector('[data-phq-score]').textContent = total;
    document.querySelector('[data-phq-band]').textContent  = band.name + ' \u2014 ' + band.min + ' to ' + band.max;
    document.querySelector('[data-phq-copy]').textContent  = band.copy;

    var effort = form.querySelector('input[name="difficulty"]:checked');
    document.querySelector('[data-phq-difficulty]').textContent =
      effort ? 'Day to day, you said this has been ' + EFFORT[Number(effort.value)].toLowerCase() + '.' : '';

    /* Item nine is not folded into the band. Any response above "not at all"
       shows the crisis panel, whatever the total came to. */
    if (risk) { risk.hidden = values[8] === 0; }

    result.hidden = false;
    result.scrollIntoView({ behavior: smooth(), block: 'start' });
  });

  var reset = document.querySelector('[data-phq-reset]');
  if (reset) {
    reset.addEventListener('click', function () {
      form.reset();
      result.hidden = true;
      if (risk) { risk.hidden = true; }
      at = 0;
      render();
      document.getElementById('start').scrollIntoView({ behavior: smooth(), block: 'start' });
    });
  }

  // A reload can leave radios checked in some browsers, so start from truth.
  render();
}());
</script>

<?php require __DIR__ . '/includes/footer.php'; ?>
