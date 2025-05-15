<?php
include("admin_auth.php");
include("connection.php");

// Handle user deletion (optional)
if (isset($_GET['delete'])) {
    $delete_id = intval($_GET['delete']);
    $con->query("DELETE FROM users WHERE id = $delete_id");
    header("Location: manage_users.php");
    exit();
}

// Toggle user status
if (isset($_GET['toggle_status'])) {
    $user_id = intval($_GET['toggle_status']);
    $con->query("UPDATE users SET status = NOT status WHERE id = $user_id");
    header("Location: manage_users.php");
    exit();
}

// Fetch users
$search = $_GET['search'] ?? '';
$sql = "SELECT * FROM users WHERE name LIKE ? OR email LIKE ? ORDER BY created_at DESC";
$stmt = $con->prepare($sql);
$searchTerm = "%$search%";
$stmt->bind_param("ss", $searchTerm, $searchTerm);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users - Admin Panel</title>
    <link rel="stylesheet" href="admin_styles.css">
</head>
<body>
<div class="admin-container">
    <h2>Manage Users</h2>

    <form method="get" style="text-align:center; margin-bottom: 20px;">
        <input type="text" name="search" placeholder="Search by name or email" value="<?php echo htmlspecialchars($search); ?>">
        <button type="submit">Search</button>
    </form>

    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Status</th>
            <th>Registered On</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= htmlspecialchars($row['name']); ?></td>
                <td><?= htmlspecialchars($row['email']); ?></td>
                <td><?= htmlspecialchars($row['role']); ?></td>
                <td><?= $row['status'] ? 'Active' : 'Inactive'; ?></td>
                <td><?= date('d-m-Y', strtotime($row['created_at'])); ?></td>
                <td>
                    <a href="?toggle_status=<?= $row['id']; ?>" onclick="return confirm('Toggle user status?')">Toggle Status</a> |
                    <a href="?delete=<?= $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>
</body>
</html>
