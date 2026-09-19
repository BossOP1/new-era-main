<?php
/**
 * The legal pages: privacy, HIPAA, terms and accessibility.
 *
 * ⚠⚠ THESE ARE DRAFTS. They are carefully structured and they cover the
 * ground each document is supposed to cover, but they have not been reviewed
 * by a lawyer and they are not a substitute for one. Do not publish them as
 * they stand. In particular:
 *
 *   · The HIPAA Notice of Privacy Practices has content required by law
 *     (45 CFR 164.520), including the header that must appear verbatim. The
 *     required elements are all here, but a covered entity's notice has to
 *     match what that entity actually does, and only you know that.
 *   · California and Texas both impose confidentiality duties stricter than
 *     HIPAA — the CMIA in California, the Texas Medical Records Privacy Act
 *     in Texas. Both are flagged in the notice but neither is worked through.
 *   · Anything in [square brackets] is a placeholder that must be filled in
 *     before these go live: the Privacy Officer, the effective dates, the
 *     mailing address, the governing-law state. They are bracketed so they
 *     cannot ship unnoticed, the same way (555) 000-0000 is in config.php.
 *   · 'updated' says when the text was drafted, not when it took legal
 *     effect. Set real dates when they are adopted.
 *
 * Shape of an entry
 *   title, meta, updated, lede
 *   notice    optional block that must appear prominently and verbatim
 *   sections  [ heading, paras[], list[]?, terms[[term, definition]]?, note? ]
 */

$legal_contact = [
    'practice' => 'Anew Era Health',
    'officer'  => '[Privacy Officer name]',
    'email'    => '[privacy@yourdomain.com]',
    'phone'    => '(866) 826-2061',
    'post'     => '[Practice mailing address]',
];

return [

/* ── Privacy policy ───────────────────────────────────────────────────── */
'privacy' => [
    'title'   => 'Privacy policy',
    'meta'    => 'How Anew Era Health handles information collected through this website — what we collect, why, who we share it with, and the choices you have.',
    'updated' => '20 September 2026',
    'lede'    => 'This policy covers the information this website collects. Your medical record is covered separately and more strictly by our HIPAA Notice of Privacy Practices.',
    'sections' => [
        [
            'heading' => 'What this policy covers, and what it does not',
            'paras' => [
                'This policy is about the website. It explains what is collected when you browse these pages, fill in the contact form or use the screening questionnaire.',
                'It is not about your medical record. Health information we hold because you are a patient is protected health information, and how we may use and disclose it is set out in our HIPAA Notice of Privacy Practices. Where the two documents differ on health information, the HIPAA notice governs.',
            ],
            'note' => 'Sending us a message through this website does not make you a patient and does not create a clinician–patient relationship.',
        ],
        [
            'heading' => 'What we collect',
            'terms' => [
                ['Information you give us', 'The contact form asks for your name, email, phone, the clinic nearest you, what you are asking about, your insurance carrier if you choose to share it, and anything you write in the message box. The form asks you not to include medical detail, because a web form is not a secure channel.'],
                ['Information collected automatically', 'Our host records standard server logs — IP address, browser and device type, the pages requested and when. These are used to keep the site running and secure.'],
                ['Cookies', 'This site sets no advertising or tracking cookies of its own. Some pages embed third-party content that may set its own cookies once you interact with it, which is covered below.'],
            ],
        ],
        [
            'heading' => 'What the screening questionnaire does not collect',
            'paras' => [
                'The PHQ-9 on this site is scored entirely in your browser. Your answers are not transmitted to us, not stored on your device and not recorded anywhere. Nobody at the practice can see what you answered, and closing the tab discards it.',
                'If you want a clinician to see a score, you have to tell them yourself.',
            ],
        ],
        [
            'heading' => 'How we use it',
            'list' => [
                'To answer your enquiry and, if you ask, to arrange an appointment.',
                'To verify your insurance benefits before a first visit, where you have given us a carrier.',
                'To keep the website working, secure and free of abuse.',
                'To meet our legal and professional obligations.',
            ],
            'note' => 'We do not sell your information, and we do not share it with advertisers.',
        ],
        [
            'heading' => 'Who we share it with',
            'terms' => [
                ['Service providers', 'Our website host and form provider process submissions on our behalf so we can receive them. They act under contract and only on our instructions.'],
                ['Embedded third parties', 'Some pages link to or embed content from others — video, maps, clinician booking profiles. Following those links takes you to services with their own privacy policies, which we do not control.'],
                ['When the law requires it', 'We may disclose information where we are legally required to, or to protect the safety of a person where there is a serious and imminent threat.'],
            ],
        ],
        [
            'heading' => 'Third-party content on this site',
            'paras' => [
                'Video on this site is embedded as a click-to-play placeholder. Nothing is requested from the video provider and no cookie is set by it until you press play. If you never play a video, that provider is never contacted.',
                'Links to maps, to clinician booking profiles and to the equipment manufacturer\'s website take you off this site. What those services collect is governed by their own policies.',
            ],
        ],
        [
            'heading' => 'How long we keep it',
            'paras' => [
                'Enquiries are kept for as long as we need them to answer you and to meet our record-keeping obligations, then disposed of securely. Where an enquiry becomes part of a patient record, the retention rules in our HIPAA notice apply instead.',
            ],
        ],
        [
            'heading' => 'Your choices',
            'list' => [
                'You do not have to use the contact form. The phone number on every page reaches the same people.',
                'You can ask us what we hold from a website enquiry, and ask us to correct or delete it.',
                'Most browsers let you block or clear cookies. This site works without them.',
                'Residents of some states have additional rights over personal information. Contact us and we will tell you what applies and how to exercise it.',
            ],
        ],
        [
            'heading' => 'Children',
            'paras' => [
                'This website is not directed at children under 13, and we do not knowingly collect information from them through it. We do treat adolescents from 13, but those arrangements are made by a parent or guardian, not through a form.',
            ],
        ],
        [
            'heading' => 'Changes, and how to reach us',
            'paras' => [
                'If this policy changes we will post the revised version here and update the date at the top. Material changes will be flagged on the page rather than made quietly.',
            ],
        ],
    ],
],

/* ── HIPAA Notice of Privacy Practices ────────────────────────────────── */
'hipaa' => [
    'title'   => 'HIPAA notice of privacy practices',
    'meta'    => 'How Anew Era Health may use and disclose your protected health information, and the rights you have over it under HIPAA.',
    'updated' => '20 September 2026',
    'lede'    => 'This notice applies to the health information we hold about you as a patient. It is required by federal law and we are required to follow it.',
    // Required to appear prominently and in this wording. Do not soften it.
    'notice'  => 'THIS NOTICE DESCRIBES HOW MEDICAL INFORMATION ABOUT YOU MAY BE USED AND DISCLOSED AND HOW YOU CAN GET ACCESS TO THIS INFORMATION. PLEASE REVIEW IT CAREFULLY.',
    'sections' => [
        [
            'heading' => 'Our duties',
            'paras' => [
                'We are required by law to maintain the privacy of your protected health information, to give you this notice of our legal duties and privacy practices, and to notify you if a breach affects your unsecured health information.',
                'We are required to follow the terms of the notice currently in effect. Effective date: [effective date].',
            ],
        ],
        [
            'heading' => 'How we may use and disclose your information without your authorization',
            'terms' => [
                ['Treatment', 'To provide, coordinate and manage your care — so a prescriber and a therapist in this practice can discuss your treatment, or so we can send information to another clinician treating you.'],
                ['Payment', 'To bill and collect from you or your health plan: verifying benefits, obtaining prior authorization, and submitting claims.'],
                ['Health care operations', 'To run the practice — quality review, training, licensing, audits, and business management.'],
            ],
        ],
        [
            'heading' => 'Other uses and disclosures permitted or required by law',
            'list' => [
                'To public health authorities, for disease prevention and control and reporting required by law.',
                'To report suspected abuse, neglect or domestic violence, as required or permitted.',
                'To health oversight agencies for audits, investigations and inspections.',
                'In response to a court order, subpoena or other lawful process, subject to the protections the law requires.',
                'To law enforcement in the limited circumstances the law allows.',
                'To coroners, medical examiners and funeral directors, as permitted.',
                'For research, where an institutional review board has approved a waiver or the information has been de-identified.',
                'To prevent a serious and imminent threat to the health or safety of you or another person.',
                'For workers\' compensation, and for specialised government functions including military and national security.',
            ],
            'note' => 'Where a state law gives your information greater protection than HIPAA, that state law applies. California\'s Confidentiality of Medical Information Act and the Texas Medical Records Privacy Act both impose duties stricter than HIPAA in places.',
        ],
        [
            'heading' => 'Uses that always need your written authorization',
            'list' => [
                'Most uses and disclosures of psychotherapy notes.',
                'Uses and disclosures for marketing purposes.',
                'Disclosures that constitute a sale of your health information.',
                'Any other use or disclosure not described in this notice.',
            ],
            'note' => 'You may revoke an authorization in writing at any time. Revoking it stops future use or disclosure; it cannot undo what has already been done in reliance on it.',
        ],
        [
            'heading' => 'Your rights',
            'terms' => [
                ['Get a copy of your record', 'You may inspect and obtain a copy of your health record, usually within 30 days of asking. We may charge a reasonable, cost-based fee.'],
                ['Ask us to correct it', 'If you believe something in your record is wrong or incomplete you may ask us to amend it. We may decline, and if we do we will tell you why in writing and you may file a statement of disagreement.'],
                ['Get a list of disclosures', 'You may ask for an accounting of certain disclosures we have made in the six years before your request.'],
                ['Ask us to limit what we use or share', 'You may request a restriction. We are not required to agree — except that if you pay for an item or service in full out of pocket, you may require us not to disclose that information to your health plan, and we must comply.'],
                ['Ask us to contact you differently', 'You may ask us to reach you at a particular number or address, or by a particular means. We will accommodate reasonable requests without asking why.'],
                ['Get a paper copy of this notice', 'You may ask for one at any time, even if you agreed to receive it electronically.'],
                ['Choose someone to act for you', 'A personal representative with legal authority may exercise these rights on your behalf.'],
                ['Be told of a breach', 'We will notify you if a breach compromises the privacy or security of your unsecured health information.'],
            ],
        ],
        [
            'heading' => 'Your choices in certain disclosures',
            'paras' => [
                'In some cases you can tell us what you prefer. Unless you object, we may share relevant information with a family member, friend or other person involved in your care or payment for it, and we may share information in a disaster relief situation.',
                'If you are not able to tell us your preference — in an emergency, for example — we may share what we judge to be in your best interest, and only what is relevant.',
            ],
        ],
        [
            'heading' => 'Complaints',
            'paras' => [
                'If you believe your privacy rights have been violated you may complain to us, using the contact details at the foot of this page, or directly to the Secretary of the U.S. Department of Health and Human Services, Office for Civil Rights.',
                'We will not retaliate against you, and your care will not be affected, because you filed a complaint.',
            ],
            'note' => 'Office for Civil Rights complaints can be filed at hhs.gov/ocr/privacy/hipaa/complaints.',
        ],
        [
            'heading' => 'Changes to this notice',
            'paras' => [
                'We may change this notice, and the changed notice will apply to information we already hold as well as information we receive afterwards. The current notice will always be posted on this page with its effective date, and paper copies are available at every clinic.',
            ],
        ],
    ],
],

/* ── Terms of use ─────────────────────────────────────────────────────── */
'terms' => [
    'title'   => 'Terms of use',
    'meta'    => 'The terms on which this website is made available — what it is for, what it is not, and the limits of what you can rely on it for.',
    'updated' => '20 September 2026',
    'lede'    => 'These terms govern your use of this website. The short version: it is information, not medical advice, and it is not the place to go in an emergency.',
    'sections' => [
        [
            'heading' => 'Accepting these terms',
            'paras' => [
                'By using this website you agree to these terms. If you do not agree with them, please do not use the site.',
            ],
        ],
        [
            'heading' => 'This site is not medical advice',
            'paras' => [
                'Everything here is general information about mental health conditions and the treatments we offer. It is not a diagnosis, not a treatment recommendation, and not a substitute for an assessment by a clinician who knows your history.',
                'Reading this site, filling in the contact form or completing the screening questionnaire does not make you our patient and does not create a clinician–patient relationship. That begins when you are seen.',
            ],
        ],
        [
            'heading' => 'In an emergency',
            'paras' => [
                'Do not use this website, the contact form or email if you need urgent help. We are an outpatient practice and nothing here is monitored out of hours.',
                'If you are in crisis, call or text 988 — the Suicide and Crisis Lifeline, any time. If someone is in immediate danger, call 911.',
            ],
        ],
        [
            'heading' => 'The screening questionnaire',
            'paras' => [
                'The PHQ-9 on this site is a screening instrument, not a diagnostic test. A score suggests whether a conversation is warranted; it cannot tell you what is wrong. Many things other than depression produce scores in the same ranges.',
                'It is scored in your browser and we never see the result. Do not rely on it in place of an assessment, and do not delay seeking help because of a low score.',
            ],
        ],
        [
            'heading' => 'Reviews and outcomes',
            'paras' => [
                'Patient reviews published on this site are the words of the people who wrote them and describe their own experience. They are not a prediction of your result. Mental health treatment works differently for different people and nothing on this site promises an outcome.',
            ],
        ],
        [
            'heading' => 'Other people\'s material',
            'paras' => [
                'Some content here belongs to others and is used as theirs. Equipment names, product photography and films belong to the manufacturer of the systems we treat on, and are identified as theirs where they appear. Clinician booking links take you to third-party services.',
                'We do not control those services and are not responsible for their content, their availability or their privacy practices.',
            ],
        ],
        [
            'heading' => 'Our material',
            'paras' => [
                'The text, design and arrangement of this site belong to the practice. You may read it, print it and share links to it. You may not republish it as your own.',
            ],
        ],
        [
            'heading' => 'Accuracy and availability',
            'paras' => [
                'We try to keep this site accurate and current, but clinical practice, insurance coverage and clinic details all change. Nothing here is warranted to be complete or up to date, and we may change or withdraw any of it without notice.',
                'Coverage, availability and clinical suitability are confirmed with you directly, not by a web page.',
            ],
        ],
        [
            'heading' => 'Limitation of liability',
            'paras' => [
                'To the fullest extent the law allows, the practice is not liable for any loss arising from reliance on the content of this website. Nothing in these terms limits liability that cannot lawfully be limited, including liability for personal injury caused by negligence.',
            ],
        ],
        [
            'heading' => 'Governing law, and changes',
            'paras' => [
                'These terms are governed by the laws of [state], without regard to its conflict of law rules.',
                'We may revise these terms. The current version is always the one on this page, with its date at the top.',
            ],
        ],
    ],
],

/* ── Accessibility statement ──────────────────────────────────────────── */
'accessibility' => [
    'title'   => 'Accessibility statement',
    'meta'    => 'How this website is built for accessibility, what standard it targets, what we know is not right yet, and how to tell us or get help another way.',
    'updated' => '20 September 2026',
    'lede'    => 'Mental health care is hard enough to reach without the website getting in the way. This is what we have done, what we know is imperfect, and how to reach us if something blocks you.',
    'sections' => [
        [
            'heading' => 'The standard we are aiming at',
            'paras' => [
                'We are working towards the Web Content Accessibility Guidelines (WCAG) 2.1 at Level AA. That is the benchmark most commonly referenced in U.S. accessibility law and the one we measure against.',
                'We have not obtained a formal third-party audit. This statement describes what has actually been built and tested, not a certificate.',
            ],
        ],
        [
            'heading' => 'What this site does',
            'list' => [
                'Works without JavaScript. Every page renders its content server-side — including all nine screening questions and every patient review — so nothing essential depends on scripting.',
                'Respects reduced-motion settings. If your system asks for less motion, animations, scroll effects and hover movement are switched off rather than merely shortened.',
                'Is navigable by keyboard. Menus open and close with the keyboard, dropdown items are reachable with the arrow keys, Escape closes what is open, and focus is visible throughout.',
                'Uses real form labels. Every field has a label tied to it, required fields are marked, and errors rely on the browser rather than colour alone.',
                'Meets AA contrast on body text, including white type over photography, which is checked against the actual composited background rather than assumed.',
                'Uses semantic structure — headings in order, lists as lists, landmarks for navigation and content — so screen readers can move through a page sensibly.',
                'Marks decorative images as decorative and gives meaningful ones descriptive alternative text.',
            ],
        ],
        [
            'heading' => 'What we know is not right yet',
            'list' => [
                'Embedded video is hosted by a third party. Its player and captions are outside our control, though we load it only when you choose to play something.',
                'Map links open a third-party mapping service whose accessibility we do not control. Every clinic\'s full address is written out on its page so you do not have to use the map.',
                'Clinician booking links go to an external scheduling service. If it does not work for you, call us and we will book the same appointment by phone.',
                'Some clinician photographs are supplied at a low resolution and may be soft when enlarged.',
                'Long documents like this one do not yet have a downloadable plain-text version.',
            ],
        ],
        [
            'heading' => 'If something blocks you',
            'paras' => [
                'Tell us. Describe what you were trying to do, the page you were on, and the browser or assistive technology you were using. We will reply and, where we can, fix it.',
                'You do not have to wait for a fix to get care. Anything on this site can be done by phone instead — booking, asking about insurance, or having a form read to you and filled in with you.',
            ],
            'note' => 'If you need information from this site in another format, ask and we will provide it.',
        ],
    ],
],

];
