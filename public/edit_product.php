<?php
ob_start();
include 'templates/header.php';
require '../config/DBconnect.php';
require '../src/DashboardSession.php';
require '../src/Controllers/DashboardController.php';

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

$product_id = $_GET['product_id'] ?? null;
$product = $dashboardSession->getProduct($product_id);
$categories = $dashboardSession->fetchCategories();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dashboardController->handleRequest();
    exit;
}

include '../src/View/edit_product_view.php';
include 'templates/footer.php';
ob_end_flush();
?>
