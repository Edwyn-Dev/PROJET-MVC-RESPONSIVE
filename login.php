<?php
// Use the UserController class from the Controllers namespace
use Controllers\UserController;

// Include the UserController.php file
require_once __DIR__ . '/CONTROLLERS/UserController.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Instantiate the UserController
    $userController = new UserController();
    
    // Call the login method with the provided username and password from the POST request
    $user = $userController->login($_POST['username'], $_POST['password']);
    
    // If the login is successful, start a session and store the user information
    if ($user) {
        session_start(); // Start the session
        $_SESSION['user'] = $user; // Store user information in the session
        
        // Redirect to the dashboard page
        header('Location: dashboard.php');
    } else {
        // If login fails, include the error view to display an error message
        require 'VIEWS/error_view.php';
    }
} else {
    // If the request method is not POST, include the login view to show the login form
    require './VIEWS/login_view.php';
}
?>
