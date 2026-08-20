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

$nav_link  = 'text-sm font-semibold text-ink transition-colors hover:text-brand-blue';
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
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Newsreader:ital@1&display=swap" rel="stylesheet">

<?php if ($compiled_css): ?>
<link rel="stylesheet" href="<?= e(asset('assets/css/tailwind.css')) ?>">
<?php else: ?>
<!-- No compiled stylesheet found — running Tailwind in the browser.
     Run `npm install && npm run build:css` to generate assets/css/tailwind.css,
     which this template then picks up automatically. -->
<script src="https://cdn.tailwindcss.com/3.4.16"></script>
<script src="<?= e(asset('assets/js/tailwind.config.js')) ?>"></script>
<style type="text/tailwindcss">
  @layer components {
    .marquee-mask {
      -webkit-mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
      mask-image: linear-gradient(90deg, transparent, #000 6%, #000 94%, transparent);
    }
    .chip-glass {
      @apply rounded-full border border-white/30 bg-night/45 px-3 py-[7px] text-xs font-bold text-white backdrop-blur-md backdrop-saturate-150;
      box-shadow: 0 2px 10px rgba(9,20,28,0.28), inset 0 1px 0 rgba(255,255,255,0.28);
    }
    .img-slot { @apply flex h-full w-full items-center justify-center bg-white/[0.06] p-6 text-center; }
    .img-slot__hint { @apply max-w-[26ch] text-[13px] font-semibold leading-snug text-white/45; }
  }
</style>
<?php endif; ?>
</head>
<body class="bg-white font-sans text-ink antialiased">

<a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-[60] focus:rounded-full focus:bg-white focus:px-5 focus:py-3 focus:text-sm focus:font-extrabold focus:text-brand-blue">Skip to content</a>

<header class="<?= $header_solid ? 'relative bg-night' : 'absolute inset-x-0 top-0' ?> z-50 p-3 sm:p-5" data-site-header>
  <div class="relative mx-auto flex min-h-[74px] items-center justify-between gap-6 rounded-[20px] border border-white/60 bg-glass-bar bg-white/40 px-3 py-3 shadow-glass backdrop-blur-[20px] backdrop-saturate-[180%] sm:py-0 sm:pl-7 lg:gap-8">

    <a href="index.php#top" class="flex shrink-0 items-center no-underline">
      <?= brand_logo($site['name'], 'h-8 w-auto sm:h-9') ?>
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
            class="inline-flex h-11 w-11 items-center justify-center rounded-full border border-ink/15 bg-white/70 text-ink transition-colors hover:bg-white lg:hidden"
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
