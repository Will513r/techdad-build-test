<?php
/**
 * Nearby Areas internal linking widget for Local SEO
 */
require_once __DIR__ . '/config.php';
$nearby_cities = require dirname(__DIR__) . '/data/cities.php';
$nearby_services = require dirname(__DIR__) . '/data/services.php';

// Ensure we have context variables
$ns_service_slug = $current_service_slug ?? 'house-soft-washing';
$ns_city_slug = $current_city_slug ?? null;

$service_details = $nearby_services[$ns_service_slug] ?? null;

if ($service_details):
?>
<div class="nearby-areas-widget">
    <h3 class="widget-title">Other Areas We Serve for <?php echo htmlspecialchars($service_details['name']); ?></h3>
    <p class="widget-desc">We provide professional <?php echo htmlspecialchars(strtolower($service_details['name'])); ?> within a 30-mile radius of Asheville, including these local communities:</p>
    <ul class="nearby-areas-grid">
        <?php 
        foreach ($nearby_cities as $slug => $city):
            // Skip the current city if we are already on its local page
            if ($ns_city_slug === $slug) continue;
            
            // Check if this city is indexed for the current service (optional link styling, but let's list it anyway)
            $is_indexed = in_array($slug, $service_details['indexed_cities']);
            $link_url = SITE_URL . "/services/" . $ns_service_slug . "/" . $slug;
            $link_text = $city['name'] . ' ' . $service_details['name'];
        ?>
            <li>
                <a href="<?php echo $link_url; ?>" class="nearby-area-link">
                    <span class="area-name"><?php echo htmlspecialchars($link_text); ?></span>
                    <span class="area-county"><?php echo htmlspecialchars($city['county']); ?> &rarr;</span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>
