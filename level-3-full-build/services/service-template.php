<?php
/**
 * Unified Service Template - Summit Exterior Cleaning LLC
 * Renders Service details OR Service-in-City local pages.
 */
require_once dirname(__DIR__) . '/includes/config.php';
$services = require dirname(__DIR__) . '/data/services.php';
$cities = require dirname(__DIR__) . '/data/cities.php';
$reviews = require dirname(__DIR__) . '/data/reviews.php';

// Fetch query params
$service_slug = $_GET['service'] ?? '';
$city_slug = $_GET['city'] ?? null;

// Validate service exists
if (!isset($services[$service_slug])) {
    // Graceful 404 fallback
    header("HTTP/1.1 404 Not Found");
    include dirname(__DIR__) . '/404.php';
    exit;
}

$service = $services[$service_slug];
$city = null;
$is_indexed = true;

// If city is requested, validate it exists
if ($city_slug !== null) {
    if (!isset($cities[$city_slug])) {
        header("HTTP/1.1 404 Not Found");
        include dirname(__DIR__) . '/404.php';
        exit;
    }
    $city = $cities[$city_slug];
    
    // Check if this service-in-city combo should be indexed
    $is_indexed = in_array($city_slug, $service['indexed_cities']);
}

// -------------------------------------------------------------------
// Prepare Metadata, Canonical, Breadcrumbs & Schemas
// -------------------------------------------------------------------

$meta = [];

if ($city) {
    // Service-in-City local page
    $meta['title'] = $service['name'] . ' ' . $city['name'] . ' NC | Summit Exterior Clean';
    $meta['description'] = 'Need ' . htmlspecialchars(strtolower($service['name'])) . ' in ' . htmlspecialchars($city['name']) . ', NC? Mike Reyes provides safe soft washing from ' . htmlspecialchars($service['pricing']) . '. Fully insured.';
    $meta['canonical'] = '/services/' . $service_slug . '/' . $city_slug;
    $meta['noindex'] = !$is_indexed; // If not in indexed list, set noindex
    
    $meta['breadcrumbs'] = [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Services', 'url' => '/services'],
        ['name' => $service['name'], 'url' => '/services/' . $service_slug],
        ['name' => $city['name'], 'url' => '/services/' . $service_slug . '/' . $city_slug]
    ];
} else {
    // Service Hub page
    $meta['title'] = $service['name'] . ' | Asheville NC | Summit Exterior Cleaning';
    $meta['description'] = htmlspecialchars($service['name']) . ' from ' . htmlspecialchars($service['pricing']) . '. Summit Exterior Cleaning provides safe soft-wash cleaning in Buncombe & Henderson counties.';
    $meta['canonical'] = '/services/' . $service_slug;
    $meta['noindex'] = false;
    
    $meta['breadcrumbs'] = [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Services', 'url' => '/services'],
        ['name' => $service['name'], 'url' => '/services/' . $service_slug]
    ];
}

// Service Schema Injection
$meta['service_schema'] = [
    'service' => $service,
    'city' => $city ? $city['name'] : null
];

// FAQs Injection
$page_faqs = [];
if ($service_slug === 'roof-soft-washing') {
    $page_faqs = [
        ['q' => 'Is soft washing safe for my shingles?', 'a' => 'Yes, low-pressure chemical treatment is the exact method asphalt shingle manufacturers actually recommend. We never use pressure washers on roofs.'],
        ['q' => 'Will soft washing remove all black streaks?', 'a' => 'Yes, the algaecide sanitizes the shingles and kills the dark Gloeocapsa Magma algae instantly, returning your roof to its original look.'],
        ['q' => 'How long does a roof cleaning last?', 'a' => 'Our roof treatments typically keep shingles clean and free of streaks for 3 to 5 years.']
    ];
} else if ($service_slug === 'house-soft-washing') {
    $page_faqs = [
        ['q' => 'Will soft washing damage my siding?', 'a' => 'No. Because we wash at low pressure (under 500 PSI), there is no risk of cracking vinyl, gouging wood, or forcing water behind panels.'],
        ['q' => 'Will soft washing damage my plants or lawn?', 'a' => 'No. We pre-wet all grass, shrubs, and flowers with clean water, use plant-safe dilutions, and thoroughly rinse the landscaping afterward.'],
        ['q' => 'Do you need to be home for the wash?', 'a' => 'No, as long as we have access to a working outdoor water spigot and any locked gates are opened.']
    ];
} else if ($service_slug === 'concrete-cleaning') {
    $page_faqs = [
        ['q' => 'Will concrete cleaning leave zebra stripes?', 'a' => 'No. We use professional flat-surface cleaners that maintain an even nozzle distance, ensuring a uniform, stripe-free finish.'],
        ['q' => 'Can you remove oil and rust stains?', 'a' => 'We pre-treat oil and rust with specialty commercial surfactants. While extremely old, deep stains may not release 100%, we significantly lighten and improve them.']
    ];
} else {
    $page_faqs = [
        ['q' => 'Do you provide free estimates?', 'a' => 'Yes, owner Mike Reyes provides fast, free estimate quotes for all services in Buncombe and Henderson counties.'],
        ['q' => 'Are you insured?', 'a' => 'Yes, Summit Exterior Cleaning is fully insured with a $2,000,000 general liability policy for your peace of mind.']
    ];
}
$meta['faqs'] = $page_faqs;

include dirname(__DIR__) . '/includes/head.php';
include dirname(__DIR__) . '/includes/header.php';

// Filter contextual reviews for this service (and location if set)
$featured_review = null;
if ($city) {
    // Try to find review matching service AND city
    foreach ($reviews as $rev) {
        if ($rev['service'] === $service_slug && $rev['location'] === $city_slug) {
            $featured_review = $rev;
            break;
        }
    }
}
// Fallback: match service only
if (!$featured_review) {
    foreach ($reviews as $rev) {
        if ($rev['service'] === $service_slug) {
            $featured_review = $rev;
            break;
        }
    }
}
// Second fallback: any review
if (!$featured_review && !empty($reviews)) {
    $featured_review = $reviews[0];
}

// Select display image
$display_img = $service['photos'][0];
if ($city && isset($city['photos'][0])) {
    // Blend image references: use a location shot for local page hero if available, else service shot
    $hero_img = $city['photos'][0];
} else {
    $hero_img = $display_img;
}
?>

<!-- Internal Hero Banner -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/<?php echo $hero_img; ?>');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">
            <?php echo $city ? htmlspecialchars($city['name']) . ', NC' : 'Professional Service'; ?>
        </span>
        <h1 class="internal-hero-title">
            <?php echo htmlspecialchars($service['name']) . ($city ? ' in ' . htmlspecialchars($city['name']) : ''); ?>
        </h1>
        <p class="internal-hero-price">Rates: <?php echo htmlspecialchars($service['pricing']); ?></p>
    </div>
</section>

<!-- Main Page Layout Grid -->
<section class="service-page-content section-padding">
    <div class="container page-grid-2col">
        
        <!-- Left Side: Main Copy content -->
        <main class="main-content-text">
            <h2><?php echo htmlspecialchars($service['headline']); ?></h2>
            
            <p><?php echo $service['description']; ?></p>
            
            <?php if ($city): ?>
                <!-- Local SEO Genuinely Local Copy Integration -->
                <div class="local-seo-content rounded-lg border bg-light p-4 my-4">
                    <h3>Siding & Exterior Cleaning in <?php echo htmlspecialchars($city['name']); ?></h3>
                    <p><?php echo htmlspecialchars($city['local_note']); ?></p>
                    <p>Whether you reside in one of <?php echo htmlspecialchars($city['name']); ?>'s historic districts like <strong><?php echo htmlspecialchars($city['neighborhoods'][0] ?? 'Downtown'); ?></strong> or a newer subdivision in <strong><?php echo htmlspecialchars($city['neighborhoods'][1] ?? $city['name']); ?></strong>, Mike Reyes and the team at Summit Exterior Cleaning have the exact detergent blends and soft wash equipment required to safely wash away organic stains and protect your curb appeal.</p>
                </div>
            <?php endif; ?>

            <div class="service-features-grid mt-4">
                <div class="feat-box">
                    <h3>Common Symptoms We Clean:</h3>
                    <ul class="bullet-list-symptoms">
                        <?php foreach ($service['symptoms'] as $symptom): ?>
                            <li><span class="cross-icon">&times;</span> <?php echo htmlspecialchars($symptom); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                
                <div class="feat-box">
                    <h3>Why Choose Summit for This Service:</h3>
                    <ul class="bullet-list-benefits">
                        <?php foreach ($service['benefits'] as $benefit): ?>
                            <li><span class="check-icon">&check;</span> <?php echo htmlspecialchars($benefit); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>

            <!-- Contextual Featured Review -->
            <?php if ($featured_review): ?>
                <div class="contextual-review-box rounded-lg mt-5 shadow-sm border p-4 bg-white">
                    <span class="review-stars">★★★★★</span>
                    <blockquote class="context-quote">
                        "<?php echo htmlspecialchars($featured_review['text']); ?>"
                    </blockquote>
                    <div class="review-details-author">
                        <strong><?php echo htmlspecialchars($featured_review['author']); ?></strong> 
                        <span> &bull; <?php echo htmlspecialchars($featured_review['location_name']); ?>, NC</span>
                    </div>
                </div>
            <?php endif; ?>

            <!-- Contextual localized FAQs -->
            <div class="faq-list-section mt-5">
                <h2>Frequently Asked Questions</h2>
                <div class="accordion-list">
                    <?php foreach ($page_faqs as $i => $faq): ?>
                        <div class="accordion-item rounded-lg border mb-3">
                            <button class="accordion-header" id="faq-heading-<?php echo $i; ?>">
                                <span><?php echo htmlspecialchars($faq['q']); ?></span>
                                <span class="accordion-icon">+</span>
                            </button>
                            <div class="accordion-body" id="faq-body-<?php echo $i; ?>">
                                <p><?php echo htmlspecialchars($faq['a']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Area list for Service Hub (to meet: lists areas service covers) -->
            <?php if (!$city): ?>
                <div class="service-hub-cities rounded-lg border bg-light p-4 mt-5">
                    <h3>Areas Serviced for <?php echo htmlspecialchars($service['name']); ?></h3>
                    <p>Summit Exterior Cleaning provides professional <?php echo htmlspecialchars(strtolower($service['name'])); ?> in Buncombe & Henderson counties, including:</p>
                    <ul class="service-cities-links-grid mt-3">
                        <?php foreach ($cities as $c_slug => $c_data): ?>
                            <li>
                                <a href="<?php echo SITE_URL; ?>/services/<?php echo $service_slug; ?>/<?php echo $c_slug; ?>" class="city-pill">
                                    <?php echo htmlspecialchars($c_data['name']); ?> &rarr;
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </main>
        
        <!-- Right Side: Sidebar Navigation/CTA & Cross-linking -->
        <aside class="sidebar-content">
            <!-- Call CTA Sidebar Widget -->
            <div class="sidebar-card rounded-lg bg-primary text-white shadow-sm p-4 text-center">
                <h3>Need an Estimate?</h3>
                <p class="mb-3">Speak directly with owner Mike Reyes for a free, fair quote on your <?php echo htmlspecialchars(strtolower($service['name'])); ?>.</p>
                <a href="tel:<?php echo PHONE_TEL; ?>" class="btn btn-accent btn-block btn-large">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:6px; vertical-align:middle;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    Call Mike: (828) 555-0142
                </a>
                <a href="<?php echo SITE_URL; ?>/contact?service=<?php echo $service_slug; ?>" class="btn btn-outline-white btn-block mt-2">Request Quote Online</a>
            </div>

            <!-- Photo Gallery Widget -->
            <div class="sidebar-card rounded-lg bg-white border shadow-sm p-4 mt-4">
                <h3>Project Gallery</h3>
                <div class="sidebar-gallery-grid">
                    <?php 
                    // Show some photos from this service
                    foreach (array_slice($service['photos'], 0, 4) as $photo):
                    ?>
                        <img src="<?php echo SITE_URL; ?>/<?php echo $photo; ?>" alt="<?php echo htmlspecialchars($service['name']); ?> project photo" class="rounded shadow-sm">
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Dynamic Near-by Areas linking widget -->
            <div class="mt-4">
                <?php 
                $current_service_slug = $service_slug;
                $current_city_slug = $city_slug;
                include dirname(__DIR__) . '/includes/nearby-areas.php'; 
                ?>
            </div>
        </aside>
        
    </div>
</section>

<!-- CTA Strip banner -->
<?php include dirname(__DIR__) . '/includes/contact-strip.php'; ?>

<?php 
include dirname(__DIR__) . '/includes/mobile-sticky-cta.php';
include dirname(__DIR__) . '/includes/footer.php'; 
?>
