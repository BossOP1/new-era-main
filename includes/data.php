<?php
/**
 * All page content lives here as plain PHP arrays, so copy can be edited
 * without touching markup. Templates loop over these.
 */

return [
    // The carriers the practice is in network with, and where. Set as plain
    // names rather than logos — a mixed set of marks at different weights
    // never reads as one row, and carrier logos carry usage rules of their own.
    'insurers' => [
        ['name' => 'Aetna', 'states' => 'CA & TX',],
        ['name' => 'Anthem Blue Cross', 'states' => 'CA',],
        ['name' => 'Baylor Scott & White', 'states' => 'TX'],
        ['name' => 'Blue Cross Blue Shield of TX', 'states' => 'TX'],
        ['name' => 'Blue Shield of California', 'states' => 'CA'],
        ['name' => 'Cigna', 'states' => 'CA & TX',],
        ['name' => 'Healthnet', 'states' => 'CA & TX'],
        ['name' => 'Humana', 'states' => 'TX'],
        ['name' => 'Magellan / MHSA', 'states' => 'CA & TX'],
        ['name' => 'MHN', 'states' => 'CA & TX'],
        ['name' => 'Optum', 'states' => 'CA & TX'],
        ['name' => 'Oscar', 'states' => 'CA & TX'],
        ['name' => 'Tricare-West', 'states' => 'CA'],
        ['name' => 'Tricare-East', 'states' => 'TX'],
        ['name' => 'Triwest CCN', 'states' => 'CA & TX'],
        ['name' => 'United Healthcare', 'states' => 'CA & TX'],
    ],

    'conditions' => [
        [
            'slot'  => 'cond-1',
            'focus' => 'object-left',   // wide crop keeps the subject clear of the info card
            'icon'  => 'cloud-rain',
            'art'   => 'depression',
            'alt'   => 'A woman laughing outdoors in warm light',
            'name'  => 'Depression',
            'page'  => 'depression.php',   // has a condition page of its own
            'blurb' => 'Persistent low mood, loss of interest, and the treatment-resistant cases other clinics give up on.',
            'chips' => ['Medication', 'Therapy', 'TMS'],
        ],
        [
            'slot'  => 'cond-2',
            'focus' => 'object-left',   // wide crop keeps the subject clear of the info card
            'icon'  => 'pulse',
            'art'   => 'anxiety',
            'page'  => 'anxiety.php',
            'alt'   => 'A woman laughing on an open road, hair caught by the wind',
            'name'  => 'Anxiety',
            'blurb' => 'Generalised anxiety, panic disorder, social anxiety and the physical symptoms that come with them.',
            'chips' => ['CBT', 'Exposure work', 'Medication'],
        ],
        [
            'slot'  => 'cond-3',
            'focus' => 'object-left',   // wide crop keeps the subject clear of the info card
            'icon'  => 'parent-child',
            'art'   => 'postpartum',
            'page'  => 'postpartum.php',
            'alt'   => 'A mother holding her smiling baby outdoors',
            'name'  => 'Postpartum',
            'blurb' => 'Postpartum depression and anxiety, treated with options that fit feeding, sleep and a new baby.',
            'chips' => ['Therapy', 'Medication review', 'TMS'],
        ],
        [
            'slot'  => 'cond-4',
            'focus' => 'object-left',   // wide crop keeps the subject clear of the info card
            'icon'  => 'shield-bolt',
            'art'   => 'ptsd',
            'page'  => 'ptsd.php',
            'alt'   => 'Two people laughing together in a sunlit field',
            'name'  => 'PTSD',
            'blurb' => 'Trauma-focused therapy at your pace, with clinicians trained in EMDR and prolonged exposure.',
            'chips' => ['EMDR', 'Prolonged exposure', 'Medication'],
        ],
        [
            'slot'  => 'cond-5',
            'focus' => 'object-left',   // wide crop keeps the subject clear of the info card
            'icon'  => 'ear-waves',
            'art'   => 'tinnitus',
            'page'  => 'tinnitus.php',
            'alt'   => 'A man laughing, head tilted back',
            'name'  => 'Tinnitus',
            'blurb' => 'Persistent ringing that disrupts sleep and mood — addressed with retraining therapy and TMS protocols.',
            'chips' => ['TMS', 'Sound retraining', 'Sleep support'],
        ],
        [
            'slot'  => 'cond-6',
            'focus' => 'object-left',   // wide crop keeps the subject clear of the info card
            'icon'  => 'head-bolt',
            'art'   => 'migraines',
            'page'  => 'migraines.php',
            'alt'   => 'A man smiling among trees on a bright day',
            'name'  => 'Migraines',
            'blurb' => 'Chronic migraine care coordinated with your mood and sleep treatment rather than in isolation.',
            'chips' => ['Preventive care', 'Trigger tracking', 'Sleep support'],
        ],
        [
            'slot'  => 'cond-7',
            'focus' => 'object-left',   // wide crop keeps the subject clear of the info card
            'icon'  => 'loop',
            'art'   => 'ocd',
            'page'  => 'ocd.php',
            'alt'   => 'A man in an orange jacket smiling',
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
            'name'   => 'Spravato®',
            'slot'   => 'treat-4',
            'alt'    => 'A person self-administering a nasal spray',
            'detail' => 'In-office esketamine treatment for treatment-resistant depression, monitored start to finish. Offered at our Texas locations only.',
            'chips'  => ['Esketamine', 'Texas only'],
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
            'psychiatry' => 'A full diagnostic picture first, then a plan: medication, TMS, Spravato®, or none of them if none is warranted.',
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
        ['quote' => '"Spravato® got me out of a depressive episode nothing else had touched. The team monitored every session closely."', 'who' => 'Renee T.'],
        ['quote' => '"My therapist and prescriber actually talk to each other. I have never had that before and it changed everything."', 'who' => 'Jordan M.'],
        ['quote' => '"Accelerated TMS fit into one week off work instead of two months of daily visits. Results came just as fast."', 'who' => 'Sam O.'],
        ['quote' => '"Telehealth visits in the evening meant I never had to choose between therapy and my job."', 'who' => 'Layla H.'],
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
    /* ------------------------------------------------------------------ *
     * Depression — copy for depression.php.
     *
     * Every figure here is an attributed, published epidemiological one
     * (NIMH, Gallup, the APA, the Cleveland Clinic) rather than a practice
     * outcome. Outcome claims on a psychiatry site are regulated marketing —
     * see the note above 'results' — so nothing in this block asserts how
     * well our own patients do.
     * ------------------------------------------------------------------ */
    'depression' => [

        // The four symptoms someone recognises themselves in fastest, used as
        // the card beside the opening explanation.
        'signs' => [
            'Difficulty concentrating',
            'Changes in appetite and weight',
            'Sleeping problems',
            'Sadness, emptiness or hopelessness that lasts',
        ],

        // Prevalence. Sources are printed on the page beneath the row.
        'stats' => [
            ['value' => '15M',   'label' => 'American adults report a depressive episode each year',   'source' => 'NIMH'],
            ['value' => '30%',   'label' => 'of US adults had been diagnosed with depression by 2023', 'source' => 'Gallup'],
            ['value' => '34%',   'label' => 'of 18–29s by 2023, up from 20.4% six years earlier',     'source' => 'Gallup'],
            ['value' => '70%',   'label' => 'chance for an identical twin when the other has depression', 'source' => 'APA'],
        ],

        'risk_factors' => [
            [
                'number' => '01',
                'name'   => 'Chemical',
                'copy'   => 'Differences in neurotransmitters such as dopamine and serotonin can contribute to depression developing.',
                'tag'    => 'Neurochemistry',
            ],
            [
                'number' => '02',
                'name'   => 'Environmental',
                'copy'   => 'Exposure to violence, poverty, abuse or neglect raises the likelihood that depression takes hold.',
                'tag'    => 'Circumstance',
            ],
            [
                'number' => '03',
                'name'   => 'Genetic',
                'copy'   => 'Close relatives with depression are a known risk factor. The APA puts the concordance for identical twins at around 70%.',
                'tag'    => 'Family history',
            ],
            [
                'number' => '04',
                'name'   => 'Personality',
                'copy'   => 'Being easily overwhelmed by stress, low self-esteem and a generally pessimistic outlook are all associated with higher risk.',
                'tag'    => 'Temperament',
            ],
        ],

        // The DSM criteria for major depressive disorder, in plain words.
        'mdd_symptoms' => [
            'A depressed mood through the day, nearly every day',
            'Loss of interest in things you used to enjoy',
            'Significant weight change or appetite swings',
            'Insomnia, or sleeping far more than usual',
            'Fatigue and low energy',
            'Feelings of worthlessness or guilt',
            'Trouble concentrating or making decisions',
            'Recurring thoughts of death, or suicidal ideation',
        ],

        // The four forms of depression the page walks through. 'slot' feeds
        // image_slot(); the panel swaps as you move down the list.
        'types' => [
            [
                'key'     => 'mdd',
                'name'    => 'Major depressive disorder',
                'short'   => 'MDD',
                'copy'    => 'Persistent sadness, loss of interest in activities and appetite changes, lasting two weeks or longer.',
                'slot'    => 'cond-1',
                'alt'     => 'A woman laughing outdoors in warm light',
                'caption' => 'The most common form, and highly treatable.',
            ],
            [
                'key'     => 'postpartum',
                'name'    => 'Postpartum depression',
                'short'   => 'Postpartum',
                'copy'    => 'Depression that arrives in the weeks after giving birth. At its most severe it can interrupt a mother’s ability to care for her baby.',
                'slot'    => 'cond-3',
                'alt'     => 'A mother holding her smiling baby outdoors',
                'caption' => 'Treated around feeding, sleep and a new baby.',
            ],
            [
                'key'     => 'sad',
                'name'    => 'Seasonal affective disorder',
                'short'   => 'Seasonal',
                'copy'    => 'Depression that follows the turn of the seasons, most often in winter, and is thought to track the loss of daylight.',
                'slot'    => 'cond-6',
                'alt'     => 'A man smiling among trees on a bright day',
                'caption' => 'Predictable in timing — which makes it plannable.',
            ],
            [
                'key'     => 'trd',
                'name'    => 'Treatment-resistant depression',
                'short'   => 'Treatment-resistant',
                'copy'    => 'Depression that has not lifted on antidepressants. The Cleveland Clinic marks it from two medications tried without improvement.',
                'slot'    => 'tms.jpg',
                'alt'     => 'A man sitting forward on a couch, hands clasped',
                'caption' => 'The form TMS was cleared for.',
            ],
        ],

        'diagnosis_steps' => [
            [
                'number' => '01',
                'name'   => 'A conversation, first',
                'copy'   => 'A clinical interview about your daily life, your behaviour and substance use, the feelings you have been having, and how long they have been going on.',
            ],
            [
                'number' => '02',
                'name'   => 'Questionnaires',
                'copy'   => 'Standardised screens such as the PHQ-9 put a number on what you describe, so change can be tracked rather than guessed at.',
            ],
            [
                'number' => '03',
                'name'   => 'Physical checks',
                'copy'   => 'Thyroid disorders and other physical conditions mimic depression closely. A blood test rules them out before anyone settles on a plan.',
            ],
        ],

        'tms_benefits' => [
            ['name' => 'Drug-free',            'copy' => 'No medication, so none of the side effects that come with one.'],
            ['name' => 'FDA-cleared',          'copy' => 'An established treatment for treatment-resistant depression.'],
            ['name' => 'Non-invasive',         'copy' => 'No anesthesia and no sedation. You stay awake throughout.'],
            ['name' => 'Mood, energy, sleep',  'copy' => 'Patients report movement across all three, not mood alone.'],
            ['name' => 'Minimal side effects', 'copy' => 'Mild scalp irritation or a headache, which usually settles.'],
        ],

        'tms_facts' => [
            ['value' => '30–40 min', 'label' => 'a typical session',        'color' => '#e8922f'],
            ['value' => '4–6 weeks', 'label' => 'for a full course',        'color' => '#86be52'],
            ['value' => '0',         'label' => 'days of recovery time',    'color' => '#ffffff'],
        ],

        'support_points' => [
            ['name' => 'Choose your words',   'copy' => 'Avoid anything that shrinks what they are going through — “snap out of it” lands as dismissal, and it closes the conversation.'],
            ['name' => 'Listen without fixing','copy' => 'Space to say how it actually is makes someone feel less alone, and more open to a next step.'],
            ['name' => 'Learn about it',       'copy' => 'Understanding how depression works lets you respond from a grounded place rather than a worried one.'],
            ['name' => 'Encourage gently',     'copy' => 'Offer to help find a clinician, or to come to the appointment. Practical help makes the process smaller.'],
            ['name' => 'Be patient',           'copy' => 'Recovery is not linear. Stay in touch even when they pull away, and skip the pressure to “get better”.'],
            ['name' => 'Watch for warning signs','copy' => 'Talk of self-harm or hopelessness is to be taken seriously. If you believe someone is in danger, call emergency services.'],
            ['name' => 'Look after yourself',  'copy' => 'Supporting someone through depression is draining. Rest and your own support are what let you keep showing up.'],
        ],

        'untreated_gains' => [
            'Understand what is actually driving how you feel',
            'Build tools that hold up on the harder days',
            'Get real insight into yourself along the way',
            'Move towards a life that feels like yours again',
        ],

        'faqs' => [
            [
                'q' => 'Is depression common?',
                'a' => 'It is one of the most common mental health conditions in the United States. The NIMH reports that nearly 15 million American adults experience a depressive episode each year, and Gallup found diagnosed depression rose from about 21% of adults in 2017 to almost 30% in 2023.',
            ],
            [
                'q' => 'How is depression diagnosed?',
                'a' => 'Through both a psychological and a physical assessment, and only by a medical professional. Expect a clinical interview, one or more questionnaires, and questions about your physical health — sometimes a blood test, because conditions such as thyroid disorders produce symptoms that look a great deal like depression.',
            ],
            [
                'q' => 'What counts as treatment-resistant depression?',
                'a' => 'Depression that has not responded to antidepressants. The Cleveland Clinic marks the diagnosis from the point where at least two different antidepressants have failed to improve symptoms. It is common, it is not a dead end, and it is the group TMS was cleared for.',
            ],
            [
                'q' => 'Does TMS hurt?',
                'a' => 'No anesthesia or sedation is involved and you stay awake for the whole session. Most people describe a tapping sensation on the scalp. Some get mild scalp irritation or a headache early in the course, which typically settles as treatment goes on.',
            ],
            [
                'q' => 'How long does a course of TMS take?',
                'a' => 'A session runs roughly 30 to 40 minutes, and a full course spans four to six weeks. There is no recovery time afterwards — patients drive themselves home and go back to their day. Accelerated protocols compress the same course into days for people who need it faster.',
            ],
            [
                'q' => 'Will my insurance cover TMS for depression?',
                'a' => 'For treatment-resistant depression, most plans do once two or more medications have been tried. We verify your benefits and handle the prior authorisation before you commit to anything.',
            ],
        ],

        // The short edition of the page (depression-short.php) drops the risk
        // factors, the diagnosis walk-through and the carer's guide, so its FAQ
        // has to carry the two of those a patient still asks about — and it
        // stops repeating the sections that survived. Cost and the first visit
        // move in, because nothing else on that page answers them.
        'faqs_short' => [
            [
                'q' => 'What happens at my first visit?',
                'a' => 'A full diagnostic assessment rather than a fifteen-minute script. We go through your history, your physical health, your sleep and your current symptoms, and you leave the same day with a written plan. Nothing is prescribed before somebody understands the whole picture.',
            ],
            [
                'q' => 'How is depression diagnosed?',
                'a' => 'Through both a psychological and a physical assessment, and only by a medical professional. Expect a clinical interview, a questionnaire such as the PHQ-9, and questions about your physical health. Sometimes a blood test, because conditions such as thyroid disorders produce symptoms that look a great deal like depression.',
            ],
            [
                'q' => 'Does TMS hurt?',
                'a' => 'No anesthesia or sedation is involved and you stay awake throughout. Most people describe a tapping sensation on the scalp. Some get mild scalp irritation or a headache early in the course, which typically settles as treatment goes on.',
            ],
            [
                'q' => 'Will my insurance cover TMS for depression?',
                'a' => 'For treatment-resistant depression, most plans do once two or more medications have been tried. We verify your benefits and handle the prior authorisation before you commit to anything.',
            ],
            [
                'q' => 'What if I am not covered?',
                'a' => 'We publish self-pay rates rather than quoting them case by case, and we can walk you through a payment plan before you agree to a course. You will know what a visit costs before you walk in.',
            ],
            [
                'q' => 'Is depression common?',
                'a' => 'It is one of the most common mental health conditions in the United States. The NIMH reports that nearly 15 million American adults experience a depressive episode each year, and Gallup found diagnosed depression rose from about 21% of adults in 2017 to almost 30% in 2023.',
            ],
        ],

        // Also treated with TMS. Keys match the 'art' values in 'conditions'
        // above, so condition_mark() finds the same artwork.
        'related' => ['anxiety', 'migraines', 'ocd', 'ptsd', 'postpartum', 'tinnitus'],
    ],
];
