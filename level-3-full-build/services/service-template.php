<?php
/**
 * Unified Service Template - Summit Exterior Cleaning LLC
 * Three-section premium layout: Hero → Process/Benefits → Results/FAQs
 */
require_once dirname(__DIR__) . '/includes/config.php';
$services = require dirname(__DIR__) . '/data/services.php';
$cities   = require dirname(__DIR__) . '/data/cities.php';
$reviews  = require dirname(__DIR__) . '/data/reviews.php';

// Fetch query params
$service_slug = $_GET['service'] ?? '';
$city_slug    = $_GET['city']    ?? null;

// Validate service exists
if (!isset($services[$service_slug])) {
    header("HTTP/1.1 404 Not Found");
    include dirname(__DIR__) . '/404.php';
    exit;
}

$service     = $services[$service_slug];
$city        = null;
$is_indexed  = true;

if ($city_slug !== null) {
    if (!isset($cities[$city_slug])) {
        header("HTTP/1.1 404 Not Found");
        include dirname(__DIR__) . '/404.php';
        exit;
    }
    $city       = $cities[$city_slug];
    $is_indexed = in_array($city_slug, $service['indexed_cities']);
}

// -------------------------------------------------------------------
// Metadata / Schema / FAQs
// -------------------------------------------------------------------
$meta = [];
if ($city) {
    $meta['title']       = $service['name'] . ' ' . $city['name'] . ' NC | Summit Exterior Cleaning';
    $meta['description'] = 'Need ' . strtolower($service['name']) . ' in ' . $city['name'] . ', NC? Mike Reyes provides safe soft washing from ' . $service['pricing'] . '. Fully insured.';
    $meta['canonical']   = '/services/' . $service_slug . '/' . $city_slug;
    $meta['noindex']     = !$is_indexed;
    $meta['breadcrumbs'] = [
        ['name' => 'Home',             'url' => '/'],
        ['name' => 'Services',         'url' => '/services'],
        ['name' => $service['name'],   'url' => '/services/' . $service_slug],
        ['name' => $city['name'],      'url' => '/services/' . $service_slug . '/' . $city_slug],
    ];
} else {
    $meta['title']       = $service['name'] . ' Asheville NC | Summit Exterior Cleaning';
    $meta['description'] = $service['name'] . ' from ' . $service['pricing'] . '. Summit Exterior Cleaning provides safe soft-wash cleaning across Buncombe & Henderson counties.';
    $meta['canonical']   = '/services/' . $service_slug;
    $meta['noindex']     = false;
    $meta['breadcrumbs'] = [
        ['name' => 'Home',           'url' => '/'],
        ['name' => 'Services',       'url' => '/services'],
        ['name' => $service['name'], 'url' => '/services/' . $service_slug],
    ];
}

$meta['service_schema'] = ['service' => $service, 'city' => $city ? $city['name'] : null];

// Common FAQs (feeding the FAQPage JSON-LD and page accordion)
$page_faqs = require dirname(__DIR__) . '/data/faqs.php';
$meta['faqs'] = $page_faqs;

// Contextual review lookup
$featured_review = null;
if ($city) {
    foreach ($reviews as $rev) {
        if ($rev['service'] === $service_slug && $rev['location'] === $city_slug) {
            $featured_review = $rev; break;
        }
    }
}
if (!$featured_review) {
    foreach ($reviews as $rev) {
        if ($rev['service'] === $service_slug) { $featured_review = $rev; break; }
    }
}
if (!$featured_review && !empty($reviews)) { $featured_review = $reviews[0]; }

// Hero image
$hero_img = ($city && isset($city['photos'][0])) ? $city['photos'][0] : $service['photos'][0];

// Process steps (service-specific, 3-step checklist loaded dynamically from data/services.php)
$process_steps = $service['process'] ?? [];

// Trust signals (shown in the benefits panel)
$trust_items = [
    ['icon' => 'M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z', 'title' => 'Fully Insured', 'desc' => '$2M general liability policy on every job.'],
    ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => '9+ Years Local', 'desc' => 'Owner-operated since 2017 across Buncombe & Henderson counties.'],
    ['icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6', 'title' => 'Plant-Safe Methods', 'desc' => 'Eco-friendly soaps that are safe for lawns, gardens, and pets.'],
    ['icon' => 'M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z', 'title' => '4.9 ★ Rating', 'desc' => '87+ verified Google reviews from Asheville-area homeowners.'],
];

include dirname(__DIR__) . '/includes/head.php';
include dirname(__DIR__) . '/includes/header.php';
?>

<!-- ================================================================
     SECTION 1 — HERO: Badge · Title · CTAs · Full-bleed Image
     ================================================================ -->
<section class="sdt-hero">
    <div class="container sdt-hero-content">

        <!-- Breadcrumb pill -->
        <div class="sdt-breadcrumb">
            <a href="<?php echo SITE_URL; ?>/services" class="sdt-breadcrumb-link">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="15 18 9 12 15 6"></polyline></svg>
                Services
            </a>
            <span class="sdt-breadcrumb-sep">/</span>
            <span class="sdt-breadcrumb-current"><?php echo htmlspecialchars($service['name']); ?></span>
            <?php if ($city): ?>
                <span class="sdt-breadcrumb-sep">/</span>
                <span class="sdt-breadcrumb-current"><?php echo htmlspecialchars($city['name']); ?></span>
            <?php endif; ?>
        </div>

        <!-- Hero Text -->
        <div class="sdt-hero-text">
            <h1 class="sdt-hero-title">
                <?php echo htmlspecialchars($service['name']); ?>
                <?php if ($city): ?>
                    <span class="sdt-hero-city"> in <?php echo htmlspecialchars($city['name']); ?></span>
                <?php endif; ?>
            </h1>

            <!-- CTA Buttons -->
            <div class="sdt-hero-actions">
                <a href="tel:<?php echo PHONE_TEL; ?>" class="sdt-cta-primary">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"></path></svg>
                    Book a Free Estimate
                </a>
                <a href="#sdt-process" class="sdt-cta-secondary">
                    Explore Pricing
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="sdt-btn-arrow"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
            </div>
        </div>
    </div>

    <!-- Full-bleed hero image -->
    <div class="sdt-hero-image-wrap">
        <img
            src="<?php echo SITE_URL; ?>/<?php echo htmlspecialchars($hero_img); ?>"
            alt="<?php echo htmlspecialchars($service['name']); ?> in <?php echo $city ? htmlspecialchars($city['name']) : 'Asheville, NC'; ?>"
            class="sdt-hero-img"
        >
        <!-- Pricing tag overlay -->
        <div class="sdt-price-badge">
            <span class="sdt-price-label">Starting from</span>
            <span class="sdt-price-value"><?php echo htmlspecialchars($service['pricing']); ?></span>
        </div>
    </div>
</section>


<!-- ================================================================
     SECTION 2 — PROCESS & BENEFITS (Dark)
     ================================================================ -->
<section class="sdt-process-section" id="sdt-process">
    <div class="container">

        <div class="sdt-process-header">
            <div class="sdt-section-label">
                <span class="sdt-label-dot"></span> Our Process
            </div>
            <h2 class="sdt-process-title"><?php echo htmlspecialchars($service['headline']); ?></h2>
        </div>

        <div class="sdt-process-body">

            <!-- Left: What's Included (benefits) -->
            <div class="sdt-included-panel">
                <h3 class="sdt-panel-title">What's Included</h3>
                <ul class="sdt-check-list">
                    <?php foreach ($service['benefits'] as $benefit): ?>
                    <li class="sdt-check-item">
                        <span class="sdt-check-icon">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        </span>
                        <?php echo htmlspecialchars($benefit); ?>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <!-- Right: Process Steps -->
            <div class="sdt-steps-panel">
                <h3 class="sdt-panel-title">Working Process</h3>
                <div class="sdt-steps-list">
                    <?php foreach ($process_steps as $step): ?>
                    <div class="sdt-step-item">
                        <div class="sdt-step-meta">
                            <span class="sdt-step-num"><?php echo $step['step']; ?></span>
                        </div>
                        <div class="sdt-step-text">
                            <h4 class="sdt-step-title"><?php echo htmlspecialchars($step['title']); ?></h4>
                            <p class="sdt-step-desc"><?php echo htmlspecialchars($step['desc']); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>

                <!-- CTA inside dark section -->
                <a href="tel:<?php echo PHONE_TEL; ?>" class="sdt-cta-primary sdt-section-cta">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6A19.79 19.79 0 012.12 4.18 2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92z"></path></svg>
                    Submit Booking Request
                </a>
            </div>
        </div>
    </div>
</section>


<!-- ================================================================
     SECTION 3 — RESULTS, WHY US & FAQs (Light)
     ================================================================ -->
<section class="sdt-results-section">
    <div class="container">

        <!-- Why Choose Summit -->
        <div class="sdt-why-panel">
            <div class="sdt-why-header">
                <div class="sdt-section-label sdt-label-light">
                    <span class="sdt-label-dot"></span> Why Choose Us
                </div>
                <div class="sdt-why-header-right">
                    <h2 class="sdt-why-title">From homes to businesses, we offer comprehensive solutions.</h2>
                    <a href="<?php echo SITE_URL; ?>/services" class="sdt-cta-secondary">
                        Explore Services
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" class="sdt-btn-arrow"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </a>
                </div>
            </div>

            <!-- Trust grid -->
            <div class="sdt-trust-grid">
                <?php foreach ($trust_items as $trust): ?>
                <div class="sdt-trust-card">
                    <div class="sdt-trust-icon">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="<?php echo $trust['icon']; ?>"></path>
                        </svg>
                    </div>
                    <h4 class="sdt-trust-title"><?php echo $trust['title']; ?></h4>
                    <p class="sdt-trust-desc"><?php echo $trust['desc']; ?></p>
                </div>
                <?php endforeach; ?>
            </div>

            <!-- Photo gallery strip (3 images) -->
            <div class="sdt-gallery-strip">
                <?php foreach (array_slice($service['photos'], 0, 3) as $photo): ?>
                <div class="sdt-gallery-item">
                    <img src="<?php echo SITE_URL; ?>/<?php echo htmlspecialchars($photo); ?>"
                         alt="<?php echo htmlspecialchars($service['name']); ?> project photo"
                         class="sdt-gallery-img">
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Results / Description copy -->
        <div class="sdt-results-copy-panel">
            <div class="sdt-section-label sdt-label-light">
                <span class="sdt-label-dot"></span> Results
            </div>
            <div class="sdt-results-body">
                <p class="sdt-results-desc"><?php echo nl2br(htmlspecialchars($service['description'])); ?></p>

                <?php if ($city): ?>
                <div class="sdt-local-note">
                    <h3>Serving <?php echo htmlspecialchars($city['name']); ?>, NC</h3>
                    <p><?php echo htmlspecialchars($city['local_note']); ?></p>
                </div>
                <?php endif; ?>

                <?php if ($featured_review): ?>
                <div class="sdt-review-block">
                    <div class="sdt-review-stars">★★★★★</div>
                    <blockquote class="sdt-review-quote">"<?php echo htmlspecialchars($featured_review['text']); ?>"</blockquote>
                    <cite class="sdt-review-author">
                        — <strong><?php echo htmlspecialchars($featured_review['author']); ?></strong>,
                        <?php echo htmlspecialchars($featured_review['location_name']); ?>, NC
                    </cite>
                </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- FAQ Section -->
        <div class="sdt-faq-section">
            <div class="sdt-faq-header">
                <div class="sdt-section-label sdt-label-light">
                    <span class="sdt-label-dot"></span> Frequently Asked Questions
                </div>
                <a href="tel:<?php echo PHONE_TEL; ?>" class="sdt-faq-help-link">
                    Need Help? Call Mike
                    <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="margin-left:4px; vertical-align: middle;"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
            </div>

            <!-- Two-column FAQ grid -->
            <div class="sdt-faq-grid">
                <?php foreach ($page_faqs as $i => $faq): ?>
                <div class="sdt-faq-item accordion-item" id="sdt-faq-<?php echo $i; ?>">
                    <button class="sdt-faq-q accordion-header">
                        <span class="sdt-faq-icon">+</span>
                        <span><?php echo htmlspecialchars($faq['q']); ?></span>
                    </button>
                    <div class="sdt-faq-a accordion-body">
                        <p><?php echo htmlspecialchars($faq['a']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Areas Served Strip -->
        <?php if (!$city): ?>
        <div class="sdt-areas-panel">
            <div class="sdt-section-label sdt-label-light">
                <span class="sdt-label-dot"></span> Areas Covered
            </div>
            <h3 class="sdt-areas-title"><?php echo htmlspecialchars($service['name']); ?> across Western NC</h3>
            <div class="sdt-areas-pills">
                <?php foreach ($cities as $c_slug => $c_data): ?>
                <a href="<?php echo SITE_URL; ?>/services/<?php echo $service_slug; ?>/<?php echo $c_slug; ?>" class="sdt-area-pill">
                    <?php echo htmlspecialchars($c_data['name']); ?>
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

    </div>
</section>


<!-- CTA Strip -->
<?php include dirname(__DIR__) . '/includes/contact-strip.php'; ?>

<?php
include dirname(__DIR__) . '/includes/mobile-sticky-cta.php';
include dirname(__DIR__) . '/includes/footer.php';
?>
