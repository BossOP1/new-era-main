const fs = require('fs');

const posts = JSON.parse(fs.readFileSync('all_145_posts.json', 'utf8'));

let contentImgs = [];
posts.forEach(p => {
  const matches = [...p.content.rendered.matchAll(/<img[^>]+src=["']([^"']+)["']/gi)];
  if (matches.length > 0) {
    contentImgs.push({ slug: p.slug, count: matches.length, srcs: matches.map(m => m[1]) });
  }
});
console.log('Posts with images in content:', contentImgs.length);
console.log('Sample content images:');
console.log(contentImgs.slice(0, 5));
