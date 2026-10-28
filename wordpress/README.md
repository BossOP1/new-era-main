# Anew Era — WordPress theme

`anew-era-theme/` is the whole site as a WordPress theme. It is a separate copy: nothing outside this folder was changed, and the static Netlify site still builds from the project root exactly as before.

## Install

1. **Zip the theme** from this folder:
   ```bash
   cd wordpress && zip -rq anew-era-theme.zip anew-era-theme -x '*.DS_Store'
   ```
   The zip is about 75 MB, mostly photography. If the host's upload limit is lower, upload the `anew-era-theme` folder to `wp-content/themes/` over SFTP or the file manager instead.
2. **Activate it** in Appearance → Themes.
3. **Run the setup** in Tools → **Anew Era setup**, in order:
   1. *Create pages and settings*: creates the 82 pages with their exact slugs, sets the static front page, switches permalinks to `/%postname%/`, closes comments, and trashes WordPress's sample post and page if they haven't been edited.
   2. *Import blog posts*: creates the 156 articles with their original slugs, dates, categories, excerpts, read times and takeaways. It also writes each post's SEO title and description into the Yoast and Rank Math fields.
   3. *Import featured images* (optional): copies each article's hero photo into the media library.

   Each step can be run again safely. Pages and posts are matched by slug and updated, never duplicated. With a shell you can run `wp anew setup` and `wp anew import-posts --images` instead.
4. Set **Settings → General → Contact form recipient** (see the HIPAA note below).
5. Install Yoast or Rank Math if you want one. The theme already gives every page the same title and description as the current site, and either plugin takes over cleanly. Anything typed into the plugin's fields for a page overrides the theme's default.

## How it works

- `inc/` is the old `includes/`: same data files, same renderers. Copy is still edited in `inc/data-*.php`.
- Bespoke pages are `page-{slug}.php` files (about, team, TMS and so on), and WordPress picks them automatically by slug. Conditions, treatments, clinics, clinicians and legal pages all go through `page.php`, which looks the slug up in the data files. A new clinic or clinician is therefore a data entry plus a WordPress page with the matching slug.
- Templates still link to each other as `about.php`. An output filter (`anew_rewrite_links()` in `functions.php`) turns those into `/about/` links when the page is served, the same job `build.php` did for the static build.
- Blog posts are real WordPress posts and can be edited in the admin. Each body is a single Custom HTML block, so its Tailwind markup survives the editor. The 11 hand-built articles (tables, callouts) still render from `inc/posts-custom/{slug}.php`; edit those files, not the post body.
- The 168 old-site 301 redirects are in `inc/data-redirects.php`, and the theme applies them itself, so they work on Apache, LiteSpeed or nginx. The static site's rules that redirected `wp-admin`, `wp-json`, feeds and archives to the homepage were removed on purpose, because on WordPress they would lock you out.
- Footer search reads `/wp-json/anew/v1/search-index`. Pages come from `inc/search-pages.json`, captured from the current build; posts are read live.

## Before launch

- **HIPAA: the contact form.** It now emails the intake address through `wp_mail()` and stores nothing in the database. Plain email isn't an encrypted channel, and some people will type health details despite the warning on the form. Point the form at a HIPAA-compliant intake service, or at least send mail through an SMTP provider that signs a BAA.
- **One broken link already on the current site:** the post *psychiatric-evaluation-diagnosis-when-you-need-one* links to `assets/img/blog/New-Patient-Paperwork.pdf`, which doesn't exist in the project either. Add the PDF to `anew-era-theme/assets/img/blog/` or remove the link.
- **Old links mapped by judgment.** Nine links inside post bodies pointed at old pages that have neither a page nor a redirect. The importer sends them to the nearest live page (`anew_setup_link_fixes()` in `inc/setup.php`):
  - `home` → `/`
  - `contact-us` → `/contact/`
  - `depression-this-holiday-season` → the `-2` post
  - `evidence-for-the-use-of-tms…` → `/tms/`
  - `psychiatrists` and `psychiatrist-costa-mesa` → `/psychiatry/`
  - `psychiatrist-huntington-beach` → `/huntington-beach/`
  - `therapists` and `therapist-costa-mesa` → `/therapy/`

  Change any of these and re-run the post import.
- Make sure "Discourage search engines" is **off** under Settings → Reading. Then submit the sitemap: WordPress's own `/wp-sitemap.xml`, or the SEO plugin's.

## Changing styles

```bash
cd wordpress/anew-era-theme && npm install && npm run build:css
```
Tailwind scans the theme's own files. Keep `inc/posts/*.html` even after the import, because post-body classes are only found there.

## What was tested

The theme was tested on a scratch WordPress 7.1.3 install (SQLite) with the setup and import run twice, and compared page by page against the original PHP site:

- **All 239 URLs (83 pages, 156 posts)** return 200.
- **81 of the 83 pages** render byte-identical HTML. The other two differ only in the contact form's action and the blog cards' media-library images.
- **Every page's `<title>` and meta description** matches the current site.
- **All 807 internal links and assets** resolve, except the PDF above.
- **All 168 redirects** go to their final page in one hop.
- **The contact form** redirects to `?sent=1`, and the honeypot drops bot submissions silently.
- **Search and pagination:** the search endpoint returns 239 rows, and `/blogs/?page=2` paginates.
- **The PHP error log** has no notices from the theme.
