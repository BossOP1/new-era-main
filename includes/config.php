<?php
/**
 * Site-wide configuration.
 * Edit contact details, brand colours and navigation here — every
 * template reads from this file rather than hard-coding values.
 */

return [
    'name'        => 'Anew Era Health',
    'brand'       => ['Anew', 'Era'],           // split so the two halves can be coloured
    'tagline'     => 'Psychiatry, therapy and TMS for adults and adolescents. In-person and telehealth.',
    'phone'       => '(555) 000-0000',
    'phone_href'  => 'tel:+15550000000',
    'email'       => 'hello@anewera.com',
    'address'     => ['1200 Harbor Street', 'Suite 210'],
    'rating'      => '★ 4.9 · 380+ reviews',
    'legal'       => 'Copyright © Anew Era Health. All rights reserved. Anew Era is a trading name of Anew Era Health, PLLC. Registered office 1200 Harbor Street, Suite 210. Licensed to provide psychiatric care, therapy and TMS services in the states listed at booking.',

    'colors' => [
        'blue'   => '#0f639b',
        'orange' => '#e8922f',
        'green'  => '#86be52',
        'ink'    => '#14202b',
    ],

    // Primary navigation, rendered in includes/header.php. An item with a
    // 'menu' key opens the dropdown of that name from 'menus' below instead of
    // linking straight through; the same menus build the phone menu. An item
    // is marked current when the page being viewed is its href, or any page
    // in its menu. Anchors (index.php#…) never count as current.
    'nav' => [
        ['label' => 'Home',          'href' => 'index.php'],
        ['label' => 'About',         'href' => 'about.php'],
        ['label' => 'Meet our team', 'href' => 'team.php'],
        ['label' => 'Treatments',    'href' => 'treatments.php', 'menu' => 'treatments'],
        ['label' => 'Conditions',    'href' => 'conditions.php', 'menu' => 'conditions', 'also' => ['depression-short.php']],
        ['label' => 'Resources',     'href' => 'faq.php',        'menu' => 'resources'],
        // Placeholder until the locations page exists.
        ['label' => 'Our locations', 'href' => 'index.php#top'],
    ],

    // Dropdown contents. 'icon' names a line icon in nav_icon(); 'art' names
    // condition artwork in assets/img/conditions/, the same set the rest of
    // the site uses. Descriptions are kept to one short line — the menu is a
    // signpost, not a summary. 'all' is optional, and 'columns' => 1 stacks a
    // short list instead of leaving a hole in the two-column grid.
    'menus' => [
        'treatments' => [
            'eyebrow' => 'How we treat',
            'all'     => ['label' => 'All treatments', 'href' => 'treatments.php'],
            'note'    => 'In person and by telehealth. Most insurance accepted.',
            'items'   => [
                ['label' => 'TMS therapy', 'href' => 'tms.php',        'desc' => 'Magnetic stimulation, no medication', 'icon' => 'coil'],
                ['label' => 'Psychiatry',  'href' => 'psychiatry.php', 'desc' => 'Evaluation and medication management', 'icon' => 'stethoscope'],
                ['label' => 'Therapy',     'href' => 'therapy.php',    'desc' => 'CBT, DBT, EMDR and ACT',             'icon' => 'chat'],
                ['label' => 'Spravato®',   'href' => 'spravato.php',   'desc' => 'Esketamine nasal spray, Texas only',  'icon' => 'spray'],
            ],
            'feature' => [
                'kind'    => 'photo',
                'href'    => 'tms.php',
                'image'   => 'nav/tms-feature.jpg',
                'eyebrow' => 'Our lead treatment',
                'title'   => 'TMS therapy',
                'copy'    => 'FDA-cleared, drug-free, and you drive yourself home.',
                'cta'     => 'Explore TMS',
            ],
        ],
        'conditions' => [
            'eyebrow' => 'What we treat',
            'all'     => ['label' => 'All conditions', 'href' => 'conditions.php'],
            'note'    => 'Every plan starts with a full diagnostic assessment.',
            'items'   => [
                ['label' => 'Depression', 'href' => 'depression.php', 'desc' => 'Including treatment-resistant',  'art' => 'depression'],
                ['label' => 'Anxiety',    'href' => 'anxiety.php',    'desc' => 'Panic, social and generalised',  'art' => 'anxiety'],
                ['label' => 'Postpartum', 'href' => 'postpartum.php', 'desc' => 'Options that fit feeding',       'art' => 'postpartum'],
                ['label' => 'PTSD',       'href' => 'ptsd.php',       'desc' => 'Trauma-focused care',            'art' => 'ptsd'],
                ['label' => 'OCD',        'href' => 'ocd.php',        'desc' => 'ERP therapy and TMS',            'art' => 'ocd'],
                ['label' => 'Tinnitus',   'href' => 'tinnitus.php',   'desc' => 'When the ringing won’t stop',    'art' => 'tinnitus'],
                ['label' => 'Migraines',  'href' => 'migraines.php',  'desc' => 'Coordinated with mood and sleep', 'art' => 'migraines'],
            ],
            'feature' => [
                'kind'    => 'prompt',
                'href'    => 'index.php#book',
                'eyebrow' => 'Not sure where you fit?',
                'title'   => 'Take the PHQ-9',
                'copy'    => 'Two minutes, and a place to start. It is a screening questionnaire, not a diagnosis.',
                'cta'     => 'Start the questionnaire',
            ],
        ],
        'resources' => [
            'eyebrow' => 'Learn more',
            'note'    => 'Questions about care, cost or insurance? Call us.',
            'columns' => 1,
            'items'   => [
                // Blogs is a placeholder until the blog exists.
                ['label' => 'Blogs',   'href' => 'index.php#top',     'desc' => 'Articles on mental health and treatment', 'icon' => 'article'],
                ['label' => 'Insurance', 'href' => 'insurance.php',   'desc' => 'Carriers, coverage and what you will owe', 'icon' => 'shield'],
                ['label' => 'Reviews', 'href' => 'reviews.php',        'desc' => 'What patients say about their care',      'icon' => 'star'],
                ['label' => 'FAQs',    'href' => 'faq.php',           'desc' => 'Insurance, first visits and treatment',   'icon' => 'question'],
            ],
            'feature' => [
                'kind'    => 'prompt',
                'icon'    => 'chat',
                'href'    => 'index.php#book',
                'eyebrow' => 'Still have questions?',
                'title'   => 'Talk to our team',
                'copy'    => 'Most new patients are seen inside a week, and we check your benefits first.',
                'cta'     => 'Book a consultation',
            ],
        ],
    ],

    // Footer link columns, rendered in includes/footer.php
    'footer_nav' => [
        'Care' => [
            ['label' => 'Conditions',  'href' => 'conditions.php'],
            ['label' => 'Depression',  'href' => 'depression.php'],
            ['label' => 'Treatments',  'href' => 'treatments.php'],
            ['label' => 'TMS therapy', 'href' => 'tms.php'],
            ['label' => 'Our focus',   'href' => 'index.php#focus'],
        ],
        'Patients' => [
            ['label' => 'Book a visit',   'href' => 'index.php#book'],
            ['label' => 'Meet our team',  'href' => 'team.php'],
            ['label' => 'Reviews',        'href' => 'reviews.php'],
            ['label' => 'Insurance',      'href' => 'insurance.php'],
            ['label' => 'FAQs',           'href' => 'faq.php'],
        ],
    ],

    'legal_nav' => [
        ['label' => 'Terms & conditions', 'href' => 'index.php#top'],
        ['label' => 'Privacy notice',     'href' => 'index.php#top'],
        ['label' => 'Cookie policy',      'href' => 'index.php#top'],
        ['label' => 'Accessibility',      'href' => 'index.php#top'],
        ['label' => 'Sitemap',            'href' => 'index.php#top'],
    ],

    'badges' => ['HIPAA Compliant', 'Licensed Providers'],
];
