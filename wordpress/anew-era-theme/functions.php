<?php
/**
 * Anew Era theme — the WordPress layer over the original PHP site.
 *
 * The site's own templates and data files are carried over nearly as they
 * were (inc/ is the old includes/). Pages still link to each other as
 * 'about.php', 'contact.php?interest=tms' and so on, exactly as before; the
 * output buffer in anew_rewrite_links() turns those into WordPress URLs on the
 * way out, the same job build.php's link rewrite did for the static build.
 *
 * What lives here:
 *   · theme supports, and switching off the WordPress front-end extras the
 *     design does not use
 *   · the document title and meta description, deferring to an SEO plugin
 *   · the page router (anew_page_kind) used by page.php
 *   · the blog index and post entries, read from WordPress posts
 *   · the 301s from the old site's URLs
 *   · the footer-search REST route and the contact-form handler
 *
 * Templates require inc/header.php and inc/footer.php directly rather than
 * calling get_header(): WordPress includes page templates at global scope,
 * so $page_title and the rest reach the header the way they always did.
 */

require_once get_theme_file_path('inc/functions.php');
require_once get_theme_file_path('inc/setup.php');

/** The site settings from inc/config.php, loaded once. */
function anew_site(): array
{
    static $site = null;
    return $site ??= require get_theme_file_path('inc/config.php');
}

/* ── Theme supports and front-end clean-up ─────────────────────────── */

add_action('after_setup_theme', static function (): void {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    // Navigation is built from inc/config.php — the mega-menus (clinics by
    // region, feature cards, icons) do not map onto wp_nav_menu(). The
    // location is registered so a menu can be wired in later.
    register_nav_menus(['primary' => 'Primary Menu']);
});

add_action('init', static function (): void {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head');
    remove_action('wp_head', 'wp_oembed_add_discovery_links');
    remove_action('wp_head', 'feed_links_extra', 3);
});

// Tailwind's preflight is the whole base layer; the block library and
// WordPress's global styles would fight it.
add_action('wp_enqueue_scripts', static function (): void {
    foreach (['wp-block-library', 'wp-block-library-theme', 'global-styles', 'classic-theme-styles'] as $handle) {
        wp_dequeue_style($handle);
    }
}, 100);
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles');
remove_action('wp_footer', 'wp_enqueue_global_styles', 1);
remove_action('wp_body_open', 'wp_global_styles_render_svg_filters');

/* ── Title and description ─────────────────────────────────────────── */

/** Whether Yoast or Rank Math is installed to write titles and descriptions. */
function anew_seo_plugin_active(): bool
{
    return defined('WPSEO_VERSION') || class_exists('RankMath');
}

// inc/header.php works out the title the way it always has and leaves it in
// $GLOBALS['anew_document_title'] just before wp_head().
add_filter('pre_get_document_title', static function (string $title): string {
    return $GLOBALS['anew_document_title'] ?? $title;
}, 10);

// With an SEO plugin installed, the template's title and description stay the
// default; anything typed into the plugin's own fields for a page wins.
foreach (['wpseo_title', 'wpseo_opengraph_title', 'rank_math/frontend/title'] as $hook) {
    add_filter($hook, static function ($title) {
        return anew_seo_has_custom('title') ? $title : ($GLOBALS['anew_document_title'] ?? $title);
    }, 20);
}
foreach (['wpseo_metadesc', 'wpseo_opengraph_desc', 'rank_math/frontend/description'] as $hook) {
    add_filter($hook, static function ($desc) {
        return anew_seo_has_custom('desc') ? $desc : ($GLOBALS['anew_document_description'] ?? $desc);
    }, 20);
}

/** Whether the current page has its own title/description in the SEO plugin. */
function anew_seo_has_custom(string $field): bool
{
    $id = get_queried_object_id();
    if (!$id) {
        return false;
    }
    $keys = $field === 'title'
        ? ['_yoast_wpseo_title', 'rank_math_title']
        : ['_yoast_wpseo_metadesc', 'rank_math_description'];
    foreach ($keys as $key) {
        if (trim((string) get_post_meta($id, $key, true)) !== '') {
            return true;
        }
    }
    return false;
}

/* ── Links: 'about.php' → /about/ ──────────────────────────────────── */

/**
 * Turn one of the site's own hrefs into a WordPress URL. 'index.php#faq' →
 * home + '/#faq'; 'contact.php?interest=tms' → home + '/contact/?interest=tms'.
 * Anything with a scheme, a leading slash or no .php is returned unchanged.
 */
function anew_url(string $href): string
{
    if (!preg_match('~^(?:\./)?([A-Za-z0-9][A-Za-z0-9_-]*)\.php([?#].*)?$~', $href, $m)) {
        return $href;
    }
    $path = $m[1] === 'index' ? '/' : '/' . $m[1] . '/';
    return home_url($path) . ($m[2] ?? '');
}

/**
 * Rewrite a rendered page's internal links and theme-relative asset paths.
 * Matches a quote followed directly by name.php, so full URLs WordPress
 * prints itself (…/wp-login.php, …/xmlrpc.php) are never touched.
 */
function anew_rewrite_links(string $html): string
{
    $home = untrailingslashit(home_url());

    $html = preg_replace_callback(
        '~(["\'])(?:\./)?([A-Za-z0-9][A-Za-z0-9_-]*)\.php(?=["\'#?])~',
        static function (array $m) use ($home): string {
            if (preg_match('~^(?:wp-|admin-|xmlrpc$)~', $m[2])) {
                return $m[0];
            }
            return $m[1] . $home . ($m[2] === 'index' ? '/' : '/' . $m[2] . '/');
        },
        $html
    );

    // Anything that still names assets/ relatively — a hand-written src in
    // a post body, a srcset — points into the theme.
    $theme = get_theme_file_uri('assets/');
    return preg_replace('~(?<=["\'(]|, )(?:\./)?assets/~', $theme, $html);
}

add_action('template_redirect', static function (): void {
    if (is_feed() || is_embed() || is_robots() || (defined('REST_REQUEST') && REST_REQUEST)) {
        return;
    }
    ob_start('anew_rewrite_links');
}, 99);

// Post bodies reach feeds and the REST API without the buffer.
add_filter('the_content', 'anew_rewrite_links', 99);

/* ── Page router ───────────────────────────────────────────────────── */

/**
 * Which shared renderer draws the page with this slug, if any. The data files
 * are keyed by slug, so a new clinic or clinician is a data entry plus a
 * WordPress page with the matching slug — no template file per page.
 *
 * @return array{renderer: string, var: string}|null
 */
function anew_page_kind(string $slug): ?array
{
    $dir = get_theme_file_path('inc/');

    foreach ([
        'data-conditions.php' => ['condition-page.php', 'condition_key'],
        'data-treatments.php' => ['treatment-page.php', 'treatment_key'],
        'data-locations.php'  => ['location-page.php',  'location_key'],
        'data-legal.php'      => ['legal-page.php',     'legal_key'],
    ] as $file => [$renderer, $var]) {
        if (isset((require $dir . $file)[$slug])) {
            return ['renderer' => $renderer, 'var' => $var];
        }
    }

    // Clinicians get a page when they are tagged with a clinic — the same
    // rule the static site used. Leadership without a clinic stays on /team/.
    foreach ((require $dir . 'data-team.php')['people'] as $person) {
        if ($person['slug'] === $slug && !empty($person['clinics'])) {
            return ['renderer' => 'doctor-page.php', 'var' => 'doctor_key'];
        }
    }

    return null;
}

/* ── Blog ──────────────────────────────────────────────────────────── */

/** The original blog index (inc/data-blogs.php), keyed by slug. */
function anew_blog_data(): array
{
    static $by_slug = null;
    if ($by_slug === null) {
        $by_slug = [];
        foreach (require get_theme_file_path('inc/data-blogs.php') as $entry) {
            $by_slug[$entry['slug']] = $entry;
        }
    }
    return $by_slug;
}

/**
 * A WordPress post in the shape the blog templates read (the shape
 * data-blogs.php used). Post meta written by the importer comes first; the
 * original data entry fills anything missing.
 */
function anew_blog_entry(WP_Post $post): array
{
    $orig  = anew_blog_data()[$post->post_name] ?? [];
    $meta  = static fn (string $key): string => (string) get_post_meta($post->ID, $key, true);
    $terms = get_the_category($post->ID);
    $thumb = get_the_post_thumbnail_url($post, 'full');

    $hero = $thumb ?: ($meta('_anew_hero_image') ?: ($orig['hero_image'] ?? ''));
    $alt  = $thumb ? (string) get_post_meta((int) get_post_thumbnail_id($post), '_wp_attachment_image_alt', true) : '';

    // The templates escape on output, so titles and excerpts are taken as
    // plain text: get_the_title() and get_the_excerpt() return HTML entities.
    $plain = static fn (string $html): string => html_entity_decode(wp_strip_all_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');

    return [
        'slug'             => $post->post_name,
        'href'             => get_permalink($post),
        'title'            => $plain(get_the_title($post)),
        'meta_title'       => $orig['meta_title'] ?? $plain(get_the_title($post)),
        'meta_description' => $orig['meta_description'] ?? $plain(get_the_excerpt($post)),
        'publish_date'     => get_the_date('F j, Y', $post),
        'date_iso'         => get_the_date('Y-m-d', $post),
        'category'         => $terms ? $terms[0]->name : ($orig['category'] ?? 'Mental Health'),
        'read_time'        => $meta('_anew_read_time') ?: ($orig['read_time'] ?? ''),
        'hero_image'       => $hero,
        'image_alt'        => $alt ?: ($orig['image_alt'] ?? ''),
        'excerpt'          => $plain(has_excerpt($post) ? get_the_excerpt($post) : ($orig['excerpt'] ?? get_the_excerpt($post))),
        'takeaway'         => $meta('_anew_takeaway') ?: ($orig['takeaway'] ?? ''),
    ];
}

/**
 * Every published post, newest first, as blog entries. Until the posts have
 * been imported this is inc/data-blogs.php, so /blogs/ is never empty.
 */
function anew_blog_index(): array
{
    $cached = get_transient('anew_blog_index');
    if (is_array($cached)) {
        return $cached;
    }

    $posts = get_posts([
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ]);
    $index = $posts ? array_map('anew_blog_entry', $posts) : array_values(anew_blog_data());

    set_transient('anew_blog_index', $index, DAY_IN_SECONDS);
    return $index;
}

// /blogs/ paginates with ?page=N (its links and its script both build that
// URL). WordPress treats ?page= on a Page as a <!--nextpage--> split,
// declares the page past its last split a 404, then "corrects" it back to
// /blogs/ — so the blog index is exempt from both.
add_filter('pre_handle_404', static function ($handled, WP_Query $query) {
    return $query->is_page('blogs') && $query->get('page') ? true : $handled;
}, 10, 2);
add_filter('redirect_canonical', static function ($redirect) {
    return is_page('blogs') && get_query_var('page') ? false : $redirect;
});

function anew_flush_caches(): void
{
    delete_transient('anew_blog_index');
    delete_transient('anew_search_index');
}
add_action('save_post', 'anew_flush_caches');
add_action('deleted_post', 'anew_flush_caches');
add_action('switch_theme', 'anew_flush_caches');

/* ── Redirects from the old site ───────────────────────────────────── */

add_action('template_redirect', static function (): void {
    $path = (string) parse_url((string) ($_SERVER['REQUEST_URI'] ?? ''), PHP_URL_PATH);
    $base = (string) parse_url(home_url('/'), PHP_URL_PATH);
    if ($base !== '/' && str_starts_with($path, $base)) {
        $path = substr($path, strlen($base) - 1);
    }
    $path = ltrim(rawurldecode($path), '/');
    if ($path === '') {
        return;
    }

    foreach (require get_theme_file_path('inc/data-redirects.php') as $pattern => $target) {
        if (!preg_match('~' . $pattern . '~i', $path)) {
            continue;
        }
        if (!preg_match('~^https?://~', $target)) {
            $target = home_url($target === '/' ? '/' : user_trailingslashit($target));
        }
        // Like Apache: the old query string carries over unless the target has one.
        $query = (string) ($_SERVER['QUERY_STRING'] ?? '');
        if ($query !== '' && !str_contains($target, '?')) {
            $target .= '?' . $query;
        }
        wp_redirect($target, 301, 'Anew Era');
        exit;
    }
}, 1);

/* ── Footer search ─────────────────────────────────────────────────── */

/**
 * The rows the footer search reads: every page from inc/search-pages.json
 * (title, description and headings, captured from the rendered pages by
 * build.php --index-only) plus every published post, read live.
 */
function anew_search_index(): array
{
    $cached = get_transient('anew_search_index');
    if (is_array($cached)) {
        return $cached;
    }

    $rows = [];
    $json = json_decode((string) file_get_contents(get_theme_file_path('inc/search-pages.json')), true) ?: [];
    foreach ($json as $row) {
        $row['url'] = anew_url($row['url']);
        $rows[]     = $row;
    }
    foreach (anew_blog_index() as $entry) {
        $rows[] = [
            'url'   => anew_url((string) $entry['href']),
            'title' => $entry['title'],
            'desc'  => $entry['meta_description'] ?: $entry['excerpt'],
            'heads' => $entry['title'],
        ];
    }

    set_transient('anew_search_index', $rows, DAY_IN_SECONDS);
    return $rows;
}

add_action('rest_api_init', static function (): void {
    register_rest_route('anew/v1', '/search-index', [
        'methods'             => 'GET',
        'permission_callback' => '__return_true',
        'callback'            => static fn () => rest_ensure_response(anew_search_index()),
    ]);
});

/* ── Contact form ──────────────────────────────────────────────────── */

/**
 * The contact page posts here (admin-post.php, action=anew_contact). The
 * message is emailed to the intake address and is NOT stored in the database.
 *
 * ⚠ HIPAA: the form asks people not to include medical detail, but some will.
 * Plain wp_mail() is not an encrypted channel. Before launch, route this to
 * the practice's HIPAA-compliant intake (a BAA-covered form service or CRM
 * endpoint), or at minimum send through an SMTP provider with a BAA. Set the
 * recipient under Settings → General → "Contact form recipient".
 */
function anew_handle_contact(): void
{
    $back = home_url('/contact/');

    // The honeypot: people never see it, bots fill it in. Pretend it worked.
    if (!empty($_POST['parent-middle-name'])) {
        wp_safe_redirect(add_query_arg('sent', '1', $back));
        exit;
    }

    $field = static fn (string $key): string => sanitize_text_field(wp_unslash((string) ($_POST[$key] ?? '')));
    $email = sanitize_email(wp_unslash((string) ($_POST['email'] ?? '')));

    if ($field('first-name') === '' || $field('last-name') === '' || !is_email($email) || $field('phone') === '' || empty($_POST['consent'])) {
        // The browser enforces these fields first, so only a bot or a
        // stripped-down client gets here; send them back to the form.
        wp_safe_redirect($back);
        exit;
    }

    $lines = [
        'Name'      => $field('first-name') . ' ' . $field('last-name'),
        'Email'     => $email,
        'Phone'     => $field('phone'),
        'Clinic'    => $field('clinic'),
        'Asking about' => $field('interest'),
        'Insurance' => $field('insurer'),
        'Message'   => sanitize_textarea_field(wp_unslash((string) ($_POST['message'] ?? ''))),
    ];
    $body = '';
    foreach ($lines as $label => $value) {
        $body .= $label . ': ' . ($value !== '' ? $value : '—') . "\n";
    }

    $to = get_option('anew_contact_to') ?: get_option('admin_email');
    wp_mail($to, 'Website enquiry — ' . $lines['Name'], $body, ['Reply-To: ' . $lines['Name'] . ' <' . $email . '>']);

    wp_safe_redirect(add_query_arg('sent', '1', $back));
    exit;
}
add_action('admin_post_nopriv_anew_contact', 'anew_handle_contact');
add_action('admin_post_anew_contact', 'anew_handle_contact');

add_action('admin_init', static function (): void {
    register_setting('general', 'anew_contact_to', ['type' => 'string', 'sanitize_callback' => 'sanitize_email']);
    add_settings_field('anew_contact_to', 'Contact form recipient', static function (): void {
        printf(
            '<input type="email" name="anew_contact_to" class="regular-text" value="%s" placeholder="%s"><p class="description">Where the contact page’s messages are emailed. Blank uses the administration email.</p>',
            esc_attr((string) get_option('anew_contact_to')),
            esc_attr((string) get_option('admin_email'))
        );
    }, 'general');
});
