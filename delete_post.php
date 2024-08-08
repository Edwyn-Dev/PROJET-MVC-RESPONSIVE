<?php
// Use the PostController class from the Controllers namespace
use Controllers\PostController;

// Include the PostController.php file
require_once __DIR__ . '/CONTROLLERS/PostController.php';

// Start the session
session_start();

// Check if the user is logged in by verifying if 'user' is set in the session
if (isset($_SESSION['user'])) {
    // Instantiate the PostController
    $postController = new PostController();
    
    // Call the deletePost method with the provided id from the GET request
    $success = $postController->deletePost($_GET['id']);
    
    // If the deletion is successful, redirect to the index page
    if ($success) {
        header('Location: index.php');
    } else {
        // If the deletion fails, include the error view to display an error message
        require 'VIEWS/error_view.php';
    }
} else {
    // If the user is not logged in, redirect to the index page
    header('Location: index.php');
}
?>
