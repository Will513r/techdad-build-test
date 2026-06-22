<?php
/**
 * Contact Page - Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/includes/config.php';
$services = require __DIR__ . '/data/services.php';
$cities = require __DIR__ . '/data/cities.php';

// Prepare metadata
$meta = [
    'title' => 'Get a Free Estimate | Summit Exterior Cleaning',
    'description' => 'Contact owner Mike Reyes for a free, fast estimate on siding washing, roof washing, and concrete cleaning in Asheville and surrounding NC areas.',
    'canonical' => '/contact',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Contact Us', 'url' => '/contact']
    ]
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Internal Hero -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/assets/images/general/general_1.webp');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">Fast, Free Estimate Inquiries</span>
        <h1 class="internal-hero-title">Contact Summit Exterior Cleaning</h1>
    </div>
</section>

<!-- Main Contact Form Page -->
<section class="contact-page-content section-padding">
    <div class="container contact-container">
        
        <!-- Left Side: Contact Details -->
        <div class="contact-info-block">
            <h2>Let\'s Discuss Your Cleaning Needs</h2>
            <p class="lead-text">Fill out our estimate form, and owner Mike Reyes will get back to you with pricing details. Have an urgent project? Give us a call directly!</p>
            
            <div class="contact-methods mt-5">
                <div class="c-method">
                    <span class="c-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg></span>
                    <div>
                        <strong>Call or Text Mike:</strong>
                        <a href="tel:<?php echo PHONE_TEL; ?>" class="c-link"><?php echo PHONE_DISPLAY; ?></a>
                        <span class="c-sub">Available Mon-Sat for quote calls.</span>
                    </div>
                </div>
                
                <div class="c-method">
                    <span class="c-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span>
                    <div>
                        <strong>Email Address:</strong>
                        <a href="mailto:<?php echo EMAIL_ADDRESS; ?>" class="c-link"><?php echo EMAIL_ADDRESS; ?></a>
                        <span class="c-sub">Send photos of your property for faster quotes.</span>
                    </div>
                </div>
                
                <div class="c-method">
                    <span class="c-icon"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg></span>
                    <div>
                        <strong>Hours of Operation:</strong>
                        <span class="c-val-text">Monday – Friday: <?php echo HOURS_MON_FRI; ?></span>
                        <span class="c-val-text">Saturday: <?php echo HOURS_SAT; ?></span>
                        <span class="c-val-text">Sunday: Closed</span>
                    </div>
                </div>
            </div>
            
            <div class="guarantee-box rounded-lg mt-4">
                <strong>Our Estimating Promise:</strong>
                <p>We respect your privacy and will never share your contact information. Quotes are always completely free and come with no obligation or pushy sales pitches.</p>
            </div>
        </div>
        
        <!-- Right Side: Contact Form -->
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
                        <textarea id="message" name="message" rows="5" class="form-control" placeholder="Please provide details about what you need washed (approximate siding type, roof pitch, concrete surface area, etc.) so we can give an accurate estimate."></textarea>
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

<?php 
include __DIR__ . '/includes/mobile-sticky-cta.php';
include __DIR__ . '/includes/footer.php'; 
?>
