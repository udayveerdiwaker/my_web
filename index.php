<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="popup.css">
</head>

<body>
    <div class="modal" id="emailModal">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close-btn" id="closeBtn">
                    <i class="fas fa-times"></i>
                </button>
                <h2>Welcome Back!</h2>
                <p>Enter your email to access your account</p>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-with-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" id="email" placeholder="your.email@example.com" autocomplete="off">
                    </div>
                    <div class="error-message" id="errorMessage">
                        Please enter a valid email address
                    </div>
                </div>

                <button class="submit-btn" id="submitBtn">
                    <div class="loader" id="loader"></div>
                    <span>Continue</span>
                </button>
            </div>

            <div class="footer_1">
                By continuing, you agree to our <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const emailModal = document.getElementById('emailModal');
            const emailInput = document.getElementById('email');
            const submitBtn = document.getElementById('submitBtn');
            const closeBtn = document.getElementById('closeBtn');
            const errorMessage = document.getElementById('errorMessage');
            const loader = document.getElementById('loader');

            // Show modal immediately
            setTimeout(() => {
                emailModal.style.display = 'flex';
                emailInput.focus();
            }, 1000);

            // Validate email function
            function isValidEmail(email) {
                const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(String(email).toLowerCase());
            }

            // Handle submit button click
            submitBtn.addEventListener('click', function () {
                const email = emailInput.value.trim();

                if (!isValidEmail(email)) {
                    errorMessage.style.display = 'block';
                    emailInput.focus();

                    // Shake animation for error
                    emailModal.animate([
                        { transform: 'translateX(0)' },
                        { transform: 'translateX(-10px)' },
                        { transform: 'translateX(10px)' },
                        { transform: 'translateX(0)' }
                    ], {
                        duration: 400,
                        iterations: 1
                    });

                    return;
                }

                // Clear error and show loading
                errorMessage.style.display = 'none';
                loader.style.display = 'block';
                submitBtn.querySelector('span').textContent = 'Processing...';
                submitBtn.disabled = true;

                // Simulate API call to check user
                setTimeout(function () {
                    // In a real app, this would be your fetch call to check_user.php
                    const userExists = Math.random() > 0.5; // Random for demo

                    loader.style.display = 'none';
                    submitBtn.querySelector('span').textContent = 'Continue';
                    submitBtn.disabled = false;

                    if (userExists) {
                        // Redirect to login page in real app
                        window.location.href = 'login.php?email=' + encodeURIComponent(email);
                    } else {
                        // Redirect to popup page in real app
                        window.location.href = 'popup.php?email=' + encodeURIComponent(email);
                    }
                }, 1500);
            });

            // Handle close button
            closeBtn.addEventListener('click', function () {
                emailModal.style.display = 'none';
                // alert('You need to enter your email to access the service');
            });

            // Validate on input change
            emailInput.addEventListener('input', function () {
                if (isValidEmail(emailInput.value.trim())) {
                    errorMessage.style.display = 'none';
                }
            });

            // Submit on Enter key
            emailInput.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    submitBtn.click();
                }
            });
        });
    </script>
</body>

</html>