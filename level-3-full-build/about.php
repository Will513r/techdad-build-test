<?php
/**
 * About Us Page - Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/includes/config.php';
$services = require __DIR__ . '/data/services.php';

// Prepare metadata
$meta = [
    'title' => 'About Mike Reyes & Summit Exterior Cleaning',
    'description' => 'Learn how Mike Reyes built Summit Exterior Cleaning LLC over 9 years in Asheville, NC on honesty, safe soft washing, and plant-safe detergents.',
    'canonical' => '/about',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'About Us', 'url' => '/about']
    ]
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Internal Hero -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/assets/images/general/general_2.webp');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">Our Story & Methodology</span>
        <h1 class="internal-hero-title">About Summit Exterior Cleaning</h1>
    </div>
</section>

<!-- Main About Content -->
<section class="about-page-content section-padding">
    <div class="container page-grid-2col">
        <div class="main-content-text">
            <h2>Serving the Asheville Area Since 2017</h2>
            <p>Summit Exterior Cleaning LLC was founded by <strong>Mike Reyes</strong> with a simple mission: to provide Asheville-area homeowners with a cleaning service that is safe, effective, and completely transparent. Over the past 9 years, we have grown from a single-man operation into a trusted local contractor, completing hundreds of residential and commercial washes throughout Buncombe and Henderson counties.</p>
            
            <p>We know that your home is your largest investment. That is why we refuse to use the high-pressure blasting tactics that many discount cleaners employ. We have seen too many damaged roofs, cracked siding panels, and ruined landscaping caused by untrained operators using excessive PSI.</p>
            
            <h3>Our Core Values:</h3>
            <ul class="styled-list">
                <li><strong>No Sales Pressure:</strong> We tell you exactly what your property needs to look its best. We do not upsell services you do not require.</li>
                <li><strong>Expert Surface Assessment:</strong> Every surface is different. We assess whether your home needs soft washing (for siding and shingles) or high-flow pressure cleaning (for driveways and hardscapes).</li>
                <li><strong>Uncompromising Plant Protection:</strong> We treat your landscaping with respect. We pre-wet all grass and plants, use plant-safe biodegradable soaps, and post-rinse thoroughly.</li>
            </ul>

            <h2 class="mt-5">Why Choose the Soft Wash Method?</h2>
            <p>Traditional power washing relies on raw water velocity to blast dirt off siding. While this can remove surface grime, it has serious drawbacks: it forces water behind vinyl siding (leading to mold in the walls), cracks brittle materials, and leaves green algae roots alive in the pores, causing regrowth in just months.</p>
            <p>Our soft wash method uses biodegradable detergents that break down organic buildup and sanitize the surface. We then wash it away with low pressure (under 500 PSI). The results are spotless and last much longer because the mold spores are actually dead, not just blown around.</p>
        </div>

        <div class="sidebar-content">
            <div class="sidebar-card rounded-lg bg-light shadow-sm">
                <h3>Our Business Facts</h3>
                <table class="facts-table">
                    <tr>
                        <td><strong>Owner</strong></td>
                        <td><?php echo OWNER_NAME; ?></td>
                    </tr>
                    <tr>
                        <td><strong>Founded</strong></td>
                        <td><?php echo ESTABLISHED_YEAR; ?> (9 Years Active)</td>
                    </tr>
                    <tr>
                        <td><strong>HQ Location</strong></td>
                        <td><?php echo CITY_NAME; ?>, NC</td>
                    </tr>
                    <tr>
                        <td><strong>Service Radius</strong></td>
                        <td>30 Miles from Asheville</td>
                    </tr>
                    <tr>
                        <td><strong>Insurance</strong></td>
                        <td>Fully Insured ($2M Liability)</td>
                    </tr>
                    <tr>
                        <td><strong>Google Rating</strong></td>
                        <td><?php echo REVIEW_RATING; ?>/5.0 Stars (87 Reviews)</td>
                    </tr>
                </table>
            </div>

            <div class="sidebar-card rounded-lg bg-primary text-white shadow-sm mt-4">
                <h3>Our Cleaning Guarantee</h3>
                <p>We stand behind our work. If you notice any spots or missed areas after we complete your wash, call us within 48 hours and we will return to touch it up for free—no questions asked.</p>
                <a href="tel:<?php echo PHONE_TEL; ?>" class="btn btn-accent btn-block mt-3">Call Mike: <?php echo PHONE_DISPLAY; ?></a>
            </div>
        </div>
    </div>
</section>

<!-- CTA Strip -->
<?php include __DIR__ . '/includes/contact-strip.php'; ?>

<?php 
include __DIR__ . '/includes/mobile-sticky-cta.php';
include __DIR__ . '/includes/footer.php'; 
?>
