<?php
namespace Controllers;

use Models\Comment;
use Config\Database;

// Include the Comment model and the Database configuration
require_once __DIR__ . '/../MODELS/Comment.php';
require_once __DIR__ . '/../CONFIG/database.php';

class CommentController
{
    private $commentModel;

    // Constructor to initialize the Comment model with a database connection
    public function __construct()
    {
        // Create a new Database instance
        $db = new Database();
        // Initialize the Comment model with the database connection
        $this->commentModel = new Comment($db->connect());
    }

    // Method to create a new comment
    public function createComment($post_id, $user_id, $content)
    {
        return $this->commentModel->createComment($post_id, $user_id, $content);
    }

    // Method to get all comments for a specific post
    public function getCommentsByPost($post_id)
    {
        return $this->commentModel->getCommentsByPost($post_id);
    }

    // Method to delete a comment by ID
    public function deleteComment($id)
    {
        return $this->commentModel->deleteComment($id);
    }
}
?>
