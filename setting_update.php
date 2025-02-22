<?php
include "admin_panel.php";

$id = $_GET['id'];
// echo $id;
// exit;


$Setting = "SELECT * FROM `basic_setting`  WHERE `id` = '$id' ";
$settingresult = mysqli_query($conn, $Setting);
$resultall = mysqli_fetch_assoc($settingresult);
// print_r($rows);
// exit();


#Get Navbar Name From DB
if (isset($_POST['submit'])) {
  $first_name = $_POST['first_name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $uploadimage = $_FILES["images"]["name"];
  $uploadlogo = $_FILES['logo']['name'];

  $update = "UPDATE `basic_setting` SET `first_name`='$first_name',`email`='$email',`number`='$number',`images`='$uploadimage',`logo`='$uploadlogo' WHERE `id` = '$id' ";
  mysqli_query($conn, $update);


  $tempname = $_FILES["images"]["tmp_name"];
  $folder = 'image/' . $uploadimage;
  move_uploaded_file($tempname, $folder);

  $tempname = $_FILES["logo"]["tmp_name"];
  $folder = 'image/' . $uploadlogo;
  move_uploaded_file($tempname, $folder);
  header("Location: http://localhost/my_web/setting_table.php");
}

?>
<style>
  .container {
    width: 80%;
    border-radius: 10px;
    color: black;

  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="container border border-4 border-warning">
      <p class="display-6 text-info text-center"><b>Website Basic Settings <?php echo $id ?></b></p>
      <div class="col-12">

        <form action="setting_update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="row g-3">

          <div class="col-md-6">
            <label for="first-name" class="form-label">Enter First Name</label>
            <input type="text" class="form-control" id="first-name" value="<?php echo $resultall['first_name'] ?>" name="first_name">
          </div>

          <div class="col-md-6">
            <label for="inputemail" class="form-label">Enter Email</label>
            <input type="email" class="form-control" value="<?php echo $resultall['email'] ?>" id="inputemail" name="email">
          </div>

          <div class="col-md-6">
            <label for="inputnumber" class="pb-2">Contact</label>
            <input type="mobile" minlength="0" maxlength="10" value="<?php echo $resultall['number'] ?>" class="form-control" placeholder="+19" name="number" id="inputnumber-field">
          </div>

          <div class="col-md-6">
            <label for="inputimage" class="pb-2">Add Photos</label>
            <input type="file" class="form-control" name="images" value="<?php echo $resultall['images'] ?>" id="inputimage">
          </div>


          <div class="col-md-6">
            <label for="inputlogo" class="pb-2">Add logo</label>
            <input type="file" class="form-control" name="logo" value="<?php echo $resultall['logo'] ?>" id="inputlogo">
          </div>

          <div class="col-12 submit text-center">
            <button type="submit" class="btn btn-outline-info" value="image" name="submit">Submit</button>
          </div>

        </form>
      </div>
    </div>


    <!-- row end -->
  </div>
  <!--container end -->
</div>


</body>