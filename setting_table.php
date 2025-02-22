<?php
include "admin_panel.php";

$Setting = "SELECT `id`, `first_name`, `email`, `number`, `images`,`logo` FROM `basic_setting` ";
$settingresult = mysqli_query($conn, $Setting);
$setting = mysqli_fetch_assoc($settingresult);
// print_r($setting);
// exit();
if ("") {
  header("location:setting_table.php");
}
?>
<style>
  .but {
    border: none;
  }

  .but {
    border: none;
    border-radius: 10px;
  }

  .bt {
    text-align: center;
    margin-left: 45%;
  }
</style>

<p class="display-6 text-info text-center"><b>Website Basic Settings</b></p>


<table class="table  table-bordered border-black table-hover" class="row g-12" style="text-align: center;">
  <thead class="table-dark">
    <tr>
      <th class="col-1" scope="gcol">Id</th>
      <th class="col-1" scope="col">First Name</th>
      <th class="col-1" scope="col">Email</th>
      <th class="col-1" scope="col">Mobile_no</th>
      <th class="col-1" scope="col">Image</th>
      <th class="col-1" scope="col">Logo</th>
      <th class="col-1" scope="col">Action</th>
    </tr>
  </thead>

  <tbody>
    <tr>
      <th class="col-1"><?php echo $setting['id'] ?></th>

      <td class="col-1"><?php echo $setting['first_name'] ?></td>

      <td class="col-1"><?php echo $setting['email'] ?></td>

      <td class="col-1"><?php echo $setting['number'] ?></td>

      <td class="col-1"><img src="image/<?php echo $setting['images'] ?>" width="80px" height="50px"></td>

      <td class="col-1"><img src="image/<?php echo $setting['logo'] ?>" width="80px" height="50px"></td>

      <td class="col-1"><button class="but"><?php echo "<a class='btn btn-outline-info' href='setting_update.php?id=$setting[id]''role='button'>Update</a>"; ?></button>

      </td>

      </td>
    </tr>
  </tbody>
</table>

<!-- <a class='btn btn-outline-info'  href="setting.php">+Add</a> -->