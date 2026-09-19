<?php
/**
 * Build script for Netlify deployment
 * ------------------------------------------------------------------
 * Renders every PHP page to static HTML in dist/, rewrites .php links
 * to .html, and copies the assets alongside. Run locally with:
 *
 *     php build.php
 *
 * Netlify runs it via the build command in netlify.toml and publishes dist/.
 */

// Run from the project root no matter where the script was called from.
chdir(__DIR__);

// The CLI has no request, but the page templates read $_SERVER. Give them
// something sane so nothing warns mid-render.
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['REQUEST_URI']    = $_SERVER['REQUEST_URI']    ?? '/';
$_SERVER['HTTP_HOST']      = $_SERVER['HTTP_HOST']      ?? 'localhost';
$_SERVER['SERVER_NAME']    = $_SERVER['SERVER_NAME']    ?? 'localhost';
$_SERVER['HTTPS']          = 'on';

// Pages to build (source PHP file => output HTML file).
// Files that do not exist yet are skipped with a warning, so pages we have
// planned can sit here until they are written.
$pages = [
    'index.php'   => 'index.html',
    'about.php'   => 'about.html',
    'team.php'    => 'team.html',   // the meet-our-team roster
    'index2.php'  => 'index2.html',   // vibrant variant
    'faq.php'        => 'faq.html',         // the full FAQ
    'insurance.php'  => 'insurance.html',   // carriers, coverage and cost
    'reviews.php'    => 'reviews.html',     // every five-star patient review
    'conditions.php' => 'conditions.html', // the conditions index
    'tms.php'        => 'tms.html',        // the TMS treatment page
    'treatments.php' => 'treatments.html', // the treatments index
    'psychiatry.php' => 'psychiatry.html', // treatment page
    'therapy.php'    => 'therapy.html',    // treatment page
    'spravato.php'   => 'spravato.html',   // treatment page
    'depression.php' => 'depression.html', // condition page
    'depression-short.php' => 'depression-short.html', // short edition, for comparison
    'anxiety.php'            => 'anxiety.html',            // condition page
    'postpartum.php'         => 'postpartum.html',         // condition page
    'ptsd.php'               => 'ptsd.html',               // condition page
    'tinnitus.php'           => 'tinnitus.html',           // condition page
    'migraines.php'          => 'migraines.html',          // condition page
    'ocd.php'                => 'ocd.html',                // condition page
    'privacy.php' => 'privacy.html',   // privacy policy
    'terms.php'   => 'terms.html',     // terms of use
];

// Folders copied wholesale into dist/.
// assets/ holds photos, insurance logos, the Magstim device shot, the clinic
// photo, the neurons hero and both logo variants.
$assetDirs = ['assets'];

// Source data that lives under assets/ for convenience but must never be
// served. assets/reviews_list/ holds the raw review export: full reviewer
// names, the odd email address, and columns for a minor's name and age. The
// site publishes what tools/build_reviews.py distils out of it, never the
// spreadsheet itself. Paths are relative to the project root.
$noPublish = ['assets/reviews_list'];

// Single files copied into dist/ when present.
$rootFiles = [
    'favicon.ico', 'favicon.png', 'apple-touch-icon.png', 'robots.txt', 'sitemap.xml',
    '_redirects', '_headers',
];

/* ------------------------------------------------------------------ */

function removeDir(string $dir): void
{
    if (!is_dir($dir)) {
        return;
    }
    foreach (scandir($dir) as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }
        $path = "$dir/$file";
        is_dir($path) ? removeDir($path) : unlink($path);
    }
    rmdir($dir);
}

function copyDir(string $src, string $dst, array $skip = []): int
{
    if (!is_dir($src) || in_array($src, $skip, true)) {
        return 0;
    }
    if (!is_dir($dst)) {
        mkdir($dst, 0755, true);
    }
    $count = 0;
    foreach (scandir($src) as $file) {
        if ($file === '.' || $file === '..' || $file === '.DS_Store') {
            continue;
        }
        $srcPath = "$src/$file";
        $dstPath = "$dst/$file";
        if (is_dir($srcPath)) {
            $count += copyDir($srcPath, $dstPath, $skip);
        } elseif (in_array($srcPath, $skip, true)) {
            continue;
        } elseif (copy($srcPath, $dstPath)) {
            $count++;
        }
    }
    return $count;
}

/* ---- Start from a clean dist/ ------------------------------------- */

removeDir('dist');
mkdir('dist', 0755, true);

/* ---- Render the pages --------------------------------------------- */

$built = 0;
$skipped = [];

foreach ($pages as $srcFile => $outFile) {

    if (!file_exists($srcFile)) {
        $skipped[] = $srcFile;
        echo "Skipped: $srcFile (not created yet)\n";
        continue;
    }

    $destPath = 'dist/' . $outFile;
    $destDir  = dirname($destPath);

    if (!is_dir($destDir)) {
        mkdir($destDir, 0755, true);
    }

    // Each page starts from a clean slate: header.php reads $page_title and
    // friends off the global scope, and require_once means includes/init.php
    // only runs for the first page, so leftovers would otherwise carry over.
    unset($page_title, $page_description, $header_solid, $page_stylesheet,
          $header_hero_light, $header_inset, $condition_key, $treatment_key);

    // The nav marks the current page from SCRIPT_NAME, which the PHP server
    // sets per request. Under the CLI it would say build.php for every page.
    $_SERVER['SCRIPT_NAME'] = '/' . $srcFile;

    // Render. Included at global scope on purpose: the pages share their
    // data arrays and helpers across the whole build.
    ob_start();
    include $srcFile;
    $html = ob_get_clean();

    if (trim($html) === '') {
        fwrite(STDERR, "ERROR: $srcFile rendered nothing.\n");
        exit(1);
    }

    // Internal .php links become .html for the static host. Anything with a
    // scheme (tel:, mailto:, https://) has no .php in it, so it is untouched.
    $html = str_replace(
        ['.php"', ".php'", '.php#', '.php?'],
        ['.html"', ".html'", '.html#', '.html?'],
        $html
    );

    file_put_contents($destPath, $html);
    $built++;
    echo "Built:   $outFile (" . number_format(strlen($html) / 1024, 1) . " KB)\n";
}

/* ---- Copy the static files ---------------------------------------- */

foreach ($assetDirs as $dir) {
    $n = copyDir($dir, 'dist/' . $dir, $noPublish);
    echo "Copied:  $dir/ ($n files)\n";
}

foreach ($noPublish as $path) {
    if (file_exists($path)) {
        echo "Held back: $path/ (source data, not for the public site)\n";
    }
}

foreach ($rootFiles as $file) {
    if (file_exists($file) && copy($file, 'dist/' . $file)) {
        echo "Copied:  $file\n";
    }
}

/* ---- Sanity checks -------------------------------------------------- */

// Every local src/href the build emitted should exist in dist/. Catches a
// renamed photo or a logo that never got copied, before it 404s in production.
$missing = [];
foreach (glob('dist/*.html') as $page) {
    $html = file_get_contents($page);
    preg_match_all('/(?:src|href)="(?!https?:|tel:|mailto:|#|data:)([^"]+)"/i', $html, $m);
    foreach (array_unique($m[1]) as $ref) {
        $path = 'dist/' . rawurldecode(ltrim(strtok($ref, '?#'), '/'));
        if (!file_exists($path)) {
            $missing[] = basename($page) . ' -> ' . $ref;
        }
    }
}

// The consultation form POSTs back to itself, which a static host cannot do.
$formIsStatic = false;
if (file_exists('dist/index.html')) {
    $formIsStatic = (bool) preg_match('/<form[^>]*method="post"[^>]*>/i', file_get_contents('dist/index.html'))
                 && !preg_match('/<form[^>]*(netlify|data-netlify|action=)/i', file_get_contents('dist/index.html'));
}

/* ---- Report -------------------------------------------------------- */

echo "\nBuild complete: $built page" . ($built === 1 ? '' : 's') . " in dist/.\n";

if ($skipped) {
    echo "Not built yet: " . implode(', ', $skipped) . "\n";
    echo "Footer links pointing at those pages will 404 until they exist.\n";
}

if ($missing) {
    echo "\nWARNING: " . count($missing) . " reference(s) missing from dist/:\n";
    foreach (array_slice($missing, 0, 20) as $ref) {
        echo "  $ref\n";
    }
    if (count($missing) > 20) {
        echo "  ... and " . (count($missing) - 20) . " more\n";
    }
}

if ($formIsStatic) {
    echo "\nNOTE: the consultation form POSTs to itself, which will not work on\n";
    echo "Netlify. Add data-netlify=\"true\" plus a hidden form-name field to use\n";
    echo "Netlify Forms, or point action= at your CRM endpoint.\n";
}
