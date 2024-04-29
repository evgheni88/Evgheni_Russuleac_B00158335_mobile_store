<?php
ob_start();
include 'templates/header.php';

// Check if the user is logged in and has the administrator role
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    $_SESSION['dashboard_error'] = 'You must log in to view this page.';
    header("Location: login.php");  // Redirect to login page
    exit;
} elseif ($_SESSION['user_type'] !== 'Administrator') {
    $_SESSION['dashboard_error'] = 'You do not have permission to access the admin dashboard.';
    header("Location: index.php");  // Redirect them to the homepage or user dashboard
    exit;
}

require '../config/DBconnect.php';
require_once '../src/DashboardSession.php';
require_once '../src/Controllers/DashboardController.php';

$dashboardSession = new DashboardSession($connection);
$dashboardController = new DashboardController($dashboardSession);

// Pagination Logic
define('ITEMS_PER_PAGE', 10);
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * ITEMS_PER_PAGE;
$totalProducts = $dashboardSession->countProducts();
$totalPages = ceil($totalProducts / ITEMS_PER_PAGE);

$products = $dashboardSession->getAllProducts($offset, ITEMS_PER_PAGE);

include '../src/View/admin_dashboard_view.php';
include 'templates/footer.php';
ob_end_flush();
?>