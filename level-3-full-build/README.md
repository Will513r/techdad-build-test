# Level 3 — Full Build

This is the production tier: a **data-driven local-SEO site that scales**. The whole point is that one set of templates, fed by data, generates many pages — so the business can rank for every service in every area it serves without anyone hand-building pages. If you can build this cleanly, you can do the real job.

**Plan for 1–3 days.** This is a real project. Submit when it's coherent, even if not every bonus is done, and note what's left.

If you haven't done [Level 2](../level-2-php-basics/) yet, read it first — this is that same idea, scaled up.

---

## The task

A multi-page **PHP** site (no framework, **no database** — all content in PHP arrays) for Summit Exterior Cleaning. The business serves multiple **services** across multiple **areas**, and you need a page for the high-intent service-in-area combinations.

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

Each service-in-area page should read like a real ~600–1000 word local page: the service explained, why it matters in that area, a relevant review, an FAQ, and a clear call-to-action. Reuse and remix the data — don't paste identical text onto every page.

---

## The business data

Use the full **Summit Exterior Cleaning** profile from [Level 1](../level-1-demo-site/) (owner, NAP, hours, rating, the four services, reviews, FAQs). For areas, use at least these — give each its own real-sounding local detail (neighborhoods, nearby landmarks, what homes there deal with):

**Areas:** Asheville, Hendersonville, Black Mountain, Weaverville, Fletcher (Buncombe & Henderson counties).

You can add more areas — the point is that adding one is trivial once your data layer is right.

---

## How we'll grade it

### Core (this is the test)

- [ ] All content in `data/` arrays — nothing hardcoded into page files
- [ ] **One** template renders every service-in-area page (no per-page files)
- [ ] Adding an area or service is a **one-file data edit** (we will test this)
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

We can add a sixth area to your data file and a full, correctly-indexed set of new pages appears in the site and the sitemap — with no other file touched. The pages read like a local wrote them. Nothing is hardcoded, nothing is duplicated, and it all runs clean.

That's the job.
