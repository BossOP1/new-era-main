<?php
/**
 * Fallback for everything without a more specific template: category, tag,
 * author and date archives, and WordPress's own ?s= search. The site's
 * real blog index is /blogs/ (page-blogs.php); this is a plain list.
 */

if (is_search()) {
    $doc_title = 'Search results';
    $doc_lede  = sprintf('Articles matching “%s”.', get_search_query());
} elseif (is_archive()) {
    $doc_title = wp_strip_all_tags(get_the_archive_title());
    $doc_lede  = wp_strip_all_tags(get_the_archive_description());
} else {
    $doc_title = 'Articles';
    $doc_lede  = '';
}

ob_start();
if (have_posts()) {
    echo '<ul class="m-0 list-none space-y-6 p-0">';
    while (have_posts()) {
        the_post();
        printf(
            '<li><a href="%s" class="text-[19px] font-bold text-ink hover:text-brand-blue">%s</a><p class="m-0 mt-1 text-[15px] leading-[1.7] text-[#58616a]">%s</p></li>',
            esc_url(get_permalink()),
            esc_html(get_the_title()),
            esc_html(get_the_excerpt())
        );
    }
    echo '</ul>';
    echo '<div class="mt-10">' . get_the_posts_pagination(['mid_size' => 1]) . '</div>';
} else {
    echo '<p>Nothing found. Try the <a href="blogs.php">blog</a> or the search at the foot of the page.</p>';
}
$doc_body = ob_get_clean();

require get_theme_file_path('inc/document-page.php');
