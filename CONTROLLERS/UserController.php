<?php
namespace Controllers;

use Models\User;
require_once __DIR__ . '/../MODELS/User.php';

use Config\Database;
require_once __DIR__ . '/../CONFIG/database.php';

class UserController
{
    private $userModel;

    // Constructor to initialize the User model with a database connection
    public function __construct()
    {
        // Create a new Database instance
        $db = new Database();
        // Initialize the User model with the database connection
        $this->userModel = new User($db->connect());
    }

    // Method to register a new user
    public function register($username, $password, $email)
    {
        return $this->userModel->register($username, $password, $email);
    }

    // Method for user login
    public function login($username, $password)
    {
        return $this->userModel->login($username, $password);
    }

    // Method to get a username by user ID
    public function getUserName($userId)
    {
        return $this->userModel->getUserName($userId);
    }
}
?>
