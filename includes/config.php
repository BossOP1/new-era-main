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
        ['label' => 'About',      'href' => '#focus'],
        ['label' => 'Treatments', 'href' => '#treatments'],
        ['label' => 'TMS',        'href' => '#tms'],
        ['label' => 'Conditions', 'href' => '#conditions'],
        ['label' => 'Reviews',    'href' => '#reviews'],
        ['label' => 'FAQs',       'href' => '#faq'],
    ],

    // Footer link columns, rendered in includes/footer.php
    'footer_nav' => [
        'Care' => [
            ['label' => 'Conditions',  'href' => '#conditions'],
            ['label' => 'Treatments',  'href' => '#treatments'],
            ['label' => 'TMS therapy', 'href' => '#tms'],
            ['label' => 'Our focus',   'href' => '#focus'],
        ],
        'Patients' => [
            ['label' => 'Book a visit',   'href' => '#book'],
            ['label' => 'Insurance',      'href' => '#book'],
            ['label' => 'FAQs',           'href' => '#faq'],
            ['label' => 'Patient portal', 'href' => '#book'],
        ],
    ],

    'legal_nav' => [
        ['label' => 'Terms & conditions', 'href' => '#top'],
        ['label' => 'Privacy notice',     'href' => '#top'],
        ['label' => 'Cookie policy',      'href' => '#top'],
        ['label' => 'Accessibility',      'href' => '#top'],
        ['label' => 'Sitemap',            'href' => '#top'],
    ],

    'badges' => ['HIPAA Compliant', 'Licensed Providers'],
];
