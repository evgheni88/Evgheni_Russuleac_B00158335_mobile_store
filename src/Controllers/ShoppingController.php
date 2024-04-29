<?php
class ShoppingController {
    private $shoppingSession;

    public function __construct($shoppingSession) {
        $this->shoppingSession = $shoppingSession;
    }

    public function handleRequest() {
        $action = $_GET['action'] ?? null;
        $product_id = $_GET['product_id'] ?? 0;

        try {
            switch ($action) {
                case 'update':  // Updating quantity in the cart
                    $quantity = $_POST['quantity'] ?? 0;
                    $this->shoppingSession->updateCartQuantity($product_id, $quantity);
                    $_SESSION['success_message'] = "Cart updated successfully!";
                    break;
                case 'remove':  // Removing item from the cart
                    $this->shoppingSession->removeFromCart($product_id);
                    $_SESSION['success_message'] = "Product removed from cart successfully!";
                    break;
                case 'increment':  // Incrementing item quantity in the cart
                    $this->shoppingSession->incrementQuantity($product_id);
                    $_SESSION['success_message'] = "Quantity increased successfully!";
                    break;
                case 'decrement':  // Decrementing item quantity in the cart
                    $this->shoppingSession->decrementQuantity($product_id);
                    $_SESSION['success_message'] = "Quantity decreased successfully!";
                    break;
                // Additional cases for wishlist can follow the same pattern
                case 'add_to_wishlist':
                    $this->shoppingSession->addToWishlist($product_id);
                    $_SESSION['success_message'] = "Added to wishlist successfully!";
                    break;
                case 'remove_from_wishlist':
                    $this->shoppingSession->removeFromWishlist($product_id);
                    $_SESSION['success_message'] = "Removed from wishlist successfully!";
                    break;
            }
        } catch (Exception $e) {
            $_SESSION['error_message'] = $e->getMessage();
            header("Location: cart.php?product_id=$product_id&error=1");
            exit;
        }

        header("Location: " . ($_SERVER['HTTP_REFERER'] ?? 'cart.php'));
        exit;
    }
}