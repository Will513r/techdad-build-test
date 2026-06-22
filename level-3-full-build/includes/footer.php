<?php
/**
 * Shared footer layout for Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/config.php';
$footer_services = require dirname(__DIR__) . '/data/services.php';
$footer_cities = require dirname(__DIR__) . '/data/cities.php';
?>
<footer class="main-footer">
    <div class="container footer-grid">
        <!-- Column 1: Brand & Bio -->
        <div class="footer-col">
            <span class="footer-logo">SUMMIT</span>
            <p class="footer-desc">
                Summit Exterior Cleaning provides safe, low-pressure soft washing and streak-free concrete cleaning for homes and businesses in Asheville and surrounding areas.
            </p>
            <div class="footer-trust-badges">
                <span class="badge badge-insured"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:4px;"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg> Fully Insured</span>
                <span class="badge badge-guarantee"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" style="margin-right:4px;"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg> Free Estimates</span>
            </div>
        </div>

        <!-- Column 2: Services Link List -->
        <div class="footer-col">
            <h4 class="footer-heading">Our Services</h4>
            <ul class="footer-links">
                <?php foreach ($footer_services as $svc): ?>
                    <li><a href="<?php echo SITE_URL; ?>/services/<?php echo $svc['slug']; ?>"><?php echo htmlspecialchars($svc['name']); ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>

        <!-- Column 3: Cities Link List -->
        <div class="footer-col">
            <h4 class="footer-heading">Service Areas</h4>
            <ul class="footer-links">
                <?php 
                // Only show first 5 cities in footer for layout spacing
                $count = 0;
                foreach ($footer_cities as $city): 
                    if ($count++ >= 5) break;
                ?>
                    <li><a href="<?php echo SITE_URL; ?>/services/house-soft-washing/<?php echo $city['slug']; ?>"><?php echo htmlspecialchars($city['name']); ?> House Washing</a></li>
                <?php endforeach; ?>
                <li><a href="<?php echo SITE_URL; ?>/areas" class="view-all-areas-link">View All Service Areas &rarr;</a></li>
            </ul>
        </div>

        <!-- Column 4: Contact & Hours -->
        <div class="footer-col">
            <h4 class="footer-heading">Get in Touch</h4>
            <p class="footer-contact-info">
                <strong>Summit Exterior Cleaning LLC</strong><br>
                <?php echo STREET_ADDRESS; ?><br>
                <?php echo CITY_NAME; ?>, <?php echo STATE_ABBR; ?> <?php echo ZIP_CODE; ?><br>
                Owner: <?php echo OWNER_NAME; ?>
            </p>
            <p class="footer-contact-links">
                <a href="tel:<?php echo PHONE_TEL; ?>" class="footer-phone"><?php echo PHONE_DISPLAY; ?></a><br>
                <a href="mailto:<?php echo EMAIL_ADDRESS; ?>"><?php echo EMAIL_ADDRESS; ?></a>
            </p>
            <h4 class="footer-heading-sub">Hours of Operation</h4>
            <p class="footer-hours">
                Mon - Fri: <?php echo HOURS_MON_FRI; ?><br>
                Sat: <?php echo HOURS_SAT; ?><br>
                Sun: <?php echo HOURS_SUN; ?>
            </p>
        </div>
    </div>

    <!-- Bottom Footer Bar -->
    <div class="footer-bottom">
        <div class="container footer-bottom-flex">
            <div class="footer-copy">
                &copy; <?php echo date('Y'); ?> <?php echo COMPANY_NAME; ?>. All rights reserved.
                <span class="credit-sep">|</span> 
                <span class="td-credit">Website built by <a href="https://techdadmedia.com" target="_blank" rel="noopener">Tech Dad Media</a></span>
            </div>
            <div class="footer-payments">
                <span class="payment-label">Accepted Payments:</span>
                <span class="payment-method">Cash</span>
                <span class="payment-method">Check</span>
                <span class="payment-method">Venmo</span>
                <span class="payment-method">Card</span>
            </div>
        </div>
    </div>
</footer>

<!-- Core Script -->
<script src="<?php echo SITE_URL; ?>/assets/js/main.js"></script>
</body>
</html>
