/**
 * Interactive behaviour for the Anew Era homepage.
 * Everything here is progressive enhancement — the page reads fine without it.
 */
(function () {
  'use strict';

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

    var showCondition = function (index) {
      tabs.forEach(function (tab) {
        tab.dataset.active = String(tab.dataset.condTab === index);
      });
      panels.forEach(function (panel) {
        panel.dataset.active = String(panel.dataset.condPanel === index);
      });
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

    var showPage = function (index) {
      current = (index + pages.length) % pages.length;
      pages.forEach(function (page, i) {
        page.classList.toggle('hidden', i !== current);
      });
    };

    var prev = reviews.querySelector('[data-review-prev]');
    var next = reviews.querySelector('[data-review-next]');

    if (prev) {
      prev.addEventListener('click', function () {
        showPage(current - 1);
      });
    }
    if (next) {
      next.addEventListener('click', function () {
        showPage(current + 1);
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
