<?php
ob_start();
require_once '../config/DBconnect.php';
require_once '../src/UserProfile.php';
include 'templates/header.php';

if (!isset($_SESSION['user_id'])) { // Redirect if not logged in
    header("Location: login.php");
    exit;
}

$userProfile = new UserProfile($connection);
$userDetails = $userProfile->getUserById($_SESSION['user_id']); // Fetch user details using id from session

// Safe print function
function safePrint($data) {
    return htmlspecialchars($data ?? 'Not provided', ENT_QUOTES, 'UTF-8');
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $formData = [
            'title' => $_POST['title'] ?? '',
            'firstname' => $_POST['firstname'] ?? '',
            'lastname' => $_POST['lastname'] ?? '',
            'birthdate' => $_POST['birthdate'] ?? '',
            'address_line1' => $_POST['address_line1'] ?? '',
            'address_line2' => $_POST['address_line2'] ?? '',
            'city' => $_POST['city'] ?? '',
            'postal_code' => $_POST['postal_code'] ?? '',
            'country' => $_POST['country'] ?? '',
            'phone_number' => $_POST['phone_number'] ?? ''
        ];

        if ($userProfile->updateUser($_SESSION['user_id'], $formData)) {
            $_SESSION['profile_success_message'] = "Profile updated successfully.";
            header("Location: profile.php?user_id=" . $_SESSION['user_id']); // Redirect to profile page
            exit;
        } else {
            $message = "<div class='alert alert-danger'>Failed to update profile.</div>";
        }
    } catch (Exception $e) {
        $message = "<div class='alert alert-danger'>" . $e->getMessage() . "</div>";
    }
}

// Determine the image based on title
$avatarImage = 'images/noavatar.png';
if ($userDetails['title'] == 'Mr.') {
    $avatarImage = 'images/avatarMr.png';
} elseif ($userDetails['title'] == 'Mrs.') {
    $avatarImage = 'images/avatarMrs.png';
}

include '../src/View/edit_profile_view.php';
include 'templates/footer.php';
ob_end_flush();
?>
