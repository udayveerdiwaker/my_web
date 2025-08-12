<?php

$show_form = true;
$thank_you = false;
$error = '';
$username = '';
$email = '';

// // Process form submission
// if (isset($_POST['register'])) {
//     // Get form data
//     $username = mysqli_real_escape_string($conn, $_POST['username']);
//     $email = mysqli_real_escape_string($conn, $_POST['email']);
//     $password = mysqli_real_escape_string($conn, $_POST['password']);


//     // Check if email exists
//     $check_email = mysqli_query($conn, "SELECT * FROM `users_register` WHERE email = '$email'");

//     if (mysqli_num_rows($check_email) > 0) {
//         $error = "This $email already registered";
//     } else {
//         // Insert new user
//         $insert = mysqli_query($conn, "INSERT INTO `users_register` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
//         if ($insert) {
//             $show_form = false;
//             $thank_you = true;
//         } else {
//             $error = "Registration failed. Please try again.";
//         }
//     }
// }



// login



if (isset($_POST['register'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM `users_register` WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists.";
    } else {
        $insert = mysqli_query($conn, "INSERT INTO `users_register` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
        if ($insert) {
            $show_form = false;
            $thank_you = true;
            $success = "Registration successful!";
            $_SESSION['user_email'] = $email;
            header("Refresh: 1; url=login.php");
        } else {
            $error = "Error: " . mysqli_error($conn);
        }
    }
}