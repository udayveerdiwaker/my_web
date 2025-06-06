<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Popup</title>
    <style>
        :root {
            --primary-color: #34bf49;
            --primary-hover:rgb(44, 207, 69);
            --text-color: #2b2d42;
            --light-gray: #f8f9fa;
            --border-color: #e9ecef;
            --error-color: #ef233c;
            --success-color: #34bf20;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f5f7ff;
            color: var(--text-color);
            line-height: 1.6;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(5px);
            animation: fadeIn 0.3s ease-out;
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 2rem;
            width: 90%;
            max-width: 420px;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-20px);
            opacity: 0;
            animation: slideIn 0.3s ease-out forwards;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .close {
            color: #adb5bd;
            font-size: 1.75rem;
            font-weight: 300;
            cursor: pointer;
            transition: all 0.2s;
        }

        .close:hover {
            color: var(--text-color);
            transform: scale(1.1);
        }

        h2 {
            font-size: 1.75rem;
            font-weight: 600;
            color: var(--text-color);
        }

        .form-group {
            margin-bottom: 1.25rem;
            position: relative;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--text-color);
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--border-color);
            border-radius: 8px;
            font-size: 1rem;
            transition: all 0.3s;
            background-color: var(--light-gray);
        }

        input[type="text"]:focus,
        input[type="email"]:focus {
            outline: none;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
            background-color: white;
        }

        button {
            width: 100%;
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            transition: all 0.3s;
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

        /* Thank you message styles */
        .thank-you-message {
            display: none;
            text-align: center;
            padding: 1.5rem 0;
        }

        .thank-you-message h2 {
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .thank-you-message p {
            margin-bottom: 1.5rem;
            color: var(--text-color);
        }

        .thank-you-message .icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
            animation: bounce 0.5s;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            to {
                transform: translateY(0);
                opacity: 1;
            }
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
                padding: 1.5rem;
                margin: 20% auto;
            }

            h2 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body>
    <!-- The Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Register</h2>
                <span class="close">&times;</span>
            </div>

            <form id="registerForm">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required placeholder="Enter your username">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="your@email.com">
                </div>
                <button type="submit">Continue</button>
                <div class="form-footer">
                    By registering, you agree to our Terms of Service
                </div>
            </form>

            <!-- Thank you message (hidden by default) -->
            <div class="thank-you-message" id="thankYouMessage">
                <div class="icon">✓</div>
                <h2>Thank You!</h2>
                <p>Your registration has been successfully submitted.</p>
                <p>We've sent a confirmation email to <span id="submittedEmail"></span></p>
                <button onclick="document.getElementById('registerModal').style.display='none'">Close</button>
            </div>
        </div>
    </div>

    <script>
        // Get the modal
        const modal = document.getElementById("registerModal");

        // Get the <span> element that closes the modal
        const span = document.getElementsByClassName("close")[0];

        // When the page loads, open the modal 
        window.onload = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Handle form submission
        document.getElementById("registerForm").addEventListener("submit", function(e) {
            e.preventDefault();

            const username = document.getElementById("username").value;
            const email = document.getElementById("email").value;

            // Here you would typically send the data to your server
            console.log("Registration submitted:", {
                username,
                email
            });

            // Hide the form and show thank you message
            document.getElementById("registerForm").style.display = "none";

            // Display the submitted email in the thank you message
            document.getElementById("submittedEmail").textContent = email;

            // Show the thank you message
            document.getElementById("thankYouMessage").style.display = "block";
        });
    </script>
</body>

</html>