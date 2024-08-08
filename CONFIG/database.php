<?php
namespace Config;

class Database
{
    private $host = "localhost";
    private $db_name = "blog_db";
    private $username = "root";
    private $password = "";

    public $conn;

    // Method to establish a database connection
    public function connect()
    {
        $this->conn = null;
        try {
            // Create a new PDO instance
            $this->conn = new \PDO("mysql:host=" . $this->host, $this->username, $this->password);
            // Set the character set to UTF-8
            $this->conn->exec("set names utf8");
            // Initialize the database (create if it doesn't exist)
            $this->initializeDatabase();
        } catch (\PDOException $exception) {
            // Handle connection error
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }

    // Method to initialize the database and its tables
    private function initializeDatabase()
    {
        // Hash the default admin password
        $adminPassword = password_hash("password", PASSWORD_BCRYPT);
        // Check if the database exists
        $stmt = $this->conn->query("SHOW DATABASES LIKE '$this->db_name'");
        if ($stmt->rowCount() == 0) {
            // SQL queries to create the database and tables if they don't exist
            $queries = [
                "CREATE DATABASE IF NOT EXISTS $this->db_name",
                "USE $this->db_name",
                "CREATE TABLE IF NOT EXISTS users (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50) NOT NULL UNIQUE,
                    password VARCHAR(255) NOT NULL,
                    email VARCHAR(100) NOT NULL UNIQUE,
                    is_admin BOOLEAN DEFAULT 0,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
                )",
                "CREATE TABLE IF NOT EXISTS posts (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    title VARCHAR(100) NOT NULL,
                    content TEXT NOT NULL,
                    author_id INT,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    FOREIGN KEY (author_id) REFERENCES users(id) ON DELETE SET NULL
                )",
                "CREATE TABLE IF NOT EXISTS comments (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    post_id INT,
                    user_id INT,
                    content TEXT NOT NULL,
                    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                    FOREIGN KEY (post_id) REFERENCES posts(id) ON DELETE CASCADE,
                    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
                )",
                // Insert default admin user
                "INSERT INTO users (username, password, email, is_admin) VALUES ('admin', '$adminPassword', 'admin@example.com', 1)
                    ON DUPLICATE KEY UPDATE username=username",
                // Insert default user
                "INSERT INTO users (username, password, email) VALUES ('user1', '$adminPassword', 'user1@example.com')
                    ON DUPLICATE KEY UPDATE username=username",
                // Insert a default post
                "INSERT INTO posts (title, content, author_id) VALUES ('First Post', 'This is the content of the first post.', 1)
                    ON DUPLICATE KEY UPDATE title=title",
                // Insert a default comment
                "INSERT INTO comments (post_id, user_id, content) VALUES (1, 2, 'This is a comment on the first post.')
                    ON DUPLICATE KEY UPDATE content=content"
            ];

            // Execute each query
            foreach ($queries as $query) {
                $this->conn->exec($query);
            }
        } else {
            // If the database exists, select it
            $this->conn->exec("USE $this->db_name");
        }
    }
}
?>
