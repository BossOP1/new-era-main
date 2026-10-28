<?php
/**
 * One-time site setup: the pages, the reading/permalink settings, and the
 * blog import from inc/data-blogs.php + inc/posts/*.html.
 *
 * Run it from Tools → Anew Era setup, or with WP-CLI:
 *
 *   wp anew setup                  pages, front page, permalinks
 *   wp anew import-posts           all 156 posts (re-runnable: updates in place)
 *   wp anew import-posts --images  …and their featured images
 *
 * Everything here is idempotent. A page or post is found by its slug and
 * updated, never duplicated, so it is safe to run again after a data change.
 */

/** Slug → title for every page the site needs. */
function anew_setup_page_list(): array
{
    $dir   = get_theme_file_path('inc/');
    $pages = [];

    // Bespoke pages: one page-{slug}.php each.
    $titles = [
        'about' => 'About', 'team' => 'Meet Our Team', 'treatments' => 'Treatments',
        'conditions' => 'Conditions', 'tms' => 'TMS Therapy', 'magstim-horizon' => 'Magstim Horizon',
        'depression' => 'Depression', 'insurance' => 'Insurance', 'faq' => 'FAQ',
        'contact' => 'Contact', 'phq9' => 'PHQ-9 Depression Screening', 'reviews' => 'Reviews',
        'blogs' => 'Blog & Articles',
    ];
    foreach (glob(get_theme_file_path('page-*.php')) as $file) {
        $slug         = substr(basename($file, '.php'), 5);
        $pages[$slug] = $titles[$slug] ?? ucwords(str_replace('-', ' ', $slug));
    }

    // Data-driven pages, drawn by page.php's router.
    foreach (['data-conditions.php', 'data-treatments.php', 'data-legal.php'] as $file) {
        foreach (require $dir . $file as $slug => $entry) {
            $pages[$slug] = wp_strip_all_tags((string) ($entry['name'] ?? $entry['title'] ?? $slug));
        }
    }
    foreach (require $dir . 'data-locations.php' as $slug => $entry) {
        $pages[$slug] = wp_strip_all_tags((string) ($entry['name'] ?? $slug));
    }
    foreach ((require $dir . 'data-team.php')['people'] as $person) {
        if (!empty($person['clinics'])) {
            $pages[$person['slug']] = $person['name'];
        }
    }

    return $pages;
}

/** Create or update the pages and the site settings. Returns a log. */
function anew_setup_site(): array
{
    $log = [];

    $front = get_page_by_path('home', OBJECT, 'page');
    $front_id = $front ? $front->ID : wp_insert_post([
        'post_type' => 'page', 'post_status' => 'publish', 'post_title' => 'Home', 'post_name' => 'home',
    ]);
    update_option('show_on_front', 'page');
    update_option('page_on_front', (int) $front_id);
    $log[] = 'Front page: Home (#' . $front_id . ')';

    // WordPress's own sample content, if nobody has touched it.
    foreach ([['hello-world', 'post'], ['sample-page', 'page']] as [$sample, $type]) {
        $p = get_page_by_path($sample, OBJECT, $type);
        if ($p && $p->post_modified === $p->post_date) {
            wp_trash_post($p->ID);
            $log[] = "Trashed WordPress's sample $type \"$sample\"";
        }
    }

    $made = $kept = 0;
    foreach (anew_setup_page_list() as $slug => $title) {
        $existing = get_page_by_path($slug, OBJECT, 'page');
        if ($existing) {
            if ($existing->post_status !== 'publish') {
                wp_update_post(['ID' => $existing->ID, 'post_status' => 'publish']);
            }
            $kept++;
            continue;
        }
        wp_insert_post([
            'post_type'      => 'page',
            'post_status'    => 'publish',
            'post_title'     => $title,
            'post_name'      => $slug,
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        ]);
        $made++;
    }
    $log[] = "Pages: $made created, $kept already there";

    // /%postname%/ keeps the trailing-slash URLs the old WordPress site
    // ranked with, and puts posts at the root as they are today.
    update_option('permalink_structure', '/%postname%/');
    update_option('default_comment_status', 'closed');
    update_option('default_ping_status', 'closed');
    flush_rewrite_rules();
    $log[] = 'Permalinks: /%postname%/; comments closed by default';

    // Posts and pages share the root, so a post and a page with one slug
    // would hide each other.
    $clash = array_intersect(array_keys(anew_setup_page_list()), array_keys(anew_blog_data()));
    $log[] = $clash ? 'WARNING slug collision between pages and posts: ' . implode(', ', $clash) : 'No page/post slug collisions';

    anew_flush_caches();
    return $log;
}

/**
 * Links inside the post bodies that point at pages which no longer exist and
 * that no redirect covers, mapped to the nearest live page.
 */
function anew_setup_link_fixes(): array
{
    return [
        'home'                                                     => 'index',
        'contact-us'                                               => 'contact',
        'depression-this-holiday-season'                           => 'depression-this-holiday-season-2',
        'evidence-for-the-use-of-tms-and-theta-burst-therapy-for-depression' => 'tms',
        'psychiatrists'                                            => 'psychiatry',
        'psychiatrist-costa-mesa'                                  => 'psychiatry',
        'psychiatrist-huntington-beach'                            => 'huntington-beach',
        'therapists'                                               => 'therapy',
        'therapist-costa-mesa'                                     => 'therapy',
    ];
}

/**
 * A post body's internal links, as site-relative URLs. 'tms.php#cost' →
 * '/tms/#cost'. Old slugs are resolved through the link fixes and the
 * redirect map, so the link goes straight to the final page in one hop.
 */
function anew_setup_rewrite_body(string $html): string
{
    $base  = untrailingslashit((string) parse_url(home_url('/'), PHP_URL_PATH));
    $known = array_merge(array_keys(anew_setup_page_list()), array_keys(anew_blog_data()), ['index']);
    $fixes = anew_setup_link_fixes();
    $redir = require get_theme_file_path('inc/data-redirects.php');

    $resolve = static function (string $slug) use ($known, $fixes, $redir, $base): string {
        $slug = $fixes[$slug] ?? $slug;
        if (!in_array($slug, $known, true)) {
            foreach ($redir as $pattern => $target) {
                if (preg_match('~' . $pattern . '~i', $slug)) {
                    if (preg_match('~^https?://~', $target)) {
                        return $target;
                    }
                    $slug = trim($target, '/') ?: 'index';
                    break;
                }
            }
        }
        return $base . ($slug === 'index' ? '/' : '/' . $slug . '/');
    };

    // '/contact-us/' style links from the old WordPress content.
    $html = preg_replace_callback('~href="/([a-z0-9-]+)/"~', static fn ($m) => 'href="' . $resolve($m[1]) . '"', $html);

    return preg_replace_callback(
        '~(href=["\'])(?:\./)?([A-Za-z0-9][A-Za-z0-9_-]*)\.php([?#][^"\']*)?(?=["\'])~',
        static fn ($m) => $m[1] . $resolve($m[2]) . ($m[3] ?? ''),
        $html
    );
}

/**
 * Import (or update) a slice of the blog. Returns [done, total, log].
 * The body is stored as a single Custom HTML block, so the editor keeps the
 * Tailwind markup exactly and wpautop() never rewraps it.
 */
function anew_import_posts(int $offset = 0, int $limit = 0, bool $images = false): array
{
    require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

    $entries = array_values(anew_blog_data());
    $total   = count($entries);
    $slice   = $limit > 0 ? array_slice($entries, $offset, $limit) : array_slice($entries, $offset);
    $log     = [];

    foreach ($slice as $entry) {
        $slug = $entry['slug'];
        $file = get_theme_file_path('inc/posts/' . $slug . '.html');

        if (is_file($file)) {
            $body = anew_setup_rewrite_body((string) file_get_contents($file));
        } else {
            // One of the eleven hand-built articles: the page itself renders
            // from inc/posts-custom/, so the post holds the summary — that is
            // what feeds, the REST API and the editor show.
            $body = '<p>' . esc_html($entry['excerpt'] ?? '') . '</p>';
        }
        $content = "<!-- wp:html -->\n" . $body . "\n<!-- /wp:html -->";

        $date     = ($entry['date_iso'] ?? gmdate('Y-m-d')) . ' 09:00:00';
        $existing = get_page_by_path($slug, OBJECT, 'post');
        $category = (int) wp_create_category($entry['category'] ?? 'Mental Health');

        $postarr = [
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'post_name'      => $slug,
            'post_title'     => $entry['title'],
            'post_excerpt'   => $entry['excerpt'] ?? '',
            'post_content'   => $content,
            'post_date'      => $date,
            'post_date_gmt'  => get_gmt_from_date($date),
            'post_category'  => [$category],
            'comment_status' => 'closed',
            'ping_status'    => 'closed',
        ];
        if ($existing) {
            $postarr['ID'] = $existing->ID;
        }

        // wp_insert_post() runs kses on content for users without
        // unfiltered_html (and always under WP-CLI's anonymous user);
        // the bodies are our own markup, so keep it intact.
        kses_remove_filters();
        $id = wp_insert_post(wp_slash($postarr), true);
        kses_init_filters();

        if (is_wp_error($id)) {
            $log[] = "FAILED $slug: " . $id->get_error_message();
            continue;
        }

        update_post_meta($id, '_anew_read_time', $entry['read_time'] ?? '');
        update_post_meta($id, '_anew_takeaway', $entry['takeaway'] ?? '');
        update_post_meta($id, '_anew_hero_image', $entry['hero_image'] ?? '');

        // The titles and descriptions the old site ranked with, written for
        // whichever SEO plugin is installed (unused meta is harmless).
        if (!empty($entry['meta_title'])) {
            update_post_meta($id, '_yoast_wpseo_title', $entry['meta_title']);
            update_post_meta($id, 'rank_math_title', $entry['meta_title']);
        }
        if (!empty($entry['meta_description'])) {
            update_post_meta($id, '_yoast_wpseo_metadesc', $entry['meta_description']);
            update_post_meta($id, 'rank_math_description', $entry['meta_description']);
        }

        if ($images && !has_post_thumbnail($id) && !empty($entry['hero_image'])) {
            $result = anew_import_featured_image($id, $entry['hero_image'], $entry['image_alt'] ?? '');
            if ($result !== '') {
                $log[] = "$slug: $result";
            }
        }

        $log[] = ($existing ? 'Updated ' : 'Created ') . $slug;
    }

    anew_flush_caches();
    return [$offset + count($slice), $total, $log];
}

/** Copy a theme image into the media library and make it the post's featured image. */
function anew_import_featured_image(int $post_id, string $path, string $alt): string
{
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';

    $source = get_theme_file_path(ltrim(strtok($path, '?#'), '/'));
    if (!is_file($source)) {
        return 'no image file ' . $path;
    }

    $tmp = wp_tempnam(basename($source));
    copy($source, $tmp);
    $attachment = media_handle_sideload(['name' => basename($source), 'tmp_name' => $tmp], $post_id);
    if (is_wp_error($attachment)) {
        @unlink($tmp);
        return 'image failed: ' . $attachment->get_error_message();
    }

    update_post_meta($attachment, '_wp_attachment_image_alt', $alt);
    set_post_thumbnail($post_id, $attachment);
    return '';
}

/* ── Tools → Anew Era setup ────────────────────────────────────────── */

add_action('admin_menu', static function (): void {
    add_management_page('Anew Era setup', 'Anew Era setup', 'manage_options', 'anew-setup', 'anew_setup_screen');
});

function anew_setup_screen(): void
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $step = sanitize_key($_GET['step'] ?? '');
    $log  = [];
    $next = '';

    if ($step !== '' && check_admin_referer('anew_setup')) {
        if ($step === 'site') {
            $log = anew_setup_site();
        } elseif ($step === 'posts' || $step === 'images') {
            // Ten at a time keeps each request inside shared-hosting limits;
            // the page carries on by itself until the last batch.
            $offset = max(0, (int) ($_GET['offset'] ?? 0));
            [$done, $total, $log] = anew_import_posts($offset, 10, $step === 'images');
            array_unshift($log, "Posts $done of $total");
            if ($done < $total) {
                $next = wp_nonce_url(admin_url('tools.php?page=anew-setup&step=' . $step . '&offset=' . $done), 'anew_setup');
            }
        }
    }

    $url   = static fn (string $s): string => wp_nonce_url(admin_url('tools.php?page=anew-setup&step=' . $s), 'anew_setup');
    $count = wp_count_posts('post');
    ?>
    <div class="wrap">
      <h1>Anew Era setup</h1>
      <p>Run these once, in order, on a fresh install. Each one is safe to run again: existing pages and posts are matched by slug and updated, never duplicated.</p>
      <ol>
        <li><a class="button button-primary" href="<?= esc_url($url('site')) ?>">1. Create pages and settings</a>
          — <?= count(anew_setup_page_list()) ?> pages, the static front page, and /%postname%/ permalinks.</li>
        <li style="margin-top:12px"><a class="button" href="<?= esc_url($url('posts')) ?>">2. Import blog posts</a>
          — <?= count(anew_blog_data()) ?> articles. <?= (int) $count->publish ?> published posts now.</li>
        <li style="margin-top:12px"><a class="button" href="<?= esc_url($url('images')) ?>">3. Import featured images</a>
          — copies each article's hero photo into the media library (slower; optional — the theme shows the same photo without it).</li>
      </ol>
      <?php if ($log): ?>
        <h2>Result</h2>
        <pre style="background:#fff;padding:12px;max-height:420px;overflow:auto"><?= esc_html(implode("\n", $log)) ?></pre>
      <?php endif; ?>
      <?php if ($next): ?>
        <p><strong>Continuing with the next batch…</strong> <a href="<?= esc_url($next) ?>">Continue now</a></p>
        <script>setTimeout(function () { location.href = <?= wp_json_encode($next) ?>; }, 800);</script>
      <?php endif; ?>
    </div>
    <?php
}

/* ── WP-CLI ────────────────────────────────────────────────────────── */

if (defined('WP_CLI') && WP_CLI) {
    WP_CLI::add_command('anew setup', static function (): void {
        foreach (anew_setup_site() as $line) {
            WP_CLI::log($line);
        }
        WP_CLI::success('Site set up.');
    });

    WP_CLI::add_command('anew import-posts', static function (array $args, array $assoc): void {
        [$done, $total, $log] = anew_import_posts(0, 0, !empty($assoc['images']));
        foreach ($log as $line) {
            WP_CLI::log($line);
        }
        WP_CLI::success("Imported $done of $total posts.");
    });
}
