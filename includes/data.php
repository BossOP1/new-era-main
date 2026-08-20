<?php
/**
 * All page content lives here as plain PHP arrays, so copy can be edited
 * without touching markup. Templates loop over these.
 */

return [
    'insurers' => [
        'Aetna', 'Cigna', 'United Healthcare', 'Blue Cross Blue Shield',
        'Medicare', 'Tricare', 'Humana', 'Optum',
    ],

    'conditions' => [
        [
            'slot'  => 'cond-1',
            'alt'   => 'A person sitting on a window sill, looking outside',
            'name'  => 'Depression',
            'blurb' => 'Persistent low mood, loss of interest, and the treatment-resistant cases other clinics give up on.',
            'chips' => ['Medication', 'Therapy', 'TMS'],
        ],
        [
            'slot'  => 'cond-2',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A woman standing outdoors with her eyes closed, breathing slowly',
            'name'  => 'Anxiety',
            'blurb' => 'Generalised anxiety, panic disorder, social anxiety and the physical symptoms that come with them.',
            'chips' => ['CBT', 'Exposure work', 'Medication'],
        ],
        [
            'slot'  => 'cond-3',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A new mother holding her newborn baby',
            'name'  => 'Postpartum',
            'blurb' => 'Postpartum depression and anxiety, treated with options that fit feeding, sleep and a new baby.',
            'chips' => ['Therapy', 'Medication review', 'TMS'],
        ],
        [
            'slot'  => 'cond-4',
            'alt'   => 'Two people holding hands across a table in support',
            'name'  => 'PTSD',
            'blurb' => 'Trauma-focused therapy at your pace, with clinicians trained in EMDR and prolonged exposure.',
            'chips' => ['EMDR', 'Prolonged exposure', 'Medication'],
        ],
        [
            'slot'  => 'cond-5',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A man pressing his hands to his temples',
            'name'  => 'Tinnitus',
            'blurb' => 'Persistent ringing that disrupts sleep and mood — addressed with retraining therapy and TMS protocols.',
            'chips' => ['TMS', 'Sound retraining', 'Sleep support'],
        ],
        [
            'slot'  => 'cond-6',
            'focus' => 'object-left',   // wide crop: keeps the subject clear of the info card
            'alt'   => 'A person sitting on a sofa holding their head',
            'name'  => 'Migraines',
            'blurb' => 'Chronic migraine care coordinated with your mood and sleep treatment rather than in isolation.',
            'chips' => ['Preventive care', 'Trigger tracking', 'Sleep support'],
        ],
        [
            'slot'  => 'cond-7',
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
            'alt'    => 'A clinician explaining treatment to a patient in an exam room',
            'detail' => 'In-office esketamine treatment for treatment-resistant depression, monitored start to finish.',
            'chips'  => ['Esketamine', 'In-office'],
        ],
        [
            'name'   => 'Ketamine',
            'slot'   => 'treat-5',
            'alt'    => 'An intravenous infusion line in a treatment room',
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

    'compare_rows' => [
        [
            'label'      => 'What it is',
            'therapy'    => 'Mental healthcare for emotional, behavioral or relationship challenges — often guided conversation.',
            'psychiatry' => 'Medical support for mental health conditions, often involving medication.',
        ],
        [
            'label'      => 'Who you meet with',
            'therapy'    => 'A licensed therapist (LCSW, LMFT, PhD/PsyD).',
            'psychiatry' => 'A psychiatric provider (MD, DO or PMHNP).',
        ],
        [
            'label'      => 'What they do',
            'therapy'    => 'Use evidence-based approaches — CBT, DBT, EMDR, ACT — to build coping skills and support growth.',
            'psychiatry' => 'Evaluate symptoms, provide a diagnosis where appropriate, and determine whether medication or TMS may help.',
        ],
        [
            'label'      => 'Can they prescribe medication?',
            'therapy'    => 'No.',
            'psychiatry' => 'Yes.',
        ],
        [
            'label'      => 'How sessions work',
            'therapy'    => 'Weekly or biweekly, about 60 minutes, focused on support and skill-building.',
            'psychiatry' => 'Starts with a 60-minute evaluation, then shorter, less frequent follow-ups.',
        ],
        [
            'label'      => 'Signs of a good fit',
            'therapy'    => 'You feel understood and supported, and are making progress toward your goals.',
            'psychiatry' => 'Your symptoms are improving and treatment feels manageable and medically appropriate.',
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

    'tms_stats' => [
        ['value' => '19 min', 'label' => 'per session',        'color' => '#e8922f'],
        ['value' => '36',     'label' => 'sessions in a course','color' => '#86be52'],
        ['value' => '0',      'label' => 'days of downtime',    'color' => '#ffffff'],
    ],

    'focus_paragraphs' => [
        'We are committed to forward-thinking, personalized psychiatric care for people living with depression, anxiety, postpartum mood changes, PTSD, tinnitus, migraines and OCD.',
        'We are patient-centered, thoughtful and intentional. Sixty-minute intakes, symptom scores at every visit, and the same clinician each time — a specialized experience coupled with treatment backed by evidence.',
        'Additionally, we deliver FDA-cleared TMS for treatment-resistant depression and OCD, and stay at the forefront of neuromodulation so medication is never the only answer we have.',
    ],
];
