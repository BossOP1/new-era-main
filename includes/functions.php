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
