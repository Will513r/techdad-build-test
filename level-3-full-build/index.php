<?php
/**
 * Homepage - Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/includes/config.php';
$services = require __DIR__ . '/data/services.php';
$cities = require __DIR__ . '/data/cities.php';
$reviews = require __DIR__ . '/data/reviews.php';
$projects = require __DIR__ . '/data/projects.php';

// Prepare metadata
$meta = [
    'title' => 'Pressure Washing Asheville NC | Summit Exterior Cleaning',
    'description' => 'Summit Exterior Cleaning LLC provides safe, low-pressure soft washing and pressure washing in Asheville, NC and Buncombe County. Call for a free estimate!',
    'canonical' => '/',
    'faqs' => [
        ['q' => 'Will soft washing damage my plants?', 'a' => 'No — we pre-wet landscaping and use plant-safe dilutions.'],
        ['q' => 'How long does a house wash last?', 'a' => 'Typically 2-3 years before regrowth in our climate.'],
        ['q' => 'Do you need to be home?', 'a' => 'No, as long as we have water access and any gate codes.']
    ]
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.8), rgba(12, 31, 45, 0.85)), url('<?php echo SITE_URL; ?>/assets/images/general/general_1.webp');">
    <div class="container hero-container">
        <div class="hero-content">
            <span class="hero-tagline">An independent, Reliable, Affordable and <br><span class="hero-tagline-sub">eco-friendly cleaning solution</span></span>
            <h1 class="hero-title">Elevate your <br> space with expert cleaning.</h1>
            <p class="hero-desc">We use safe, low-pressure soft washing and detergent-driven cleaning to keep Asheville homes and businesses looking pristine. Protect your siding and shingles from damage with results that last 2-3x longer than power washing.</p>
            <div class="hero-actions">
                <a href="tel:<?php echo PHONE_TEL; ?>" class="btn hero-call-btn">
                    <span class="btn-text">Call Mike: (828) 555-0142</span>
                    <span class="btn-circle-arrow right-circle">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="chevron-icon"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </span>
                    <span class="btn-circle-arrow left-circle">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="chevron-icon"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </span>
                </a>
                <a href="#estimate-section" class="btn btn-outline-white btn-large">Get Free Estimate</a>
            </div>
        </div>
    </div>
</section>

<!-- Trust Strip Section -->
<section class="trust-strip">
    <div class="container trust-strip-grid">
        <div class="trust-item">
            <span class="trust-val">9+ Years</span>
            <span class="trust-lbl">Local Service in NC</span>
        </div>
        <div class="trust-item">
            <span class="trust-val">4.9 ★★★★★</span>
            <span class="trust-lbl">87+ Google Reviews</span>
        </div>
        <div class="trust-item">
            <span class="trust-val">100% Insured</span>
            <span class="trust-lbl">Certified & Safe Methods</span>
        </div>
        <div class="trust-item">
            <span class="trust-val">Free Estimates</span>
            <span class="trust-lbl">No Upsell Pressure</span>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section section-padding">
    <div class="container about-grid">
        <div class="about-image-wrapper">
            <img src="<?php echo SITE_URL; ?>/assets/images/general/general_2.webp" alt="Summit Exterior Cleaning Truck & Equipment" class="about-img rounded-lg shadow-lg">
            <div class="experience-badge">
                <span class="exp-num">9</span>
                <span class="exp-text">Years of Excellence</span>
            </div>
        </div>
        <div class="about-text-content">
            <span class="section-subtitle">About Summit Exterior Cleaning</span>
            <h2>Straight-Talking Local <br> Service You Can Count On</h2>
            <p class="about-p">Owned and operated by <strong>Mike Reyes</strong>, Summit Exterior Cleaning LLC has spent nearly a decade serving Buncombe and Henderson counties. We built our business on a simple idea: do the job right, charge a fair price, and treat every property like it\'s our own.</p>
            <p class="about-p">What sets us apart is our <strong>soft-wash method</strong>. Many power washers rely on high pressure to blast mold off surfaces, which often cracks vinyl siding, damages roofing shingle warranties, and breaks mortar joints. We use custom-blended, plant-safe detergents to dissolve algae and mold at the root, then rinse at low pressure.</p>
            
            <div class="about-highlights">
                <div class="highlight-item">
                    <span class="highlight-icon">&check;</span>
                    <div>
                        <strong>Low Pressure, Safe Results</strong>
                        <p>We adjust detergents and water pressure to fit vinyl, stucco, concrete, or roofing shingles.</p>
                    </div>
                </div>
                <div class="highlight-item">
                    <span class="highlight-icon">&check;</span>
                    <div>
                        <strong>Eco-Friendly & Plant-Safe</strong>
                        <p>We pre-wet landscaping and use diluted cleaners to protect your grass, plants, and shrubs.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Interactive Signature Element: Before/After Slider -->
<section class="slider-section section-padding">
    <div class="container text-center">
        <span class="section-subtitle">Interactive Demonstration</span>
        <h2>See the Power of Our Soft Wash Method</h2>
        <p class="slider-intro-desc text-center">Drag the slider handle to see the dramatic difference between dirty, algae-covered siding and our final low-pressure clean.</p>
        
        <div class="ba-slider-container rounded-lg shadow-lg">
            <!-- Before Image (Dirty) -->
            <div class="ba-image ba-before-image">
                <img src="<?php echo SITE_URL; ?>/assets/images/services/House_Soft_Washing/House_Soft_Washing_4.webp" alt="Siding Before Soft Wash">
                <span class="ba-label ba-label-before">Before Cleaning</span>
            </div>
            <!-- After Image (Clean) -->
            <div class="ba-image ba-after-image">
                <!-- We apply a CSS filter overlay to make the before image look dirty/moldy, and use another clean photo for the after, or overlay them -->
                <img src="<?php echo SITE_URL; ?>/assets/images/services/House_Soft_Washing/House_Soft_Washing_5.webp" alt="Siding After Soft Wash">
                <span class="ba-label ba-label-after">After Soft Washing</span>
            </div>
            <!-- Slider Handle -->
            <div class="ba-slider-handle">
                <div class="ba-handle-arrows">
                    <span>&#8592;</span><span>&#8594;</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Services Tab Section -->
<section class="services-section section-padding bg-light">
    <div class="container">
        <!-- Section Header styled like attached mockup (Grid-aligned) -->
        <div class="services-header-grid">
            <div class="services-header-left-col">
                <div class="services-badge">
                    <span class="badge-dot"></span> Services
                </div>
            </div>
            <div class="services-header-right-col">
                <h2 class="services-heading">Elevated cleaning services for <br> your homes & businesses.</h2>
                <a href="<?php echo SITE_URL; ?>/services" class="btn explore-btn">
                    EXPLORE SERVICES <span class="explore-star">&#10022;</span>
                </a>
            </div>
        </div>
        
        <!-- Tab Split Layout -->
        <div class="services-split-layout">
            <!-- Left Tab Navigation Menu -->
            <div class="services-tabs-card">
                <?php 
                $index = 0;
                foreach ($services as $slug => $svc): 
                    $is_active = ($index === 0);
                ?>
                    <div class="service-tab-item <?php echo $is_active ? 'active' : ''; ?>" data-service="<?php echo $slug; ?>">
                        <span class="tab-number"><?php echo $index + 1; ?>/</span>
                        <span class="tab-name"><?php echo htmlspecialchars($svc['name']); ?></span>
                        <span class="tab-arrow">&rarr;</span>
                    </div>
                <?php 
                    $index++;
                endforeach; 
                ?>
            </div>
            
            <!-- Right Detail Cards Container -->
            <div class="services-details-container">
                <?php 
                $index = 0;
                foreach ($services as $slug => $svc): 
                    $is_active = ($index === 0);
                    
                    // Curated pill tags for each service based on actual data
                    $tags = [];
                    if ($slug === 'house-soft-washing') {
                        $tags = ['Vinyl Siding', 'HardiePlank', 'Eco Soaps', 'Low Pressure', 'Plant Safe'];
                    } elseif ($slug === 'roof-soft-washing') {
                        $tags = ['Shingle Cleaning', 'ARMA Approved', 'No-Pressure', 'Warranty Compliant', 'Eco Safe'];
                    } elseif ($slug === 'concrete-cleaning') {
                        $tags = ['Driveways', 'Sidewalks', 'Patios', 'Stripe-Free Cleaner', 'Weed Prevention'];
                    } elseif ($slug === 'gutter-brightening') {
                        $tags = ['Hand Detailed', 'Tiger Stripes', 'Oxidation Removal', 'Trough Clearing'];
                    }
                ?>
                    <div class="service-detail-card" id="service-<?php echo $slug; ?>" data-service="<?php echo $slug; ?>">
                        <div class="detail-card-left">
                            <h3 class="detail-title"><?php echo htmlspecialchars($svc['name']); ?></h3>
                            <p class="detail-desc"><?php echo htmlspecialchars($svc['short_desc']); ?></p>
                            
                            <div class="detail-price-box">
                                <span class="price-label">Starting Price</span>
                                <span class="price-value"><?php echo htmlspecialchars($svc['pricing']); ?></span>
                            </div>
                            
                            <div class="detail-tags">
                                <?php foreach ($tags as $tag): ?>
                                    <span class="detail-tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="detail-card-right">
                            <div class="detail-img-wrapper">
                                <img src="<?php echo SITE_URL; ?>/<?php echo $svc['photos'][0]; ?>" alt="<?php echo htmlspecialchars($svc['name']); ?>" class="detail-img">
                            </div>
                        </div>
                    </div>
                <?php 
                    $index++;
                endforeach; 
                ?>
            </div>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="reviews-section">
    <div class="big-reviews-watermark">Reviews</div>
    <div class="container">
        <div class="reviews-section-header">
            <div class="reviews-badge">
                <span class="badge-dot"></span> What Asheville Homeowners Say
            </div>
        </div>

        <!-- Staggered 3-card layout -->
        <div class="reviews-stagger-grid">

            <!-- Left card (white, sits lower) -->
            <div class="review-card review-card--side review-card--left">
                <span class="review-card-service"><?php echo htmlspecialchars($services[$reviews[0]['service']]['name'] ?? 'Exterior Cleaning'); ?></span>
                <p class="review-text">"<?php echo htmlspecialchars($reviews[0]['text']); ?>"</p>
                <div class="review-card-footer">
                    <div class="review-avatar"><?php echo strtoupper(substr($reviews[0]['author'], 0, 1)); ?></div>
                    <div class="review-author-info">
                        <span class="review-author"><?php echo htmlspecialchars($reviews[0]['author']); ?></span>
                        <span class="review-location"><?php echo strtoupper(htmlspecialchars($reviews[0]['location_name'])); ?>, NC</span>
                    </div>
                    <span class="review-verified-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                </div>
            </div>

            <!-- Center column: two stacked dark cards (no photo) -->
            <div class="reviews-center-col">

                <!-- Top center card: review[3] -->
                <div class="review-card review-card--featured">
                    <div class="review-card-featured-body">
                        <span class="review-card-service"><?php echo htmlspecialchars($services[$reviews[3]['service']]['name'] ?? 'Exterior Cleaning'); ?></span>
                        <p class="review-text">"<?php echo htmlspecialchars($reviews[3]['text']); ?>"</p>
                        <div class="review-card-footer">
                            <div class="review-avatar review-avatar--dark"><?php echo strtoupper(substr($reviews[3]['author'], 0, 1)); ?></div>
                            <div class="review-author-info">
                                <span class="review-author"><?php echo htmlspecialchars($reviews[3]['author']); ?></span>
                                <span class="review-location"><?php echo strtoupper(htmlspecialchars($reviews[3]['location_name'])); ?>, NC</span>
                            </div>
                            <span class="review-verified-badge review-verified-badge--accent">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Bottom center card: review[1] -->
                <div class="review-card review-card--featured">
                    <div class="review-card-featured-body">
                        <span class="review-card-service"><?php echo htmlspecialchars($services[$reviews[1]['service']]['name'] ?? 'Exterior Cleaning'); ?></span>
                        <p class="review-text">"<?php echo htmlspecialchars($reviews[1]['text']); ?>"</p>
                        <div class="review-card-footer">
                            <div class="review-avatar review-avatar--dark"><?php echo strtoupper(substr($reviews[1]['author'], 0, 1)); ?></div>
                            <div class="review-author-info">
                                <span class="review-author"><?php echo htmlspecialchars($reviews[1]['author']); ?></span>
                                <span class="review-location"><?php echo strtoupper(htmlspecialchars($reviews[1]['location_name'])); ?>, NC</span>
                            </div>
                            <span class="review-verified-badge review-verified-badge--accent">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            </span>
                        </div>
                    </div>
                </div>

            </div>


            <!-- Right card (white, sits lower) -->
            <div class="review-card review-card--side review-card--right">
                <span class="review-card-service"><?php echo htmlspecialchars($services[$reviews[2]['service']]['name'] ?? 'Exterior Cleaning'); ?></span>
                <p class="review-text">"<?php echo htmlspecialchars($reviews[2]['text']); ?>"</p>
                <div class="review-card-footer">
                    <div class="review-avatar"><?php echo strtoupper(substr($reviews[2]['author'], 0, 1)); ?></div>
                    <div class="review-author-info">
                        <span class="review-author"><?php echo htmlspecialchars($reviews[2]['author']); ?></span>
                        <span class="review-location"><?php echo strtoupper(htmlspecialchars($reviews[2]['location_name'])); ?>, NC</span>
                    </div>
                    <span class="review-verified-badge">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- CTA Banner -->
<?php include __DIR__ . '/includes/contact-strip.php'; ?>

<!-- Contact Form Section — Full Bleed Photo + Glass Panel -->
<section id="estimate-section" class="estimate-fullbleed">

    <!-- Background photo layer -->
    <div class="estimate-bg" style="background-image: url('<?php echo SITE_URL; ?>/assets/images/general/general_1.webp');"></div>
    <div class="estimate-overlay"></div>

    <!-- Content wrapper -->
    <div class="estimate-inner">

        <!-- Left: headline -->
        <div class="estimate-headline">
            <div class="estimate-pill">
                <span class="badge-dot" style="background:#ef4444;"></span>
                Get A Free Quote
            </div>
            <h2 class="estimate-title">Get a free estimate from Asheville's <em>most trusted exterior cleaners.</em></h2>

            <div class="estimate-trust-row">
                <div class="estimate-trust-badge">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    <span>5-Star Google Rating</span>
                </div>
                <div class="estimate-trust-badge">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg>
                    <span>Fully Insured</span>
                </div>
            </div>
        </div>

        <!-- Right: glass form panel -->
        <div class="estimate-panel">

            <form id="leadForm" action="<?php echo SITE_URL; ?>/api/submit-lead.php" method="POST">

                <p class="estimate-field-group-label">CONTACT DETAILS</p>
                <div class="estimate-form-row">
                    <input type="text" id="name" name="name" required class="estimate-input" placeholder="Your Name">
                    <input type="tel" id="phone" name="phone" required class="estimate-input" placeholder="Phone Number">
                </div>
                <div class="estimate-form-row">
                    <input type="email" id="email" name="email" required class="estimate-input" placeholder="Email Address">
                    <input type="text" id="address" name="address" class="estimate-input" placeholder="Property Address (optional)">
                </div>

                <p class="estimate-field-group-label">SERVICE DETAILS</p>
                <div class="estimate-form-row">
                    <select id="service" name="service" required class="estimate-input">
                        <option value="">Service Type</option>
                        <?php foreach ($services as $slug => $svc): ?>
                            <option value="<?php echo $slug; ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                    <select id="city" name="city" required class="estimate-input">
                        <option value="">Your City</option>
                        <?php foreach ($cities as $slug => $city): ?>
                            <option value="<?php echo $slug; ?>"><?php echo htmlspecialchars($city['name']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <p class="estimate-field-group-label">NOTES</p>
                <textarea id="message" name="message" rows="3" class="estimate-input estimate-textarea" placeholder="Optional – describe what needs cleaning"></textarea>

                <p class="estimate-disclaimer">We confirm every request by phone or text. No hidden fees — ever.</p>

                <button type="submit" class="estimate-submit-btn">
                    Submit Estimate Request <span>&#10132;</span>
                </button>

                <div id="form-status" class="form-status-alert"></div>
            </form>

        </div>
    </div>
</section>

<!-- Service Areas Hub Grid -->

<section class="areas-section section-padding">
    <div class="container">
        <div class="text-center section-header">
            <span class="section-subtitle">Where We Work</span>
            <h2>Areas We Serve Around Asheville</h2>
            <p class="section-desc max-w-2xl mx-auto">We provide professional soft wash and pressure washing services within a 30-mile radius of Asheville, covering Buncombe and Henderson counties.</p>
        </div>
        
        <div class="areas-grid">
            <?php foreach ($cities as $slug => $city): ?>
                <a href="<?php echo SITE_URL; ?>/services/house-soft-washing/<?php echo $slug; ?>" class="area-card rounded-lg shadow-sm">
                    <div class="area-card-content">
                        <h3><?php echo htmlspecialchars($city['name']); ?>, NC</h3>
                        <p class="area-zip">ZIP: <?php echo htmlspecialchars($city['zip']); ?> &bull; <?php echo htmlspecialchars($city['county']); ?></p>
                        <p class="area-note-preview"><?php echo htmlspecialchars(substr($city['local_note'], 0, 110)) . '...'; ?></p>
                        <span class="area-link-btn">View Local Siding Wash Services &rarr;</span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php 
include __DIR__ . '/includes/mobile-sticky-cta.php';
include __DIR__ . '/includes/footer.php'; 
?>
