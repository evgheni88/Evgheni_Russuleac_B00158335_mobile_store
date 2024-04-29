<?php
include 'templates/header.php';
require_once '../config/DBconnect.php';  // Database connection file
require_once '../src/Controllers/ProductController.php';  // Assuming controller is in the same directory
$productController = new ProductController($connection);

$productController = new ProductController($connection);

$product_id = isset($_GET['product_id']) ? (int)$_GET['product_id'] : 0;
$data = $productController->getProductDetails($product_id);
$product = $data['product'];
$images = $data['images'];

// Display messages if they exist
if (isset($_SESSION['wishlist_success_message'])) {
    echo '<div class="alert alert-success text-center">' . $_SESSION['wishlist_success_message'] . '</div>';
    unset($_SESSION['wishlist_success_message']);
}

if (isset($_SESSION['cart_success_message'])) {
    echo '<div class="alert alert-success text-center">' . $_SESSION['cart_success_message'] . '</div>';
    unset($_SESSION['cart_success_message']);
}

if (isset($_SESSION['error_message'])) {
    echo '<div class="alert alert-danger text-center">' . $_SESSION['error_message'] . '</div>';
    unset($_SESSION['error_message']);
}

include '../src/View/product_detail_view.php';
include 'templates/footer.php'; ?>
