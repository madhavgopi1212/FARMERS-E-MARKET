<?php
include("connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    if (!empty($email) && !empty($password) && !empty($role)) {
        $query = "SELECT * FROM users WHERE email = ? AND role = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $email, $role);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['role'] = $role;

                if ($role === "admin") {
                    header("Location: admin_dashboard.php");
                } else {
                    header("Location: index1.php");
                }
                exit();
            } else {
                echo "<script>alert('Incorrect password.');</script>";
            }
        } else {
            echo "<script>alert('User not found or incorrect role.');</script>";
        }
    } else {
        echo "<script>alert('All fields are required.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body class="background-section">
    <div class="main-section">
        <h2>Login</h2>
        <form method="POST">
            <p>Email</p>
            <input type="email" name="email" placeholder="Enter your email" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter your password" required>
            <p>Role</p>
            <select name="role" required>
                <option value="">Select Role</option>
                <option value="farmer">Farmer</option>
                <option value="buyer">Buyer</option>
                <option value="admin">Admin</option>
            </select>
            <div class="button"><button type="submit">Login</button></div>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </form>
    </div>
</body>
</html>
