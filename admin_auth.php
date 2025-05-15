<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    // Redirect to admin login page if not authenticated
    header("Location: admin_login.php");
    exit();
}
?>
