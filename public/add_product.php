<?php
ob_start();
include 'templates/header.php';
require '../config/DBconnect.php';
require_once '../src/DashboardSession.php';
require_once '../src/Controllers/DashboardController.php';

// Check if the user is logged in and has the administrator role
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    $_SESSION['dashboard_error'] = 'You must log in to view this page.';
    header("Location: login.php");  // Redirect to login page
    exit;
} elseif ($_SESSION['user_type'] !== 'Administrator') {
    $_SESSION['dashboard_error'] = 'You do not have permission to access the admin dashboard.';
    header("Location: index.php");  // Redirect to the homepage
    exit;
}

$dashboardSession = new DashboardSession($connection);
$dashboardController = new DashboardController($dashboardSession);

// Fetch categories to populate the category dropdown in the form
$categories = $dashboardSession->fetchCategories();

// Checking for form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Call the controller handleRequest method for adding a product
    $dashboardController->handleRequest();

    if (isset($_SESSION['dashboard_success'])) {
        header('Location: admin_dashboard.php?success=' . urlencode($_SESSION['dashboard_success']));
        exit;
    }
}

include '../src/View/add_product_view.php';
include 'templates/footer.php';
ob_end_flush();
?>
