<?php

$show_form = true;
$thank_you = false;
$error = '';
$username = '';
$email = '';

// Process form submission
if (isset($_POST['register'])) {
    // Get form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);


    // Check if email exists
    $check_email = mysqli_query($conn, "SELECT * FROM users_register WHERE email = '$email'");

    if (mysqli_num_rows($check_email) > 0) {
        $error = "This $email already registered";
    } else {
        // Insert new user
        $insert = mysqli_query($conn, "INSERT INTO users_register (username, email) VALUES ('$username', '$email')");
        if ($insert) {
            $show_form = false;
            $thank_you = true;
        } else {
            $error = "Registration failed. Please try again.";
        }
    }
}
