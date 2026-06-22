<?php
/**
 * Custom 404 Page - Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/includes/config.php';

// Prepare metadata
$meta = [
    'title' => 'Page Not Found',
    'description' => 'The page you are looking for does not exist. Navigate back to Summit Exterior Cleaning homepage or contact us.',
    'canonical' => '/404',
    'noindex' => true
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>

<section class="error-section section-padding text-center">
    <div class="container">
        <h1 class="error-code">404</h1>
        <h2 class="error-title">Page Not Found</h2>
        <p class="error-desc max-w-xl mx-auto">We're sorry, but the page you are looking for could not be found. It may have been moved, deleted, or the URL might have been typed incorrectly.</p>
        
        <div class="error-actions mt-4">
            <a href="<?php echo SITE_URL; ?>/" class="btn btn-primary btn-large">Return to Homepage</a>
            <a href="<?php echo SITE_URL; ?>/services" class="btn btn-secondary btn-large">View Our Services</a>
            <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-outline btn-large">Contact Us</a>
        </div>
        
        <div class="error-help-card rounded-lg bg-light mt-5 max-w-xl mx-auto p-4 border">
            <h3>Need Immediate Help?</h3>
            <p>Give owner Mike Reyes a call directly at <strong><?php echo PHONE_DISPLAY; ?></strong> for immediate assistance, or email us at <a href="mailto:<?php echo EMAIL_ADDRESS; ?>"><?php echo EMAIL_ADDRESS; ?></a>.</p>
        </div>
    </div>
</section>

<?php 
include __DIR__ . '/includes/mobile-sticky-cta.php';
include __DIR__ . '/includes/footer.php'; 
?>
