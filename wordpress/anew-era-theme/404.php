<?php
/** Not found. The old site's retired URLs are 301'd before this is reached (inc/data-redirects.php). */

$page_title = 'Page not found';
$doc_title  = 'We could not find that page.';
$doc_lede   = 'It may have moved when the site was rebuilt. These are the places most people are looking for:';
$doc_body   = '<ul>'
    . '<li><a href="tms.php">TMS therapy</a></li>'
    . '<li><a href="treatments.php">All treatments</a></li>'
    . '<li><a href="conditions.php">Conditions we treat</a></li>'
    . '<li><a href="team.php">Meet our team</a></li>'
    . '<li><a href="blogs.php">Blog &amp; articles</a></li>'
    . '<li><a href="contact.php">Contact us</a></li>'
    . '</ul>';

require get_theme_file_path('inc/document-page.php');
