# Fonts

The site is set in two [Klim Type Foundry](https://klim.co.nz) faces:

| Role | Family | Used by |
| --- | --- | --- |
| Headings and display | **Tobias** | `h1`–`h3`, `.display-mark`, `.font-serif` |
| Everything else | **Untitled Sans** | `body`, `.font-sans` |

Both are **retail licences**. The `.woff2` files are deliberately not committed —
they are not redistributable and there is no public CDN for them. Buy a webfont
licence for the site's domain at [klim.co.nz](https://klim.co.nz), then drop the
files here using exactly these names:

```
assets/fonts/
  UntitledSans-Regular.woff2
  UntitledSans-Medium.woff2
  UntitledSans-Bold.woff2
  Tobias-Regular.woff2
  Tobias-RegularItalic.woff2
  Tobias-Medium.woff2
  Tobias-Bold.woff2
```

Nothing else needs changing. `font_faces()` in `includes/functions.php` scans
this folder on each render and declares whichever cuts it finds, so the fonts
light up on the next request — no CSS rebuild, no config edit.

## Until then

`font_faces()` emits nothing while the folder is empty, so no browser requests a
file that isn't there. `assets/js/tailwind.config.js` lists Manrope and
Newsreader behind the real families, so the page falls back to those (loaded
from Google Fonts in `includes/header.php`) rather than to a system serif. The
layout does not shift when the licensed files arrive — only the letterforms
change.

## Weights

Untitled Sans ships Regular / Medium / Bold. The design leans on `font-extrabold`
and `font-semibold`, which have no matching cut, so `tailwind.config.js` remaps
them to 700 and 500 respectively. That keeps the browser from synthesising a
fake heavy weight. If you licence additional cuts, add the `@font-face` rule and
drop the remap.
