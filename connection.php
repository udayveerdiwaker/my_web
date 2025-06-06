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

function getall($getalldata)
{
  global $conn;
  $navbar = "SELECT * FROM " . $getalldata;
  $nav_links = mysqli_query($conn, $navbar);
  while ($links = mysqli_fetch_assoc($nav_links)) {
    $all_pages[] = $links;
  }
  return $all_pages;
};


function getall1($getalldata1)
{
  global $conn;
  // echo $getalldata1;
  $Setting = "SELECT * FROM  `$getalldata1`";
  $settingresult = mysqli_query($conn, $Setting);
  $resultall = mysqli_fetch_assoc($settingresult);
  // print_r($resultall);
  // exit;
  return $resultall;
};

// getall1('basic_setting');
