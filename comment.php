<?php
// Use the CommentController class from the Controllers namespace
use Controllers\CommentController;

// Include the CommentController.php file
require_once __DIR__ . '/CONTROLLERS/CommentController.php';

// Start the session
session_start();

// Check if the request method is POST and if the user is logged in
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
    // Instantiate the CommentController
    $commentController = new CommentController();
    
    // Call the createComment method with the provided post_id, user_id, and content from the POST request
    $success = $commentController->createComment($_POST['post_id'], $_SESSION['user']['id'], $_POST['content']);
    
    // If the comment creation is successful, redirect to the index page
    if ($success) {
        header('Location: index.php');
    } else {
        // If the comment creation fails, include the error view to display an error message
        require 'VIEWS/error_view.php';
    }
} else {
    // If the request method is not POST or the user is not logged in, redirect to the index page
    header('Location: index.php');
}
?>
