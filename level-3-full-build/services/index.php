<?php
/**
 * Services Hub - Summit Exterior Cleaning LLC
 */

// Local PHP web server routing fallback for clean URLs
$script_name = $_SERVER['SCRIPT_NAME'];
$base_dir = dirname($script_name);
$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (str_starts_with($request_path, $base_dir)) {
    $sub_path = substr($request_path, strlen($base_dir));
    $sub_path = trim($sub_path, '/');
    if ($sub_path !== '') {
        $parts = explode('/', $sub_path);
        $_GET['service'] = $parts[0];
        if (isset($parts[1])) {
            $_GET['city'] = $parts[1];
        }
        include __DIR__ . '/service-template.php';
        exit;
    }
}

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

<!-- Custom Services Hero Section -->
<section class="services-hero">
    <div class="container services-hero-grid">
        <div class="services-hero-left">
            <div class="services-badge" style="margin-bottom: 0;">
                <span class="badge-dot"></span> Services
            </div>
        </div>
        <div class="services-hero-right">
            <div class="services-hero-tagline">
                <!-- Cleaning Checkmark SVG Icon -->
                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="align-self: flex-start; margin-top: 2px;">
                    <polyline points="20 6 9 17 4 12"></polyline>
                </svg>
                <div class="services-hero-tagline-text">
                    <span class="tagline-line-1">Professional low-pressure soft washing</span>
                    <span class="tagline-line-2">& pressure washing across Asheville</span>
                </div>
            </div>
            <h1 class="services-hero-title">Soft washing that lasts. Spotless results without siding damage.</h1>
            <a href="#services-section" class="services-hero-btn">
                Explore Services
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="btn-arrow" style="margin-left: 8px; vertical-align: middle; display: inline-block;"><polyline points="9 18 15 12 9 6"></polyline></svg>
            </a>
        </div>
    </div>
</section>

<!-- Services Shared Section Include -->
<?php include dirname(__DIR__) . '/includes/services-section.php'; ?>

<!-- CTA Strip -->
<?php include dirname(__DIR__) . '/includes/contact-strip.php'; ?>

<?php 
include dirname(__DIR__) . '/includes/mobile-sticky-cta.php';
include dirname(__DIR__) . '/includes/footer.php'; 
?>
