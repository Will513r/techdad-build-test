# Level 2 — PHP Basics

Thanks for taking this. It's a small, practical build that tells us whether you and our stack are a fit. There are no trick questions — we just want to see clean, working PHP.

**Plan for about 3–4 hours.** If it runs long, submit what you have and note what's unfinished. We'd rather see four clean pages than ten broken ones.

---

## The task

Build a small multi-page PHP website for a (fictional) local business, **Summit Exterior Cleaning LLC**, from a real Tech Dad Media job packet:

- **[`../CLIENT-BRIEF.txt`](../CLIENT-BRIEF.txt)** — the "Copy for Claude" brief. Business info, voice, services, pricing, and our house build style. **Read it first.**
- **[`../client-photos/`](../client-photos/)** — the client's real WebP photos, already sorted into `logo/`, `general/`, `locations/Asheville_NC/`, and `services/<Service_Name>/`.

This is *exactly* the artifact a builder gets on a real Tech Dad Media job — a brief plus a folder of the client's own photos. **Use the local photo files (reference them by relative path, e.g. `../client-photos/services/House_Soft_Washing/House_Soft_Washing_1.webp`). Do not use stock images or URLs.** Everything you need is in the brief; you don't have to research anything.

It's only a few pages, but **how** you build them is the whole point:

1. **Shared includes** — one `header.php` and one `footer.php` that every page pulls in. The nav and footer live in *one* place, never copy-pasted onto each page.
2. **Data-driven content** — the services live in a PHP array in `data/services.php`. Your pages *read* from that array. Don't hardcode service text into the page files.
3. **One template, many pages** — a single `service-template.php` renders *every* service page by reading the data. Adding a new service should mean editing **one data file** — not creating a new page.
4. **Basic SEO on every page** — exactly one `<h1>`, a relevant `<title>` and meta description, and a `LocalBusiness` JSON-LD block.

> If you catch yourself copy-pasting a page and find-replacing the service name, stop — building each page by hand is exactly what this test is checking you *don't* do. One template, driven by data.

---

## What to build

A `starter/` folder is provided with the skeleton below already stubbed out (empty files with a one-line note in each). Build into it — don't fight it.

```
starter/
├── index.php                       # homepage
├── about.php                       # static page
├── contact.php                     # static page (a frontend-only form is fine)
├── includes/
│   ├── header.php                  # nav + wordmark, included by every page
│   └── footer.php                  # footer, included by every page
├── data/
│   └── services.php                # the services array — the ONLY place service content lives
└── services/
    ├── index.php                   # lists all services (loops the data array)
    └── service-template.php        # renders ONE service page from the array
```

How you load a single service is up to you — `service-template.php?service=house-soft-washing` (a query string) is perfectly fine. Clean URLs (e.g. `/services/house-soft-washing`) are a **bonus, not required**.

It should run locally with:

```
php -S localhost:8000
```

Use the client's `logo/logo_1.webp` in the header (a styled text wordmark alongside it is fine). Keep the design clean and readable; don't spend your time on fancy styling.

---

## The business

Pull everything from the brief — this table is just the canonical summary so you can sanity-check your data array.

**Summit Exterior Cleaning LLC** — exterior cleaning (soft washing & pressure washing)
- **Owner:** Mike Reyes
- **Based in:** Asheville, NC
- **Service area:** 30 miles from Asheville (Buncombe & Henderson counties)
- **Phone:** (828) 555-0142
- **Email:** mike@summitexteriorclean.com
- **Hours:** Mon–Fri 7am–6pm, Sat 8am–2pm
- **Rating:** 4.9 stars (87 Google reviews)
- **In business:** 9 years
- **Trust:** Insured · Free estimates · Payments: Cash, Check, Venmo, Card
- **Site goal (CTA):** Call me
- **Tone:** Friendly & approachable — local, straight-talking, no upsell pressure
- **Edge:** The soft-wash method — correct pressure + detergent per surface, so nothing gets damaged and results last 2–3x longer than a power-wash blast.

### Services (these become your data array)

| Service | Slug | Pricing | Why them |
| :-- | :-- | :-- | :-- |
| House Soft Washing | `house-soft-washing` | $0.15–$0.30 / sq ft | Low pressure + detergent so siding never cracks; lasts 2–3x longer than a power-wash blast. |
| Driveway & Concrete Cleaning | `concrete-cleaning` | $0.20–$0.40 / sq ft | Flat surface cleaner = even finish, no zebra stripes; oil/rust pre-treated. |
| Roof Soft Washing | `roof-soft-washing` | $350–$900 per roof | Never walk or pressure a roof; the manufacturer-recommended low-pressure method keeps the warranty intact. |
| Gutter Brightening | `gutter-brightening` | $150–$300 per service | Hand-detailed; removes oxidation "tiger stripes" and clears the troughs. |

> **Emphasis (from the brief's EXTRA NOTES):** lead with **House Soft Washing** — it's the headline service. Roof Soft Washing and Driveway & Concrete are strong secondary services. Gutter Brightening is an add-on you mention but don't lead with. Let that priority show in your homepage and services hub ordering.

Service-specific photos live in `../client-photos/services/<Service_Name>/`, the Asheville shots in `../client-photos/locations/Asheville_NC/`, and team/truck/equipment shots in `../client-photos/general/`. The full descriptions, "why them" copy, reviews, and FAQs are all in the brief — use them.

---

## How we'll grade it

### Core (this is the test)

- [ ] `header.php` + `footer.php` exist and are included by **every** page (no duplicated nav/footer markup)
- [ ] All service content lives in `data/services.php` — nothing hardcoded into page files
- [ ] A **single** `service-template.php` renders all four service pages from the array
- [ ] Adding a 5th service requires editing **only** `data/services.php` (we will test this — we'll drop a new service into the array and expect its page + hub listing to appear with no other edits)
- [ ] `services/index.php` lists services by looping the array (not a hand-typed list)
- [ ] Every page has exactly **one** `<h1>`
- [ ] Every page has a relevant `<title>` and meta description
- [ ] `LocalBusiness` JSON-LD present (correct name, phone, rating, area)
- [ ] Real business data used throughout — no "[service name]" filler left
- [ ] Local client photos used (from `../client-photos/`) — no stock images or URLs
- [ ] Runs locally with no PHP errors or warnings

### Bonus (nice, not required)

- [ ] House Soft Washing clearly led as the primary service
- [ ] Clean URLs via `.htaccess` (`/services/roof-soft-washing`)
- [ ] `FAQPage` JSON-LD from the FAQ entries in the brief
- [ ] A graceful 404 for an unknown service slug
- [ ] Readable on mobile (375px wide)
- [ ] Reviews from the brief worked in naturally

---

## How to submit

1. **Fork this repo** (or use it as a template) to your own GitHub account.
2. Build the site in your fork. Commit as you go — normal git history is fine and expected.
3. When you're done, either:
   - open a **pull request** back to this repo, **or**
   - send us the link to your fork.
4. Include a one-line note on anything unfinished or anything you'd do with more time.

That's it. Good luck — we're looking forward to seeing it.
