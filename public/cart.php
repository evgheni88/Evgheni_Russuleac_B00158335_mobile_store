<?php
ob_start();
require_once '../config/DBconnect.php';
require_once '../src/ShoppingSession.php';
require_once '../src/Controllers/ShoppingController.php';
include 'templates/header.php'; // Include header

// Initialize the cart object and controller
$cart = new ShoppingSession($connection);
$controller = new ShoppingController($cart);

// Check if there's an action to be processed
if (isset($_GET['action']) && isset($_GET['product_id'])) {
    $controller->handleRequest();
    // Redirect to the same page to avoid form resubmission issues
    header("Location: cart.php");
    exit;
}

// Check for success messages and display them
if (isset($_SESSION['success_message'])) {
    echo '<div class="alert alert-success text-center">' . $_SESSION['success_message'] . '</div>';
    unset($_SESSION['success_message']); // Clear the message after displaying
}

// Check for error messages and display them
if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger text-center">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);  // Clear the message after displaying
}

$cartItems = $cart->getCartContents();

include '../src/View/cart_view.php';
include 'templates/footer.php';
ob_end_flush();
?>
