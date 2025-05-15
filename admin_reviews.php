<?php
include("connection.php");

// Fetch all reviews from the database
$query = "SELECT * FROM user_reviews";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Reviews</title>
</head>
<body>
    <h1>Manage User Reviews</h1>
    <table border="1">
        <tr>
            <th>Review ID</th>
            <th>User ID</th>
            <th>Product ID</th>
            <th>Rating</th>
            <th>Comment</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $row['review_id']; ?></td>
            <td><?php echo $row['user_id']; ?></td>
            <td><?php echo $row['product_id']; ?></td>
            <td><?php echo $row['rating']; ?></td>
            <td><?php echo $row['comment']; ?></td>
            <td>
                <a href="delete_review.php?id=<?php echo $row['review_id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
