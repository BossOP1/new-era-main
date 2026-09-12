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
