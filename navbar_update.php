<?php
include 'admin_panel.php';
$id = $_GET['id'];
// echo ($id);



$navbar_link = "SELECT * FROM `navigationbar`  WHERE `id` = '$id' ";
$navigation = mysqli_query($conn, $navbar_link);
$nav_all = mysqli_fetch_assoc($navigation);
// // print_r($rows);
// // exit();

if (isset($_POST['update'])) {
  $escaped_navbar_links = $conn->real_escape_string($_POST['navbar_links']);
  $escaped_href = $conn->real_escape_string($_POST['href']);
  $escaped_text = $conn->real_escape_string($_POST['text']);

  $update = "UPDATE `navigationbar` SET `navbar_links` = '$escaped_navbar_links', `href` = '$escaped_href', `body`='$escaped_text' WHERE `id` = '$id'";

  mysqli_query($conn, $update);


  header("location:http://localhost/my_web/navigation_table.php");
}


// Close the connection
$conn->close();
// 
?>

<div class="container border border-warning">
  <p class="text"><b>Update Form <?php echo $id ?></b></p>
  <form action="navbar_update.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data" class="row g-5">

    <div class="col-md-6">
      <label for="inputlinks" class="form-label">Links Name</label>
      <input type="text" class="form-control " id="inputlinks" value="<?php echo $nav_all['navbar_links'] ?>" name="navbar_links">
    </div>

    <div class="col-md-6">
      <label for="inputlhref" class="form-label">Href Name</label>
      <input type="text" class="form-control " id="inputhref" value="<?php echo $nav_all['href'] ?>" name="href">
    </div>

    <div class="col-md-12">
      <label for="text-field" class="pb-2">Add text</label>
      <textarea class="form-control" name="text" id="text-field"><?php echo $nav_all['body'] ?></textarea>
    </div>
    <div class="col-12 submit">
      <button type="submit" class="btn btn-warning" name="update">Update</button>
    </div>
  </form>
</div>