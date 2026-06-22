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
<section class="reviews-section section-padding">
    <div class="big-reviews-watermark">Reviews</div>
    <div class="container">
        <div class="text-center section-header">
            <div class="reviews-badge">
                <span class="badge-dot"></span> What Asheville Homeowners Say
            </div>
            <h2>Customer Feedback</h2>
            <div class="rating-header">
                <span class="rating-stars">★★★★★</span>
                <span class="rating-txt"><strong>4.9 out of 5 stars</strong> based on 87 Google Reviews</span>
            </div>
        </div>
        
        <div class="reviews-grid">
            <?php foreach ($reviews as $rev): ?>
                <div class="review-card">
                    <div class="review-top-meta">
                        <div class="review-avatar">
                            <?php echo strtoupper(substr($rev['author'], 0, 1)); ?>
                        </div>
                        <div class="review-author-info">
                            <span class="review-author"><?php echo htmlspecialchars($rev['author']); ?></span>
                            <span class="review-location"><?php echo htmlspecialchars($rev['location_name']); ?>, NC</span>
                        </div>
                        <div class="review-stars-wrapper">
                            <span class="review-stars">★★★★★</span>
                        </div>
                    </div>
                    <p class="review-text">"<?php echo htmlspecialchars($rev['text']); ?>"</p>
                    <div class="review-footer">
                        <span class="review-tag"><?php echo htmlspecialchars($services[$rev['service']]['name'] ?? 'Exterior Cleaning'); ?></span>
                        <span class="review-verified-badge">
                            <svg class="verified-icon" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" style="vertical-align: middle; margin-right: 3px;"><polyline points="20 6 9 17 4 12"></polyline></svg>
                            Verified
                        </span>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Banner -->
<?php include __DIR__ . '/includes/contact-strip.php'; ?>

<!-- Contact Form Section -->
<section id="estimate-section" class="contact-section section-padding bg-light">
    <div class="container contact-container">
        <div class="contact-info-block">
            <span class="section-subtitle">Get A Free Quote</span>
            <h2>Get Your Instant Estimate Inquiry</h2>
            <p>Ready to wash away years of algae, mildew, and dirt? Fill out our form below, and owner Mike Reyes will get back to you with a free, no-obligation pricing estimate.</p>
            
            <div class="contact-methods">
                <div class="c-method">
                    <span class="c-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></span>
                    <div>
                        <strong>Call Mike directly:</strong>
                        <a href="tel:<?php echo PHONE_TEL; ?>" class="c-link"><?php echo PHONE_DISPLAY; ?></a>
                    </div>
                </div>
                <div class="c-method">
                    <span class="c-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                    <div>
                        <strong>Email us:</strong>
                        <a href="mailto:<?php echo EMAIL_ADDRESS; ?>" class="c-link"><?php echo EMAIL_ADDRESS; ?></a>
                    </div>
                </div>
            </div>
            
            <div class="guarantee-box rounded-lg">
                <strong>Our Promise:</strong>
                <p>No high-pressure sales calls, no spam. Just a straight-talking assessment of your property\'s cleaning needs.</p>
            </div>
        </div>
        
        <div class="contact-form-block rounded-lg shadow-md bg-white">
            <form id="leadForm" action="<?php echo SITE_URL; ?>/api/submit-lead.php" method="POST">
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Your Name <span class="required">*</span></label>
                        <input type="text" id="name" name="name" required class="form-control" placeholder="John Doe">
                        <span class="error-msg" id="name-error"></span>
                    </div>
                </div>
                <div class="form-row flex-row">
                    <div class="form-group flex-1">
                        <label for="phone">Phone Number <span class="required">*</span></label>
                        <input type="tel" id="phone" name="phone" required class="form-control" placeholder="(828) 555-0142">
                        <span class="error-msg" id="phone-error"></span>
                    </div>
                    <div class="form-group flex-1">
                        <label for="email">Email Address <span class="required">*</span></label>
                        <input type="email" id="email" name="email" required class="form-control" placeholder="john@example.com">
                        <span class="error-msg" id="email-error"></span>
                    </div>
                </div>
                <div class="form-row flex-row">
                    <div class="form-group flex-1">
                        <label for="service">Service Needed <span class="required">*</span></label>
                        <select id="service" name="service" required class="form-control">
                            <option value="">-- Select Service --</option>
                            <?php foreach ($services as $slug => $svc): ?>
                                <option value="<?php echo $slug; ?>"><?php echo htmlspecialchars($svc['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="error-msg" id="service-error"></span>
                    </div>
                    <div class="form-group flex-1">
                        <label for="city">Your City <span class="required">*</span></label>
                        <select id="city" name="city" required class="form-control">
                            <option value="">-- Select City --</option>
                            <?php foreach ($cities as $slug => $city): ?>
                                <option value="<?php echo $slug; ?>"><?php echo htmlspecialchars($city['name']); ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="error-msg" id="city-error"></span>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="message">Message / Details</label>
                        <textarea id="message" name="message" rows="4" class="form-control" placeholder="Please describe what you need cleaned (approx. square footage, siding type, etc.)"></textarea>
                    </div>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-primary btn-block btn-large">Send Quote Request &rarr;</button>
                </div>
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
