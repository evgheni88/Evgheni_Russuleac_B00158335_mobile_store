<?php
require_once '../src/CheckInLogin.php';
require_once '../src/clean.php';

// Controller for handling login process
class LoginController {
    private $userAuth;

    // Constructor initializes the Login model with a database connection
    public function __construct($pdo) {
        $this->userAuth = new CheckInLogin($pdo);
    }

    // Handles user login, cleans input, and checks credentials
    public function login($email, $password) {
        // Clean the email and password to prevent injection attacks
        $email = clean::cleaner($email);
        $password = clean::cleaner($password);

        // Verify user credentials and set session if successful
        $result = $this->userAuth->verifyUser($email, $password);
        if ($result) {
            // Setting user session data
            $_SESSION['user_email'] = $email;
            $_SESSION['user_id'] = $result['id'];
            $_SESSION['user_type'] = $result['user_type'];
            $_SESSION['logged_in'] = true;
            return true;
        }
        return false;
    }
}
