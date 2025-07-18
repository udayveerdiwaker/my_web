<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $_SESSION['error'] = "Email already registered";
    } else {
        mysqli_query($conn, "INSERT INTO users(email, password) VALUES('$email', '$pass')");
        $_SESSION['success'] = "Registered! Please login.";
    }
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Register Modal -->
    <div class="modal fade" id="registerModal" tabindex="-1">
        <div class="modal-dialog">
            <form method="POST" action="register_submit.php" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Register</h5>
                </div>
                <div class="modal-body">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required>
                    <input type="password" name="password" class="form-control mb-2" placeholder="Password" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>