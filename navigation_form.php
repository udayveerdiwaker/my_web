<?php
ob_start();

include 'admin_panel.php';

if (isset($_POST['submit'])) {
  $navlinks = $conn->real_escape_string($_POST['navlinks']);
  // $text = $conn->real_escape_string($_POST['text']);
  $href = $conn->real_escape_string($_POST['href']);

  // $insert = "INSERT INTO `navigationbar` (`navbar_links`,`body`,`href`) VALUES ('$navlinks','$text','$href')";

  $insert = "INSERT INTO `navigationbar` (`navbar_links`,`href`) VALUES ('$navlinks','$href')";
  mysqli_query($conn, $insert);

  header("Location: navigation_table.php");
  exit();
}
?>


<style>
  .btn-submit {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
  }
</style>

<!-- Page Content -->
<div class="container-fluid px-4 py-4">
  <div class="row justify-content-center">
    <div class="col-lg-8">
      <!-- Page Header -->
      <div class="page-header">
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0">Add Navigation Link</h1>
          <a href="navigation_table.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left me-2"></i> Back to List
          </a>
        </div>
      </div>

      <!-- Form Card -->
      <div class="card form-card">
        <form action="" method="POST" class="row g-3">
          <div class="col-md-6">
            <label for="navlinks" class="form-label">Link Text</label>
            <input type="text" class="form-control" id="navlinks" name="navlinks" required>
            <div class="form-text">The text that will appear in the navigation</div>
          </div>

          <div class="col-md-6">
            <label for="href" class="form-label">URL</label>
            <input type="text" class="form-control" id="href" name="href" required>
            <div class="form-text">The destination URL (e.g., about.html)</div>
          </div>

          <!-- <div class="col-12">
                <label for="text" class="form-label">Content</label>
                <textarea class="form-control" id="text" name="text" rows="5"></textarea>
              </div> -->

          <div class="col-12 text-end mt-4">
            <button type="submit" class="btn btn-primary btn-submit" name="submit">
              <i class="bi bi-save me-2"></i> Save Link
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
ob_end_flush(); // यह buffer clear करता है
?>