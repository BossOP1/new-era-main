<?php
/**
 * Treatment page content — one entry per page, all rendered by
 * includes/treatment-page.php. TMS is not here: tms.php is bespoke.
 *
 * Every root page (psychiatry.php, therapy.php, spravato.php) names its key
 * and requires the template, the same arrangement as the condition pages.
 *
 * Shape of an entry
 *   hero        headline lines (one of them is the accent), lede, photograph
 *   what        opening explanation, a four-fact strip, a photograph beside it
 *   band        the one-line blue band
 *   options     optional cards: services, approaches, or who it is for
 *   process     a numbered walk-through beside a photograph, and three facts
 *   treats      optional grid of conditions; null where it would mislead
 *   panels      a dark photo panel and a plain "honest answers" panel
 *   faqs, cta
 *
 * Spravato wording follows the FDA label (2025, reference ID 5580441) rather
 * than the practice's old page, which described it as an infusion and called
 * it non-addictive. Neither is right: it is a nasal spray, and abuse and misuse
 * is one of its boxed warnings. Dot colours in 'honest' items are full class
 * names so Tailwind finds them — this directory is in its content paths.
 */

return [

/* ── Psychiatry ────────────────────────────────────────────────────── */
'psychiatry' => [
    'name'  => 'Psychiatry',
    'page'  => 'psychiatry.php',
    'title' => 'Psychiatry',
    'meta'  => 'Psychiatric evaluation and medication management from clinicians who take the time to know you. What a first visit involves, how medication is managed, and what psychiatry treats.',

    'hero' => [
        'lines'  => ['An hour to', 'understand you.', 'Then a plan.'],
        'accent' => 'Then a plan.',
        'lede'   => 'Psychiatry is the medical side of mental health care: diagnosis, and medication when it helps. Your first visit is a full diagnostic assessment, and you leave it with a written plan rather than a prescription pad.',
        'image'  => 'treatments/psychiatry-hero.jpg',
        'panel'  => '#e9eef1',
        'wash'   => '233 238 241',
        'cta'    => 'Book an evaluation',
        'note'   => 'Adults and adolescents from 13. In person and by telehealth.',
        'meta_left'  => 'In-network with most major plans.',
        'meta_right' => 'Evaluation / Medication management / Testing',
    ],

    'what' => [
        'lines'  => ['The medical side', 'of mental health.'],
        'accent' => 'of mental health.',
        'serif'  => 'Our psychiatric clinicians are psychiatrists and psychiatric nurse practitioners — licensed to diagnose, and to prescribe when medication is the right tool.',
        'paras'  => [
            'Psychiatry deals with the diagnosis and treatment of mental health conditions: depression, anxiety, OCD, PTSD, bipolar disorder and more. Where a therapist works through thoughts and behaviour, a psychiatric clinician also looks at the physical side — your medical history, other prescriptions, sleep, and anything that might be imitating a mental health condition.',
            'Medication is one option among several, not the default. Plenty of people do well with therapy alone or with TMS, and we will say so plainly rather than reaching for a prescription.',
        ],
        'facts' => [
            ['Evaluation', 'A full diagnostic assessment'],
            ['Medication', 'Prescribed, then followed up'],
            ['Testing',    'Cognitive and personality'],
            ['Telehealth', 'Or in person, your choice'],
        ],
        'note'      => 'If medication is not the right answer for you, the evaluation is where you find that out — not three months into a prescription.',
        'link'      => ['What the first visit involves', '#process'],
        'photo'     => 'treatments/psychiatry-doctor.jpg',
        'photo_alt' => 'A psychiatric clinician listening during a consultation',
        'focus'     => 'object-[50%_30%]',
        'caption'   => 'An hour, not fifteen minutes.',
    ],

    'band' => [
        'value'  => '60 min',
        'rest'   => 'for your first visit: a full diagnostic assessment, not a fifteen-minute script.',
        'note'   => 'You leave the same day with a written plan.',
        'source' => 'Our intake',
    ],

    'options' => [
        'rail'   => 'Services',
        'eyebrow'=> '02 / What psychiatry covers',
        'lines'  => ['Four services.', 'One clinician.'],
        'accent' => 'One clinician.',
        'intro'  => 'Most people need one or two of these. The evaluation decides which.',
        'items'  => [
            ['Psychiatric evaluation', 'A full diagnostic assessment of your history, health and symptoms, ending in a diagnosis and a written plan.', 'Start here'],
            ['Medication management',  'Prescribing, then following up: checking what is working, adjusting doses, and dealing with side effects rather than leaving you with them.', 'Ongoing'],
            ['Psychological testing',  'Standardised cognitive, personality and neuropsychological assessments, when a diagnosis needs more than a conversation.', 'When needed'],
            ['Coordinated care',       'Referral into therapy, TMS or Spravato® under the same roof, with one set of notes shared by everyone treating you.', 'Connected'],
        ],
    ],

    'process' => [
        'rail'   => 'First visit',
        'eyebrow'=> '03 / Your first visit',
        'lines'  => ['Sixty minutes.', 'A plan by the end.'],
        'accent' => 'A plan by the end.',
        'intro'  => 'We send the intake forms ahead of time, so the visit itself is all conversation.',
        'photo'     => 'treatments/psychiatry-notes.jpg',
        'photo_alt' => 'A clinician writing notes on a clipboard during an appointment',
        'focus'     => 'object-[50%_45%]',
        'caption'   => 'Everything written down.',
        'steps' => [
            ['Before you arrive', 'Intake forms by email, then a photo ID, your insurance card and a list of current medications on the day. We verify your benefits beforehand.'],
            ['Your history',      'Symptoms and how long they have been there, what you have already tried, your sleep, your physical health and your family history.'],
            ['A diagnosis',       'Your clinician tells you what they think is going on and why, in plain words, and answers whatever you ask.'],
            ['A written plan',    'Medication if it is warranted, therapy, TMS, or a combination — and what each is expected to do for you.'],
            ['Follow-up',         'Medication changes are checked every two to four weeks at first, then less often once things settle.'],
        ],
        'facts' => [
            ['60 min',  'first visit',              '#e8922f'],
            ['2–4 wks', 'between early follow-ups', '#5f8f38'],
            ['13+',     'ages we see',              '#0f639b'],
        ],
    ],

    'treats' => [
        'eyebrow' => '04 / What it treats',
        'lines'   => ['Every condition', 'we see.'],
        'accent'  => 'we see.',
        'intro'   => 'Psychiatric care sits underneath everything else we do, so it covers every condition on this site — and others, such as bipolar disorder and ADHD, that are not on it.',
        'flag'    => [],
        'flag_label' => '',
    ],

    'panels' => [
        'feature' => [
            'eyebrow' => 'Medication management',
            'heading' => 'Prescribing is the start of the work, not the end of it.',
            'copy'    => 'Antidepressants, mood stabilisers, anti-anxiety medication and stimulants all behave differently in different people. Your clinician chooses with your history in mind, checks in while it takes effect, and changes course when it is not working rather than waiting you out.',
            'photo'   => 'treat-3',
            'photo_alt' => 'A clinician talking with a patient during a consultation',
            'cta'     => 'Book an evaluation',
        ],
        'honest' => [
            'eyebrow' => 'Straight answers about medication',
            'heading' => 'What medication',
            'accent'  => 'can and cannot do.',
            'intro'   => 'Most people arrive with a worry about medication. These are the ones we hear most.',
            'items'   => [
                ['It takes time', 'Most antidepressants take several weeks to show their effect, and the first one tried is not always the one that works.', 'bg-brand-blue'],
                ['Side effects are common early', 'Nausea, sleep changes and headaches often settle within the first couple of weeks. Tell us rather than stopping.', 'bg-brand-orange'],
                ['You are not locked in', 'If a medication is not right we adjust or change it, and if you want to come off it we plan that with you.', 'bg-brand-green'],
            ],
            'note' => 'Never stop a psychiatric medication suddenly without talking to your prescriber. Some need to be tapered.',
        ],
    ],

    'faqs' => [
        ['What is the difference between a psychiatrist and a therapist?', 'A psychiatric clinician is medically trained and can diagnose and prescribe. A therapist treats through conversation and structured techniques such as CBT, and does not prescribe. Many people see both, and here they work in the same practice.'],
        ['Do I have to take medication?', 'No. Medication is one option among several. Many patients do well with therapy alone, or with TMS, and we will say so plainly rather than defaulting to a prescription.'],
        ['What happens at my first visit?', 'A sixty-minute diagnostic assessment covering your history, physical health, sleep and current symptoms. You leave the same day with a written plan.'],
        ['Can I be seen by telehealth?', 'Yes. Evaluations and follow-ups can both be done by video, and some people mix the two. A few medications carry rules about in-person visits, and we will tell you if one of them applies to you.'],
        ['Do you see teenagers?', 'We see patients aged 13 and up. Adolescent care includes family sessions and, with consent, coordination with school counselors.'],
        ['Will my insurance cover it?', 'Psychiatric evaluation and medication management are covered by most major commercial plans, as well as Medicare and Tricare. We verify your benefits before your first appointment.'],
    ],

    'cta' => [
        'lines'  => ['Start with', 'an evaluation.'],
        'accent' => 'an evaluation.',
        'copy'   => 'New patient appointments are usually available within five business days. We check your benefits first, so you know what a visit costs before you walk in.',
    ],
],

/* ── Therapy ───────────────────────────────────────────────────────── */
'therapy' => [
    'name'  => 'Therapy',
    'page'  => 'therapy.php',
    'title' => 'Therapy',
    'meta'  => 'Evidence-based therapy — CBT, DBT, EMDR, ACT and exposure work — with therapists who work alongside your prescriber. What each approach is for, and what a session is like.',

    'hero' => [
        'lines'  => ['Talking helps.', 'The right kind', 'helps more.'],
        'accent' => 'helps more.',
        'lede'   => 'Therapy is the part of care where you do the work, with someone trained to make it work. We use approaches with peer-reviewed evidence behind them, and match the approach to what you are dealing with.',
        'image'  => 'treatments/therapy-hero.jpg',
        'panel'  => '#ece8e3',
        'wash'   => '236 232 227',
        'cta'    => 'Book a first session',
        'note'   => 'In person and by telehealth. Ages 13 and up.',
        'meta_left'  => 'Therapists working alongside your prescriber.',
        'meta_right' => 'CBT / DBT / EMDR / ACT',
    ],

    'what' => [
        'lines'  => ['Not just', 'someone to talk to.'],
        'accent' => 'someone to talk to.',
        'serif'  => 'Evidence-based therapy is structured. Each approach has a method, a goal, and research showing what it helps with.',
        'paras'  => [
            'Everyone arrives with a different mix of history, symptoms and circumstance, so there is no one-size approach. Your therapist chooses a method to fit what you are dealing with, and tells you why.',
            'Therapy works on its own for many people. For others it works best alongside medication or TMS — and here, your therapist and your prescriber are in the same practice, reading the same notes.',
        ],
        'facts' => [
            ['Evidence-based', 'Peer-reviewed approaches'],
            ['Matched to you', 'The method fits the problem'],
            ['Connected',      'Works with your prescriber'],
            ['Flexible',       'In person or by telehealth'],
        ],
        'note'      => 'If the fit with your therapist is not right, you can switch at any time, at no extra cost and with no awkward conversation.',
        'link'      => ['Which approach is for what', '#options'],
        'photo'     => 'treatments/therapy-conversation.jpg',
        'photo_alt' => 'A woman holding a mug, talking across a table',
        'focus'     => 'object-[50%_35%]',
        'caption'   => 'Structured, not scripted.',
    ],

    'band' => [
        'value'  => '13+',
        'rest'   => 'is the age we start seeing patients, with family sessions for adolescents.',
        'note'   => 'With consent, we coordinate with school counselors.',
        'source' => 'Who we see',
    ],

    'options' => [
        'rail'   => 'Approaches',
        'eyebrow'=> '02 / The approaches',
        'lines'  => ['Six methods.', 'Matched to you.'],
        'accent' => 'Matched to you.',
        'intro'  => 'These are the approaches our therapists use most. You do not need to choose one — that part is our job.',
        'items'  => [
            ['Cognitive behavioural therapy', 'Identifies distorted thought patterns and the behaviours they drive, then practises reshaping both. The most studied therapy there is.', 'CBT'],
            ['Dialectical behaviour therapy', 'Emotion regulation, distress tolerance, mindfulness and interpersonal skills, for feelings that seem unmanageable.', 'DBT'],
            ['EMDR',                          'Eye movement desensitisation and reprocessing: guided bilateral stimulation that helps the brain reprocess traumatic memories.', 'Trauma'],
            ['Exposure-based therapy',        'Exposure and response prevention for OCD, and prolonged exposure for PTSD — facing what you avoid, gradually, until it loses its grip.', 'ERP · PE'],
            ['Acceptance and commitment',     'Making room for difficult thoughts rather than fighting them, and acting on what matters to you anyway.', 'ACT'],
            ['Psychodynamic therapy',         'Longer-term, in-depth work on how earlier experiences shape what is happening now.', 'In depth'],
        ],
    ],

    'process' => [
        'rail'   => 'A session',
        'eyebrow'=> '03 / What therapy is like',
        'lines'  => ['A conversation', 'with a structure.'],
        'accent' => 'with a structure.',
        'intro'  => 'Most people come weekly to begin with. Progress is reviewed monthly, and the plan changes if it is not working.',
        'photo'     => 'treatments/therapy-adolescent.jpg',
        'photo_alt' => 'A teenager talking with a therapist on a sofa',
        'focus'     => 'object-[62%_40%]',
        'caption'   => 'Ages 13 and up.',
        'steps' => [
            ['A first session',      'Mostly listening: what brought you here, what you want to change, and what has and has not helped before.'],
            ['Choosing an approach', 'Your therapist proposes a method and explains it. If it does not feel right, you say so.'],
            ['The work',             'Sessions have a focus. Many approaches include something to practise between them, because that is where much of the change happens.'],
            ['Reviewing progress',   'Each month you look at what has shifted, using simple measures as well as impressions, and adjust the plan.'],
            ['Adding or finishing',  'Some people add medication or TMS along the way. Others finish once their goals are met, with the door left open.'],
        ],
        'facts' => [
            ['Weekly',  'to begin with',    '#e8922f'],
            ['Monthly', 'progress reviews', '#5f8f38'],
            ['13+',     'ages we see',      '#0f639b'],
        ],
    ],

    'treats' => [
        'eyebrow' => '04 / What it treats',
        'lines'   => ['Useful for', 'all of them.'],
        'accent'  => 'all of them.',
        'intro'   => 'Therapy has a role in every condition we treat, from depression and anxiety to the distress that comes with tinnitus and chronic migraine.',
        'flag'    => [],
        'flag_label' => '',
    ],

    'panels' => [
        'feature' => [
            'eyebrow' => 'Therapy and prescribing, together',
            'heading' => 'Your therapist and your prescriber read the same notes.',
            'copy'    => 'Many people see a therapist in one place and a prescriber in another, and end up as the go-between. Here they work in the same practice, so a change in one part of your care is known to the other the same week.',
            'photo'   => 'treat-6',
            'photo_alt' => 'Two women talking during a therapy session',
            'cta'     => 'Book a first session',
        ],
        'honest' => [
            'eyebrow' => 'Finding the right fit',
            'heading' => 'What makes therapy',
            'accent'  => 'actually work.',
            'intro'   => 'The research is consistent on this: the relationship matters as much as the method.',
            'items'   => [
                ['Fit matters', 'Feeling understood by your therapist is one of the strongest predictors of progress. If it is not there, switch — we will match you with someone new.', 'bg-brand-blue'],
                ['It can feel harder first', 'Early sessions can feel slow, or even heavier, because you are talking about difficult things. That usually eases.', 'bg-brand-orange'],
                ['Between sessions counts', 'What you practise between appointments is where much of the change happens.', 'bg-brand-green'],
            ],
            'note' => 'Therapy is not crisis care. If you are in crisis, call or text 988 any time.',
        ],
    ],

    'faqs' => [
        ['Do I need therapy or psychiatry?', 'Therapy treats through conversation and structured techniques. Psychiatry adds diagnosis and medication. Many people start with one and add the other when it helps, and the first appointment is where we work out which.'],
        ['How long will I be in therapy?', 'It depends on what you are working on. Some focused approaches run for a set number of sessions; others are open-ended. Progress is reviewed monthly, so the length is a decision you make together.'],
        ['Can I switch therapists if it is not a fit?', 'Yes, any time. Our intake team will match you with someone new at no extra cost and no awkward conversation required.'],
        ['Is telehealth therapy as good as in person?', 'For most people and most approaches the research says yes. Some prefer the room, some prefer their own sofa, and you can change your mind.'],
        ['Do you see teenagers?', 'We see patients aged 13 and up. Adolescent care includes family sessions and, with consent, coordination with school counselors.'],
        ['Does insurance cover therapy?', 'Most major commercial plans cover therapy, as do Medicare and Tricare. We verify your benefits before your first appointment, so you know what a session costs.'],
    ],

    'cta' => [
        'lines'  => ['Start with', 'one conversation.'],
        'accent' => 'one conversation.',
        'copy'   => 'New patient appointments are usually available within five business days, in person or by telehealth.',
    ],
],

/* ── Spravato ──────────────────────────────────────────────────────── */
'spravato' => [
    'name'  => 'Spravato®',
    'page'  => 'spravato.php',
    'title' => 'Spravato® (esketamine)',
    'meta'  => 'Spravato® (esketamine) nasal spray for treatment-resistant depression, given under supervision in a certified clinic. Who it is for, what a treatment day involves, and the safety facts. Texas locations only.',

    'hero' => [
        'lines'  => ['When two', 'antidepressants', 'haven’t worked.'],
        'accent' => 'haven’t worked.',
        'lede'   => 'Spravato® is esketamine, an FDA-approved nasal spray for treatment-resistant depression. You take it yourself in our clinic, under a clinician’s supervision, and stay with us for at least two hours afterwards.',
        'image'  => 'treatments/spravato-hero.jpg',
        'panel'  => '#eceef0',
        'wash'   => '236 238 240',
        'cta'    => 'Ask about Spravato®',
        'note'   => 'Offered at our Texas locations only.',
        'meta_left'  => 'FDA-approved for treatment-resistant depression.',
        'meta_right' => 'Texas locations only',
    ],

    'what' => [
        'lines'  => ['A nasal spray,', 'not an infusion.'],
        'accent' => 'not an infusion.',
        'serif'  => 'Spravato® contains esketamine, a close chemical relative of ketamine, delivered as a nasal spray rather than through a drip.',
        'paras'  => [
            'It works differently from standard antidepressants. Rather than acting mainly on serotonin, esketamine blocks the NMDA receptor, part of the brain’s glutamate system. That different mechanism is why it can help people whose depression has not responded to the usual medications.',
            'Because it can cause sedation and a feeling of detachment, it is only given in certified clinics, under supervision, with monitoring afterwards. It is never sent home with you.',
        ],
        'facts' => [
            ['FDA-approved', 'For treatment-resistant depression'],
            ['Nasal spray',  'Self-given, under supervision'],
            ['Monitored',    'At least 2 hours after each dose'],
            ['No driving',   'Until the next day, after sleep'],
        ],
        'note'      => 'Spravato® is a Schedule III controlled medication, prescribed only after a full psychiatric evaluation.',
        'link'      => ['What a treatment day involves', '#process'],
        'photo'     => 'treatments/spravato-spray.jpg',
        'photo_alt' => 'A person using a nasal spray',
        'focus'     => 'object-[50%_40%]',
        'caption'   => 'Self-given, never unsupervised.',
    ],

    'band' => [
        'value'  => '2 hours',
        'rest'   => 'minimum monitoring after every dose, in the clinic, before you can leave.',
        'note'   => 'Required for every patient at every session.',
        'source' => 'FDA label',
    ],

    'options' => [
        'rail'   => 'Who it’s for',
        'eyebrow'=> '02 / Who it is for',
        'lines'  => ['Two uses.', 'Both for adults.'],
        'accent' => 'Both for adults.',
        'intro'  => 'Spravato® is approved for two specific situations, and a psychiatric evaluation decides whether you fit either of them.',
        'items'  => [
            ['Treatment-resistant depression', 'Depression that has not improved after at least two antidepressants. Spravato® can be used on its own or alongside an oral antidepressant.', 'Adults'],
            ['Depression with suicidal thoughts', 'Depressive symptoms in adults with major depressive disorder and acute suicidal thoughts or behaviour, used alongside an oral antidepressant.', 'Adults'],
            ['Not suitable for', 'Anyone with aneurysmal vascular disease, an arteriovenous malformation, a history of bleeding in the brain, or an allergy to esketamine or ketamine. Not recommended in pregnancy.', 'Screened for'],
        ],
    ],

    'process' => [
        'rail'   => 'Treatment day',
        'eyebrow'=> '03 / A treatment day',
        'lines'  => ['Two hours with us.', 'Then a lift home.'],
        'accent' => 'Then a lift home.',
        'intro'  => 'Treatment runs twice a week for the first month, then less often. Every session follows the same routine.',
        'photo'     => 'homepage/home-ambience-nera.webp',
        'photo_alt' => 'A quiet treatment room with a reclining chair, a side table and monitoring equipment',
        'focus'     => 'object-[40%_60%]',
        'caption'   => 'Two quiet hours.',
        'steps' => [
            ['Blood pressure first',   'Esketamine can raise blood pressure, so it is checked before every dose. If it is too high, the session waits.'],
            ['You take the spray',     'You give yourself the dose, one device at a time with a short rest between, while a clinician watches and guides you.'],
            ['You rest',               'Most people sit back in a reclining chair. Feeling detached, dizzy or sleepy is common, and it passes.'],
            ['We monitor you',         'A clinician stays with you for at least two hours and checks your blood pressure again before you are cleared to go.'],
            ['Someone drives you home','You must not drive or operate machinery until the next day, after a restful sleep. Arrange your lift before you come.'],
        ],
        'facts' => [
            ['2×',    'a week, weeks 1–4', '#e8922f'],
            ['1×',    'a week, weeks 5–8', '#5f8f38'],
            ['2 hrs', 'minimum monitoring', '#0f639b'],
        ],
    ],

    // Deliberately no grid of conditions: Spravato is approved for depression
    // alone, and seven condition tiles would suggest otherwise.
    'treats' => null,

    'panels' => [
        'feature' => [
            'eyebrow' => 'Texas locations only',
            'heading' => 'Only in certified clinics, and only at ours in Texas.',
            'copy'    => 'Spravato® is distributed under a federal safety programme that restricts it to certified healthcare settings. We offer it at our Texas locations. If you are in California, TMS is often the next step for treatment-resistant depression, and we can talk it through with you.',
            'photo'   => 'faq.jpg',
            'photo_alt' => 'A bright clinic room with chairs arranged around a low table',
            'cta'     => 'Ask about Spravato®',
        ],
        'honest' => [
            'eyebrow' => 'Safety',
            'heading' => 'The safety facts,',
            'accent'  => 'in plain words.',
            'intro'   => 'Spravato® carries a boxed warning, the FDA’s most prominent kind. This is what it covers.',
            'items'   => [
                ['Sedation and dissociation', 'Sleepiness, and feeling detached from yourself or your surroundings, are common after a dose. It is why you stay with us for at least two hours.', 'bg-brand-orange'],
                ['Breathing and blood pressure', 'Slowed breathing has been reported, and blood pressure can rise. Both are watched during every session.', 'bg-[#c05621]'],
                ['Abuse and misuse', 'Esketamine can be misused, which is why it is only ever given in the clinic and never sent home.', 'bg-brand-blue'],
                ['Suicidal thoughts', 'Antidepressants can increase suicidal thoughts in some younger adults. Tell us straight away if your mood worsens or new thoughts of suicide appear.', 'bg-brand-green'],
            ],
            'note' => 'Spravato® does not replace emergency care. If you are thinking about suicide right now, call or text 988, or go to your nearest emergency room.',
        ],
    ],

    'faqs' => [
        ['Is Spravato® the same as a ketamine infusion?', 'No. Spravato® contains esketamine, a close relative of ketamine, and it is a nasal spray rather than an IV drip. It is FDA-approved for depression and given only in certified clinics under a federal safety programme.'],
        ['Who can have it?', 'Adults with depression that has not responded to at least two antidepressants, or adults with major depressive disorder and acute suicidal thoughts or behaviour alongside an oral antidepressant. A full psychiatric evaluation comes first, including screening for the conditions that rule it out.'],
        ['What are the common side effects?', 'Feeling disconnected from yourself or your surroundings, dizziness, nausea, sleepiness or low energy, anxiety, and a rise in blood pressure. Most settle within the monitoring period, which is what the two hours are for.'],
        ['Why can’t I drive afterwards?', 'Esketamine affects attention, judgement and reaction time. You must not drive or operate machinery until the next day, after a restful sleep — even if you feel fine.'],
        ['How long is a course?', 'Twice a week for the first four weeks, then once a week for weeks five to eight. After that, sessions are weekly or every two weeks, set at the least frequent schedule that keeps you well.'],
        ['Is it available in California?', 'Not at Anew Era. We offer Spravato® at our Texas locations only. In California, TMS is often the next step for treatment-resistant depression, and we can talk it through with you.'],
        ['Does insurance cover it?', 'Many plans cover Spravato® for treatment-resistant depression, usually with prior authorisation. We verify your benefits and handle the paperwork before your first session.'],
    ],

    'cta' => [
        'lines'  => ['Find out if', 'Spravato® fits.'],
        'accent' => 'Spravato® fits.',
        'copy'   => 'It starts with a psychiatric evaluation. We check whether you are a candidate, verify your coverage, and tell you honestly if TMS or another option would serve you better.',
    ],
],

];
