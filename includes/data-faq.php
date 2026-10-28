<?php
/**
 * The FAQ, for faq.php.
 *
 * Eight categories, each a list of questions. Every answer is written to be
 * read on its own — someone arriving from a search engine lands on one
 * question, not on the page.
 *
 * Shape of an entry
 *   q      the question, as a patient would ask it
 *   a      the answer: a string, or a list of strings for more than one
 *          paragraph
 *   link   optional ['label', 'href'] sending the reader to the page that
 *          covers it properly
 *   key    optional stable id for the anchor; generated from the question
 *          when absent
 *
 * Accuracy notes, because this is a psychiatry practice and not a shop:
 *   · Nothing here claims an outcome. No response rates, no remission rates,
 *     no "most patients improve". See the note above 'results' in data.php —
 *     outcome claims are regulated marketing and ours are not measured.
 *   · Spravato® wording follows the FDA label, as data-treatments.php does:
 *     a nasal spray, a boxed warning, a Schedule III controlled medication,
 *     two hours of monitoring, Texas only.
 *   · Clinical specifics that already appear on a treatment or condition page
 *     are phrased the same way here on purpose. If one changes, change both.
 *   · Coverage answers promise a benefits check, never a coverage outcome.
 */

return [

/* ── Getting started ───────────────────────────────────────────────── */
'start' => [
    'name'  => 'Getting started',
    'icon'  => 'clipboard',
    'blurb' => 'Booking, first visits, and what the first few weeks look like.',
    'faqs'  => [
        [
            'q' => 'What happens at my first visit?',
            'a' => [
                'Your first visit usually takes around an hour. Our evaluation helps us get to know you and find out what course of treatment is right for you.',
                'We go through your history, your physical health, your sleep and your current symptoms, and you leave the same day with a written plan.',
            ],
            'link' => ['What Psychiatry Involves', 'psychiatry.php'],
        ],
        [
            'q' => 'How soon can I be seen?',
            'a' => 'New patient consultations are usually available within five business days, and same-week telehealth slots often open up. If you are in crisis, say so when you call — that changes how we schedule you.',
        ],
        [
            'q' => 'Do I need a referral?',
            'a' => 'Not from us. Most plans let you book psychiatry appointments directly, though a few HMOs still require a referral from your primary care doctor. We check that when we verify your benefits, so you don’t have to deal with it during your appointment.',
        ],
        [
            'q' => 'What should I bring to my first appointment?',
            'a' => 'A photo ID, your insurance card, and a list of what you currently take — including doses, supplements and anything you have stopped recently. If you have had previous psychiatric care, the names of medications you have tried and how each one went is the single most useful thing you can arrive with.',
        ],
        [
            'q' => 'Can I be seen by video instead of coming in?',
            'a' => 'Yes, for psychiatry and therapy, in the states where we are licensed. TMS and Spravato® are in-clinic treatments and cannot be done remotely. Some first appointments are better in person, and we will say so rather than pretend otherwise.',
        ],
        [
            'q' => 'How do I actually book?',
            'a' => 'Call us, or use the booking form and we will call you back. Either way, the intake team takes your details, checks your insurance and offers you times before anything is confirmed.',
            'link' => ['Book a Consultation', 'contact.php'],
        ],
        [
            'q' => 'Can I choose which clinician I see?',
            'a' => 'Yes. You can read the team, pick someone, and ask for them by name when you book. Availability varies by clinic, so the intake team will tell you whether that means waiting an extra week.',
            'link' => ['Meet the Team', 'team.php'],
        ],
        [
            'q' => 'What if it is not a fit?',
            'a' => 'Our intake team will match you with someone new at no extra cost and with no awkward conversation required. Changing clinician is a normal thing to do, not a complaint.',
        ],
        [
            'q' => 'How long will I be a patient here?',
            'a' => 'A TMS course is a fixed block of weeks and then it ends. Medication is reviewed every two to four weeks at first and then much less often. Therapy is reviewed monthly, and the question of whether to stop is one we raise rather than wait for you to.',
        ],
        [
            'q' => 'What does a treatment plan actually look like?',
            'a' => 'Before you leave, we’ll give you a written summary of what we think is going on, what we recommend, what other options you have, and when we’ll check back to see how things are working. You’ll have it in hand that same day.',
        ],
    ],
],

/* ── Insurance and cost ────────────────────────────────────────────── */
'cost' => [
    'name'  => 'Insurance & cost',
    'icon'  => 'article',
    'blurb' => 'Coverage, prior authorization, self-pay and the bills nobody warned you about.',
    'faqs'  => [
        [
            'q' => 'Do you take my insurance?',
            'a' => 'We accept most major insurance providers, and we verify your benefits before your first appointment rather than after it. The carriers we work with are listed on the homepage, but plans differ inside a carrier, so the check is what actually answers this question.',
        ],
        [
            'q' => 'What does "we verify your benefits" mean in practice?',
            'a' => 'Before you come in, we call your insurance provider and find out what it covers, what your deductible and copay are, and whether anything needs authorizing first. Then we tell you the number. It is not a quote for a treatment you have not agreed to — it is so you know where you stand before you decide.',
        ],
        [
            'q' => 'Is TMS covered by insurance?',
            'a' => [
                'Most plans cover TMS therapy for treatment-resistant depression after certain conditions are met. Tricare covers TMS for veterans with major depressive disorder and PTSD.',
                'Criteria vary between carriers and between plans inside the same carrier, so we verify yours and handle the prior authorization before you commit to anything.',
            ],
            'link' => ['TMS Cost and Coverage', 'tms.php'],
        ],
        [
            'q' => 'What is prior authorization, and who does it?',
            'a' => 'Prior authorization simply means getting your insurance company’s approval before treatment begins. They may ask for information about medications or other treatments you’ve tried and how long you tried them. We take care of that process for you. You may just need to help us confirm a few dates.',
        ],
        [
            'q' => 'What if I am not covered?',
            'a' => 'We publish self-pay rates rather than quoting them case by case, and we will give you the total for a course before you commit. Private pay also avoids the delays that authorization adds, which is occasionally the reason people choose it even when they are covered.',
        ],
        [
            'q' => 'Can I use my insurance for some things and pay for others?',
            'a' => 'Yes. Some people run therapy through their plan and pay privately for something it will not authorize, or the other way around. Tell the intake team what you want and they will set it up.',
        ],
        [
            'q' => 'What will I owe on the day?',
            'a' => 'Whatever your plan leaves you — typically a copay, or the full contracted rate if your deductible has not been met yet. We tell you this at the benefits check, so a first bill should never be the first you hear of it.',
        ],
        [
            'q' => 'Do you see Medicare or Medicaid patients?',
            'a' => 'We work with Medicare and with Tricare. Medicaid participation depends on the state and the clinic, so it is worth asking the intake team directly rather than assuming either way.',
        ],
        [
            'q' => 'Can I get a superbill for out-of-network reimbursement?',
            'a' => 'Yes. If we are out-of-network for your plan, we can give you an itemized superbill to submit yourself. What your plan does with it is between you and them, and we cannot promise a reimbursement rate.',
        ],
        [
            'q' => 'What is your cancellation policy?',
            'a' => 'Give us 24 hours and there is no charge. Later than that, or a missed appointment, may be billed — insurers do not cover missed visits. For TMS the sessions are booked as a block, so tell us as early as you can and we will move the whole schedule rather than lose a day of the course.',
        ],
        [
            'q' => 'Does my insurance cover Spravato®?',
            'a' => 'Often, for treatment-resistant depression, and it is usually subject to prior authorization. Because each session includes at least two hours of monitoring in the clinic, plans bill the medication and the monitoring separately — we will show you both numbers before you start.',
        ],
    ],
],

/* ── TMS ───────────────────────────────────────────────────────────── */
'tms' => [
    'name'  => 'TMS therapy',
    'icon'  => 'coil',
    'blurb' => 'The treatment the practice is built around: what it is, what it feels like, and what it asks of you.',
    'faqs'  => [
        [
            'q' => 'What is TMS?',
            'a' => 'Transcranial magnetic stimulation (TMS) is a drug-free, non-invasive treatment. A small coil rests against your head and delivers magnetic pulses to an area of the brain involved in mood regulation. You’re awake the entire time, and when your session is over, you can get back to your day and drive yourself home.',
            'link' => ['How TMS Works', 'tms.php'],
        ],
        [
            'q' => 'Does TMS hurt?',
            'a' => 'No anesthesia or sedation is involved, and you stay awake throughout. Most people describe a tapping sensation on the scalp. Some get mild scalp discomfort or a headache early on, which typically settles as the course goes on.',
        ],
        [
            'q' => 'Is TMS the same as electroconvulsive therapy?',
            'a' => 'No. While both are used to treat depression, they work very differently. TMS uses targeted magnetic pulses and doesn’t require anesthesia or induce a seizure. You’re awake throughout treatment and can return to your day afterward.',
        ],
        [
            'q' => 'How long is a session, and how long is a course?',
            'a' => [
                'It depends on the protocol. Standard rTMS sessions run roughly half an hour; the newer theta-burst protocols are considerably shorter. Your clinician will tell you which one you are on and what that means for your schedule.',
                'A full course is typically five sessions a week for four to six weeks, followed by a short taper. Accelerated protocols compress the same course into days for people who cannot commit to six weeks.',
            ],
        ],
        [
            'q' => 'What are the side effects?',
            'a' => [
                'Common: Scalp discomfort under the coil and headaches, usually in the first week and usually settling as the course goes on.',
                'Less common: Lightheadedness, or facial twitching during the pulses that stops when they do.',
                'Rare: Seizure. The risk is real but very low, and it is why we screen for epilepsy, metal implants near the head and certain medications before you start.',
            ],
        ],
        [
            'q' => 'Who cannot have TMS?',
            'a' => 'Anyone with non-removable metal or an implanted device in or near the head, such as aneurysm clips, stents, cochlear implants, some deep brain stimulators. A history of seizures or epilepsy does not automatically rule you out but does change the assessment. This is exactly what the screening before your first session is for.',
        ],
        [
            'q' => 'Can I drive afterward? Will I need time off work?',
            'a' => 'You can drive yourself home and go back to your day — there is no recovery time and no downtime. The real cost is the schedule, not the sessions: five visits a week for several weeks is the part people have to plan around.',
        ],
        [
            'q' => 'Do I have to stop my medication to have TMS?',
            'a' => 'No. TMS is usually given alongside whatever you are already taking, and stopping antidepressants to start it is not required. Any changes to your medication are a separate decision, made with your prescriber or primary care physician.',
        ],
        [
            'q' => 'When will I feel results?',
            'a' => 'TMS usually isn’t an overnight change. Improvement may build gradually over the course of treatment, and sometimes the people close to you notice it before you do. We’ll check in regularly and track your symptoms so we can see the bigger picture and decide how treatment is working for you.',
        ],
        [
            'q' => 'What happens when the course ends? Does it last?',
            'a' => 'Some people need nothing further. Others have a maintenance session periodically, or a second course later on. We talk about what happens next before the course finishes, not after it.',
        ],
        [
            'q' => 'What does TMS treat besides depression?',
            'a' => 'It is FDA-cleared for major depressive disorder and for OCD, and it is used for several other conditions where the evidence is at different stages. What is cleared and what is promising are not the same thing, and the condition pages say which is which.',
            'link' => ['Conditions We Treat', 'conditions.php'],
        ],
        [
            'q' => 'What is accelerated TMS?',
            'a' => 'The same treatment delivered as several sessions a day over about a week, instead of one a day over six weeks. It suits people who cannot take six weeks of daily visits. Availability and coverage differ from standard courses, so ask when you book.',
        ],
    ],
],

/* ── Psychiatry and medication ─────────────────────────────────────── */
'psychiatry' => [
    'name'  => 'Psychiatry & medication',
    'icon'  => 'stethoscope',
    'blurb' => 'Evaluations, prescriptions, and the questions people are too polite to ask.',
    'faqs'  => [
        [
            'q' => 'Do I have to take medication?',
            'a' => 'There isn’t one answer that’s right for everyone. Medication may be part of your treatment plan, but it’s not the only approach to mental health care. Your provider can help you weigh the benefits, side effects, and other treatment options based on your individual needs.',
            'link' => ['What Psychiatry Covers', 'psychiatry.php'],
        ],
        [
            'q' => 'Who will I actually see — a psychiatrist or a nurse practitioner?',
            'a' => 'Both are on the team, and both are licensed to diagnose and to prescribe. Which one you see depends on availability and on what you need. The team page says who is who, including credentials.',
            'link' => ['Meet the Team', 'team.php'],
        ],
        [
            'q' => 'How long before a medication works?',
            'a' => 'Antidepressants generally need several weeks at a therapeutic dose before a fair judgment is possible, which is why we review at two to four weeks at first — early enough to catch side effects, not so early that we abandon something that has not had a chance yet.',
        ],
        [
            'q' => 'What if the side effects are worse than the problem?',
            'a' => 'Tell us right away rather than stopping on your own and waiting for the next appointment. Most side effects are manageable with a dose change or a switch, and some settle within two weeks. Stopping certain medications abruptly has its own effects, which is the reason for the phone call.',
        ],
        [
            'q' => 'Can I come off my medication?',
            'a' => 'Feeling better after TMS doesn’t necessarily mean you should stop your medication. That’s a decision to make with your prescriber, who can help you weigh what’s working and whether it makes sense to gradually reduce or change anything.',
        ],
        [
            'q' => 'Do you prescribe controlled substances, like stimulants or benzodiazepines?',
            'a' => 'Where they are clinically appropriate, and under the rules that govern them — which usually means an in-person assessment, periodic reviews and a single prescriber. We do not transfer an existing controlled prescription on a first visit as a matter of course.',
        ],
        [
            'q' => 'How do refills work?',
            'a' => 'Ask your pharmacy to send the request, or call us, and allow a couple of business days. Keeping your review appointments is what keeps refills straightforward — most gaps happen because a review was missed rather than because anything was refused.',
        ],
        [
            'q' => 'Do you do ADHD assessments?',
            'a' => 'Yes. An ADHD evaluation is more than filling out a questionnaire. We take the time to understand what you’re experiencing and consider other possible explanations for your symptoms. If formal testing is needed, we’ll help arrange it.',
        ],
        [
            'q' => 'Will I need blood tests or genetic testing for TMS therapy?',
            'a' => 'For most people, no. There’s no routine blood test or genetic test you need in order to have TMS. We’ll review your health history and medications first and let you know if anything else is needed.',
        ],
        [
            'q' => 'Can you work with my existing doctor or therapist?',
            'a' => 'Yes, with your consent. Coordinated care between a prescriber and a therapist who actually speak to each other works better than two people treating you separately.',
        ],
        [
            'q' => 'What if I am already stable on medication and just need it managed?',
            'a' => 'The first visit is still a full evaluation, because we are taking over responsibility for the prescription, but the plan after that can be as light as a review a few times a year.',
        ],
    ],
],

/* ── Therapy ───────────────────────────────────────────────────────── */
'therapy' => [
    'name'  => 'Therapy',
    'icon'  => 'chat',
    'blurb' => 'What the sessions are, how often, and how to tell whether it is working.',
    'faqs'  => [
        [
            'q' => 'What kinds of therapy do you offer?',
            'a' => 'We provide talk therapy, including cognitive behavioral therapy (CBT), acceptance and commitment therapy (ACT) and dialectical behavior therapy (DBT). We also offer eye movement desensitization and reprocessing (EMDR) therapy. If what you need is something we do not offer, we will say so and point you somewhere that does.',
            'link' => ['About Our Therapy', 'therapy.php'],
        ],
        [
            'q' => 'What is the therapy schedule like?',
            'a' => 'Usually an hour, weekly or every other week to begin with, spacing out as things improve. It is reviewed monthly, and the point of the review is to ask whether it is still earning its place.',
        ],
        [
            'q' => 'What happens during my first therapy session?',
            'a' => 'The first session is mostly a conversation. Your therapist will ask what brought you in, what you’ve tried before, and what you’re hoping will change. You don’t need to have your thoughts organized beforehand, and there’s no pressure to talk about anything you’re not ready to discuss.',
        ],
        [
            'q' => 'Should I do therapy or take medication?',
            'a' => 'Sometimes therapy works best on its own. Sometimes it works better alongside medication. Your evaluation is a chance to figure out which approach fits your needs, rather than making that decision in the abstract.',
        ],
        [
            'q' => 'Do I have to talk about my trauma?',
            'a' => 'You won’t be expected to talk about trauma before you’re ready, and some forms of therapy don’t require going into the details at all. The work should be paced carefully and with your input. If sessions consistently leave you feeling worse, your therapist should know so you can adjust the pace or approach together.',
        ],
        [
            'q' => 'How do I know if therapy is working?',
            'a' => 'You’ll notice improvements in your life: better sleep, better performance at work or at school, better and stronger relationships, and more. If you don’t notice these improvements, we’ll work with you to adjust your therapy.',
        ],
        [
            'q' => 'Can I see a therapist here without seeing a psychiatrist?',
            'a' => 'Yes. Seeing a therapist doesn’t mean you also need to see a psychiatrist. Therapy may be all you need. If something comes up that could benefit from medication or a psychiatric evaluation, your therapist can help you decide what to do next.',
        ],
        [
            'q' => 'Do you offer couples or family therapy?',
            'a' => 'Our therapy is primarily individual. Family sessions are a standard part of adolescent care, and where couples work is what is actually needed we will refer you to someone who specializes in it.',
        ],
        [
            'q' => 'Is what I say in therapy confidential?',
            'a' => 'Yes, with the narrow legal exceptions every clinician works under: an immediate risk to your life or someone else’s, and suspected abuse of a child or a vulnerable adult. Your therapist will explain these at the start rather than leaving you to find out.',
        ],
    ],
],

/* ── Spravato ──────────────────────────────────────────────────────── */
'spravato' => [
    'name'  => 'Spravato®',
    'icon'  => 'spray',
    'blurb' => 'Esketamine nasal spray for treatment-resistant depression. Available at our Texas clinics only.',
    'faqs'  => [
        [
            'q' => 'What is Spravato®?',
            'a' => 'Esketamine, an FDA-approved nasal spray for treatment-resistant depression. You take it yourself in our clinic, under a clinician’s supervision, and stay with us for at least two hours afterward. It is never sent home with you.',
            'link' => ['About Spravato®', 'spravato.php'],
        ],
        [
            'q' => 'Who is it for?',
            'a' => 'Adults whose depression has not responded to the usual medications. It is taken alongside an oral antidepressant.',
        ],
        [
            'q' => 'What is ketamine treatment like?',
            'a' => 'You administer the spray yourself, and we’ll monitor you for at least two hours afterward, including checking your blood pressure. Most of the visit is intentionally quiet while we make sure you’re doing well, so bring something you’d enjoy listening to while you wait.',
        ],
        [
            'q' => 'Can I drive home?',
            'a' => 'No. You must not drive or operate machinery until the next day, after a restful sleep. Arrange transportation before your appointment: we cannot discharge you to drive yourself.',
        ],
        [
            'q' => 'What are the risks?',
            'a' => [
                'Spravato® comes with important safety warnings. It can cause sedation or feelings of disconnection, and there is a risk of misuse or abuse. Your care team will also watch for changes in mood, including suicidal thoughts or behaviors.',
                'For these reasons, treatment takes place in a certified clinic where you can be monitored afterward. Your clinician will walk you through the risks, answer your questions, and make sure you understand what treatment involves before you decide to proceed.',
            ],
            'link' => ['The Safety Facts', 'spravato.php'],
        ],
        [
            'q' => 'Is it the same as a ketamine infusion?',
            'a' => 'No. Spravato® is esketamine as a nasal spray, FDA-approved for this use and given under a restricted program. Intravenous ketamine for depression is a different thing, used off-label. Our page describes what we actually provide.',
        ],
        [
            'q' => 'Is ketamine addictive?',
            'a' => 'Yes, ketamine can be misused and there is a risk of developing dependence. That risk is one reason medical ketamine treatment is carefully controlled rather than taken casually or without supervision. Your clinician will talk with you about your individual risk before treatment and continue to monitor you as you go.',
        ],
        [
            'q' => 'Where can I receive ketamine therapy?',
            'a' => 'At our Texas clinics. It is not offered at the California locations.',
            'link' => ['Our Locations', 'index.php#top'],
        ],
        [
            'q' => 'How often do I need to come in?',
            'a' => 'Twice a week at first, reducing over time. Each visit takes at least two hours of monitoring on top of the appointment itself, so it is worth planning the whole block before you start.',
        ],
    ],
],

/* ── Conditions and suitability ────────────────────────────────────── */
'conditions' => [
    'name'  => 'What we treat',
    'icon'  => 'grid',
    'blurb' => 'Who we can help, who we cannot, and where to go if it is urgent.',
    'faqs'  => [
        [
            'q' => 'I am in crisis right now. What do I do?',
            'a' => 'Call or text 988, the Suicide and Crisis Lifeline. If someone is in immediate danger, call 911 or go to your nearest emergency department. We are an outpatient practice and we are not a crisis service — this page cannot help you fast enough, and the Lifeline can.',
        ],
        [
            'q' => 'What conditions do you treat?',
            'a' => 'Depression (including treatment-resistant depression), anxiety, postpartum depression and anxiety, PTSD, OCD and migraine, alongside the conditions that arrive with them. We have pages explaining each condition and how they’re treated.',
            'link' => ['Conditions We Treat', 'conditions.php'],
        ],
        [
            'q' => 'What counts as treatment-resistant depression?',
            'a' => 'Treatment-resistant depression means antidepressants haven’t helped enough, even after you’ve tried more than one. A common definition is depression that hasn’t adequately responded to at least two antidepressant treatments. It doesn’t mean your depression can’t be treated. It means it may be time to consider a different approach, such as TMS.',
            'link' => ['More on Treatment-Resistant Depression', 'depression.php#tms'],
        ],
        [
            'q' => 'Do you see adolescents?',
            'a' => 'We see patients aged 15 and up. Adolescent care includes family sessions and, with consent, coordination with school counselors.',
        ],
        [
            'q' => 'I am not sure anything is really wrong. Should I still come?',
            'a' => 'Not every evaluation ends with a prescription or ongoing psychiatric care. Sometimes the answer is simply: yes, what you’re dealing with is real, and no, medication isn’t the right next step. You may leave with a plan that mostly happens outside our office, and that can still mean the evaluation did exactly what it was supposed to do.',
        ],
        [
            'q' => 'Do you treat bipolar disorder?',
            'a' => 'Yes, as part of psychiatric care. It does change the treatment picture — including how antidepressants are used, and how TMS is approached — which is one of the things a full diagnostic assessment is for.',
        ],
        [
            'q' => 'Do you treat addiction or eating disorders?',
            'a' => 'We don’t specialize in treating these disorders. We treat depression, anxiety, and other disorders that often come with them, and we work with the specialist services that lead on the rest. If we’re the wrong place, we’ll tell you early and help you find the right one.',
        ],
        [
            'q' => 'Can I come for a second opinion?',
            'a' => 'Yes, and it is a good reason to book. Bring what you have been told so far and what you have tried. A second opinion that confirms your current plan is a useful result, not a wasted visit.',
        ],
        [
            'q' => 'Do you see veterans?',
            'a' => 'Yes. Tricare covers TMS for veterans with major depressive disorder and PTSD, and we are in-network with Tricare in both states.',
        ],
        [
            'q' => 'What if I do not have a diagnosis yet?',
            'a' => 'Most people do not when they arrive. Arriving with a name for it is not a prerequisite — working out whether there is one, and which, is the first thing the evaluation does.',
        ],
    ],
],

/* ── Privacy and practicalities ────────────────────────────────────── */
'privacy' => [
    'name'  => 'Privacy & practicalities',
    'icon'  => 'question',
    'blurb' => 'Records, confidentiality, and more.',
    'faqs'  => [
        [
            'q' => 'Who can see my records?',
            'a' => 'Your care team, and whoever you give us written permission to share with. We are HIPAA-covered, and your employer and your family are not entitled to your records because they asked.',
        ],
        [
            'q' => 'Will my employer or my insurer find out what I discussed?',
            'a' => 'Your insurer receives what it needs to process a claim — dates, codes, a diagnosis — not your session notes. Your employer receives nothing from us at all unless you ask us in writing to send something.',
        ],
        [
            'q' => 'My child is a teenager. What will I be told?',
            'a' => 'Enough to support them, not a transcript. Adolescent care works because the young person can speak freely, so clinicians set out at the start what will be shared with you and what will not — with safety always being shared. The rules also vary by state, and your clinician will tell you how they apply.',
        ],
        [
            'q' => 'Can I get a copy of my records?',
            'a' => 'Yes. Psychotherapy notes are treated differently from the rest of the chart under HIPAA, and we will explain what that means for your request.',
        ],
        [
            'q' => 'Who do I call outside office hours?',
            'a' => 'For anything urgent, call us — the line tells you how to reach the on-call clinician. For an emergency, 911. For a crisis, call or text 988. Do not use email or the contact form for anything that cannot wait.',
        ],
        [
            'q' => 'Can you write a letter for work, school or a housing application?',
            'a' => 'Yes, in many cases. Once your clinician knows you well enough to write accurately about your care, they can write a letter supporting a request at work, at school, or for housing. Ask your clinician directly and allow a few days for it.',
        ],
        [
            'q' => 'Do you prescribe to any pharmacy?',
            'a' => 'Yes, we’ll work with whatever pharmacy you have. We’ll even mail medications when your plan requires it.',
        ],
        [
            'q' => 'How do I move my care from another practice?',
            'a' => 'Book an evaluation and sign a records release, and we will request what is relevant. Do not let your current prescription lapse while that is in progress — tell us at booking how much you have left.',
        ],
        [
            'q' => 'Where are your clinics?',
            'a' => 'Fifteen: seven across Orange County and greater Los Angeles, and eight across Austin, Dallas and Houston. Telehealth covers the states we are licensed in.',
            'link' => ['Meet the Team by Location', 'team.php'],
        ],
    ],
],

];
