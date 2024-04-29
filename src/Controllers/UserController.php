<?php
require_once '../src/UserRegister.php';

// Handles the registration logic
class UserController {
    private $userRegister;

    // Dependency injection of the UserRegister model
    public function __construct(UserRegister $userRegister) {
        $this->userRegister = $userRegister;
    }

    // Processes the user registration
    public function register($data) {
        try {
            if ($data['password'] !== $data['confirm_password']) {
                return 'Passwords do not match!';
            }
            if ($this->userRegister->checkEmailExists($data['email'])) {
                return 'An account with this email address already exists.';
            }
            if ($this->userRegister->createUser($data)) {
                return 'Registration successful! Please log in.';
            } else {
                return 'Registration failed due to a server error.';
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}