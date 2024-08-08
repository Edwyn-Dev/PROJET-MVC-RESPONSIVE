<?php
namespace Models;

class User
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Method to register a new user
    public function register($username, $password, $email)
    {
        // Hash the password using BCRYPT
        $hash = password_hash($password, PASSWORD_BCRYPT);
        // Prepare the SQL statement to insert a new user
        $stmt = $this->db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
        // Execute the statement with the provided username, hashed password, and email
        return $stmt->execute([$username, $hash, $email]);
    }

    // Method for user login
    public function login($username, $password)
    {
        // Prepare the SQL statement to select a user by username
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
        // Execute the statement with the provided username
        $stmt->execute([$username]);
        // Fetch the user data
        $user = $stmt->fetch();
        // Verify the provided password against the hashed password stored in the database
        if ($user && password_verify($password, $user['password'])) {
            return $user; // Return user data if password is correct
        }
        return false; // Return false if authentication fails
    }

    // Method to get a username by user ID
    public function getUserName($userId)
    {
        // Prepare the SQL statement to select the username by user ID
        $stmt = $this->db->prepare("SELECT username FROM users WHERE id = ?");
        // Execute the statement with the provided user ID
        $stmt->execute([$userId]);
        // Fetch and return the username
        return $stmt->fetchColumn();
    }
}
?>
