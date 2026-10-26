<?php
/**
 * Condition page content — one entry per page, all rendered by
 * includes/condition-page.php.
 *
 * Every page file at the root (anxiety.php, ptsd.php, …) is four lines: it
 * names its key here and requires the template. Adding a condition means
 * adding an entry below plus that four-line file, and nothing else.
 *
 * Shape of an entry
 *   name, art          the condition, and the key its artwork uses in
 *                      assets/img/conditions/ — shared with $data['conditions']
 *   hero               headline lines (the last is the accented one), lede,
 *                      the photograph and where to sit it
 *   what               the opening explanation, plus the four-item signs card
 *   stat               the one-line prevalence band
 *   symptoms           the numbered list and the photograph beside it
 *   groups             optional second list, rendered as cards on a tinted band
 *   tms                the blue panel and the photo panel that follow it
 *   untreated          optional: what happens if it is left, and what care gives
 *   faqs               the accordion
 *
 * Figures are attributed to whoever published them. Nothing here claims an
 * outcome for our own patients — see the note above 'results' in data.php.
 */

return [

/* ── Anxiety ───────────────────────────────────────────────────────── */
'anxiety' => [
    'name'  => 'Anxiety',
    'art'   => 'anxiety',
    'title' => 'Anxiety',
    'meta'  => 'Anxiety that will not switch off is treatable. Understand the symptoms, what drives it, and how TMS helps when medication and therapy have not been enough.',

    'hero' => [
        'keyword' => 'Anxiety Treatment',
        'lines' => ['Anxiety isn’t nerves.', 'It’s a body that', 'won’t stand down.'],
        'accent' => 'won’t stand down.',
        'lede'  => 'Worry and fear are ordinary responses to a hard day. When the response outlasts the thing that caused it, and arrives with no cause at all, that is an anxiety disorder — and it answers to treatment.',
        'image' => 'conditions/anxiety-hero.jpg',
        'alt'   => 'A woman standing outdoors in soft daylight, eyes closed',
        'panel' => '#f2e9dc',
        'wash'  => '242 233 220',
    ],

    'what' => [
        'eyebrow' => '01 / What it is',
        'lines'   => ['Fear without', 'a reason.'],
        'accent'  => 'a reason.',
        'serif'   => 'Anxiety is a normal emotion. An anxiety disorder is what happens when it stops being proportionate to anything.',
        'paras'   => [
            'Most people feel anxious before a presentation or a procedure. Sometimes that is useful. It becomes a disorder when the feeling is constant and grinding, arrives without a trigger, and starts deciding what you will and will not do.',
            'Left alone it puts real strain on the body, and it has a habit of narrowing a life one avoided situation at a time. It is also one of the most treatable conditions in psychiatry.',
        ],
        'signs_title' => 'Emotional symptoms',
        'signs' => [
            'A sense of impending danger or dread',
            'Constantly on edge, irritable or restless',
            'Trouble concentrating',
            'Intrusive or obsessive thoughts',
        ],
        'signs_note' => 'Recognising yourself here is not a diagnosis. Only a clinician can make one, and that is a conversation rather than a test you pass or fail.',
    ],

    'stat' => [
        'value'  => '40 million',
        'rest'   => 'American adults live with an anxiety disorder each year.',
        'note'   => 'It is the most common mental health condition in the country.',
        'source' => 'ADAA',
    ],

    'symptoms' => [
        'eyebrow' => '02 / Signs and symptoms',
        'lines'   => ['Anxiety shows up', 'in the body too.'],
        'accent'  => 'in the body too.',
        'intro'   => 'The physical symptoms are often what sends someone to a doctor first, and they are frequently mistaken for a heart problem.',
        'photo'   => 'cond-2',
        'photo_alt' => 'A woman breathing deliberately, outdoors',
        'caption' => 'Not in your head. In your chest, too.',
        'list' => [
            'A rapid or pounding heartbeat',
            'Shortness of breath, or hyperventilating',
            'Sweating and trembling',
            'Feeling weak, or as though you might faint',
            'A sense of impending danger or dread',
            'Restlessness that will not settle',
            'Difficulty concentrating on anything else',
            'Sleep that will not come, or will not hold',
        ],
    ],

    'groups' => [
        'eyebrow' => '03 / The anxiety disorders',
        'lines'   => ['One word.', 'Six conditions.'],
        'accent'  => 'Six conditions.',
        'intro'   => 'Anxiety disorders are a family rather than a single diagnosis. Which one you have decides what is worth trying first.',
        'items' => [
            ['name' => 'Generalised anxiety', 'copy' => 'Constant, unfocused worry that attaches itself to whatever is nearest.', 'tag' => 'GAD'],
            ['name' => 'Panic disorder',      'copy' => 'Sudden surges of fear with full physical symptoms, and the fear of the next one.', 'tag' => 'Panic attacks'],
            ['name' => 'Social anxiety',      'copy' => 'Intense fear of being watched or judged, strong enough to reshape a week.', 'tag' => 'Social'],
            ['name' => 'Phobias',             'copy' => 'Fear fixed on a specific object or situation, out of proportion to the risk.', 'tag' => 'Specific'],
            ['name' => 'Obsessive-compulsive disorder', 'copy' => 'Intrusive thoughts and the rituals that form to quiet them.', 'tag' => 'OCD'],
            ['name' => 'Anxious depression',  'copy' => 'Anxiety and low mood together, each one feeding the other.', 'tag' => 'MADD'],
        ],
    ],

    'tms' => [
        'eyebrow' => '04 / When treatment hasn’t worked',
        'lines'   => ['Thirty minutes', 'a day.'],
        'accent'  => 'a day.',
        'quote'   => 'The pulses stimulate the prefrontal cortex, helping the brain form new pathways — the process known as neuroplasticity.',
        'quote_source' => 'How TMS Works',
        'copy'    => 'If medication and therapy have not settled your anxiety, transcranial magnetic stimulation is the next thing worth trying. It is non-invasive, needs no sedation, and you drive yourself home afterwards.',
        'photo'   => 'homepage/tms-new-era.webp',
        'photo_alt' => 'A patient in the TMS chair while a clinician talks her through the session',
        'photo_focus' => 'object-[70%_35%]',
        'heading' => 'Magnetic pulses, aimed at the part of the brain that sets your mood.',
        'sub'     => 'The prefrontal cortex governs emotion, personality and decision-making. TMS wakes up cells there that have gone quiet, and the symptoms follow.',
        'benefits' => [
            ['name' => 'Drug-free',            'copy' => 'No medication, so none of the side effects that come with one.'],
            ['name' => 'Non-invasive',         'copy' => 'No anesthesia and no sedation. You stay awake throughout.'],
            ['name' => 'Mood, energy, sleep',  'copy' => 'Patients report movement across all three, not anxiety alone.'],
            ['name' => 'Minimal side effects', 'copy' => 'Mild scalp discomfort or a headache, which usually fades.'],
        ],
        'facts' => [
            ['value' => '30 min',    'label' => 'a typical session',     'color' => '#e8922f'],
            ['value' => '4–6 weeks', 'label' => 'for a full course',     'color' => '#86be52'],
            ['value' => '0',         'label' => 'days of recovery time', 'color' => '#ffffff'],
        ],
    ],

    'untreated' => [
        'lines' => ['It intensifies,', 'not the reverse.'],
        'accent' => 'not the reverse.',
        'paras' => [
            'Untreated anxiety tends to spread. Symptoms become more disruptive, concentration and memory suffer, and depression often arrives alongside it. Some people reach for substances to take the edge off, which adds a second problem to the first.',
            'The encouraging part is that anxiety responds well to treatment — better than most conditions we see.',
        ],
        'gains' => [
            'Understand what is actually driving it',
            'Build strategies that hold up under pressure',
            'Get real insight into your own patterns',
            'Move towards a life that feels lighter',
        ],
    ],

    'faqs' => [
        ['q' => 'What happens at my first visit?', 'a' => 'A full diagnostic assessment rather than a fifteen-minute script. We go through your history, your physical health, your sleep and your current symptoms, and you leave the same day with a written plan.'],
        ['q' => 'How is anxiety diagnosed?', 'a' => 'Only by a medical professional, through both a psychological and a physical assessment. Expect questions about your overall health and any prescriptions, how long you have felt this way, what is going on in your life, and behaviors such as substance use. Questionnaires usually come into it too.'],
        ['q' => 'Is TMS approved for anxiety?', 'a' => 'TMS is FDA-cleared for major depressive disorder and for OCD. For generalised anxiety it is used on the evidence for anxious depression and related presentations, and we will be straight with you about what that means for your case and your coverage before you start.'],
        ['q' => 'Does TMS hurt?', 'a' => 'No anesthesia or sedation is involved and you stay awake throughout. Most people describe a tapping sensation on the scalp. Some get mild scalp discomfort or a headache early on, which typically settles.'],
        ['q' => 'Will my insurance cover it?', 'a' => 'Coverage for TMS is strongest where depression is part of the picture. We verify your benefits and handle the prior authorisation before you commit to anything, so you know where you stand first.'],
        ['q' => 'What if I am not covered?', 'a' => 'We publish self-pay rates rather than quoting them case by case, and we can walk you through a payment plan before you agree to a course.'],
    ],
],

/* ── Postpartum depression ─────────────────────────────────────────── */
'postpartum' => [
    'name'  => 'Postpartum depression',
    'art'   => 'postpartum',
    'title' => 'Postpartum depression',
    'meta'  => 'Postpartum depression is not the baby blues, and it is not a character flaw. Understand the symptoms and how TMS treats it without medication reaching your breast milk.',

    'hero' => [
        'keyword' => 'Postpartum Depression Treatment',
        'lines' => ['This isn’t the', 'baby blues.', 'And it isn’t your fault.'],
        'accent' => 'And it isn’t your fault.',
        'lede'  => 'Postpartum depression is a serious, common and treatable mood disorder. It can start weeks after delivery, during pregnancy, or as late as a year after birth — and it responds to to treatment that\'s drug-free.',
        'image' => 'conditions/postpartum-hero.jpg',
        'alt'   => 'A mother holding her newborn in soft window light',
        'panel' => '#f1e8e2',
        'wash'  => '241 232 226',
    ],

    'what' => [
        'eyebrow' => '01 / What it is',
        'lines'   => ['Not a weakness.', 'A condition.'],
        'accent'  => 'A condition.',
        'serif'   => 'Postpartum depression involves lasting anxiety and sadness, more intense and far longer than the so-called baby blues.',
        'paras'   => [
            'Every new mother endures sleep deprivation, exhaustion and frayed nerves. Crying jags are common and they pass. Postpartum depression is what it is called when those feelings persist, or deepen, rather than lifting.',
            'It is driven by hormonal, social and emotional factors working together. It is not a character flaw, it is not a failure of love for your baby, and treating it is not something you have to earn.',
        ],
        'signs_title' => 'Ask yourself',
        'signs' => [
            'Sad, hopeless or overwhelmed for more than two weeks?',
            'Unable to sleep even when exhausted?',
            'Disconnected from your baby or the people around you?',
            'Guilty, anxious or irritable with no cause?',
        ],
        'signs_note' => 'Two or more yeses is worth a phone call. Only a trained professional can diagnose postpartum depression, and asking is not the same as being told something is wrong.',
    ],

    'stat' => [
        'value'  => '1 in 7',
        'rest'   => 'new mothers experiences postpartum depression.',
        'note'   => 'Risk rises with each pregnancy. Fathers can develop it too.',
        'source' => 'Cleveland Clinic',
    ],

    'symptoms' => [
        'eyebrow' => '02 / Signs and symptoms',
        'lines'   => ['What postpartum', 'depression looks like.'],
        'accent'  => 'depression looks like.',
        'intro'   => 'Only a trained professional can diagnose it, but these are the symptoms that distinguish it from the ordinary exhaustion of a new baby.',
        'photo'   => 'cond-3',
        'photo_alt' => 'A mother holding her smiling baby outdoors',
        'caption' => 'Treatable, and treatable now.',
        'list' => [
            'Severe mood swings and angry outbursts',
            'Difficulty bonding with your baby',
            'Feeling worthless or incompetent',
            'Sadness, despair and excessive crying',
            'Sleep disturbance beyond the usual',
            'Losing interest in daily activities',
            'Severe anxiety or panic attacks',
            'Intrusive thoughts of harming yourself or your baby',
        ],
        'note' => 'Thoughts of harming yourself or your baby requires emergency care. Call or text 988, or call us. There is a rarer and more serious form, postpartum psychosis, that requires immediate treatment.',
    ],

    'groups' => [
        'eyebrow' => '03 / What drives it',
        'lines'   => ['No single cause.', 'Several pressures.'],
        'accent'  => 'Several pressures.',
        'intro'   => 'As with other mental health conditions, there is no one cause. These are the factors that raise the risk.',
        'items' => [
            ['name' => 'Hormonal change', 'copy' => 'The chemical shift after giving birth is abrupt, and for some women it is enough on its own.', 'tag' => 'Biological'],
            ['name' => 'Stress',          'copy' => 'A baby who is hard to comfort, who sleeps irregularly, or who has special needs can increase stress levels.', 'tag' => 'Circumstance'],
            ['name' => 'Isolation',       'copy' => 'Financial hardship, bereavement, family difficulty and a thin support network all feed it.', 'tag' => 'Environment'],
            ['name' => 'Paternal PPD',    'copy' => 'Fathers can also develop PPD, most often when young, already depressed, or under financial strain.', 'tag' => 'Fathers'],
        ],
    ],

    'tms' => [
        'eyebrow' => '04 / Treatment that doesn’t reach your milk',
        'lines'   => ['Nothing in your', 'bloodstream.'],
        'accent'  => 'bloodstream.',
        'quote'   => 'No anesthesia and no medication, which means no drug in your system or your breast milk. It is an unusually good fit for mothers who are feeding.',
        'quote_source' => 'Why TMS suits new mothers',
        'copy'    => 'If antidepressants have not helped, or you would rather not take them while breastfeeding, TMS treats postpartum depression without putting anything into your bloodstream. Sessions run about thirty minutes and there is nothing to recover from afterwards.',
        'photo'   => 'homepage/tms-newera.webp',
        'photo_alt' => 'A clinician positioning the TMS coil over a patient’s head',
        'photo_focus' => '',
        'heading' => 'Magnetic pulses, aimed at the part of the brain that holds your mood.',
        'sub'     => 'Mood disorders change brain structure. TMS stimulates the prefrontal cortex, activating the brain’s ability to rewire itself, and the symptoms follow.',
        'benefits' => [
            ['name' => 'Safe while feeding', 'copy' => 'No drug enters your system, so none reaches your milk.'],
            ['name' => 'No downtime',        'copy' => 'About thirty minutes, then straight back to your day.'],
            ['name' => 'Minimal side effects','copy' => 'Usually a slight tingling on the scalp or a mild headache.'],
            ['name' => 'Works where drugs haven’t', 'copy' => 'Cleared for depression that has not responded to medication.'],
        ],
        'facts' => [
            ['value' => '30 min',    'label' => 'a typical session',     'color' => '#e8922f'],
            ['value' => '4–6 weeks', 'label' => 'for a full course',     'color' => '#86be52'],
            ['value' => '0',         'label' => 'drugs in your milk',    'color' => '#ffffff'],
        ],
    ],

    'untreated' => [
        'lines' => ['It rarely passes', 'on its own.'],
        'accent' => 'on its own.',
        'paras' => [
            'The NIH reports that some women are still describing high levels of depression three years after giving birth. Untreated, it raises the risk of substance use and self-harm, and it affects bonding — which in turn shows up in a baby’s attachment, temperament and early development.',
            'None of that means you\'re guilty. It is an argument for treating it now, while it is at its most treatable.',
        ],
        'gains' => [
            'Understand what is driving how you feel',
            'Get relief without medication if you prefer',
            'Rebuild the bond this has been getting in the way of',
            'Feel like yourself with your baby again',
        ],
    ],

    'faqs' => [
        ['q' => 'What makes this different from the baby blues?', 'a' => 'Severity and duration. The baby blues are common, mild and short-lived. Postpartum depression is more intense and lasts far longer, and it does not lift on its own the way the blues do.'],
        ['q' => 'I feel anxious rather than sad. Is this still it?', 'a' => 'Yes. Everyone experiences postpartum depression differently, and for a good number of women it presents as constant anxiety rather than sadness. It is no less treatable for that.'],
        ['q' => 'Can I have TMS while breastfeeding?', 'a' => 'Yes, and it is one of the main reasons mothers choose it. TMS uses magnetic pulses rather than medication, so there is no drug in your bloodstream and nothing passes into your milk.'],
        ['q' => 'Does TMS hurt?', 'a' => 'It is painless and needs no anesthesia. Most people describe a tapping or tingling sensation on the scalp during the session.'],
        ['q' => 'Can I bring my baby?', 'a' => 'Talk to us when you book. We know what the first months are like and we will work around feeding, naps and childcare rather than expecting you to work around us.'],
        ['q' => 'Will my insurance cover TMS?', 'a' => 'Most plans cover TMS for depression once two or more medications have been tried. We verify your benefits and handle the prior authorisation before you commit to anything.'],
    ],
],

/* ── PTSD ──────────────────────────────────────────────────────────── */
'ptsd' => [
    'name'  => 'PTSD',
    'art'   => 'ptsd',
    'title' => 'PTSD',
    'meta'  => 'Post-traumatic stress disorder is treatable. Understand the symptom clusters, how it is diagnosed, and how TMS helps when medication and therapy have not been enough.',

    'hero' => [
        'keyword' => 'PTSD Treatment',
        'lines' => ['The danger is over.', 'Your body never', 'got the message.'],
        'accent' => 'got the message.',
        'lede'  => 'Post-traumatic stress disorder (PTSD) can develop after witnessing or living through something terrifying. More than three million Americans live with the symptoms of PTSD. However, this trauma disorder responds well to treatment.',
        'image' => 'conditions/ptsd-hero.jpg',
        'alt'   => 'A person standing at a window in early light',
        'panel' => '#ece7e0',
        'wash'  => '236 231 224',
        'photo_size' => 'auto 84%',
        'photo_pos'  => '75% top',
        'photo_mask' => 'linear-gradient(180deg, #000 58%, transparent 84%)',
    ],

    'what' => [
        'eyebrow' => '01 / What it is',
        'lines'   => ['Four clusters.', 'One condition.'],
        'accent'  => 'One condition.',
        'serif'   => 'PTSD is built from four groups of symptoms: re-experiencing, avoidance, negative shifts in thinking and mood, and hyper-arousal.',
        'paras'   => [
            'Most people are resilient. Given time, they process what happened and move on. In PTSD the trauma stays live — returning through nightmares, flashbacks and triggers — and it can hold someone in fear, dread and depression for years.',
            'It follows combat, assault, serious accidents, sudden bereavement, a frightening diagnosis. What it does not follow is any failure of character on the part of the person carrying it.',
        ],
        'signs_title' => 'The four clusters',
        'signs' => [
            'Re-experiencing: memories, nightmares, flashbacks',
            'Avoidance: of people, places and conversations',
            'Negative thinking and mood: guilt, shame, detachment',
            'Hyper-arousal: startling easily, anger, insomnia',
        ],
        'signs_note' => 'Symptoms running longer than three months, with real distress and disruption to ordinary life, are what a clinician is listening for.',
    ],

    'stat' => [
        'value'  => '3 million',
        'rest'   => 'Americans live with post-traumatic stress disorder.',
        'note'   => 'Not everyone who survives trauma develops it. Many do.',
        'source' => 'Prevalence',
    ],

    'symptoms' => [
        'eyebrow' => '02 / Signs and symptoms',
        'lines'   => ['What PTSD', 'looks like.'],
        'accent'  => 'looks like.',
        'intro'   => 'Symptoms lasting longer than three months, causing deep distress and disrupting ordinary life, are the threshold clinicians work from.',
        'photo'   => 'cond-4',
        'photo_alt' => 'Two people sitting together, one hand held in support',
        'caption' => 'You do not have to talk about it to start.',
        'list' => [
            'Disturbing memories, nightmares or vivid flashbacks',
            'Avoiding the people and places that remind you',
            'Avoiding thinking or talking about it at all',
            'The belief that no one can be trusted',
            'Fear, anger, guilt and shame',
            'Losing interest in what you once enjoyed',
            'Startling easily, and over-reacting to noise',
            'Irritability, insomnia and poor concentration',
        ],
    ],

    'groups' => [
        'eyebrow' => '03 / Where it comes from',
        'lines'   => ['A traumatic event', 'that doesn’t end.', 'Then, no way out.'],
        'accent'  => 'Then, no way out.',
        'intro'   => 'PTSD is brought on by experiencing or witnessing something terrifying. These are the events we see most often behind it.',
        'items' => [
            ['name' => 'Combat stress',      'copy' => 'Service members and veterans carry a markedly higher share of the diagnosis.'],
            ['name' => 'Violent assault',    'copy' => 'Physical or sexual assault, and the long aftermath of not being believed.'],
            ['name' => 'Accidents',          'copy' => 'A serious collision or crash, whether you were driving, riding or watching.'],
            ['name' => 'Sudden loss',        'copy' => 'The unexpected death of someone close, or a frightening medical diagnosis.'],
        ],
    ],

    'tms' => [
        'eyebrow' => '04 / When medication hasn’t worked',
        'lines'   => ['When medication', 'makes it worse.'],
        'accent'  => 'makes it worse.',
        'quote'   => 'A recent study found TMS effective in improving symptoms among participants with major depressive disorder and co-occurring PTSD.',
        'quote_source' => 'Biological Psychiatry, 2018',
        'copy'    => 'Standard treatment pairs antidepressants with psychotherapy, and with EMDR or exposure work it helps many people. For some, it does not, and medication side effects can make things worse. TMS offers an alternative.',
        'photo'   => 'homepage/tms-new-era-2.jpg',
        'photo_alt' => 'A patient resting under the coil during a TMS session',
        'photo_focus' => 'object-[45%_50%]',
        'heading' => 'TMS uses magnetic fields to reset how the circuit fires.',
        'sub'     => 'Pulses created by MRI-like technology pass through the scalp and stimulate neurons in regions that have gone underactive. You sit fully alert, reading or listening to something, for about forty minutes.',
        'benefits' => [
            ['name' => 'No sedation',        'copy' => 'You stay awake and alert, which removes a source of risk.'],
            ['name' => 'Well tolerated',     'copy' => 'Few side effects are reported across the course.'],
            ['name' => 'Mood, energy, sleep','copy' => 'Patients notice concentration and sleep shift alongside the rest.'],
            ['name' => 'Drive yourself home','copy' => 'No recovery period. You leave and get on with the day.'],
        ],
        'facts' => [
            ['value' => '40 min',    'label' => 'a typical session',     'color' => '#e8922f'],
            ['value' => '4–6 weeks', 'label' => 'Monday to Friday',      'color' => '#86be52'],
            ['value' => '0',         'label' => 'days of recovery time', 'color' => '#ffffff'],
        ],
    ],

    'untreated' => [
        'lines' => ['Trauma doesn’t', 'fade on schedule.'],
        'accent' => 'fade on schedule.',
        'paras' => [
            'Left alone, the cycle of re-experiencing tends to intensify rather than ease. Avoidance grows to fill more of a life, depression and anxiety arrive alongside, and sleep stops doing its job.',
            'Trauma-focused care works, and it works at your pace. Nobody is going to make you recount anything before you are ready.',
        ],
        'paras_plain' => true,
        'gains' => [
            'Process what happened at a pace you set',
            'Get the startle response and the sleep back',
            'Understand your triggers instead of avoiding them',
            'Move towards a life the trauma isn’t running',
        ],
    ],

    'related_noun' => 'conditions',

    'faqs' => [
        ['q' => 'Do I have to talk about the trauma?', 'a' => 'Not to begin with, and not before you are ready. Trauma-focused therapy works at your pace, and treatments such as TMS do not require you to recount anything at all.'],
        ['q' => 'What is a TMS session like?', 'a' => 'You sit comfortably, fully alert. A coil is positioned on your scalp and you feel a light tapping. Most people read, watch something or listen to music or a podcast. Sessions run about forty minutes, Monday to Friday, for four to six weeks.'],
        ['q' => 'Does TMS work for PTSD?', 'a' => 'The evidence is strongest where depression and PTSD occur together, and that is a common pairing. One study found TMS significantly reduced total PTSD scores across the symptom clusters as well as co-occurring depression and anxiety. We will be straight with you about what the evidence supports in your case.'],
        ['q' => 'Do you treat veterans?', 'a' => 'Yes. We are in-network with Tricare in both states and with Triwest CCN. We verify your benefits before your first appointment.'],
        ['q' => 'What about EMDR and exposure therapy?', 'a' => 'Both are part of what we offer, delivered by therapists trained in them, and both work alongside medication or TMS rather than instead of them.'],
        ['q' => 'Will my insurance cover it?', 'a' => 'Coverage for TMS is strongest where depression is part of the picture. We verify your benefits and handle the prior authorisation before you commit to anything.'],
    ],
],

/* ── Migraines ─────────────────────────────────────────────────────── */
'migraines' => [
    'name'  => 'Migraines',
    'art'   => 'migraines',
    'title' => 'Migraines',
    'meta'  => 'Chronic migraine costs days you do not get back. Understand the types, what preventive medication asks of you, and how TMS offers a drug-free alternative.',

    'hero' => [
        'keyword' => 'Migraine Treatment',
        'lines' => ['It isn’t a headache.', 'It’s days you', 'don’t get back.'],
        'accent' => 'don’t get back.',
        'lede'  => 'Migraines is one of the most prevalent nervous system conditions in the world, and its incidence is rising. When preventive medication has not worked, or its side effects are worse than the attacks, TMS is a drug-free alternative.',
        'image' => 'conditions/migraines-hero.jpg',
        'alt'   => 'A person resting in a darkened room',
        'panel' => '#e7ebee',
        'wash'  => '231 235 238',
    ],

    'what' => [
        'eyebrow' => '01 / What it is',
        'lines'   => ['More than a bad headache.', 'A neurological condition.'],
        'accent'  => 'A neurological condition.',
        'serif'   => 'Migraines can sideline someone for days, and recurrent attacks dismantle a working week.',
        'paras'   => [
            'There are several forms: migraine with aura, migraine without aura, episodic migraine and chronic migraine. Symptoms include intense throbbing pain in a specific area of the head, nausea, and sensitivity to light and sound — and they can persist for several days.',
            'Migraine sends a great many people to the emergency room. It also affects your mood and sleep, which is why we treat it alongside them rather than in isolation.',
        ],
        'signs_title' => 'What an attack involves',
        'signs' => [
            'Intense throbbing pain, often on one side',
            'Nausea, sometimes vomiting',
            'Sensitivity to light and sound',
            'Symptoms persisting for up to several days',
        ],
        'signs_note' => 'Attacks that recur often enough to disrupt work, school or ordinary obligations are worth a proper assessment rather than painkillers.',
    ],

    'stat' => [
        'value'  => '2.75',
        'rest'   => 'fewer migraine days a month, reported after TMS treatment.',
        'note'   => 'From a baseline of about nine migraine days a month across 132 patients.',
        'source' => 'Published study',
    ],

    'symptoms' => [
        'eyebrow' => '02 / What medication asks of you',
        'lines'   => ['The side effects', 'people stop for.'],
        'accent'  => 'people stop for.',
        'intro'   => 'Preventive drugs are the usual first answer, including antidepressants, antiepileptics, blood pressure medication. Even when they help somewhat, this is the list that makes people give up on them.',
        'photo'   => 'cond-6',
        'photo_alt' => 'A person with their head in their hands',
        'caption' => 'More painkillers isn\'t the best plan.',
        'list' => [
            'Weight gain',
            'Sexual dysfunction',
            'Vertigo and dizziness',
            'Nausea and dry mouth',
            'Fatigue and drowsiness',
            'Blurred vision',
            'Insomnia and anxiety',
            'Tingling or numbness in the toes',
        ],
    ],

    'groups' => [
        'eyebrow' => '03 / The four forms',
        'lines'   => ['Four types of migraine.', 'Each treated differently.'],
        'accent'  => 'Each treated differently.',
        'intro'   => 'Naming the form is what turns a running battle with painkillers into a plan.',
        'items' => [
            ['name' => 'With aura',   'copy' => 'Visual or sensory warning signs arrive before the pain does.', 'tag' => 'Classic'],
            ['name' => 'Without aura','copy' => 'The most common form. Pain and nausea with no warning phase.', 'tag' => 'Common'],
            ['name' => 'Episodic',    'copy' => 'Attacks on fewer than fifteen days a month, with clear spells between.', 'tag' => 'Under 15 days'],
            ['name' => 'Chronic',     'copy' => 'Headache on fifteen or more days a month, for longer than three months.', 'tag' => '15+ days'],
        ],
    ],

    'tms' => [
        'eyebrow' => '04 / A drug-free alternative',
        'lines'   => ['Resetting the', 'brain chemistry.'],
        'accent'  => 'brain chemistry.',
        'quote'   => 'Across 267 study participants, the share reporting pain relief was nearly 50% higher with TMS than without it — 32% against 22%.',
        'quote_source' => 'Comparative study',
        'copy'    => 'TMS was FDA-cleared in 2008 for medication-resistant major depressive disorder, and its use has widened since. A 2017 meta-analysis in the Journal of Headache and Pain pooled five trials and 313 migraine patients, and found TMS effective in treatment.',
        'photo'   => 'homepage/tms-new-era.webp',
        'photo_alt' => 'A patient in the TMS chair while a clinician talks her through the session',
        'photo_focus' => 'object-[70%_35%]',
        'heading' => 'Magnetic pulses through a coil, aimed at the cortex.',
        'sub'     => 'TMS works by influencing the brain activity involved in migraine development. In some cases, it helps activate underperforming neural pathways; in others, it helps calm overly active ones. The result for many people is a reduction in migraine frequency and severity.',
        'benefits' => [
            ['name' => 'Drug-free',           'copy' => 'None of the side effects that stop people taking preventives.'],
            ['name' => 'No sedation',         'copy' => 'You stay awake, and resume normal activity immediately.'],
            ['name' => 'Non-invasive',        'copy' => 'A coil against the scalp. Nothing enters your body.'],
            ['name' => 'Evidence-backed',     'copy' => 'Five pooled trials, 313 patients, effective in treatment.'],
        ],
        'facts' => [
            ['value' => '40 min',    'label' => 'a typical session',     'color' => '#e8922f'],
            ['value' => '4–6 weeks', 'label' => 'for a full course',     'color' => '#86be52'],
            ['value' => '0',         'label' => 'days of recovery time', 'color' => '#ffffff'],
        ],
    ],

    'untreated' => null,

    'faqs' => [
        ['q' => 'Is TMS approved for migraine?', 'a' => 'TMS is FDA-cleared for major depressive disorder and for OCD. Its use in migraine rests on trial evidence rather than a clearance for that indication, and the research base is real but still modest. We will tell you exactly where that leaves you, including on coverage, before you start.'],
        ['q' => 'What does the evidence actually show?', 'a' => 'A 2017 meta-analysis in the Journal of Headache and Pain pooled five trials covering 313 patients and found TMS effective in treating migraine. In a separate study of 132 patients starting from about nine migraine days a month, participants reported 2.75 fewer days a month after treatment.'],
        ['q' => 'What is a session like?', 'a' => 'About forty minutes, no sedation, and you resume normal activities immediately afterwards. A full course usually runs four to six weeks.'],
        ['q' => 'Do I have to stop my current medication?', 'a' => 'Not as a condition of starting. Any change to what you are taking is a decision made with your prescriber, and TMS does not require you to come off anything first.'],
        ['q' => 'Why is a psychiatry practice treating migraine?', 'a' => 'Migraine affects mood and sleep; treating migraine by itself tends not to be as effective. We coordinate the migraine care with the rest rather than running it in a separate lane.'],
        ['q' => 'Will my insurance cover it?', 'a' => 'Coverage for TMS is strongest where depression is part of the picture. We verify your benefits and handle the prior authorisation before you commit to anything, so there are no surprises.'],
    ],
],

/* ── OCD ───────────────────────────────────────────────────────────── */
'ocd' => [
    'name'  => 'OCD',
    'art'   => 'ocd',
    'title' => 'OCD',
    'meta'  => 'Obsessive-compulsive disorder is treatable, and TMS is FDA-cleared for it. Understand obsessions, compulsions, and what to do when therapy alone has not been enough.',

    'hero' => [
        'keyword' => 'OCD Treatment',
        'lines' => ['You know the thought', 'makes no sense.', 'It still wins.'],
        'accent' => 'It still wins.',
        'lede'  => 'Checking the door a fifth time. Washing until your hands crack. OCD traps you in a cycle that logic does not touch — and it leaves people embarrassed, ashamed and quiet about it. It is also one of the conditions TMS is cleared to treat.',
        'image' => 'conditions/ocd-hero.jpg',
        'alt'   => 'A person standing at a window, hands together',
        'panel' => '#e8ecef',
        'wash'  => '232 236 239',
    ],

    'what' => [
        'eyebrow' => '01 / What it is',
        'lines'   => ['Obsessions in.', 'Compulsions out.'],
        'accent'  => 'Compulsions out.',
        'serif'   => 'Unwanted, intrusive thoughts create intense stress. The repetitive behaviors that quiet them are what make it a disorder.',
        'paras'   => [
            'Obsessions tend to follow a theme: a fear of dirt or contamination, an extreme need for order, intrusive thoughts of harm. Compulsions are the irrational behaviors that relieve the stress those thoughts produce — and the relief never lasts, which is what keeps the loop turning.',
            'OCD belongs to the family of anxiety disorders. It responds well to treatment, and it responds best when someone finally says it out loud.',
        ],
        'signs_title' => 'Common obsessions',
        'signs' => [
            'Intense stress when things are out of order',
            'Fear that touched objects will contaminate you',
            'Intrusive thoughts of harming yourself or others',
            'Fear you left the door unlocked or the oven on',
        ],
        'signs_note' => 'Recognising yourself here is not a diagnosis. OCD has distinct diagnostic criteria and only a clinician can apply them.',
    ],

    'stat' => [
        'value'  => '1.2%',
        'rest'   => 'of US adults had OCD in the past year.',
        'note'   => 'Somewhat more common among women and younger adults.',
        'source' => 'NIMH',
    ],

    'symptoms' => [
        'eyebrow' => '02 / Signs and symptoms',
        'lines'   => ['The compulsions', 'that follow.'],
        'accent'  => 'that follow.',
        'intro'   => 'Compulsions are repetitive behaviors that exist to reduce the anxiety an obsession creates. These are the ones we see most.',
        'photo'   => 'cond-7',
        'photo_alt' => 'Hands being washed under running water',
        'caption' => 'Left untreated, the relief never lasts.',
        'list' => [
            'Repetitive cleaning and washing',
            'Hand washing that damages your hands',
            'Following highly specific routines',
            'Rituals: tapping, counting, repeating phrases',
            'Checking and rechecking locks and appliances',
            'Rechecking that the car is locked',
            'Avoiding situations such as shaking hands',
            'Seeking reassurance over and over',
        ],
    ],

    'groups' => [
        'eyebrow' => '03 / What are the risk factors?',
        'lines'   => ['Anyone can', 'develop OCD.'],
        'accent'  => 'develop OCD.',
        'intro'   => 'Age, gender and income barely move the odds. These four reasons do:',
        'items' => [
            ['name' => 'Biology',        'copy' => 'Imbalances in the neurotransmitters that carry signals between nerve cells, and differences in brain structure.', 'tag' => 'Neurochemistry'],
            ['name' => 'Personality',    'copy' => 'Perfectionist, pessimistic and anxious personality traits all raise the likelihood.', 'tag' => 'Temperament'],
            ['name' => 'Family history', 'copy' => 'No single gene has been found, but parents or close relatives with OCD are a contributing factor.', 'tag' => 'Genetics'],
            ['name' => 'Stress and trauma', 'copy' => 'Major stress, violence or illness can trigger it, especially in someone already at risk.', 'tag' => 'Trigger'],
        ],
    ],

    'tms' => [
        'eyebrow' => '04 / FDA-cleared for OCD',
        'lines'   => ['Where therapy', 'alone hasn’t worked.'],
        'accent'  => 'alone hasn’t worked.',
        'quote'   => 'TMS uses magnetic fields to carefully target specific areas of the brain. Stimulating the areas affected by OCD helps reduce symptoms.',
        'quote_source' => 'International OCD Foundation',
        'copy'    => 'Exposure and response prevention is the therapy that works for OCD, and we deliver it. When it is not enough on its own, TMS is cleared specifically for this condition — not borrowed from another indication.',
        'photo'   => 'homepage/tms-newera.webp',
        'photo_alt' => 'A clinician positioning the TMS coil over a patient’s head',
        'photo_focus' => '',
        'heading' => 'Pulses that help the brain build a different pathway.',
        'sub'     => 'An electromagnet placed against the scalp delivers targeted pulses, engaging neuroplasticity — the brain’s capacity to form new, healthier pathways rather than running the old loop.',
        'benefits' => [
            ['name' => 'Cleared for OCD',     'copy' => 'TMS has been shown to be effective for OCD.'],
            ['name' => 'Gentler than SSRIs',  'copy' => 'TMS side effects are generally far milder than the drugs.'],
            ['name' => 'No anesthesia',       'copy' => 'No surgery and no sedation. Sessions fit a lunch break.'],
            ['name' => 'Mood, energy, sleep', 'copy' => 'Improvement is reported across all three, not symptoms alone.'],
        ],
        'facts' => [
            ['value' => '15–30 min', 'label' => 'a typical session',     'color' => '#e8922f'],
            ['value' => '4–6 weeks', 'label' => 'for a full course',     'color' => '#86be52'],
            ['value' => '0',         'label' => 'days of recovery time', 'color' => '#ffffff'],
        ],
    ],

    'untreated' => [
        'lines' => ['The loop tightens.', 'It doesn’t loosen.'],
        'accent' => 'It doesn’t loosen.',
        'paras' => [
            'Untreated, obsessions become more intrusive and more frequent, and compulsions can end up occupying most of someone’s waking hours. Sleep, work and relationships all narrow around them, and the shame that comes with it is a large part of why people wait years to ask.',
            'OCD responds well to treatment.',
        ],
        'gains' => [
            'Explore the roots of your OCD safely.',
            'Identify your triggers instead of dodging them',
            'Break the obsession-and-compulsion cycle',
            'Live in a life you are running, not OCD',
        ],
    ],

    'faqs' => [
        ['q' => 'Is TMS approved for OCD?', 'a' => 'Yes. OCD is one of the two conditions TMS is FDA-cleared to treat, alongside major depressive disorder.'],
        ['q' => 'What is ERP therapy?', 'a' => 'Exposure and response prevention. You work towards the situations that trigger an obsession while deliberately not performing the compulsion, so the anxiety is allowed to fall on its own. It is the therapy with the strongest evidence in OCD, and our therapists are trained in it.'],
        ['q' => 'Do I need therapy as well as TMS?', 'a' => 'Usually the combination is what works best. ERP teaches your brain a different response, and TMS makes that learning easier to hold. Your prescriber and therapist are in the same practice, reading the same notes.'],
        ['q' => 'Does TMS hurt?', 'a' => 'No. There is no surgery and no anesthesia. Some people report mild scalp discomfort or a headache, generally far less troublesome than the side effects of SSRIs.'],
        ['q' => 'I have never told anyone. Where do I start?', 'a' => 'With a phone call, and you do not have to describe the obsessions to book. Nothing you say at an assessment will be the strangest thing we have heard, and shame is one of the main reasons OCD goes untreated for years.'],
        ['q' => 'Will my insurance cover TMS for OCD?', 'a' => 'Often yes, given the FDA clearance for this condition. We verify your benefits and handle the prior authorisation before you commit to anything.'],
    ],
],

];
