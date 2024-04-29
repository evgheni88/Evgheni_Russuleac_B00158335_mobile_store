<?php
ob_start();
include 'templates/header.php';
require_once '../config/DBconnect.php';
require_once '../src/Controllers/UserController.php';

$userController = new UserController(new UserRegister($connection));
$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $userController->register($_POST);
    if ($message === 'Registration successful! Please log in.') {
        $_SESSION['success_message'] = $message;
        header("Location: login.php");
        exit;
    }
}

include '../src/View/register_view.php';
include 'templates/footer.php';
ob_end_flush();
?>