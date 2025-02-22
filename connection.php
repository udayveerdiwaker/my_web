<?php
global $conn;
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'project';
$conn = mysqli_connect($server, $user, $pass, $dbname);

function getall($getalldata)
{
  global $conn;
  $navbar = "SELECT * FROM " . $getalldata;
  $nav_links = mysqli_query($conn, $navbar);
  while ($links = mysqli_fetch_assoc($nav_links)) {
    $all_pages[] = $links;
  }

  return $all_pages;

  $Setting = "SELECT * FROM " . $getalldata;
  $settingresult = mysqli_query($conn, $Setting);
  $resultall = mysqli_fetch_assoc($settingresult);
  return $resultall;
  print_r($resultall);


  //   //   if($getalldata == 'profession_categories'){
  //   //   $category = "SELECT `profession` FROM `profession_categories`";
  //   //   $categories = mysqli_query($conn, $category);
  //   //   $all_category = mysqli_fetch_assoc($categories);
  //   //   return $categories;
  //   //   }
  //   // strtolower($links['navbar_links']);

  //   //    print_r($all_pages);
};

getall('basic_setting');
