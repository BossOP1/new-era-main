<?php
/**
 * Bootstrap — include this at the top of every page.
 * Exposes $site (config) and $data (content) to the templates.
 */
declare(strict_types=1);

require_once __DIR__ . '/functions.php';

$site = require __DIR__ . '/config.php';
$data = require __DIR__ . '/data.php';
