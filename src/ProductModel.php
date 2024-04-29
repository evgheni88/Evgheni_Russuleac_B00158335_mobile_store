<?php

class ProductModel {
    protected $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    // Fetch product details by product ID, using prepared statements for security
    public function getProductById($product_id) {
        $sql = "SELECT * FROM products WHERE product_id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$product_id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch product images by product ID, secure from SQL injection
    public function getProductImagesById($product_id) {
        $sql = "SELECT image_url FROM product_images WHERE product_id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$product_id]);
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Validate and sanitize category ID and limit, then fetch products
    public function fetchProductsByCategory($categoryId, $limit = 4) {
        // Ensure category ID is an integer and limit is not exceeded
        $categoryId = filter_var($categoryId, FILTER_VALIDATE_INT);
        $limit = filter_var($limit, FILTER_VALIDATE_INT, ['options' => ['default' => 4, 'min_range' => 1, 'max_range' => 100]]);

        $sql = "SELECT products.*, (SELECT image_url FROM product_images WHERE product_id = products.product_id LIMIT 1) AS image_url FROM products WHERE category_id = ? LIMIT ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $categoryId, PDO::PARAM_INT);
        $statement->bindValue(2, $limit, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Apply filters to fetch products, validate and sanitize parameters
    public function fetchAllProducts($filters, $offset, $itemsPerPage) {
        // Initialize SQL with JOIN to ensure only images are fetched
        $sql = "SELECT products.*, product_images.image_url FROM products LEFT JOIN product_images ON products.product_id = product_images.product_id WHERE product_images.image_id = (SELECT MIN(image_id) FROM product_images WHERE product_id = products.product_id)";

        $conditions = [];
        $parameters = [];

        // Validate category IDs in the filters
        if (!empty($filters['categories'])) {
            foreach ($filters['categories'] as $key => $val) {
                $filters['categories'][$key] = filter_var($val, FILTER_VALIDATE_INT);
            }
            $categoryConditions = implode(',', $filters['categories']);
            $conditions[] = "products.category_id IN (" . $categoryConditions . ")";
        }

        if (!empty($conditions)) {
            $sql .= " AND " . implode(' AND ', $conditions);
        }

        // Validate offset and items per page
        $offset = filter_var($offset, FILTER_VALIDATE_INT, ['options' => ['default' => 0]]);
        $itemsPerPage = filter_var($itemsPerPage, FILTER_VALIDATE_INT, ['options' => ['default' => 10]]);

        $sql .= " ORDER BY products.product_id ASC LIMIT ?, ?";
        $statement = $this->connection->prepare($sql);
        $statement->bindValue(1, $offset, PDO::PARAM_INT);
        $statement->bindValue(2, $itemsPerPage, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Count filtered products, applying input validation for filters
    public function countFilteredProducts($filters) {
        $sql = "SELECT COUNT(*) FROM products p LEFT JOIN product_images pi ON p.product_id = pi.product_id WHERE pi.image_id = (SELECT MIN(image_id) FROM product_images WHERE product_id = p.product_id)";

        $conditions = [];
        if (!empty($filters['categories'])) {
            foreach ($filters['categories'] as $key => $val) {
                $filters['categories'][$key] = filter_var($val, FILTER_VALIDATE_INT);
            }
            $categoryConditions = implode(',', $filters['categories']);
            $conditions[] = "p.category_id IN (" . $categoryConditions . ")";
        }

        if (!empty($conditions)) {
            $sql .= " AND " . implode(' AND ', $conditions);
        }

        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchColumn();
    }

    // Retrieve categories for filtering options
    public function fetchCategories() {
        $sql = "SELECT * FROM categories";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Sanitize search term and fetch products matching the criteria
    public function searchProducts($searchTerm, $offset, $itemsPerPage) {
        $sql = "SELECT p.*, pi.image_url FROM products p JOIN product_images pi ON p.product_id = pi.product_id WHERE pi.image_id = (SELECT MIN(image_id) FROM product_images WHERE product_id = p.product_id) AND (p.model LIKE ? OR p.brand LIKE ? OR p.description LIKE ?) LIMIT ?, ?";
        $statement = $this->connection->prepare($sql);

        // Sanitize the search term
        $searchTermFormatted = "%" . strip_tags($searchTerm) . "%";
        $statement->bindParam(1, $searchTermFormatted, PDO::PARAM_STR);
        $statement->bindParam(2, $searchTermFormatted, PDO::PARAM_STR);
        $statement->bindParam(3, $searchTermFormatted, PDO::PARAM_STR);
        $statement->bindParam(4, $offset, PDO::PARAM_INT);
        $statement->bindParam(5, $itemsPerPage, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Count the search results, using sanitized input
    public function countSearchResults($searchTerm) {
        $sql = "SELECT COUNT(*) FROM products WHERE model LIKE ? OR brand LIKE ? OR description LIKE ?";
        $statement = $this->connection->prepare($sql);

        // Sanitize the search term
        $searchTermFormatted = "%" . strip_tags($searchTerm) . "%";
        $statement->bindParam(1, $searchTermFormatted, PDO::PARAM_STR);
        $statement->bindParam(2, $searchTermFormatted, PDO::PARAM_STR);
        $statement->bindParam(3, $searchTermFormatted, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchColumn();
    }
}