<?php
include 'templates/header.php';
require '../config/DBconnect.php';

// Initialize the ProductController with a connection
try {
    require '../src/Controllers/ProductController.php';
    $productController = new ProductController($connection);
} catch (Exception $e) {
    error_log($e->getMessage());
    exit('Error connecting to database');
}

// Get search term from query parameter and the current page
$searchTerm = $_GET['query'] ?? '';
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$result = $productController->search($searchTerm, $current_page);

if (!$result) {
    exit('Failed to retrieve search results');
}

// Unpack results
$products = $result['products'];
$totalResults = $result['totalResults'];
$totalPages = $result['totalPages'];
$current_page = $result['currentPage'];

include '../src/View/search_results_view.php';
include 'templates/footer.php';
?>
