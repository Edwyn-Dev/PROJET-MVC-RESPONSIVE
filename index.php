<?php
// Use the PostController class from the Controllers namespace
use Controllers\PostController;

// Include the PostController.php file
require_once __DIR__ . '/CONTROLLERS/PostController.php';

// Instantiate the PostController
$postController = new PostController();

// Call the getAllPosts method to retrieve all posts
$posts = $postController->getAllPosts();

// Include the index view to display the posts
require './VIEWS/index_view.php';
?>
