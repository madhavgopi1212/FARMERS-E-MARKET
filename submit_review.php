<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; // Assuming user_id is stored in session
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    // Prepare and bind
    $stmt = $con->prepare("INSERT INTO user_reviews (user_id, product_id, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $user_id, $product_id, $rating, $comment);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Review submitted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
