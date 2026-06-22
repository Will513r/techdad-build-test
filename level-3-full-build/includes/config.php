<?php
/**
 * Site configuration and global constants for Summit Exterior Cleaning LLC
 */

// Determine protocol and domain dynamically
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'] ?? 'localhost:8000';
// In production, you would hardcode: define('SITE_URL', 'https://summitexteriorclean.com');
define('SITE_URL', $protocol . $host);

// Business Profile
define('COMPANY_NAME', 'Summit Exterior Cleaning LLC');
define('OWNER_NAME', 'Mike Reyes');
define('PHONE_DISPLAY', '(828) 555-0142');
define('PHONE_TEL', '+18285550142');
define('EMAIL_ADDRESS', 'mike@summitexteriorclean.com');
define('STREET_ADDRESS', '100 Example St');
define('CITY_NAME', 'Asheville');
define('STATE_ABBR', 'NC');
define('ZIP_CODE', '28801');
define('FULL_ADDRESS', STREET_ADDRESS . ', ' . CITY_NAME . ', ' . STATE_ABBR . ' ' . ZIP_CODE);
define('HOURS_MON_FRI', '7:00 AM - 6:00 PM');
define('HOURS_SAT', '8:00 AM - 2:00 PM');
define('HOURS_SUN', 'Closed');

// Trust & Review Signals
define('ESTABLISHED_YEAR', 2017); // 9 years as of 2026
define('TRUST_INSURED', 'Fully Insured');
define('TRUST_ESTIMATES', 'Free Estimates');
define('REVIEW_RATING', 4.9);
define('REVIEW_COUNT', 87);
define('SOCIAL_FACEBOOK', 'https://www.facebook.com/profile.php?id=000000000000000');
define('SOCIAL_LINKEDIN', 'https://www.linkedin.com/in/example-placeholder/ ');

// CTA Settings
define('CTA_GOAL_TEXT', 'Call me');
define('CTA_TEXT', 'Call Now');
?>
