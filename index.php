<?php
$show_form = true;
$thank_you = false;
$error = '';
$username = '';
$email = '';
$openModal = ''; // empty by default

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $check = mysqli_query($conn, "SELECT * FROM users_register WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "This email is already registered. Please log in.";
        $openModal = 'login';
    } else {
        $insert = mysqli_query($conn, "INSERT INTO users_register (username, email) VALUES ('$username', '$email')");
        if ($insert) {
            $thank_you = true;
        } else {
            $error = "Something went wrong. Try again.";
            $openModal = 'register';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Auto Register/Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .modal {
            display: none;
            background: rgba(0, 0, 0, 0.6);
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .modal.show {
            display: flex !important;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 10px;
            max-width: 400px;
            width: 100%;
            position: relative;
        }

        .close {
            position: absolute;
            top: 10px;
            right: 15px;
            border: none;
            font-size: 24px;
            background: none;
        }
    </style>
</head>

<body>

    <!-- Register Modal -->
    <div class="modal" id="registerModal">
        <div class="modal-content">
            <button class="close" onclick="closeModal('registerModal')">&times;</button>
            <?php if ($thank_you): ?>
                <h4>Thank you for registering!</h4>
            <?php else: ?>
                <h4 class="mb-3">Register</h4>
                <?php if ($error && $openModal == 'register'): ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>
                <form method="POST">
                    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required
                        value="<?= htmlspecialchars($username) ?>">
                    <input type="email" name="email" class="form-control mb-2" placeholder="Email" required
                        value="<?= htmlspecialchars($email) ?>">
                    <button type="submit" name="register" class="btn btn-success w-100">Register</button>
                    <p class="mt-3">Already registered? <a href="#" onclick="switchTo('loginModal')">Login here</a></p>
                </form>
            <?php endif; ?>
        </div>
    </div>

    <!-- Login Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <button class="close" onclick="closeModal('loginModal')">&times;</button>
            <h4 class="mb-3">Login</h4>
            <?php if ($error && $openModal == 'login'): ?>
                <div class="alert alert-warning"><?= $error ?></div>
            <?php endif; ?>
            <form method="POST">
                <input type="email" class="form-control mb-2" placeholder="Email" required>
                <input type="password" class="form-control mb-2" placeholder="Password" required>
                <button type="submit" class="btn btn-primary w-100">Login</button>
                <p class="mt-3">Don't have an account? <a href="#" onclick="switchTo('registerModal')">Register</a></p>
            </form>
        </div>
    </div>

    <script>
        function closeModal(id) {
            document.getElementById(id).classList.remove("show");
        }
        function openModal(id) {
            document.getElementById(id).classList.add("show");
        }
        function switchTo(target) {
            closeModal('registerModal');
            closeModal('loginModal');
            setTimeout(() => openModal(target), 300);
        }

        // Auto-open correct modal
        window.addEventListener("DOMContentLoaded", () => {
            <?php if ($openModal == 'login'): ?>
                openModal('loginModal');
            <?php else: ?>
                openModal('registerModal');
            <?php endif; ?>
        });
    </script>

</body>

</html>