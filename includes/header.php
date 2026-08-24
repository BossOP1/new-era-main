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
 */

require_once __DIR__ . '/init.php';

$page_title       = $page_title       ?? null;
$page_description = $page_description ?? 'Evidence-based psychiatry, therapy and TMS — delivered by clinicians who take the time to know you. In-person and telehealth, most insurance accepted.';
$header_solid     = $header_solid     ?? false;

$title = $page_title ? $page_title . ' · ' . $site['name'] : $site['name'] . ' — A new era of mental health care';

// Use the compiled stylesheet when it exists; fall back to the Play CDN otherwise.
$compiled_css = is_file(__DIR__ . '/../assets/css/tailwind.css');

$nav_link  = 'text-sm font-semibold text-ink transition-colors hover:text-brand-blue'
           . ' group-[.is-over-hero]:text-white/95 group-[.is-over-hero]:hover:text-white';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($title) ?></title>
<meta name="description" content="<?= e($page_description) ?>">

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

<header class="group <?= $header_solid ? 'relative bg-night is-over-hero' : 'fixed inset-x-0 top-0 is-over-hero' ?> z-50 p-3 transition-[padding] duration-300 group-[.is-over-hero]:p-3 sm:p-5" data-site-header>
  <div class="liquid-glass mx-auto flex min-h-[62px] items-center justify-between gap-6 border-white/70 bg-white/90 px-3 py-3 transition-colors duration-300 group-[.is-over-hero]:min-h-[74px] group-[.is-over-hero]:border-white/25 group-[.is-over-hero]:bg-night/35 sm:py-0 sm:pl-7 lg:gap-8">

    <a href="index.php#top" class="flex shrink-0 items-center no-underline">
      <?php // White over the hero, full colour once the bar is over content. ?>
      <span class="hidden group-[.is-over-hero]:block"><?= brand_logo($site['name'], 'h-8 w-auto sm:h-9', true) ?></span>
      <span class="block group-[.is-over-hero]:hidden"><?= brand_logo($site['name'], 'h-8 w-auto sm:h-9', false, true) ?></span>
    </a>

    <nav class="hidden items-center gap-7 lg:flex" aria-label="Primary">
      <?php foreach ($site['nav'] as $item): ?>
        <a href="<?= e($item['href']) ?>" class="<?= $nav_link ?>"><?= e($item['label']) ?></a>
      <?php endforeach; ?>
    </nav>

    <div class="hidden items-center gap-5 lg:flex">
      <a href="#book" class="<?= $nav_link ?>">Patient login</a>
      <a href="#book" class="inline-flex items-center gap-2 rounded-full bg-brand-orange px-6 py-[15px] text-sm font-extrabold text-white transition-colors hover:bg-brand-orange-dark">Get started</a>
    </div>

    <button type="button"
            class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-ink/15 bg-white/70 text-ink transition-colors group-[.is-over-hero]:border-white/40 group-[.is-over-hero]:bg-white/15 group-[.is-over-hero]:text-white lg:hidden"
            data-menu-toggle
            aria-expanded="false"
            aria-controls="mobile-menu">
      <span class="sr-only">Toggle menu</span>
      <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"></path></svg>
    </button>
  </div>

  <nav id="mobile-menu" class="mx-auto mt-2 hidden rounded-[20px] border border-white/60 bg-white/95 p-5 shadow-glass backdrop-blur-[20px] lg:hidden" aria-label="Mobile">
    <ul class="flex flex-col gap-1">
      <?php foreach ($site['nav'] as $item): ?>
        <li><a href="<?= e($item['href']) ?>" class="block rounded-xl px-3 py-3 text-base font-bold text-ink transition-colors hover:bg-surface"><?= e($item['label']) ?></a></li>
      <?php endforeach; ?>
      <li><a href="#book" class="block rounded-xl px-3 py-3 text-base font-bold text-ink transition-colors hover:bg-surface">Patient login</a></li>
    </ul>
    <a href="#book" class="mt-3 flex items-center justify-center gap-2 rounded-full bg-brand-orange px-6 py-4 text-sm font-extrabold text-white transition-colors hover:bg-brand-orange-dark">Get started</a>
  </nav>
</header>

<main id="main">
