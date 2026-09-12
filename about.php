<?php
/** Anew Era Health — about the practice. */
$page_title = 'About us';
$page_description = 'Get to know Anew Era Health and our approach to connected, personal mental health care through psychiatry, therapy and TMS.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/includes/header.php';
?>
<div class="overflow-hidden bg-[#faf8f3] [&_h1]:m-0 [&_h2]:m-0 [&_h3]:m-0 [&_p]:m-0 [&_figure]:m-0 [&_h1]:font-normal [&_h2]:font-normal [&_h1]:tracking-[-0.045em] [&_h2]:tracking-[-0.045em] [&_h1]:leading-[1.06] [&_h2]:leading-[1.06] [&_h2]:text-[clamp(36px,4.1vw,58px)] [&_em]:font-normal [&_h2_em]:text-brand-blue [&_section[id]]:scroll-mt-[110px] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">
  <!-- Side gutters frame the compact hero. -->
  <div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top" class="relative isolate overflow-hidden rounded-[20px] bg-[#e7f1fa] px-5 pb-8 pt-[116px] text-ink sm:px-8 sm:pb-10 sm:pt-[126px] lg:px-12 lg:pt-[136px]">
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-[url('../img/about/newera_about_Hero.png')] bg-cover bg-[position:65%_calc(50%+50px)] bg-no-repeat md:bg-[position:center_calc(50%+50px)]"></div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-0 -z-10 bg-white/75 md:bg-[linear-gradient(90deg,rgba(247,250,252,0.92)_0%,rgba(247,250,252,0.7)_35%,rgba(247,250,252,0)_65%)] md:bg-transparent"></div>
    <div class="mx-auto flex min-h-[310px] max-w-[1160px] items-center lg:min-h-[370px]">
      <div class="max-w-[530px] py-2">
        <p class="!mb-6 text-[11px] font-medium uppercase tracking-[0.18em] text-[#3c5261]">About Anew Era Health</p>
        <h1 class="text-[46px] sm:text-[56px] lg:text-[68px]">Care begins<br>with <em class="text-brand-blue-dark">understanding.</em></h1>
        <p class="!mt-6 max-w-[375px] text-[15px] font-normal leading-[1.8] text-[#334b5a] sm:text-base">We bring psychiatry, therapy and TMS together around what matters most: you, and the life you want to live.</p>
        <a href="#approach" class="mt-7 inline-flex items-center gap-8 rounded-full bg-[#203e35] px-6 py-3.5 text-[13px] font-semibold text-white transition-colors hover:bg-[#315448] motion-reduce:transition-none">Our approach <?= arrow_icon(16) ?></a>
      </div>

    </div>
    <div class="mx-auto mt-8 flex max-w-[1160px] flex-wrap items-center justify-between gap-3 border-t border-[#203e35]/15 pt-4 text-[11px] text-[#3c5261]">
      <span>Personal care. A connected approach.</span>
      <span>Psychiatry <span aria-hidden="true" class="px-2">/</span> Therapy <span aria-hidden="true" class="px-2">/</span> TMS</span>
    </div>
  </section>
  </div>

  <div class="border-b border-ink/15 [&>div]:flex [&>div]:flex-col [&>div]:items-start [&>div]:justify-between [&>div]:gap-3 [&>div]:py-[23px] md:[&>div]:flex-row md:[&>div]:items-center md:[&>div]:gap-6 md:[&>div]:py-[27px] [&_p]:font-serif [&_p]:text-[22px] md:[&_p]:text-2xl [&_em]:text-[#527363] [&_a]:flex [&_a]:items-center [&_a]:gap-4 [&_a]:text-xs [&_a]:font-bold md:[&_a]:gap-8 [&_a_span]:text-2xl [&_a_span]:text-brand-blue"><div class="mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10"><p>Rooted in science. <em>Centered on you.</em></p><a href="#care">Explore our approach <span aria-hidden="true">↘</span></a></div></div>

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
      <a class="mt-8 inline-flex items-center gap-4 border-b border-brand-blue/30 py-2 text-[14px] font-bold text-brand-blue transition-colors hover:border-brand-blue" href="index.php#treatments">
        Discover the ways we can help <?= arrow_icon(16) ?>
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

  <section class="bg-[#efeee8]" id="care">
    <div class="mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10 py-[60px] md:py-[76px] lg:py-[104px]">
      <div class="mb-[30px] md:mb-12 md:flex md:items-end md:justify-between md:gap-10 [&>p]:mt-[22px] [&>p]:max-w-[360px] [&>p]:text-base [&>p]:leading-[1.75] [&>p]:text-[#58616a] md:[&>p]:mt-0 md:[&>p]:max-w-[280px]"><div><p class="!mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] md:!mb-[26px] [&>span]:h-[7px] [&>span]:w-[7px] [&>span]:rounded-full [&>span]:bg-[#b0ce87]">02 / What matters here</p><h2>Thoughtful care.<br><em>At every step.</em></h2></div><p>How we approach care matters as much as the care itself.</p></div>
      <div class="grid gap-4 md:grid-cols-3 md:gap-3.5 lg:gap-[22px]">
        <?php foreach ([
          ['01', 'Room for your story.', 'Understanding starts with listening. Your experience, concerns and goals help shape the conversation about what comes next.', 'Listen'],
          ['02', 'Clarity, not complexity.', 'Treatment can bring new questions. We believe in explaining your options in plain language, so you can take an active part in your care.', 'Understand'],
          ['03', 'Care that connects.', 'Therapy, psychiatry and interventional treatments each have a role. Bringing them together creates space for a plan that fits you.', 'Connect'],
        ] as [$number, $heading, $copy, $word]): ?>
        <article class="flex flex-col rounded-[20px] bg-[#faf8f3] p-7 md:p-[25px] lg:p-[30px] [&_h3]:mb-[18px] [&_h3]:text-[30px] [&_h3]:tracking-[-0.03em] [&_h3]:leading-[1.15] md:[&_h3]:text-[25px] lg:[&_h3]:text-[29px] [&_p]:text-sm [&_p]:leading-[1.85] [&_p]:text-[#58616a]"><div class="mb-[25px] flex items-center justify-between text-[11px] text-[#6c756f] md:mb-[42px]"><span><?= e($number) ?></span><span class="text-[34px] font-normal leading-none text-brand-blue" aria-hidden="true"><?= $number === '01' ? '◎' : ($number === '02' ? '↗' : '⊕') ?></span></div><h3><?= e($heading) ?></h3><p><?= e($copy) ?></p><span class="mt-[25px] border-t border-ink/15 pt-5 text-[10px] font-bold uppercase tracking-[0.15em] md:mt-8"><?= e($word) ?></span></article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10 py-[60px] md:py-[76px] lg:py-[104px] grid gap-4 !pb-0 md:grid-cols-2 md:gap-[22px]">
    <div class="relative overflow-hidden rounded-3xl bg-[#0e537c] px-7 py-[38px] text-white lg:px-[45px] lg:py-14 [&>p]:relative [&>p]:z-10 [&>h2]:relative [&>h2]:z-10 [&_h2_em]:!text-[#cde3de] [&>p:not(:first-child)]:mt-7 [&>p:not(:first-child)]:max-w-[365px] [&>p:not(:first-child)]:text-base [&>p:not(:first-child)]:leading-[1.8] [&>p:not(:first-child)]:text-[#e1e9ee] [&>a]:relative [&>a]:z-10 [&>a]:mt-8"><p class="!mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] md:!mb-[26px] [&>span]:h-[7px] [&>span]:w-[7px] [&>span]:rounded-full [&>span]:bg-[#b0ce87]">Our mission</p><h2>Make room for<br><em>what’s possible.</em></h2><p>Our mission is to put TMS within reach of more people living with depression, as part of a wider commitment to personal, connected mental health care.</p><a class="inline-flex items-center justify-center gap-[22px] rounded-full px-[25px] py-[17px] text-sm font-bold transition-colors motion-reduce:transition-none bg-white text-[#154c69] hover:bg-[#e6eddc]" href="index.php#tms">Explore TMS therapy <?= arrow_icon(17) ?></a><div class="absolute -bottom-[100px] -right-[220px] h-[370px] w-[370px] rounded-full border border-white/10 shadow-[0_0_0_40px_#ffffff06,0_0_0_80px_#ffffff04]" aria-hidden="true"></div></div>
    <figure class="relative min-h-[380px] overflow-hidden rounded-3xl md:min-h-[460px] lg:min-h-[490px] after:absolute after:inset-x-0 after:bottom-0 after:top-1/2 after:bg-[linear-gradient(transparent,#122a35b3)] after:content-[''] [&_figcaption]:absolute [&_figcaption]:bottom-7 [&_figcaption]:left-[30px] [&_figcaption]:right-[30px] [&_figcaption]:z-10 [&_figcaption]:font-serif [&_figcaption]:text-[26px] [&_figcaption]:italic [&_figcaption]:text-white"><?= image_slot('homepage/results-joy.jpg', '', 'A father and daughter sharing a laugh outdoors') ?><figcaption>For the moments that make life yours.</figcaption></figure>
  </section>

  <section class="mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10 py-[60px] md:py-[76px] lg:py-[104px]" id="team">
    <div class="grid gap-[34px] md:grid-cols-2 md:gap-[45px] lg:gap-[80px] items-start">
      <div>
        <p class="!mb-5 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] md:!mb-[26px] [&>span]:h-[7px] [&>span]:w-[7px] [&>span]:rounded-full [&>span]:bg-[#b0ce87]">
          03 / A connected team
        </p>
        <h2 class="text-[36px] md:text-[44px] lg:text-[52px] leading-[1.08] text-ink font-normal mb-6 md:mb-8">
          Different expertise.<br><em class="font-serif italic text-brand-blue">A shared purpose.</em>
        </h2>

        <!-- Interactive Service List -->
        <div class="space-y-3" data-team-services-list>
          <?php foreach ([
            ['1', 'Psychiatric care', 'Evaluation and medication management, with attention to your symptoms, history and treatment goals.', 'brand-blue'],
            ['2', 'Therapy', 'A space to work through challenges and develop skills that carry into everyday life.', 'brand-orange'],
            ['3', 'TMS care', 'Support through the treatment process, from understanding the next step to attending your sessions.', 'brand-green'],
          ] as [$idx, $heading, $copy, $dotClass]): ?>
          <div data-team-service="<?= $idx ?>"
               class="team-service-item group relative cursor-pointer rounded-2xl border p-5 transition-all duration-300 hover:border-[#d2e2d8] hover:bg-[#f4f8f6] <?= $idx === '1' ? 'is-active border-[#d2e2d8] bg-[#f4f8f6]' : 'border-transparent' ?>">
            <div class="flex items-start gap-4">
              <span class="mt-2 h-2.5 w-2.5 shrink-0 rounded-full bg-<?= $dotClass ?> transition-transform group-hover:scale-125"></span>
              <div>
                <h3 class="text-[22px] font-normal leading-snug text-ink group-hover:text-brand-blue transition-colors">
                  <?= e($heading) ?>
                </h3>
                <p class="mt-1.5 text-sm leading-[1.7] text-[#58616a]">
                  <?= e($copy) ?>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Right Column: Paragraph + Dynamic Hover Image Showcase -->
      <div>
        <p class="mb-6 max-w-[480px] text-base leading-[1.85] text-[#58616a]">
          Mental health care brings together different perspectives. Our approach connects the people supporting your treatment around one person: you.
        </p>

        <div class="relative">
          <figure class="relative isolate overflow-hidden rounded-[28px] bg-white p-2.5 shadow-[0_20px_60px_rgba(20,32,43,0.08)] border border-[#e2e7e9]">
            <div class="relative h-[340px] sm:h-[400px] md:h-[440px] lg:h-[480px] overflow-hidden rounded-[20px]">
              <!-- Image 1: Psychiatry -->
              <div data-team-img="1" class="team-img-pane absolute inset-0 transition-all duration-500 ease-out opacity-100 scale-100 z-10">
                <?= image_slot('treat-3', '', 'Psychiatrist and patient in consultation', true) ?>
                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white">
                  <span class="inline-block rounded-full border border-white/40 bg-white/20 px-3.5 py-1 text-[11px] font-bold uppercase tracking-[0.14em] backdrop-blur-md">Psychiatric Care</span>
                  <p class="mt-2 font-serif text-[22px] leading-snug text-white">Thoughtful evaluation & medication support.</p>
                </div>
              </div>

              <!-- Image 2: Therapy -->
              <div data-team-img="2" class="team-img-pane absolute inset-0 transition-all duration-500 ease-out opacity-0 scale-105 z-0">
                <?= image_slot('treat-6', '', 'Therapy session in progress', true) ?>
                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white">
                  <span class="inline-block rounded-full border border-white/40 bg-white/20 px-3.5 py-1 text-[11px] font-bold uppercase tracking-[0.14em] backdrop-blur-md">Therapy</span>
                  <p class="mt-2 font-serif text-[22px] leading-snug text-white">A safe space to build long-term resilience.</p>
                </div>
              </div>

              <!-- Image 3: TMS Care -->
              <div data-team-img="3" class="team-img-pane absolute inset-0 transition-all duration-500 ease-out opacity-0 scale-105 z-0">
                <?= image_slot('tms.jpg', '', 'Patient in comfortable TMS treatment room', true) ?>
                <div aria-hidden="true" class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent"></div>
                <div class="absolute bottom-6 left-6 right-6 text-white">
                  <span class="inline-block rounded-full border border-white/40 bg-white/20 px-3.5 py-1 text-[11px] font-bold uppercase tracking-[0.14em] backdrop-blur-md">TMS Care</span>
                  <p class="mt-2 font-serif text-[22px] leading-snug text-white">Non-invasive, evidence-based depression treatment.</p>
                </div>
              </div>
            </div>
          </figure>
        </div>
      </div>
    </div>
  </section>

  <script>
  (function() {
    var items = document.querySelectorAll('[data-team-service]');
    var images = document.querySelectorAll('[data-team-img]');
    if (!items.length || !images.length) return;

    items.forEach(function(item) {
      var activate = function() {
        var id = item.dataset.teamService;
        items.forEach(function(el) {
          el.classList.remove('is-active', 'border-[#d2e2d8]', 'bg-[#f4f8f6]');
          el.classList.add('border-transparent');
        });
        item.classList.add('is-active', 'border-[#d2e2d8]', 'bg-[#f4f8f6]');
        item.classList.remove('border-transparent');

        images.forEach(function(img) {
          if (img.dataset.teamImg === id) {
            img.classList.remove('opacity-0', 'scale-105', 'z-0');
            img.classList.add('opacity-100', 'scale-100', 'z-10');
          } else {
            img.classList.remove('opacity-100', 'scale-100', 'z-10');
            img.classList.add('opacity-0', 'scale-105', 'z-0');
          }
        });
      };

      item.addEventListener('mouseenter', activate);
      item.addEventListener('click', activate);
    });
  })();
  </script>

  <!-- ─── Booking CTA ──────────────────────────────────────────────────── -->
  <section id="book" class="mx-auto max-w-[1280px] px-5 py-8 sm:px-10 sm:py-12">
    <div data-reveal class="relative flex flex-col items-center justify-center text-center rounded-[28px] bg-cream bg-cta-glow px-6 py-10 sm:px-12 sm:py-14 gap-5 sm:gap-6">
      <h2 class="!m-0 text-[30px] leading-[1.1] tracking-[-0.03em] text-ink sm:text-[40px] font-normal">
        Ready when you are.
      </h2>
      <p class="!m-0 max-w-[50ch] text-base font-medium leading-relaxed text-ink/75 sm:text-[17px]">
        Explore your care options and take a first step that feels right for you.
      </p>
      <a href="index.php#book" class="inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-8 py-4 text-[15px] font-extrabold text-white shadow-md shadow-brand-blue/20 transition-all hover:bg-brand-blue-dark hover:shadow-lg hover:-translate-y-0.5">
        Book a consultation <?= arrow_icon(16) ?>
      </a>
    </div>
  </section>
</div>
<?php require __DIR__ . '/includes/footer.php'; ?>
