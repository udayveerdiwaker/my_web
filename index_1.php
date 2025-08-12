<?php
session_start();
include_once 'connection.php'; // DB Connection

// Handle Email Check (AJAX)
if (isset($_POST['check_email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check = mysqli_query($conn, "SELECT * FROM users_register WHERE email = '$email'");
    echo (mysqli_num_rows($check) > 0) ? 'exists' : 'not_exists';
    exit;
}

// Handle Login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $check = mysqli_query($conn, "SELECT * FROM users_register WHERE email='$email'");
    if (mysqli_num_rows($check) == 1) {
        $user = mysqli_fetch_assoc($check);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user['username'];
            $_SESSION['user_id'] = $user['id'];
            echo 'login_success';
        } else {
            echo 'invalid_password';
        }
    } else {
        echo 'email_not_found';
    }
    exit;
}

// Handle Register
if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users_register WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        echo 'email_exists';
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users_register (username, email, password) VALUES ('$username', '$email', '$password')");
        if ($insert) {
            $_SESSION['user'] = $username;
            echo 'register_success';
        } else {
            echo 'register_error';
        }
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Email Access Flow</title>
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- Access Email Modal -->
    <div class="modal" id="emailModal">
        <div class="modal-content">
            <div class="modal-header green">
                <button class="close-btn" id="closeEmail"><i class="fas fa-times"></i></button>
                <h2>Welcome Back!</h2>
                <p>Enter your email to access your account</p>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="emailInput" placeholder="your.email@example.com">
                    </div>
                    <div class="error-message" id="emailError">Please enter a valid email</div>
                </div>
                <button class="submit-btn" id="emailSubmit">
                    <div class="loader" id="emailLoader"></div>
                    <span>Continue</span>
                </button>
                <div class="footer_1">
                    By continuing, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <div class="modal-header blue">
                <button class="close-btn" id="closeLogin"><i class="fas fa-times"></i></button>
                <h2>Login</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="loginEmail" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="loginPassword" placeholder="Enter password">
                    </div>
                </div>
                <button class="submit-btn" id="loginSubmit">Login</button>
                <div class="footer_1">
                    By continuing, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <div class="modal-header red">
                <button class="close-btn" id="closeRegister"><i class="fas fa-times"></i></button>
                <h2>Register</h2>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Username</label>
                    <div class="input-with-icon">
                        <i class="fas fa-user"></i>
                        <input type="text" id="registerUsername" placeholder="Your name">
                    </div>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="registerEmail" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-with-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" id="registerPassword" placeholder="Create password">
                    </div>
                </div>
                <button class="submit-btn" id="registerSubmit">Register</button>
                <div class="footer_1">
                    By continuing, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailModal = document.getElementById('emailModal');
            const loginModal = document.getElementById('loginModal');
            const registerModal = document.getElementById('registerModal');

            const emailInput = document.getElementById('emailInput');
            const emailSubmit = document.getElementById('emailSubmit');
            const emailLoader = document.getElementById('emailLoader');
            const emailError = document.getElementById('emailError');

            const loginEmail = document.getElementById('loginEmail');
            const loginPassword = document.getElementById('loginPassword');

            const registerUsername = document.getElementById('registerUsername');
            const registerEmail = document.getElementById('registerEmail');
            const registerPassword = document.getElementById('registerPassword');

            emailModal.style.display = 'flex';

            function isValidEmail(email) {
                const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                return re.test(email);
            }

            emailSubmit.addEventListener('click', function () {
                const email = emailInput.value.trim();
                if (!isValidEmail(email)) {
                    emailError.style.display = 'block';
                    return;
                }
                emailError.style.display = 'none';
                emailLoader.style.display = 'block';
                emailSubmit.querySelector('span').textContent = 'Checking...';

                fetch('', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'check_email=1&email=' + encodeURIComponent(email)
                })
                    .then(response => response.text())
                    .then(result => {
                        emailLoader.style.display = 'none';
                        emailSubmit.querySelector('span').textContent = 'Continue';
                        emailModal.style.display = 'none';
                        if (result === 'exists') {
                            loginEmail.value = email;
                            loginModal.style.display = 'flex';
                        } else {
                            registerEmail.value = email;
                            registerModal.style.display = 'flex';
                        }
                    });
            });

            document.getElementById('loginSubmit').addEventListener('click', function () {
                const email = loginEmail.value.trim();
                const password = loginPassword.value.trim();
                fetch('', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'login=1&email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password)
                })
                    .then(response => response.text())
                    .then(result => {
                        if (result === 'login_success') {
                            alert('Login Successful');
                            window.location.href = 'home.php';
                        } else if (result === 'invalid_password') {
                            alert('Incorrect Password');
                        } else {
                            alert('Email not found');
                        }
                    });
            });

            document.getElementById('registerSubmit').addEventListener('click', function () {
                const username = registerUsername.value.trim();
                const email = registerEmail.value.trim();
                const password = registerPassword.value.trim();
                fetch('', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'register=1&username=' + encodeURIComponent(username) + '&email=' + encodeURIComponent(email) + '&password=' + encodeURIComponent(password)
                })
                    .then(response => response.text())
                    .then(result => {
                        if (result === 'register_success') {
                            alert('Registration Successful');
                            window.location.href = 'home.php';
                        } else if (result === 'email_exists') {
                            alert('Email already exists');
                        } else {
                            alert('Registration Failed');
                        }
                    });
            });

            document.getElementById('closeEmail').onclick = () => emailModal.style.display = 'none';
            document.getElementById('closeLogin').onclick = () => loginModal.style.display = 'none';
            document.getElementById('closeRegister').onclick = () => registerModal.style.display = 'none';
        });
    </script>
</body>

</html>