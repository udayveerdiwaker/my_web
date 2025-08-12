<?php
// include 'connection.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // Password should be hashed and verified

    $query = mysqli_query($conn, "SELECT * FROM `users_register` WHERE `email` = '$email' AND `password` = '$password'");

    if (mysqli_num_rows($query) == 1) {
        $user = mysqli_fetch_assoc($query);
        $_SESSION['user'] = $user['username'];
        $_SESSION['user_id'] = $user['id'];
        echo "success";
    } else {
        echo "invalid";
    }
}
?>