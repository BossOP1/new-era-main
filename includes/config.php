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

    // Primary navigation, rendered in includes/header.php. Kept in the same
    // order as the sections appear on the page, and labelled with the words a
    // patient would use rather than internal ones.
    'nav' => [
        ['label' => 'About',      'href' => 'about.php'],
        ['label' => 'Treatments', 'href' => 'index.php#treatments'],
        ['label' => 'TMS',        'href' => 'tms.php'],
        ['label' => 'Conditions', 'href' => 'conditions.php'],
        ['label' => 'Reviews',    'href' => 'index.php#reviews'],
        ['label' => 'FAQs',       'href' => 'index.php#faq'],
    ],

    // Footer link columns, rendered in includes/footer.php
    'footer_nav' => [
        'Care' => [
            ['label' => 'Conditions',  'href' => 'conditions.php'],
            ['label' => 'Depression',  'href' => 'depression.php'],
            ['label' => 'Treatments',  'href' => 'index.php#treatments'],
            ['label' => 'TMS therapy', 'href' => 'tms.php'],
            ['label' => 'Our focus',   'href' => 'index.php#focus'],
        ],
        'Patients' => [
            ['label' => 'Book a visit',   'href' => 'index.php#book'],
            ['label' => 'Insurance',      'href' => 'index.php#book'],
            ['label' => 'FAQs',           'href' => 'index.php#faq'],
            ['label' => 'Patient portal', 'href' => 'index.php#book'],
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
