<?php
class DashboardSession {
    private $databaseConnection;

    // Constructor to establish a database connection
    public function __construct($pdo) {
        $this->databaseConnection = $pdo;
    }

    // Method to fetch a single product by its ID
    public function getProduct($productId) {
        $sql = "SELECT p.*, pi.image_url FROM products p 
                LEFT JOIN product_images pi ON p.product_id = pi.product_id
                WHERE p.product_id = :productId 
                LIMIT 1";
        $statement = $this->databaseConnection->prepare($sql);
        $statement->bindParam(':productId', $productId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch all categories
    public function fetchCategories() {
        $sql = "SELECT * FROM categories";
        $statement = $this->databaseConnection->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fetch all products with their primary image for the product management section
    public function getAllProducts($offset = 0, $limit = 10) {
        $sql = "SELECT products.*, pi.image_url FROM products LEFT JOIN (SELECT product_id, MIN(image_url) as image_url FROM product_images GROUP BY product_id) pi ON products.product_id = pi.product_id LIMIT :offset, :limit";
        $statement = $this->databaseConnection->prepare($sql);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->bindParam(':limit', $limit, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    // Count total number of products for pagination
    public function countProducts() {
        $sql = "SELECT COUNT(*) FROM products";
        $statement = $this->databaseConnection->prepare($sql);
        $statement->execute();
        return $statement->fetchColumn();
    }

    // Add a new product to the database with all relevant details
    public function addProduct($productDetails) {
        $imagePath = 'images/products/' . $productDetails['image_name']; // Assuming the name includes the extension

        // Insert product details excluding the image URL
        $sql = "INSERT INTO products (category_id, brand, model, price, color, screen_size, battery_capacity, storage_capacity, front_camera_quality, back_camera_quality, operating_system, hardware, description, Quantity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $statement = $this->databaseConnection->prepare($sql);
        if ($statement->execute([
            $productDetails['category_id'],
            $productDetails['brand'],
            $productDetails['model'],
            $productDetails['price'],
            $productDetails['color'],
            $productDetails['screen_size'],
            $productDetails['battery_capacity'],
            $productDetails['storage_capacity'],
            $productDetails['front_camera_quality'],
            $productDetails['back_camera_quality'],
            $productDetails['operating_system'],
            $productDetails['hardware'],
            $productDetails['description'],
            $productDetails['quantity'],
        ])) {
            $productId = $this->databaseConnection->lastInsertId();

            // Now insert the image URL into the product_images table
            $sql = "INSERT INTO product_images (product_id, image_url) VALUES (?, ?)";
            $statement = $this->databaseConnection->prepare($sql);
            $statement->execute([$productId, $imagePath]);

            return $productId;  // Return the product ID of the newly added product
        }

        return false; // Return false if product insertion failed
    }

    // Update an existing product by its ID
    public function updateProduct($productId, $productDetails) {
        $sql = "UPDATE products SET brand = ?, model = ?, price = ?, color = ?, screen_size = ?, battery_capacity = ?, storage_capacity = ?, front_camera_quality = ?, back_camera_quality = ?, operating_system = ?, hardware = ?, description = ?, Quantity = ? WHERE product_id = ?";
        $statement = $this->databaseConnection->prepare($sql);
        $statement->execute([
            $productDetails['brand'],
            $productDetails['model'],
            $productDetails['price'],
            $productDetails['color'],
            $productDetails['screen_size'],
            $productDetails['battery_capacity'],
            $productDetails['storage_capacity'],
            $productDetails['front_camera_quality'],
            $productDetails['back_camera_quality'],
            $productDetails['operating_system'],
            $productDetails['hardware'],
            $productDetails['description'],
            $productDetails['quantity'],
            $productId
        ]);
    }

    // Delete a product from the database by its ID
    public function deleteProduct($productId) {
        $statement = $this->databaseConnection->prepare("DELETE FROM products WHERE product_id = ?");
        $statement->bindParam(1, $productId);
        $statement->execute();
    }
}