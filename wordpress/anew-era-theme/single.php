<?php
/**
 * A blog post.
 *
 * Eleven articles were hand-built as whole pages on the static site, with
 * tables and callouts the shared layout does not have; they render from
 * inc/posts-custom/{slug}.php exactly as before. Every other post uses the
 * shared article layout, inc/blog-post.php, with its body from WordPress.
 */

$anew_custom = get_theme_file_path('inc/posts-custom/' . get_post_field('post_name', get_queried_object_id()) . '.php');

require is_file($anew_custom) ? $anew_custom : get_theme_file_path('inc/blog-post.php');
