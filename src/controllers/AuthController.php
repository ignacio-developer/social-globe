<?php
require_once __DIR__ . '/../models/User.php';

class AuthController {
    public static function register($username, $password) {
        $user = new User();
        return $user->register($username, $password);
    }

    public static function login($username, $password) {
        $user = new User();
        return $user->login($username, $password);
    }
}
