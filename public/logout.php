<?php
session_start();

// Save the flash message before destroying the session
$flash_message = "You have been logged out successfully.";

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Restart the session to set the flash message
session_start();
$_SESSION['flash_message'] = $flash_message;

// Redirect to the login page
header("Location: login.php");
exit;
