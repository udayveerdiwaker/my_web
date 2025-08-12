<?php
include 'connection.php';
session_start();

$show_form = true;
$error = '';
$email = isset($_GET['email']) ? $_GET['email'] : '';

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM users_register WHERE email='$email'");
    if (mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php?home=home");
            exit();
        } else {
            $error = "Incorrect password.";
        }
    } else {
        $error = "Email not found.";
    }
}
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="popup.css">

<div class="modal" id="loginModal" style="display:flex;">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close-btn" onclick="closeModal()"><i class="fas fa-times"></i></button>
            <?php if ($show_form): ?>
                <h2>Login to Your Account</h2>
                <p>Enter your credentials to continue</p>
            <?php endif; ?>
        </div>

        <?php if ($show_form): ?>
            <div class="modal-body">
                <?php if (!empty($error)): ?>
                    <div class="error-message" style="display:block;"><?php echo $error; ?></div><?php endif; ?>
                <form method="post">
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
                            <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        </div>
                    </div>

                    <button type="submit" name="login" class="submit-btn">
                        <span>Login</span>
                    </button>
                </form>
            </div>
        <?php endif; ?>

        <div class="footer_1">
            Don't have an account? <a href="popup.php?email=<?php echo urlencode($email); ?>">Register</a>
        </div>
    </div>
</div>

<script>
    function closeModal() {
        document.getElementById('loginModal').style.display = 'none';
    }
</script>