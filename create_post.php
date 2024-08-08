<?php
// Use the PostController class from the Controllers namespace
use Controllers\PostController;

// Include the PostController.php file
require_once __DIR__ . '/CONTROLLERS/PostController.php';

// Start the session
session_start();

// Check if the user is logged in by verifying if 'user' is set in the session
if (isset($_SESSION['user'])) {
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Instantiate the PostController
        $postController = new PostController();
        
        // Call the createPost method with the provided title, content, and user id from the POST request
        $success = $postController->createPost($_POST['title'], $_POST['content'], $_SESSION['user']['id']);
        
        // If the post creation is successful, redirect to the dashboard page
        if ($success) {
            header('Location: dashboard.php');
            exit(); // Ensure no further code is executed after the redirect
        } else {
            // If the post creation fails, include the error view to display an error message
            require 'VIEWS/error_view.php';
        }
    } else {
        // If the request method is not POST, include the create post view to show the post creation form
        require './VIEWS/create_post_view.php';
    }
} else {
    // If the user is not logged in, redirect to the index page
    header('Location: index.php');
    exit(); // Ensure no further code is executed after the redirect
}
?>
