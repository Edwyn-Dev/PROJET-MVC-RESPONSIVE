<?php
// Use the PostController class from the Controllers namespace
use Controllers\PostController;

// Include the PostController.php file
require_once __DIR__ . '/CONTROLLERS/PostController.php';

// Check if the 'query' parameter is set in the URL
if (isset($_GET['query'])) {
    // Assign the 'query' parameter value to the $query variable
    $query = $_GET['query'];
    
    // Instantiate the PostController
    $postController = new PostController();
    
    // Call the searchPostsByName method with the query to get matching posts
    $posts = $postController->searchPostsByName($query);
    
    // Include the search results view to display the posts
    require './VIEWS/search_results_view.php';
} else {
    // If 'query' is not set, redirect to the index page
    header('Location: index.php');
}
?>
