<?php
ob_start();
include 'templates/header.php';
require_once '../config/DBconnect.php';  // Database connection
require_once '../src/Controllers/LoginController.php';

// Redirect logged in users to home
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header('Location: index.php'); // Redirect to homepage or a dashboard
    exit;
}

$loginController = new LoginController($connection);

// Display success message if set
if (isset($_SESSION['success_message'])) {
    echo "<div class='alert alert-success text-center'>" . $_SESSION['success_message'] . "</div>";
    unset($_SESSION['success_message']);
}

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($loginController->login($email, $password)) {
        header("Location: index.php");  // Redirect to the home page after successful login
        exit;
    } else {
        echo "<div class='alert alert-danger text-center'>Invalid email or password.</div>";
    }
}

// Display logout message if present
if (isset($_COOKIE['logout_message'])) {
    echo "<div class='alert alert-success text-center'>" . $_COOKIE['logout_message'] . "</div>";
    setcookie('logout_message', '', time() - 3600);  // Clear the cookie
}

include '../src/View/login_view.php';
include 'templates/footer.php';
ob_end_flush(); // End buffering and output everything at once
?>