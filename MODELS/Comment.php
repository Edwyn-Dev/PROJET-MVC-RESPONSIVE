<?php
namespace Models;

class Comment
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Method to create a new comment
    public function createComment($post_id, $user_id, $content)
    {
        // Prepare the SQL statement to insert a new comment
        $stmt = $this->db->prepare("INSERT INTO comments (post_id, user_id, content) VALUES (?, ?, ?)");
        // Execute the statement with the provided parameters
        return $stmt->execute([$post_id, $user_id, $content]);
    }

    // Method to get all comments for a specific post
    public function getCommentsByPost($post_id)
    {
        // Prepare the SQL statement to select comments and join with users table
        $stmt = $this->db->prepare("SELECT comments.*, users.username FROM comments LEFT JOIN users ON comments.user_id = users.id WHERE post_id = ?");
        // Execute the statement with the provided post ID
        $stmt->execute([$post_id]);
        // Fetch and return all results
        return $stmt->fetchAll();
    }

    // Method to delete a comment by ID
    public function deleteComment($id)
    {
        // Prepare the SQL statement to delete a comment by ID
        $stmt = $this->db->prepare("DELETE FROM comments WHERE id = ?");
        // Execute the statement with the provided comment ID
        return $stmt->execute([$id]);
    }
}
?>
