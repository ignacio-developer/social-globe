<?php
require_once __DIR__ . '/../models/Post.php';

class PostController {
    private $post;

    public function __construct(Post $post) {
        $this->post = $post;
    }

    public function createPost($userId, $content) {
        return $this->post->createPost($userId, $content);
    }

    public function getUserPosts($userId) {
        return $this->post->getUserPosts($userId);
    }
}
