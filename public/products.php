<?php
// Start the session and include required files
session_start();
include 'templates/header.php';
require '../config/DBconnect.php';
require '../src/Controllers/ProductController.php';

// Initialize the ProductController with a database connection
$productController = new ProductController($connection);

// Define the number of items per page
define('ITEMS_PER_PAGE', 10);

// Determine the current page from the query string or default to the first page
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

// Retrieve categories for filtering from the controller
$categories = $productController->getCategories();

// Retrieve the category filters from the query string if set
$categoryFilters = isset($_GET['category']) ? $_GET['category'] : [];

// Get filtered products based on the current page and category filters
$products = $productController->getFilteredProducts(['categories' => $categoryFilters], $current_page, ITEMS_PER_PAGE);

// Calculate the total number of products to configure pagination
$totalRows = $productController->getProductCount(['categories' => $categoryFilters]);
$totalPages = ceil($totalRows / ITEMS_PER_PAGE);
?>

<div class="container my-4 products-page">
    <div class="row">
        <!-- Sidebar Filters -->
        <div class="col-lg-3 mb-3">
            <?php include '../src/View/Snippets/filters.php'; ?>
        </div>

        <!-- Products -->
        <div class="col-lg-9">
            <?php foreach ($products as $product): ?>
                <?php include '../src/View/Snippets/product_card.php'; ?>
            <?php endforeach; ?>
        </div>


        <!-- Pagination -->
        <?php include '../src/View/Snippets/pagination.php'; ?>
    </div>

<?php include 'templates/footer.php'; ?>
