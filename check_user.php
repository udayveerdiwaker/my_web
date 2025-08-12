<?php
include 'connection.php';

if (isset($_POST['email'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $check = mysqli_query($conn, "SELECT * FROM users_register WHERE email='$email'");

    if (mysqli_num_rows($check) > 0) {
        echo 'exists';
    } else {
        echo 'not_exists';
    }
}
?>