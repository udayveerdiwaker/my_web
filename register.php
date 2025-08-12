<?php
session_start();
?>

<link rel="stylesheet" href="popup.css">
<!-- Registration Modal -->
<div class="modal active" id="registerModal">
    <div class="modal-content">
        <button class="close" onclick="closeModal()">&times;</button>

        <?php if ($show_form): ?>
            <!-- Registration Form -->
            <h2>Register Now</h2>

            <?php if (!empty($error)): ?>
                <div class="error"><?php echo htmlspecialchars($error); ?></div>
            <?php endif; ?>

            <!-- <form method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required
                        value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter your username">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"
                        placeholder="your@email.com">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required
                        value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter your password">
                </div>

                <button type="submit" name="register" class="pop_btn">Continue</button>
                <div class="form-footer">
                    By registering, you agree to our Terms of Service
                </div>

            </form> -->

            <form method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required
                        value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter your username">
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($email); ?>"
                        placeholder="your@email.com">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                    <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>

                </div>

                <button type="submit" name="register" class="pop_btn">
                    <i class="bi bi-person-plus"></i> Register
                </button>
                <div class="form-footer">
                    <p>I have already registered? <a href="login.php" class="text-primary">Login</a></p>
                </div>

            </form>

        <?php elseif ($thank_you): ?>
            <!-- Thank You Message -->
            <div class="thank-you">
                <div class="thank-you-icon">✓</div>
                <h2>Registration Successful!</h2>
                <p>Thank you for joining us.</p>
                <p>A confirmation has been sent to <span
                        class="submitted-email"><?php echo htmlspecialchars($email); ?></span>
                </p>
                <button onclick="closeModal()" class="pop_btn">Continue to Site</button>
            </div>
        <?php endif; ?>
    </div>
</div>

<script>
    // Show modal on page load
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('registerModal');
        modal.classList.add('active');
    });

    // Close modal function
    function closeModal() {
        const modal = document.getElementById('registerModal');
        modal.classList.remove('active');
        setTimeout(() => {
            modal.style.display = 'none';
        }, 300); // Match the transition duration
    }

    // Close when clicking outside
    window.addEventListener('click', function (event) {
        const modal = document.getElementById('registerModal');
        if (event.target === modal) {
            closeModal();
        }
    });
</script>

<!-- 
<div class="auth-container">
    <div class="auth-card">
        <div class="auth-header">
            <h3><i class="bi bi-person-plus"></i> Create Account</h3>
        </div>

        <div class="auth-body">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <?php if (isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>

            <form method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                        required>
                </div>

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
                </div>

                <div class="form-group password-container">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        placeholder="Create password" required>
                    <i class="bi bi-eye-slash toggle-password" id="togglePassword"></i>
                </div>

                <button type="submit" class="btn btn-primary mt-3" name="signup">
                    <i class="bi bi-person-plus"></i> Sign Up
                </button>
            </form>
        </div>

        <div class="auth-footer">
            <p>Already have an account? <a href="signin.php" class="text-primary">Sign In</a></p>
        </div>
    </div>
</div> -->

<script>
    // Toggle password visibility
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function () {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>