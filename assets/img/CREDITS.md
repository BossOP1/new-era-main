# Photo credits

Every photo here comes from [Unsplash](https://unsplash.com) under the
[Unsplash License](https://unsplash.com/license): free to use commercially,
no permission or attribution needed. This file is a record of what was used,
not a legal requirement — you can delete it, or replace any photo by dropping
a file with the same name into this folder.

| File | Source image | Subject |
|------|--------------|---------|
| `hero.jpg`    | images.unsplash.com/photo-1780945806713-4bb884acec90 | Group session in a sunlit room |
| `cond-1.jpg`  | images.unsplash.com/photo-1658279366796-e0c28623cd27 | Person on a window sill (Depression) |
| `cond-2.jpg`  | images.unsplash.com/photo-1746049942512-b8d8a5742059 | Woman breathing outdoors (Anxiety) |
| `cond-3.jpg`  | images.unsplash.com/photo-1583710457367-47de0ea21fef | Mother and newborn (Postpartum) |
| `cond-4.jpg`  | images.unsplash.com/photo-1604881991720-f91add269bed | Hands held in support (PTSD) |
| `cond-5.jpg`  | images.unsplash.com/photo-1714646183974-099d000b6a84 | Hands at temples (Tinnitus) |
| `cond-6.jpg`  | images.unsplash.com/photo-1493836512294-502baa1986e2 | Head in hands (Migraines) |
| `cond-7.jpg`  | images.unsplash.com/photo-1584744646898-40ff0404e767 | Washing hands (OCD) |
| `treat-1.jpg` | images.unsplash.com/photo-1711409645921-ef3db0501f96 | Brain render (TMS) |
| `treat-2.jpg` | images.unsplash.com/photo-1738707060236-42d641096f96 | Clinicians reviewing brain scans (Accelerated TMS) |
| `treat-3.jpg` | images.unsplash.com/photo-1631217868264-e5b90bb7e133 | Clinician and patient (Psychiatry) |
| `treat-4.jpg` | images.unsplash.com/photo-1576157401730-e73772de4796 | Nasal spray in use (Spravato) |
| `treat-5.jpg` | images.unsplash.com/photo-1516575901726-efcb7a9895a0 | Infusion drip chamber (Ketamine) |
| `treat-6.jpg` | images.unsplash.com/photo-1714976694810-85add1a29c96 | Therapy session (Therapy) |
| `tms.jpg`     | images.unsplash.com/photo-1550504630-cc20eca3b23e | Man seated, hands clasped (TMS section) |
| `faq.jpg`     | images.unsplash.com/photo-1776886099265-6366478b341b | Clinic waiting area (FAQ) |

## Depression page (`depression/`)

| File | Source image | Subject |
|------|--------------|---------|
| `depression/hero.jpg`      | images.unsplash.com/photo-1582515572489-c2302b6f989d | Woman on a hillside, head tipped back in late sun (hero) |
| `depression/risk.jpg`      | images.unsplash.com/photo-1534432189786-f47e376dc8c7 | Low sun through a drawn blind (risk factors band) |
| `depression/signs.jpg`     | images.unsplash.com/photo-1517669375942-946a1f02d705 | Man by a window, head in hand (symptoms) |
| `depression/diagnosis.jpg` | images.unsplash.com/photo-1758691463198-dc663b8a64e4 | Clinician writing notes with a patient (diagnosis) |
| `depression/support.jpg`   | images.unsplash.com/photo-1539541417736-3d44c90da315 | Head resting on a shoulder (supporting a loved one) |

## Condition page heroes (`conditions/`)

Each is cropped to roughly 2.6:1 with the subject in the right third, which is
the shape the hero panel needs — see `.cond-hero-wash` in `src/input.css`.
Four were flipped horizontally (`&flip=h`) to move the subject off the side the
copy sits on.

| File | Source image | Subject |
|------|--------------|---------|
| `conditions/anxiety-hero.jpg`    | images.unsplash.com/photo-1534413298607-48ba59e8a06d | Woman in a field at sunset, from behind |
| `conditions/postpartum-hero.jpg` | images.unsplash.com/photo-1780329941775-3303f3122ce6 | Mother holding her baby at a window (flipped) |
| `conditions/ptsd-hero.jpg`       | images.unsplash.com/photo-1588696191779-61dde1b83475 | Two people leaning head to head in woodland |
| `conditions/tinnitus-hero.jpg`   | images.unsplash.com/photo-1641753531933-a38888ca41ad | Man at a window in low amber light |
| `conditions/migraines-hero.jpg`  | images.unsplash.com/photo-1603136324205-01cdebce04ab | Man looking out of a rain-streaked window (flipped) |
| `conditions/ocd-hero.jpg`        | images.unsplash.com/photo-1572724727752-c0896e993676 | Man seated at a window in grey light (flipped) |

All files were downloaded pre-cropped to the aspect each slot needs, at q=72.
Four condition photos (`cond-2`, `cond-3`, `cond-5`, `cond-6`) are cropped wider
than their container on purpose and carry `'focus' => 'object-left'` in
`includes/data.php`, which shifts the subject clear of the overlaying info card.

## Treatment pages (`treatments/`)

| File | Source image | Subject |
|------|--------------|---------|
| `treatments/all-hero.jpg`             | images.unsplash.com/photo-1573495804664-b1c0849525af | Two women in conversation on a sofa (treatments hub hero) |
| `treatments/psychiatry-hero.jpg`      | images.unsplash.com/photo-1758691461935-202e2ef6b69f | Doctor talking with a patient across a desk |
| `treatments/psychiatry-doctor.jpg`    | images.unsplash.com/photo-1758691462878-6edc3d3da1be | Clinician listening at her desk |
| `treatments/psychiatry-notes.jpg`     | images.unsplash.com/photo-1758691461990-03b49d969495 | Clinician writing notes on a clipboard |
| `treatments/therapy-hero.jpg`         | images.unsplash.com/photo-1714976694525-71eb29a7c500 | Woman talking with a therapist on a sofa |
| `treatments/telepsychiatry-hero.jpg`    | images.unsplash.com/photo-1651659802603-20a83aadb13b | Woman at a laptop in a bright kitchen, flipped (`&flip=h`) so she sits clear of the copy column |
| `treatments/telepsychiatry-session.jpg` | images.unsplash.com/photo-1648737119422-2680a7e39089 | Woman talking to someone on a laptop screen |
| `treatments/telepsychiatry-home.jpg`    | images.unsplash.com/photo-1628645339131-0c39c7527856 | Woman laughing with a cup during a video call |
| `treat-7.jpg`                           | images.unsplash.com/photo-1588873281272-14886ba1f737 | Hands gesturing at a clinician on a laptop (Telepsychiatry) |
| `treatments/therapy-conversation.jpg` | images.unsplash.com/photo-1604881991664-593b31b88488 | Woman holding a mug, talking across a table |
| `treatments/therapy-adolescent.jpg`   | images.unsplash.com/photo-1714976694867-bc0e012fab70 | Teenager talking with a therapist |
| `treatments/spravato-hero.jpg`        | images.unsplash.com/photo-1671549845835-224455af2e41 | Woman resting, eyes closed |
| `treatments/spravato-spray.jpg`       | images.unsplash.com/photo-1576157401730-e73772de4796 | Nasal spray in use (higher-resolution crop of `treat-4.jpg`'s source) |

## TMS page (`tms/`)

`tms/session.jpg` and `tms/chair.jpg` are the practice's own photographs,
copied from `assets/TMS-exclusive/`. `tms/video-*.jpg` are poster frames for
Magstim's YouTube films, used only as click-to-play facades and labelled as
Magstim's on the page.

## Hub page heroes (`reviews/`, `faq/`, `insurance/`)

Downloaded at 2400x920, the same crop the treatment page heroes use, so the
wash in `.cond-hero-photo` has the shape it expects.

| File | Source image | Subject |
|------|--------------|---------|
| `reviews/hero.jpg` | images.unsplash.com/photo-1511988617509-a57c8a288659 | Four friends laughing in golden-hour light (reviews hero) |
| `faq/hero.jpg`     | images.unsplash.com/photo-1776886099265-6366478b341b | Clinic waiting area, wide crop (FAQ hero) |
| `insurance/hero.jpg` | images.unsplash.com/photo-1768225709733-18c9f264bc5f | Calm waiting lounge with seating and plants (insurance hero) |

`faq/hero.jpg` is the same photograph as `faq.jpg` in the folder above, taken
again at hero width — `faq.jpg` is a 1000x840 crop and stays where it is, used
as the inline FAQ photo on the treatment pages.

## Location pages (`locations/`)

A real photograph of the place, not the office — office photography is the
practice's to supply, and these stand in for it in the hero meanwhile.

Where a clinic's own town is not on Unsplash — which is most of the suburban
ones — the photograph is of the surrounding city or metro rather than the town
itself, and the subject column below says which. None of them is the office.

| File | Source image | Subject |
|------|--------------|---------|
| `locations/huntington-beach.jpg` | images.unsplash.com/photo-1696527318911-696788beb6f9 | Huntington Beach pier, surf and the downtown strip |
| `locations/newport-beach.jpg` | images.unsplash.com/photo-1648730502418-52dd6ca19a9c | Newport Harbor, boats at their moorings |
| `locations/laguna-hills.jpg` | images.unsplash.com/photo-1727377202873-dc3971539b39 | The south Orange County coast from the hills above Laguna |
| `locations/orange.jpg` | images.unsplash.com/photo-1647893923196-b4df742477a4 | An Orange County street lined with palms |
| `locations/torrance.jpg` | images.unsplash.com/photo-1739386541057-6f344bd25ffe | South Bay beach and palms under cloud |
| `locations/long-beach.jpg` | images.unsplash.com/photo-1740795095618-a2b15bfce243 | Long Beach waterfront from the water |
| `locations/west-los-angeles.jpg` | images.unsplash.com/photo-1648315300616-0eb7db8b8468 | A palm-lined west Los Angeles boulevard |
| `locations/central-austin.jpg` | images.unsplash.com/photo-1551223456-a0988518e562 | The Austin skyline over Lady Bird Lake |
| `locations/cedar-park.jpg` | images.unsplash.com/photo-1563131645-ac2001aff716 | Austin by day, north of the river |
| `locations/westlake.jpg` | images.unsplash.com/photo-1599011906870-ad398945a708 | Water, trees and buildings west of downtown Austin |
| `locations/central-dallas.jpg` | images.unsplash.com/photo-1621904878414-d4ca4756bd7e | The Dallas skyline under open sky |
| `locations/allen.jpg` | images.unsplash.com/photo-1631662760570-8f7b52d09fdc | A north Dallas skyline with a water tower |
| `locations/grapevine.jpg` | images.unsplash.com/photo-1611693727459-814df5250d9b | The Margaret Hunt Hill bridge over Dallas |
| `locations/cypress.jpg` | images.unsplash.com/photo-1746311528667-1038fe0c8c46 | The Houston skyline on a clear day |
| `locations/the-woodlands.jpg` | images.unsplash.com/photo-1631330190649-d7da7dd8a6fb | Woodland against Houston buildings |

## Magstim product photography (`magstim/`)

NOT Unsplash. These are Magstim's own product photographs, taken from
magstim.com for magstim-horizon.php — the page about the system the clinics
treat on. They are labelled as Magstim's on the page itself, the same way
tms.php labels their films.

⚠ Confirm the practice has Magstim's permission to use these before launch.
Manufacturers usually supply product photography to providers for exactly this
purpose, but "usually" is not a licence. Two of the files carry Magstim's own
watermark, which is left on deliberately.

| File | Source | Subject |
|------|--------|---------|
| `magstim/h3-stimguide.jpg`    | magstim.com/app/uploads/2024/05/Magstim-TMS-H3.0-With-Stimguide-Pro.jpg | Horizon 3.0 with StimGuide PRO, full system |
| `magstim/horizon-clinical.jpg`| magstim.com/app/uploads/2024/05/Magstim-TMS-Horizon-Clinical.jpg | Clinician positioning the coil for a seated patient |
| `magstim/range.jpg`           | magstim.com/app/uploads/2024/05/Magstim-TMS-M.jpg | Clinician at the StimGuide navigation screen |
| `magstim/connect.jpg`         | magstim.com/app/uploads/2024/05/Magstim-TMS-Magstim-Connect-1.jpg | Magstim Connect software |
| `magstim/stimulator.jpg`      | magstim.com/app/uploads/2024/05/Magstim-TMS-Stimulator.jpg | The Horizon stimulator unit (unused so far) |
| `magstim/coils.jpg`           | magstim.com/app/uploads/2024/05/Magstim-TMS-Coils-1.jpg | Treatment coil close-up (unused so far) |
| `magstim/technology.jpg`      | magstim.com/app/uploads/2024/04/Magstim-TMS-Technology.jpg | Patient in the chair as the coil is positioned (page hero, flipped in CSS) |
| `magstim/video-horizon-stimguide.jpg` | i.ytimg.com/vi/NRnDHaiaRFA/maxresdefault.jpg | Poster frame for Magstim's Horizon 3.0 film |
| `magstim/video-tish-story.jpg`        | i.ytimg.com/vi/937QadE0j1U/maxresdefault.jpg | Poster frame for Magstim's TMS Stories: Tish |

The two films are Magstim's own, on their YouTube channel (@magstimtmstherapy632),
and are embedded as click-to-play facades exactly as tms.php does it — the poster
is local and nothing reaches YouTube until a visitor presses play. Both posters
are Magstim's own designed thumbnails, so they carry Magstim's branding and their
own play graphic; that is left as-is rather than cropped.
