<?php
// Database connection and registration logic
// include 'header.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error_message = 'Email already exists';
    } else {
        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            $success_message = 'Registration Successful!';
        } else {
            $error_message = "Error: " . mysqli_error($conn);
        }
    }
}
?>

<style>
    .hero-container {
        max-width: 1200px;
        width: 100%;
        text-align: center;
        padding: 40px;
        position: relative;
        z-index: 1;
    }

    .hero-container h1 {
        font-size: 3.5rem;
        font-weight: 800;
        margin-bottom: 20px;
        background: linear-gradient(90deg, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
        text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .hero-container p {
        font-size: 1.4rem;
        max-width: 700px;
        margin: 0 auto 40px;
        color: var(--dark-color);
        line-height: 1.6;
    }

    .features {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 30px;
        margin-bottom: 50px;
    }

    .feature-card {
        background: rgba(255, 255, 255, 0.85);
        border-radius: 20px;
        padding: 30px;
        width: 280px;
        box-shadow: var(--box-shadow);
        transition: var(--transition);
        backdrop-filter: blur(10px);
    }

    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
    }

    .feature-card i {
        font-size: 3rem;
        margin-bottom: 20px;
        background: linear-gradient(135deg, var(--primary-color), var(--accent-color));
        -webkit-background-clip: text;
        background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .feature-card h3 {
        font-size: 1.5rem;
        margin-bottom: 15px;
        color: var(--primary-color);
    }

    .feature-card p {
        font-size: 1rem;
        color: #555;
        margin: 0;
    }

    .btn-primary {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 50px;
        padding: 15px 40px;
        font-size: 1.2rem;
        font-weight: 600;
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
        transition: var(--transition);
        position: relative;
        overflow: hidden;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(67, 97, 238, 0.6);
    }

    .btn-primary:active {
        transform: translateY(1px);
    }

    .btn-primary::after {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: rgba(255, 255, 255, 0.1);
        transform: rotate(30deg);
        transition: var(--transition);
    }

    .btn-primary:hover::after {
        transform: rotate(30deg) translate(20%, 20%);
    }

    .modal-content {
        border-radius: 20px;
        overflow: hidden;
        border: none;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
        background: linear-gradient(145deg, #ffffff, #f0f0f0);
    }

    .modal-header {
        background: linear-gradient(to right, var(--primary-color), var(--accent-color));
        color: white;
        padding: 25px;
        border-bottom: none;
    }

    .modal-title {
        font-weight: 700;
        font-size: 1.8rem;
    }

    .modal-body {
        padding: 30px;
    }

    .form-group {
        margin-bottom: 25px;
        position: relative;
    }

    .form-control {
        height: 55px;
        border-radius: 12px;
        padding-left: 50px;
        border: 2px solid #e0e0e0;
        font-size: 1rem;
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 0.25rem rgba(67, 97, 238, 0.25);
    }

    .form-group i {
        position: absolute;
        left: 20px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--primary-color);
        font-size: 1.2rem;
    }

    .password-toggle {
        position: absolute;
        right: 20px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #777;
    }

    .btn-register {
        background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
        border: none;
        border-radius: 12px;
        padding: 14px;
        font-size: 1.1rem;
        font-weight: 600;
        width: 100%;
        color: white;
        transition: var(--transition);
        margin-top: 10px;
    }

    .btn-register:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(67, 97, 238, 0.4);
    }

    .modal-footer {
        border-top: none;
        padding: 20px 30px;
        background-color: #f8f9fa;
        border-radius: 0 0 20px 20px;
        justify-content: center;
    }

    .modal-footer a {
        color: var(--primary-color);
        font-weight: 600;
        text-decoration: none;
    }

    .modal-footer a:hover {
        text-decoration: underline;
    }

    .alert {
        border-radius: 12px;
        padding: 15px;
        margin-top: 20px;
    }

    /* Decorative elements */
    .circle {
        position: absolute;
        border-radius: 50%;
        z-index: -1;
    }

    .circle-1 {
        width: 300px;
        height: 300px;
        background: linear-gradient(135deg, rgba(67, 97, 238, 0.1), rgba(72, 149, 239, 0.1));
        top: 10%;
        left: 5%;
    }

    .circle-2 {
        width: 200px;
        height: 200px;
        background: linear-gradient(135deg, rgba(76, 201, 240, 0.1), rgba(67, 97, 238, 0.1));
        bottom: 10%;
        right: 5%;
    }

    /* Responsive design */
    @media (max-width: 992px) {
        .hero-container h1 {
            font-size: 2.8rem;
        }

        .hero-container p {
            font-size: 1.2rem;
        }
    }

    @media (max-width: 768px) {
        .hero-container {
            padding: 20px;
        }

        .hero-container h1 {
            font-size: 2.2rem;
        }

        .feature-card {
            width: 100%;
            max-width: 350px;
        }

        .modal-dialog {
            margin: 20px;
        }
    }

    @media (max-width: 576px) {
        .hero-container h1 {
            font-size: 1.8rem;
        }

        .hero-container p {
            font-size: 1rem;
        }

        .btn-primary {
            padding: 12px 30px;
            font-size: 1rem;
        }

        .modal-header {
            padding: 20px;
        }

        .modal-body {
            padding: 20px;
        }
    }
</style>- Decorative background elements -->

<!-- Register Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">
    Login
</button>
<div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="registerModalLabel">Create Your Account</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form method="post" action="">
                <div class="modal-body">
                    <?php if (isset($error_message)): ?>
                        <div class="alert alert-danger"><?php echo $error_message; ?></div>
                    <?php endif; ?>

                    <?php if (isset($success_message)): ?>
                        <div class="alert alert-success"><?php echo $success_message; ?></div>
                    <?php endif; ?>

                    <div class="form-group">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>

                    <div class="form-group">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password"
                            required>
                        <span class="password-toggle" id="passwordToggle">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>

                    <button type="submit" class="btn btn-register">Register Now</button>
                </div>
            </form>

            <div class="modal-footer">
                <p class="m-0">Already have an account? <a href="login.php">Sign In</a></p>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Show modal automatically on first visit
    document.addEventListener('DOMContentLoaded', function () {
        if (!localStorage.getItem("registerShown")) {
            const registerModal = new bootstrap.Modal(document.getElementById('registerModal'));
            registerModal.show();
            localStorage.setItem("registerShown", "true");
        }

        // Password toggle functionality
        const passwordToggle = document.getElementById('passwordToggle');
        const passwordInput = document.getElementById('password');

        passwordToggle.addEventListener('click', function () {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
        });
    });
</script>
</body>

</html>