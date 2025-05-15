<?php
session_start();

// Hardcoded admin credentials (You can customize it)
$admin_email = "admin@farmersite.com";
$admin_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if ($email === $admin_email && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin_dashboard.php");
        exit();
    } else {
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
    <div class="admin-login-container">
        <h2>Admin Login</h2>

        <?php if (isset($error)) echo "<p class='error-msg'>$error</p>"; ?>

        <form method="POST" action="">
            <label>Email:</label><br>
            <input type="email" name="email" required><br><br>

            <label>Password:</label><br>
            <input type="password" name="password" required><br><br>

            <input type="submit" class="login-btn" value="Login">
        </form>
    </div>
</body>
</html>
