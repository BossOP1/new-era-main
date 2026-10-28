<?php
/**
 * Anew Era TMS & Psychiatry — Blog Post
 * 
 * Title: Who Is Eligible for TMS Therapy? Candidacy Guide
 * Publishing Date: September 11, 2026
 */
$page_title        = 'Who Is Eligible for TMS Therapy? Candidacy Guide';
$page_description  = 'Who is eligible for TMS therapy? Learn about clinical indications for depression and OCD, medical history factors, insurance requirements, and evaluation steps.';
$header_hero_light = true;
$header_inset      = true;
require __DIR__ . '/../header.php';

$wrap     = 'mx-auto max-w-[1280px] px-[22px] md:px-7 lg:px-10';
$pad      = 'py-8 sm:py-[60px] md:py-[76px] lg:py-[100px]';
$eyebrow  = 'm-0 mb-4 flex items-center gap-2.5 text-[11px] font-bold uppercase tracking-[0.17em] text-ink/55';
$dot      = '<span class="h-[7px] w-[7px] shrink-0 rounded-full bg-[#b0ce87]" aria-hidden="true"></span>';
$h2_class = 'font-serif font-normal leading-[1.18] tracking-[-0.03em] text-ink text-[28px] sm:text-[34px] lg:text-[38px] mt-12 mb-5';
$h3_class = 'font-sans font-bold text-ink text-[19px] sm:text-[21px] mt-8 mb-3 text-ink/90';
$p_class  = 'text-[16px] sm:text-[17px] leading-[1.8] text-[#3d464f] mb-6';
$btn_blue = 'inline-flex items-center gap-2.5 rounded-full bg-brand-blue px-7 py-4 text-[15px] font-extrabold text-white transition-colors hover:bg-brand-blue-dark';
$btn_line = 'inline-flex items-center gap-2.5 rounded-full border-2 border-ink/20 bg-white/85 px-7 py-[14px] text-[15px] font-extrabold text-ink backdrop-blur-sm transition-colors hover:border-ink/45 hover:bg-white';
?>
<div class="bg-[#faf8f3] [&_a:focus-visible]:outline [&_a:focus-visible]:outline-[3px] [&_a:focus-visible]:outline-brand-orange [&_a:focus-visible]:outline-offset-[5px]">

<!-- ─── Hero / Header ─────────────────────────────────────────────────── -->
<div class="bg-white px-3 pt-3 sm:px-5 sm:pt-5 lg:px-8">
  <section id="top"
           class="relative isolate overflow-hidden rounded-[20px] px-5 pb-8 pt-[108px] text-ink sm:px-8 sm:pb-12 sm:pt-[126px] lg:px-12 lg:pt-[136px]"
           style="--cond-wash: 233 238 241; background-color: #e9eef1">
    <div aria-hidden="true" class="cond-hero-photo pointer-events-none absolute inset-0 -z-10" style="background-image:url('<?= e(asset('assets/img/blog/who-is-eligible-for-tms-therapy.jpg')) ?>')"></div>
    <div aria-hidden="true" class="cond-hero-wash pointer-events-none absolute inset-0 -z-10"></div>

    <div class="mx-auto max-w-[860px]">
      <nav aria-label="Breadcrumb" class="mb-4 sm:mb-6">
        <ol class="m-0 flex list-none flex-wrap items-center gap-2 p-0 text-[11px] font-bold uppercase tracking-[0.16em] text-ink/60">
          <li><a href="index.php#top" class="transition-colors hover:text-brand-blue">Home</a></li>
          <li aria-hidden="true" class="opacity-40">/</li>
          <li><a href="blogs.php" class="transition-colors hover:text-brand-blue">Blog</a></li>
          <li aria-hidden="true" class="opacity-40">/</li>
          <li aria-current="page" class="text-brand-blue">TMS Eligibility Guide</li>
        </ol>
      </nav>

      <div class="mb-4 flex flex-wrap items-center gap-3 text-[12px] font-semibold text-ink/60">
        <span class="rounded-full px-3.5 py-1 text-white font-extrabold text-[11px] uppercase tracking-wider" style="background-color: #0f639b; color: #ffffff;">TMS Therapy</span>
        <span aria-hidden="true">&bull;</span>
        <time datetime="2026-09-11">Published September 11, 2026</time>
        <span aria-hidden="true">&bull;</span>
        <span>7 min read</span>
      </div>

      <h1 class="m-0 font-serif font-normal leading-[1.08] tracking-[-0.035em] text-ink text-[34px] sm:text-[46px] lg:text-[52px]">
        Who Is Eligible for TMS Therapy? Candidacy Guide
      </h1>

      <p class="m-0 mt-6 text-[16px] sm:text-[18px] leading-[1.75] text-ink/80 max-w-[58ch]">
        Discover clinical guidelines for TMS candidacy: qualifying diagnoses, medication and psychotherapy history, safety contraindications, and insurance criteria.
      </p>
    </div>
  </section>
</div>

<!-- ─── Article Body ─────────────────────────────────────────────────── -->
<article class="<?= $wrap ?> py-12 sm:py-16">
  <div class="mx-auto max-w-[820px]">

    <!-- Direct Answer Callout -->
    <div class="mb-10 rounded-[18px] border-l-4 border-brand-blue bg-[#f0f4f7] p-6 sm:p-7 shadow-sm">
      <p class="text-[17px] sm:text-[18px] leading-[1.75] text-ink font-medium m-0">
        If you are wondering <strong class="text-brand-blue font-bold">who is eligible for TMS therapy</strong>, the answer depends on your diagnosis, symptoms, treatment history, medical history, age, and the specific TMS treatment being considered. TMS is a noninvasive brain stimulation treatment that may be considered when certain mental health conditions have not improved adequately with other treatments.
      </p>
    </div>

    <p class="<?= $p_class ?>">
      For depression, TMS is commonly considered for people who have not experienced sufficient improvement from antidepressant medications or psychotherapy. However, eligibility is not determined by one factor alone. A qualified clinician evaluates the person's symptoms, diagnosis, previous treatments, medications, medical history, and overall suitability before recommending TMS.
    </p>

    <p class="<?= $p_class ?>">
      Insurance requirements can also affect whether treatment is covered, even when a clinician determines that TMS may be appropriate.
    </p>

    <!-- Section: Who Is Eligible for TMS Therapy? -->
    <h2 class="<?= $h2_class ?>">Who Is Eligible for TMS Therapy?</h2>

    <p class="<?= $p_class ?>">
      TMS eligibility is generally determined through an individual clinical evaluation. A person may be considered for TMS when they have a qualifying mental health condition, have experienced inadequate improvement with previous treatments, and do not have medical factors that would make TMS inappropriate.
    </p>

    <p class="<?= $p_class ?>">
      For depression, treatment may be considered when symptoms continue despite conventional approaches such as antidepressant medication and psychotherapy. The exact criteria can vary depending on the diagnosis, treatment protocol, insurance plan, and clinical circumstances.
    </p>

    <!-- Section: What Conditions Can TMS Treat? -->
    <h2 class="<?= $h2_class ?>">What Conditions Can TMS Treat?</h2>

    <p class="<?= $p_class ?>">
      TMS is used for specific mental health conditions, and eligibility depends on the treatment being considered. Repetitive TMS has established uses for conditions including depression and OCD, while specific devices and protocols may have different regulatory indications. The National Institute of Mental Health explains that repetitive TMS is an authorized brain-stimulation therapy used for certain mental disorders.
    </p>

    <p class="<?= $p_class ?>">
      Because indications can differ, having a mental health diagnosis does not automatically mean that TMS is appropriate for that condition.
    </p>

    <h3 class="<?= $h3_class ?>">Major Depressive Disorder</h3>
    <p class="<?= $p_class ?>">
      Major depressive disorder is one of the primary conditions for which TMS is used. TMS may be considered when depressive symptoms remain significant despite previous treatment. Factors such as medication response, medication tolerance, psychotherapy history, symptom severity, and the duration of the depressive episode may be reviewed during an evaluation.
    </p>
    <p class="<?= $p_class ?>">
      Understanding <a href="depression.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">treatment-resistant depression</a> can also help explain why TMS may be considered when conventional depression treatments have not provided adequate improvement.
    </p>

    <h3 class="<?= $h3_class ?>">Obsessive-Compulsive Disorder</h3>
    <p class="<?= $p_class ?>">
      TMS may also be considered for certain people with obsessive-compulsive disorder. However, the treatment approach and eligibility requirements for OCD are not necessarily the same as those for depression. For people considering <a href="ocd.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">TMS for OCD</a>, a clinician evaluates the person's symptoms and overall clinical history before determining whether the treatment is appropriate.
    </p>

    <h3 class="<?= $h3_class ?>">Other Conditions</h3>
    <p class="<?= $p_class ?>">
      TMS technology and clinical research extend beyond depression and OCD, but eligibility depends on the specific treatment indication and applicable regulatory guidance. For example, Anew Era discusses <a href="postpartum.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">TMS for postpartum depression</a> as an area of treatment interest. Anyone considering TMS for a condition other than an established indication should discuss the evidence, treatment protocol, and regulatory status with a qualified clinician.
    </p>

    <!-- Section: Does Your Age Affect TMS Eligibility? -->
    <h2 class="<?= $h2_class ?>">Does Your Age Affect TMS Eligibility?</h2>

    <p class="<?= $p_class ?>">
      Age can be one factor considered during a TMS evaluation. Many TMS treatment programs primarily treat adults, while eligibility for younger patients can depend on the specific device, diagnosis, clinical circumstances, and applicable regulatory requirements.
    </p>

    <p class="<?= $p_class ?>">
      Age alone does not determine whether someone is an appropriate candidate. A clinician considers the person's overall health, diagnosis, treatment history, and the specific TMS protocol being considered. Parents or caregivers considering TMS for an <a href="adolescent.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">adolescent</a> should discuss the treatment's applicable indication, evidence, and regulatory status with a qualified mental health professional.
    </p>

    <!-- Section: Medication History -->
    <h2 class="<?= $h2_class ?>">Do You Need to Try Medication Before TMS?</h2>

    <p class="<?= $p_class ?>">
      For many patients being evaluated for TMS for depression, previous antidepressant treatment is an important part of the clinical and insurance review.
    </p>

    <p class="<?= $p_class ?>">
      Some insurance policies require documentation showing that one or more antidepressants were tried without adequate improvement or could not be tolerated. Other plans may have different requirements. Anew Era's information on <a href="insurance.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">TMS therapy and insurance coverage</a> explains that insurance policies can require previous medication trials and psychotherapy before approving TMS.
    </p>

    <p class="<?= $p_class ?>">
      However, medication history should not be viewed as a single universal eligibility rule. Requirements can differ according to the patient's diagnosis, treatment plan, insurance policy, and clinical circumstances.
    </p>

    <!-- Section: Psychotherapy History -->
    <h2 class="<?= $h2_class ?>">Does Psychotherapy Affect TMS Eligibility?</h2>

    <p class="<?= $p_class ?>">
      Yes, psychotherapy history may be considered during a TMS evaluation. For depression, some patients may have tried <a href="therapy.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">psychotherapy</a> without achieving sufficient improvement. Insurance companies may also request documentation of previous therapy as part of their medical-necessity review.
    </p>

    <p class="<?= $p_class ?>">
      The purpose of reviewing treatment history is to understand what has already been attempted and how the patient responded. This information helps the clinician determine whether TMS fits into the person's overall treatment plan.
    </p>

    <!-- Section: Medical History & Safety -->
    <h2 class="<?= $h2_class ?>">What Medical History Can Affect TMS Eligibility?</h2>

    <p class="<?= $p_class ?>">
      A clinician will generally review your medical history before recommending TMS. TMS is noninvasive, but certain medical circumstances may require additional evaluation or may make treatment inappropriate.
    </p>

    <div class="my-8 rounded-[18px] bg-white border border-ink/10 p-6 sm:p-7 shadow-sm">
      <h3 class="m-0 mb-3 text-[17px] font-bold text-ink">Key Medical and Safety Factors Reviewed:</h3>
      <ul class="m-0 grid gap-2.5 p-0 list-none text-[15px] text-[#475467]">
        <li class="flex items-start gap-2.5">
          <svg class="h-5 w-5 text-brand-blue shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          <span>Neurological conditions and seizure history</span>
        </li>
        <li class="flex items-start gap-2.5">
          <svg class="h-5 w-5 text-brand-blue shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          <span>History of traumatic brain injury or head trauma</span>
        </li>
        <li class="flex items-start gap-2.5">
          <svg class="h-5 w-5 text-brand-blue shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          <span>Implanted medical devices (e.g. pacemakers, deep brain stimulators)</span>
        </li>
        <li class="flex items-start gap-2.5">
          <svg class="h-5 w-5 text-brand-blue shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          <span>Ferromagnetic metal implants in or near the head (excluding dental fillings)</span>
        </li>
        <li class="flex items-start gap-2.5">
          <svg class="h-5 w-5 text-brand-blue shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          <span>Current prescription medications and supplements</span>
        </li>
        <li class="flex items-start gap-2.5">
          <svg class="h-5 w-5 text-brand-blue shrink-0 mt-0.5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
          <span>Pregnancy or recent childbirth, when relevant</span>
        </li>
      </ul>
    </div>

    <p class="<?= $p_class ?>">
      Patients should provide complete and accurate information about their medical history so the clinician can make an appropriate treatment recommendation.
    </p>

    <!-- Section: Medication Non-Response vs. Active Medication -->
    <h2 class="<?= $h2_class ?>">Can You Be Eligible If Medication Did Not Work?</h2>

    <p class="<?= $p_class ?>">
      Yes. In fact, inadequate response to antidepressant treatment is one of the primary reasons TMS may be considered for depression. Some people experience little improvement from medication, while others may experience partial improvement or side effects that make continued medication difficult.
    </p>

    <p class="<?= $p_class ?>">
      TMS offers a nonmedication-based treatment approach. Information about <a href="tms.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">TMS mapping and treatment planning</a> explains how treatment can be personalized according to the brain region being targeted.
    </p>

    <h2 class="<?= $h2_class ?>">Can You Be Eligible for TMS If You Take Medication?</h2>

    <p class="<?= $p_class ?>">
      Taking psychiatric medication does not automatically prevent someone from receiving TMS. Many patients continue prescribed medications while receiving TMS, depending on their treatment plan. Medication decisions should be made with the treating clinician rather than stopped or changed independently.
    </p>

    <!-- Section: Insurance vs. Clinical Eligibility -->
    <h2 class="<?= $h2_class ?>">Does Insurance Determine Whether You Are Eligible?</h2>

    <p class="<?= $p_class ?>">
      Clinical eligibility and insurance coverage are related but are not the same thing. A clinician may determine that TMS is appropriate while an insurance company may apply separate requirements before agreeing to reimburse treatment.
    </p>

    <div class="my-8 rounded-[18px] bg-[#f8fafc] border border-ink/10 p-6 sm:p-7 shadow-sm">
      <h3 class="m-0 mb-3 text-[17px] font-bold text-ink">Common Insurance Coverage Requirements:</h3>
      <ul class="m-0 grid gap-2 p-0 list-disc pl-5 text-[15px] text-[#475467]">
        <li>A qualifying diagnosis of Major Depressive Disorder (MDD) or OCD</li>
        <li>Documented trials of two to four antidepressant medications from different classes</li>
        <li>Previous evidence-based psychotherapy trial (e.g. CBT)</li>
        <li>Clinical documentation of inadequate treatment response or intolerance</li>
        <li>Formal prior authorization approved before treatment begins</li>
        <li>Care delivered by an in-network provider</li>
      </ul>
      <p class="m-0 mt-3 text-[13px] text-ink/60 font-medium">Patients should verify their individual benefits before beginning treatment.</p>
    </div>

    <!-- Section: How Is Eligibility Evaluated? -->
    <h2 class="<?= $h2_class ?>">How Is TMS Eligibility Evaluated?</h2>

    <p class="<?= $p_class ?>">
      The evaluation process typically begins with a review of your mental health symptoms and treatment history. A clinician will discuss:
    </p>

    <h3 class="<?= $h3_class ?>">Your Diagnosis</h3>
    <p class="<?= $p_class ?>">
      The provider confirms the condition being treated and determines whether TMS is an appropriate treatment option for that diagnosis.
    </p>

    <h3 class="<?= $h3_class ?>">Your Symptoms</h3>
    <p class="<?= $p_class ?>">
      The clinician may review the severity, duration, frequency, and impact of your symptoms on work, family, and daily functioning.
    </p>

    <h3 class="<?= $h3_class ?>">Your Previous Treatments</h3>
    <p class="<?= $p_class ?>">
      Your medication and psychotherapy history can help determine what has already been attempted and how you responded.
    </p>

    <h3 class="<?= $h3_class ?>">Your Medical History</h3>
    <p class="<?= $p_class ?>">
      The provider reviews relevant neurological, medical, and psychiatric factors that may affect treatment suitability.
    </p>

    <h3 class="<?= $h3_class ?>">Your Treatment Goals</h3>
    <p class="<?= $p_class ?>">
      The clinician can discuss what you hope to accomplish through treatment and whether TMS fits into your broader mental health care plan.
    </p>

    <!-- Section: What Happens After You Are Eligible? -->
    <h2 class="<?= $h2_class ?>">What Happens After You Are Considered Eligible?</h2>

    <p class="<?= $p_class ?>">
      Once a clinician determines that TMS may be appropriate, the next steps can include treatment planning, insurance verification, brain mapping, and scheduling.
    </p>

    <p class="<?= $p_class ?>">
      Brain mapping helps determine the treatment location and settings for the individual patient. The first appointment may take longer than later sessions because additional setup and mapping are involved. TMS is typically provided on an outpatient basis, and patients remain awake during treatment. The treatment does not require general anesthesia.
    </p>

    <!-- Section: Who May Not Be a Candidate? -->
    <h2 class="<?= $h2_class ?>">Who May Not Be a Candidate for TMS?</h2>

    <p class="<?= $p_class ?>">
      Not everyone is an appropriate candidate for TMS. Certain medical or neurological factors may require additional evaluation or may make TMS unsuitable. These can include certain seizure risks, particular implanted devices or metal near the treatment area, and other conditions that a clinician needs to assess.
    </p>

    <p class="<?= $p_class ?>">
      The presence of a potential risk factor does not necessarily mean that treatment is impossible. The provider must evaluate the specific circumstances and determine whether TMS can be performed safely.
    </p>

    <!-- Section: What If You Are Not Eligible? -->
    <h2 class="<?= $h2_class ?>">What If You Are Not Eligible for TMS?</h2>

    <p class="<?= $p_class ?>">
      If TMS is not appropriate, a clinician can discuss other treatment options based on your diagnosis, symptoms, medical history, previous treatments, and personal needs.
    </p>

    <p class="<?= $p_class ?>">
      Mental health treatment can include psychotherapy, medication management, lifestyle support, or other innovative treatments such as <a href="spravato.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">Spravato® esketamine</a>. The goal of an evaluation is not simply to determine whether you qualify for TMS. It is also an opportunity to identify an appropriate treatment plan for your individual situation.
    </p>

    <!-- Section: Local Care in The Woodlands -->
    <h2 class="<?= $h2_class ?>">Understanding TMS Eligibility Before Starting Treatment</h2>

    <p class="<?= $p_class ?>">
      Knowing who is eligible for TMS therapy can help you understand what to expect before scheduling an evaluation. For patients looking for local care, TMS treatment at <a href="the-woodlands.php" class="text-brand-blue underline font-semibold hover:text-brand-blue-dark">The Woodlands location</a> provides information about Anew Era's local services and treatment options across Texas and California.
    </p>

    <!-- Section: Final Thoughts -->
    <h2 class="<?= $h2_class ?>">Final Thoughts</h2>

    <p class="<?= $p_class ?>">
      So, who is eligible for TMS therapy? Eligibility is based on more than having a particular diagnosis. A clinician considers the condition being treated, symptom severity, previous treatment response, medical history, current medications, and the specific TMS treatment being considered.
    </p>

    <p class="<?= $p_class ?>">
      For depression, TMS is commonly considered when symptoms have not improved adequately with previous treatments. Insurance requirements may also affect access and can include documentation of medication and psychotherapy trials.
    </p>

    <!-- Section: FAQs -->
    <h2 class="<?= $h2_class ?>">Frequently Asked Questions</h2>

    <div class="space-y-4 my-8">
      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">1. Who is eligible for TMS therapy?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          Eligibility depends on the person's diagnosis, symptoms, treatment history, medical history, current medications, and the specific TMS protocol being considered. A qualified clinician must evaluate the individual before treatment.
        </p>
      </div>

      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">2. Do you have to try antidepressants before TMS?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          Many patients receiving TMS for depression have previously tried antidepressant medications, and some insurance plans require documentation of previous medication trials. Requirements vary by plan and clinical situation.
        </p>
      </div>

      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">3. Is TMS only for people with severe depression?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          TMS is commonly used for people with depression that has not improved adequately with previous treatments. Whether a person is eligible depends on their individual symptoms, diagnosis, treatment history, and clinical evaluation.
        </p>
      </div>

      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">4. Can you get TMS if medication does not work?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          Yes. Inadequate response to antidepressant medication is one reason TMS may be considered for depression. A clinician must still determine whether TMS is appropriate for the individual.
        </p>
      </div>

      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">5. Can you get TMS while taking antidepressants?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          Taking antidepressants does not automatically prevent someone from receiving TMS. Medication decisions should be discussed with the treating clinician, and patients should not stop or change medication without medical guidance.
        </p>
      </div>

      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">6. Can TMS be used for OCD?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          TMS may be considered for OCD using appropriate protocols. Eligibility depends on the individual's diagnosis, symptoms, clinical history, and the specific treatment being considered.
        </p>
      </div>

      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">7. Can younger people receive TMS?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          Age requirements depend on the specific TMS device, indication, regulatory status, and clinical circumstances. A qualified clinician can determine whether TMS is appropriate for a younger patient.
        </p>
      </div>

      <div class="rounded-[16px] bg-white border border-ink/10 p-6 shadow-sm">
        <h3 class="m-0 mb-2 font-bold text-[18px] text-ink">8. How do I know if I qualify for TMS?</h3>
        <p class="m-0 text-[15px] sm:text-[16px] leading-[1.7] text-[#58616a]">
          A TMS evaluation can review your diagnosis, symptoms, previous treatments, medications, medical history, and other relevant factors. Your provider can then explain whether TMS may be an appropriate treatment option.
        </p>
      </div>
    </div>

    <!-- Section: CTA -->
    <div class="mt-12 rounded-[20px] bg-white border border-ink/10 p-8 sm:p-10 shadow-sm text-center">
      <p class="<?= $eyebrow ?> justify-center"><?= $dot ?> Verify Your Candidacy</p>
      <h2 class="font-serif font-normal text-[28px] sm:text-[36px] text-ink m-0 mb-4">Wondering If TMS Is Right For You?</h2>
      <p class="m-0 mb-6 text-[15px] sm:text-[16px] leading-[1.8] text-[#58616a] max-w-[54ch] mx-auto">
        Contact Anew Era TMS & Psychiatry to schedule an initial evaluation. Our clinical team can review your history, check your insurance coverage, and explain your treatment options.
      </p>
      <div class="flex flex-wrap items-center justify-center gap-3">
        <a href="contact.php" class="<?= $btn_blue ?>">Schedule a Consultation</a>
        <a href="<?= e($site['phone_href']) ?>" class="<?= $btn_line ?>"><?= e($site['phone']) ?></a>
      </div>
      <p class="m-0 mt-4 text-[13px] text-ink/55">
        Call us at (888) 503-1549 or book an appointment online to get started.
      </p>
    </div>

    <!-- Back to blog link -->
    <div class="mt-10 pt-6 border-t border-ink/10 flex items-center justify-between">
      <a href="blogs.php" class="inline-flex items-center gap-2 text-[14px] font-bold text-brand-blue hover:text-brand-blue-dark">
        &larr; Back to all articles
      </a>
      <a href="#top" class="inline-flex items-center gap-1.5 text-[13px] font-semibold text-ink/50 hover:text-ink">
        Back to top &uarr;
      </a>
    </div>

  </div>
</article>

</div>
<?php require __DIR__ . '/../footer.php'; ?>
