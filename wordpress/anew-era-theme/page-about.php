<?php
/** Anew Era Health — about the practice. */
$page_title = 'About Anew Era: Psychiatry, Therapy & TMS';
$page_description = 'Get to know Anew Era Health and our approach to connected, personal mental health care through psychiatry, therapy and TMS.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/inc/header.php';

// The roster lives on team.php. Read it here only for a few of its faces.
$team        = require __DIR__ . '/inc/data-team.php';
$team_faces  = array_slice(array_values(array_filter(
    $team['people'],
    static fn (array $p): bool => $p['photo'] !== ''
)), 0, 7);
?>
<div class="overflow-hidden bg-[#faf8f3] [&_h1]:m-0 [&_h2]:m-0 [&_h3]:m-0 [&_p]:m-0 [&_figure]:m-0 [&_h1]:font-normal [&_h2]:font-normal [&_h1]:tracking-[-0.045em] [&_h2]:tracking-[-0.045em] [&_h1]:leading-[1.06] [&_h2]:leading-[1.06] [&_h2]:text-[clamp(36px,4.1vw,58px)] [&_em]:font-normal [&_h2_em]:text-brand-blue [&_section[id]]:scroll-mt-[110px] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">
  <!-- Side gutters frame the compact hero. -->
  <div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top" class="relative isolate overflow-hidden rounded-[20px] bg-[#e7f1fa] px-5 pb-8 pt-[116px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-[url('../img/about/newera_about_Hero.png')] bg-cover bg-[position:65%_top] bg-no-repeat md:bg-[position:center_top]"></div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-white/75 md:bg-[linear-gradient(90deg,rgba(247,250,252,0.92)_0%,rgba(247,250,252,0.7)_35%,rgba(247,250,252,0)_65%)] md:bg-transparent"></div>
    <div class="mx-auto flex min-h-[310px] max-w-[1160px] items-center lg:min-h-[370px]">
      <div class="max-w-[530px] py-2">
        <p class="!mb-6 text-[11px] font-medium uppercase tracking-[0.18em] text-[#3c5261]">About Anew Era</p>
        <h1 class="text-[46px] sm:text-[56px] lg:text-[68px]">Care begins<br>with <em class="text-brand-blue">understanding.</em></h1>
        <p class="!mt-6 max-w-[375px] text-[15px] font-normal leading-[1.8] text-[#334b5a] sm:text-base">We bring psychiatry, therapy and TMS together around what matters most: you, and the life you want to live.</p>
        <a href="#approach" class="mt-7 inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark motion-reduce:transition-none">Our Approach <?= arrow_icon(16) ?></a>
      </div>

    </div>
    <?php // On its own at the right, where the photo sits behind it, so it is
          // set on a white pill to keep its contrast. ?>
    <div class="mx-auto mt-8 flex max-w-[1160px] flex-wrap items-center justify-end gap-3 border-t border-[#203e35]/15 pt-4 text-[13px] font-semibold text-ink">
      <span class="rounded-full bg-white/90 px-4 py-1.5 shadow-sm [&_a]:transition-colors [&_a:hover]:text-brand-blue"><a href="psychiatry.php">Psychiatry</a> <span aria-hidden="true" class="px-2">/</span> <a href="therapy.php">Therapy</a> <span aria-hidden="true" class="px-2">/</span> <a href="tms.php">TMS</a></span>
    </div>
  </section>
  </div>

  <div class="border-b border-ink/15 [&>div]:flex [&>div]:flex-col [&>div]:items-start [&>div]:justify-between [&>div]:gap-3 [&>div]:py-[23px] md:[&>div]:flex-row md:[&>div]:items-center md:[&>div]:gap-6 md:[&>div]:py-[27px] [&_p]:font-serif [&_p]:text-[22px] md:[&_p]:text-2xl [&_em]:text-[#527363] [&_a]:flex [&_a]:items-center [&_a]:gap-4 [&_a]:text-xs [&_a]:font-bold md:[&_a]:gap-8 [&_a_span]:text-2xl [&_a_span]:text-brand-blue"><div class="mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10"><p>Rooted in science. <em>Centered on you.</em></p><a href="#care">Explore Our Approach <span aria-hidden="true">↘</span></a></div></div>

  <section class="py-[60px] md:py-[76px] lg:py-[104px] mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10 grid gap-[34px] md:grid-cols-2 md:gap-[45px] lg:gap-[80px] items-center" id="approach">
    <div>
      <p class="!mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] md:!mb-[26px] [&>span]:h-[7px] [&>span]:w-[7px] [&>span]:rounded-full [&>span]:bg-[#b0ce87]">
        01 / Our perspective
      </p>
      <h2 class="text-[36px] md:text-[44px] lg:text-[52px] leading-[1.08] text-ink font-normal">
        You are more<br>than a <em class="font-serif italic text-brand-blue font-normal">diagnosis.</em>
      </h2>
      <div class="mt-6 space-y-4 text-base leading-[1.85] text-[#58616a]">
        <p class="!text-[20px] !leading-[1.5] !text-[#24333c] md:!text-[22px] font-serif">
          Your history, your relationships, your everyday routines. They all belong in the conversation.
        </p>
        <p>
          At Anew Era Health, we bring psychiatry, therapy and TMS into a shared approach to mental health. That means looking at the whole picture and helping you understand the options available to you.
        </p>
        <p>
          We believe care should feel personal, understandable and connected. A place to ask questions, talk honestly, and take the next step with support.
        </p>
      </div>
      <a class="mt-8 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-[14px] font-bold text-brand-blue transition-colors hover:border-brand-blue" href="treatments.php">
        Discover the Ways We Can Help <?= arrow_icon(16) ?>
      </a>
    </div>

    <!-- Perspective Section Photography Showcase -->
    <div class="relative">
      <figure class="relative isolate overflow-hidden rounded-[28px] bg-white p-2.5 shadow-[0_20px_50px_rgba(20,32,43,0.07)] border border-[#e5e9ec]">
        <div class="relative h-[320px] sm:h-[380px] md:h-[420px] lg:h-[460px] overflow-hidden rounded-[20px]">
          <?= image_slot('hero.jpg', '', 'Sunlit consultation room with clinicians and patients engaging in warm conversation', true) ?>
          <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/45 via-transparent to-transparent"></div>
        </div>
        
        <div aria-hidden="true" class="absolute left-6 top-6 flex items-center gap-2 rounded-full border border-white/80 bg-white/90 px-3.5 py-1.5 text-[10px] font-bold uppercase tracking-[0.14em] text-ink shadow-sm backdrop-blur-md">
          <span class="h-2 w-2 rounded-full bg-brand-green"></span> Person-Centered Approach
        </div>

        <figcaption class="absolute inset-x-6 bottom-6 rounded-xl border border-white/80 bg-white/90 p-4 shadow-lg backdrop-blur-md sm:p-5">
          <span class="block font-serif text-[22px] leading-[1.2] text-ink sm:text-[25px]">
            Looking at the <em class="text-brand-blue font-normal italic">whole picture.</em>
          </span>
          <span class="mt-1 block text-xs text-[#58616a]">Every care plan is built around your story.</span>
        </figcaption>
      </figure>
    </div>
  </section>

  <!-- ─── Our mission ──────────────────────────────────────────────────── -->
  <?php // The about page's own mission statement. The homepage panel still reads
        // $data['focus_paragraphs']; this one was rewritten after review. ?>
  <?php $about_mission = [
      'Our mission is to put TMS within reach of more people living with depression. Effective treatment shouldn’t be hard to find.',
      'TMS is FDA-cleared and non-medication-based, offering eligible patients another treatment option for depression.',
      'Our doctors, technicians, and office staff are here to make the treatment experience feel supportive and straightforward, from the first phone call through the final session.',
  ]; ?>
  <section id="mission" class="px-3 pb-[60px] sm:px-5 md:pb-[76px] lg:px-8 lg:pb-[104px]">
    <div class="mx-auto max-w-[1280px] rounded-[28px] bg-brand-blue px-6 py-12 sm:px-10 lg:px-14 lg:py-16">
      <div data-reveal class="mx-auto max-w-[1140px]">
        <p class="!mb-11 text-[15px] font-semibold text-white/70">Our mission</p>
        <div class="flex flex-col gap-10 border-l border-white/35 pl-6 sm:pl-14">
          <?php foreach ($about_mission as $paragraph): ?>
            <p class="cursor-default text-pretty font-serif text-[22px] font-medium leading-[1.38] tracking-[-0.015em] text-white/80 transition-colors duration-300 hover:text-[#fbd9b0] sm:text-[26px] lg:text-[32px]"><?= e($paragraph) ?></p>
          <?php endforeach; ?>
          <div class="mt-2 flex flex-wrap gap-3">
            <a href="tms.php" class="inline-flex items-center gap-2.5 rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
              Explore TMS Therapy <?= arrow_icon(15) ?>
            </a>
            <a href="team.php" class="inline-flex items-center gap-2.5 rounded-full border-2 border-white/55 px-7 py-[14px] text-[15px] font-extrabold text-white transition-colors hover:bg-white/15">
              Meet Our Team <?= arrow_icon(15) ?>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-[#efeee8]" id="care">
    <div class="mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10 py-[60px] md:py-[76px] lg:py-[104px]">
      <div class="mb-[30px] md:mb-12 md:flex md:items-end md:justify-between md:gap-10 [&>p]:mt-[22px] [&>p]:max-w-[360px] [&>p]:text-base [&>p]:leading-[1.75] [&>p]:text-[#58616a] md:[&>p]:mt-0 md:[&>p]:max-w-[280px]"><div><p class="!mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] md:!mb-[26px] [&>span]:h-[7px] [&>span]:w-[7px] [&>span]:rounded-full [&>span]:bg-[#b0ce87]">02 / What matters here</p><h2>Thoughtful care.<br><em>At every step.</em></h2></div><p>How we approach care matters as much as the care itself.</p></div>
      <div class="grid gap-4 md:grid-cols-3 md:gap-3.5 lg:gap-[22px]">
        <?php foreach ([
          ['01', 'Getting to know you.', 'Understanding starts with listening. Your experience, concerns and goals help shape the conversation about what comes next.', 'Listen'],
          ['02', 'Clarity, not complexity.', 'Treatment can bring new questions. We believe in explaining your options in plain language, so you can take an active part in your care.', 'Understand'],
          ['03', 'Care that connects.', 'Therapy, psychiatry and interventional treatments each have a role. Bringing them together creates space for a plan that fits you.', 'Connect'],
        ] as [$number, $heading, $copy, $word]): ?>
        <article class="flex flex-col rounded-[20px] bg-[#faf8f3] p-7 md:p-[25px] lg:p-[30px] [&_h3]:mb-[18px] [&_h3]:text-[30px] [&_h3]:tracking-[-0.03em] [&_h3]:leading-[1.15] md:[&_h3]:text-[25px] lg:[&_h3]:text-[29px] [&_p]:text-sm [&_p]:leading-[1.85] [&_p]:text-[#58616a]"><div class="mb-[25px] text-[11px] text-[#6c756f] md:mb-[42px]"><span><?= e($number) ?></span></div><h3><?= e($heading) ?></h3><p><?= e($copy) ?></p></article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10 py-[60px] md:py-[76px] lg:py-[104px]" id="team">
    <div class="grid gap-[34px] md:grid-cols-2 md:gap-[45px] lg:gap-[80px] items-start">
      <div>
        <p class="!mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] md:!mb-[26px] [&>span]:h-[7px] [&>span]:w-[7px] [&>span]:rounded-full [&>span]:bg-[#b0ce87]">
          03 / A connected team
        </p>
        <h2 class="text-[36px] md:text-[44px] lg:text-[52px] leading-[1.08] text-ink font-normal mb-6 md:mb-8">
          Various treatments.<br><em class="font-serif italic text-brand-blue">A shared purpose.</em>
        </h2>

        <!-- Interactive Service List -->
        <div class="space-y-3" data-team-services-list>
          <?php foreach ([
            ['1', 'Psychiatric care', 'Evaluation and medication management, with attention to your symptoms, history and treatment goals.', 'brand-blue', 'psychiatry.php'],
            ['2', 'Therapy', 'A space to work through challenges and develop skills that carry into everyday life.', 'brand-orange', 'therapy.php'],
            ['3', 'TMS care', 'TMS uses magnetic pulses to stimulate the areas of the brain that regulate mood. Sessions are outpatient, and you stay awake throughout.', 'brand-green', 'tms.php'],
          ] as [$idx, $heading, $copy, $dotClass, $page]): ?>
          <div class="group relative rounded-2xl border border-transparent p-5">
            <div class="flex items-start gap-4">
              <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-<?= $dotClass ?> transition-transform group-hover:scale-125"></span>
              <div>
                <h3 class="text-[22px] font-normal leading-snug text-ink group-hover:text-brand-blue transition-colors">
                  <?= e($heading) ?>
                </h3>
                <p class="mt-1.5 text-sm leading-[1.7] text-[#58616a]">
                  <?= e($copy) ?>
                </p>
                <a href="<?= e($page) ?>" class="mt-3 inline-flex items-center gap-2 text-[13px] font-bold text-brand-blue underline-offset-4 hover:underline">
                  Learn more<span class="sr-only"> about <?= e($heading) ?></span> <?= arrow_icon(14) ?>
                </a>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>

        <!-- The roster itself lives on team.php; this is the door to it. -->
        <div class="mt-8 flex flex-wrap items-center gap-x-5 gap-y-4 border-t border-ink/12 pt-7">
          <div aria-hidden="true" class="flex items-center">
            <?php foreach ($team_faces as $face): ?>
              <span class="-ml-3 h-11 w-11 shrink-0 overflow-hidden rounded-full border-2 border-white bg-[#e7f1fa] shadow-[0_3px_10px_rgba(20,32,43,0.12)] first:ml-0">
                <img src="<?= e(asset('assets/img/' . $face['photo'])) ?>" alt="" width="44" height="44" loading="lazy" decoding="async" class="h-full w-full object-cover object-[center_12%]">
              </span>
            <?php endforeach; ?>
          </div>
          <a class="inline-flex items-center gap-3 border-b border-brand-blue/30 py-2 text-[14px] font-bold text-brand-blue transition-colors hover:border-brand-blue" href="team.php">
            Meet our team of 40+ experts <?= arrow_icon(16) ?>
          </a>
        </div>
      </div>

      <!-- Right Column: Paragraph + Dynamic Hover Image Showcase -->
      <div>
        <p class="mb-6 max-w-[480px] text-base leading-[1.85] text-[#58616a]">
          Mental health care is done in different ways. Our approach connects the people supporting your treatment around one person: you.
        </p>

        <div class="relative">
          <figure class="relative isolate overflow-hidden rounded-[28px] bg-white p-2.5 shadow-[0_20px_60px_rgba(20,32,43,0.08)] border border-[#e2e7e9]">
            <?php // One photograph. It used to swap with the list on hover, which
                  // read as a slideshow and differed between phone and desktop. ?>
            <div class="relative h-[340px] sm:h-[400px] md:h-[440px] lg:h-[480px] overflow-hidden rounded-[20px]">
              <?= image_slot('about/team.jpg', '', 'Psychiatrists, therapists and nurse practitioners talking together in a bright clinic', true) ?>
              <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
              <div class="absolute inset-x-8 bottom-8 text-white">
                <span class="inline-block rounded-full border border-white/40 bg-white/20 px-4 py-1.5 text-[11px] font-bold uppercase tracking-[0.14em] backdrop-blur-md">One care team</span>
                <p class="mt-3 font-serif text-[22px] leading-snug text-white">Psychiatry, therapy and TMS, working from the same plan.</p>
              </div>
            </div>
          </figure>
        </div>
      </div>
    </div>
  </section>


  <!-- ─── Booking CTA ──────────────────────────────────────────────────── -->
  <section id="book" class="mx-auto max-w-[1280px] px-5 py-8 sm:px-10 sm:py-12">
    <div data-reveal class="relative flex flex-col items-center justify-center text-center rounded-[28px] bg-cream bg-aurora px-6 py-10 sm:px-12 sm:py-14 gap-5 sm:gap-6">
      <h2 class="!m-0 text-[30px] leading-[1.1] tracking-[-0.03em] text-ink sm:text-[40px] font-normal">
        Anew Era is ready when you are.
      </h2>
      <p class="!m-0 max-w-[50ch] text-base font-medium leading-relaxed text-ink/75 sm:text-[17px]">
        Explore your care options and get the right care for your mental health.
      </p>
      <a href="contact.php" class="inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-8 py-4 text-[15px] font-extrabold text-white shadow-md shadow-brand-blue/20 transition-all hover:bg-brand-blue-dark hover:shadow-lg hover:-translate-y-0.5">
        Book a Consultation <?= arrow_icon(16) ?>
      </a>
    </div>
  </section>
</div>
<?php require __DIR__ . '/inc/footer.php'; ?>
