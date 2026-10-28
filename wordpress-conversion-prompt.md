# WordPress Conversion Prompt: Anew Era TMS & Psychiatry

Convert this project into a custom WordPress theme named **`anew-era-theme`**. The live domain is **aneweratms.com**. Every URL that ranks today has to keep ranking after the switch.

Read these files before you write any code: `README.md`, `build.php` (the full page list), `.htaccess` (the 301 map from the old WordPress site), `includes/config.php`, `includes/functions.php`, `includes/header.php` and `includes/footer.php`.

---

## 0. What this project actually is (read first)

This is **not** a folder of static HTML pages. It is a PHP site that is rendered to static HTML at build time:

- **Copy lives in data files, not in templates.** `includes/data-*.php` holds the conditions, treatments, locations, team, FAQs, insurance, reviews, legal text and the blog index. Shared renderers in `includes/` turn that data into pages: `condition-page.php`, `treatment-page.php`, `location-page.php`, `doctor-page.php`, `legal-page.php` and `blog-post.php`.
- **Most root `.php` files are 3-line stubs.** Each one sets a key and requires a renderer, for example `$location_key = 'allen'; require 'includes/location-page.php';`.
- **Links are relative `.php` hrefs** (`about.php`, `contact.php?interest=tms`, `index.php#faq`). `build.php` rewrites them to `.html`, and `.htaccess` serves them as clean URLs (`/about`).
- **Assets go through `asset()`**, which adds a `?v=filemtime` cache-buster.
- **Styling is Tailwind v3**, compiled to `assets/css/tailwind.css` from `src/input.css`. The theme tokens are in `assets/js/tailwind.config.js`.
- **Nav and mega-menus are built from `includes/config.php`** (`nav` and `menus`), not from a WordPress menu.

**Keep this architecture.** Do not copy data-file content by hand into templates, and do not turn the data files into hard-coded HTML. The WordPress templates should be thin wrappers that call the existing renderers, as the current stubs do.

---

## 1. Theme setup and global files

Folder: `wp-content/themes/anew-era-theme/`

```
anew-era-theme/
├── style.css               # theme header comment only (Theme Name: Anew Era Theme)
├── functions.php
├── header.php              # from includes/header.php
├── footer.php              # from includes/footer.php
├── front-page.php          # from index.php
├── page.php                # fallback: the_content()
├── single.php              # blog post, from includes/blog-post.php
├── index.php               # required fallback
├── 404.php
├── inc/                    # everything from includes/ except header.php and footer.php
│   ├── config.php  data*.php  functions.php  init.php
│   ├── condition-page.php  treatment-page.php  location-page.php
│   ├── doctor-page.php  legal-page.php  reviews-section.php
├── assets/                 # copied from assets/, minus the excluded folders below
├── src/input.css
├── tailwind.config.js      # content globs updated to the theme paths
└── package.json
```

**Never ship these in the theme or upload them to the server:**
- `assets/reviews_list/`: the raw review export. It contains full reviewer names, emails and minors' details (PII).
- `assets/booking-links/*.xlsx`
- `uploads/` (another practice's screenshots), `dist/`, `node_modules/`, `build.php`, `netlify.toml`, `search-index.php`, `all_145_posts.json` (import input only), `Anew Era Homepage.dc.html`, `support.js`, `image-slot.js`, `_ds/`, `hero-options/`, `tools/`
- `index2.php` and `depression-short.php` are comparison variants and are not published.

**header.php**
- Port `includes/header.php`. Add `wp_head()` before `</head>`, `body_class()` on `<body>` and `wp_body_open()` right after it.
- Remove the hard-coded `<title>`. `functions.php` supplies the title through `add_theme_support('title-tag')` and a `pre_get_document_title` filter that uses `$page_title`, falling back to the current format (`{Page} · Anew Era Health`).
- Output the meta description only when no SEO plugin is active. If Yoast or Rank Math is installed, let the plugin own the title and description, and pre-fill its fields from the data files (see §5).
- Remove the Tailwind Play CDN fallback (`cdn.tailwindcss.com`). Production always loads the compiled CSS.
- Move the stylesheet and font `<link>` tags into `wp_enqueue_*` (see functions.php below). Keep `font_faces()` as inline CSS.

**footer.php**
- Port `includes/footer.php` and add `wp_footer()` before `</body>`.
- Move the script tags into `wp_enqueue_script`.

**Variable scope (important):** `get_header()` and `get_footer()` load their files inside a function, so variables a template sets (`$page_title`, `$page_description`, `$header_solid`, `$header_inset`, `$header_hero_light`) are **not** visible in header.php. Pass them with `get_header(null, [...])` and read them from `$args`, or store them in a single global array that header.php reads. Do the same for `$site` and the other values `init.php` sets up.

**functions.php**
- `add_theme_support('title-tag')`, `add_theme_support('post-thumbnails')` and `add_theme_support('html5', [...])`.
- Enqueue the following, versioned by `filemtime()`:
  - `assets/css/tailwind.css`
  - the Google Fonts URL that header.php loads today (Manrope and Montserrat)
  - `assets/js/main.js` in the footer, deferred
- `register_nav_menus(['primary' => 'Primary Menu'])` for future use. The rendered nav keeps reading `config.php`, because the mega-menus (locations by region, featured cards, icons) don't map onto `wp_nav_menu()`.
- `require` the files in `inc/`.
- Rewrite `asset($path)` to return `get_theme_file_uri($path) . '?v=' . filemtime(get_theme_file_path($path))`. Every image path in the data files (`assets/img/...`) already goes through `asset()`. Grep for any raw `src="assets/` or `url(assets/` that skips it and route it through `asset()`.
- Add `anew_url(string $href): string` (see §4).
- Remove WordPress clutter the design doesn't use: emoji scripts, oEmbed discovery, `wp-block-library` CSS on non-post pages, and the RSD and wlwmanifest links.

---

## 2. Core page templates (bespoke layouts)

Create each WordPress **Page** with the exact slug below and save the matching template file. WordPress picks `page-{slug}.php` automatically, so no Template Name header is needed.

| Page | Current source | WP slug → URL | Template file |
|---|---|---|---|
| Homepage | `index.php` | `/` (Settings → Reading → static front page) | `front-page.php` |
| About | `about.php` | `/about/` | `page-about.php` |
| Meet Our Team | `team.php` | `/team/` | `page-team.php` (keeps its bio modal) |
| Treatments hub | `treatments.php` | `/treatments/` | `page-treatments.php` |
| Conditions hub | `conditions.php` | `/conditions/` | `page-conditions.php` |
| TMS Therapy | `tms.php` | `/tms/` | `page-tms.php` |
| Magstim Horizon | `magstim-horizon.php` | `/magstim-horizon/` | `page-magstim-horizon.php` |
| Depression | `depression.php` (long edition) | `/depression/` | `page-depression.php` |
| Insurance | `insurance.php` | `/insurance/` | `page-insurance.php` |
| FAQ | `faq.php` | `/faq/` | `page-faq.php` |
| Contact | `contact.php` | `/contact/` | `page-contact.php` |
| PHQ-9 Screening | `phq9.php` | `/phq9/` | `page-phq9.php` |
| Reviews | `reviews.php` | `/reviews/` | `page-reviews.php` |
| Blog index | `blogs.php` | `/blogs/` | `page-blogs.php` (WP_Query loop, see §5) |

Each template keeps the markup of its source file and replaces `require __DIR__ . '/includes/header.php'` with `get_header(null, [...])` and the footer require with `get_footer()`.

---

## 3. Data-driven templates (one template per kind, keyed by slug)

These pages share a renderer, so **don't** write one file per page. Write one template per kind. It reads the page slug, sets the key the renderer expects, and requires the renderer from `inc/`:

```php
<?php
/* Template Name: Location */
$location_key = get_post_field('post_name', get_queried_object_id());
require get_theme_file_path('inc/location-page.php');
```

If the slug has no entry in the data file, return a proper 404 (`status_header(404)` plus the 404 template). Don't `exit('Article not found.')`.

| Template file | Template Name | Renderer | Key var | Pages (slug = WP slug) |
|---|---|---|---|---|
| `template-condition.php` | Condition | `condition-page.php` | `$condition_key` | anxiety, postpartum, ptsd, migraines, ocd |
| `template-treatment.php` | Treatment | `treatment-page.php` | `$treatment_key` | psychiatry, therapy, telepsychiatry, adolescent, spravato |
| `template-location.php` | Location | `location-page.php` | `$location_key` | **California:** huntington-beach, newport-beach, laguna-hills, orange, torrance, long-beach, west-los-angeles. **Austin:** central-austin, cedar-park, westlake. **Dallas:** central-dallas, allen, grapevine. **Houston:** cypress, the-woodlands |
| `template-clinician.php` | Clinician | `doctor-page.php` | `$doctor_key` | the 40 clinician slugs in `build.php` (priti-bhardwaj … samantha-rodriguez-zuniga) |
| `template-legal.php` | Legal | `legal-page.php` | `$legal_key` | privacy, hipaa, terms, accessibility |

Generate the full list of pages, slugs and assigned templates from `build.php`'s `$pages` array. Don't type it out by hand. Then create the pages with WP-CLI (`wp post create --post_type=page --post_name=… --post_title=… --meta_input='{"_wp_page_template":"template-location.php"}'`). The page body stays empty, because the content comes from the data files.

Keep the JSON-LD that `location-page.php` and `doctor-page.php` print. If an SEO plugin is active, turn off that plugin's schema output on these templates so the schema isn't duplicated.

---

## 4. Links, assets and SEO-safe URLs

**Permalinks:** Settings → Permalinks → **Post name** (`/%postname%/`). The old WordPress site used trailing-slash URLs (`/therapy/`, `/faq/`, `/dexter-jones/`), and those are the URLs Google has indexed, so WordPress's trailing-slash canonical is the right one. The current static site's no-slash URLs (`/about`) will 301 to `/about/` through `redirect_canonical()` without any extra work.

**Internal links:** don't hand-edit hundreds of hrefs. Add one helper and send every internal href through it:

```php
function anew_url(string $href): string
// 'about.php'                → home_url('/about/')
// 'index.php' / 'index.php#faq' → home_url('/') / home_url('/#faq')
// 'contact.php?interest=tms' → home_url('/contact/?interest=tms')
// 'tel:', 'mailto:', 'https://', '#anchor' → unchanged
```

Apply it wherever hrefs are printed: header and footer nav (from `config.php` `nav` and `menus`), every `'href' =>` value in the data files, and literal `href="something.php"` in the templates. Grep for `\.php["'#?]` afterwards. No `.php` link should be left in any rendered page.

**Current-page highlighting:** `current_page()` and `nav_is_current()` compare the request to a `.php` filename. Rewrite them to compare against the queried page's slug so the active dot in the nav still works.

**Blog post content:** `includes/posts/*.html` links with `.php` hrefs (`index.php`, `contact.php`, `tms.php`, other post slugs). Rewrite these to `/slug/` URLs at import time. One target, `conditions-treated.php` (24 links), doesn't exist. Point it at `/conditions/`.

**Redirects (most important for rankings):** `.htaccess` section 2 holds about 170 301 rules from old WordPress URLs to the new pages, including departed clinicians → `/team/`, `/blog/` → `/blogs/` and `/privacy-policy/` → `/privacy/`. Port every one of them into the **Redirection** plugin (import them as CSV), or put them in `.htaccess` above `# BEGIN WordPress`. Change each target to its trailing-slash form, so every redirect is a single hop to a final 200. Drop sections 3–5 of the current `.htaccess` (the `.html` stripping, no-trailing-slash and `.html` serving rules), because WordPress handles routing now. Keep the https/no-www rule and the security headers.

---

## 5. Blog: 156 posts become real WordPress posts

The blog index is `includes/data-blogs.php` (156 entries, each with `slug`, `title`, `meta_title`, `meta_description`, `publish_date`, `date_iso`, `category`, `read_time`, `hero_image`, `image_alt`, `excerpt`, `takeaway`).
- 145 bodies are in `includes/posts/{slug}.html`.
- About 11 posts are hand-built full files at the root, for example `can-tms-cause-anxiety.php`, `how-long-does-tms-take-to-work.php`, `does-ocd-get-worse-with-age.php`, `cost-of-tms-therapy-without-insurance.php`, `is-adhd-a-disability.php`, `does-tricare-cover-tms-therapy.php`, `who-is-eligible-for-tms-therapy.php` and `is-tms-therapy-legitimate.php`. Extract the article body from these.

Write a WP-CLI import script (`wp eval-file import-posts.php`) that, for each entry:
- creates a `post` with `post_name = slug` (exact), `post_title = title`, `post_date = date_iso`, `post_excerpt = excerpt`, `post_status = publish`
- sets the body to the HTML file, with internal links rewritten (§4)
- creates or assigns the `category`
- sideloads `hero_image` as the featured image, with `image_alt` as its alt text
- stores `read_time` and `takeaway` as post meta
- writes `meta_title` and `meta_description` into the SEO plugin's fields (`_yoast_wpseo_title` / `_yoast_wpseo_metadesc`, or Rank Math's `rank_math_title` / `rank_math_description`)
- is idempotent: re-running it updates posts and doesn't create duplicates

With `/%postname%/`, posts live at the root (`/what-is-mdd-disorder/`), the same as today. **Check for slug collisions** between posts and pages (both live at the root) before you import, and report any you find.

**`single.php`:** port `includes/blog-post.php` and run it on `the_post()`. Use `get_the_title()`, `get_the_content()` (through `apply_filters('the_content', …)`), the featured image, and the meta above. Keep the hero, read time, takeaway box, related posts and CTA. Keep the `$header_hero_light` and `$header_inset` header mode.

**`page-blogs.php`:** port `blogs.php` with a `WP_Query` / `while (have_posts())` loop for the cards and category filter, plus `paginate_links()` if it paginates. Don't set this page as the WordPress "Posts page", because the template controls the layout.

**Tailwind:** blog post HTML uses Tailwind classes. Keep `./inc/posts/*.html` (or the exported content) in the `content` globs while you build the CSS. Otherwise those classes get purged once the content lives in the database. Better: add a `safelist` or a one-off content dump so classes used only in post bodies survive.

---

## 6. Features that depend on Netlify or the build, and need a WordPress equivalent

1. **Contact form** (`contact.php`) uses Netlify Forms (`data-netlify`, honeypot `parent-middle-name`, `action="/contact?sent=1"`). Replace it with a form handler (`admin-post.php` handler, or Gravity Forms / WPForms) that keeps the current markup, field names, the honeypot, the `?interest=` pre-select and the `?sent=1` thank-you state. **This is a healthcare practice:** don't store submissions in plain WordPress tables or email them unencrypted if they can contain health information. Flag this to the client and use a HIPAA-eligible form or CRM endpoint.
2. **Footer site search** (`main.js` fetches `search-index.json`, then `search-index.php`). Replace it with a REST route `/wp-json/anew/v1/search-index` that returns the same JSON shape `build.php --index-only` produces (pages and posts, with title, URL and text). Cache it in a transient that is cleared on `save_post`. Pass the URL to `main.js` with `wp_localize_script` and remove the two old fallback URLs.
3. **Zocdoc booking links** by region (`config.php` `zocdoc_regions`): no change needed, just confirm they render on the location and clinician pages.
4. **PHQ-9** is client-side JavaScript. Confirm it works and that no answers are sent to the server.

---

## 7. SEO preservation checklist

- Install Yoast or Rank Math. Let it generate `sitemap_index.xml`, canonicals and Open Graph tags, and submit the sitemap in Search Console.
- Pre-fill the SEO title and description for every **page** from the data files (each data entry has its own title and description; `header.php`'s default description is the fallback), and for every **post** from `meta_title` / `meta_description`.
- Keep the H1/H2 structure, image alt text and on-page copy exactly as they are. This is a platform move, not a content rewrite.
- Check `robots.txt` and make sure "Discourage search engines" is **off** at launch.
- **Verification before DNS cutover:**
  - Crawl every URL in the old WordPress sitemap (aneweratms.com/sitemap_index.xml) and every page in `build.php`. Each should return 200, or a single 301 to a 200.
  - Compare the titles and meta descriptions with the current site.
  - Check that no rendered page contains a `.php` or `.html` internal link.
  - Visually spot-check the homepage, one condition, treatment, location and clinician page, the team modal, the contact form and a blog post on mobile and desktop.

---

## 8. Final delivery

1. Full code for `style.css`, `functions.php`, `header.php`, `footer.php`, `front-page.php`, `page.php`, `single.php`, `404.php`, the five `template-*.php` files and `page-blogs.php`.
2. The `anew_url()`, `asset()` and `current_page()` rewrites, and the list of files where hrefs were routed through `anew_url()`.
3. `import-posts.php` (WP-CLI) for the 156 posts, and `create-pages.sh` (WP-CLI) that creates every page with its slug and template.
4. The redirect CSV for the Redirection plugin, generated from `.htaccess` section 2.
5. A directory tree of the finished theme.
6. A table of every URL on the current site, showing its WordPress URL, its object type (page, post or redirect) and the template that renders it. Flag every slug collision or URL that changed.
7. A short list of anything you couldn't convert one-to-one, and why.
