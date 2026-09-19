<?php
/**
 * Site header component — document head, the glass navigation bar and the
 * mobile menu. Include it at the top of any page:
 *
 *   $page_title = 'Treatments';
 *   require __DIR__ . '/includes/header.php';
 *
 * Optional variables a page may set before including this file:
 *   $page_title       string  appended to the site name in <title>
 *   $page_description string  meta description
 *   $header_solid     bool    true on pages with no dark hero behind the bar
 *   $header_inset     bool    true where the hero is a rounded panel in side
 *                             gutters — the bar becomes a plain white pill
 *                             sitting inside that panel rather than a full
 *                             width slab of glass across the top of it
 */

require_once __DIR__ . '/init.php';

$page_title       = $page_title       ?? null;
$page_description = $page_description ?? 'Evidence-based psychiatry, therapy and TMS — delivered by clinicians who take the time to know you. In-person and telehealth, most insurance accepted.';
$header_solid     = $header_solid     ?? false;
$header_hero_light = $header_hero_light ?? false;
$header_inset      = $header_inset      ?? false;

// Inside a gutter-framed hero the bar is contained and solid: it lines up with
// the hero's own content column, and the glass treatment is dropped because
// there is no photography running underneath it to show through.
$inset_header = $header_inset ? '!px-6 !pt-6 sm:!px-10 sm:!pt-8 lg:!px-[52px]' : '';
$inset_bar    = $header_inset ? 'w-full max-w-[1200px] !gap-4 !shadow-none !backdrop-blur-none !bg-white/95 before:!hidden' : '';
// Seven top-level items do not fit beside the logo and button at lg, on either
// bar, so the nav folds into the menu below xl everywhere. Spelled out in full
// rather than built from a prefix: Tailwind scans these files as plain text,
// so a class it never sees written out is a class it never compiles.
$nav_show     = 'xl:flex';
$nav_hide     = 'xl:hidden';

$title = $page_title ? $page_title . ' · ' . $site['name'] : $site['name'] . ' — A new era of mental health care';

// Use the compiled stylesheet when it exists; fall back to the Play CDN otherwise.
$compiled_css = is_file(__DIR__ . '/../assets/css/tailwind.css');

$nav_show_block = 'xl:block';

// The page being viewed, for marking the current nav item. See current_page().
$current_page = current_page();
$menus        = $site['menus'] ?? [];

// Top-level items are pills: a soft fill on hover and while their dropdown is
// open, and a small orange dot under whichever item covers the current page.
$nav_link  = 'relative inline-flex items-center gap-1.5 whitespace-nowrap rounded-full px-3.5 py-2.5 text-sm font-semibold text-ink transition-colors hover:bg-ink/[0.05] hover:text-brand-blue'
           . ' aria-expanded:bg-ink/[0.05] aria-expanded:text-brand-blue'
           . ' group-[.is-over-hero]:text-white/95 group-[.is-over-hero]:hover:bg-white/10 group-[.is-over-hero]:hover:text-white group-[.is-over-hero]:aria-expanded:bg-white/15 group-[.is-over-hero]:aria-expanded:text-white'
           . ' group-[.is-light-hero]:text-ink group-[.is-light-hero]:hover:bg-ink/[0.05] group-[.is-light-hero]:hover:text-brand-blue'
           . ' after:pointer-events-none after:absolute after:bottom-[3px] after:left-1/2 after:h-1 after:w-1 after:-translate-x-1/2 after:rounded-full after:bg-brand-orange after:opacity-0 after:transition-opacity data-[current=true]:after:opacity-100';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($page_description) ?>">
<?php if (!empty($page_stylesheet)): ?>
<link rel="stylesheet" href="<?= e(asset($page_stylesheet)) ?>">
<?php endif; ?>

<link rel="icon" href="favicon.ico" sizes="any">
<link rel="icon" href="<?= e(asset('favicon.png')) ?>" type="image/png" sizes="96x96">
<link rel="apple-touch-icon" href="<?= e(asset('apple-touch-icon.png')) ?>">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<!-- Fallbacks only. Tobias and Untitled Sans are self-hosted out of
     assets/fonts/ by font_faces() below; these two stand in until the
     licensed files are dropped in. -->
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700&family=Newsreader:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet">
<?= font_faces() ?>

<?php if ($compiled_css): ?>
<link rel="stylesheet" href="<?= e(asset('assets/css/tailwind.css')) ?>">
<?php else: ?>
<!-- No compiled stylesheet found — running Tailwind in the browser.
     Run `npm install && npm run build:css` to generate assets/css/tailwind.css,
     which this template then picks up automatically. -->
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
<script src="<?= e(asset('assets/js/tailwind.config.js')) ?>"></script>
<style type="text/tailwindcss">
  @layer base {
    h1, h2, h3 { @apply font-serif font-medium; }
  }
  @layer components {
    .display-mark { @apply font-serif; }
    .marquee-mask {
      -webkit-mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
      mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
    }
    .chip-glass {
      @apply rounded-full border border-white/30 bg-night/45 px-3 py-[7px] text-xs font-bold text-white backdrop-blur-md backdrop-saturate-150;
      box-shadow: 0 2px 10px rgba(9,20,28,0.28), inset 0 1px 0 rgba(255,255,255,0.28);
    }
    .liquid-glass {
      @apply relative isolate rounded-[20px] border border-white/45 bg-white/[0.22];
      -webkit-backdrop-filter: blur(30px) saturate(200%) brightness(1.08);
      backdrop-filter: blur(30px) saturate(200%) brightness(1.08);
      box-shadow: 0 16px 48px rgba(9,20,28,0.22), 0 2px 8px rgba(9,20,28,0.1), inset 0 1px 0 rgba(255,255,255,0.8), inset 0 -1px 0 rgba(255,255,255,0.25), inset 1px 0 0 rgba(255,255,255,0.32), inset -1px 0 0 rgba(255,255,255,0.32);
    }
    .liquid-glass::before {
      content: ''; position: absolute; inset: 0; z-index: -1; border-radius: inherit; pointer-events: none;
      background: linear-gradient(135deg, rgba(255,255,255,0.55) 0%, rgba(255,255,255,0.14) 26%, transparent 52%), radial-gradient(130% 190% at 6% -45%, rgba(255,255,255,0.42), transparent 62%);
    }
    .on-footage { text-shadow: 0 2px 28px rgba(9,20,28,0.55), 0 1px 5px rgba(9,20,28,0.35); }
    .reveal { opacity: 0; transform: translateY(16px); transition: opacity .7s cubic-bezier(.22,.61,.24,1), transform .7s cubic-bezier(.22,.61,.24,1); }
    .reveal.is-in { opacity: 1; transform: none; }
    .lift { transition: transform .35s cubic-bezier(.22,.61,.24,1), box-shadow .35s cubic-bezier(.22,.61,.24,1); }
    .lift:hover { transform: translateY(-4px); box-shadow: 0 18px 40px rgba(9,20,28,.12); }
    [data-review-page] { transition: opacity .3s ease, transform .34s cubic-bezier(.22,.61,.24,1); }
    [data-review-page].is-off-left { opacity: 0; transform: translateX(-30px); }
    [data-review-page].is-off-right { opacity: 0; transform: translateX(30px); }
    [data-review-page].is-entering figure { animation: review-card-in .5s cubic-bezier(.22,.61,.24,1) both; }
    @keyframes review-card-in { from { opacity: 0; transform: translateY(14px); } to { opacity: 1; transform: none; } }
    .action-bar { padding-bottom: calc(.75rem + env(safe-area-inset-bottom, 0px)); }
    .review-off { display: none !important; }
    @media (max-width: 1023px) { .cond-tab { order: var(--tab-order, 0); } .cond-panelbox { order: var(--cond-order, 1); margin-top: .25rem; margin-bottom: .75rem; } .cond-tail { order: 999; } }
    .img-slot { @apply flex h-full w-full items-center justify-center bg-white/[0.06] p-6 text-center; }
    .img-slot__hint { @apply max-w-[26ch] text-[13px] font-semibold leading-snug text-white/45; }
  }
</style>
<?php endif; ?>
</head>
<body class="bg-white font-sans text-ink antialiased">

<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[60] focus:rounded-full focus:bg-white focus:px-5 focus:py-3 focus:text-sm focus:font-extrabold focus:text-brand-blue">Skip to content</a>

<header class="<?= $inset_header ?> group <?= $header_solid ? 'relative bg-night is-over-hero' : ($header_hero_light ? 'fixed inset-x-0 top-0 is-light-hero' : 'fixed inset-x-0 top-0 is-over-hero') ?> z-50 p-3 transition-[padding] duration-300 group-[.is-over-hero]:p-3 group-[.is-light-hero]:p-3 sm:p-5" data-site-header data-menu-open="false">

  <?php // Dims the page while a dropdown is open. Sits behind the bar inside the
        // header's own stacking context, so it covers the page but not the menu. ?>
  <div aria-hidden="true" class="pointer-events-none fixed inset-0 -z-10 bg-night/25 opacity-0 transition-opacity duration-300 group-data-[menu-open=true]:opacity-100 motion-reduce:transition-none"></div>

  <div class="<?= $inset_bar ?> liquid-glass mx-auto flex min-h-[62px] items-center justify-between gap-6 border-white/70 bg-white/90 px-3 py-3 transition-colors duration-300 group-[.is-over-hero]:min-h-[74px] group-[.is-over-hero]:border-white/25 group-[.is-over-hero]:bg-night/35 group-[.is-light-hero]:min-h-[74px] group-[.is-light-hero]:border-black/10 group-[.is-light-hero]:bg-white/85 group-[.is-light-hero]:shadow-sm sm:py-0 sm:pl-7 lg:gap-6">

    <a href="index.php#top" class="flex shrink-0 items-center no-underline">
      <?php // White over dark hero, full colour over light hero / content. ?>
      <span class="hidden group-[.is-over-hero]:block group-[.is-light-hero]:hidden"><?= brand_logo($site['name'], 'h-8 w-auto sm:h-9', true) ?></span>
      <span class="block group-[.is-over-hero]:hidden group-[.is-light-hero]:block"><?= brand_logo($site['name'], 'h-8 w-auto sm:h-9', false, true) ?></span>
    </a>

    <nav class="hidden items-center gap-0.5 <?= $nav_show ?>" aria-label="Primary">
      <?php foreach ($site['nav'] as $item): ?>
        <?php $is_current = nav_is_current($item, $menus, $current_page); ?>
        <?php if (isset($item['menu'], $menus[$item['menu']])): ?>
          <button type="button"
                  class="group/dd <?= $nav_link ?>"
                  data-dropdown-trigger
                  data-current="<?= $is_current ? 'true' : 'false' ?>"
                  aria-expanded="false"
                  aria-haspopup="true"
                  aria-controls="nav-panel-<?= e($item['menu']) ?>">
            <?= e($item['label']) ?>
            <?= nav_icon('chevron', 'h-3.5 w-3.5 shrink-0 opacity-70 transition-transform duration-200 group-aria-expanded/dd:rotate-180 motion-reduce:transition-none') ?>
          </button>
        <?php else: ?>
          <a href="<?= e($item['href']) ?>"
             class="<?= $nav_link ?>"
             data-current="<?= $is_current ? 'true' : 'false' ?>"<?= $is_current ? ' aria-current="page"' : '' ?>><?= e($item['label']) ?></a>
        <?php endif; ?>
      <?php endforeach; ?>
    </nav>

    <div class="hidden items-center gap-2 <?= $nav_show ?>">
      <a href="contact.php" class="inline-flex items-center gap-2 whitespace-nowrap rounded-full bg-brand-orange px-6 py-[15px] text-sm font-extrabold text-white transition-colors hover:bg-brand-orange-dark">Get Started</a>
    </div>

    <button type="button"
            class="group/burger inline-flex h-11 w-11 items-center justify-center rounded-full border border-ink/15 bg-white/70 text-ink transition-colors group-[.is-over-hero]:border-white/40 group-[.is-over-hero]:bg-white/15 group-[.is-over-hero]:text-white <?= $nav_hide ?>"
            data-menu-toggle
            aria-expanded="false"
            aria-controls="mobile-menu">
      <span class="sr-only">Toggle menu</span>
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true" class="group-aria-expanded/burger:hidden"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" aria-hidden="true" class="hidden group-aria-expanded/burger:block"><path d="M6 6l12 12M18 6 6 18"></path></svg>
    </button>

    <?php
    /* Dropdown panels ------------------------------------------------------
       Centred under the bar rather than under their trigger, so a panel can
       never run off the side of the screen. The transparent top padding is a
       bridge: the pointer can cross from the bar into the panel without
       leaving it. Opened and closed by assets/js/main.js through data-state.
       Visibility is not animated on the way in: a visibility transition is
       still "hidden" at its first instant, which stops ArrowDown moving focus
       into the panel. It is delayed on the way out so the fade still plays. */
    foreach ($site['nav'] as $item):
        if (!isset($item['menu'], $menus[$item['menu']])) {
            continue;
        }
        $menu    = $menus[$item['menu']];
        $feature = $menu['feature'] ?? null;
        $all     = $menu['all'] ?? null;
        $columns = $menu['columns'] ?? 2;
        // Locations is built from regions with clinics under them rather than
        // a flat list of tiles; everything else still uses 'items'.
        $groups  = $menu['groups'] ?? null;
        // An odd number of items leaves a hole in the two-column grid, so the
        // "all" link fills it as a tile; otherwise it sits in the footer strip.
        // With no "all" link at all, the strip carries the phone number.
        $all_as_tile = $all && !$groups && $columns === 2 && count($menu['items']) % 2 === 1;
    ?>
    <div id="nav-panel-<?= e($item['menu']) ?>"
         data-dropdown-panel
         data-state="closed"
         class="invisible absolute left-1/2 top-full z-10 hidden w-[min(880px,calc(100vw-32px))] -translate-x-1/2 translate-y-2 pt-3 opacity-0 [transition:opacity_200ms_ease-out,transform_200ms_ease-out,visibility_0s_linear_200ms] data-[state=open]:visible data-[state=open]:translate-y-0 data-[state=open]:opacity-100 data-[state=open]:[transition:opacity_200ms_ease-out,transform_200ms_ease-out,visibility_0s_linear_0s] motion-reduce:transition-none motion-reduce:data-[state=open]:transition-none <?= $nav_show_block ?>">
      <div class="overflow-hidden rounded-[24px] border border-ink/[0.08] bg-white text-left text-ink shadow-[0_28px_80px_rgba(9,20,28,0.20),0_4px_16px_rgba(9,20,28,0.06)]">
        <?php // Groups fill the panel: four regions need the width more than a
              // feature tile does. A flat menu keeps its items-plus-feature split. ?>
        <div class="grid gap-2 p-3<?= $groups ? '' : ' grid-cols-[minmax(0,1.6fr)_minmax(0,1fr)]' ?>">

          <div class="p-2">
            <p class="m-0 mb-2.5 px-3 text-[10.5px] font-bold uppercase tracking-[0.18em] text-ink/40"><?= e($menu['eyebrow']) ?></p>

            <?php if ($groups): ?>
            <?php // One column per region, its clinics listed beneath it. ?>
            <ul class="m-0 grid list-none grid-cols-2 gap-x-2 gap-y-4 p-0 sm:grid-cols-4">
              <?php foreach ($groups as $group): ?>
                <li class="px-3">
                  <a href="<?= e($group['href']) ?>" class="group/reg inline-flex items-center gap-1.5 text-[14.5px] font-extrabold tracking-[-0.01em] text-ink transition-colors hover:text-brand-blue focus-visible:text-brand-blue focus-visible:outline-none">
                    <?= e($group['name']) ?>
                    <span class="-translate-x-1 text-brand-blue opacity-0 transition duration-200 group-hover/reg:translate-x-0 group-hover/reg:opacity-100 group-focus-visible/reg:translate-x-0 group-focus-visible/reg:opacity-100"><?= arrow_icon(12) ?></span>
                  </a>
                  <p class="m-0 mt-0.5 text-[11.5px] leading-snug text-ink/45"><?= e($group['desc']) ?></p>

                  <ul class="m-0 mt-2.5 list-none border-t border-ink/[0.07] p-0 pt-1.5">
                    <?php foreach ($group['items'] as $clinic): ?>
                      <li>
                        <a href="<?= e($clinic['href']) ?>" class="block rounded-lg px-2 py-[7px] -mx-2 text-[13px] leading-snug text-ink/65 transition-colors hover:bg-[#f2f6f9] hover:text-brand-blue focus-visible:bg-[#f2f6f9] focus-visible:text-brand-blue focus-visible:outline-none">
                          <?= e($clinic['label']) ?>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endforeach; ?>
            </ul>

            <?php else: ?>
            <ul class="m-0 grid list-none <?= $columns === 1 ? 'grid-cols-1' : 'grid-cols-2' ?> gap-1 p-0">
              <?php foreach ($menu['items'] as $child): ?>
                <?php $here = $child['href'] === $current_page; ?>
                <li>
                  <a href="<?= e($child['href']) ?>"
                     class="group/item flex h-full items-start gap-3.5 rounded-2xl p-3 transition-colors hover:bg-[#f2f6f9] focus-visible:bg-[#f2f6f9] focus-visible:outline-none aria-[current=page]:bg-[#f2f6f9]"<?= $here ? ' aria-current="page"' : '' ?>>
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#eaf2f8] text-brand-blue transition-colors duration-200 group-hover/item:bg-brand-blue group-hover/item:text-white group-focus-visible/item:bg-brand-blue group-focus-visible/item:text-white">
                      <?php if (!empty($child['icon'])): ?>
                        <?= nav_icon($child['icon']) ?>
                      <?php else: ?>
                        <?= condition_mark(['art' => $child['art'] ?? ''], 'h-6 w-6 [filter:brightness(0.62)_saturate(1.25)] transition-[filter] duration-200 group-hover/item:[filter:brightness(0)_invert(1)] group-focus-visible/item:[filter:brightness(0)_invert(1)]') ?>
                      <?php endif; ?>
                    </span>
                    <span class="min-w-0 flex-1 pt-0.5">
                      <span class="flex items-center gap-1.5 text-[14.5px] font-extrabold tracking-[-0.01em] text-ink">
                        <?= e($child['label']) ?>
                        <span class="-translate-x-1 text-brand-blue opacity-0 transition duration-200 group-hover/item:translate-x-0 group-hover/item:opacity-100 group-focus-visible/item:translate-x-0 group-focus-visible/item:opacity-100"><?= arrow_icon(13) ?></span>
                      </span>
                      <span class="mt-0.5 block text-[12.5px] leading-snug text-ink/55"><?= e($child['desc']) ?></span>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>

              <?php if ($all_as_tile): ?>
                <li>
                  <a href="<?= e($all['href']) ?>"
                     class="group/item flex h-full items-center gap-3.5 rounded-2xl border border-dashed border-ink/15 p-3 transition-colors hover:border-brand-blue/40 hover:bg-[#f2f6f9] focus-visible:bg-[#f2f6f9] focus-visible:outline-none">
                    <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-xl bg-[#faf8f3] text-ink/60 transition-colors duration-200 group-hover/item:bg-brand-blue group-hover/item:text-white"><?= nav_icon('grid') ?></span>
                    <span class="flex items-center gap-1.5 text-[14.5px] font-extrabold tracking-[-0.01em] text-brand-blue">
                      <?= e($all['label']) ?>
                      <span class="transition-transform duration-200 group-hover/item:translate-x-1"><?= arrow_icon(13) ?></span>
                    </span>
                  </a>
                </li>
              <?php endif; ?>
            </ul>
            <?php endif; ?>
          </div>

          <?php if ($groups): ?>
          <?php // No feature beside a groups menu — the regions have the width. ?>
          <?php elseif ($feature && $feature['kind'] === 'photo'): ?>
            <a href="<?= e($feature['href']) ?>" class="group/feat relative flex min-h-[220px] flex-col justify-end overflow-hidden rounded-[20px] bg-night p-5 text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-orange">
              <img src="<?= e(asset('assets/img/' . $feature['image'])) ?>" alt="" aria-hidden="true" loading="lazy" decoding="async" class="absolute inset-0 h-full w-full object-cover object-[42%_45%] transition-transform duration-700 ease-out group-hover/feat:scale-[1.04] motion-reduce:transition-none">
              <span aria-hidden="true" class="absolute inset-0 bg-[linear-gradient(180deg,rgba(9,20,28,0.08)_0%,rgba(9,20,28,0.38)_45%,rgba(9,20,28,0.9)_100%)]"></span>
              <span class="relative mb-auto inline-flex items-center gap-1.5 self-start rounded-full border border-white/40 bg-white/15 px-2.5 py-1 text-[10px] font-bold uppercase tracking-[0.14em] backdrop-blur-md">
                <span class="h-1.5 w-1.5 rounded-full bg-brand-green"></span><?= e($feature['eyebrow']) ?>
              </span>
              <span class="relative block font-serif text-[25px] leading-[1.1] tracking-[-0.02em]"><?= e($feature['title']) ?></span>
              <span class="relative mt-1.5 block text-[13px] leading-[1.5] text-white/80"><?= e($feature['copy']) ?></span>
              <span class="relative mt-4 inline-flex items-center gap-2 text-[13px] font-extrabold">
                <?= e($feature['cta']) ?>
                <span class="transition-transform duration-200 group-hover/feat:translate-x-1"><?= arrow_icon(14) ?></span>
              </span>
            </a>
          <?php elseif ($feature): ?>
            <a href="<?= e($feature['href']) ?>" class="group/feat relative flex min-h-[220px] flex-col overflow-hidden rounded-[20px] bg-[#0e537c] p-5 text-white focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-brand-orange">
              <span aria-hidden="true" class="pointer-events-none absolute -bottom-20 -right-20 h-56 w-56 rounded-full border border-white/10 shadow-[0_0_0_28px_#ffffff08,0_0_0_56px_#ffffff05]"></span>
              <span class="relative flex h-11 w-11 items-center justify-center rounded-xl bg-white/15 text-white"><?= nav_icon($feature['icon'] ?? 'clipboard') ?></span>
              <span class="relative mt-auto block text-[10px] font-bold uppercase tracking-[0.14em] text-[#8fc7e8]"><?= e($feature['eyebrow']) ?></span>
              <span class="relative mt-1.5 block font-serif text-[25px] leading-[1.1] tracking-[-0.02em]"><?= e($feature['title']) ?></span>
              <span class="relative mt-1.5 block text-[13px] leading-[1.5] text-white/75"><?= e($feature['copy']) ?></span>
              <span class="relative mt-4 inline-flex items-center gap-2 text-[13px] font-extrabold">
                <?= e($feature['cta']) ?>
                <span class="transition-transform duration-200 group-hover/feat:translate-x-1"><?= arrow_icon(14) ?></span>
              </span>
            </a>
          <?php endif; ?>
        </div>

        <div class="flex items-center justify-between gap-6 border-t border-ink/[0.07] bg-[#faf8f3] px-6 py-3.5">
          <?php if ($all_as_tile || !$all): ?>
            <p class="m-0 text-[12.5px] text-ink/55"><?= e($menu['note']) ?></p>
            <a href="<?= e($site['phone_href']) ?>" class="inline-flex items-center gap-2 text-[13px] font-extrabold text-ink transition-colors hover:text-brand-blue">
              <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
              <?= e($site['phone']) ?>
            </a>
          <?php else: ?>
            <a href="<?= e($all['href']) ?>" class="group/all inline-flex items-center gap-2 text-[13px] font-extrabold text-brand-blue">
              <?= e($all['label']) ?>
              <span class="transition-transform duration-200 group-hover/all:translate-x-1"><?= arrow_icon(13) ?></span>
            </a>
            <p class="m-0 text-[12.5px] text-ink/55"><?= e($menu['note']) ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>

  <?php /* Phone menu ----------------------------------------------------------
     The same menus as the desktop dropdowns, as accordions. They share a name,
     so opening one closes the other where the browser supports it, and the
     section covering the current page starts open. The menu scrolls on its own
     and main.js locks the page behind it. */ ?>
  <nav id="mobile-menu" class="nav-pop mx-auto mt-2 hidden max-h-[calc(100dvh-6.5rem)] overflow-y-auto overscroll-contain rounded-[24px] border border-ink/[0.08] bg-white p-2 text-ink shadow-[0_24px_70px_rgba(9,20,28,0.22)] <?= $nav_hide ?>" aria-label="Mobile">
    <div class="px-1">
      <?php foreach ($site['nav'] as $item): ?>
        <?php $is_current = nav_is_current($item, $menus, $current_page); ?>
        <?php if (isset($item['menu'], $menus[$item['menu']])): $menu = $menus[$item['menu']]; ?>
          <details name="mobile-nav" class="group/acc border-b border-ink/[0.07]"<?= $is_current ? ' open' : '' ?>>
            <summary class="flex cursor-pointer list-none items-center justify-between gap-3 rounded-2xl px-3 py-3.5 text-[17px] font-extrabold tracking-[-0.01em] [&::-webkit-details-marker]:hidden">
              <span class="flex items-center gap-2">
                <?= e($item['label']) ?>
                <?php if ($is_current): ?><span aria-hidden="true" class="h-1.5 w-1.5 rounded-full bg-brand-orange"></span><?php endif; ?>
              </span>
              <span aria-hidden="true" class="flex h-8 w-8 items-center justify-center rounded-full bg-[#f2f6f9] text-ink/60 transition-transform duration-200 group-open/acc:rotate-180 motion-reduce:transition-none"><?= nav_icon('chevron', 'h-4 w-4') ?></span>
            </summary>
            <?php if (!empty($menu['groups'])): ?>
            <?php // Regions as small headings with their clinics under them —
                  // a second level of accordion inside the first is a lot of
                  // tapping for fifteen short links. ?>
            <ul class="m-0 grid list-none gap-4 p-0 pb-3">
              <?php foreach ($menu['groups'] as $group): ?>
                <li>
                  <a href="<?= e($group['href']) ?>" class="flex items-baseline justify-between gap-3 px-3 py-1">
                    <span class="text-[13px] font-extrabold uppercase tracking-[0.1em] text-ink"><?= e($group['name']) ?></span>
                    <span class="text-[11.5px] text-ink/45"><?= e($group['desc']) ?></span>
                  </a>
                  <ul class="m-0 mt-1 grid list-none grid-cols-2 gap-0.5 p-0">
                    <?php foreach ($group['items'] as $clinic): ?>
                      <li>
                        <a href="<?= e($clinic['href']) ?>" class="block rounded-xl px-3 py-2.5 text-[14.5px] font-bold leading-tight text-ink/75 transition-colors hover:bg-[#f2f6f9] hover:text-brand-blue">
                          <?= e($clinic['label']) ?>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </li>
              <?php endforeach; ?>
            </ul>

            <?php else: ?>
            <ul class="m-0 grid list-none gap-0.5 p-0 pb-3">
              <?php foreach ($menu['items'] as $child): ?>
                <?php $here = $child['href'] === $current_page; ?>
                <li>
                  <a href="<?= e($child['href']) ?>" class="flex items-center gap-3 rounded-xl px-3 py-2.5 transition-colors hover:bg-[#f2f6f9] aria-[current=page]:bg-[#f2f6f9]"<?= $here ? ' aria-current="page"' : '' ?>>
                    <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-xl bg-[#eaf2f8] text-brand-blue">
                      <?php if (!empty($child['icon'])): ?>
                        <?= nav_icon($child['icon'], 'h-5 w-5') ?>
                      <?php else: ?>
                        <?= condition_mark(['art' => $child['art'] ?? ''], 'h-[22px] w-[22px] [filter:brightness(0.62)_saturate(1.25)]') ?>
                      <?php endif; ?>
                    </span>
                    <span class="min-w-0">
                      <span class="block text-[15px] font-bold leading-tight text-ink"><?= e($child['label']) ?></span>
                      <span class="mt-0.5 block text-[12.5px] leading-snug text-ink/50"><?= e($child['desc']) ?></span>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>
              <?php if (!empty($menu['all'])): ?>
                <li class="px-3 pt-2">
                  <a href="<?= e($menu['all']['href']) ?>" class="inline-flex items-center gap-2 text-sm font-extrabold text-brand-blue"><?= e($menu['all']['label']) ?> <?= arrow_icon(13) ?></a>
                </li>
              <?php endif; ?>
            </ul>
            <?php endif; ?>
          </details>
        <?php else: ?>
          <a href="<?= e($item['href']) ?>" class="flex items-center justify-between gap-3 rounded-2xl border-b border-ink/[0.07] px-3 py-3.5 text-[17px] font-extrabold tracking-[-0.01em] text-ink transition-colors hover:text-brand-blue aria-[current=page]:text-brand-blue"<?= $is_current ? ' aria-current="page"' : '' ?>>
            <?= e($item['label']) ?>
            <span aria-hidden="true" class="text-ink/30"><?= arrow_icon(14) ?></span>
          </a>
        <?php endif; ?>
      <?php endforeach; ?>
    </div>

    <div class="mt-1 grid grid-cols-2 gap-2 rounded-[18px] bg-[#faf8f3] p-3">
      <a href="<?= e($site['phone_href']) ?>" class="flex items-center justify-center gap-2 rounded-full border-2 border-brand-blue px-4 py-3.5 text-sm font-extrabold text-brand-blue">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true"><path d="M6.5 3.5h3l1.5 4-2 1.5a12 12 0 0 0 6 6l1.5-2 4 1.5v3a2 2 0 0 1-2.2 2A17 17 0 0 1 4.5 5.7 2 2 0 0 1 6.5 3.5Z"/></svg>
        Call Us
      </a>
      <a href="contact.php" class="flex items-center justify-center rounded-full bg-brand-orange px-4 py-3.5 text-sm font-extrabold text-white transition-colors hover:bg-brand-orange-dark">Get Started</a>
      <p class="col-span-2 m-0 pt-1 text-center text-[12px] text-ink/50">In crisis? Call or text 988 any time.</p>
    </div>
  </nav>
</header>

<main id="main">
