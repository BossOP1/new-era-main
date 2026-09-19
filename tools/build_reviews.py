"""Turn the practice's review export into includes/data-reviews.php.

    python3 tools/build_reviews.py

Reads assets/reviews_list/5-Start GMB Reviews.xlsx and writes the PHP data file
reviews.php loads. Re-run it whenever a fresh export is dropped in; the export
is the source of truth and the generated file is not meant to be hand-edited.

MIN_LEN below is the knob worth knowing about: it sets how much someone has to
have written to be published. Raising it trims the page — at 40 it publishes
946 reviews, at 80 about 794, at 120 about 654.
"""
import os, re, zipfile, unicodedata, collections, datetime
import xml.etree.ElementTree as ET

# Run from the project root no matter where this was called from.
os.chdir(os.path.join(os.path.dirname(os.path.abspath(__file__)), '..'))

# ---- Reading the sheet ----------------------------------------------------
# A .xlsx is a zip of XML. openpyxl would do this in three lines, but it is
# not a dependency of this project and one export does not justify making it
# one, so the two sheets parts we need are read directly.

NS='{http://schemas.openxmlformats.org/spreadsheetml/2006/main}'
def load(path):
    z = zipfile.ZipFile(path)
    shared=[]
    root=ET.fromstring(z.read('xl/sharedStrings.xml'))
    for si in root.findall(NS+'si'):
        shared.append(''.join(t.text or '' for t in si.iter(NS+'t')))
    ws=ET.fromstring(z.read('xl/worksheets/sheet1.xml'))
    rows=[]
    for row in ws.iter(NS+'row'):
        cells={}
        for c in row.findall(NS+'c'):
            ref=c.get('r'); col=''.join(ch for ch in ref if ch.isalpha())
            t=c.get('t'); v=c.find(NS+'v'); isel=c.find(NS+'is')
            if t=='s' and v is not None: val=shared[int(v.text)]
            elif t=='inlineStr' and isel is not None: val=''.join(x.text or '' for x in isel.iter(NS+'t'))
            elif v is not None: val=v.text
            else: val=None
            cells[col]=val
        rows.append(cells)
    hdr={k:(v or '').strip() for k,v in rows[0].items()}
    name2col={v:k for k,v in hdr.items()}
    out=[]
    for r in rows[1:]:
        out.append({n:(r.get(c) or '').strip() for n,c in name2col.items()})
    return out


SRC = 'assets/reviews_list/5-Start GMB Reviews.xlsx'
MIN_LEN = 40

# The export's listing names, mapped onto the clinics the site already knows
# (includes/data-team.php). Provider-prefixed listings are that clinician's own
# Google page for the same address, so they fold into the clinic.
CLINIC = {
    'Cedar Park':        ('cedar-park',      'Cedar Park',      'tx'),
    'Mopac':             ('central-austin',  'Central Austin',  'tx'),
    'Westlake':          ('westlake',        'Westlake',        'tx'),
    'Dallas':            ('central-dallas',  'Central Dallas',  'tx'),
    'Allen':             ('allen',           'Allen',           'tx'),
    'Grapevine':         ('grapevine',       'Grapevine',       'tx'),
    'Cypress':           ('cypress',         'Cypress',         'tx'),
    'Laguna Hills':      ('laguna-hills',    'Laguna Hills',    'ca'),
    'Orange':            ('orange',          'Orange',          'ca'),
    'Huntington Beach':  ('huntington-beach','Huntington Beach','ca'),
    'Long Beach':        ('long-beach',      'Long Beach',      'ca'),
    'Torrance':          ('torrance',        'Torrance',        'ca'),
    'Newport Beach':     ('newport-beach',   'Newport Beach',   'ca'),
    'West Los Angeles':  ('west-los-angeles','West Los Angeles','ca'),
}

# What the review is about, read off the text. Ordered: the first match that
# fires decides the chip the card shows, the rest still filter.
TOPICS = [
    ('tms',        'TMS therapy',      r'\btms\b|transcranial|magnetic stim'),
    ('spravato',   'Spravato®',        r'spravato|esketamine|\bketamine\b'),
    ('therapy',    'Therapy',          r'therapist|counsel|\bcbt\b|\bemdr\b|\bdbt\b|talk therapy'),
    ('psychiatry', 'Psychiatry & meds',r'psychiatr|medication|\bmeds\b|prescri|\bdosage\b|refill'),
    ('results',    'How it went',      r'chang(ed|ing) my life|life.?chang|saved my life|best decision|feel(ing)? (so much |much )?better|got my life back|turned my life|new person|worked for me|no longer depress|out of (the|my) (dark|hole|depression)'),
    ('team',       'The team',         r'\bstaff\b|front desk|receptionist|welcoming|entire team|everyone (here|at|is|was)|whole team'),
]

def clean(s):
    s = unicodedata.normalize('NFC', s)
    s = s.replace('​', '').replace('\r\n', '\n').replace('\r', '\n')
    s = re.sub(r'[ \t]+', ' ', s)
    s = re.sub(r'\n{2,}', '\n', s)
    return s.strip().strip('"“”')

def display_name(raw):
    """First name and last initial, the convention the rest of the site uses.

    Google display names are messy: nicknames in brackets or quotes, an email
    address pasted after a first name, handles with no surname at all, and a
    run of names typed in capitals. Tidy those, then shorten."""
    raw = re.sub(r'\([^)]*\)', ' ', raw)                  # Miguel Zacarias (Mickey!)
    raw = re.sub(r'[\u201c"\u2018\'][^\u201d"\u2019\']*[\u201d"\u2019\']', ' ', raw)  # Tyson "TyTy" Adams
    parts = [p for p in re.split(r'\s+', raw.strip()) if p and '@' not in p]
    parts = [p for p in parts if re.search(r'[A-Za-z]', p)]
    if not parts:
        return 'Anew Era patient', 'AE'

    # Initials as a display name — "CC", "SK" — read better with the periods.
    if len(parts) == 1 and parts[0].isupper() and len(parts[0]) <= 3:
        letters = parts[0]
        return '.'.join(letters) + '.', letters[:2]

    def fix(word):
        # Leave McIntyre and jinnyl38 alone; only shouted names get recased.
        return word.capitalize() if word.isupper() else word

    first = fix(parts[0])
    if len(parts) == 1:
        return first, first[:1].upper()
    last = fix(parts[-1])
    return f'{first} {last[:1].upper()}.', (first[:1] + last[:1]).upper()

MONTHS = {m: i for i, m in enumerate(
    ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'], 1)}

def parse_date(raw):
    m = re.search(r'([A-Z][a-z]{2}) (\d{1,2}), (\d{4})', raw)
    if not m:
        return None
    mon, day, year = MONTHS[m.group(1)], int(m.group(2)), int(m.group(3))
    return datetime.date(year, mon, day)

def php(v, indent=0):
    pad = ' ' * indent
    if isinstance(v, str):
        return "'" + v.replace('\\', '\\\\').replace("'", "\\'") + "'"
    if isinstance(v, bool):
        return 'true' if v else 'false'
    if isinstance(v, int):
        return str(v)
    if isinstance(v, list):
        if not v:
            return '[]'
        if all(isinstance(x, str) for x in v) and sum(len(x) for x in v) < 70:
            return '[' + ', '.join(php(x) for x in v) + ']'
        inner = ',\n'.join(pad + '    ' + php(x, indent + 4) for x in v)
        return '[\n' + inner + ',\n' + pad + ']'
    if isinstance(v, dict):
        if not v:
            return '[]'
        width = max(len(php(k)) for k in v)
        inner = ',\n'.join(
            f'{pad}    {php(k).ljust(width)} => {php(x, indent + 4)}' for k, x in v.items())
        return '[\n' + inner + ',\n' + pad + ']'
    raise TypeError(v)

# ---- Read and filter ------------------------------------------------------

rows = load(SRC)
five = [r for r in rows if r['Review Rating'] == '5.0' and r['Spam'] != 'LIKELY_SPAM']

reviews, seen = [], set()
skipped = collections.Counter()

for r in five:
    text = clean(r['Review Comment'])
    if len(text) < MIN_LEN:
        skipped['too short or empty'] += 1
        continue
    key = re.sub(r'[^a-z0-9]', '', text.lower())[:90]
    if key in seen:
        skipped['duplicate'] += 1
        continue

    city = r['Location'].split(' - ', 1)[-1].strip()
    city = re.sub(r'\s+\d+$', '', city)          # "Mopac 2" is the same address
    if city not in CLINIC:
        skipped['unknown clinic: ' + city] += 1
        continue
    slug, label, state = CLINIC[city]

    date = parse_date(r['Date Posted On'])
    if date is None:
        skipped['unparsable date'] += 1
        continue

    low = text.lower()
    topics = [k for k, _, pat in TOPICS if re.search(pat, low)]

    seen.add(key)
    name, initials = display_name(r['Reviewer Name'])
    reviews.append({
        'name':     name,
        'initials': initials,
        'clinic':   slug,
        'city':     f'{label}, {state.upper()}',
        'source':   r['Review Source'] or 'Google',
        'date':     date.isoformat(),
        'when':     date.strftime('%b %Y').replace(' 0', ' '),
        'topics':   topics,
        'text':     text,
    })

reviews.sort(key=lambda x: x['date'], reverse=True)

# ---- Roll-ups the page reads ---------------------------------------------

by_clinic = collections.Counter(x['clinic'] for x in reviews)
locations = {}
for city, (slug, label, state) in sorted(CLINIC.items(), key=lambda kv: (kv[1][2], kv[1][1])):
    if by_clinic[slug]:
        locations[slug] = {'label': label, 'state': state, 'count': by_clinic[slug]}

topic_counts = collections.Counter(t for x in reviews for t in x['topics'])
MIN_TOPIC = 25   # a chip that filters to a handful of cards is not worth the row
topics = {k: {'label': lab, 'count': topic_counts[k]} for k, lab, _ in TOPICS if topic_counts[k] >= MIN_TOPIC}
# Reviews keep only the topics that earned a chip, so nothing filters to a dead end.
for x in reviews:
    x['topics'] = [t for t in x['topics'] if t in topics]

newest = max(x['date'] for x in reviews)
oldest = min(x['date'] for x in reviews)
sources = collections.Counter(x['source'] for x in reviews)

meta = {
    'five_star':  len(five),                     # every 5★ row in the export
    'shown':      len(reviews),                  # the ones long enough to publish
    'clinics':    len(locations),
    # No average rating: the export is the five-star reviews only, so the
    # ratings underneath it are not here to average. The page counts instead.
    'sources':    {k: v for k, v in sources.most_common()},
    'newest':     newest,
    'updated':    datetime.date.fromisoformat(newest).strftime('%B %Y'),
    'first_year': oldest[:4],
    'last_year':  newest[:4],
}

body = php({'meta': meta, 'locations': locations, 'topics': topics, 'reviews': reviews})

header = '''<?php
/**
 * Patient reviews, for reviews.php.
 *
 * Generated from the practice's review export
 * (assets/reviews_list/5-Start GMB Reviews.xlsx) — every five-star review
 * across Google, ZocDoc, Healthgrades, WebMD and direct feedback. Reviews
 * shorter than %d characters are left out (they carry a rating but nothing
 * to read), as are exact duplicates and anything the export flagged as spam.
 *
 * Reviewers keep their first name and last initial, the convention the rest
 * of the site uses. Each review carries:
 *   clinic   key into 'locations' below — the site that received it
 *   topics   keys into 'topics' — what the review is about, read off the text
 *   date     ISO, for sorting; 'when' is what the card prints
 *
 * Regenerate rather than hand-edit: the export is the source of truth.
 */

return %s;
''' % (MIN_LEN, body)

open('includes/data-reviews.php', 'w').write(header)

print('reviews published:', len(reviews), 'of', len(five), 'five-star rows')
print('skipped:')
for k, v in skipped.most_common():
    print(f'   {v:5d}  {k}')
print('\nclinics:')
for k, v in locations.items():
    print(f'   {v["count"]:5d}  {v["label"]} ({v["state"].upper()})')
print('\ntopics:', {k: v['count'] for k, v in topics.items()})
print('\nmeta:', meta)
