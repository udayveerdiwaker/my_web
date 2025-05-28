<?php
include 'connection.php'; // Include your DB connection file
?>
<!DOCTYPE html>
<html>
<head>
    <title>Show Categories</title>
</head>
<body>

<h2>All Categories</h2>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Category Name</th>
        <th>Created At</th>
    </tr>

    <?php
    $query = "SELECT * FROM categories ORDER BY id DESC";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>{$row['created_at']}</td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>No categories found.</td></tr>";
    }
    ?>
</table>

</body>
</html>
