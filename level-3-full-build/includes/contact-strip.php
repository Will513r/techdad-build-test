<?php
/**
 * Reusable contact CTA banner strip
 */
require_once __DIR__ . '/config.php';
?>
<section class="cta-strip-section">
    <div class="container cta-strip-container">
        <div class="cta-strip-content">
            <h2 class="cta-strip-title">Ready to Restore <br> Your Property's Shine?</h2>
            <p class="cta-strip-desc">Get a fast, free, no-obligation estimate from owner Mike Reyes. No sales pressure, just straight-talking local service.</p>
        </div>
        <div class="cta-strip-actions">
            <a href="tel:<?php echo PHONE_TEL; ?>" class="btn hero-call-btn">
                <span class="btn-text">Call Mike: <?php echo PHONE_DISPLAY; ?></span>
                <span class="btn-circle-arrow right-circle">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="chevron-icon"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </span>
                <span class="btn-circle-arrow left-circle">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="chevron-icon"><polyline points="9 18 15 12 9 6"></polyline></svg>
                </span>
            </a>
            <a href="#estimate-section" class="btn btn-outline-white btn-large">Request Estimate Online</a>
        </div>
    </div>
</section>
