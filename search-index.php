<?php
/**
 * The footer search's index, for local preview under `php -S` only.
 *
 * The live site is the static build: there the footer reads
 * dist/search-index.json, which build.php writes. php -S serves the PHP
 * sources instead and answers a missing search-index.json with the homepage,
 * so main.js falls back to this file, which runs `php build.php --index-only`
 * and caches the result until any .php source changes.
 *
 * build.php never publishes this file (it is not in its page list), so it
 * does not exist on the live site.
 */

if (PHP_SAPI !== 'cli-server') {
    http_response_code(404);
    exit;
}

$newest = 0;
foreach (array_merge(glob(__DIR__ . '/*.php'), glob(__DIR__ . '/includes/*.php')) as $file) {
    $newest = max($newest, filemtime($file));
}

$cache = sys_get_temp_dir() . '/anew-era-search-' . md5(__DIR__) . '.json';

if (!is_file($cache) || filemtime($cache) < $newest) {
    $cmd  = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(__DIR__ . '/build.php') . ' --index-only';
    $json = shell_exec($cmd);

    if (!is_string($json) || !is_array(json_decode($json, true))) {
        http_response_code(500);
        header('Content-Type: application/json');
        echo '[]';
        exit;
    }
    file_put_contents($cache, $json);
}

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
readfile($cache);
