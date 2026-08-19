# Anew Era Health — homepage (PHP + Tailwind CSS)

Converted from the original `Anew Era Homepage.dc.html` design canvas into plain
PHP templates styled with Tailwind CSS. Header and footer are separate,
reusable components.

## Structure

```
index.php                     Homepage — sections only, no chrome
includes/
  header.php                  <head>, glass nav bar, mobile menu   ← component
  footer.php                  Footer, scripts, closing tags        ← component
  init.php                    Bootstrap: loads config + data + helpers
  config.php                  Contact details, nav menus, brand
  data.php                    All page copy (conditions, treatments, FAQs, …)
  functions.php               e(), asset(), image_slot(), icon helpers
assets/
  css/tailwind.css            Compiled stylesheet (generated)
  js/tailwind.config.js       Theme: brand colours, gradients, marquee
  js/main.js                  Tabs, accordion, review paging, mobile menu
  img/                        Photography for all 16 slots (+ CREDITS.md)
src/input.css                 Tailwind entry point
tailwind.config.js            Re-exports assets/js/tailwind.config.js
```

## Adding a page

```php
<?php
$page_title = 'Treatments';
$header_solid = true;              // dark bar when there is no hero behind it
require __DIR__ . '/includes/header.php';
?>

<section class="mx-auto max-w-[1280px] px-10 py-24"> … </section>

<?php require __DIR__ . '/includes/footer.php'; ?>
```

Editing the nav, phone number or footer columns is a `includes/config.php`
change; editing copy is a `includes/data.php` change. Neither touches markup.

## Running it

```bash
php -S localhost:8000        # any PHP 8.x; no database, no dependencies
```

Upload the folder as-is to any PHP host (`node_modules/` and `src/` are not
needed on the server).

## Styles

`assets/css/tailwind.css` is committed, so the site works with no build step.
After changing classes, rebuild it:

```bash
npm install
npm run build:css      # or: npm run watch:css
```

If that file is ever missing, `includes/header.php` automatically falls back to
the Tailwind Play CDN, so the page still renders correctly while you develop.

Brand tokens live in `assets/js/tailwind.config.js` — `brand-blue`,
`brand-orange`, `brand-green`, `ink`, `night`, `surface`, plus the gradient
utilities (`bg-hero-veil`, `bg-tms-veil`, `bg-cta-glow`, …) and the
`animate-marquee` insurer strip.

## Interactivity

`assets/js/main.js` is progressive enhancement — the page is readable without
it. It drives the condition selector, the FAQ category tabs, one-open-at-a-time
accordion behaviour, review paging and the mobile menu. FAQ entries are native
`<details>` elements, so they still open and close with JavaScript disabled.

## Photography

All 16 image slots are filled with Unsplash photos chosen to match each
section's copy — see `assets/img/CREDITS.md` for the source of each and
`assets/img/README.md` for how to swap one out. The Unsplash License allows
commercial use with no attribution, but if the practice has its own
photography, replacing these files by name is the only step needed.

`image_slot()` renders a labelled placeholder for any slot with no file, so a
missing or deleted photo never breaks the layout.

The original design canvas (`Anew Era Homepage.dc.html`, `support.js`,
`image-slot.js`, `uploads/`) is left untouched for reference.
