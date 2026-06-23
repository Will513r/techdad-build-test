<?php
/**
 * Shared <head> template for Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/config.php';
require_once __DIR__ . '/schema-helpers.php';

// Prepare title
$page_title = isset($meta['title']) ? $meta['title'] . ' | ' . COMPANY_NAME : COMPANY_NAME . ' | Soft Washing Asheville NC';
if (strlen($page_title) > 90) {
    // If it's too long, just use the custom title
    $page_title = $meta['title'] ?? COMPANY_NAME;
}

// Prepare description
$meta_desc = $meta['description'] ?? 'Summit Exterior Cleaning provides safe, low-pressure soft washing and power washing for siding, roofs, and concrete in Asheville, NC.';

// Prepare canonical URL
if (isset($meta['canonical'])) {
    $canonical_url = SITE_URL . $meta['canonical'];
} else {
    // Determine dynamically from request path
    $request_uri = strtok($_SERVER["REQUEST_URI"] ?? '', '?');
    // Remove trailing slash if not home page
    if ($request_uri !== '/' && substr($request_uri, -1) === '/') {
        $request_uri = rtrim($request_uri, '/');
    }
    $canonical_url = SITE_URL . $request_uri;
}

// Check robots indexing
$robots_tag = 'index, follow';
if (isset($meta['noindex']) && $meta['noindex'] === true) {
    $robots_tag = 'noindex, follow';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($meta_desc); ?>">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta name="robots" content="<?php echo $robots_tag; ?>">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($meta_desc); ?>">
    <meta property="og:image" content="<?php echo SITE_URL; ?>/assets/images/logo/logo_1.webp">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@400;500;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- CSS -->
    <?php
    // Inline critical CSS if file exists
    $critical_css_path = dirname(__DIR__) . '/assets/css/critical.css';
    if (file_exists($critical_css_path) && filesize($critical_css_path) > 0) {
        echo '<style>';
        include $critical_css_path;
        echo '</style>';
    }
    ?>
    <link rel="stylesheet" href="<?php echo SITE_URL; ?>/assets/css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/assets/images/logo/logo_1.webp">

    <!-- Dynamic Schemas -->
    <?php
    // Always load LocalBusiness on every page
    echo getLocalBusinessSchema();
    
    // Injected breadcrumbs if exists
    if (isset($meta['breadcrumbs'])) {
        echo getBreadcrumbSchema($meta['breadcrumbs']);
    }
    
    // Injected FAQ if exists
    if (isset($meta['faqs'])) {
        echo getFAQSchema($meta['faqs']);
    }
    
    // Injected Service schema if exists
    if (isset($meta['service_schema'])) {
        $svc = $meta['service_schema']['service'];
        $cty = $meta['service_schema']['city'] ?? null;
        echo getServiceSchema($svc, $cty);
    }
    ?>
</head>
<body>
