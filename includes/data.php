<?php
/**
 * All page content lives here as plain PHP arrays, so copy can be edited
 * without touching markup. Templates loop over these.
 */

return [
    // Carriers shown in the "In-network with" marquee. Add 'logo' (a file in
    // assets/img/insurers/) to show the mark instead of the name; 'size' is the
    // Tailwind height class, tuned per logo so they read as one optical size.
    // Anything without a logo falls back to its name set in the same style.
    'insurers' => [
        ['name' => 'Aetna',                  'logo' => 'aetna.svg',    'size' => 'h-5'],
        ['name' => 'Cigna',                  'logo' => 'cigna.svg',    'size' => 'h-10'],
        ['name' => 'Anthem',                 'logo' => 'anthem.svg',   'size' => 'h-6'],
        ['name' => 'Highmark',               'logo' => 'highmark.svg', 'size' => 'h-8'],
        ['name' => 'Moda Health',            'logo' => 'moda.svg',     'size' => 'h-9'],
        ['name' => 'United Healthcare'],
        ['name' => 'Blue Cross Blue Shield'],
        ['name' => 'Medicare'],
        ['name' => 'Tricare'],
        ['name' => 'Humana'],
        ['name' => 'Optum'],
    ],

    'conditions' => [
        [
            'slot'  => 'cond-1',
            'icon'  => 'cloud-rain',
            'art'   => 'depression',
            'alt'   => 'A person sitting on a window sill, looking outside',
            'name'  => 'Depression',
            'blurb' => 'Persistent low mood, loss of interest, and the treatment-resistant cases other clinics give up on.',
            'chips' => ['Medication', 'Therapy', 'TMS'],
        ],
        [
            'slot'  => 'cond-2',
            'icon'  => 'pulse',
            'art'   => 'anxiety',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A woman standing outdoors with her eyes closed, breathing slowly',
            'name'  => 'Anxiety',
            'blurb' => 'Generalised anxiety, panic disorder, social anxiety and the physical symptoms that come with them.',
            'chips' => ['CBT', 'Exposure work', 'Medication'],
        ],
        [
            'slot'  => 'cond-3',
            'icon'  => 'parent-child',
            'art'   => 'postpartum',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A new mother holding her newborn baby',
            'name'  => 'Postpartum',
            'blurb' => 'Postpartum depression and anxiety, treated with options that fit feeding, sleep and a new baby.',
            'chips' => ['Therapy', 'Medication review', 'TMS'],
        ],
        [
            'slot'  => 'cond-4',
            'icon'  => 'shield-bolt',
            'art'   => 'ptsd',
            'alt'   => 'Two people holding hands across a table in support',
            'name'  => 'PTSD',
            'blurb' => 'Trauma-focused therapy at your pace, with clinicians trained in EMDR and prolonged exposure.',
            'chips' => ['EMDR', 'Prolonged exposure', 'Medication'],
        ],
        [
            'slot'  => 'cond-5',
            'icon'  => 'ear-waves',
            'art'   => 'tinnitus',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A man pressing his hands to his temples',
            'name'  => 'Tinnitus',
            'blurb' => 'Persistent ringing that disrupts sleep and mood — addressed with retraining therapy and TMS protocols.',
            'chips' => ['TMS', 'Sound retraining', 'Sleep support'],
        ],
        [
            'slot'  => 'cond-6',
            'icon'  => 'head-bolt',
            'art'   => 'migraines',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A person sitting on a sofa holding their head',
            'name'  => 'Migraines',
            'blurb' => 'Chronic migraine care coordinated with your mood and sleep treatment rather than in isolation.',
            'chips' => ['Preventive care', 'Trigger tracking', 'Sleep support'],
        ],
        [
            'slot'  => 'cond-7',
            'icon'  => 'loop',
            'art'   => 'ocd',
            'alt'   => 'Close-up of hands being washed under a running tap',
            'name'  => 'OCD',
            'blurb' => 'Exposure and response prevention, plus TMS for OCD that has not responded to therapy alone.',
            'chips' => ['ERP therapy', 'TMS', 'Medication'],
        ],
    ],

    'treatments' => [
        [
            'name'   => 'TMS',
            'slot'   => 'homepage/tms-new-era-2.jpg',
            'alt'    => 'A patient resting under the Magstim coil during a TMS session',
            'focus'  => 'object-[45%_66%]',   // portrait source — sit the crop on the coil and the patient's face
            'detail' => 'FDA-cleared magnetic stimulation for depression and OCD when medication has fallen short.',
            'chips'  => ['Depression', 'OCD'],
        ],
        [
            'name'   => 'Accelerated TMS',
            'slot'   => 'homepage/tms-newera.webp',
            'alt'    => 'A clinician positioning the TMS coil over a patient’s head',
            'detail' => 'A full course compressed into days, not weeks, for patients who need results fast.',
            'chips'  => ['5-day course', 'Depression'],
        ],
        [
            'name'   => 'Psychiatry',
            'slot'   => 'treat-3',
            'alt'    => 'A clinician talking with a patient during a consultation',
            'detail' => 'Diagnostic evaluation and ongoing medication management from a clinician who knows you.',
            'chips'  => ['Evaluation', 'Med management'],
        ],
        [
            'name'   => 'Spravato',
            'slot'   => 'treat-4',
            'alt'    => 'A person self-administering a nasal spray',
            'detail' => 'In-office esketamine treatment for treatment-resistant depression, monitored start to finish.',
            'chips'  => ['Esketamine', 'In-office'],
        ],
        [
            'name'   => 'Ketamine',
            'slot'   => 'treat-5',
            'alt'    => 'An intravenous infusion line running into a drip chamber',
            'detail' => 'Infusion therapy for depression, anxiety and chronic pain that hasn’t responded to other care.',
            'chips'  => ['Infusion', 'Depression'],
        ],
        [
            'name'   => 'Therapy',
            'slot'   => 'treat-6',
            'alt'    => 'Two women talking during a therapy session',
            'detail' => 'CBT, DBT, EMDR and ACT with therapists working alongside your prescriber, never in a silo.',
            'chips'  => ['CBT', 'EMDR'],
        ],
    ],

    // Therapy vs psychiatry, written as an honest side-by-side rather than a
    // sales sheet — including the row where the answer is simply "no".
    'compare_rows' => [
        [
            'label'      => 'In one line',
            'therapy'    => 'Talking work. You and a therapist unpack what is happening and build ways through it.',
            'psychiatry' => 'Medical work. A prescriber looks at what is driving the symptoms and treats it directly.',
        ],
        [
            'label'      => 'Who you sit with',
            'therapy'    => 'A licensed therapist: LCSW, LMFT, PhD or PsyD.',
            'psychiatry' => 'A psychiatric clinician: MD, DO or PMHNP.',
        ],
        [
            'label'      => 'How the work happens',
            'therapy'    => 'Structured methods with evidence behind them — CBT, DBT, EMDR, ACT — and skills that stay with you afterwards.',
            'psychiatry' => 'A full diagnostic picture first, then a plan: medication, TMS, Spravato, or none of them if none is warranted.',
        ],
        [
            'label'      => 'Can prescribe',
            'therapy'    => 'No.',
            'psychiatry' => 'Yes.',
        ],
        [
            'label'      => 'What the rhythm looks like',
            'therapy'    => 'An hour at a time, weekly or every other week, reviewed monthly for as long as it earns its place.',
            'psychiatry' => 'A sixty-minute evaluation, then shorter check-ins every two to four weeks until things settle.',
        ],
        [
            'label'      => 'You will know it is working when',
            'therapy'    => 'The week feels more manageable, and you are using outside the room what you practiced in it.',
            'psychiatry' => 'Your symptom scores move, side effects stay tolerable, and the plan still makes sense to you.',
        ],
    ],

    // Shown six at a time; the arrows page through in groups of six.
    'reviews' => [
        ['quote' => '"The first psychiatrist who read my chart before walking in. Six months later I am off two medications and doing better than I was on four."', 'who' => 'Marisa L.'],
        ['quote' => '"TMS gave me back the version of myself my family remembers. A 36-session course felt routine instead of daunting."', 'who' => 'Devon R.'],
        ['quote' => '"They found the ADHD everyone else had been treating as anxiety. That one appointment changed how I work and parent."', 'who' => 'Priya S.'],
        ['quote' => '"Sixty-minute intake, real symptom scores at every visit — the first practice that treated my chart like it mattered."', 'who' => 'Andre K.'],
        ['quote' => '"Spravato got me out of a depressive episode nothing else had touched. The team monitored every session closely."', 'who' => 'Renee T.'],
        ['quote' => '"My therapist and prescriber actually talk to each other. I have never had that before and it changed everything."', 'who' => 'Jordan M.'],
        ['quote' => '"Accelerated TMS fit into one week off work instead of two months of daily visits. Results came just as fast."', 'who' => 'Sam O.'],
        ['quote' => '"Telehealth visits in the evening meant I never had to choose between therapy and my job."', 'who' => 'Layla H.'],
        ['quote' => '"Ketamine infusions paired with therapy pulled me out of a depression I thought was permanent."', 'who' => 'Chris B.'],
        ['quote' => '"The intake team verified my insurance before I even walked in. No surprise bills, no runaround."', 'who' => 'Talia F.'],
        ['quote' => '"OCD treatment that finally worked — ERP therapy plus TMS when medication alone plateaued."', 'who' => 'Miguel A.'],
        ['quote' => '"Postpartum anxiety hit hard. They saw me within days and built a plan around my baby’s schedule."', 'who' => 'Nina W.'],
    ],

    'faq_categories' => [
        [
            'name' => 'What to expect',
            'faqs' => [
                ['q' => 'What happens at my first visit?', 'a' => 'A sixty-minute diagnostic intake covering history, physical health, sleep and current symptoms, ending with a written plan you leave with the same day.'],
                ['q' => 'Do I have to take medication?', 'a' => 'No. Medication is one option among several. Many patients do well with therapy alone, or with TMS, and we will say so plainly rather than defaulting to a prescription.'],
                ['q' => 'How long does treatment take?', 'a' => 'It depends on the plan — a TMS course runs about six weeks, therapy is ongoing and reviewed monthly, medication changes are checked every two to four weeks at first.'],
                ['q' => 'Do you see adolescents?', 'a' => 'We see patients aged 13 and up. Adolescent care includes family sessions and, with consent, coordination with school counselors.'],
            ],
        ],
        [
            'name' => 'Getting started',
            'faqs' => [
                ['q' => 'How soon can I be seen?', 'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up.'],
                ['q' => 'What do I need for my first appointment?', 'a' => 'A photo ID, your insurance card, and a list of current medications. We send intake forms ahead of time so the visit itself is all conversation.'],
                ['q' => 'Can I switch clinicians if it is not a fit?', 'a' => 'Yes, any time. Our intake team will match you with someone new at no extra cost and no awkward conversation required.'],
            ],
        ],
        [
            'name' => 'Insurance',
            'faqs' => [
                ['q' => 'Do you take my insurance?', 'a' => 'We are in-network with most major commercial plans as well as Medicare and Tricare. We verify your benefits before your first appointment.'],
                ['q' => 'Is TMS covered by insurance?', 'a' => 'For treatment-resistant depression, yes — most plans cover TMS once you have tried two or more medications. We handle the prior authorization for you.'],
                ['q' => 'What if I am not covered?', 'a' => 'We offer transparent self-pay rates and can walk you through a payment plan before you commit to anything.'],
            ],
        ],
    ],

    // The numbers panel above the conditions section.
    //
    // ⚠ PLACEHOLDER FIGURES. These four percentages are dummy values standing in
    // for the real thing — they are not measured, and outcome claims on a
    // psychiatry site are regulated marketing. Replace every one with a figure
    // the practice can evidence (intake-to-discharge symptom scores, PHQ-9
    // response rates, TMS remission rates) before this page goes live.
    'results' => [
        'heading_accent' => 'Progress',
        'heading_rest'   => ' you can see in the numbers',
        'photo'          => 'homepage/results-joy.jpg',
        'photo_alt'      => 'A father and his daughter laughing together outdoors in autumn light',
        'stats' => [
            ['value' => '83%', 'label' => 'of new patients are seen within a week of their first call'],
            ['value' => '95%', 'label' => 'stay with the clinician they started with'],
            ['value' => '26%', 'label' => 'average fall in symptom scores by week eight'],
            ['value' => '84%', 'label' => 'of patients who begin a TMS course finish it'],
        ],
    ],

    'tms_stats' => [
        ['value' => '19 min', 'label' => 'per session',        'color' => '#e8922f'],
        ['value' => '36',     'label' => 'sessions in a course','color' => '#86be52'],
        ['value' => '0',      'label' => 'days of downtime',    'color' => '#ffffff'],
    ],

    // The practice's mission in three short lines — access, the treatment,
    // the team. One idea each: at 32px, longer than two lines apiece stops
    // being a statement and becomes a paragraph.
    'focus_paragraphs' => [
        'Our mission is to put TMS within reach of more people living with depression. A treatment this effective should not be hard to find.',
        'It is FDA-cleared and non-medicinal, and for many patients it is the best chance they have of feeling like themselves again.',
        'Delivered by doctors, technicians and office staff who make the course something you would send a friend to — from the first phone call to the final session.',
    ],
];
