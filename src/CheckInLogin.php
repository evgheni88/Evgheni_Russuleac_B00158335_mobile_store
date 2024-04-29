<?php
// Class for checking user login from the database
class CheckInLogin {
    private $db;

    // Constructor receives the PDO connection to the database
    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Verifies the user's email and password against the database
    public function verifyUser($email, $password) {
        // Prepare SQL statement to prevent SQL injection
        $statement = $this->db->prepare("SELECT id, password, user_type FROM users WHERE email = :email");
        $statement->bindParam(':email', $email);
        $statement->execute();
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        // Check if user exists and password is correct
        if ($user && password_verify($password, $user['password'])) {
            return ['id' => $user['id'], 'user_type' => $user['user_type']];  // Return user ID and type if password is correct
        }
        return false;
    }
}
