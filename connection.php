<?php
global $conn;
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'project_cms';
$conn = mysqli_connect($server, $user, $pass, $dbname);

// Avoid echoing anything to prevent "headers already sent" error
// if ($conn) {
//   echo "Connection successfully";
// } else {
//   echo "Connection failed";  // ❌ Remove this
// }

// function getall($getalldata)
// {
//   global $conn;
//   $navbar = "SELECT * FROM " . $getalldata;
//   $nav_links = mysqli_query($conn, $navbar);
//   while ($links = mysqli_fetch_assoc($nav_links)) {
//     $all_pages[] = $links;
//   }
//   return $all_pages;
// };

function getall($getalldata)
{
  global $conn;


  $allowed_tables = ['navigationbar',];

  if (!in_array($getalldata, $allowed_tables)) {
    die("Invalid table name requested.");
  }

  $query = "SELECT * FROM `$getalldata`";
  $result = mysqli_query($conn, $query);

  if (!$result) {
    die("Query failed: " . mysqli_error($conn));
  }

  $all_pages = [];

  while ($row = mysqli_fetch_assoc($result)) {
    $all_pages[] = $row;
  }

  return $all_pages;
}

function getall1($getalldata1)
{
  global $conn;

  // $allowed_categories = ['categories'];

  // if (!in_array($getalldata1, $allowed_categories)) {
  //   die('Invalid category');
  // }

  $Setting = "SELECT * FROM  `$getalldata1`";

  $settingresult = mysqli_query($conn, $Setting);

  if (!$settingresult) {
    die("Query failed: " . mysqli_error($conn));
  }

  $resultall = mysqli_fetch_assoc($settingresult);

  return $resultall;
};
