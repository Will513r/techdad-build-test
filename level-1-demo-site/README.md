# Level 1 — Demo Site

Build the kind of page we send a prospect to win their business: **one self-contained landing page** that looks sharp, loads instantly, and is built from the prospect's real info. This is our outreach hook, so it has to feel custom — not like a template.

**Plan for ~2–3 hours.** Clean and convincing beats big and broken.

---

## What you're building from

You get the exact same two things a real Tech Dad Media build starts with — nothing more:

1. **[`../CLIENT-BRIEF.txt`](../CLIENT-BRIEF.txt)** — the "Copy for Claude" intake brief. Business facts, services, pricing, reviews, FAQs, brand voice, and our house build style all live here. **Read it first** and build to it.
2. **[`../client-photos/`](../client-photos/)** — the client's real photos (WebP), already sorted into `logo/`, `general/`, `locations/Asheville_NC/`, and `services/<Service_Name>/`.

> **Use the LOCAL photo files, not stock or URLs.** Reference them by relative path (e.g. `../client-photos/services/House_Soft_Washing/House_Soft_Washing_1.webp`). On a real job these are the photos the client paid for and expects to see — same here. The only place a placeholder is acceptable is if a section genuinely needs an image the client didn't supply, and then you flag it in a comment.

The brief is the source of truth. Where this README and the brief overlap, they agree — but if you spot anything, defer to `../CLIENT-BRIEF.txt`.

---

## The task

One file: **`index.html`**, living in this folder. Vanilla HTML, CSS, and JavaScript — no frameworks, no build step, no external dependencies you can avoid. It must open and work by **double-clicking the file** (no server needed). The local photos load by relative path, so keep the folder structure intact.

We're looking for:

1. **Real business data throughout** — pulled from the brief, used naturally. No filler.
2. **A single, self-contained file** — CSS in a `<style>`, JS in a `<script>`, all in `index.html`. Images are the one external thing, and they're the local files in `../client-photos/`.
3. **One signature element** — something memorable that fits an exterior-cleaning company (a before/after slider, an animated water effect, a clean custom badge — your call). This is what separates a demo that sells from a generic brochure.
4. **SEO foundation** — exactly one `<h1>`, a keyword-forward `<title>` and meta description, `LocalBusiness` JSON-LD, and `FAQPage` JSON-LD from the FAQs.
5. **Mobile-first** — looks right at 375px, 768px, and 1024px+.

### Lead with the right service

The brief's **EXTRA NOTES** are explicit: **emphasize House Soft Washing as the lead service.** Roof Soft Washing and Driveway & Concrete are strong secondary services; Gutter Brightening is an add-on you mention but don't lead with. Your hero, ordering, and emphasis should reflect that.

### Suggested sections (in this order)

1. Hero — full height, headline built around House Soft Washing and the soft-wash edge, one clear call-to-action (the CTA goal is **Call me**)
2. Trust strip — years, rating, areas served
3. Services — a card per service, House Soft Washing first
4. Gallery — use the local `../client-photos/` files (note the source in a comment)
5. Reviews — use the two in the brief
6. Contact — an estimate form that validates and shows a success state (no backend needed)
7. Footer — include a "Demo site built by Tech Dad Media" credit

> Demo-stage shortcuts are fine and expected: a frontend-only form, and a flagged placeholder *only* where the client supplied no photo. We're selling the vision here, not shipping production.

---

## The business (canonical data — see the brief for the full intake)

**Summit Exterior Cleaning LLC** — exterior cleaning (soft washing & pressure washing)
- **Owner:** Mike Reyes
- **Based in:** Asheville, NC · **Serves:** 30-mile radius (Asheville, Hendersonville, Black Mountain, Weaverville, Fletcher)
- **Phone:** (828) 555-0142 · **Email:** mike@summitexteriorclean.com
- **Hours:** Mon–Fri 7am–6pm, Sat 8am–2pm · **Rating:** 4.9★ (87 Google reviews) · **9 years** in business
- **Insured** · **Free estimates** · **Payments:** Cash, Check, Venmo, Card
- **CTA goal:** Call me · **Target search term:** "pressure washing Asheville NC"
- **The edge:** correct pressure + detergent per surface, so siding doesn't crack and roof warranties stay intact — results last 2–3x longer than a power-wash blast.

**Services** (lead with House Soft Washing):

| Service | Pricing | Why them |
|---|---|---|
| **House Soft Washing** *(lead)* | $0.15–$0.30 / sq ft | Low pressure + detergent so siding never cracks; lasts 2–3x longer than a power-wash blast. |
| Roof Soft Washing | $350–$900 per roof | Never walk/pressure a roof; manufacturer-recommended low-pressure method keeps warranty intact. |
| Driveway & Concrete Cleaning | $0.20–$0.40 / sq ft | Flat surface cleaner = even finish, no zebra stripes; oil/rust pre-treated. |
| Gutter Brightening *(add-on)* | $150–$300 per service | Hand-detailed; removes oxidation "tiger stripes", clears troughs. |

**Reviews:**
- *"Mike got 9 years of algae off our north-facing siding in an afternoon. Looks brand new."* — Karen D., Hendersonville
- *"Driveway looked like we'd repoured it. Showed up on time, fair price."* — Tom B., Asheville

**FAQs:**
- *Will soft washing damage my plants?* — No, we pre-wet landscaping and use plant-safe dilutions.
- *How long does a house wash last?* — Typically 2–3 years before regrowth in our climate.
- *Do you need to be home?* — No, as long as we have water access and any gate codes.

Logo wordmark/colors: a logo file is in `../client-photos/logo/`. The brief says "just go off my logo" for brand color — pull your palette from it.

---

## How to submit

1. **Fork** this repo.
2. Add your `index.html` in this `level-1-demo-site/` folder (keep `../client-photos/` where it is).
3. **Open a pull request** back to this repo with your changes.

That's it — we review from the PR.

---

## How we'll grade it

- [ ] Opens and works by double-clicking `index.html` (no server, no broken external deps)
- [ ] Built from `../CLIENT-BRIEF.txt` + the local `../client-photos/` files — real client photos, not stock/URLs
- [ ] House Soft Washing is clearly the lead service
- [ ] One single `<h1>`; keyword-forward `<title>` + meta description
- [ ] `LocalBusiness` JSON-LD present and correct
- [ ] `FAQPage` JSON-LD from the FAQs
- [ ] Real business data throughout — nothing left as filler
- [ ] One genuine signature element (not generic)
- [ ] Contact form validates + shows success state
- [ ] Looks right at 375 / 768 / 1024px
- [ ] Tech Dad Media footer credit present
- [ ] Any placeholder image flagged in comments (local photos used everywhere they exist)

**The tell:** does it feel custom-built for this business — their photos, their lead service, their voice — or like a template with the name swapped in? The second one is what we hire against.
