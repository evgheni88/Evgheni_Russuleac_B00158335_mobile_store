<?php
// Handles user-related database interactions
class UserRegister {
    private $db;

    // Constructor receives the PDO connection object
    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Checks if an email already exists in the database
    public function checkEmailExists($email) {
        $query = $this->db->prepare("SELECT email FROM users WHERE email = :email");
        $query->bindParam(':email', $email, PDO::PARAM_STR);
        $query->execute();
        return $query->rowCount() > 0;
    }

    // Creates a new user in the database
    public function createUser($data) {
        // Validate the birthdate
        $birthdate = $data['birthdate'];
        $date = DateTime::createFromFormat('Y-m-d', $birthdate);
        $date_errors = DateTime::getLastErrors();

        if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
            throw new Exception("Invalid birthdate format. Please use YYYY-MM-DD.");
        }

        // Check if the birthdate is in the future
        $now = new DateTime();
        if ($date > $now) {
            throw new Exception("Birthdate cannot be in the future.");
        }

        $sql = "INSERT INTO users (title, firstname, lastname, email, password, birthdate, user_type) VALUES (:title, :firstname, :lastname, :email, :password, :birthdate, :user_type)";
        $query = $this->db->prepare($sql);
        return $query->execute([
            ':title' => $data['title'],
            ':firstname' => $data['firstname'],
            ':lastname' => $data['lastname'],
            ':email' => $data['email'],
            ':password' => password_hash($data['password'], PASSWORD_DEFAULT),
            ':birthdate' => $birthdate ? $date->format('Y-m-d') : null,
            ':user_type' => 'standard'
        ]);
    }
}