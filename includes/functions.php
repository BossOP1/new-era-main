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
        $faces = [
            ['Untitled Sans', 'UntitledSans-Regular',   400, 'normal'],
            ['Untitled Sans', 'UntitledSans-Medium',    500, 'normal'],
            ['Untitled Sans', 'UntitledSans-Bold',      700, 'normal'],
            ['Tobias',        'Tobias-Regular',         400, 'normal'],
            ['Tobias',        'Tobias-RegularItalic',   400, 'italic'],
            ['Tobias',        'Tobias-Medium',          500, 'normal'],
            ['Tobias',        'Tobias-Bold',            700, 'normal'],
        ];

        $css = '';

        foreach ($faces as [$family, $file, $weight, $style]) {
            $path = 'assets/fonts/' . $file . '.woff2';

            if (!is_file(__DIR__ . '/../' . $path)) {
                continue;
            }

            $css .= sprintf(
                "@font-face{font-family:'%s';src:url('%s') format('woff2');font-weight:%d;font-style:%s;font-display:swap}",
                $family,
                e(asset($path)),
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
    function brand_logo(string $alt, string $classes = 'h-10 w-auto', bool $on_dark = false): string
    {
        $file = 'assets/img/logo/new-era-final-logo' . ($on_dark ? '-white' : '') . '.png';

        return sprintf(
            '<img src="%s" alt="%s" width="721" height="214" decoding="async" class="%s">',
            e(asset($file)),
            e($alt),
            e($classes)
        );
    }
}

if (!function_exists('insurer_mark')) {
    /**
     * One entry in the "In-network with" marquee: the carrier's logo when we
     * have one in assets/img/insurers/, otherwise its name in the same muted
     * style, so a carrier without artwork still reads as part of the row.
     *
     * @param array $insurer  Row from $data['insurers'].
     * @param bool  $repeat   True for the duplicated half of the marquee, which
     *                        exists only to make the loop seamless and so is
     *                        hidden from assistive tech.
     */
    function insurer_mark(array $insurer, bool $repeat = false): string
    {
        $name = $insurer['name'] ?? '';
        $logo = $insurer['logo'] ?? null;
        $file = $logo ? __DIR__ . '/../assets/img/insurers/' . $logo : null;

        if ($logo && is_file($file)) {
            return sprintf(
                '<img src="%s" alt="%s" %s class="%s w-auto shrink-0 opacity-40">',
                e(asset('assets/img/insurers/' . $logo)),
                $repeat ? '' : e($name),
                $repeat ? 'aria-hidden="true"' : '',
                e($insurer['size'] ?? 'h-5')
            );
        }

        return sprintf(
            '<span class="whitespace-nowrap text-[19px] font-extrabold tracking-[-0.01em] text-ink/40"%s>%s</span>',
            $repeat ? ' aria-hidden="true"' : '',
            e($name)
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
