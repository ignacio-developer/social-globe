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
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
