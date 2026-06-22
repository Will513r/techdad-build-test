<?php
/**
 * Reusable contact CTA banner strip
 */
require_once __DIR__ . '/config.php';
?>
<section class="cta-strip-section">
    <div class="container cta-strip-container">
        <div class="cta-strip-content">
            <h2 class="cta-strip-title">Ready to Restore Your Property's Shine?</h2>
            <p class="cta-strip-desc">Get a fast, free, no-obligation estimate from owner Mike Reyes. No sales pressure, just straight-talking local service.</p>
        </div>
        <div class="cta-strip-actions">
            <a href="tel:<?php echo PHONE_TEL; ?>" class="btn btn-accent btn-large btn-cta-phone">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right:10px; vertical-align:middle;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                Call (828) 555-0142
            </a>
            <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-outline-white btn-large">Request Estimate Online</a>
        </div>
    </div>
</section>
