<?php
// Use the UserController class from the Controllers namespace
use Controllers\UserController;

// Include the UserController.php file
require_once __DIR__ . '/CONTROLLERS/UserController.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Instantiate the UserController
    $userController = new UserController();
    
    // Call the register method with the provided username, password, and email from the POST request
    $success = $userController->register($_POST['username'], $_POST['password'], $_POST['email']);
    
    // If registration is successful, redirect to the login page
    if ($success) {
        header('Location: login.php');
    } else {
        // If registration fails, include the error view to display an error message
        require 'VIEWS/error_view.php';
    }
} else {
    // If the request method is not POST, include the registration view to show the registration form
    require './VIEWS/register_view.php';
}
?>
