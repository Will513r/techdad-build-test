<?php
/**
 * Blog Post Detail Template - Summit Exterior Cleaning LLC
 */
require_once dirname(__DIR__) . '/includes/config.php';
$posts = require dirname(__DIR__) . '/data/posts.php';

$post_slug = $_GET['slug'] ?? '';

// Validate post exists
if (!isset($posts[$post_slug])) {
    header("HTTP/1.1 404 Not Found");
    include dirname(__DIR__) . '/404.php';
    exit;
}

$post = $posts[$post_slug];

// Prepare metadata
$meta = [
    'title' => $post['title'],
    'description' => htmlspecialchars($post['excerpt']),
    'canonical' => '/blog/' . $post_slug,
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Blog', 'url' => '/blog'],
        ['name' => $post['title'], 'url' => '/blog/' . $post_slug]
    ]
];

include dirname(__DIR__) . '/includes/head.php';
include dirname(__DIR__) . '/includes/header.php';
?>

<!-- Internal Hero -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/<?php echo $post['image']; ?>');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">
            Published: <?php echo date('F j, Y', strtotime($post['date'])); ?> &bull; By <?php echo htmlspecialchars($post['author']); ?>
        </span>
        <h1 class="internal-hero-title"><?php echo htmlspecialchars($post['title']); ?></h1>
    </div>
</section>

<!-- Blog Post Content Page -->
<section class="blog-post-page-content section-padding">
    <div class="container page-grid-2col">
        
        <!-- Main Post Body -->
        <main class="main-content-text">
            <div class="post-body">
                <?php echo $post['content']; ?>
            </div>
            
            <div class="post-footer-actions mt-5 border-top pt-4">
                <a href="<?php echo SITE_URL; ?>/blog" class="btn btn-secondary">&larr; Back to All Articles</a>
            </div>
        </main>
        
        <!-- Sidebar Widget -->
        <aside class="sidebar-content">
            <!-- Sidebar CTA Widget -->
            <div class="sidebar-card rounded-lg bg-primary text-white shadow-sm p-4 text-center">
                <h3>Keep Your Home Clean</h3>
                <p class="mb-3">Why DIY when you can get professional, safe, low-pressure washing at a fair price?</p>
                <a href="tel:<?php echo PHONE_TEL; ?>" class="btn btn-accent btn-block btn-large">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:6px; vertical-align:middle;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                    Call Mike: (828) 555-0142
                </a>
                <a href="<?php echo SITE_URL; ?>/contact" class="btn btn-outline-white btn-block mt-2">Get Free Estimate</a>
            </div>

            <!-- Other Posts List Widget -->
            <div class="sidebar-card rounded-lg bg-white border shadow-sm p-4 mt-4">
                <h3>Other Recent Articles</h3>
                <ul class="sidebar-links-list">
                    <?php 
                    foreach ($posts as $slug => $p):
                        if ($slug === $post_slug) continue;
                    ?>
                        <li>
                            <a href="<?php echo SITE_URL; ?>/blog/<?php echo $slug; ?>" class="sidebar-blog-link">
                                <span class="sidebar-blog-title"><?php echo htmlspecialchars($p['title']); ?></span>
                                <span class="sidebar-blog-date"><?php echo date('M j, Y', strtotime($p['date'])); ?></span>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </aside>
        
    </div>
</section>

<!-- CTA Strip -->
<?php include dirname(__DIR__) . '/includes/contact-strip.php'; ?>

<?php 
include dirname(__DIR__) . '/includes/mobile-sticky-cta.php';
include dirname(__DIR__) . '/includes/footer.php'; 
?>
