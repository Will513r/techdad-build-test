<?php
/**
 * Shared Services Tabs Block - Summit Exterior Cleaning LLC
 */
if (!isset($services)) {
    $services = require dirname(__DIR__) . '/data/services.php';
}
?>
<!-- Services Tab Section -->
<?php
$is_services_page = str_contains($_SERVER['SCRIPT_NAME'], '/services/index.php');
$section_class = $is_services_page ? 'services-section-swapped' : 'bg-light';
?>
<section class="services-section section-padding <?php echo $section_class; ?>" id="services-section">
    <div class="container">
        <!-- Section Header styled like attached mockup (Grid-aligned) -->
        <?php if (!str_contains($_SERVER['SCRIPT_NAME'], '/services/index.php')): ?>
        <div class="services-header-grid">
            <div class="services-header-left-col">
                <div class="services-badge">
                    <span class="badge-dot"></span> Our Services
                </div>
            </div>
            <div class="services-header-right-col">
                <h2 class="services-heading">Elevated cleaning services for <br> your homes & businesses.</h2>
                <?php if (str_ends_with($_SERVER['SCRIPT_NAME'], 'index.php') && !str_contains($_SERVER['SCRIPT_NAME'], '/services/')): ?>
                    <a href="<?php echo SITE_URL; ?>/services" class="btn-secondary" style="margin-top: 0;">
                        EXPLORE SERVICES
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="btn-arrow" style="margin-left: 8px; vertical-align: middle; display: inline-block;"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </a>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>
        
        <!-- Tab Split Layout -->
        <div class="services-split-layout">
            <!-- Left Tab Navigation Menu -->
            <div class="services-tabs-card">
                <?php 
                $index = 0;
                foreach ($services as $slug => $svc): 
                    $is_active = ($index === 0);
                ?>
                    <div class="service-tab-item <?php echo $is_active ? 'active' : ''; ?>" data-service="<?php echo $slug; ?>">
                        <span class="tab-number"><?php echo $index + 1; ?>/</span>
                        <span class="tab-name"><?php echo htmlspecialchars($svc['name']); ?></span>
                        <span class="tab-arrow">&rarr;</span>
                    </div>
                <?php 
                    $index++;
                endforeach; 
                ?>
            </div>
            
            <!-- Right Detail Cards Container -->
            <div class="services-details-container">
                <?php 
                $index = 0;
                foreach ($services as $slug => $svc): 
                    $is_active = ($index === 0);
                    
                    // Curated pill tags for each service based on actual data
                    $tags = [];
                    if ($slug === 'house-soft-washing') {
                        $tags = ['Vinyl Siding', 'HardiePlank', 'Eco Soaps', 'Low Pressure', 'Plant Safe'];
                    } elseif ($slug === 'roof-soft-washing') {
                        $tags = ['Shingle Cleaning', 'ARMA Approved', 'No-Pressure', 'Warranty Compliant', 'Eco Safe'];
                    } elseif ($slug === 'concrete-cleaning') {
                        $tags = ['Driveways', 'Sidewalks', 'Patios', 'Stripe-Free Cleaner', 'Weed Prevention'];
                    } elseif ($slug === 'gutter-brightening') {
                        $tags = ['Hand Detailed', 'Tiger Stripes', 'Oxidation Removal', 'Trough Clearing'];
                    }
                ?>
                    <div class="service-detail-card" id="service-<?php echo $slug; ?>" data-service="<?php echo $slug; ?>">
                        <div class="detail-card-left">
                            <h3 class="detail-title">
                                <a href="<?php echo SITE_URL; ?>/services/<?php echo $slug; ?>"><?php echo htmlspecialchars($svc['name']); ?></a>
                            </h3>
                            <p class="detail-desc"><?php echo htmlspecialchars($svc['short_desc']); ?></p>
                            
                            <div class="detail-price-box">
                                <span class="price-label">Starting Price</span>
                                <span class="price-value"><?php echo htmlspecialchars($svc['pricing']); ?></span>
                            </div>
                            
                            <div class="detail-tags">
                                <?php foreach ($tags as $tag): ?>
                                    <span class="detail-tag"><?php echo htmlspecialchars($tag); ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        
                        <div class="detail-card-right">
                            <div class="detail-img-wrapper">
                                <img src="<?php echo SITE_URL; ?>/<?php echo $svc['photos'][0]; ?>" alt="<?php echo htmlspecialchars($svc['name']); ?>" class="detail-img">
                            </div>
                        </div>
                    </div>
                <?php 
                    $index++;
                endforeach; 
                ?>
            </div>
        </div>
    </div>
</section>
