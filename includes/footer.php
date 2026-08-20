<?php
/**
 * Site footer component — closes <main>, renders the footer and the scripts.
 * Include it at the bottom of any page:
 *
 *   require __DIR__ . '/includes/footer.php';
 */

require_once __DIR__ . '/init.php';

$footer_link = 'text-sm text-white/75 transition-colors hover:text-white';
?>
</main>

<footer class="bg-night bg-footer-glow text-white">
  <div class="mx-auto max-w-[1280px] px-5 pb-12 pt-16 sm:px-10 lg:pt-20">

    <div class="mb-12 flex flex-wrap items-end justify-between gap-10 border-b border-white/15 pb-12">
      <div>
        <div class="mb-5 flex items-center">
          <?= brand_logo($site['name'], 'h-10 w-auto', true) ?>
        </div>
        <p class="m-0 max-w-[38ch] text-[15px] leading-[1.65] text-white/60"><?= e($site['tagline']) ?></p>
      </div>
      <a href="#book" class="inline-flex items-center gap-2.5 whitespace-nowrap rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white">
        Book a consultation <?= arrow_icon(16) ?>
      </a>
    </div>

    <div class="mb-14 grid grid-cols-1 gap-10 sm:grid-cols-2 lg:grid-cols-[minmax(0,1.4fr)_minmax(0,1fr)_minmax(0,1fr)_minmax(0,1fr)] lg:gap-12">
      <div class="flex gap-1.5">
        <span class="h-1 w-[30px] bg-brand-blue"></span>
        <span class="h-1 w-[30px] bg-brand-orange"></span>
        <span class="h-1 w-[30px] bg-brand-green"></span>
      </div>

      <?php foreach ($site['footer_nav'] as $heading => $links): ?>
        <div class="flex flex-col gap-3">
          <p class="m-0 mb-1 text-xs font-extrabold uppercase tracking-[0.14em] text-white/40"><?= e($heading) ?></p>
          <?php foreach ($links as $link): ?>
            <a href="<?= e($link['href']) ?>" class="<?= $footer_link ?>"><?= e($link['label']) ?></a>
          <?php endforeach; ?>
        </div>
      <?php endforeach; ?>

      <div class="flex flex-col gap-3">
        <p class="m-0 mb-1 text-xs font-extrabold uppercase tracking-[0.14em] text-white/40">Visit</p>
        <p class="m-0 text-sm leading-relaxed text-white/75">
          <?= implode('<br>', array_map('e', $site['address'])) ?>
        </p>
        <a href="<?= e($site['phone_href']) ?>" class="<?= $footer_link ?>"><?= e($site['phone']) ?></a>
        <a href="mailto:<?= e($site['email']) ?>" class="<?= $footer_link ?>"><?= e($site['email']) ?></a>
      </div>
    </div>

    <div class="flex flex-wrap justify-between gap-6 border-y border-white/15 pb-12 pt-6">
      <div class="flex flex-wrap gap-6">
        <?php foreach ($site['legal_nav'] as $link): ?>
          <a href="<?= e($link['href']) ?>" class="text-xs text-white/40 transition-colors hover:text-white"><?= e($link['label']) ?></a>
        <?php endforeach; ?>
      </div>
      <div class="flex flex-wrap gap-2.5">
        <?php foreach ($site['badges'] as $badge): ?>
          <span class="rounded-full border border-white/25 px-3.5 py-[7px] text-xs font-bold text-white/70"><?= e($badge) ?></span>
        <?php endforeach; ?>
        <span class="inline-flex items-center gap-1.5 rounded-full bg-brand-green px-3.5 py-[7px] text-xs font-bold text-ink"><?= e($site['rating']) ?></span>
      </div>
    </div>

    <p class="display-mark mb-6 mt-10 select-none whitespace-nowrap pb-3.5 text-center text-[min(18vw,220px)] font-extrabold leading-[0.85] tracking-[-0.04em]">
      <span class="text-brand-blue"><?= e($site['brand'][0]) ?></span><span class="text-brand-orange"><?= e($site['brand'][1]) ?></span>
    </p>

    <p class="m-0 mt-8 max-w-[900px] text-xs leading-[1.7] text-white/35"><?= e($site['legal']) ?></p>
  </div>
</footer>

<script src="<?= e(asset('assets/js/main.js')) ?>" defer></script>
</body>
</html>
