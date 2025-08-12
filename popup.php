<?php
// include 'connection.php';
// session_start();

$show_form = true;
$thank_you = false;
$error = '';
$username = '';
$email = isset($_GET['email']) ? $_GET['email'] : '';

if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users_register WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists.";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users_register (username, email, password) VALUES ('$username', '$email', '$password')");
        if ($insert) {
            $_SESSION['user_email'] = $email;
            $show_form = false;
            $thank_you = true;
            header("Refresh: 2; url=login.php?email=" . urlencode($email));
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="popup.css"> <!-- Keep your existing CSS file -->

<div class="modal" id="registerModal" style="display:flex;">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close-btn" onclick="closeModal()"><i class="fas fa-times"></i></button>
            <?php if ($show_form): ?>
                <h2>Create Account</h2>
                <p>Register with your details to continue</p>
            <?php else: ?>
                <h2>Registration Successful!</h2>
                <p>Redirecting to login page...</p>
            <?php endif; ?>
        </div>

        <?php if ($show_form): ?>
            <div class="modal-body">
                <?php if (!empty($error)): ?>
                    <div class="error-message" style="display:block;"><?php echo $error; ?></div><?php endif; ?>
                <form method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-with-icon">
                            <i class="fas fa-user"></i>
                            <input type="text" id="username" name="username" placeholder="Enter your name" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <div class="input-with-icon">
                            <i class="fas fa-envelope"></i>
                            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>"
                                required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-with-icon">
                            <i class="fas fa-lock"></i>
                            <input type="password" id="password" name="password" placeholder="Create a password" required>
                        </div>
                    </div>

                    <button type="submit" name="register" class="submit-btn">
                        <span>Register</span>
                    </button>
                </form>
            </div>
        <?php else: ?>
            <div class="modal-body">
                <div class="thank-you-icon">✓</div>
                <h3>Thanks for registering!</h3>
                <p>You'll be redirected shortly...</p>
            </div>
        <?php endif; ?>

        <div class="footer_1">
            Already have an account? <a href="login.php?email=<?php echo urlencode($email); ?>">Login</a>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        document.getElementById('registerModal').style.display = 'none';
    }
</script>