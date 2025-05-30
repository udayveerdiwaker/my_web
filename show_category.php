<?php
include 'connection.php'; // Database connection
?>
<!DOCTYPE html>
<html>

<head>
    <title>Show Categories</title>
    <style>
        table {
            border-collapse: collapse;
            width: 60%;
            margin: 20px auto;
        }

        th,
        td {
            padding: 12px;
            border: 1px solid #aaa;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>

<body>

    <h2>All Categories</h2>

    <table>
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
                    <td>" . htmlspecialchars($row['id']) . "</td>
                    <td>" . htmlspecialchars($row['name']) . "</td>
                    <td>" . date('M d, Y', strtotime($row['created_at'])) . "</td>
                  </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No categories found.</td></tr>";
        }
        ?>
    </table>

</body>

</html>