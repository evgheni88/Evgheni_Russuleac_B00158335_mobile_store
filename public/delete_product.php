<?php
session_start();

require_once '../config/DBconnect.php';

// Check if the user is logged in and has the administrator role
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    $_SESSION['dashboard_error'] = 'You must log in to view this page.';
    header("Location: login.php");  // Redirect to login page
    exit;
} elseif ($_SESSION['user_type'] !== 'Administrator') {
    $_SESSION['dashboard_error'] = 'You do not have permission to access the admin dashboard.';
    header("Location: index.php");  // Redirect them to the homepage or user dashboard
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $productId = $_POST['product_id'];

    try {
        // Begin transaction
        $connection->beginTransaction();

        // Delete associated images first
        $stmtImages = $connection->prepare("DELETE FROM product_images WHERE product_id = ?");
        $stmtImages->execute([$productId]);

        // Now delete the product
        $stmtProduct = $connection->prepare("DELETE FROM products WHERE product_id = ?");
        $stmtProduct->execute([$productId]);

        // Commit transaction
        $connection->commit();

        $_SESSION['dashboard_success'] = "Product successfully deleted.";
    } catch (PDOException $e) {
        // Roll back the transaction if something failed
        $connection->rollBack();

        $_SESSION['dashboard_error'] = "Error deleting product: " . $e->getMessage();
    }

    header('Location: admin_dashboard.php');
    exit;
} else {
    $_SESSION['error_message'] = "No product specified for deletion.";
    header('Location: admin_dashboard.php');
    exit;
}
?>