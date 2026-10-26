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
            'blurb' => 'Generalized anxiety, panic disorder, social anxiety and the physical symptoms that come with them.',
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
            'full'  => 'Postpartum depression',   // the longer name the "What it treats" grids use
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
            'page'   => 'tms.php',
            'slot'   => 'homepage/tms-new-era-2.jpg',
            'alt'    => 'A patient resting under the Magstim coil during a TMS session',
            'focus'  => 'object-[45%_66%]',   // portrait source — sit the crop on the coil and the patient's face
            'detail' => 'FDA-cleared magnetic stimulation for depression and OCD when medication has fallen short.',
            'chips'  => ['Depression', 'OCD'],
        ],
        [
            'name'   => 'Accelerated TMS',
            'page'   => 'tms.php',
            'slot'   => 'homepage/tms-newera.webp',
            'alt'    => 'A clinician positioning the TMS coil over a patient’s head',
            'detail' => 'A full course compressed into days, not weeks, for patients who need results fast.',
            'chips'  => ['5-day course', 'Depression'],
        ],
        [
            'name'   => 'Psychiatry',
            'page'   => 'psychiatry.php',
            'slot'   => 'treatments/psychiatry-consult.jpg',
            'alt'    => 'A clinician talking with a patient during a consultation',
            'detail' => 'Diagnostic evaluation and ongoing medication management from a clinician who knows you.',
            'chips'  => ['Evaluation', 'Med management'],
        ],
        [
            'name'   => 'Spravato®',
            'page'   => 'spravato.php',
            'slot'   => 'treat-4',
            'alt'    => 'A person self-administering a nasal spray',
            'detail' => 'In-office esketamine treatment for treatment-resistant depression, monitored start to finish. Offered at our Texas locations only.',
            'chips'  => ['Esketamine', 'Texas only'],
        ],
        [
            'name'   => 'Therapy',
            'page'   => 'therapy.php',
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

    // Real five-star reviews, picked from includes/data-reviews.php for length
    // so they sit evenly in the carousel — twelve clinics, both states, and a
    // spread of TMS, psychiatry and therapy. Light copy-editing only, for
    // punctuation and the practice's own name; reviews.php and the location
    // pages print the full set verbatim.
    // Shown six at a time; the arrows page through in groups of six, so this
    // stays a multiple of six or the last page comes up short.
    'reviews' => [
        ['quote' => '“Tiffany Nix takes the time to listen thoroughly and gives excellent feedback. She has helped me manage my depression for over four years.”', 'who' => 'Nancy W. · Laguna Hills'],
        ['quote' => '“Great program — significantly helps sleep quantity and quality, now up to 8 hrs. Plus mood stimulation and elevation. Very positive effect.”', 'who' => 'John M. · Huntington Beach'],
        ['quote' => '“I have been with the practice for a few years. Everything has been great from scheduling to the providers to office staff. Highly recommend.”', 'who' => 'Aimee G. · Cedar Park'],
        ['quote' => '“Anyone who suffers with anxiety/depression needs to come here. Every single staff member is amazing. This place has saved my life.”', 'who' => 'Sara R. · Torrance'],
        ['quote' => '“Doris is so easy to talk to. I am not ever embarrassed to say how I feel. She is wonderful.”', 'who' => 'Shauna H. · Central Dallas'],
        ['quote' => '“My NP John gave me really good guidance on how to have the most comprehensive and effective care plan to address my depression.”', 'who' => 'Nancy S. · Orange'],
        ['quote' => '“Very professional and caring team. Naydelin, Armani and Juliet were great and made my treatment very smooth.”', 'who' => 'Michael C. · Grapevine'],
        ['quote' => '“I had my intake appointment today. It was a wonderful experience and felt like it was in a good spot. 10/10 would recommend.”', 'who' => 'Rosario R. · Long Beach'],
        ['quote' => '“I have been blessed with my journey I have had with the team at Anew Era. Care is competent and compassionate. Highly recommend.”', 'who' => 'Mollie Z. · Westlake'],
        ['quote' => '“Very nice and professional office, from the front desk to the psychiatrist to the TMS technician. Highly recommend it.”', 'who' => 'Josh Z. · Allen'],
        ['quote' => '“Very comfortable atmosphere and warm greetings. I feel very comfortable with the therapist.”', 'who' => 'LaDonna D. · Cypress'],
    ],

    // Treatment page reviews, keyed by treatment: five-star reviews from
    // includes/data-reviews.php, quoted as written (line breaks joined, emoji
    // dropped). Reviews naming clinicians no longer on the team are left out.
    // Pages render them through includes/reviews-section.php.
    'treatment_reviews' => [
        'tms' => [
            ['quote' => '“The staff was super friendly and super flexible!! After the whole treatment I saw significant improvements in my mood and motivation. 10/10 recommend AnnewEra TMS for people who have treatment resistant depression”', 'who' => 'Kallie C. · Cypress'],
            ['quote' => '“After struggling with depression for so many years, I had forgotten how happy life was supposed to be. I would highly recommend Anew Era TMS to anyone who suffers from depression.”', 'who' => 'Terry C. · Laguna Hills'],
            ['quote' => '“The TMS procedure was life changing and my quality of life has gone up significantly. The staff was patient and kind. My technician Alex was particularly helpful and pleasant to talk and work with.”', 'who' => 'juan L. · Central Austin'],
            ['quote' => '“My TMS treatment was great! I have experienced so much improvement and benefits from this fantastic treatment. Also, my TMS technician Cel was wonderful. 10/10 would recommend!”', 'who' => 'Trey K. · Cedar Park'],
            ['quote' => '“Everyone at Anew Era is so nice and helpful. TMS also helped much with my depression. I want to give specific shout outs to Naydelin, Juilet, and Armani for being so wonderful for every session.”', 'who' => 'Crimson L. · Grapevine'],
            ['quote' => '“Anew Era has been a life saver for me. I have been thru the TMS treatment which was life changing. Rhoda is amazing and has been so helpful for me.”', 'who' => 'Becky J. · Allen'],
            ['quote' => '“This was a great treatment center. My TMS techs Sandy and Juliet were so kind. If you need TMS get it here!”', 'who' => 'Lauren A. · Torrance'],
            ['quote' => '“This is my second round of TMS with A new. Erika is awesome, as is everyone with ANew. I am grateful to have this treatment as an option for my depression.”', 'who' => 'C H. · Long Beach'],
            ['quote' => '“I’m doing my 2nd round of TMS with Anew Era in West LA. Once again they surpassed my expectations staff are all friendly and efficient. They even ensured that my insurance was accepted and pre-approved before my 1st appointment.”', 'who' => 'Jules V. · West Los Angeles'],
            ['quote' => '“I just had my first session of TMS this morning and it was a great experience. Jen was my tech and she did a great job of explaining everything to me and making me feel comfortable. I’m looking forward to the rest of the sessions.”', 'who' => 'Cody T. · Newport Beach'],
            ['quote' => '“Brie and Lisa are so knowledgeable about the services provided at Anew Era, and both provide a comfortable and healing atmosphere. TMS has been life changing and I couldn’t recommend this practice enough!”', 'who' => 'Molly · Westlake'],
            ['quote' => '“TMS has been awesome. Armani and everyone have been super accommodating. A very welcoming environment and treatment is surprisingly effective.”', 'who' => 'Adam D. · Central Dallas'],
        ],
        'psychiatry' => [
            ['quote' => '“I really really like my psychiatrist. She’s really nice. She’s super smart. I have my meds all the time. I never have an issue so thank you and I really appreciate her.”', 'who' => 'Elizabeth B. · Laguna Hills'],
            ['quote' => '“Dr Cudjoe is exceptional - she is very kind & caring and ensures I have the meds I need for my condition. She always makes me feel like I am a priority.”', 'who' => 'Jamie P. · Central Dallas'],
            ['quote' => '“Love my Doctor, Dr. Diya. He\'s always friendly and happy to hear I\'m doing so well! He is attentive and caring. Mental health is always so important and my life is so much better on the right medications. Thank you Doctor Diya!”', 'who' => 'Carol C. · Orange'],
            ['quote' => '“The staff is always friendly, and they really take into consideration my thoughts on medications. I stated I would like to start coming off meds soon and there was no hesitation or pushback. They truly care about their patients.”', 'who' => 'April C. · Allen'],
            ['quote' => '“Very good psychiatrist. Really listens and helpful when it comes to my questions about my mental health”', 'who' => 'Michael B. · Huntington Beach'],
            ['quote' => '“I am very greatful that my Psychiatrist Tiffany has taken the time to listen to me and with her positive attitude assured me she is there to assist in all my issues. Thank you again. God bless you all for your hard work.”', 'who' => 'Patricia G. · Newport Beach'],
            ['quote' => '“Had a wonderful first experience here and felt like I was actually listened to for the first time in a LONG TIME. After trying psychiatrist after psychiatrist, I will be returning here. So thankful for you guys!”', 'who' => 'Jamie · Westlake'],
            ['quote' => '“A New Era has been a huge help for me, especially during what I can call the hardest season of my life. Both the NP helping me regulate meds and Rickie with therapy have been an absolute Godsend!!”', 'who' => 'Carlos F. · Central Austin'],
            ['quote' => '“Amazing doctor has helped me through over 2 years of mental health issues, highly recommended. Does a great job of hearing your issues and regulating medications!”', 'who' => 'Hank G. · Orange'],
            ['quote' => '“This is a good psychiatrist office. I was able to get an appointment quickly. The Nurse-Practicioner listened well and was very helpful. I will return.”', 'who' => 'scott G. · Laguna Hills'],
            ['quote' => '“Really nice, professional Psychiatrist who has been willing to adjust my meds to my needs.Quite pleased with Dr. Diya\'s excellence and professionalism.”', 'who' => 'Adrienne M. · Orange'],
            ['quote' => '“Overall a pleasant experience with Dr. Madamombe. She communicated really well, and was helpful & patient in giving information/ diagnosis that was clear to prescribe medication with understanding of its effects.”', 'who' => 'Anonymous · Allen'],
        ],
        'therapy' => [
            ['quote' => '“I love my therapist! Amazing professional and a great person. I’m always looking forward to the next session and have already started noticing progress after only a few months. So happy I was recommended to this place!”', 'who' => 'Mihaela P. · Westlake'],
            ['quote' => '“My new Therapist Lauren Lopez is wonderful . She made me feel comfortable to express myself and was empathetic to what I was telling her. I feel she is the best fit for me . I’m looking forward to more sessions . Thanks”', 'who' => 'Teresita C. · Huntington Beach'],
            ['quote' => '“I enjoy my therapist. Her name is Kimberly Morgan. She is highly skilled and provide great feedback. She is the best!”', 'who' => 'Erika E. · Long Beach'],
            ['quote' => '“I definitely recommend to be seen with any of these professionals. The staff is excellent and the therapist are outstanding . It has helped me tremendously and I appreciate all of the staff and their efforts to help me”', 'who' => 'Theresa Q. · Orange'],
            ['quote' => '“I felt heard and understood and the therapist was very thorough it explains things in a way that are clear and concise, compassionate, and she is a very knowledgeable.”', 'who' => 'Cmarie · Long Beach'],
            ['quote' => '“They were incredibly helpful with finding my therapist and working with my insurance”', 'who' => 'Lauren W. · Central Austin'],
        ],
        'telepsychiatry' => [
            ['quote' => '“I am so thankful I found Anew Era TMS & Psychiatry when I needed them the most. I have always felt welcome and comfortable with all interactions I’ve had here. It’s so nice having the flexibility to decide if I’d like meet in person or via telehealth for my appointments. Highly recommend John Diya, he is very understanding, helpful, and easy to talk to.”', 'who' => 'MariLee B. · Orange'],
            ['quote' => '“I work FT and it’s hard for me to set up appointments in the day. Anew Era staff always make it super easy, remind me about the appointments, and even emailed me when I missed it completely getting stuck on a work call and I was able to jump on quickly by zoom or have the option to meet in person! Definitely would recommend!”', 'who' => 'Jessica P. · Long Beach'],
            ['quote' => '“So easy to take great care of your mental health, scheduling is totally stress free, online appts make is stress free as well. I thought I was going to lose my mind when my last psychiatrist dropped me because I kept missing appts. I found ANEW the next day and this was truly a blessing. The providers take excellent care of me, I feel comfortable talking to them, Rx refills are immediate. Very happy patient here!!!”', 'who' => 'Wendy D. · Central Austin'],
            ['quote' => '“The Telehealth visit s are very convenient and thorough. The medical practitioners are very good”', 'who' => 'Bill B. · Westlake'],
            ['quote' => '“I saw a psychiatric nurse practitioner today and everything went well. Great location and I have an option to see her remotely. I am happy with my experience today.”', 'who' => 'K M. · Torrance'],
            ['quote' => '“Excellent medication management. Friendly doctors and staff. Love the virtual therapy sessions.”', 'who' => 'Donna S. · Cypress'],
        ],
        // Parents writing about their son's or daughter's care. The reviews
        // do not give the child's age, so the section calls them parents'
        // reviews rather than claiming every one is about a teenager.
        'adolescent' => [
            ['quote' => '“I’m vary great full that I have found Anew Era to help my son! They really take the time to talk to him and help him to move forward with his treatment thanks to Savanna for dealing with my Calling her every time we need some thing whether it be a refill on his medications or just keeping the Drs up to-date on how he’s doing! He really feels comfortable with the doctor”', 'who' => 'Cynthia M. · Newport Beach'],
            ['quote' => '“My daughter was seen today by Emily who was so nice and listened to everything she said. Dr. Kudjoe was absolutely wonderful. I’d definitely be recommend them to my friends and family.”', 'who' => 'Joyce T. · Grapevine'],
            ['quote' => '“I am so pleased with the staff and The way they do things here. I had a problem and they were always aware of my needs as well as the needs of my daughter. I like the fact that they take time to listen and even more took the time to follow up to see if everything worked as planned planned. I am hopeful that things will work out in the future but even more pleased that this team is on board.”', 'who' => 'Mark · Central Austin'],
            ['quote' => '“As always rhoda is the best. I’ve been going too her for over 2 years . And now my son she has helped him tremdously. Caring, Loving And has A heart of gold....”', 'who' => 'Amanda S. · Allen'],
            ['quote' => '“Siti was wonderfully attentive and knowledgeable. I look forward to seeing more improvements with my daughter’s depression.”', 'who' => 'Andrea J. · Grapevine'],
        ],
    ],

    'faq_categories' => [
        [
            'name' => 'What to expect',
            'faqs' => [
                ['q' => 'What happens at my first visit?', 'a' => 'A sixty-minute diagnostic intake covering history, physical health, sleep and current symptoms, ending with a written plan you leave with the same day.'],
                ['q' => 'Do I have to take medication?', 'a' => 'No. Medication is one option among several. Many patients do well with therapy alone, or with TMS, and we will say so plainly rather than defaulting to a prescription.'],
                ['q' => 'How long does treatment take?', 'a' => 'It depends on the plan — a TMS course runs about six weeks, therapy is ongoing and reviewed monthly, medication changes are checked every two to four weeks at first.'],
                ['q' => 'Do you see adolescents?', 'a' => 'We see patients aged 15 and up. Adolescent care includes family sessions and, with consent, coordination with school counselors.'],
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
                ['value' => '60%', 'label' => 'average reduction in depression symptom scores by week eight'],
                ['value' => '50%', 'label' => 'average reduction in anxiety symptom scores by week eight'],
                ['value' => '93%', 'label' => 'of patients who begin a TMS course finish their treatment'],
                ['value' => '91%', 'label' => 'of patients attend all appointments booked over the course of a year and continue care'],
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
        'Our mission is to put TMS within reach of more people living with depression. Effective treatment shouldn’t be hard to find.',
        'TMS is FDA-cleared and non-medication-based, offering eligible patients another treatment option for depression.',
        'Our doctors, technicians, and office staff are here to make the treatment experience feel supportive and straightforward, from the first phone call through the final session.',
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
                'slot'    => 'cond-7',
                'alt'     => 'A woman smiling softly in an open field',
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
                'name'   => 'First, a conversation',
                'copy'   => 'A clinical interview about your daily life, your behavior and substance use, the feelings you have been having, and how long they have been going on.',
            ],
            [
                'number' => '02',
                'name'   => 'Questionnaires',
                'copy'   => 'Standardized screens such as the PHQ-9 put a number on what you describe, so change can be tracked rather than guessed at.',
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
            'Move toward a life that feels like yours again',
        ],

        'faqs' => [
            [
                'q' => 'Is depression common?',
                'a' => 'It is one of the most common mental health conditions in the United States. The NIMH reports that nearly 15 million American adults experience a depressive episode each year, and Gallup found diagnosed depression rose from about 21% of adults in 2017 to almost 30% in 2023.',
            ],
            [
                'q' => 'How is depression diagnosed?',
                'a' => 'Depression is diagnosed through both a psychological and a physical assessment, and only by a medical professional. Expect a clinical interview, one or more questionnaires, and questions about your physical health — sometimes a blood test, because conditions such as thyroid disorders produce symptoms that look a great deal like depression.',
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
                'a' => 'A session runs roughly 30 to 40 minutes, and a full course spans four to six weeks. There is no recovery time afterward — patients drive themselves home and go back to their day. Accelerated protocols compress the same course into days for people who need it faster.',
            ],
            [
                'q' => 'Will my insurance cover TMS for depression?',
                'a' => 'For treatment-resistant depression, most plans do once two or more medications have been tried. We verify your benefits and handle the prior authorization before you commit to anything.',
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
        'related' => ['anxiety', 'migraines', 'ocd', 'ptsd', 'postpartum'],
    ],
];
