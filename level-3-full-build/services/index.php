<?php
/**
 * Services Hub - Summit Exterior Cleaning LLC
 */
require_once dirname(__DIR__) . '/includes/config.php';
$services = require dirname(__DIR__) . '/data/services.php';

// Prepare metadata
$meta = [
    'title' => 'Exterior Cleaning Services | Siding, Roof, Concrete & Gutters',
    'description' => 'Summit Exterior Cleaning provides safe soft washing for siding and roofs, and streak-free pressure washing for concrete in Asheville and surrounding areas.',
    'canonical' => '/services',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Services', 'url' => '/services']
    ]
];

include dirname(__DIR__) . '/includes/head.php';
include dirname(__DIR__) . '/includes/header.php';
?>

<!-- Internal Hero -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/assets/images/general/general_1.webp');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">Our Professional Solutions</span>
        <h1 class="internal-hero-title">Exterior Cleaning Services</h1>
    </div>
</section>

<!-- Services Grid Section -->
<section class="services-hub-content section-padding">
    <div class="container">
        <div class="intro-block text-center max-w-3xl mx-auto mb-5">
            <h2>Careful, Professional Washing for Every Surface</h2>
            <p class="lead-text">What sets Summit Exterior Cleaning apart is our surface-specific approach. We adjust our detergents and water pressure to perfectly suit vinyl, brick, shingles, or concrete—ensuring spotless results without the risk of damage.</p>
        </div>

        <div class="services-list mt-5">
            <?php 
            $count = 0;
            foreach ($services as $slug => $svc): 
                $count++;
                $is_even = ($count % 2 === 0);
            ?>
                <div class="service-row-card rounded-lg bg-white shadow-sm border p-4 mb-5 <?php echo $is_even ? 'row-reverse' : ''; ?>">
                    <div class="service-row-img-wrapper">
                        <img src="<?php echo SITE_URL; ?>/<?php echo $svc['photos'][0]; ?>" alt="<?php echo htmlspecialchars($svc['name']); ?>" class="service-row-img rounded-lg shadow-sm">
                    </div>
                    <div class="service-row-text">
                        <span class="service-row-price">Rate: <?php echo htmlspecialchars($svc['pricing']); ?></span>
                        <h2><?php echo htmlspecialchars($svc['name']); ?></h2>
                        <p class="service-row-desc"><?php echo htmlspecialchars($svc['description']); ?></p>
                        
                        <h4 class="mt-3">Benefits of our method:</h4>
                        <ul class="check-list-2col">
                            <?php foreach ($svc['benefits'] as $benefit): ?>
                                <li>&check; <?php echo htmlspecialchars($benefit); ?></li>
                            <?php endforeach; ?>
                        </ul>
                        
                        <div class="service-row-actions mt-4">
                            <a href="<?php echo SITE_URL; ?>/services/<?php echo $slug; ?>" class="btn btn-primary">Detailed Service Info</a>
                            <a href="<?php echo SITE_URL; ?>/contact?service=<?php echo $slug; ?>" class="btn btn-outline">Request Quote &rarr;</a>
                        </div>
                    </div>
                </div>
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
