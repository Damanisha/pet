<?php
session_start();

if (isset($_GET['logout'])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or index page
    header('Location: index.php');
    exit;
} else {
    echo "Error: Logout process failed.";
}
?>
