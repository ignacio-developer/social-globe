<?php
require_once __DIR__ . '/../src/controllers/AuthController.php';
session_start();

if (isset($_SESSION['flash_message'])) {
    echo "<p style='color: green;'>" . $_SESSION['flash_message'] . "</p>";
    unset($_SESSION['flash_message']); // Clear the flash message
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = AuthController::login($username, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: profile.php');
    } else {
        echo "<p style='color: red;'>Login failed. Please check your credentials.</p>";
    }
}
?>

<form method="POST">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login</button>
</form>
