<?php
include("connection.php");

if (isset($_GET['id'])) {
    $review_id = $_GET['id'];

    // Prepare and bind
    $stmt = $con->prepare("DELETE FROM user_reviews WHERE review_id = ?");
    $stmt->bind_param("i", $review_id);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Review deleted successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No review ID provided.";
}
?>
