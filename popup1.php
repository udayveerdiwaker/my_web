<?php
session_start();


include 'connection.php';
// <-- include your database connection

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM users_register WHERE email = '$email'");

    if (mysqli_num_rows($query) == 1) {
        $row = mysqli_fetch_assoc($query);

        // Compare passwords (you should hash passwords in real apps)
        if ($row['password'] === $password) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email'] = $row['email'];
            header("Location: dashboard.php");
            exit();
        } else {
            $_SESSION['error'] = "Invalid password";
            header("Location: login.php");
            exit();
        }
    } else {
        $_SESSION['error'] = "Email not found";
        header("Location: login.php");
        exit();
    }
}

?>

<link rel="stylesheet" href="popup.css">

<div class="login-box">
    <h3 class="text-center mb-3">Login</h3>

    <?php if (isset($_SESSION['error'])): ?>
        <div class="alert alert-danger"><?php echo $_SESSION['error'];
        unset($_SESSION['error']); ?></div>
    <?php endif; ?>

    <form method="POST" action="login_process.php">
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required />
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required />
        </div>
        <div class="d-grid">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
    </form>
</div>
</body>

</html>