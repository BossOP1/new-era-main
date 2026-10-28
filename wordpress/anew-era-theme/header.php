<?php
/**
 * For anything that calls get_header(). The theme's own templates require
 * inc/header.php directly, at global scope, so the variables they set reach
 * it; get_header() runs inside a function, so they are pulled in from the
 * global scope here instead and the site settings are handed back out.
 */
foreach (['page_title', 'page_description', 'header_solid', 'header_hero_light', 'header_inset', 'page_stylesheet'] as $anew_var) {
    if (isset($GLOBALS[$anew_var])) {
        $$anew_var = $GLOBALS[$anew_var];
    }
}
global $site, $data;
require get_theme_file_path('inc/header.php');
