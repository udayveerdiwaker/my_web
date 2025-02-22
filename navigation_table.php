<?php
include "admin_panel.php";

$sql = "SELECT `id`, `navbar_links`, `body` ,`href` FROM `navigationbar` ";
$result = mysqli_query($conn, $sql);
// $rows = mysqli_fetch_assoc($result);
// print_r($rows);
// exit();

?>
 
<body>
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <h1 class="display-6 text-center text-info">
        Navigationbar Data
        </h1>
      </div>
      <table class="table  table-bordered border-black table-hover" class="row g-12" style="text-align: center;">
        <thead class="table-dark">
          <tr>
            <th class="col-1" scope="gcol">Id</th>
            <th class="col-1" scope="col">Navigation</th>
            <!-- <th class="col-1" scope="col">Text</th> -->
            <th class="col-1" scope="col">Href</th>
            <!-- <th class="col-1" scope="col">Logos</th> -->

            <th colspan="2" class="col-1" scope="col">Action</th>
          </tr>
        </thead>
        <?php
        while ($rows = mysqli_fetch_assoc($result)) {
        ?>

          <tbody>
            <tr>
              <td class="col-1"><?php echo $rows['id'] ?></td>

              <td class="col-1"><?php echo $rows['navbar_links'] ?></td>
              <!-- <td class="col-1"><?php echo $rows['body'] ?></td> -->
              <td class="col-1"><?php echo $rows['href'] ?></td>

              <td class="col-1"><?php echo "<a class='btn btn-outline-info' href='navbar_update.php?id=$rows[id]''role='button'>Update</a>"; ?></td>

              <td class="col-1"><?php echo "<a class='btn btn-outline-danger' href='delete.php?id=$rows[id]''role='button'>Delete</a>"; ?>
              </td>

            </tr>
          </tbody>

        <?php
        }
        ?>
      </table>
      <div class="col-12 submit text-center">
        <a class='btn btn-outline-info' href="navigation_form.php">+Add Navigationbar</a>
      </div>
      <!-- row end -->
    </div>
    <!--container end -->
  </div>
