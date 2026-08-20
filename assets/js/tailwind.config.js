/**
 * Single Tailwind config, shared by two consumers:
 *   1. the Play CDN loaded in includes/header.php (no build step needed)
 *   2. the Tailwind CLI (`npm run build:css`) for a production stylesheet
 */
const anewEraTailwindConfig = {
  content: ['./*.php', './includes/**/*.php', './assets/js/**/*.js'],
  theme: {
    extend: {
      colors: {
        brand: {
          blue: '#0f639b',
          'blue-mid': '#0c5081',
          'blue-dark': '#0a4268',
          sky: '#8fc7e8',
          orange: '#e8922f',
          'orange-dark': '#c97a1f',
          green: '#86be52',
        },
        ink: '#14202b',
        night: '#0b1720',
        surface: '#f7f6f4',
        therapy: '#eaf2f8',
        psych: '#fdf1e4',
        clay: '#8a5a1d',
        'clay-deep': '#7c4f18',
        mist: '#eef6f9',
        cream: '#fdfaf6',
      },
      // Tobias sets the headings and the display moments; Untitled Sans does
      // the reading. Both are Klim retail faces — see assets/fonts/README.md.
      // Manrope and Newsreader stay on as fallbacks so the page never loses
      // its shape while the licensed files are missing.
      fontFamily: {
        sans: ['Untitled Sans', 'Manrope', 'system-ui', 'sans-serif'],
        serif: ['Tobias', 'Newsreader', 'Georgia', 'serif'],
      },
      // Untitled Sans ships Regular, Medium and Bold. The design reaches for
      // extrabold and semibold constantly, so point those at the cuts that
      // exist rather than letting the browser fake a heavier one.
      fontWeight: {
        semibold: '500',
        extrabold: '700',
      },
      backgroundImage: {
        'hero-veil':
          'linear-gradient(180deg, rgba(20,20,20,0.28) 0%, rgba(15,20,25,0.5) 45%, rgba(10,15,20,0.68) 100%), radial-gradient(circle at 15% 90%, rgba(232,146,47,0.22), transparent 55%), radial-gradient(circle at 85% 5%, rgba(134,190,82,0.16), transparent 50%)',
        'glass-bar':
          'linear-gradient(135deg, rgba(255,255,255,0.62), rgba(255,255,255,0.32))',
        'cond-veil':
          'linear-gradient(100deg, rgba(9,20,28,0.7) 0%, rgba(9,20,28,0.35) 55%, rgba(9,20,28,0.1) 100%)',
        'card-veil':
          'linear-gradient(0deg, rgba(9,20,28,0.45) 0%, rgba(9,20,28,0) 55%)',
        'tms-veil':
          'linear-gradient(0deg, rgba(9,20,28,0.9) 0%, rgba(9,20,28,0.55) 45%, rgba(9,20,28,0.15) 75%, rgba(9,20,28,0) 100%), radial-gradient(circle at 90% 10%, rgba(232,146,47,0.18), transparent 50%)',
        'reviews-glow':
          'radial-gradient(circle at 90% -10%, rgba(232,146,47,0.35), transparent 55%), radial-gradient(circle at -10% 110%, rgba(134,190,82,0.3), transparent 55%)',
        'cta-glow':
          'radial-gradient(circle at 8% 15%, rgba(15,99,155,0.85), transparent 42%), radial-gradient(circle at 92% 85%, rgba(15,99,155,0.85), transparent 42%), radial-gradient(circle at 30% 90%, rgba(232,146,47,0.55), transparent 45%), radial-gradient(circle at 75% 10%, rgba(134,190,82,0.5), transparent 45%)',
        'footer-glow':
          'radial-gradient(circle at 90% 0%, rgba(232,146,47,0.16), transparent 45%), radial-gradient(circle at 0% 100%, rgba(134,190,82,0.14), transparent 45%)',
      },
      boxShadow: {
        glass: '0 8px 32px rgba(9,20,28,0.18), inset 0 1px 0 rgba(255,255,255,0.7)',
      },
      keyframes: {
        marquee: {
          from: { transform: 'translateX(0)' },
          to: { transform: 'translateX(-50%)' },
        },
      },
      animation: {
        marquee: 'marquee 34s linear infinite',
      },
    },
  },
};

if (typeof module !== 'undefined' && module.exports) {
  module.exports = anewEraTailwindConfig;              // Tailwind CLI
}
if (typeof window !== 'undefined') {
  window.tailwind = window.tailwind || {};
  window.tailwind.config = anewEraTailwindConfig;      // Play CDN
}
