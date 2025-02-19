<?php
include "admin_panel.php";
include 'connection.php';

$profession_table = "SELECT `id`, `profession` FROM `profession_categories` ";
$tableresult = mysqli_query($conn, $profession_table);
// $profession = mysqli_fetch_assoc($tableresult);
// print_r($profession);
// exit();
if ("") {
  header("location:profession_category_table.php");
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



  <p class="display-6 text-info text-center"><b>Website basic settings</b></p>


  <table class="table  table-bordered border-black table-hover" class="row g-12" style="text-align: center;">
    <thead class="table-dark">
      <tr>
        <th class="col-1" scope="gcol">Id</th>
        <th class="col-1" scope="col">Category Name</th>
        <th colspan="2" class="col-1" scope="col">Action</th>
      </tr>
    </thead>
    <?php
    while ($rows = mysqli_fetch_assoc($tableresult)) {
    ?>
      <tbody>
        <tr>
          <th class="col-1"><?php echo $rows['id'] ?></th>

          <td class="col-1"><?php echo $rows['profession'] ?></td>

          <td class="col-1"><button class="but"><?php echo "<a class='btn btn-outline-info' href='profession_update.php?id=$rows[id]''role='button'>Update</a>"; ?></button>

          </td>
          <td class="col-1"><?php echo "<a class='btn btn-outline-danger' href='delete.php?id=$rows[id]''role='button'>Delete</a>"; ?>
          </td>

        </tr>
      </tbody>
    <?php
    }
    ?>
  </table>

  <a class='btn btn-outline-info' href="profession_category.php">+Add</a>
