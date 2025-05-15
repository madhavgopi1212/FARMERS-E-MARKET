<?php
include("admin_auth.php");
include("connection.php");

$msg = "";

// Handle product update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update_product'])) {
    $product_id = $_POST['product_id'];
    $new_price = $_POST['price'];
    $new_stock = $_POST['stock'];

    $update_query = "UPDATE products SET price = ?, stock = ? WHERE id = ?";
    $stmt = $con->prepare($update_query);
    $stmt->bind_param("dii", $new_price, $new_stock, $product_id);
    if ($stmt->execute()) {
        $msg = "✅ Product updated successfully!";
    } else {
        $msg = "❌ Failed to update product.";
    }
    $stmt->close();
}

// Fetch all products
$query = "SELECT * FROM products ORDER BY id ASC";
$result = $con->query($query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Manage Products</title>
    <link rel="stylesheet" href="admin_styles.css">
    <style>
        .admin-container {
            width: 90%;
            margin: 30px auto;
            font-family: Arial, sans-serif;
        }
        .admin-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .success-msg {
            text-align: center;
            color: green;
            font-weight: bold;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }
        input[type="number"] {
            width: 80px;
            padding: 5px;
            text-align: center;
        }
        button {
            padding: 6px 12px;
            background-color: #2E8B57;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        button:hover {
            background-color: #256d46;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <h2>📦 Manage Products</h2>

        <?php if (!empty($msg)) echo "<p class='success-msg'>{$msg}</p>"; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Current Price (₹)</th>
                    <th>Stock</th>
                    <th>Update</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <form method="POST">
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td>
                                <input type="number" name="price" value="<?php echo $row['price']; ?>" step="0.01" required>
                            </td>
                            <td>
                                <input type="number" name="stock" value="<?php echo $row['stock']; ?>" required>
                            </td>
                            <td>
                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="update_product">Update</button>
                            </td>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
