<?php
/**
 * Small template helpers. Loaded by includes/init.php.
 */

if (!function_exists('e')) {
    /** Escape for HTML output. */
    function e(?string $value): string
    {
        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }
}

if (!function_exists('asset')) {
    /** Build a URL for a file in assets/, cache-busted by its modification time. */
    function asset(string $path): string
    {
        $path = ltrim($path, '/');
        $file = __DIR__ . '/../' . $path;

        return file_exists($file) ? $path . '?v=' . filemtime($file) : $path;
    }
}

if (!function_exists('font_faces')) {
    /**
     * @font-face rules for the two self-hosted Klim faces — Tobias for the
     * headings, Untitled Sans for the copy.
     *
     * Only the cuts actually sitting in assets/fonts/ get declared. The
     * licences are per-domain so the .woff2 files are not in the repo; while
     * they are missing this returns nothing at all, no browser goes looking
     * for a file that isn't there, and the fallback stack in
     * assets/js/tailwind.config.js carries the page. Drop the files in and
     * they light up on the next request — see assets/fonts/README.md.
     */
    function font_faces(): string
    {
        // family, css weight, style, and the filenames to look for in
        // assets/fonts/ — first match wins. woff2 leads because it is roughly
        // half the size of otf; the globs cover vendor folders and the hashed
        // filenames download sites attach.
        $faces = [
            ['Untitled Sans', 400, 'normal', ['UntitledSans-Regular.woff2', '**/UntitledSans-Regular.*']],
            ['Untitled Sans', 500, 'normal', ['UntitledSans-Medium.woff2', '**/UntitledSans-Medium.*']],
            ['Untitled Sans', 700, 'normal', ['UntitledSans-Bold.woff2', '**/UntitledSans-Bold.*']],
            ['Tobias',        400, 'normal', ['Tobias-Regular.woff2', '**/TobiasTRIAL-Regular-*.otf', '**/Tobias-Regular.*']],
            ['Tobias',        400, 'italic', ['Tobias-RegularItalic.woff2', '**/TobiasTRIAL-RegularItalic-*.otf', '**/Tobias-RegularItalic.*']],
            ['Tobias',        500, 'normal', ['Tobias-Medium.woff2', '**/TobiasTRIAL-Medium-*.otf', '**/Tobias-Medium.*']],
            ['Tobias',        700, 'normal', ['Tobias-Bold.woff2', '**/TobiasTRIAL-Bold-*.otf', '**/Tobias-Bold.*']],
        ];

        $dir = __DIR__ . '/../assets/fonts/';
        $css = '';

        foreach ($faces as [$family, $weight, $style, $patterns]) {
            $match = null;

            foreach ($patterns as $pattern) {
                $found = glob($dir . $pattern, GLOB_BRACE);
                if ($found) {
                    $match = $found[0];
                    break;
                }
            }

            if ($match === null) {
                continue;
            }

            $rel = 'assets/fonts/' . ltrim(str_replace($dir, '', $match), '/');
            $ext = strtolower(pathinfo($match, PATHINFO_EXTENSION));
            $format = ['woff2' => 'woff2', 'woff' => 'woff', 'otf' => 'opentype', 'ttf' => 'truetype'][$ext] ?? 'opentype';

            $css .= sprintf(
                "@font-face{font-family:'%s';src:url('%s') format('%s');font-weight:%d;font-style:%s;font-display:swap}",
                $family,
                e(asset($rel)),
                $format,
                $weight,
                $style
            );
        }

        return $css === '' ? '' : "<style>$css</style>\n";
    }
}

if (!function_exists('image_slot')) {
    /**
     * Renders a photo if one exists, otherwise a labelled placeholder.
     *
     * Drop a file into assets/img/ named after the slot — e.g. assets/img/cond-1.jpg
     * for the Depression card — and it appears automatically. Supported
     * extensions: jpg, jpeg, png, webp, avif.
     *
     * A slot may also name a file outright, extension and all, for photos kept in
     * a subfolder: image_slot('homepage/home-ambience-nera.webp', ...).
     *
     * @param string $slot        Slot id, doubles as the filename.
     * @param string $placeholder Hint text shown while the slot is empty.
     * @param string $alt         Alt text used once a real photo is present.
     * @param bool   $eager       True for above-the-fold images (skips lazy loading).
     * @param string $focus        Tailwind object-position class, e.g. 'object-left', when the
     *                             subject needs to sit clear of an overlaying card.
     */
    function image_slot(string $slot, string $placeholder = '', string $alt = '', bool $eager = false, string $focus = ''): string
    {
        $dir = __DIR__ . '/../assets/img/';

        $names = pathinfo($slot, PATHINFO_EXTENSION) !== ''
            ? [$slot]
            : array_map(
                static fn (string $ext): string => $slot . '.' . $ext,
                ['jpg', 'jpeg', 'png', 'webp', 'avif']
            );

        foreach ($names as $name) {
            $file = $dir . $name;
            if (is_file($file)) {
                return sprintf(
                    '<img src="%s" alt="%s" %s class="absolute inset-0 h-full w-full object-cover %s">',
                    e(asset('assets/img/' . $name)),
                    e($alt !== '' ? $alt : $placeholder),
                    $eager ? 'fetchpriority="high" decoding="async"' : 'loading="lazy" decoding="async"',
                    e($focus)
                );
            }
        }

        return sprintf(
            '<div class="img-slot absolute inset-0" data-slot="%s"><span class="img-slot__hint">%s</span></div>',
            e($slot),
            e($placeholder)
        );
    }
}

if (!function_exists('arrow_icon')) {
    /** The right-pointing arrow used on most calls to action. */
    function arrow_icon(int $size = 15): string
    {
        return sprintf(
            '<svg width="%1$d" height="%1$d" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true"><path d="M5 12h14M13 6l6 6-6 6"></path></svg>',
            $size
        );
    }
}

if (!function_exists('brand_logo')) {
    /**
     * The Anew Era lockup — glyph, wordmark and strapline in one image.
     *
     * Two transparent PNGs live in assets/img/logo/: the full-colour file for
     * light backgrounds, and a variant with the wordmark reversed to white for
     * the night-coloured footer. The glyph keeps its brand colours in both.
     *
     * @param string $alt     Alt text — the site name on the header, '' where a
     *                        nearby heading already names the practice.
     * @param string $classes Tailwind sizing utilities.
     * @param bool   $on_dark True to use the reversed variant.
     */
    function brand_logo(string $alt, string $classes = 'h-10 w-auto', bool $on_dark = false, bool $decorative = false): string
    {
        $file = 'assets/img/logo/new-era-final-logo' . ($on_dark ? '-white' : '') . '.png';

        return sprintf(
            '<img src="%s" alt="%s"%s width="721" height="214" decoding="async" class="%s">',
            e(asset($file)),
            $decorative ? '' : e($alt),
            $decorative ? ' aria-hidden="true" loading="lazy"' : '',
            e($classes)
        );
    }
}

if (!function_exists('insurer_mark')) {
    /**
     * One carrier in the "In-network with" marquee: its name, with the states
     * it covers underneath.
     *
     * @param array $insurer  Row from $data['insurers'].
     * @param bool  $repeat   True for the duplicated half of the marquee, which
     *                        exists only to make the loop seamless and so is
     *                        hidden from assistive tech.
     */
    function insurer_mark(array $insurer, bool $repeat = false): string
    {
        return sprintf(
            '<div class="flex shrink-0 flex-col items-center gap-0.5"%s>'
            . '<span class="whitespace-nowrap text-[17px] font-extrabold tracking-[-0.01em] text-ink/45">%s</span>'
            . '<span class="whitespace-nowrap text-[10px] font-bold uppercase tracking-[0.16em] text-ink/30">%s</span>'
            . '</div>',
            $repeat ? ' aria-hidden="true"' : '',
            e($insurer['name'] ?? ''),
            e($insurer['states'] ?? '')
        );
    }
}

if (!function_exists('video_slot')) {
    /**
     * Background video for a hero-style section.
     *
     * The poster frame paints immediately and stands in anywhere autoplay is
     * refused (iOS Low Power Mode, data saver, reduced-motion — see
     * assets/js/main.js). If the video file is missing the slot falls back to
     * image_slot(), so the section always has artwork.
     *
     * @param string $file         Path under assets/img/, e.g. 'homepage/hero.mp4'.
     * @param string $poster       Poster image, same base path.
     * @param string $fallbackSlot Slot id used when the video is absent.
     * @param string $alt          Description, used only by the image fallback.
     */
    function video_slot(string $file, string $poster = '', string $fallbackSlot = '', string $alt = ''): string
    {
        if (!is_file(__DIR__ . '/../assets/img/' . $file)) {
            return image_slot($fallbackSlot, $alt, $alt, true);
        }

        $posterAttr = '';
        if ($poster !== '' && is_file(__DIR__ . '/../assets/img/' . $poster)) {
            $posterAttr = sprintf(' poster="%s"', e(asset('assets/img/' . $poster)));
        }

        // Decorative: the headline carries the meaning, so it is hidden from
        // assistive tech rather than given a label it would read out.
        return sprintf(
            '<video class="absolute inset-0 h-full w-full scale-105 object-cover" autoplay muted loop playsinline'
            . ' preload="auto"%s aria-hidden="true" data-hero-video>'
            . '<source src="%s" type="video/mp4"></video>',
            $posterAttr,
            e(asset('assets/img/' . $file))
        );
    }
}

if (!function_exists('brand_glyph')) {
    /**
     * The mark on its own, lifted out of the logo lockup (see
     * assets/img/logo/new-era-glyph.png). Used as a display element rather
     * than for identification — the footer already carries the full logo — so
     * it is hidden from assistive tech and has no alt text.
     */
    function brand_glyph(string $classes = 'h-24 w-auto'): string
    {
        return sprintf(
            '<img src="%s" alt="" aria-hidden="true" width="163" height="163" decoding="async" loading="lazy" class="%s">',
            e(asset('assets/img/logo/new-era-glyph.png')),
            e($classes)
        );
    }
}

if (!function_exists('condition_icon')) {
    /**
     * Line icons for the conditions list. Drawn on the same 24px grid and
     * close to the stroke weight of the arrows, so they read as one family
     * rather than a borrowed icon set — and in currentColor, so a tab can
     * recolour its icon when selected.
     *
     * Keys are set per condition in includes/data.php.
     */
    function condition_icon(string $key, string $classes = 'h-7 w-7 shrink-0'): string
    {
        $paths = [
            'cloud-rain' => '<path d="M7.2 14.5a3.3 3.3 0 0 1 .45-6.57 4.9 4.9 0 0 1 9.3 1.2 2.9 2.9 0 0 1 .05 5.37"/><path d="M8.5 18v1.6M12 17.6v2.4M15.5 18v1.6"/>',
            'pulse' => '<path d="M2.5 12.5h4l2-5.5 3.4 11 2.6-7 1.6 3h5.4"/>',
            'parent-child' => '<circle cx="10" cy="7.6" r="2.9"/><path d="M4.6 20.4v-2.6a5.4 5.4 0 0 1 8.2-4.6"/><circle cx="17" cy="12.6" r="2.1"/><path d="M13.4 20.4v-1.7a3.6 3.6 0 0 1 7.2 0v1.7"/>',
            'shield-bolt' => '<path d="M12 3.2 5 6v5.2c0 4.4 2.9 7.8 7 9.6 4.1-1.8 7-5.2 7-9.6V6l-7-2.8Z"/><path d="M12.8 8.2 10.2 12h3.2l-2.4 3.8"/>',
            'ear-waves' => '<path d="M13.4 5.6a4.4 4.4 0 0 0-7.3 3.3c0 2.1.7 2.9.7 4.9 0 2.2-1.1 3.6-3 4.1"/><path d="M9.4 9.1a2.5 2.5 0 1 1 4.5 1.5c-.9 1.2-2 1.7-2.4 3-.3 1 .2 1.8-.6 2.6"/><path d="M16.8 6.6a7.2 7.2 0 0 1 0 10.2"/><path d="M19.6 4.2a11 11 0 0 1 0 15"/>',
            'head-bolt' => '<path d="M15.6 20.4v-2.1c0-1 .4-1.7 1.1-2.4A6.6 6.6 0 1 0 7.8 18.8v1.6"/><path d="M12.9 8.3 10.4 11.7h2.9l-2.4 3.4"/>',
            'loop' => '<path d="M19.6 11.2a7.8 7.8 0 0 0-13.4-4.4"/><path d="M4.4 12.8a7.8 7.8 0 0 0 13.4 4.4"/><path d="M6.4 3.2v3.6H10"/><path d="M17.6 20.8v-3.6H14"/>'
        ];

        if (!isset($paths[$key])) {
            return '';
        }

        return sprintf(
            '<svg class="%s" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7"'
            . ' stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">%s</svg>',
            e($classes),
            $paths[$key]
        );
    }
}

if (!function_exists('condition_mark')) {
    /**
     * The mark beside a condition. Prefers the practice's own artwork in
     * assets/img/conditions/ (keyed by 'art' in includes/data.php) and falls
     * back to the drawn line icons in condition_icon() if a file is missing,
     * so a gap in the set never leaves a tab bare.
     *
     * Decorative: the condition is named right beside it.
     */
    function condition_mark(array $condition, string $classes = 'h-9 w-9 shrink-0'): string
    {
        $art = $condition['art'] ?? '';
        $file = 'assets/img/conditions/' . $art . '.png';

        if ($art !== '' && is_file(__DIR__ . '/../' . $file)) {
            return sprintf(
                '<img src="%s" alt="" aria-hidden="true" width="200" height="200" loading="lazy" decoding="async" class="%s">',
                e(asset($file)),
                e($classes)
            );
        }

        return condition_icon($condition['icon'] ?? '', $classes);
    }
}
