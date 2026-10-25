const fs = require('fs');

async function check4() {
  const slugs = [
    'depression-this-holiday-season-2',
    'anew-era-brings-tms-therapy-to-dallas-tx',
    'theta-burst-maintenance-therapy-for-depression',
    'ect-treatment-tms-therapy'
  ];
  for (const slug of slugs) {
    const url = 'https://aneweratms.com/' + slug + '/';
    try {
      const res = await fetch(url, { headers: { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64)' } });
      const html = await res.text();
      const ogMatch = html.match(/property=["']og:image["']\s+content=["']([^"']+)["']/i);
      const imgMatch = html.match(/<img[^>]+src=["']([^"']+)["']/i);
      console.log(slug, 'og:image:', ogMatch ? ogMatch[1] : null, 'first img:', imgMatch ? imgMatch[1] : null);
    } catch (e) {
      console.log(slug, 'error:', e.message);
    }
  }
}
check4();
