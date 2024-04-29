<?php
class UserProfile {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // Retrieve a user's profile information from the database using their ID.
    public function getUserById($userId) {
        $statement = $this->db->prepare("SELECT id, title, firstname, lastname, email, birthdate, address_line1, address_line2, city, postal_code, country, phone_number, user_type FROM users WHERE id = ?");
        $statement->execute([$userId]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    // Update user details in the database.
    public function updateUser($userId, $data) {
        // Validate and format the birthdate.
        $birthdate = $data['birthdate'];
        if (!empty($birthdate)) {
            $date = DateTime::createFromFormat('Y-m-d', $birthdate);
            if (!$date || DateTime::getLastErrors()['warning_count'] + DateTime::getLastErrors()['error_count'] > 0) {
                throw new Exception("Invalid birthdate format. Please use YYYY-MM-DD.");
            }
            $birthdate = $date->format('Y-m-d'); // Format the valid date into Y-m-d format.
        } else {
            $birthdate = null; // Set birthdate to null if empty to avoid storing incorrect data.
        }

        // Prepare the SQL query to update user details.
        $sql = "UPDATE users SET title = ?, firstname = ?, lastname = ?, birthdate = ?, address_line1 = ?, address_line2 = ?, city = ?, postal_code = ?, country = ?, phone_number = ? WHERE id = ?";
        $statement = $this->db->prepare($sql);
        // Execute the SQL query with the provided data.
        return $statement->execute([
            $data['title'],
            $data['firstname'],
            $data['lastname'],
            $birthdate,
            $data['address_line1'],
            $data['address_line2'],
            $data['city'],
            $data['postal_code'],
            $data['country'],
            $data['phone_number'],
            $userId
        ]);
    }
}