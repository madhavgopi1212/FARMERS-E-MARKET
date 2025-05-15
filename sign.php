<?php
include("connection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    if (!empty($full_name) && !empty($email) && !empty($password) && !empty($role)) {
        $check_query = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($con, $check_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Email already registered! Please login.'); window.location='loginpage.php';</script>";
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ssss", $full_name, $email, $hashed_password, $role);

        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['email'] = $email;
            $_SESSION['role'] = $role;
            echo "<script>alert('Signup successful!'); window.location='index1.php';</script>";
            exit();
        } else {
            echo "<script>alert('Signup failed. Try again.');</script>";
        }
    } else {
        echo "<script>alert('All fields are required.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="login.css">
</head>
<body class="background-section">
    <div class="main-section">
        <h2>Sign Up</h2>
        <form method="POST">
            <p>Full Name</p>
            <input type="text" name="full_name" placeholder="Enter full name" required>
            
            <p>Email</p>
            <input type="email" name="email" placeholder="Enter email" required>

            <p>Password</p>
            <input type="password" name="password" placeholder="Enter password" required>

            <p>Role</p>
            <select name="role" required>
                <option value="">-- Select Role --</option>
                <option value="farmer">Farmer</option>
                <option value="buyer">Buyer</option>
                <option value="admin">Admin</option>
            </select>

            <div class="button"><button type="submit">Register</button></div>
            <p>Already have an account? <a href="loginpage.php">Login here</a></p>
        </form>
    </div>
</body>
</html>
