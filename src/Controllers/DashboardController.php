<?php
class DashboardController {
    private $dashboardSession;

    public function __construct($dashboardSession) {
        $this->dashboardSession = $dashboardSession;
    }

    public function handleRequest() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $action = $_POST['action'] ?? null;
            $productDetails = $_POST['product'] ?? [];
            $productDetails['image_name'] = $_POST['image_name']; // Collect the image name from the form data

            try {
                $this->performAction($action, $productDetails);
            } catch (Exception $e) {
                $_SESSION['dashboard_error'] = "Error processing request: " . $e->getMessage();
                header("Location: admin_dashboard.php");
                exit;
            }
        }
    }

    private function performAction($action, $productDetails) {
        switch ($action) {
            case 'add_product':
                $productId = $this->dashboardSession->addProduct($productDetails);
                if ($productId) {
                    $_SESSION['dashboard_success'] = "Product added successfully!";
                    header("Location: admin_dashboard.php");
                    exit;
                } else {
                    $_SESSION['dashboard_error'] = "Failed to add product.";
                }
                break;
            case 'edit_product':
                $this->dashboardSession->updateProduct($productDetails['product_id'], $productDetails);
                $_SESSION['dashboard_success'] = "Product updated successfully!";
                header("Location: admin_dashboard.php");
                exit;
            case 'delete_product':
                $this->dashboardSession->deleteProduct($productDetails['product_id']);
                $_SESSION['dashboard_success'] = "Product deleted successfully!";
                header("Location: admin_dashboard.php");
                exit;
            default:
                throw new Exception("Unsupported action: $action");
        }
    }
}