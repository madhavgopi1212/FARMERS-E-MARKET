<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="admin_styles.css">
    <style>
        body {
            background-color: #111;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        .dashboard-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: #1e1e1e;
            border-radius: 10px;
            box-shadow: 0 0 10px #444;
        }
        h2 {
            text-align: center;
            color: yellow;
            margin-bottom: 30px;
        }
        .nav-links {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        .nav-links a {
            background-color: #333;
            color: cyan;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            transition: background 0.3s;
        }
        .nav-links a:hover {
            background-color: #555;
            color: white;
        }
        .logout-btn {
            background-color: red;
            color: white;
            border: none;
            padding: 12px;
            width: 100%;
            margin-top: 30px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
        }
        .logout-btn:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome, Admin 👨‍🌾</h2>

        <div class="nav-links">
            <a href="manage_products.php">📦 Manage Products</a>
            <a href="manage_users.php">👥 Manage Users</a>
            <a href="view_orders.php">📑 View Orders</a>
        </div>

        <form method="post" action="admin_logout.php">
            <input type="submit" class="logout-btn" value="Logout">
        </form>
    </div>
</body>
</html>
