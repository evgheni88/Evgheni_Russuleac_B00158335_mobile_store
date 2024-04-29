<?php
include 'templates/header.php';
require '../config/DBconnect.php';
require '../src/Controllers/ProductController.php';

$productController = new ProductController($connection);

// Fetch products for different categories
$smartphones = $productController->getProducts(1);
$tablets = $productController->getProducts(2);

// Data to pass to the View
$data = [
    'smartphones' => $smartphones,
    'tablets' => $tablets
];

if (isset($_SESSION['dashboard_error'])) {
    echo "<div class='alert alert-danger text-center'>" . $_SESSION['dashboard_error'] . "</div>";
    unset($_SESSION['dashboard_error']);  // Clear the message after displaying it
}

include '../src/View/index_view.php';

include 'templates/footer.php';
?>
