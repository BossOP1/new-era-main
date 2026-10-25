const fs = require('fs');
const path = require('path');

async function downloadImages() {
  const posts = JSON.parse(fs.readFileSync('all_145_posts.json', 'utf8'));
  const headers = {
    'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36'
  };

  const blogImgDir = path.join(__dirname, '..', 'assets', 'img', 'blog');
  if (!fs.existsSync(blogImgDir)) {
    fs.mkdirSync(blogImgDir, { recursive: true });
  }

  // Known manual images for the 4 posts without standard featuredmedia
  const manualImages = {
    'depression-this-holiday-season-2': 'https://aneweratms.com/wp-content/uploads/2021/11/holiday-depression.jpg',
    'anew-era-brings-tms-therapy-to-dallas-tx': 'https://aneweratms.com/wp-content/uploads/2021/07/Breanna_016-1-214x300.jpg',
    'theta-burst-maintenance-therapy-for-depression': 'assets/img/blog/how-long-does-tms-take-to-work.jpg',
    'ect-treatment-tms-therapy': 'assets/img/blog/is-tms-therapy-legitimate.jpg'
  };

  console.log(`Starting image processing for ${posts.length} posts...`);
  let downloaded = 0;
  let skipped = 0;
  let failed = 0;

  // Process with concurrency of 5
  const concurrency = 6;
  const queue = [...posts];

  async function worker(workerId) {
    while (queue.length > 0) {
      const post = queue.shift();
      const slug = post.slug;
      
      let imgUrl = post._embedded?.['wp:featuredmedia']?.[0]?.source_url;
      if (!imgUrl && manualImages[slug]) {
        imgUrl = manualImages[slug];
      }

      if (!imgUrl) {
        console.log(`[Worker ${workerId}] No image URL for ${slug}`);
        skipped++;
        continue;
      }

      if (imgUrl.startsWith('assets/')) {
        // already local reference
        skipped++;
        continue;
      }

      try {
        const parsedUrl = new URL(imgUrl);
        const ext = path.extname(parsedUrl.pathname) || '.jpg';
        const localFilename = `${slug}${ext}`;
        const localFilePath = path.join(blogImgDir, localFilename);

        if (fs.existsSync(localFilePath) && fs.statSync(localFilePath).size > 1000) {
          // Already downloaded
          skipped++;
          continue;
        }

        const res = await fetch(imgUrl, { headers });
        if (!res.ok) {
          console.warn(`[Worker ${workerId}] Failed to fetch ${imgUrl}: status ${res.status}`);
          failed++;
          continue;
        }

        const arrayBuffer = await res.arrayBuffer();
        const buffer = Buffer.from(arrayBuffer);
        fs.writeFileSync(localFilePath, buffer);
        downloaded++;
        if (downloaded % 15 === 0 || queue.length === 0) {
          console.log(`Progress: ${downloaded} downloaded, ${skipped} skipped, ${failed} failed. Remaining: ${queue.length}`);
        }
      } catch (err) {
        console.error(`[Worker ${workerId}] Error downloading image for ${slug}: ${err.message}`);
        failed++;
      }
    }
  }

  const workers = Array.from({ length: concurrency }, (_, i) => worker(i + 1));
  await Promise.all(workers);

  console.log(`Finished image processing! Total downloaded: ${downloaded}, skipped: ${skipped}, failed: ${failed}`);
}

downloadImages().catch(err => {
  console.error('DownloadImages crashed:', err);
  process.exit(1);
});
