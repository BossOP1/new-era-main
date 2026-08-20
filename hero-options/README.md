# Hero candidates

Three shortlisted photos for the homepage hero, all 2400×1600.

| File | What it shows |
| --- | --- |
| `hero-option-a-three-adults.jpg` | Three adults mid-laugh on a rock, misty pines behind. Subjects sit right of centre, so the headline gets clean space. Cool palette, close to the brand blues. Reads as friends rather than family. |
| `hero-option-c-extended-family.jpg` | Large multigenerational family on a porch. Unmistakably a family, diverse, but busy — the headline crosses faces. |
| `hero-option-d-family-park.jpg` | Mother, son and baby in a park at golden hour. Warmest of the three and clearly a family. |

## Licence

All three are from [Unsplash](https://unsplash.com). The Unsplash License allows
commercial use with no permission or attribution required. Source photo IDs:

- A — `photo-1504022462188-88f023db97bf`
- C — `photo-1611516818236-8faa056fb659`
- D — `photo-1508214406285-c765025445df`

## To use one

Copy it over the live hero and rebuild:

```bash
cp hero-options/hero-option-d-family-park.jpg assets/img/hero.jpg
php build.php
```

Then update the alt text at the hero in `index.php` to describe the photo you chose.

If faces end up sitting behind the headline, the crop can be nudged — the hero's
`image_slot()` call takes a Tailwind object-position class as its last argument,
e.g. `'object-[50%_30%]'` to favour the top of the frame.

## Why this folder is gitignored

These are staging files, not site assets — only the one copied to
`assets/img/hero.jpg` ships. Keeping ~2 MB of rejected candidates out of the
repo and out of `dist/`. Delete the folder once you have picked.
