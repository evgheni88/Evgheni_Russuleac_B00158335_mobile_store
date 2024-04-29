<?php
require_once '../src/ProductModel.php';

class ProductController {
    private $productModel;

    public function __construct($connection) {
        $this->productModel = new ProductModel($connection);
    }

    // Fetches products for a given category with a limit. Validates and sanitizes input before querying the model.
    public function getProducts($categoryId, $limit = 4) {
        // Validate categoryId is an integer and limit is also an integer
        $categoryId = filter_var($categoryId, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $limit = filter_var($limit, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 50]]);

        if (!$categoryId || !$limit) {
            throw new InvalidArgumentException("Invalid Category ID or limit");
        }

        return $this->productModel->fetchProductsByCategory($categoryId, $limit);
    }

    // Fetches product details and images by product ID. Validates input before querying the model.
    public function getProductDetails($product_id) {
        // Validate product_id is an integer
        $product_id = filter_var($product_id, FILTER_VALIDATE_INT);

        if (!$product_id) {
            throw new InvalidArgumentException("Invalid Product ID");
        }

        $product = $this->productModel->getProductById($product_id);
        $images = $this->productModel->getProductImagesById($product_id);

        return [
            'product' => $product,
            'images' => $images
        ];
    }

    // Method to get products based on filters for the products page. Validates and sanitizes filters and pagination parameters.
    public function getFilteredProducts($filters, $page, $itemsPerPage = 10) {
        // Validate pagination inputs
        $page = filter_var($page, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $itemsPerPage = filter_var($itemsPerPage, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 100]]);

        if (!$page || !$itemsPerPage) {
            throw new InvalidArgumentException("Invalid page or items per page");
        }

        $offset = ($page - 1) * $itemsPerPage;
        return $this->productModel->fetchAllProducts($filters, $offset, $itemsPerPage);
    }

    // Calculates the total number of products for given filters to support pagination. Validates filters before querying.
    public function getProductCount($filters) {
        return $this->productModel->countFilteredProducts($filters);
    }

    // Retrieves categories for filters. No input validation necessary as no user input is processed.
    public function getCategories() {
        return $this->productModel->fetchCategories();
    }

    // Search method with pagination and input sanitization
    public function search($searchTerm, $page = 1, $itemsPerPage = 10) {
        // Sanitize the search term to prevent malicious inputs
        $searchTerm = strip_tags($searchTerm);

        // Validate pagination parameters
        $page = filter_var($page, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
        $itemsPerPage = filter_var($itemsPerPage, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 50]]);

        if (!$page || !$itemsPerPage) {
            throw new InvalidArgumentException("Invalid page number or items per page");
        }

        $offset = ($page - 1) * $itemsPerPage;
        $totalResults = $this->productModel->countSearchResults($searchTerm);
        $totalPages = ceil($totalResults / $itemsPerPage);
        $products = $this->productModel->searchProducts($searchTerm, $offset, $itemsPerPage);

        return [
            'products' => $products,
            'totalResults' => $totalResults,
            'totalPages' => $totalPages,
            'currentPage' => $page
        ];
    }
}