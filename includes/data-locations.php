<?php
/**
 * The clinics, for the location pages.
 *
 * One entry per clinic, keyed by the slug its page is named after. A page at
 * the root names its key and requires includes/location-page.php; who works
 * at a clinic is not repeated here, it is read from includes/data-team.php,
 * where a person's 'clinics' entry names the sites they see patients at.
 *
 * Provenance: addresses, suites, phone numbers and the rosters come from the
 * practice's own page for each clinic. Neighbouring cities are geography.
 *
 * ⚠ Three things to check before these go live:
 *   · 'treatments' lists TMS, psychiatry and therapy everywhere. The
 *     practice's own pages also list Spravato® and an intensive outpatient
 *     programme at some clinics — but spravato.php and data-treatments.php on
 *     this site both say Spravato® is Texas-only, and there is no IOP content
 *     anywhere. Rather than contradict the rest of the site, every clinic
 *     lists the three. Settle which is right and update whichever is wrong.
 *   · 'getting_here' says where the clinic is and to arrive early. It does
 *     NOT describe parking or transit — that is local knowledge nobody here
 *     has, and inventing it would send people to the wrong car park. Add a
 *     third item per clinic once the practice supplies it.
 *   · 'hours' is the 6am–6pm admission window every clinic page states. If a
 *     clinic's front-desk hours differ, they belong here.
 *
 * Phone numbers are the per-clinic lines where the practice publishes one and
 * the (866) admissions line otherwise, so several clinics share a number.
 */

return [

'huntington-beach' => [
    'name'       => 'Huntington Beach',
    'state'      => 'ca',
    'state_name' => 'California',
    'region'     => 'Orange County',
    'page'       => 'huntington-beach.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Huntington Beach, CA — Bella Terra Medical Building, 7677 Center Ave #405. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS in the Bella Terra Medical Building, a few minutes inland from the pier. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Center Avenue',

    'address'   => [
        'building' => 'Bella Terra Medical Building',
        'street'   => '7677 Center Ave #405',
        'city'     => 'Huntington Beach',
        'region'   => 'CA',
        'postcode' => '92647',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%207677%20Center%20Ave%20%23405%2C%20Huntington%20Beach%2C%20CA%2092647',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => 'Bella Terra Medical Building, 7677 Center Ave #405, in Huntington Beach.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Fountain Valley', 'Westminster', 'Seal Beach', 'Garden Grove', 'Costa Mesa', 'Midway City', 'Sunset Beach'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Huntington Beach?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in California. TMS is an in-clinic treatment and has to happen at the Center Avenue suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'newport-beach' => [
    'name'       => 'Newport Beach',
    'state'      => 'ca',
    'state_name' => 'California',
    'region'     => 'Orange County',
    'page'       => 'newport-beach.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Newport Beach, CA — 1000 Quail Street, Suite 200. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Quail Street, just off Jamboree and minutes from Fashion Island. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Quail Street',

    'address'   => [
        'building' => '',
        'street'   => '1000 Quail Street, Suite 200',
        'city'     => 'Newport Beach',
        'region'   => 'CA',
        'postcode' => '92660',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%201000%20Quail%20Street%2C%20Suite%20200%2C%20Newport%20Beach%2C%20CA%2092660',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '1000 Quail Street, Suite 200, in Newport Beach.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Costa Mesa', 'Irvine', 'Corona del Mar', 'Huntington Beach', 'Tustin', 'Laguna Beach'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Newport Beach?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in California. TMS is an in-clinic treatment and has to happen at the Quail Street suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'laguna-hills' => [
    'name'       => 'Laguna Hills',
    'state'      => 'ca',
    'state_name' => 'California',
    'region'     => 'Orange County',
    'page'       => 'laguna-hills.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Laguna Hills, CA — Saddleback Valley Medical Center, 23961 Calle De La Magdalena Ste 420. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS at Saddleback Valley Medical Center, off the 5 at La Paz. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Calle De La Magdalena',

    'address'   => [
        'building' => 'Saddleback Valley Medical Center',
        'street'   => '23961 Calle De La Magdalena Ste 420',
        'city'     => 'Laguna Hills',
        'region'   => 'CA',
        'postcode' => '92653',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%2023961%20Calle%20De%20La%20Magdalena%20Ste%20420%2C%20Laguna%20Hills%2C%20CA%2092653',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => 'Saddleback Valley Medical Center, 23961 Calle De La Magdalena Ste 420, in Laguna Hills.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Mission Viejo', 'Aliso Viejo', 'Lake Forest', 'Laguna Niguel', 'Irvine', 'Laguna Beach'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Laguna Hills?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in California. TMS is an in-clinic treatment and has to happen at the Calle De La Magdalena suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'orange' => [
    'name'       => 'Orange',
    'state'      => 'ca',
    'state_name' => 'California',
    'region'     => 'Orange County',
    'page'       => 'orange.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Orange, CA — 2050 W Chapman Ave Suite #201. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on West Chapman Avenue, close to the hospital district and Old Towne. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'West Chapman Avenue',

    'address'   => [
        'building' => '',
        'street'   => '2050 W Chapman Ave Suite #201',
        'city'     => 'Orange',
        'region'   => 'CA',
        'postcode' => '92868',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%202050%20W%20Chapman%20Ave%20Suite%20%23201%2C%20Orange%2C%20CA%2092868',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '2050 W Chapman Ave Suite #201, in Orange.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Anaheim', 'Santa Ana', 'Tustin', 'Villa Park', 'Garden Grove', 'Yorba Linda'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Orange?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in California. TMS is an in-clinic treatment and has to happen at the West Chapman Avenue suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'torrance' => [
    'name'       => 'Torrance',
    'state'      => 'ca',
    'state_name' => 'California',
    'region'     => 'South Bay',
    'page'       => 'torrance.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Torrance, CA — 3848 W Carson St #103. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on West Carson Street, in the middle of the South Bay. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'West Carson Street',

    'address'   => [
        'building' => '',
        'street'   => '3848 W Carson St #103',
        'city'     => 'Torrance',
        'region'   => 'CA',
        'postcode' => '90503',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%203848%20W%20Carson%20St%20%23103%2C%20Torrance%2C%20CA%2090503',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '3848 W Carson St #103, in Torrance.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Redondo Beach', 'Manhattan Beach', 'Gardena', 'Carson', 'Lomita', 'Palos Verdes'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Torrance?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in California. TMS is an in-clinic treatment and has to happen at the West Carson Street suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'long-beach' => [
    'name'       => 'Long Beach',
    'state'      => 'ca',
    'state_name' => 'California',
    'region'     => 'Los Angeles County',
    'page'       => 'long-beach.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Long Beach, CA — 100 Oceangate Unit 610. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS at Oceangate, in downtown Long Beach a block from the water. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Oceangate',

    'address'   => [
        'building' => '',
        'street'   => '100 Oceangate Unit 610',
        'city'     => 'Long Beach',
        'region'   => 'CA',
        'postcode' => '90802',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%20100%20Oceangate%20Unit%20610%2C%20Long%20Beach%2C%20CA%2090802',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '100 Oceangate Unit 610, in Long Beach.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Signal Hill', 'Lakewood', 'Seal Beach', 'Carson', 'San Pedro', 'Los Alamitos'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Long Beach?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in California. TMS is an in-clinic treatment and has to happen at the Oceangate suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'west-los-angeles' => [
    'name'       => 'West Los Angeles',
    'state'      => 'ca',
    'state_name' => 'California',
    'region'     => 'Los Angeles County',
    'page'       => 'west-los-angeles.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in West Los Angeles, CA — 10780 Santa Monica Blvd, Suite 235. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Santa Monica Boulevard, between Westwood and Santa Monica. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Santa Monica Boulevard',

    'address'   => [
        'building' => '',
        'street'   => '10780 Santa Monica Blvd, Suite 235',
        'city'     => 'Los Angeles',
        'region'   => 'CA',
        'postcode' => '90025',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%2010780%20Santa%20Monica%20Blvd%2C%20Suite%20235%2C%20Los%20Angeles%2C%20CA%2090025',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '10780 Santa Monica Blvd, Suite 235, in Los Angeles.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Santa Monica', 'Brentwood', 'Century City', 'Culver City', 'Beverly Hills', 'Westwood'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in West Los Angeles?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in California. TMS is an in-clinic treatment and has to happen at the Santa Monica Boulevard suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'central-austin' => [
    'name'       => 'Central Austin',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Austin',
    'page'       => 'central-austin.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Central Austin, TX — 8140 N Mopac Expy, Building 3, Suite 150. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS off North MoPac, a few minutes from the Arboretum. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'North MoPac',

    'address'   => [
        'building' => '',
        'street'   => '8140 N Mopac Expy, Building 3, Suite 150',
        'city'     => 'Austin',
        'region'   => 'TX',
        'postcode' => '78759',
    ],
    'phone'      => '(737) 363-4731',
    'phone_href' => 'tel:+17373634731',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%208140%20N%20Mopac%20Expy%2C%20Building%203%2C%20Suite%20150%2C%20Austin%2C%20TX%2078759',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '8140 N Mopac Expy, Building 3, Suite 150, in Austin.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Northwest Hills', 'Arboretum', 'Round Rock', 'Pflugerville', 'Lakeway', 'Downtown Austin'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Central Austin?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the North MoPac suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'cedar-park' => [
    'name'       => 'Cedar Park',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Austin',
    'page'       => 'cedar-park.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Cedar Park, TX — 1210 Cottonwood Creek Trail #230. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Cottonwood Creek Trail, north of Austin off the 183A. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Cottonwood Creek Trail',

    'address'   => [
        'building' => '',
        'street'   => '1210 Cottonwood Creek Trail #230',
        'city'     => 'Cedar Park',
        'region'   => 'TX',
        'postcode' => '78613',
    ],
    'phone'      => '(737) 363-4732',
    'phone_href' => 'tel:+17373634732',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%201210%20Cottonwood%20Creek%20Trail%20%23230%2C%20Cedar%20Park%2C%20TX%2078613',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '1210 Cottonwood Creek Trail #230, in Cedar Park.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Leander', 'Round Rock', 'Georgetown', 'Liberty Hill', 'Brushy Creek', 'Austin'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Cedar Park?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the Cottonwood Creek Trail suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'westlake' => [
    'name'       => 'Westlake',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Austin',
    'page'       => 'westlake.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Westlake, TX — 1715 S Capital of Texas Hwy, Ste 205. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Capital of Texas Highway, in the hills west of downtown Austin. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Capital of Texas Highway',

    'address'   => [
        'building' => '',
        'street'   => '1715 S Capital of Texas Hwy, Ste 205',
        'city'     => 'Austin',
        'region'   => 'TX',
        'postcode' => '78746',
    ],
    'phone'      => '(830) 825-6847',
    'phone_href' => 'tel:+18308256847',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%201715%20S%20Capital%20of%20Texas%20Hwy%2C%20Ste%20205%2C%20Austin%2C%20TX%2078746',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '1715 S Capital of Texas Hwy, Ste 205, in Austin.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Rollingwood', 'Bee Cave', 'Lakeway', 'Barton Creek', 'Downtown Austin', 'Dripping Springs'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Westlake?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the Capital of Texas Highway suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'central-dallas' => [
    'name'       => 'Central Dallas',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Dallas',
    'page'       => 'central-dallas.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Central Dallas, TX — 17480 Dallas Pkwy Ste 101. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Dallas Parkway, up the Tollway at the Plano line. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Dallas Parkway',

    'address'   => [
        'building' => '',
        'street'   => '17480 Dallas Pkwy Ste 101',
        'city'     => 'Dallas',
        'region'   => 'TX',
        'postcode' => '75287',
    ],
    'phone'      => '(469) 962-6984',
    'phone_href' => 'tel:+14699626984',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%2017480%20Dallas%20Pkwy%20Ste%20101%2C%20Dallas%2C%20TX%2075287',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '17480 Dallas Pkwy Ste 101, in Dallas.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Plano', 'Addison', 'Richardson', 'Frisco', 'Carrollton', 'Farmers Branch'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Central Dallas?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the Dallas Parkway suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'allen' => [
    'name'       => 'Allen',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Dallas',
    'page'       => 'allen.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Allen, TX — 1101 Raintree Circle, Suite 210. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Raintree Circle, off Central Expressway in Allen. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Raintree Circle',

    'address'   => [
        'building' => '',
        'street'   => '1101 Raintree Circle, Suite 210',
        'city'     => 'Allen',
        'region'   => 'TX',
        'postcode' => '75013',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%201101%20Raintree%20Circle%2C%20Suite%20210%2C%20Allen%2C%20TX%2075013',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '1101 Raintree Circle, Suite 210, in Allen.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Plano', 'McKinney', 'Frisco', 'Fairview', 'Wylie', 'Richardson'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Allen?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the Raintree Circle suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'grapevine' => [
    'name'       => 'Grapevine',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Dallas',
    'page'       => 'grapevine.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Grapevine, TX — 1643 Lancaster Dr Suite 201. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Lancaster Drive, minutes from DFW and Southlake. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Lancaster Drive',

    'address'   => [
        'building' => '',
        'street'   => '1643 Lancaster Dr Suite 201',
        'city'     => 'Grapevine',
        'region'   => 'TX',
        'postcode' => '76051',
    ],
    'phone'      => '(866) 826-2061',
    'phone_href' => 'tel:+18668262061',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%201643%20Lancaster%20Dr%20Suite%20201%2C%20Grapevine%2C%20TX%2076051',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '1643 Lancaster Dr Suite 201, in Grapevine.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Southlake', 'Colleyville', 'Coppell', 'Euless', 'Flower Mound', 'Irving'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Grapevine?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the Lancaster Drive suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'cypress' => [
    'name'       => 'Cypress',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Houston',
    'page'       => 'cypress.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in Cypress, TX — 27700 Northwest Fwy #340. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on the Northwest Freeway, serving north-west Houston. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Northwest Freeway',

    'address'   => [
        'building' => '',
        'street'   => '27700 Northwest Fwy #340',
        'city'     => 'Cypress',
        'region'   => 'TX',
        'postcode' => '77433',
    ],
    'phone'      => '(346) 741-7961',
    'phone_href' => 'tel:+13467417961',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%2027700%20Northwest%20Fwy%20%23340%2C%20Cypress%2C%20TX%2077433',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '27700 Northwest Fwy #340, in Cypress.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Katy', 'Jersey Village', 'Tomball', 'Copperfield', 'Bridgeland', 'Houston'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in Cypress?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the Northwest Freeway suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

'the-woodlands' => [
    'name'       => 'The Woodlands',
    'state'      => 'tx',
    'state_name' => 'Texas',
    'region'     => 'Houston',
    'page'       => 'the-woodlands.php',
    'h1'         => 'Psychiatry and TMS in',
    'meta'       => 'Psychiatry, therapy and TMS in The Woodlands, TX — 1733 Woodstead Ct #102. Meet the clinicians, see what we treat, and book with the one who fits.',
    'lede'       => 'Psychiatry, therapy and TMS on Woodstead Court, in the middle of The Woodlands. Most major plans accepted, and we check your benefits before your first visit.',
    'street_name'=> 'Woodstead Court',

    'address'   => [
        'building' => '',
        'street'   => '1733 Woodstead Ct #102',
        'city'     => 'The Woodlands',
        'region'   => 'TX',
        'postcode' => '77380',
    ],
    'phone'      => '(281) 206-4678',
    'phone_href' => 'tel:+12812064678',
    'maps'       => 'https://www.google.com/maps/dir/?api=1&destination=Anew%20Era%20TMS%20%26%20Psychiatry%2C%201733%20Woodstead%20Ct%20%23102%2C%20The%20Woodlands%2C%20TX%2077380',

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '6:00am – 6:00pm'],
        ['days' => 'Saturday',        'time' => 'Closed'],
        ['days' => 'Sunday',          'time' => 'Closed'],
    ],
    'hours_note' => 'TMS patients are seen outside these hours where a course needs it — ask when your schedule is set.',

    'getting_here' => [
        ['name' => 'Where it is',
         'copy' => '1733 Woodstead Ct #102, in The Woodlands.'],
        ['name' => 'Before your first visit',
         'copy' => 'Signposting inside a medical building is never as obvious as it looks on the way in. Give yourself a few extra minutes to find the suite rather than arriving at a run.'],
    ],

    'serves' => ['Spring', 'Conroe', 'Shenandoah', 'Oak Ridge North', 'Magnolia', 'Tomball'],

    'conditions' => ['Depression', 'Anxiety', 'PTSD', 'OCD'],

    'treatments' => [
            ['name' => 'TMS therapy', 'page' => 'tms.php',        'icon' => 'coil',
             'copy' => 'FDA-cleared, drug-free and non-invasive. You are awake throughout and drive yourself home.'],
            ['name' => 'Psychiatry',  'page' => 'psychiatry.php', 'icon' => 'stethoscope',
             'copy' => 'A full diagnostic evaluation, then medication management if that is the right tool.'],
            ['name' => 'Therapy',     'page' => 'therapy.php',    'icon' => 'chat',
             'copy' => 'CBT, DBT, EMDR and ACT, in person at the clinic or by telehealth across the state.'],
        ],

    'faqs' => [
        ['q' => 'Do I need a referral to be seen here?',
         'a' => 'Not from us. Most plans let you book psychiatry directly, though a few HMO products still require one from your primary care doctor. We check that when we verify your benefits.'],
        ['q' => 'How soon can I get an appointment in The Woodlands?',
         'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. Say so when you call if things are urgent.'],
        ['q' => 'Can I be seen by video instead of coming in?',
         'a' => 'Yes, for psychiatry and therapy, anywhere in Texas. TMS is an in-clinic treatment and has to happen at the Woodstead Court suite.'],
        ['q' => 'Is TMS available at this clinic?',
         'a' => 'Yes. A course is usually five sessions a week for four to six weeks, which is worth planning around before you start. We verify your benefits and handle the prior authorisation first.'],
    ],
],

];
