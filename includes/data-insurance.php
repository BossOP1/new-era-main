<?php
/**
 * Insurance and cost — content for insurance.php.
 *
 * The carriers themselves are not here: they live in $data['insurers'] in
 * data.php, which the homepage marquee and the TMS page also read, so the
 * list stays in one place.
 *
 * 'tms_criteria' is read by tms.php. 'coverage' is not printed anywhere at
 * the moment: the by-treatment section was taken off insurance.php after
 * review, and the copy is kept here in case it comes back.
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
            'copy' => 'We call your plan and find out what it covers, what your deductible and copay are, and whether anything needs authorizing first. This happens before your first appointment, not after it.',
        ],
        [
            'name' => 'We tell you the cost',
            'copy' => 'You’ll know what the plan covers and what it doesn’t.',
        ],
        [
            'name' => 'We handle the authorization',
            'copy' => 'Where a treatment needs signing off first — TMS and Spravato® usually do — the paperwork is ours. You may be asked to confirm which medications you have tried and when.',
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
            'typical' => 'Usually covered for treatment-resistant depression once the criteria below are met, and after prior authorization.',
            'watch'   => 'A course is a block of sessions, so ask how the deductible and copay apply across the whole course rather than to one visit.',
        ],
        [
            'name'    => 'Spravato®',
            'page'    => 'spravato.php',
            'icon'    => 'spray',
            'typical' => 'Often covered for treatment-resistant depression, subject to prior authorization. Texas clinics only.',
            'watch'   => 'The medication and the two hours of monitoring that follow each dose are billed separately. Ask for both numbers.',
        ],
    ],

    /* ---- When a plan will cover TMS -----------------------------------
       Printed on tms.php. */
    'tms_criteria' => [
        'A qualifying diagnosis, so the treatment is medically necessary',
        'Antidepressants tried, without an adequate response',
        'Some course of psychotherapy already undertaken',
    ],

    /* ---- The words on the paperwork ----------------------------------- */
    'glossary' => [
        [
            'term' => 'Deductible',
            'copy' => 'What you pay yourself each plan year before the plan starts paying. Until it is met, you may be charged the full contracted rate for a visit.',
        ],
        [
            'term' => 'Copay',
            'copy' => 'A fixed amount per visit — thirty dollars a session, say — that does not change with what the visit cost.',
        ],
        [
            'term' => 'Coinsurance',
            'copy' => 'The share of the cost of a covered service that you pay, as a percentage, after your deductible is met. For example: with 20% coinsurance on a $200 visit, you pay $40.',
        ],
        [
            'term' => 'Out-of-pocket maximum',
            'copy' => 'Once your own spending reaches this limit in a plan year, the plan covers the rest of your covered care.',
        ],
        [
            'term' => 'In-network and out-of-network',
            'copy' => 'In-network means we have an agreed rate with your plan and bill it directly. Out-of-network means you may pay us out of pocket.',
        ],
        [
            'term' => 'Prior authorization',
            'copy' => 'Your insurer agreeing in advance to pay for something. TMS and Spravato® almost always need it.',
        ],
        [
            'term' => 'Medical necessity',
            'copy' => 'The standard an insurer uses to decide whether a treatment is needed for your diagnosis. Your record of past treatments helps show this.',
        ],
        [
            'term' => 'Explanation of benefits',
            'copy' => 'The statement your insurer sends after a claim, setting out what was billed, what they paid and what is left with you. It is not a bill, though it looks like one.',
        ],
        [
            'term' => 'Superbill',
            'copy' => 'An itemized receipt you submit to your own insurer when we are out-of-network for your plan. We can produce one for you, too.',
        ],
        [
            'term' => 'Parity',
            'copy' => 'A federal law that requires most plans to cover mental health care on terms no more restrictive than those for physical health care.',
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
            'copy' => 'Private pay can skip prior authorization of the treatment.',
        ],
        [
            'name' => 'A superbill, if you want to claim',
            'copy' => 'If we are out-of-network for your plan we can give you an itemized superbill to submit yourself.',
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
