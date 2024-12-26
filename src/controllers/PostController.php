<?php
require_once __DIR__ . '/../models/Post.php';

class PostController {
    public static function createPost($userId, $content) {
        $post = new Post();
        return $post->createPost($userId, $content);
    }

    public static function getUserPosts($userId) {
        $post = new Post();
        return $post->getUserPosts($userId);
    }
}
