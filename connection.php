<?php
global $conn;
$server = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'project_cms';
$conn = mysqli_connect($server, $user, $pass, $dbname);

if ($conn) {
  // echo "Connection successfully";
} else {
  echo "Connection failed";
}




function getall($getalldata)
{
  global $conn;
  $navbar = "SELECT * FROM " . $getalldata;
  $nav_links = mysqli_query($conn, $navbar);
  while ($links = mysqli_fetch_assoc($nav_links)) {
    $all_pages[] = $links;
  } 
  return $all_pages;



  // $Setting = "SELECT * FROM `basic_setting`" . $getalldata;
  // $settingresult = mysqli_query($conn, $Setting);
  // $resultall = mysqli_fetch_assoc($settingresult);
  // return $resultall;
  // print_r($resultall);
  // exit;

  //   //   if($getalldata == 'profession_categories'){
  //   //   $category = "SELECT `profession` FROM `profession_categories`";
  //   //   $categories = mysqli_query($conn, $category);
  //   //   $all_category = mysqli_fetch_assoc($categories);
  //   //   return $categories;
  //   //   }
  //   // strtolower($links['navbar_links']);

  //   //    print_r($all_pages);

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
