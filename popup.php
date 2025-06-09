
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Registration</title>
    <style>
        :root {
            --primary: #4CAF50;
            --primary-hover: #45a049;
            --primary-light: #e8f5e9;
            --error: #f44336;
            --error-light: #ffebee;
            --text: #333;
            --text-light: #666;
            --border: #e0e0e0;
            --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', 'Roboto', -apple-system, sans-serif;
            background-color: #f5f5f5;
            color: var(--text);
            line-height: 1.6;
        }

        .modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.6);
            backdrop-filter: blur(5px);
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 1000;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }

        .modal.active {
            opacity: 1;
            visibility: visible;
        }

        .modal-content {
            background-color: white;
            padding: 2.5rem;
            border-radius: 12px;
            width: 90%;
            max-width: 420px;
            box-shadow: var(--shadow);
            position: relative;
            transform: translateY(20px);
            transition: var(--transition);
        }

        .modal.active .modal-content {
            transform: translateY(0);
        }

        .close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            font-size: 1.5rem;
            cursor: pointer;
            color: var(--text-light);
            transition: var(--transition);
            background: none;
            border: none;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .close:hover {
            color: var(--text);
            background-color: #f5f5f5;
        }

        h2 {
            margin-bottom: 1.5rem;
            color: var(--text);
            font-weight: 600;
            font-size: 1.5rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text);
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 0.875rem 1rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 0.95rem;
            transition: var(--transition);
            background-color: #fafafa;
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.2);
            background-color: white;
        }

        button {
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.875rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            width: 100%;
            transition: var(--transition);
            margin-top: 0.5rem;
        }

        button:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button:active {
            transform: translateY(0);
        }

        .form-footer {
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.85rem;
            color: #6c757d;
        }

        .error {
            color: var(--error);
            background-color: var(--error-light);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .error:before {
            content: "!";
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 20px;
            height: 20px;
            background-color: var(--error);
            color: white;
            border-radius: 50%;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .thank-you {
            text-align: center;
            padding: 1rem 0;
        }

        .thank-you h2 {
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .thank-you p {
            margin-bottom: 1.5rem;
            color: var(--text);
        }

        .thank-you-icon {
            font-size: 3.5rem;
            color: var(--primary);
            margin-bottom: 1.5rem;
            display: inline-block;
            animation: bounce 0.6s;
        }

        .submitted-email {
            font-weight: 600;
            color: var(--primary);
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 480px) {
            .modal-content {
                padding: 1.75rem;
            }

            h2 {
                font-size: 1.3rem;
            }
        }
    </style>
</head>

<body>

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

                <form method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" required
                            value="<?php echo htmlspecialchars($username); ?>"
                            placeholder="Enter your username">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required
                            value="<?php echo htmlspecialchars($email); ?>"
                            placeholder="your@email.com">
                    </div>

                    <button type="submit" name="register">Continue</button>
                    <div class="form-footer">
                        By registering, you agree to our Terms of Service
                    </div>
                </form>

            <?php elseif ($thank_you): ?>
                <!-- Thank You Message -->
                <div class="thank-you">
                    <div class="thank-you-icon">✓</div>
                    <h2>Registration Successful!</h2>
                    <p>Thank you for joining us.</p>
                    <p>A confirmation has been sent to <span class="submitted-email"><?php echo htmlspecialchars($email); ?></span></p>
                    <button onclick="closeModal()">Continue to Site</button>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Show modal on page load
        document.addEventListener('DOMContentLoaded', function() {
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
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('registerModal');
            if (event.target === modal) {
                closeModal();
            }
        });
    </script>

</body>

</html>