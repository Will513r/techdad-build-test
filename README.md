# PHP Build Test

Thanks for taking this. It's a small, practical build that tells us whether you and our stack are a fit. There are no trick questions — we just want to see clean, working PHP.

**Plan for about 3–4 hours.** If it runs long, submit what you have and note what's unfinished. We'd rather see four clean pages than ten broken ones.

---

## The task

Build a small PHP website for a (fictional) local business, **Summit Exterior Cleaning**. All the business info is below — you don't need to research anything. This is purely about the build.

It's only a few pages, but **how** you build them is the whole point. Specifically we're looking for:

1. **Shared includes** — one `header.php` and one `footer.php` that every page pulls in. The nav and footer should live in *one* place, not be copy-pasted onto each page.
2. **Data-driven content** — the list of services lives in a PHP array in `data/services.php`. Your pages *read* from that array. Don't hardcode service text into the page files.
3. **One template, many pages** — a single `service-template.php` renders *every* service page by reading the data. Adding a new service should mean editing **one data file** — not creating a new page.
4. **Basic SEO on every page** — exactly one `<h1>`, a relevant `<title>` and meta description, and a `LocalBusiness` JSON-LD block.

> If you catch yourself copy-pasting a page and find-replacing the service name, stop — building each page by hand is exactly what this test is checking you *don't* do. One template, driven by data.

---

## What to build

```
/
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

There's no logo file — just use a styled text wordmark ("Summit Exterior Cleaning") in the header. Keep the design clean and readable; don't spend your time on fancy styling.

---

## The business

**Summit Exterior Cleaning** — pressure washing & soft washing
- **Owner:** Mike Reyes
- **Based in:** Asheville, NC
- **Service areas:** Asheville, Hendersonville, Black Mountain, Weaverville, Fletcher (Buncombe & Henderson counties)
- **Phone:** (828) 555-0142
- **Email:** mike@summitexteriorclean.com
- **Hours:** Mon–Sat, 7am–6pm
- **Rating:** 4.9 stars (87 Google reviews)
- **In business:** 9 years
- **Main search term to target:** "pressure washing Asheville NC"

### Services (these become your data array)

| Service | Suggested slug | One-liner |
| :-- | :-- | :-- |
| House Soft Washing | `house-soft-washing` | Low-pressure wash that strips mildew and algae off siding without damaging it. |
| Driveway & Concrete Cleaning | `concrete-cleaning` | Surface-cleaner pass that lifts oil, dirt, and stains out of concrete and pavers. |
| Roof Soft Washing | `roof-soft-washing` | Gentle treatment that kills the black streaks on shingles. |
| Gutter Brightening | `gutter-brightening` | Removes the oxidation "tiger stripes" from the face of aluminum gutters. |

### Two reviews (use them somewhere)

- *"Mike got 9 years of algae off our north-facing siding in an afternoon. Looks brand new."* — Karen D., Hendersonville
- *"Driveway looked like we'd repoured it. Showed up on time, fair price."* — Tom B., Asheville

### Three FAQs (optional, for bonus SEO)

- **Will soft washing damage my plants?** No — we pre-wet landscaping and use plant-safe dilutions.
- **How long does a house wash last?** Typically 2–3 years before regrowth in our climate.
- **Do you need to be home?** No, as long as we have water access and any gate codes.

---

## How we'll grade it

### Core (this is the test)

- [ ] `header.php` + `footer.php` exist and are included by **every** page (no duplicated nav/footer markup)
- [ ] All service content lives in `data/services.php` — nothing hardcoded into page files
- [ ] A **single** `service-template.php` renders all four service pages from the array
- [ ] Adding a 5th service requires editing **only** `data/services.php` (we will test this)
- [ ] `services/index.php` lists services by looping the array (not a hand-typed list)
- [ ] Every page has exactly **one** `<h1>`
- [ ] Every page has a relevant `<title>` and meta description
- [ ] `LocalBusiness` JSON-LD present (correct name, phone, rating, areas)
- [ ] Real business data used throughout — no "[service name]" filler left
- [ ] Runs locally with no PHP errors or warnings

### Bonus (nice, not required)

- [ ] Clean URLs via `.htaccess` (`/services/roof-soft-washing`)
- [ ] `FAQPage` JSON-LD from the FAQ entries
- [ ] A graceful 404 for an unknown service slug
- [ ] Readable on mobile (375px wide)
- [ ] Reviews worked in naturally

---

## How to submit

1. **Fork this repo** (or use it as a template) to your own GitHub account.
2. Build the site in your fork. Commit as you go — normal git history is fine and expected.
3. When you're done, either:
   - open a **pull request** back to this repo, **or**
   - send us the link to your fork.
4. Include a one-line note on anything unfinished or anything you'd do with more time.

That's it. Good luck — we're looking forward to seeing it.
