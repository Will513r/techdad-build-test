<?php
/**
 * Homepage - Summit Exterior Cleaning LLC
 */

// Local PHP web server routing fallback for clean URLs
$script_name = $_SERVER['SCRIPT_NAME'];
$base_dir = dirname($script_name);
$base_dir = rtrim($base_dir, '/\\');
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_starts_with($request_path, $base_dir)) {
    $sub_path = substr($request_path, strlen($base_dir));
    $sub_path = trim($sub_path, '/');
    
    $routes = [
        'contact' => 'contact.php',
        'about'   => 'about.php',
        'reviews' => 'reviews.php',
        'areas'   => 'areas-we-serve.php'
    ];
    
    if (isset($routes[$sub_path])) {
        include __DIR__ . '/' . $routes[$sub_path];
        exit;
    }
}

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
    'faqs' => require __DIR__ . '/data/faqs.php'
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Preloader Container -->
<div id="preloader" class="preloader-container">
  <!-- Sequential sliding columns background -->
  <div class="preloader-bg">
    <div class="preloader-col"></div>
    <div class="preloader-col"></div>
    <div class="preloader-col"></div>
    <div class="preloader-col"></div>
    <div class="preloader-col"></div>
    <div class="preloader-col"></div>
  </div>
  
  <!-- Centered Logo Text -->
  <div id="preloader-text-wrap" class="preloader-text-wrapper">
    <div class="preloader-text">SUMMIT</div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const preloader = document.getElementById("preloader");
  const preloaderText = document.getElementById("preloader-text-wrap");
  if (!preloader || !preloaderText) return;

  // 1. Start the sweep exit animation after text fills (1.75s)
  setTimeout(() => {
    preloader.classList.add("exit");
    preloaderText.classList.add("exit");
  }, 1750);

  // 2. Remove the preloader from DOM after transition completes (3.35s)
  setTimeout(() => {
    preloader.remove();
  }, 3350);
});
</script>

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
<section class="about-intro-panel section-padding">
  
  <!-- Row 1: Left Label & Core Statement -->
  <div class="about-intro-grid">
    <aside class="about-intro-sidebar-cell">
      <div class="about-intro-label">
        <span class="about-intro-dot"></span>
        <span class="about-intro-label-text">ABOUT SUMMIT</span>
      </div>
    </aside>
    <main class="about-intro-main-cell">
      <h2 class="about-intro-paragraph">
        Straight-Talking Local Service You Can Count On. We treat every property like it's our own.
      </h2>
    </main>
  </div>
  
  <!-- Row 2: Columns (Truck Photo & Stats) -->
  <div class="about-intro-continuation-row">
    <div class="about-continuation-columns">
      
      <!-- Left Column: Image wrapper -->
      <div class="about-continuation-image-col">
        <div class="about-image-wrapper">
          <img src="<?php echo SITE_URL; ?>/assets/images/general/general_2.webp" alt="Summit Exterior Cleaning Truck & Equipment" class="about-img rounded-lg shadow-lg">
        </div>
      </div>
      
      <!-- Right Column: Stats List & Description -->
      <div class="about-continuation-content-col">
        <p class="about-continuation-desc">
          Owned and operated by <strong>Mike Reyes</strong>, Summit Exterior Cleaning LLC has spent nearly a decade serving Buncombe and Henderson counties. What sets us apart is our <strong>soft-wash method</strong>—dissolving algae and mold at the root without damaging siding or shingle warranties.
        </p>
        <div class="about-continuation-bottom-group">
          <!-- STATS SECTION -->
          <ul class="about-bullets-list">
            <li>
              <strong>500+ Properties Cleaned</strong>: Successfully washed residential homes, roofs, and concrete driveways across Buncombe and Henderson counties.
            </li>
            <li>
              <strong>Safe Low-Pressure (&lt;500 PSI)</strong>: Standard for siding and shingles, preventing vinyl cracking and preserving manufacturer roof warranties.
            </li>
            <li>
              <strong>Cleans 3x Longer</strong>: Our specialized algaecide treatment sanitizes surfaces and kills mold spores at the root, outlasting high-pressure power washing.
            </li>
          </ul>
          <a id="about-scroll-btn" href="#estimate-section" class="btn-secondary">
            Get a Free Estimate
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="btn-arrow" style="margin-left: 8px; vertical-align: middle; display: inline-block;"><polyline points="9 18 15 12 9 6"></polyline></svg>
          </a>
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
<?php include __DIR__ . '/includes/services-section.php'; ?>

<!-- Reviews Section -->
<section class="reviews-section" id="reviews-section">
    <div class="big-reviews-watermark" id="reviews-watermark">Reviews</div>
    <div class="container">
        <div class="reviews-section-header">
            <div class="reviews-badge">
                <span class="badge-dot"></span> What Asheville Homeowners Say
            </div>
        </div>

        <!-- Interactive Slideshow Testimonials Card -->
        <div class="testimonial-slider-container" id="testimonial-slider" style="cursor: none;">
            
            <!-- Custom magnetic cursor overlay -->
            <div class="testimonial-custom-cursor" id="testimonial-custom-cursor">
                <span>Next</span>
            </div>

            <!-- Floating index indicator (top right) -->
            <div class="testimonial-index-indicator">
                <span class="active-index-num" id="testimonial-active-index">01</span>
                <span class="sep">/</span>
                <span class="total-index-num" id="testimonial-total-index"><?php echo str_pad(count($reviews), 2, "0", STR_PAD_LEFT); ?></span>
            </div>

            <!-- Stacked avatar previews (top left) -->
            <div class="testimonial-stacked-avatars" id="testimonial-stacked-avatars">
                <?php foreach ($reviews as $i => $rev): ?>
                    <div class="tiny-avatar <?php echo $i === 0 ? 'active' : ''; ?>" data-index="<?php echo $i; ?>">
                        <?php echo strtoupper(substr($rev['author'], 0, 1)); ?>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Main content quote area -->
            <div class="testimonial-main-quote">
                <blockquote class="testimonial-quote-text" id="testimonial-quote">
                    <!-- Split words populated dynamically by JS -->
                </blockquote>
            </div>

            <!-- Author details at bottom -->
            <div class="testimonial-author-details">
                <div class="testimonial-author-row">
                    <!-- Active Avatar Circle -->
                    <div class="testimonial-active-avatar-wrapper">
                        <div class="avatar-border-ring"></div>
                        <div class="testimonial-active-avatar" id="testimonial-active-avatar">
                            <!-- Initials driven by JS -->
                        </div>
                    </div>

                    <!-- Author Info with reveal line -->
                    <div class="testimonial-author-info-wrapper">
                        <div class="testimonial-accent-line" id="testimonial-accent-line"></div>
                        <span class="testimonial-author-name" id="testimonial-author-name"></span>
                        <span class="testimonial-author-meta" id="testimonial-author-meta"></span>
                    </div>
                </div>
            </div>

            <!-- Progress bar -->
            <div class="testimonial-progress-bar">
                <div class="testimonial-progress-fill" id="testimonial-progress-fill"></div>
            </div>

            <!-- Click hint -->
            <div class="testimonial-click-hint">
                Click anywhere to next
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
                <span class="badge-dot" style="background:#22c55e;"></span>
                Get A Free Quote
            </div>
            <h2 class="estimate-title">Get a free estimate from Asheville's <em>most trusted exterior cleaners.</em></h2>

            <div class="estimate-trust-row">
                <div class="estimate-trust-badge">
                    <svg width="18" height="18" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/>
                        <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/>
                        <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/>
                        <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/>
                    </svg>
                    <span>4.9 Google Rating</span>
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

                <button type="submit" id="about-estimate-btn" class="btn-secondary">
                    Get a Free Estimate
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="btn-arrow" style="margin-left: 8px; vertical-align: middle; display: inline-block;"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </button>

                <div id="form-status" class="form-status-alert"></div>
            </form>

        </div>
    </div>
</section>

<!-- Service Areas Hub Grid -->

<section class="areas-section section-padding" id="areas-section">
    <div class="container">
        <div class="areas-split-container">
            <!-- Left Column: Header Info (Sticky on desktop) -->
            <div class="areas-split-left">
                <div class="services-badge">
                    <span class="badge-dot"></span> Where We Work
                </div>
                <h2 class="areas-split-heading">Areas We Serve Around Asheville</h2>
                <p class="areas-split-desc">We provide professional soft wash and pressure washing services within a 30-mile radius of Asheville, covering Buncombe and Henderson counties.</p>
                <div class="areas-split-action" style="margin-top: 30px; display: inline-block;">
                    <a href="tel:<?php echo PHONE_TEL; ?>" class="btn areas-call-btn">
                        <span class="btn-text">Call Mike: <?php echo PHONE_DISPLAY; ?></span>
                        <span class="btn-circle-arrow right-circle">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="chevron-icon"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </span>
                        <span class="btn-circle-arrow left-circle">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="var(--color-accent)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="chevron-icon"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </span>
                    </a>
                </div>
            </div>
            
            <!-- Right Column: Area Cards Grid -->
            <div class="areas-split-right">
                <div class="areas-grid">
                    <?php foreach ($cities as $slug => $city): ?>
                        <a href="<?php echo SITE_URL; ?>/services/house-soft-washing/<?php echo $slug; ?>" class="area-card rounded-lg shadow-sm">
                            <div class="area-card-content">
                                <h3><?php echo htmlspecialchars($city['name']); ?>, NC</h3>
                                <p class="area-zip">ZIP: <?php echo htmlspecialchars($city['zip']); ?> &bull; <?php echo htmlspecialchars($city['county']); ?></p>
                                <p class="area-note-preview"><?php echo htmlspecialchars(substr($city['local_note'], 0, 110)) . '...'; ?></p>
                            </div>
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
include __DIR__ . '/includes/mobile-sticky-cta.php';
include __DIR__ . '/includes/footer.php'; 
?>
