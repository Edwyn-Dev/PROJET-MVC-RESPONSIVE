<?php
namespace Controllers;

use Models\Post;
use Config\Database;

// Include the Post model and the Database configuration
require_once __DIR__ . '/../MODELS/Post.php';
require_once __DIR__ . '/../CONFIG/database.php';

class PostController
{
    private $postModel;

    // Constructor to initialize the Post model with a database connection
    public function __construct()
    {
        // Create a new Database instance
        $db = new Database();
        // Initialize the Post model with the database connection
        $this->postModel = new Post($db->connect());
    }

    // Method to get all posts
    public function getAllPosts()
    {
        return $this->postModel->getAllPosts();
    }

    // Method to get all posts by a specific user
    public function getAllPostsByUser($userId)
    {
        return $this->postModel->getAllPostsByUser($userId);
    }

    // Method to create a new post
    public function createPost($title, $content, $author_id)
    {
        return $this->postModel->createPost($title, $content, $author_id);
    }

    // Method to get a post by its ID
    public function getPostById($id)
    {
        return $this->postModel->getPostById($id);
    }

    // Method to update a post by its ID
    public function updatePost($id, $title, $content)
    {
        return $this->postModel->updatePost($id, $title, $content);
    }

    // Method to delete a post by its ID
    public function deletePost($id)
    {
        return $this->postModel->deletePost($id);
    }

    // Method to search posts by their title
    public function searchPostsByName($name)
    {
        return $this->postModel->searchPostsByName($name);
    }
}
?>
