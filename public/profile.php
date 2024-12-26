<?php
require_once __DIR__ . '/../src/controllers/PostController.php';
session_start();

// Redirect to login if user is not authenticated
if (!isset($_SESSION['user_id'])) {
    $_SESSION['flash_message'] = "You must log in to access your profile.";
    header('Location: login.php');
    exit;
}

$userId = $_SESSION['user_id'];
$username = $_SESSION['username'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $content = $_POST['content'];
    PostController::createPost($userId, $content);
}

$posts = PostController::getUserPosts($userId);
?>

<h1><?php echo ucfirst($username); ?> Posts</h1>
<a href="logout.php" style="color: red; text-decoration: none;">Logout</a> <!-- Logout link -->

<form method="POST">
    <textarea name="content" placeholder="What's on your mind?" required></textarea>
    <button type="submit">Post</button>
</form>

<?php foreach ($posts as $post): ?>
    <div>
        <p><?= htmlspecialchars($post['content']); ?></p>
        <small>Posted on <?= $post['created_at']; ?></small>
    </div>
<?php endforeach; ?>
