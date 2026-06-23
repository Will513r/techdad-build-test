<?php
/**
 * Areas Served Index Page - Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/includes/config.php';
$cities = require __DIR__ . '/data/cities.php';
$services = require __DIR__ . '/data/services.php';

// Prepare metadata
$meta = [
    'title' => 'Areas We Serve Around Asheville | Buncombe & Henderson Counties',
    'description' => 'Summit Exterior Cleaning provides safe soft wash and pressure washing in Asheville, Hendersonville, Black Mountain, Weaverville, and Fletcher, NC.',
    'canonical' => '/areas',
    'breadcrumbs' => [
        ['name' => 'Home', 'url' => '/'],
        ['name' => 'Areas Served', 'url' => '/areas']
    ]
];

include __DIR__ . '/includes/head.php';
include __DIR__ . '/includes/header.php';
?>

<!-- Internal Hero -->
<section class="internal-hero-section" style="background-image: linear-gradient(rgba(12, 31, 45, 0.85), rgba(12, 31, 45, 0.9)), url('<?php echo SITE_URL; ?>/assets/images/general/general_2.webp');">
    <div class="container text-center">
        <span class="internal-hero-subtitle">Our Local Coverage Area</span>
        <h1 class="internal-hero-title">Service Areas We Cover</h1>
    </div>
</section>

<!-- Areas Index Content -->
<section class="areas-page-content section-padding">
    <div class="container">
        <div class="intro-block text-center max-w-3xl mx-auto mb-5">
            <h2>Serving a 30-Mile Radius Around Asheville, NC</h2>
            <p class="lead-text">From historic homes in Hendersonville to damp mountain valleys in Black Mountain, we understand the local climate conditions that cause rapid mold and algae growth on siding and roofs in Western North Carolina.</p>
        </div>

        <div class="areas-detailed-list mt-5">
            <?php foreach ($cities as $slug => $city): ?>
                <div class="area-detail-row rounded-lg bg-white shadow-sm border p-4 mb-4">
                    <div class="area-row-header">
                        <div>
                            <h2><?php echo htmlspecialchars($city['name']); ?>, NC</h2>
                            <span class="area-meta-badge"><?php echo htmlspecialchars($city['county']); ?> &bull; ZIP Code: <?php echo htmlspecialchars($city['zip']); ?></span>
                        </div>
                        <a href="tel:<?php echo PHONE_TEL; ?>" class="btn btn-outline btn-phone-small">Call Mike</a>
                    </div>
                    
                    <div class="area-row-body mt-3">
                        <div class="area-body-text">
                            <p><?php echo htmlspecialchars($city['local_note']); ?></p>
                            
                            <h4 class="mt-3">Neighborhoods Serviced:</h4>
                            <ul class="neighborhood-tag-list">
                                <?php foreach ($city['neighborhoods'] as $nb): ?>
                                    <li class="nb-tag"><?php echo htmlspecialchars($nb); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        
                        <div class="area-body-links">
                            <h4>Service Pages for <?php echo htmlspecialchars($city['name']); ?>:</h4>
                            <ul class="city-services-links">
                                <?php 
                                foreach ($services as $svc_slug => $svc): 
                                    // Check if this service is indexed in this city
                                    $is_indexed = in_array($slug, $svc['indexed_cities']);
                                    $link_url = SITE_URL . "/services/" . $svc_slug . "/" . $slug;
                                ?>
                                    <li>
                                        <a href="<?php echo $link_url; ?>" class="city-svc-link">
                                            <span><?php echo htmlspecialchars($svc['name']); ?></span>
                                            <span class="btn-arrow">&rarr;</span>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Coverage Map Summary Card -->
        <div class="coverage-summary-card rounded-lg bg-light mt-5 p-4 border text-center">
            <h3>Don't see your town listed?</h3>
            <p>We regularly service communities throughout Buncombe County and Henderson County. If you live within 30 miles of Asheville, chances are we serve your area! Give Mike Reyes a call at <strong><?php echo PHONE_DISPLAY; ?></strong> to confirm coverage and book your wash.</p>
        </div>
    </div>
</section>

<!-- CTA Strip -->
<?php include __DIR__ . '/includes/contact-strip.php'; ?>

<?php 
include __DIR__ . '/includes/mobile-sticky-cta.php';
include __DIR__ . '/includes/footer.php'; 
?>
