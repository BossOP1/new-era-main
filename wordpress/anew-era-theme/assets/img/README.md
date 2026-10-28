# Images

Every slot on the homepage already has a photo (see [CREDITS.md](CREDITS.md)
for where each came from). To change one, drop a replacement in here using the
same file name — nothing else needs editing. Supported extensions: .jpg .jpeg
.png .webp .avif

| File name    | Where it appears                     |
|--------------|--------------------------------------|
| `hero`       | Hero background                      |
| `cond-1…7`   | Conditions panel (Depression → OCD)  |
| `treat-1…6`  | Treatment cards (TMS → Therapy)      |
| `tms`        | TMS section background               |
| `faq`        | FAQ section photo                    |

Delete a file and its slot falls back to a labelled placeholder, so the layout
never breaks while you are sourcing new photography.

## Sizing

Crop replacements to roughly the aspect the slot uses — hero 2000x1100,
condition panels 1200x1060, treatment cards 900x520, TMS banner 1800x820,
FAQ 1000x840 — and save at about 72% JPEG quality.

## Keeping a subject clear of the info card

The conditions panel draws a text card over the top-left of the photo. If your
replacement puts a face there, crop it wider (about 1900x1060) and add
`'focus' => 'object-left'` to that condition in `includes/data.php`; the extra
width shifts the subject to the right, clear of the card. Four of the shipped
photos already do this.
