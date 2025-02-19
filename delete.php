<?php
include 'connection.php';

$id = $_GET['id'];

$sql = "DELETE FROM `navigationbar` WHERE `id` ='$id'";

$result = mysqli_query($conn, $sql);

header("location:navigation_table.php");


$delete_category = "DELETE FROM `profession_categories` WHERE `id` = '$id' ";
$categrory_result = mysqli_query($conn, $delete_category);
// header("location:profession_category_table.php");
