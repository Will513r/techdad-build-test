# Tech Dad Media — Build Test

We build fast, clean, SEO-ready websites for local contractors. This repo is how we find people who can do that. **Pick the level that matches what you can build** and go — finishing a higher level is a stronger signal, but a clean Level 1 beats a broken Level 3 every time.

## Your build input (this is a real job)

You're not starting from a blank page. You get the exact handoff our builders get on a real Tech Dad Media job, straight out of our CRM:

- **[`CLIENT-BRIEF.txt`](CLIENT-BRIEF.txt)** — a real-format "Copy for Claude" brief: the business, the services, pricing, brand voice, layout, and our house build style. **Read it first.**
- **[`client-photos/`](client-photos/)** — the client's actual photos (WebP), already sorted into `logo/`, `general/`, `locations/Asheville_NC/`, and `services/<Service_Name>/`.

**Use the local photo files, not stock images or URLs.** Reference them by relative path, e.g. `client-photos/services/House_Soft_Washing/House_Soft_Washing_1.webp`. This mirrors the real workflow exactly — the brief is the spec, the folder is the asset library.

The business is fictional (placeholder data + photos), but treat it like a paying client: real copy, real photos, no filler.

## The client

**Summit Exterior Cleaning LLC** — exterior cleaning (soft washing) in Asheville, NC. All three levels use this same business, so you can climb the ladder if you want — the data carries over.

| Field | Value |
| :-- | :-- |
| Owner | Mike Reyes |
| Phone | (828) 555-0142 |
| Email | mike@summitexteriorclean.com |
| Location | Asheville, NC |
| Hours | Mon–Fri 7am–6pm, Sat 8am–2pm |
| Trust | Insured · 4.9★ from 87 Google reviews · 9 years |
| Payments | Cash, Check, Venmo, Card |
| Service radius | 30 miles from Asheville |
| Free estimates | Yes |
| **CTA goal** | **Call me** |

### Services

**Lead with House Soft Washing** — per the brief's EXTRA NOTES, it's the primary service. Roof Soft Washing and Driveway & Concrete are strong secondaries; Gutter Brightening is an add-on you mention but don't lead with.

| Slug | Service | Pricing | Why them |
| :-- | :-- | :-- | :-- |
| `house-soft-washing` | **House Soft Washing** *(primary)* | $0.15–$0.30/sq ft | Low pressure + detergent so siding never cracks; lasts 2–3x longer than a power-wash blast. |
| `roof-soft-washing` | Roof Soft Washing | $350–$900 per roof | Never walk/pressure a roof; manufacturer-recommended low-pressure method keeps the warranty intact. |
| `concrete-cleaning` | Driveway & Concrete Cleaning | $0.20–$0.40/sq ft | Flat surface cleaner = even finish, no zebra stripes; oil/rust pre-treated. |
| `gutter-brightening` | Gutter Brightening *(add-on)* | $150–$300 per service | Hand-detailed; removes oxidation "tiger stripes", clears troughs. |

**Service areas** (for the multi-city Level 3 build): Asheville, Hendersonville, Black Mountain, Weaverville, Fletcher (Buncombe & Henderson counties).

## Pick a level

| Level | What you build | Stack | Roughly |
| :-- | :-- | :-- | :-- |
| **[1 — Demo Site](level-1-demo-site/)** | One self-contained landing page — the kind we send a prospect to win the deal | Vanilla HTML/CSS/JS, single file | 2–3 hrs |
| **[2 — PHP Basics](level-2-php-basics/)** | A small multi-page PHP site, shared includes, data-driven pages | PHP, no framework, no DB | 3–4 hrs |
| **[3 — Full Build](level-3-full-build/)** | A data-driven local-SEO site that scales across services and areas | PHP, no framework, no DB | 1–3 days |

## How to take any level

1. **Use this template** (green button up top) or fork the repo to your own GitHub.
2. Build from `CLIENT-BRIEF.txt` + `client-photos/`, inside the folder for the level you chose. Commit as you go — normal git history is expected.
3. When done, **open a pull request** back here, or send us your repo link.
4. Add a one-line note on anything unfinished or anything you'd do with more time.

You can do more than one level. If you do, keep each in its own folder.

## What we care about (every level)

- **Build from the brief.** Match the business, services, pricing, and brand voice in `CLIENT-BRIEF.txt`. Lead with House Soft Washing.
- **Use the client's photos.** Local WebP files from `client-photos/` — no stock images, no URLs.
- **Never template.** Real business data everywhere — no `[service name]` filler, no cookie-cutter copy.
- **Don't repeat yourself.** Shared markup lives in one place; content lives in data, not hardcoded into pages.
- **SEO from the start.** One `<h1>` per page, real `<title>`/meta, and `LocalBusiness` JSON-LD.
- **It runs.** No errors on load.

Good luck — we read every submission.
