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
            <h2>Straight-Talking Local Service You Can Count On</h2>
            <p class="about-p">Owned and operated by <strong>Mike Reyes</strong>, Summit Exterior Cleaning LLC has spent nearly a decade serving Buncombe and Henderson counties. We built our business on a simple idea: do the job right, charge a fair price, and treat every property like it\'s our own.</p>
            <p class="about-p">What sets us apart is our <strong>soft-wash method</strong>. Many power washers rely on high pressure to blast mold off surfaces, which often cracks vinyl siding, damages roofing shingle warranties, and breaks mortar joints. We use custom-blended, plant-safe detergents to dissolve algae and mold at the root, then rinse at low pressure. It\'s safer for your home, plant-safe, and keeps surfaces clean 2-3x longer.</p>
            
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

<!-- Primary Lead Service Callout (House Soft Washing) -->
<section class="primary-service-callout section-padding bg-light">
    <div class="container">
        <div class="text-center section-header">
            <span class="section-subtitle">Our Featured Service</span>
            <h2>House Soft Washing</h2>
            <p class="section-lead-desc">The safe, effective way to clean your home\'s exterior without high pressure.</p>
        </div>
        
        <div class="house-wash-grid">
            <div class="house-wash-text">
                <h3>Why Soft Washing Beats Traditional Power Washing</h3>
                <p>Traditional pressure washing uses high velocity to scrub dirt off, which can force water behind siding panels, causing trapped moisture and wood rot. It can also crack vinyl siding and strip paint.</p>
                <p>Our soft wash method uses biodegradable detergents that break down organic buildup and sanitize the surface. We then wash it away with low pressure (under 500 PSI). The results are spotless and last much longer because the mold spores are actually dead, not just blown around.</p>
                
                <h4 class="mt-4">Our Siding Cleaning Details:</h4>
                <ul class="check-list">
                    <li><strong>Pricing:</strong> $0.15 to $0.30 per square foot</li>
                    <li><strong>Safely cleans:</strong> Vinyl siding, brick, stucco, stone, cedar shake, and HardiePlank.</li>
                    <li><strong>Lifts:</strong> Green algae, black mold, dark soot, spiderwebs, and thick pollen.</li>
                </ul>
                <div class="mt-4">
                    <a href="<?php echo SITE_URL; ?>/services/house-soft-washing" class="btn btn-primary">Learn More About House Washing</a>
                </div>
            </div>
            
            <!-- Gallery / Photo grid for House Soft Washing -->
            <div class="house-wash-photos">
                <div class="photo-main">
                    <img src="<?php echo SITE_URL; ?>/assets/images/services/House_Soft_Washing/House_Soft_Washing_1.webp" alt="House Soft Washing Before/After" class="rounded-lg shadow-md">
                    <span class="photo-badge">House Soft Washing</span>
                </div>
                <div class="photo-sub-grid">
                    <img src="<?php echo SITE_URL; ?>/assets/images/services/House_Soft_Washing/House_Soft_Washing_2.webp" alt="Vinyl Siding Soft Wash" class="rounded-lg shadow-sm">
                    <img src="<?php echo SITE_URL; ?>/assets/images/services/House_Soft_Washing/House_Soft_Washing_3.webp" alt="Eaves Soft Washing" class="rounded-lg shadow-sm">
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

<!-- Services Grid Section -->
<section class="services-section section-padding bg-light">
    <div class="container">
        <div class="text-center section-header">
            <span class="section-subtitle">Our Professional Services</span>
            <h2>Exterior Cleaning for All Surfaces</h2>
            <p class="section-desc max-w-2xl mx-auto">We provide clean, streak-free results for siding, concrete, roofs, and gutters. Select a service to read about our methods and rates.</p>
        </div>
        
        <div class="services-grid">
            <?php 
            foreach ($services as $slug => $svc): 
                $is_lead = ($slug === 'house-soft-washing');
            ?>
                <div class="service-card <?php echo $is_lead ? 'service-card-featured' : ''; ?> rounded-lg shadow-sm">
                    <?php if ($is_lead): ?>
                        <div class="card-featured-badge">Primary Service</div>
                    <?php endif; ?>
                    <div class="card-img-wrapper">
                        <img src="<?php echo SITE_URL; ?>/<?php echo $svc['photos'][0]; ?>" alt="<?php echo htmlspecialchars($svc['name']); ?>" class="card-img">
                    </div>
                    <div class="card-content">
                        <h3><?php echo htmlspecialchars($svc['name']); ?></h3>
                        <p class="card-price">Rate: <?php echo htmlspecialchars($svc['pricing']); ?></p>
                        <p class="card-text"><?php echo htmlspecialchars($svc['short_desc']); ?></p>
                        <ul class="card-bullets">
                            <?php foreach (array_slice($svc['benefits'], 0, 3) as $bullet): ?>
                                <li>&bull; <?php echo htmlspecialchars($bullet); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <div class="card-action">
                            <a href="<?php echo SITE_URL; ?>/services/<?php echo $slug; ?>" class="btn <?php echo $is_lead ? 'btn-primary' : 'btn-secondary'; ?> btn-block">Read Service Details</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Reviews Section -->
<section class="reviews-section section-padding">
    <div class="container">
        <div class="text-center section-header">
            <span class="section-subtitle">Customer Feedback</span>
            <h2>What Asheville Homeowners Say</h2>
            <div class="rating-header">
                <span class="rating-stars">★★★★★</span>
                <span class="rating-txt"><strong>4.9 out of 5 stars</strong> based on 87 Google Reviews</span>
            </div>
        </div>
        
        <div class="reviews-grid">
            <?php foreach ($reviews as $rev): ?>
                <div class="review-card rounded-lg shadow-sm">
                    <div class="review-header">
                        <div>
                            <span class="review-author"><?php echo htmlspecialchars($rev['author']); ?></span>
                            <span class="review-location"> &bull; <?php echo htmlspecialchars($rev['location_name']); ?>, NC</span>
                        </div>
                        <span class="review-stars">★★★★★</span>
                    </div>
                    <p class="review-text">"<?php echo htmlspecialchars($rev['text']); ?>"</p>
                    <span class="review-tag"><?php echo htmlspecialchars($services[$rev['service']]['name'] ?? 'Exterior Cleaning'); ?></span>
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
