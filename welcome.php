<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="text-center mt-5">
    <h2>Welcome, <?= $_SESSION['username'] ?> 👋</h2>
    <a href="logout_1.php" class="btn btn-danger mt-3">Logout</a>
</body>

</html>