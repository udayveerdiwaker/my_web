<?php
ob_start();
include 'admin_panel.php';
$id = intval($_GET['id']); // Sanitize input

$navbar_link = "SELECT * FROM `navigationbar` WHERE `id` = '$id'";
$navigation = mysqli_query($conn, $navbar_link);
$nav_all = mysqli_fetch_assoc($navigation);

if (isset($_POST['update'])) {
  $escaped_navbar_links = $conn->real_escape_string($_POST['navbar_links']);
  $escaped_href = $conn->real_escape_string(strtolower($_POST['href']));
  // $escaped_text = $conn->real_escape_string($_POST['text']);

  // $update = "UPDATE `navigationbar` SET `navbar_links` = '$escaped_navbar_links', `href` = '$escaped_href', `body`='$escaped_text' WHERE `id` = '$id'";
  $update = "UPDATE `navigationbar` SET `navbar_links` = '$escaped_navbar_links', `href` = '$escaped_href', WHERE `id` = '$id'";
  mysqli_query($conn, $update);

  header("Location: navigation_table.php");
  exit();
}
?>


<style>
  .btn-update {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
    background-color: var(--primary);
    border-color: var(--primary);
  }

  .btn-update:hover {
    background-color: var(--primary-hover);
    border-color: var(--primary-hover);
  }
</style>
</head>

<body>


  <!-- Page Content -->
  <div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <!-- Page Header -->
        <div class="page-header">
          <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0">Update Navigation Link</h1>
            <a href="navigation_table.php" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-left me-2"></i> Back to List
            </a>
          </div>
        </div>

        <!-- Form Card -->
        <div class="card form-card">
          <form action="navbar_update.php?id=<?php echo $id; ?>" method="POST" class="row g-3">
            <div class="col-md-6">
              <label for="inputlinks" class="form-label">Link Text</label>
              <input type="text" class="form-control" id="inputlinks"
                value="<?php echo htmlspecialchars($nav_all['navbar_links']); ?>"
                name="navbar_links" required>
            </div>

            <div class="col-md-6">
              <label for="inputhref" class="form-label">URL</label>
              <input type="text" class="form-control" id="inputhref"
                value="<?php echo htmlspecialchars($nav_all['href']); ?>"
                name="href" required>
              <div class="form-text">Use lowercase with hyphens (e.g., about-us)</div>
            </div>

            <!-- <div class="col-12">
                <label for="text-field" class="form-label">Content</label>
                <textarea class="form-control" id="text-field" name="text" rows="5"><?php echo htmlspecialchars($nav_all['body']); ?></textarea>
              </div> -->

            <div class="col-12 text-end mt-4">
              <button type="submit" class="btn btn-update text-white" name="update">
                <i class="bi bi-save me-2"></i> Update Link
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  ob_end_flush();
  ?>