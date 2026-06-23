<?php
/**
 * Dynamic XML Sitemap Generator - Summit Exterior Cleaning LLC
 */
header("Content-Type: application/xml; charset=utf-8");

require_once __DIR__ . '/includes/config.php';
$services = require __DIR__ . '/data/services.php';
$cities = require __DIR__ . '/data/cities.php';
$posts = require __DIR__ . '/data/posts.php';
$projects = require __DIR__ . '/data/projects.php';

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
?>
<urlset 
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
    
    <!-- Core Static Pages -->
    <url>
        <loc><?php echo SITE_URL; ?>/</loc>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL; ?>/about</loc>
        <changefreq>monthly</changefreq>
        <priority>0.7</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL; ?>/contact</loc>
        <changefreq>monthly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL; ?>/reviews</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL; ?>/areas</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <url>
        <loc><?php echo SITE_URL; ?>/blog</loc>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>

    <!-- Blog Posts -->
    <?php foreach ($posts as $slug => $post): ?>
        <url>
            <loc><?php echo SITE_URL; ?>/blog/<?php echo $slug; ?></loc>
            <changefreq>monthly</changefreq>
            <priority>0.6</priority>
            <image:image>
                <image:loc><?php echo SITE_URL; ?>/<?php echo $post['image']; ?></image:loc>
                <image:title><?php echo htmlspecialchars($post['title']); ?></image:title>
            </image:image>
        </url>
    <?php endforeach; ?>

    <!-- Services Hub Pages -->
    <?php foreach ($services as $slug => $svc): ?>
        <url>
            <loc><?php echo SITE_URL; ?>/services/<?php echo $slug; ?></loc>
            <changefreq>monthly</changefreq>
            <priority>0.9</priority>
            <?php foreach (array_slice($svc['photos'], 0, 2) as $photo): ?>
                <image:image>
                    <image:loc><?php echo SITE_URL; ?>/<?php echo $photo; ?></image:loc>
                    <image:title><?php echo htmlspecialchars($svc['name']); ?></image:title>
                </image:image>
            <?php endforeach; ?>
        </url>
    <?php endforeach; ?>

    <!-- Selective Indexing: Service-in-City local landing pages -->
    <?php 
    foreach ($services as $svc_slug => $svc): 
        foreach ($cities as $city_slug => $city):
            // Only add this URL to sitemap if this service-in-city combo is indexed
            $is_indexed = in_array($city_slug, $svc['indexed_cities']);
            if ($is_indexed):
    ?>
        <url>
            <loc><?php echo SITE_URL; ?>/services/<?php echo $svc_slug; ?>/<?php echo $city_slug; ?></loc>
            <changefreq>weekly</changefreq>
            <priority>0.8</priority>
            <!-- Localized images -->
            <image:image>
                <image:loc><?php echo SITE_URL; ?>/<?php echo $svc['photos'][0]; ?></image:loc>
                <image:title><?php echo htmlspecialchars($svc['name']) . ' in ' . htmlspecialchars($city['name']); ?></image:title>
            </image:image>
            <?php if (isset($city['photos'][0])): ?>
                <image:image>
                    <image:loc><?php echo SITE_URL; ?>/<?php echo $city['photos'][0]; ?></image:loc>
                    <image:title><?php echo htmlspecialchars($city['name']) . ' NC Siding Soft Washing'; ?></image:title>
                </image:image>
            <?php endif; ?>
        </url>
    <?php 
            endif;
        endforeach;
    endforeach; 
    ?>

    <!-- Projects Portfolio Images (Bonus: Image Sitemap) -->
    <?php foreach ($projects as $proj): ?>
        <url>
            <!-- Map project photos to the relevant service-in-city page -->
            <loc><?php echo SITE_URL; ?>/services/<?php echo $proj['service']; ?>/<?php echo $proj['city']; ?></loc>
            <image:image>
                <image:loc><?php echo SITE_URL; ?>/<?php echo $proj['image']; ?></image:loc>
                <image:title><?php echo htmlspecialchars($proj['title']) . ' - ' . htmlspecialchars($proj['city_name']) . ', NC'; ?></image:title>
                <image:caption><?php echo htmlspecialchars($proj['caption']); ?></image:caption>
            </image:image>
        </url>
    <?php endforeach; ?>

</urlset>
