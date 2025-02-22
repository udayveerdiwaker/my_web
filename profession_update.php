<?php
include 'admin_panel.php';

$id = $_GET['id'];
// echo($id);


$sql = "SELECT * FROM `profession_categories`  WHERE `id` = '$id' ";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
// print_r($rows);  
// exit();

if (isset($_POST['update'])) {
  $profssion_category = $_POST['profssion_category'];
  $update = "UPDATE `profession_categories` SET `profession`='$profssion_category' WHERE `id`= '$id' ";
  $category_result = mysqli_query($conn, $update);
  // print_r($category_result);
  header("location:http://localhost/my_web/profession_category_table.php");
}
?>


  <div class="container border border-warning">
    <p class="display-6 text-info text-center"><b>Profession Category Update Form <?php echo $id ?></b></p>
    <form action="profession_update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="row g-5">

      <div class="col-md-4">
        <label for="inputcategory" class="form-label"></label>
        <input type="text" class="form-control " id="inputcategory" value="<?php echo $rows['profession'] ?>" placeholder="Enter Profession Category" name="profssion_category">
      </div>

      <div class="col-12 submit">
        <button type="submit" class="btn btn-warning" name="update">Update</button>
      </div>
    </form>
  </div>