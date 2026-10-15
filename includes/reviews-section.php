<?php
/**
 * The homepage's reviews block, for a treatment page.
 *
 * Set before including:
 *   $rs_reviews  list of ['quote', 'who'], from $data['treatment_reviews']
 *   $rs_eyebrow  small label above the heading
 *   $rs_heading  the heading
 *   $rs_link     where "Read all" goes, e.g. reviews.php?topic=tms
 *   $rs_link_label  that button's text (optional)
 *   $rs_anchor   scroll-margin classes the page uses on its sections
 *
 * The pager script in assets/js/main.js picks up [data-reviews] on any page.
 * Six cards to a page; the arrows step through the rest.
 */
$review_pages = array_chunk($rs_reviews, 6);
?>
<section id="reviews" class="<?= $rs_anchor ?> px-3 py-3 sm:px-5 sm:py-5 lg:px-8">
  <div class="mx-auto max-w-[1280px] rounded-[28px] bg-[#10202c] bg-reviews-glow px-6 py-12 sm:px-16 lg:py-[56px]" data-reviews>
    <div class="mb-8 flex items-center justify-between gap-6">
      <div>
        <p class="m-0 mb-4 text-xs font-extrabold uppercase tracking-[0.16em] text-brand-green"><?= e($rs_eyebrow) ?></p>
        <h2 class="m-0 text-[28px] leading-[1.1] tracking-[-0.02em] text-white sm:text-4xl"><?= e($rs_heading) ?></h2>
          <div class="mt-3 flex items-center gap-2.5">
            <span class="text-[15px] leading-none tracking-[0.12em] text-brand-orange" aria-hidden="true">★★★★★</span>
            <span class="text-sm font-semibold text-white/70"><?= e(ltrim($site['rating'], '★ ')) ?></span>
          </div>
      </div>
      <?php if (count($review_pages) > 1): ?>
      <div class="flex gap-2.5">
        <button type="button" data-review-prev aria-label="Previous reviews" class="flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-white/40 bg-transparent text-white transition duration-200 active:scale-90 hover:bg-white/15">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true" class="text-brand-blue transition-transform duration-200 group-hover:translate-x-1"><path d="M15 6l-6 6 6 6"></path></svg>
        </button>
        <button type="button" data-review-next aria-label="Next reviews" class="flex h-12 w-12 cursor-pointer items-center justify-center rounded-full border-2 border-white/40 bg-transparent text-white transition duration-200 active:scale-90 hover:bg-white/15">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" aria-hidden="true" class="text-brand-blue transition-transform duration-200 group-hover:translate-x-1"><path d="M9 6l6 6-6 6"></path></svg>
        </button>
      </div>
      <?php endif; ?>
    </div>

    <?php foreach ($review_pages as $page => $reviews): ?>
      <div data-review-page="<?= $page ?>" class="flex snap-x snap-mandatory gap-4 overflow-x-auto pb-3 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden sm:grid sm:snap-none sm:grid-cols-2 sm:gap-5 sm:overflow-visible sm:pb-0 lg:grid-cols-3<?= $page > 0 ? ' review-off' : '' ?>">
        <?php foreach ($reviews as $i => $review): ?>
          <figure class="m-0 flex h-[260px] w-[86%] shrink-0 snap-center flex-col justify-between rounded-[20px] px-7 py-8 sm:w-auto sm:shrink <?= $i % 2 === 0 ? 'bg-surface' : 'bg-white' ?>">
            <blockquote class="m-0 line-clamp-5 text-[17px] leading-[1.5] tracking-[-0.01em] text-ink"><?= e($review['quote']) ?></blockquote>
            <figcaption class="m-0 mt-5 text-sm font-extrabold text-ink"><?= e($review['who']) ?></figcaption>
          </figure>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>

    <div class="mt-10 text-center">
      <a href="<?= e($rs_link) ?>" class="inline-flex items-center rounded-full bg-white px-7 py-4 text-[15px] font-extrabold text-brand-blue transition-colors hover:bg-brand-orange hover:text-white"><?= e($rs_link_label ?? 'Read All the Reviews') ?></a>
    </div>
  </div>
</section>
<?php
// The build renders every page in one process; leave nothing behind for the next.
unset($rs_reviews, $rs_eyebrow, $rs_heading, $rs_link, $rs_link_label, $rs_anchor);
