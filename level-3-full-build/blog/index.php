<?php
/**
 * Blog Index - Summit Exterior Cleaning LLC
 * Premium editorial layout matching Neatenn mockup styling
 */

// Local PHP web server routing fallback for clean URLs
$script_name = $_SERVER['SCRIPT_NAME'];
$base_dir = dirname($script_name);
$base_dir = rtrim($base_dir, '/\\');
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_starts_with($request_path, $base_dir)) {
    $sub_path = substr($request_path, strlen($base_dir));
    $sub_path = trim($sub_path, '/');
    if ($sub_path !== '') {
        $parts = explode('/', $sub_path);
        $_GET['slug'] = $parts[0];
        include __DIR__ . '/post-template.php';
        exit;
    }
}

require_once dirname(__DIR__) . '/includes/config.php';
$posts = require dirname(__DIR__) . '/data/posts.php';

// Prepare metadata
$meta = [
    'title' => 'Exterior Care Blog | Tips from Mike Reyes',
    'description' => 'Read professional soft washing tips, roof maintenance advice, and concrete cleaning guides for Western North Carolina from Summit Exterior Cleaning.',
    'canonical' => '/blog',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Blog', 'url' => '/blog']
    ]
];

include dirname(__DIR__) . '/includes/head.php';
include dirname(__DIR__) . '/includes/header.php';

$total_posts_count = str_pad(count($posts), 2, "0", STR_PAD_LEFT);
?>

<!-- Premium Blogs Hero Section -->
<section class="blog-hero">
    <div class="container blog-hero-grid">
        <div class="blog-hero-left">
            <div class="blog-badge">
                <span class="badge-dot"></span> Blogs
            </div>
        </div>
        <div class="blog-hero-right">
            <div class="blog-hero-meta-row">
                <div class="blog-hero-tagline">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 2px;">
                        <polyline points="20 6 9 17 4 12"></polyline>
                    </svg>
                    <span class="blog-hero-tagline-text">An Independent Reliable, Affordable, and Eco-friendly Cleaning Solutions.</span>
                </div>
                <div class="blog-hero-year">2017–2026</div>
            </div>
            <h1 class="blog-hero-title">Cleaning tips that actually work</h1>
        </div>
    </div>
</section>

<!-- Latest Posts Section -->
<section class="blog-hub-content">
    <div class="container">
        
        <!-- Divider Section Title -->
        <div class="blog-section-divider">
            <div class="blog-section-badge">
                <span class="badge-dot"></span> Latest Posts
            </div>
            <div class="blog-section-divider-line"></div>
            <div class="blog-section-count"><?php echo $total_posts_count; ?></div>
        </div>

        <!-- Blog Cards Grid -->
        <div class="blog-premium-grid">
            <?php foreach ($posts as $slug => $post): ?>
                <article class="blog-premium-card rounded-lg">
                    <a href="<?php echo SITE_URL; ?>/blog/<?php echo $slug; ?>" class="blog-card-image-link">
                        <div class="blog-premium-img-wrap">
                            <img src="<?php echo SITE_URL; ?>/<?php echo htmlspecialchars($post['image']); ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" class="blog-premium-img">
                        </div>
                    </a>
                    <div class="blog-premium-body">
                        <div class="blog-premium-meta">
                            <span class="blog-meta-date"><?php echo strtoupper(date('F j, Y', strtotime($post['date']))); ?></span>
                            <span class="blog-meta-dot"></span>
                            <span class="blog-meta-category"><?php echo htmlspecialchars($post['category'] ?? 'PRO TIPS'); ?></span>
                        </div>
                        <h3 class="blog-premium-title">
                            <a href="<?php echo SITE_URL; ?>/blog/<?php echo $slug; ?>"><?php echo htmlspecialchars($post['title']); ?></a>
                        </h3>
                        
                        <!-- Author Badge Block -->
                        <div class="blog-premium-author-pill">
                            <div class="blog-author-avatar">
                                <?php echo htmlspecialchars($post['author_initials'] ?? 'MR'); ?>
                            </div>
                            <span class="blog-author-name"><?php echo htmlspecialchars(strtoupper($post['author'] ?? 'Mike Reyes')); ?></span>
                        </div>
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
