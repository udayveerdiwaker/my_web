<?php
include 'connection.php';

// $sql = "SELECT `id`, `navbar_links`, `body` FROM `navigationbar` ";
// $result = mysqli_query($conn, $sql);
// // $rows = mysqli_fetch_assoc($result);
// // print_r($rows);
// // exit();


// $id = $_GET['id'];
// if(isset($id));
// exit;
// // echo ($id);
// $navbar_link = "SELECT * FROM `navigationbar`  WHERE `id` = '$id' ";
// $navigation = mysqli_query($conn, $navbar_link);
// $nav_all = mysqli_fetch_assoc($navigation);
// // print_r($rows);
// // exit();


// if (isset($_POST['update'])) {
//   $navbar_links = $_POST['navbar_links'];
//   $text = $_POST['text'];
//   $update = "UPDATE `navigationbar` SET `navbar_links` = '$navbar_links', `body`= '$text' WHERE `id` = '$id' ";
//   $result = mysqli_query($conn, $update);
//   // print_r($result);
//   // header("location:http://localhost/admin_panel/navigation_table.php");
// }

// // category
// $profession_table = "SELECT `id`, `profession` FROM `profession_categories` ";
// $tableresult = mysqli_query($conn, $profession_table);
// // $profession = mysqli_fetch_assoc($tableresult);
// // print_r($profession);
// // exit();
// if ("") {
//   // header("location:profession_category_table.php");
// }

// if (isset($_POST['submit'])) {
//   $profession = $_POST['profession'];
//   $sql1 = "INSERT INTO `profession_categories` (`profession`) VALUE ('$profession')";
//   mysqli_query($conn, $sql1);
//   // header("location:http://localhost/admin_panel/profession_category_table.php");
// }

// // $id = $_GET['id'];
// // echo($id);


// $sql = "SELECT * FROM `profession_categories`  WHERE `id` = '$id' ";
// $result = mysqli_query($conn, $sql);
// $rows = mysqli_fetch_assoc($result);
// // print_r($rows);  
// // exit();

// if (isset($_POST['update'])) {
//   $profssion_category = $_POST['profssion_category'];
//   $update = "UPDATE `profession_categories` SET `profession`='$profssion_category' WHERE `id`= '$id' ";
//   $category_result = mysqli_query($conn, $update);
//   // print_r($category_result);
//   // header("location:http://localhost/admin_panel/profession_category_table.php");
// }

// //setting 
// $Setting = "SELECT `id`, `first_name`, `email`, `number`, `images`,`logo` FROM `basic_setting` ";
// $settingresult = mysqli_query($conn, $Setting);
// $setting = mysqli_fetch_assoc($settingresult);
// // print_r($setting);
// // exit();
// if ("") {
//   header("location:setting_table.php");
// }

// $Setting = "SELECT * FROM `basic_setting`  WHERE `id` = '$id' ";
// $settingresult = mysqli_query($conn, $Setting);
// $resultall = mysqli_fetch_assoc($settingresult);
// // print_r($rows);
// // exit();

// #Get Navbar Name From DB
// if (isset($_POST['submit'])) {
//   $first_name = $_POST['first_name'];
//   $email = $_POST['email'];
//   $number = $_POST['number'];
//   $uploadimage = $_FILES["images"]["name"];
//   $uploadlogo = $_FILES['logo']['name'];

//   $update = "UPDATE `basic_setting` SET `first_name`='$first_name',`email`='$email',`number`='$number',`images`='$uploadimage',`logo`='$uploadlogo' WHERE `id` = '$id' ";
//   mysqli_query($conn, $update);


//   $tempname = $_FILES["images"]["tmp_name"];
//   $folder = 'image/' . $uploadimage;
//   move_uploaded_file($tempname, $folder);

//   $tempname = $_FILES["logo"]["tmp_name"];
//   $folder = 'image/' . $uploadlogo;
//   move_uploaded_file($tempname, $folder);
//   // header("Location: http://localhost/admin_panel/setting_table.php");
// }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="icon.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="admin_panel.css">
  <title>Document</title>
</head>

<body>
  <nav class="menu bg-secondary " tabindex="0">
    <div class="smartphone-menu-trigger"></div>
    <header class="avatar">
      <img src="s.jpeg" height="100px" />
      <h2 class="text-info">Shiva Diwaker</h2>
    </header>
    <ul>
      <li><a href="dashboard.php">Dashboard</a></li>
      <li><a href="navigation_table.php">Header</a></li>
      <li><a href="profession_category_table.php">profession Category</a></li>
      <li><a href="setting_table.php">website basic settings</a></li>
    </ul>
  </nav>

