<?php
/**
 * Blog Index - Summit Exterior Cleaning LLC
 */
require_once dirname(__DIR__) . '/includes/config.php';
$posts = require dirname(__DIR__) . '/data/posts.php';

// Prepare metadata
$meta = [
    'title' => 'Exterior Care Blog | Tips from Mike Reyes',
    'description' => 'Read clean care tips and local advice on house soft washing, concrete cleaning, and shingle maintenance from Summit Exterior Cleaning.',
    'canonical' => '/blog',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Blog', 'url' => '/blog']
    ]
];

include dirname(__DIR__) . '/includes/head.php';
include dirname(__DIR__) . '/includes/header.php';
?>

<!-- Internal Hero -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/assets/images/general/general_2.webp');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">Cleaning Tips & Advice</span>
        <h1 class="internal-hero-title">Exterior Cleaning Blog</h1>
    </div>
</section>

<!-- Blog List Content -->
<section class="blog-hub-content section-padding">
    <div class="container">
        <div class="intro-block text-center max-w-3xl mx-auto mb-5">
            <h2>Pro Advice on Keeping Your Home Sparkling</h2>
            <p class="lead-text">Learn how to protect your siding, shingles, and concrete from Western North Carolina\'s damp, humid climate. Read our recent articles below.</p>
        </div>

        <div class="blog-posts-grid mt-5">
            <?php foreach ($posts as $slug => $post): ?>
                <article class="blog-card rounded-lg bg-white shadow-sm border">
                    <div class="blog-card-img-wrapper">
                        <img src="<?php echo SITE_URL; ?>/<?php echo $post['image']; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="blog-card-img">
                    </div>
                    <div class="blog-card-content">
                        <span class="blog-card-date"><?php echo date('F j, Y', strtotime($post['date'])); ?> &bull; By <?php echo htmlspecialchars($post['author']); ?></span>
                        <h3 class="blog-card-title"><a href="<?php echo SITE_URL; ?>/blog/<?php echo $slug; ?>"><?php echo htmlspecialchars($post['title']); ?></a></h3>
                        <p class="blog-card-excerpt"><?php echo htmlspecialchars($post['excerpt']); ?></p>
                        <a href="<?php echo SITE_URL; ?>/blog/<?php echo $slug; ?>" class="blog-card-link">Read Full Article &rarr;</a>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Strip -->
<?php include dirname(__DIR__) . '/includes/contact-strip.php'; ?>

<?php 
include dirname(__DIR__) . '/includes/mobile-sticky-cta.php';
include dirname(__DIR__) . '/includes/footer.php'; 
?>
