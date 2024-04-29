<?php
session_start();
require_once '../config/DBconnect.php';
require '../src/ShoppingSession.php';

$product_id = $_GET['product_id'] ?? 0;
$quantity = $_GET['quantity'] ?? 1;

$cart = new ShoppingSession($connection);
try {
    $cart->addToCart($product_id, $quantity);
    $_SESSION['cart_success_message'] = "Product added to cart successfully!";
    header("Location: product-detail.php?product_id=" . $product_id); // Redirect back to product detail page
} catch (Exception $e) {
    $_SESSION['error_message'] = $e->getMessage();
    header("Location: product-detail.php?product_id=" . $product_id); // Redirect back with error
}
exit;
?>
