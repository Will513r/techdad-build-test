<?php
/**
 * JSON-LD Schema generation helpers for Summit Exterior Cleaning LLC
 */

require_once __DIR__ . '/config.php';

/**
 * Generates LocalBusiness Schema
 */
function getLocalBusinessSchema() {
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "HomeAndConstructionBusiness",
        "name" => COMPANY_NAME,
        "image" => SITE_URL . "/assets/images/logo/logo_1.webp",
        "telephon" => PHONE_TEL,
        "telephone" => PHONE_DISPLAY,
        "email" => EMAIL_ADDRESS,
        "url" => SITE_URL,
        "priceRange" => "$$",
        "address" => [
            "@type" => "PostalAddress",
            "streetAddress" => STREET_ADDRESS,
            "addressLocality" => CITY_NAME,
            "addressRegion" => STATE_ABBR,
            "postalCode" => ZIP_CODE,
            "addressCountry" => "US"
        ],
        "geo" => [
            "@type" => "GeoCoordinates",
            "latitude" => 35.5951, // Asheville coordinates
            "longitude" => -82.5515
        ],
        "openingHoursSpecification" => [
            [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens" => "07:00",
                "closes" => "18:00"
            ],
            [
                "@type" => "OpeningHoursSpecification",
                "dayOfWeek" => ["Saturday"],
                "opens" => "08:00",
                "closes" => "14:00"
            ]
        ],
        "areaServed" => [
            [
                "@type" => "AdministrativeArea",
                "name" => "Asheville, NC"
            ],
            [
                "@type" => "AdministrativeArea",
                "name" => "Buncombe County"
            ],
            [
                "@type" => "AdministrativeArea",
                "name" => "Henderson County"
            ]
        ],
        "aggregateRating" => [
            "@type" => "AggregateRating",
            "ratingValue" => REVIEW_RATING,
            "reviewCount" => REVIEW_COUNT
        ]
    ];
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generates BreadcrumbList Schema
 * @param array $crumbs Array of associative arrays, e.g. [['name' => 'Home', 'url' => '/']]
 */
function getBreadcrumbSchema($crumbs) {
    $items = [];
    $position = 1;
    
    foreach ($crumbs as $crumb) {
        $url = filter_var($crumb['url'], FILTER_VALIDATE_URL) ? $crumb['url'] : SITE_URL . $crumb['url'];
        $items[] = [
            "@type" => "ListItem",
            "position" => $position++,
            "name" => $crumb['name'],
            "item" => $url
        ];
    }
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "BreadcrumbList",
        "itemListElement" => $items
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generates FAQPage Schema
 * @param array $faqs Array of associative arrays [['q' => 'Question', 'a' => 'Answer']]
 */
function getFAQSchema($faqs) {
    $mainEntity = [];
    
    foreach ($faqs as $faq) {
        $mainEntity[] = [
            "@type" => "Question",
            "name" => $faq['q'],
            "acceptedAnswer" => [
                "@type" => "Answer",
                "text" => $faq['a']
            ]
        ];
    }
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "FAQPage",
        "mainEntity" => $mainEntity
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}

/**
 * Generates Service Schema
 * @param array $service Service array from data/services.php
 * @param string|null $cityName City name
 */
function getServiceSchema($service, $cityName = null) {
    $serviceUrl = SITE_URL . "/services/" . $service['slug'];
    if ($cityName) {
        $serviceUrl .= "/" . strtolower(str_replace(' ', '-', $cityName));
    }
    
    $schema = [
        "@context" => "https://schema.org",
        "@type" => "Service",
        "serviceType" => $service['name'],
        "provider" => [
            "@type" => "LocalBusiness",
            "name" => COMPANY_NAME,
            "telephone" => PHONE_DISPLAY,
            "url" => SITE_URL
        ],
        "areaServed" => [
            "@type" => "AdministrativeArea",
            "name" => $cityName ? $cityName . ", NC" : CITY_NAME . ", NC"
        ],
        "name" => $service['name'] . ($cityName ? " in " . $cityName : ""),
        "description" => $service['short_desc'],
        "offers" => [
            "@type" => "Offer",
            "priceCurrency" => "USD",
            "price" => "0.00",
            "priceSpecification" => [
                "@type" => "UnitPriceSpecification",
                "priceType" => "Starting Price",
                "description" => "Starting rate of " . $service['pricing']
            ]
        ]
    ];
    
    return '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
}
?>
