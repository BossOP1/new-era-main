<?php
/**
 * Insurance and cost — content for insurance.php.
 *
 * The carriers themselves are not here: they live in $data['insurers'] in
 * data.php, which the homepage marquee and the TMS page also read, so the
 * list stays in one place.
 *
 * 'tms_criteria' is read by tms.php as well as insurance.php. It used to be an
 * inline array in tms.php; it is here so the two pages cannot drift apart.
 *
 * Accuracy notes, as elsewhere on this site:
 *   · Nothing here promises coverage. Every plan differs inside a carrier, so
 *     the page describes what is usual and always ends at "we verify yours".
 *   · No prices. The practice has not supplied self-pay rates — see the
 *     ⚠ note on 'self_pay' below before this page goes live.
 *   · The glossary defines the words insurers use, not the practice's own
 *     policy. Keep it general; it should stay true if the carrier list changes.
 */

return [

    /* ---- What we do, in order ---------------------------------------- */
    'steps' => [
        [
            'name' => 'You tell us who you are insured with',
            'copy' => 'On the phone or on the booking form — the carrier, the member ID, and the name on the policy. That is enough for us to start.',
        ],
        [
            'name' => 'We verify your benefits',
            'copy' => 'We call your plan and find out what it covers, what your deductible and copay are, and whether anything needs authorising first. This happens before your first appointment, not after it.',
        ],
        [
            'name' => 'We tell you the number',
            'copy' => 'What the plan pays, and what it leaves you. If that number is not one you want to proceed on, nothing has been booked and nothing is owed.',
        ],
        [
            'name' => 'We handle the authorisation',
            'copy' => 'Where a treatment needs signing off first — TMS and Spravato® usually do — the paperwork is ours. You may be asked to confirm which medications you have tried and when, and that is the extent of it.',
        ],
    ],

    /* ---- What coverage usually looks like, by treatment --------------- */
    'coverage' => [
        [
            'name'    => 'Psychiatry',
            'page'    => 'psychiatry.php',
            'icon'    => 'stethoscope',
            'typical' => 'Usually covered as a specialist visit, with a copay for the evaluation and for each follow-up.',
            'watch'   => 'Some plans treat the first, longer evaluation differently from the shorter reviews that follow it.',
        ],
        [
            'name'    => 'Therapy',
            'page'    => 'therapy.php',
            'icon'    => 'chat',
            'typical' => 'Usually covered per session, at a copay or a share of the session cost once any deductible is met.',
            'watch'   => 'A few plans still cap how many sessions they will cover in a year. Worth knowing in January rather than in October.',
        ],
        [
            'name'    => 'TMS therapy',
            'page'    => 'tms.php',
            'icon'    => 'coil',
            'typical' => 'Usually covered for treatment-resistant depression once the criteria below are met, and after prior authorisation.',
            'watch'   => 'A course is a block of sessions, so ask how the deductible and copay apply across the whole course rather than to one visit.',
        ],
        [
            'name'    => 'Spravato®',
            'page'    => 'spravato.php',
            'icon'    => 'spray',
            'typical' => 'Often covered for treatment-resistant depression, subject to prior authorisation. Texas clinics only.',
            'watch'   => 'The medication and the two hours of monitoring that follow each dose are billed separately. Ask for both numbers.',
        ],
    ],

    /* ---- When a plan will cover TMS -----------------------------------
       Also printed on tms.php, which reads this same array. */
    'tms_criteria' => [
        'A qualifying diagnosis, so the treatment is medically necessary',
        'Antidepressants tried, without an adequate response',
        'Some course of psychotherapy already undertaken',
    ],

    /* ---- The words on the paperwork ----------------------------------- */
    'glossary' => [
        [
            'term' => 'Deductible',
            'copy' => 'What you pay yourself each year before the plan starts paying. Until it is met you may be charged the full contracted rate for a visit, which is why a January appointment can cost more than a June one.',
        ],
        [
            'term' => 'Copay',
            'copy' => 'A fixed amount per visit — thirty dollars a session, say — that does not change with what the visit cost.',
        ],
        [
            'term' => 'Coinsurance',
            'copy' => 'A percentage of the cost rather than a fixed amount. Twenty per cent coinsurance on a two-hundred-dollar visit leaves you forty.',
        ],
        [
            'term' => 'Out-of-pocket maximum',
            'copy' => 'The ceiling. Once your own spending reaches it in a plan year, the plan covers the rest of your covered care. Worth knowing if a course of treatment is going to be expensive.',
        ],
        [
            'term' => 'In-network and out-of-network',
            'copy' => 'In-network means we have an agreed rate with your plan and bill it directly. Out-of-network means you may pay us and claim back, usually at a lower rate, and sometimes not at all.',
        ],
        [
            'term' => 'Prior authorisation',
            'copy' => 'Your insurer agreeing in advance to pay for something. TMS and Spravato® almost always need it. It is paperwork, it takes time, and it is ours to do.',
        ],
        [
            'term' => 'Medical necessity',
            'copy' => 'The test an insurer applies: is this treatment needed for this diagnosis, rather than preferred. It is why the record of what you have already tried matters so much.',
        ],
        [
            'term' => 'Explanation of benefits',
            'copy' => 'The statement your insurer sends after a claim, setting out what was billed, what they paid and what is left with you. It is not a bill, though it looks alarmingly like one.',
        ],
        [
            'term' => 'Superbill',
            'copy' => 'An itemised receipt you submit to your own insurer when we are out-of-network for your plan. We can produce one; what your plan reimburses is between you and them.',
        ],
        [
            'term' => 'Parity',
            'copy' => 'Federal law requires most plans to cover mental health care on terms no worse than they apply to physical health care. If a plan seems to be treating psychiatry differently, that is worth questioning rather than accepting.',
        ],
    ],

    /* ---- If the plan will not pay -------------------------------------
       ⚠ NO PRICES. The practice has not supplied self-pay rates, and
       inventing them on a healthcare site is not an option. The FAQ and the
       condition pages already say we "publish self-pay rates"; publishing
       them means putting the real figures here and printing them on the
       page. Until then this section says how it works, not what it costs. */
    'self_pay' => [
        [
            'name' => 'We quote the whole thing up front',
            'copy' => 'For a course of treatment you get the total before you agree to it, not a per-session figure to multiply yourself.',
        ],
        [
            'name' => 'Paying privately can be faster',
            'copy' => 'Private pay skips prior authorisation, which is occasionally the reason people choose it even when they are covered.',
        ],
        [
            'name' => 'A superbill, if you want to claim',
            'copy' => 'If we are out-of-network for your plan we can give you an itemised superbill to submit yourself.',
        ],
        [
            'name' => 'Payment plans',
            'copy' => 'We can walk you through one before you commit to anything. Ask the intake team what is possible.',
        ],
    ],

    /* ---- What to have in front of you when you call ------------------- */
    'ready' => [
        'Your insurance card, front and back',
        'The name and date of birth on the policy',
        'Which medications you have tried, and roughly when',
        'Whether you have had therapy, and for how long',
    ],
];
