<?php
// include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // You should hash this password in production

    // Check if email already exists
    $check = mysqli_query($conn, "SELECT * FROM `users_register` WHERE email = '$email'");
    if (mysqli_num_rows($check) > 0) {
        echo "exists"; // Email already registered
    } else {
        // Insert new user
        $insert = mysqli_query($conn, "INSERT INTO `users_register` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
        if ($insert) {
            $_SESSION['user'] = $username;
            echo "success";
        } else {
            echo "error";
        }
    }
}
?>