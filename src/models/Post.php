<?php
require_once __DIR__ . '/../config/database.php';

class Post {
    private $db;

    public function __construct() {
        $this->db = (new Database())->connection;
    }

    public function createPost($userId, $content) {
        $stmt = $this->db->prepare("INSERT INTO posts (user_id, content) VALUES (:user_id, :content)");
        return $stmt->execute(['user_id' => $userId, 'content' => $content]);
    }

    public function getUserPosts($userId) {
        $stmt = $this->db->prepare("SELECT * FROM posts WHERE user_id = :user_id ORDER BY created_at DESC");
        //$stmt->execute(['user_id' => $userId]);
        //return $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Check if execution is successful
        if ($stmt->execute(['user_id' => $userId])) {
            // Fetch results only if execution succeeds
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //var_dump($results); // View fetched data
            return $results;
        } else {
            // Handle errors
            $errorInfo = $stmt->errorInfo(); // Returns an array with error details
            throw new Exception('Query failed: ' . implode(' ', $errorInfo));
        }
    }
}
