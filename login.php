<?php 
include("connection.php");
session_start(); // Start session

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = mysqli_real_escape_string($con, $_POST['email1']);
    $password = $_POST['password1'];

    if (!empty($email) && !empty($password)) {
        // Fetch user data from database
        $query = "SELECT * FROM registration WHERE email = '$email'";
        $result = mysqli_query($con, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // Verify hashed password
            if (password_verify($password, $row['password'])) {
                $_SESSION['email'] = $email;
                $_SESSION['contact'] = $row['contact'];

                // 🚀 Redirect to homepage/dashboard instead of payment page
                header("Location: homepage.php"); // Change this to your actual homepage
                exit();
            } else {
                echo "Invalid password. Please try again.";
            }
        } else {
            echo "User not found!";
        }
    } else {
        echo "Please enter all details.";
    }
}
?>
