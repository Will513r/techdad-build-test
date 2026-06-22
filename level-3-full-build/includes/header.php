<?php
/**
 * Shared header layout for Summit Exterior Cleaning LLC
 */
require_once __DIR__ . '/config.php';
?>
<!-- Top Header Bar -->
<div class="top-bar">
    <div class="container top-bar-flex">
        <div class="top-bar-left">
            <span><i class="icon-location"></i> Asheville, NC & surrounding areas</span>
            <span class="top-bar-divider">|</span>
            <span><i class="icon-clock"></i> <?php echo HOURS_MON_FRI; ?></span>
        </div>
        <div class="top-bar-right">
            <a href="tel:<?php echo PHONE_TEL; ?>" class="top-bar-link"><i class="icon-phone"></i> <?php echo PHONE_DISPLAY; ?></a>
        </div>
    </div>
</div>

<!-- Main Sticky Navigation Header -->
<header class="main-header">
    <div class="container header-flex">
        <!-- Logo -->
        <a href="<?php echo SITE_URL; ?>/" class="logo-link">
            <img src="<?php echo SITE_URL; ?>/assets/images/logo/logo_1.webp" alt="<?php echo COMPANY_NAME; ?> Logo" class="logo-img">
            <div class="logo-text">
                <span class="logo-title">SUMMIT</span>
                <span class="logo-subtitle">Exterior Cleaning</span>
            </div>
        </a>

        <!-- Desktop Navigation Links -->
        <nav class="desktop-nav">
            <ul class="nav-list">
                <li><a href="<?php echo SITE_URL; ?>/" class="nav-link">Home</a></li>
                <li><a href="<?php echo SITE_URL; ?>/services" class="nav-link">Services</a></li>
                <li><a href="<?php echo SITE_URL; ?>/areas" class="nav-link">Areas Served</a></li>
                <li><a href="<?php echo SITE_URL; ?>/about" class="nav-link">About</a></li>
                <li><a href="<?php echo SITE_URL; ?>/blog" class="nav-link">Blog</a></li>
                <li><a href="<?php echo SITE_URL; ?>/contact" class="nav-link">Contact</a></li>
            </ul>
        </nav>

        <!-- Header CTA Button -->
        <div class="header-cta">
            <a href="tel:<?php echo PHONE_TEL; ?>" class="btn btn-primary btn-phone-cta">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right:8px; vertical-align:middle;"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                Call Now
            </a>
            <button class="mobile-nav-toggle" aria-label="Toggle Navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>
        </div>
    </div>
</header>

<!-- Mobile Navigation Drawer -->
<div class="mobile-menu-overlay">
    <div class="mobile-menu-drawer">
        <div class="drawer-header">
            <a href="<?php echo SITE_URL; ?>/" class="logo-link">
                <span class="logo-title">SUMMIT</span>
            </a>
            <button class="mobile-menu-close" aria-label="Close Navigation">&times;</button>
        </div>
        <nav class="mobile-nav">
            <ul class="mobile-nav-list">
                <li><a href="<?php echo SITE_URL; ?>/" class="mobile-nav-link">Home</a></li>
                <li><a href="<?php echo SITE_URL; ?>/services" class="mobile-nav-link">Services</a></li>
                <li><a href="<?php echo SITE_URL; ?>/areas" class="mobile-nav-link">Areas Served</a></li>
                <li><a href="<?php echo SITE_URL; ?>/about" class="mobile-nav-link">About</a></li>
                <li><a href="<?php echo SITE_URL; ?>/blog" class="mobile-nav-link">Blog</a></li>
                <li><a href="<?php echo SITE_URL; ?>/contact" class="mobile-nav-link">Contact</a></li>
            </ul>
        </nav>
        <div class="drawer-footer">
            <p class="drawer-phone-text">Need an estimate? Call Mike Reyes:</p>
            <a href="tel:<?php echo PHONE_TEL; ?>" class="btn btn-primary btn-block"><?php echo PHONE_DISPLAY; ?></a>
        </div>
    </div>
</div>
