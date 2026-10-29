<?php
/**
 * SEO title and meta description overrides, keyed by page file name.
 *
 * Standard (Oct 2026, from the review): titles lead with the primary keyword
 * and stay at 60 characters or under; descriptions run 120–160 characters.
 * header.php reads this before falling back to a page's own $page_title and
 * $page_description, so a page listed here is fixed in one place. Either key
 * may be left out to keep the page's own value.
 */
return [

    // ── Core pages ──────────────────────────────────────────────────────
    'adolescent' => [
        'description' => 'Teen psychiatry and therapy for ages 15 and up, in person and by telehealth across California and Texas. Family sessions and clear rules on what parents hear.',
    ],
    'anxiety' => [
        'title'       => 'Anxiety Treatment & TMS Therapy | Anew Era Health',
    ],
    'contact' => [
        'title'       => 'Contact Us & Book an Appointment | Anew Era Health',
        'description' => 'Call, email or message Anew Era Health. We check your insurance before your first visit and usually book you within five business days. In crisis, call 988.',
    ],
    'depression' => [
        'title'       => 'Depression Treatment & TMS Therapy | Anew Era Health',
        'description' => 'Depression is treatable. Learn the signs, types and diagnosis, and how TMS therapy helps when antidepressants have not been enough. Most plans accepted.',
    ],
    'depression-short' => [
        'title'       => 'Depression Treatment & TMS Therapy | Anew Era Health',
        'description' => 'Depression is treatable. Learn the signs, types and diagnosis, and how TMS therapy helps when antidepressants have not been enough. Most plans accepted.',
    ],
    'faq' => [
        'title'       => 'TMS, Psychiatry & Insurance FAQ | Anew Era Health',
        'description' => 'Plain answers on first visits, insurance and prior authorization, TMS therapy, psychiatry, therapy and Spravato® from the clinical team at Anew Era Health.',
    ],
    'insurance' => [
        'title'       => 'Insurance for TMS, Psychiatry & Therapy | Anew Era Health',
        'description' => 'See which insurance carriers Anew Era Health is in-network with, how a benefits check works, and what coverage looks like for TMS, psychiatry and therapy.',
    ],
    'magstim-horizon' => [
        'title'       => 'Magstim Horizon® 3.0 TMS System | Anew Era Health',
        'description' => 'Meet the Magstim Horizon® 3.0 with StimGuide® PRO navigation, the TMS system we treat on: what it does, what the FDA has cleared it for, and what to expect.',
    ],
    'migraines' => [
        'title'       => 'Migraine Treatment with TMS Therapy | Anew Era Health',
    ],
    'ocd' => [
        'title'       => 'OCD Treatment & TMS Therapy for OCD | Anew Era Health',
        'description' => 'OCD is treatable, and TMS is FDA-cleared for it. Understand obsessions and compulsions, and what to do when therapy alone has not been enough. Book a consult.',
    ],
    'phq9' => [
        'title'       => 'PHQ-9 Depression Test: Free Online Screening',
        'description' => 'Take the free PHQ-9, the nine-question depression screening, scored in your browser. Nothing is sent anywhere. A screening tool, not a diagnosis.',
    ],
    'postpartum' => [
        'title'       => 'Postpartum Depression Treatment & TMS | Anew Era Health',
        'description' => 'Postpartum depression is not the baby blues or a character flaw. Learn the symptoms and how TMS therapy treats it without medication reaching breast milk.',
    ],
    'psychiatry' => [
        'title'       => 'Psychiatrist & Medication Management | Anew Era Health',
        'description' => 'Psychiatric evaluation and medication management from clinicians who take time to know you. What a first visit involves and what psychiatry treats.',
    ],
    'ptsd' => [
        'title'       => 'PTSD Treatment & TMS Therapy for PTSD | Anew Era Health',
        'description' => 'PTSD is treatable. Understand the symptom clusters, how PTSD is diagnosed, and how TMS therapy helps when medication and therapy have not been enough.',
    ],
    'reviews' => [
        'title'       => 'Patient Reviews of Our TMS & Psychiatry Clinics',
        'description' => 'Read real five-star patient reviews from Anew Era Health clinics in California and Texas. Filter by location and treatment: TMS, psychiatry and therapy.',
    ],
    'spravato' => [
        'title'       => 'Spravato® (Esketamine) Treatment in Texas | Anew Era Health',
        'description' => 'Spravato® (esketamine) nasal spray for treatment-resistant depression, given under supervision at our Texas clinics. Who it is for and what a visit involves.',
    ],
    'team' => [
        'title'       => 'Meet Our Psychiatrists & Therapists | Anew Era Health',
        'description' => 'Meet the psychiatrists, nurse practitioners and therapists at Anew Era Health in California and Texas. Filter by location, read bios and book a clinician.',
    ],
    'telepsychiatry' => [
        'title'       => 'Telepsychiatry & Online Therapy | Anew Era Health',
        'description' => 'Psychiatry and therapy by secure video anywhere in California or Texas. The same clinicians and the same plan, without the drive. Most insurance accepted.',
    ],
    'therapy' => [
        'title'       => 'Therapy & Counseling Services in California & Texas',
        'description' => 'Evidence-based therapy, including CBT, DBT, EMDR, ACT and exposure work, with therapists who work alongside your prescriber. Learn what a session is like.',
    ],
    'tms' => [
        'title'       => 'TMS Therapy for Depression, OCD & More | Anew Era Health',
    ],
    'treatments' => [
        'title'       => 'Mental Health Treatments: TMS, Psychiatry & Therapy',
    ],

    // ── Articles: titles shortened to 60, descriptions brought to 120–160 ─
    '7-tips-to-stay-mentally-strong-while-your-loved-one-is-deployed' => [
        'title' => '7 Tips to Stay Mentally Strong During a Deployment',
    ],
    'antidepressant-side-effects-comparison' => [
        'title' => 'TMS Therapy vs. Antidepressants: Depression Treatment Guide',
    ],
    'can-tms-cause-anxiety' => [
        'description' => 'Can TMS cause anxiety? Learn whether TMS triggers anxiety, why temporary spikes happen, what the TMS dip is, and how TMS treats anxious depression.',
    ],
    'cost-of-tms-therapy-without-insurance' => [
        'description' => 'How much does TMS therapy cost without insurance in 2026? See private-pay rates, what affects the total price, payment options and questions to ask.',
    ],
    'depression-and-anxiety' => [
        'title' => 'Depression and Anxiety: The Connection & Treatment',
    ],
    'depression-doesnt-go-away' => [
        'title' => 'What to Do When Depression Doesn’t Go Away | Anew Era Health',
    ],
    'does-ocd-get-worse-with-age' => [
        'title'       => 'Does OCD Get Worse With Age? What to Know',
        'description' => 'Does OCD get worse with age? Learn how OCD symptoms change over time, how stress and untreated symptoms affect them, and which treatments work best.',
    ],
    'does-tricare-cover-tms-therapy' => [
        'description' => 'Does TRICARE cover TMS therapy? See TRICARE coverage rules for major depressive disorder, eligibility, prior authorization, costs and how to get started.',
    ],
    'ect-treatment-tms-therapy' => [
        'title' => 'TMS vs. ECT: Comparing Brain Stimulation Therapies',
    ],
    'embracing-self-care-a-journey-to-mental-health-and-well-being' => [
        'title' => 'Embracing Self-Care for Mental Health and Well-Being',
    ],
    'energy-drinks-and-mental-health' => [
        'title' => 'Energy Drinks and Mental Health: How They Affect You',
    ],
    'exploring-the-gender-gap-understanding-the-unique-challenges-of-mental-health-in-men-and-women' => [
        'title' => 'Mental Health in Men and Women: Exploring the Gender Gap',
    ],
    'finding-the-right-provider' => [
        'title' => 'Finding the Right Mental Health Provider for You',
    ],
    'how-long-can-postpartum-anxiety-last' => [
        'description' => 'How long can postpartum anxiety last? Learn typical timelines, symptoms, triggers like sleep loss, effective treatments and where to find postpartum support.',
    ],
    'how-long-do-migraines-last' => [
        'description' => 'How long do migraines last? Learn the length of all four migraine phases, why some attacks last days, what rebound headaches are, and how TMS can help.',
    ],
    'how-long-do-the-effects-tms-treatment-last' => [
        'title'       => 'How Long Do the Effects of TMS Treatment Last?',
        'description' => 'How long do the effects of TMS therapy last? Learn how long results typically hold after a course of TMS for depression and when maintenance sessions help.',
    ],
    'how-tms-therapy-can-help-with-your-anxiety-disorder' => [
        'description' => 'Find relief from anxiety disorders with TMS therapy. Learn how TMS helps with worry, panic attacks and other anxiety symptoms so you can regain control.',
    ],
    'how-to-prevent-postpartum-depression' => [
        'title' => 'How to Prevent Postpartum Depression: Signs & Support',
    ],
    'how-to-support-your-lgbtq-loved-ones-during-pride-month-and-beyond' => [
        'title' => 'Supporting LGBTQ+ Loved Ones During Pride and Beyond',
    ],
    'how-to-talk-to-family-and-friends-about-your-mental-health-condition' => [
        'title' => 'How to Talk to Family and Friends About Your Mental Health',
    ],
    'is-adhd-a-disability' => [
        'description' => 'Is ADHD a disability? Learn when ADHD qualifies under the ADA, your workplace accommodation rights, Social Security rules, evaluation and treatment options.',
    ],
    'is-tms-therapy-legitimate' => [
        'description' => 'Is TMS therapy legitimate? Learn about FDA clearances, clinical research, how TMS works in the brain, insurance coverage and success rates for depression.',
    ],
    'is-tms-therapy-right-for-you-exploring-the-candidacy-criteria' => [
        'title' => 'Is TMS Therapy Right for You? Candidacy Criteria',
    ],
    'living-a-fulfilling-life-with-depression-or-anxiety' => [
        'title' => 'Living a Fulfilling Life with Depression or Anxiety',
    ],
    'magnetic-therapy-depression' => [
        'description' => 'Learn how TMS magnetic therapy treats depression at Anew Era TMS & Psychiatry, including success rates, side effects, cost and insurance coverage.',
    ],
    'managing-mental-illness-in-older-adults' => [
        'description' => 'Tips for managing mental illness in older adults: treatment options, common barriers to care, and why strong support systems improve quality of life.',
    ],
    'new-treatment-depression' => [
        'title'       => 'A Breakthrough in Depression Treatment: TMS Therapy',
        'description' => 'TMS therapy offers new hope for depression: an effective, non-invasive treatment for people whose depression has not responded to medication.',
    ],
    'psychiatrist-in-california' => [
        'title'       => 'Psychiatrists in California | Anew Era Health',
        'description' => 'Anew Era TMS & Psychiatry offers psychiatry and TMS therapy across Southern California, including Newport Beach, Huntington Beach and Orange County.',
    ],
    'psychiatrists-therapists-and-nurse-practitioners' => [
        'title' => 'How Psychiatrists, Therapists and NPs Work Together',
    ],
    'relapsing-depression-why-tms-therapy-doesnt-mean-you-have-to-start-from-zero' => [
        'title'       => 'Relapsing Depression: TMS Doesn’t Mean Starting Over',
        'description' => 'Treating relapsing depression doesn’t mean starting from zero. Learn why a second round of TMS therapy can work as well as, or better than, the first.',
    ],
    'side-effects-of-antidepressants' => [
        'title' => 'Side Effects of Antidepressants & Alternative Treatments',
    ],
    'spravato-a-breakthrough-treatment-for-depression' => [
        'title' => 'Spravato & Ketamine-Assisted Therapy for Depression',
    ],
    'supporting-veterans-with-ptsd-or-depression-a-guide-to-understanding-and-empathy' => [
        'title' => 'Supporting Veterans with PTSD or Depression: A Guide',
    ],
    'telehealth-vs-in-person-care' => [
        'title' => 'Telehealth vs. In-Person Mental Health Care',
    ],
    'the-fda-approval-of-spravato-what-it-means-for-depression-treatment' => [
        'title' => 'The FDA Approval of Spravato: What It Means for You',
    ],
    'the-impact-of-social-media-on-mental-health' => [
        'title' => 'The Impact of Social Media on Mental Health',
    ],
    'the-impact-of-tms-on-quality-of-life-improving-overall-well-being' => [
        'title' => 'How TMS Therapy Improves Quality of Life',
    ],
    'the-link-between-trauma-and-mental-illness-understanding-the-impact' => [
        'title' => 'The Link Between Trauma and Mental Illness',
    ],
    'the-role-of-medication-in-mental-health-treatment' => [
        'description' => 'Learn the role medication plays in mental health treatment, how it can reduce symptoms and improve well-being, and how it works alongside therapy and TMS.',
    ],
    'the-science-of-neuroplasticity-how-tms-therapy-rewires-your-brain-pathways' => [
        'title' => 'Neuroplasticity: How TMS Therapy Rewires the Brain',
    ],
    'tms-for-ocd-how-it-works-what-to-expect-and-who-may-benefit' => [
        'title'       => 'TMS for OCD: How It Works and What to Expect',
        'description' => 'Explore TMS therapy for OCD: how TMS works, how effective it is, what to expect during treatment and who may benefit most. Read the full guide.',
    ],
    'tms-for-ocd' => [
        'title'       => 'TMS for OCD: Treatment That Works | Anew Era Health',
        'description' => 'TMS for OCD uses magnetic pulses to calm the brain circuits behind obsessions and compulsions. Learn how it works and whether it could help you.',
    ],
    'tms-for-postpartum-depression-a-compassionate-medication-free-path-to-relief' => [
        'title' => 'TMS for Postpartum Depression: Medication-Free Relief',
    ],
    'tms-mapping-vs-traditional-meds-for-treatment-resistant-depression-more' => [
        'title' => 'TMS Mapping vs. Medication for Resistant Depression',
    ],
    'tms-ocd-treatment' => [
        'title'       => 'TMS Treatment for OCD | Anew Era Health',
        'description' => 'OCD can leave you feeling trapped. Learn how TMS treatment for obsessive-compulsive disorder works and how it can help when other treatments have not.',
    ],
    'tms-therapy-vs-ect-therapy-which-is-better-for-psychiatric-treatment' => [
        'title' => 'TMS Therapy vs. ECT: Which Is Better?',
    ],
    'tms-therapy-vs-theta-burst-therapy' => [
        'description' => 'TMS vs. theta burst therapy: learn the differences in session length, effectiveness and side effects to help you choose the right depression treatment.',
    ],
    'tms-therapy-vs-traditional-depression-treatments' => [
        'title' => 'TMS vs. Traditional Depression Treatments',
    ],
    'tms-therapy-vs-traditional-treatments' => [
        'title'       => 'TMS vs. Traditional Treatments for Depression & Anxiety',
        'description' => 'Compare TMS therapy with traditional treatments for depression and anxiety, and see how a personalized TMS plan at Anew Era can offer new hope.',
    ],
    'top-5-ways-to-live-your-best-life-now' => [
        'title'       => 'Top 5 Ways to Live Your Best Life Now',
        'description' => 'What does your best life look like? Here are five practical ways to live a fuller life while you navigate a mental health condition like depression.',
    ],
    'transcranial-magnetic-stimulation-providers' => [
        'title'       => 'Transcranial Magnetic Stimulation Providers | Anew Era',
        'description' => 'Find a trusted transcranial magnetic stimulation (TMS) provider near you at Anew Era TMS & Psychiatry, an effective option for persistent depression.',
    ],
    'understanding-burnout-and-its-profound-impact-on-mental-health' => [
        'title' => 'Understanding Burnout and Its Impact on Mental Health',
    ],
    'understanding-the-key-differences-in-mental-health-care' => [
        'title'       => 'Nurse Practitioner vs. Psychiatrist: Key Differences',
        'description' => 'Learn the key differences between psychiatric nurse practitioners and psychiatrists, including training, scope of practice and treatment approach.',
    ],
    'using-insurance-for-tms-mental-health-treatment-a-comprehensive-guide' => [
        'title' => 'Using Insurance for TMS & Mental Health Treatment',
    ],
    'what-is-mdd-disorder' => [
        'title'       => 'What Is MDD (Major Depressive Disorder)?',
        'description' => 'What is MDD? Learn the symptoms of major depressive disorder, how it is diagnosed, and how TMS therapy helps people whose depression resists medication.',
    ],
    'what-is-seasonal-affective-disorder-sad' => [
        'title'       => 'What Is Seasonal Affective Disorder (SAD)?',
        'description' => 'Feeling down every fall and winter? You may have seasonal affective disorder (SAD). Learn the signs, causes and treatments that can help you feel better.',
    ],
    'what-is-trd-treatment-resistant-depression-and-how-can-tms-help' => [
        'title' => 'What Is Treatment-Resistant Depression? How TMS Helps',
    ],
    'why-choose-tms-therapy-over-medication-exploring-the-advantages-of-non-medicinal-treatments' => [
        'title' => 'Why Choose TMS Therapy Over Medication?',
    ],
    'winter-self-care-nurturing-your-mental-health' => [
        'title' => 'Winter Self-Care: Nurturing Your Mental Health',
    ],
];
