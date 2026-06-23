<?php
/**
 * Lead Form API Handler - Summit Exterior Cleaning LLC
 */
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

require_once dirname(__DIR__) . '/includes/config.php';

// Only process POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Method Not Allowed']);
    exit;
}

// Read inputs
$name = trim($_POST['name'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$service = trim($_POST['service'] ?? '');
$city = trim($_POST['city'] ?? '');
$message = trim($_POST['message'] ?? '');

$errors = [];

// Validation
if (empty($name)) {
    $errors['name'] = 'Please enter your name.';
}

if (empty($phone)) {
    $errors['phone'] = 'Please enter your phone number.';
} else {
    // Basic phone validation (digits, spaces, hyphens, parens)
    $clean_phone = preg_replace('/[^0-9]/', '', $phone);
    if (strlen($clean_phone) < 10) {
        $errors['phone'] = 'Please enter a valid 10-digit phone number.';
    }
}

if (empty($email)) {
    $errors['email'] = 'Please enter your email address.';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Please enter a valid email address.';
}

if (empty($service)) {
    $errors['service'] = 'Please select a service.';
}

if (empty($city)) {
    $errors['city'] = 'Please select your city.';
}

// Return errors if any
if (!empty($errors)) {
    http_response_code(400);
    echo json_encode([
        'success' => false,
        'message' => 'Validation failed. Please correct the errors and try again.',
        'errors' => $errors
    ]);
    exit;
}

// Mock Email Body
$email_subject = "New Estimate Request: " . htmlspecialchars($service) . " - " . htmlspecialchars($city);
$email_body = "==================================================\n";
$email_body .= "NEW ESTIMATE REQUEST FOR SUMMIT EXTERIOR CLEANING\n";
$email_body .= "==================================================\n";
$email_body .= "Client Name:  " . htmlspecialchars($name) . "\n";
$email_body .= "Phone Number: " . htmlspecialchars($phone) . "\n";
$email_body .= "Email:        " . htmlspecialchars($email) . "\n";
$email_body .= "Service:      " . htmlspecialchars($service) . "\n";
$email_body .= "City:         " . htmlspecialchars($city) . "\n";
$email_body .= "Message:\n" . htmlspecialchars($message) . "\n";
$email_body .= "==================================================\n";
$email_body .= "Timestamp:    " . date('Y-m-d H:i:s') . "\n";

// In production:
// mail(EMAIL_ADDRESS, $email_subject, $email_body, "From: webmaster@summitexteriorclean.com");

// Save lead details locally as a simulated log
$leads_log_path = __DIR__ . '/leads_log.txt';
$log_entry = "--- LEAD SUBMISSION ---\n" . $email_body . "\n";
file_put_contents($leads_log_path, $log_entry, FILE_APPEND | LOCK_EX);

// Return success
echo json_encode([
    'success' => true,
    'message' => "Thank you, " . htmlspecialchars($name) . "! Your estimate request has been sent to Mike Reyes. We will contact you at " . htmlspecialchars($phone) . " shortly."
]);
exit;
?>
