<?php
/**
 * Reviews Page - Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/includes/config.php';
$services = require __DIR__ . '/data/services.php';
$reviews = require __DIR__ . '/data/reviews.php';

// Prepare metadata
$meta = [
    'title' => 'Read Customer Reviews | Summit Exterior Cleaning',
    'description' => 'Read reviews and testimonials from homeowners in Asheville, Hendersonville, and Black Mountain who trusted Mike Reyes for soft wash services.',
    'canonical' => '/reviews',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Reviews', 'url' => '/reviews']
    ]
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Internal Hero -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/assets/images/general/general_1.webp');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">What Our Clients Say</span>
        <h1 class="internal-hero-title">Summit Exterior Cleaning Reviews</h1>
    </div>
</section>

<!-- Reviews Detail Content -->
<section class="reviews-page-content section-padding">
    <div class="container">
        
        <!-- Score Card Header -->
        <div class="reviews-summary-card rounded-lg bg-light shadow-sm text-center">
            <div class="summary-score-block">
                <span class="big-score"><?php echo REVIEW_RATING; ?></span>
                <div class="stars-block">
                    <span class="stars-gold">★★★★★</span>
                    <span class="rating-sub-count">Based on <?php echo REVIEW_COUNT; ?> Google reviews</span>
                </div>
            </div>
            <div class="summary-details-block">
                <p class="summary-p">We are committed to delivering five-star exterior cleaning. We maintain an outstanding <strong>4.9-star rating</strong> because we use safe, low-pressure soft washing techniques, show up on time, and communicate clearly.</p>
                <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-primary mt-2">Get Your Free Estimate</a>
            </div>
        </div>
        
        <!-- Reviews Grid -->
        <div class="reviews-detailed-list mt-5">
            <div class="reviews-grid">
                <?php foreach ($reviews as $rev): ?>
                    <div class="review-card-large rounded-lg bg-white shadow-sm border">
                        <div class="review-meta-row">
                            <span class="review-rating-stars">★★★★★</span>
                            <span class="review-date-badge">Verified Review &bull; <?php echo date('M Y', strtotime($rev['date'])); ?></span>
                        </div>
                        
                        <blockquote class="review-quote-text">
                            "<?php echo htmlspecialchars($rev['text']); ?>"
                        </blockquote>
                        
                        <div class="review-author-row">
                            <div class="author-avatar"><?php echo substr($rev['author'], 0, 1); ?></div>
                            <div class="author-details">
                                <span class="author-name"><?php echo htmlspecialchars($rev['author']); ?></span>
                                <span class="author-loc"><?php echo htmlspecialchars($rev['location_name']); ?>, NC</span>
                            </div>
                        </div>
                        
                        <div class="review-service-link">
                            Service: <a href="<?php echo SITE_URL; ?>/services/<?php echo $rev['service']; ?>" class="service-link-inline"><?php echo htmlspecialchars($services[$rev['service']]['name'] ?? 'Exterior Cleaning'); ?></a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        
        <!-- Google Review Callout -->
        <div class="google-review-badge-card rounded-lg mt-5 text-center p-4 border bg-white shadow-sm">
            <h3 class="mb-2">Are you a previous client of Mike's?</h3>
            <p>We build our business on local word-of-mouth. If you were happy with your recent house soft wash, concrete wash, or gutter brightening, we would appreciate it if you left us a review on Google!</p>
        </div>
        
    </div>
</section>

<!-- CTA Strip -->
<?php include __DIR__ . '/includes/contact-strip.php'; ?>

<?php 
include __DIR__ . '/includes/mobile-sticky-cta.php';
include __DIR__ . '/includes/footer.php'; 
?>
