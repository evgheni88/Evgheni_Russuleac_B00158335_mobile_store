<?php
ob_start();
require_once '../config/DBconnect.php';
require_once '../src/UserProfile.php';
include 'templates/header.php';

// Check for user_id presence in either session or URL, redirect if none found
if (!isset($_SESSION['user_id']) && !isset($_GET['user_id'])) {
    header("Location: login.php");
    exit;
}

// Initialize user profile handler
$userProfile = new UserProfile($connection);

// Determine which user ID to use
$userId = $_SESSION['user_id'] ?? null;  // Use session user ID by default
if (isset($_GET['user_id'])) {
    $userId = filter_var($_GET['user_id'], FILTER_VALIDATE_INT);
    if ($userId === false) {
        echo "Invalid User ID.";
        exit;
    }
    if ($_SESSION['user_type'] !== 'Administrator' && $userId !== $_SESSION['user_id']) {
        echo "Access denied.";
        exit;
    }
}

// Ensure there is a valid userId to proceed
if (is_null($userId)) {
    echo "No valid user ID provided.";
    exit;
}

// Fetch user details from the database
$userDetails = $userProfile->getUserById($userId);

// Safe print function
function safePrint($data) {
    return htmlspecialchars($data ?? 'Not provided', ENT_QUOTES, 'UTF-8');
}

// Construct the address from the parts
$address = $userDetails['address_line1'] . ($userDetails['address_line2'] ? ', ' . $userDetails['address_line2'] : '') . ', ' . $userDetails['city'] . ', ' . $userDetails['country'] . ' ' . $userDetails['postal_code'];
if (trim($address, ', ') == '') {
    $address = "Not provided";
}

// Determine the image based on title
$avatarImage = 'images/noavatar.png'; // Default image
if ($userDetails['title'] == 'Mr.') {
    $avatarImage = 'images/avatarMr.png';
} elseif ($userDetails['title'] == 'Mrs.') {
    $avatarImage = 'images/avatarMrs.png';
}

// Display success message if any and then clear it
if (isset($_SESSION['profile_success_message'])) {
    echo "<div class='alert alert-success text-center'>" . $_SESSION['profile_success_message'] . "</div>";
    unset($_SESSION['profile_success_message']);
}

include '../src/View/profile_view.php';
include 'templates/footer.php';
ob_end_flush();
?>
