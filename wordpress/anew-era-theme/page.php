<?php
/**
 * Pages without a page-{slug}.php of their own.
 *
 * Conditions, treatments, clinics, clinicians and the legal documents are each
 * drawn by one shared renderer from inc/, keyed by the page's slug, exactly as
 * the root stubs of the static site did ($location_key = 'allen'; …).
 * anew_page_kind() finds the renderer. Any other page — one an editor adds in
 * WordPress — gets the plain document layout and its own content.
 */

$anew_kind = anew_page_kind((string) get_post_field('post_name', get_queried_object_id()));

if ($anew_kind !== null) {
    ${$anew_kind['var']} = get_post_field('post_name', get_queried_object_id());
    require get_theme_file_path('inc/' . $anew_kind['renderer']);
    return;
}

the_post();
$doc_title = get_the_title();
$doc_lede  = has_excerpt() ? get_the_excerpt() : '';
$doc_body  = apply_filters('the_content', get_the_content());
require get_theme_file_path('inc/document-page.php');
