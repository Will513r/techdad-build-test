# Level 3 — Full Build

This is the production tier: a **data-driven local-SEO site that scales**. The whole point is that one set of templates, fed by data, generates many pages — so the business can rank for every service in every area it serves without anyone hand-building pages. If you can build this cleanly, you can do the real job.

**Plan for 1–3 days.** This is a real project. Submit when it's coherent, even if not every bonus is done, and note what's left.

If you haven't done [Level 2](../level-2-php-basics/) yet, read it first — this is that same idea, scaled up.

---

## Your build input — read this first

You build from exactly two things, **and they are the same artifact you'd get on a real Tech Dad Media job:**

1. **[`../CLIENT-BRIEF.txt`](../CLIENT-BRIEF.txt)** — a real-format "Copy for Claude" brief: business profile, services, pricing, area notes, brand voice, the standard layout, and our house file structure under "HOW WE BUILD". Read it top to bottom before you write a line.
2. **[`../client-photos/`](../client-photos/)** — the client's actual photos (WebP), already sorted into `logo/`, `general/`, `locations/<area>/`, and `services/<Service_Name>/`.

> **Use the LOCAL photo files, not stock images or URLs.** The brief references images by relative path (e.g. `./client-photos/services/House_Soft_Washing/House_Soft_Washing_1.webp`). Pull those files into your build's `assets/images/` (WebP) and use them. Sourcing your own images or hotlinking is a fail — using what the client gave you is the job.

The business in the brief (Summit Exterior Cleaning) is **fictional**, created to mirror a real intake. Build it exactly as if it were a paying client.

---

## The task

A multi-page **PHP** site (no framework, **no database** — all content in PHP arrays) for the business in the brief. It serves multiple **services** across multiple **areas**, and you need a page for the high-intent service-in-area combinations.

### The core requirement (this is the test)

**Pages come from data through templates. Never hand-build a page.**

- All content lives in `data/` arrays: services, areas, reviews.
- **One** service-template renders *every* service-in-area page (e.g. `/services/roof-soft-washing/asheville`).
- Adding a new area or service is a **one-file data edit** — every page that should exist then exists, with no new page files.

### Page structure

```
Home
 └─ Services index            (/services)
     └─ Service hub            (/services/<service>)        — lists the areas that service covers
         └─ Service-in-area    (/services/<service>/<area>) — THE money page, one template
Areas index                    (/areas)                     — every area served
Static: /about  /contact  /reviews  /404
```

### Selective indexing (important)

Not every service-in-area combination is worth indexing — a page for a service an area barely demands is a thin page that drags the whole site down. So:

- You decide, **in the data**, which service-in-area combinations are worth indexing.
- Pages **not** in that set should still render but carry `<meta name="robots" content="noindex, follow">`.
- Your `sitemap.xml` should list **only** the indexable pages.

This one decision — what's worth indexing — should live in the data and drive both the `noindex` tag and the sitemap. Get it controlled from one place.

### SEO / technical layer

- Single `<h1>` and clean heading hierarchy on every page.
- Per-page `<title>` (cap ~60 chars) and meta description (~155), built from the data.
- Canonical URL on every page (no query strings, no trailing-slash dupes).
- JSON-LD: `LocalBusiness`, `BreadcrumbList`, `FAQPage`, and `AggregateRating` computed from the reviews data.
- A dynamic **`sitemap.xml`** (PHP-generated) and a **`robots.txt`**.
- **Clean URLs** via `.htaccess` (mod_rewrite): force a canonical host (HTTPS), route the patterns above, and serve a custom 404.
- Make the service-in-area pages **genuinely local** — work the real area name and specifics into the copy. Generic "we serve [area]" filler is the failure mode.

### Real content, not lorem

Each service-in-area page should read like a real ~600–1000 word local page: the service explained, why it matters in that area, a relevant review, an FAQ, and a clear call-to-action. Reuse and remix the data from the brief — don't paste identical text onto every page.

**Lead service:** the brief's EXTRA NOTES are explicit — lead with **House Soft Washing**. Make it the primary/most prominent service throughout (home, services index, internal linking). Roof Soft Washing and Driveway & Concrete are strong secondaries; Gutter Brightening is an add-on you mention but don't lead with. The CTA goal is **"Call me"** — every page should drive a phone call.

---

## The business data

Pull the full profile from **[`../CLIENT-BRIEF.txt`](../CLIENT-BRIEF.txt)** (owner, NAP, hours, rating, brand voice, area notes, the four services with descriptions and "why them"). The canonical facts, for quick reference:

| Field | Value |
| :-- | :-- |
| Business | Summit Exterior Cleaning LLC |
| Owner | Mike Reyes |
| Location | Asheville, NC (serves 30-mile radius) |
| Phone | (828) 555-0142 |
| Email | mike@summitexteriorclean.com |
| Hours | Mon–Fri 7am–6pm, Sat 8am–2pm |
| Trust | Insured · 4.9 stars from 87 Google reviews · 9 years · free estimates |
| Payments | Cash, Check, Venmo, Card |
| CTA goal | **Call me** |

### Services (these drive your data array)

| Service | Slug | Pricing | Why them |
| :-- | :-- | :-- | :-- |
| **House Soft Washing** *(lead)* | `house-soft-washing` | $0.15–$0.30 / sq ft | Low pressure + detergent so siding never cracks; lasts 2–3× longer than a power-wash blast. |
| Roof Soft Washing | `roof-soft-washing` | $350–$900 per roof | Never walk/pressure a roof; manufacturer-recommended low-pressure method keeps the warranty intact. |
| Driveway & Concrete Cleaning | `concrete-cleaning` | $0.20–$0.40 / sq ft | Flat surface cleaner = even finish, no zebra stripes; oil/rust pre-treated. |
| Gutter Brightening *(add-on)* | `gutter-brightening` | $150–$300 per service | Hand-detailed; removes oxidation "tiger stripes" and clears troughs. |

### Areas

Build for these — give each its own real-sounding local detail (neighborhoods, nearby landmarks, what homes there deal with). The brief's Asheville notes are a model: older homes under heavy tree canopy grow algae fast; newer light-siding subdivisions show pollen quickly.

**Areas:** Asheville, Hendersonville, Black Mountain, Weaverville, Fletcher (Buncombe & Henderson counties).

You can add more areas — the point is that adding one is trivial once your data layer is right.

---

## How we'll grade it

### Core (this is the test)

- [ ] Built from `../CLIENT-BRIEF.txt` + the local `../client-photos/` files (client's photos used, not stock/URLs)
- [ ] All content in `data/` arrays — nothing hardcoded into page files
- [ ] **One** template renders every service-in-area page (no per-page files)
- [ ] Adding an area or service is a **one-file data edit** (we will test this)
- [ ] House Soft Washing led as the primary service; "Call me" CTA on every page
- [ ] Service hubs and the areas index link down to the money pages (clean internal linking)
- [ ] Selective indexing driven from data: non-indexed combos get `noindex, follow`; sitemap lists only indexed ones
- [ ] Dynamic `sitemap.xml` + `robots.txt` present and correct
- [ ] Clean URLs + canonical host + custom 404 via `.htaccess`
- [ ] Single `<h1>`, per-page title/meta, canonical on every page
- [ ] `LocalBusiness`, `BreadcrumbList`, `FAQPage`, `AggregateRating` JSON-LD
- [ ] Service-in-area pages read as genuinely local, not templated filler
- [ ] Runs with no PHP errors/warnings

### Bonus

- [ ] Legacy-URL 301 redirects (old slugs → new clean URLs)
- [ ] Image sitemap entries for a projects/gallery section
- [ ] A simple blog (index + post template, posts from data/files)
- [ ] Performance touches (inlined critical CSS, WebP, caching headers)
- [ ] Lead-capture form wired to a PHP endpoint that emails the lead

---

## What "good" looks like

We can add a sixth area to your data file and a full, correctly-indexed set of new pages appears in the site and the sitemap — with no other file touched. The pages read like a local wrote them, use the client's own photos, and lead with House Soft Washing. Nothing is hardcoded, nothing is duplicated, and it all runs clean.

That's the job.

---

## How to submit

1. **Fork this repo** (or use it as a template) to your own GitHub account.
2. Build the site in your fork. Commit as you go — normal git history is fine and expected.
3. When you're done, either:
   - open a **pull request** back to this repo, **or**
   - send us the link to your fork.
4. Include a one-line note on anything unfinished or anything you'd do with more time.

That's it. Good luck — we're looking forward to seeing it.
