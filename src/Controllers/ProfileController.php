<?php
require_once '../src/UserProfile.php';

class ProfileController {
    private $model;

    public function __construct($pdo) {
        $this->model = new UserProfile($pdo);
    }

    public function show($email) {
        $userDetails = $this->model->getUserDetails($email);
        include '../public/profile.php';  // Load the View
    }

    public function edit($email) {
        $userDetails = $this->model->getUserDetails($email);
        include '../public/edit_profile.php';  // Load the View for editing
    }

    public function update($userId, $data) {
        $result = $this->model->updateUserDetails($userId, $data);
        if ($result) {
            $_SESSION['success_message'] = "Profile updated successfully.";
            header("Location: profile.php");
            exit;
        } else {
            $_SESSION['error_message'] = "Failed to update profile.";
            header("Location: edit_profile.php");
            exit;
        }
    }
}