<?php
ob_start();
require_once '../config/DBconnect.php';
require_once '../src/ShoppingSession.php';
require_once '../src/Controllers/ShoppingController.php';
include 'templates/header.php'; // Include header

// Initialize the shopping session and controller
$wishlist = new ShoppingSession($connection);
$controller = new ShoppingController($wishlist);

// Check if there's an action to be processed
if (isset($_GET['action']) && isset($_GET['product_id'])) {
    $controller->handleRequest();
    // Redirect to avoid form resubmission issues
    header("Location: wishlist.php");
    exit;
}

$wishlistItems = $wishlist->getWishlistContents();

include '../src/View/wishlist_view.php';
include 'templates/footer.php';
ob_end_flush();
?>
