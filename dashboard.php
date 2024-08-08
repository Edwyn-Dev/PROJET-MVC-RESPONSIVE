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
    
    // Call the getAllPostsByUser method with the user's id to retrieve all posts by the logged-in user
    $posts = $postController->getAllPostsByUser($_SESSION['user']['id']);
    
    // Include the dashboard view to display the user's posts
    require './VIEWS/dashboard_view.php';
} else {
    // If the user is not logged in, redirect to the login page
    header('Location: login.php');
}
?>
