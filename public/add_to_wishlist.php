<?php
session_start();
require_once '../config/DBconnect.php';
require '../src/ShoppingSession.php';

$product_id = $_GET['product_id'] ?? 0;

$shoppingSession = new ShoppingSession($connection);
try {
    if (!$shoppingSession->addToWishlist($product_id)) {
        // If the item is already in the wishlist, just show an error message
        header("Location: product-detail.php?product_id=" . $product_id);
        exit;
    }
    $_SESSION['wishlist_success_message'] = "Product added to wishlist successfully!";
    header("Location: product-detail.php?product_id=" . $product_id); // Redirect back with success message
} catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
    header("Location: product-detail.php?product_id=" . $product_id); // Redirect back with error message
}
exit;
?>
