<?php
// Use the CommentController class from the Controllers namespace
use Controllers\CommentController;

// Include the CommentController.php file
require_once __DIR__ . '/CONTROLLERS/CommentController.php';

// Start the session
session_start();

// Check if the user is logged in by verifying if 'user' is set in the session
if (isset($_SESSION['user'])) {
    // Instantiate the CommentController
    $commentController = new CommentController();
    
    // Call the deleteComment method with the provided id from the GET request
    $success = $commentController->deleteComment($_GET['id']);
    
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
