<?php
require_once __DIR__ . '/../src/controllers/AuthController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (AuthController::register($username, $password)) {
        header('Location: login.php');
    } else {
        echo "Registration failed.";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Register</button>
</form>
