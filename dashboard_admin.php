<?php
// Use the PostController class from the Controllers namespace
use Controllers\PostController;

// Include the PostController.php file
require_once __DIR__ . '/CONTROLLERS/PostController.php';

// Start the session
session_start();

// Check if the logged-in user is an admin by verifying the 'is_admin' flag in the session
if ($_SESSION['user']['is_admin']) {
    // Instantiate the PostController
    $postController = new PostController();
    
    // Call the getAllPosts method to retrieve all posts
    $posts = $postController->getAllPosts();
    
    // Include the admin view to display the posts for admin management
    require './VIEWS/admin_view.php';
} else {
    // If the user is not an admin, redirect to the index page
    header('Location: index.php');
}
?>
