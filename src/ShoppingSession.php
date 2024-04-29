<?php
class ShoppingSession {
    private $databaseConnection;

    // Constructor initializes the database connection and ensures sessions for cart and wishlist are started.
    public function __construct($pdo) {
        $this->databaseConnection = $pdo;
        $this->startSessions();
    }

    // Start sessions for the cart and wishlist if they do not already exist.
    private function startSessions() {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = [];
        }
    }

    // Fetch product details from the database; it's sanitized as it uses prepared statements.
    public function getProductDetails($product_id) {
        $statement = $this->databaseConnection->prepare("
            SELECT products.*, product_images.image_url, products.quantity as stock
            FROM products 
            JOIN product_images ON products.product_id = product_images.product_id 
            WHERE products.product_id = ?");
        $statement->execute([$product_id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Add a product to the cart or update its quantity if it already exists.
    public function addToCart($product_id, $quantity) {
        $product = $this->getProductDetails($product_id);
        if (!$product) {
            throw new Exception("Product not found.");
        }
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += $quantity;
        } else {
            $_SESSION['cart'][$product_id] = [
                'quantity' => max(1, intval($quantity)),  // Ensuring at least one item is added
                'unit_price' => $product['price'],
                'image_url' => $product['image_url'],
                'name' => $product['brand'] . ' ' . $product['model'],
                'brand' => $product['brand'],
                'color' => $product['color'],
                'screen_size' => $product['screen_size'],
                'storage_capacity' => $product['storage_capacity']
            ];
        }
    }

    // Update the quantity of a product in the cart, ensuring it does not exceed available stock.
    public function updateCartQuantity($product_id, $quantity) {
        if (isset($_SESSION['cart'][$product_id])) {
            $product = $this->getProductDetails($product_id);
            if ($quantity > $product['stock']) {
                $_SESSION['cart'][$product_id]['quantity'] = $product['stock'];
                throw new Exception("Requested quantity exceeds available stock. Adjusted to maximum available.");
            } elseif ($quantity <= 0) {
                unset($_SESSION['cart'][$product_id]);
            } else {
                $_SESSION['cart'][$product_id]['quantity'] = $quantity;
            }
        }
    }

    // Remove a product from the cart.
    public function removeFromCart($product_id) {
        unset($_SESSION['cart'][$product_id]);
    }

    // Add a product to the wishlist if it's not already added.
    public function addToWishlist($product_id) {
        $product = $this->getProductDetails($product_id);
        if (!isset($_SESSION['wishlist'][$product_id])) {
            $_SESSION['wishlist'][$product_id] = [
                'image_url' => $product['image_url'],
                'name' => $product['brand'] . ' ' . $product['model'],
                'unit_price' => $product['price'],
                'brand' => $product['brand'],
                'color' => $product['color'] ?? 'N/A',
                'screen_size' => $product['screen_size'] ?? 'N/A',
                'storage_capacity' => $product['storage_capacity'] ?? 'N/A',
                'stock' => $product['stock'] ?? 'Not Available'
            ];
            $_SESSION['wishlist_success_message'] = "Product added to wishlist successfully!";
        } else {
            $_SESSION['error_message'] = "This item is already in your wishlist.";
        }
    }

    // Remove a product from the wishlist.
    public function removeFromWishlist($product_id) {
        unset($_SESSION['wishlist'][$product_id]);
    }

    // Increment the quantity of a specific item in the cart.
    public function incrementQuantity($product_id) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]['quantity'] += 1;
        }
    }

    // Decrement the quantity of a specific item in the cart, ensuring it doesn't drop below 1.
    public function decrementQuantity($product_id) {
        if (isset($_SESSION['cart'][$product_id]) && $_SESSION['cart'][$product_id]['quantity'] > 1) {
            $_SESSION['cart'][$product_id]['quantity'] -= 1;
        } else {
            $this->removeFromCart($product_id);
        }
    }

    // Calculate the total cost of all items in the cart.
    public function calculateCartTotal() {
        $total = 0;
        foreach ($_SESSION['cart'] as $item) {
            $total += $item['unit_price'] * $item['quantity'];
        }
        return $total;
    }

    // Get the current contents of the cart.
    public function getCartContents() {
        return $_SESSION['cart'];
    }

    // Get the current contents of the wishlist.
    public function getWishlistContents() {
        return $_SESSION['wishlist'];
    }
}