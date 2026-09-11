/**
 * Interactive behaviour for the Anew Era homepage.
 * Everything here is progressive enhancement — the page reads fine without it.
 */
(function () {
  'use strict';

  /* Motion ---------------------------------------------------------------
     Two effects, both opt-in from the markup: [data-reveal] fades a block up
     as it comes into view, [data-count] counts a number up when it does. The
     hidden starting state is applied from here rather than in the stylesheet,
     so with JS off the page simply renders finished.

     A reduced-motion preference skips both — blocks stay put, numbers show
     their final value. */
  var wantsMotion = !window.matchMedia
    || !window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  var reveals = document.querySelectorAll('[data-reveal]');
  var counters = document.querySelectorAll('[data-count]');

  if (!('IntersectionObserver' in window) || !wantsMotion) {
    counters.forEach(function (el) { el.textContent = el.dataset.count; });
  } else {

    reveals.forEach(function (el) { el.classList.add('reveal'); });

    var revealObserver = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) {
          return;
        }
        var el = entry.target;
        // Stagger against siblings, so a row of cards arrives in sequence
        // rather than all at once. Capped, or the last card of a long row
        // would lag noticeably behind the first.
        var group = Array.prototype.filter.call(
          el.parentNode ? el.parentNode.children : [],
          function (n) { return n.hasAttribute && n.hasAttribute('data-reveal'); }
        );
        var i = group.indexOf(el);
        el.style.transitionDelay = Math.min(i < 0 ? 0 : i, 5) * 70 + 'ms';
        el.classList.add('is-in');
        obs.unobserve(el);
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.05 });

    reveals.forEach(function (el) { revealObserver.observe(el); });

    // "83%" -> prefix "", number 83, suffix "%"; "5 days" -> suffix " days".
    var parseValue = function (text) {
      var m = String(text).match(/^(\D*?)(\d+(?:\.\d+)?)(.*)$/);
      if (!m) {
        return null;
      }
      return {
        prefix: m[1],
        target: parseFloat(m[2]),
        suffix: m[3],
        decimals: (m[2].split('.')[1] || '').length
      };
    };

    var countObserver = new IntersectionObserver(function (entries, obs) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) {
          return;
        }
        var el = entry.target;
        var parts = parseValue(el.dataset.count);
        obs.unobserve(el);

        if (!parts) {
          el.textContent = el.dataset.count;
          return;
        }

        var duration = 1100;
        var started = null;
        var step = function (now) {
          if (started === null) {
            started = now;
          }
          var p = Math.min((now - started) / duration, 1);
          var eased = 1 - Math.pow(1 - p, 3);            // ease-out cubic
          el.textContent = parts.prefix
            + (parts.target * eased).toFixed(parts.decimals)
            + parts.suffix;
          if (p < 1) {
            requestAnimationFrame(step);
          }
        };
        requestAnimationFrame(step);
      });
    }, { threshold: 0.5 });

    counters.forEach(function (el) {
      el.textContent = parseValue(el.dataset.count)
        ? el.dataset.count.replace(/\d+(\.\d+)?/, '0')
        : el.dataset.count;
      countObserver.observe(el);
    });

    // Two safety nets, because a block that never gets its is-in class is a
    // block the visitor never reads. If anything is still hidden while sitting
    // in the viewport a few seconds in, show it; and print the finished page,
    // not the pre-animation one.
    var revealEverything = function () {
      reveals.forEach(function (el) {
        el.style.transitionDelay = '0ms';
        el.classList.add('is-in');
      });
      counters.forEach(function (el) { el.textContent = el.dataset.count; });
    };

    window.addEventListener('beforeprint', revealEverything);

    setTimeout(function () {
      reveals.forEach(function (el) {
        if (el.classList.contains('is-in')) {
          return;
        }
        var r = el.getBoundingClientRect();
        if (r.top < window.innerHeight && r.bottom > 0) {
          el.classList.add('is-in');
        }
      });
    }, 3000);
  }

  /* Sticky header ---------------------------------------------------------
     The bar is legible by default; this only adds the over-the-hero treatment
     while it is actually on the video. Read inside a rAF so the handler cannot
     run more than once a frame. */
  var siteHeader = document.querySelector('[data-site-header]');

  if (siteHeader && !siteHeader.classList.contains('relative')) {
    var ticking = false;
    var isLight = siteHeader.classList.contains('is-light-hero');

    var syncHeader = function () {
      if (isLight) {
        siteHeader.classList.toggle('is-light-hero', window.scrollY <= 80);
      } else {
        siteHeader.classList.toggle('is-over-hero', window.scrollY <= 80);
      }
      ticking = false;
    };

    window.addEventListener('scroll', function () {
      if (!ticking) {
        ticking = true;
        requestAnimationFrame(syncHeader);
      }
    }, { passive: true });

    syncHeader();
  }

  /* Mobile navigation ---------------------------------------------------- */
  var toggle = document.querySelector('[data-menu-toggle]');
  var menu = document.getElementById('mobile-menu');

  if (toggle && menu) {
    toggle.addEventListener('click', function () {
      var open = menu.classList.toggle('hidden') === false;
      toggle.setAttribute('aria-expanded', String(open));
    });

    menu.addEventListener('click', function (event) {
      if (event.target.closest('a')) {
        menu.classList.add('hidden');
        toggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* Hero video — hold on the poster frame if motion is unwelcome ---------- */
  var heroVideo = document.querySelector('[data-hero-video]');

  if (heroVideo && window.matchMedia) {
    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)');

    var applyMotionPreference = function () {
      if (reduced.matches) {
        heroVideo.pause();
        heroVideo.currentTime = 0;
        heroVideo.removeAttribute('autoplay');
        return;
      }
      // Browsers that refuse autoplay reject this promise; the poster stays up.
      var started = heroVideo.play();
      if (started && started.catch) {
        started.catch(function () {});
      }
    };

    applyMotionPreference();

    if (reduced.addEventListener) {
      reduced.addEventListener('change', applyMotionPreference);
    }
  }

  /* Conditions — hover or click a name to swap the panel ------------------ */
  var conditions = document.querySelector('[data-conditions]');

  if (conditions) {
    var tabs = conditions.querySelectorAll('[data-cond-tab]');
    var panels = conditions.querySelectorAll('[data-cond-panel]');

    var panelBox = conditions.querySelector('.cond-panelbox');

    var showCondition = function (index) {
      tabs.forEach(function (tab) {
        tab.dataset.active = String(tab.dataset.condTab === index);
      });
      panels.forEach(function (panel) {
        panel.dataset.active = String(panel.dataset.condPanel === index);
      });
      // Below lg this slots the panel directly under the tab just chosen. The
      // rule only applies inside the mobile media query, so desktop ignores it.
      if (panelBox) {
        panelBox.style.setProperty('--cond-order', (parseInt(index, 10) * 2) + 1);
      }
    };

    tabs.forEach(function (tab) {
      var select = function () {
        showCondition(tab.dataset.condTab);
      };
      tab.addEventListener('click', select);
      tab.addEventListener('mouseenter', select);
      tab.addEventListener('focus', select);
    });
  }

  /* Reviews — page through in groups of six ------------------------------ */
  var reviews = document.querySelector('[data-reviews]');

  if (reviews) {
    var pages = reviews.querySelectorAll('[data-review-page]');
    var current = 0;
    var sliding = false;

    // Each card carries its own delay, so a page enters as a run of cards
    // rather than all six at once. The delay sits idle until the page gets
    // .is-entering, which is what starts the animation.
    pages.forEach(function (page) {
      Array.prototype.forEach.call(page.querySelectorAll('figure'), function (fig, i) {
        fig.style.animationDelay = i * 55 + 'ms';
      });
    });

    var showPage = function (index, direction) {
      index = (index + pages.length) % pages.length;

      if (sliding || index === current) {
        return;
      }

      var leaving = pages[current];
      var arriving = pages[index];

      if (!wantsMotion) {
        leaving.classList.add('review-off');
        arriving.classList.remove('review-off');
        current = index;
        return;
      }

      sliding = true;

      // Out towards the arrow that was pressed...
      leaving.classList.add(direction > 0 ? 'is-off-left' : 'is-off-right');

      setTimeout(function () {
        leaving.classList.add('review-off');
        leaving.classList.remove('is-off-left', 'is-off-right');

        // ...and in from the far side. The page is placed at its offset while
        // still hidden, then a forced reflow commits that position so the
        // browser animates from it instead of skipping straight to the end.
        arriving.classList.add(direction > 0 ? 'is-off-right' : 'is-off-left');
        arriving.classList.remove('review-off');
        void arriving.offsetWidth;

        arriving.classList.remove('is-off-left', 'is-off-right');
        arriving.classList.add('is-entering');

        current = index;

        setTimeout(function () {
          arriving.classList.remove('is-entering');
          sliding = false;
        }, 700);
      }, 300);
    };

    var prev = reviews.querySelector('[data-review-prev]');
    var next = reviews.querySelector('[data-review-next]');

    if (prev) {
      prev.addEventListener('click', function () {
        showPage(current - 1, -1);
      });
    }
    if (next) {
      next.addEventListener('click', function () {
        showPage(current + 1, 1);
      });
    }
  }

  /* FAQ — category tabs, plus one-open-at-a-time accordion --------------- */
  var faq = document.querySelector('[data-faq]');

  if (faq) {
    var faqTabs = faq.querySelectorAll('[data-faq-tab]');
    var groups = faq.querySelectorAll('[data-faq-group]');

    faqTabs.forEach(function (tab) {
      tab.addEventListener('click', function () {
        var index = tab.dataset.faqTab;

        faqTabs.forEach(function (other) {
          other.dataset.active = String(other.dataset.faqTab === index);
        });

        groups.forEach(function (group) {
          var isCurrent = group.dataset.faqGroup === index;
          group.hidden = !isCurrent;

          // Reset the group back to its first question open.
          group.querySelectorAll('details').forEach(function (item, i) {
            item.open = isCurrent && i === 0;
          });
        });
      });
    });

    faq.querySelectorAll('details').forEach(function (item) {
      item.addEventListener('toggle', function () {
        if (!item.open) {
          return;
        }
        var group = item.closest('[data-faq-group]');
        if (!group) {
          return;
        }
        group.querySelectorAll('details').forEach(function (other) {
          if (other !== item) {
            other.open = false;
          }
        });
      });
    });
  }
})();
