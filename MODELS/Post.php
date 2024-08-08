<?php
namespace Models;

class Post
{
    private $db;

    // Constructor to initialize the database connection
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Method to get all posts with author information
    public function getAllPosts()
    {
        // Prepare the SQL query to select all posts and join with users table
        $stmt = $this->db->query("
            SELECT posts.*, users.username as author 
            FROM posts 
            LEFT JOIN users ON posts.author_id = users.id
        ");
        // Fetch and return all results
        return $stmt->fetchAll();
    }

    // Method to get all posts by a specific user with author information
    public function getAllPostsByUser($userId)
    {
        // Prepare the SQL statement to select posts by user ID and join with users table
        $stmt = $this->db->prepare("
            SELECT posts.*, users.username as author 
            FROM posts 
            LEFT JOIN users ON posts.author_id = users.id 
            WHERE posts.author_id = ?
        ");
        // Execute the statement with the provided user ID
        $stmt->execute([$userId]);
        // Fetch and return all results
        return $stmt->fetchAll();
    }

    // Method to create a new post
    public function createPost($title, $content, $author_id)
    {
        // Prepare the SQL statement to insert a new post
        $stmt = $this->db->prepare("INSERT INTO posts (title, content, author_id) VALUES (?, ?, ?)");
        // Execute the statement with the provided title, content, and author ID
        return $stmt->execute([$title, $content, $author_id]);
    }

    // Method to get a post by its ID with author information
    public function getPostById($id)
    {
        // Prepare the SQL statement to select a post by ID and join with users table
        $stmt = $this->db->prepare("
            SELECT posts.*, users.username as author 
            FROM posts 
            LEFT JOIN users ON posts.author_id = users.id 
            WHERE posts.id = ?
        ");
        // Execute the statement with the provided post ID
        $stmt->execute([$id]);
        // Fetch and return the result
        return $stmt->fetch();
    }

    // Method to update a post by its ID
    public function updatePost($id, $title, $content)
    {
        // Prepare the SQL statement to update a post by ID
        $stmt = $this->db->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
        // Execute the statement with the provided title, content, and post ID
        return $stmt->execute([$title, $content, $id]);
    }

    // Method to delete a post by its ID
    public function deletePost($id)
    {
        // Prepare the SQL statement to delete a post by ID
        $stmt = $this->db->prepare("DELETE FROM posts WHERE id = ?");
        // Execute the statement with the provided post ID
        return $stmt->execute([$id]);
    }

    // Method to search posts by their title
    public function searchPostsByName($name)
    {
        // Prepare the SQL statement to search posts by title and join with users table
        $stmt = $this->db->prepare("
            SELECT posts.*, users.username as author 
            FROM posts 
            LEFT JOIN users ON posts.author_id = users.id 
            WHERE posts.title LIKE ?
        ");
        // Execute the statement with the provided name pattern
        $stmt->execute(['%' . $name . '%']);
        // Fetch and return all results
        return $stmt->fetchAll();
    }
}
?>
