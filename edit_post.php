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
    
    // Check if the request method is POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Call the updatePost method with the provided id, title, and content from the POST request
        $success = $postController->updatePost($_POST['id'], $_POST['title'], $_POST['content']);
        
        // If the update is successful, redirect to the index page
        if ($success) {
            header('Location: index.php');
        } else {
            // If the update fails, include the error view to display an error message
            require 'VIEWS/error_view.php';
        }
    } else {
        // If the request method is not POST, retrieve the post by id from the GET request
        $post = $postController->getPostById($_GET['id']);
        
        // Include the edit post view to display the post edit form
        require './VIEWS/edit_post_view.php';
    }
} else {
    // If the user is not logged in, redirect to the index page
    header('Location: index.php');
}
?>
