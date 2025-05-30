<?php
ob_start();
include 'admin_panel.php';

$id = intval($_GET['id']); // Sanitize input

// Fetch existing settings
$Setting = "SELECT * FROM `basic_setting` WHERE `id` = '$id'";
$settingresult = mysqli_query($conn, $Setting);
$settings = mysqli_fetch_assoc($settingresult);

if (isset($_POST['submit'])) {
  $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $number = mysqli_real_escape_string($conn, $_POST['number']);

  // Handle image upload
  $uploadimage = !empty($_FILES["images"]["name"]) ? basename($_FILES["images"]["name"]) : $settings['images'];
  $uploadlogo  = !empty($_FILES["logo"]["name"]) ? basename($_FILES["logo"]["name"]) : $settings['logo'];

  // Escape file names
  $uploadimage = mysqli_real_escape_string($conn, $uploadimage);
  $uploadlogo  = mysqli_real_escape_string($conn, $uploadlogo);

  // Update the database
  $update = "UPDATE `basic_setting` SET 
                `first_name`='$first_name',
                `email`='$email',
                `number`='$number',
                `images`='$uploadimage',
                `logo`='$uploadlogo' 
               WHERE `id` = '$id'";

  if (mysqli_query($conn, $update)) {
    // Upload images if provided
    if (!empty($_FILES["images"]["name"])) {
      move_uploaded_file($_FILES["images"]["tmp_name"], 'image/' . $uploadimage);
    }

    if (!empty($_FILES["logo"]["name"])) {
      move_uploaded_file($_FILES["logo"]["tmp_name"], 'image/' . $uploadlogo);
    }

    header("Location: setting_table.php");
    exit();
  } else {
    echo "Error updating record: " . mysqli_error($conn);
  }
}
?>


<style>
  .btn-submit {
    padding: 0.75rem 1.5rem;
    border-radius: 8px;
    font-weight: 500;
  }

  .file-preview {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    margin-top: 10px;
  }

  [data-bs-theme="dark"] .file-preview {
    border-color: rgba(255, 255, 255, 0.1);
  }

  .current-file {
    font-size: 0.875rem;
    color: #64748b;
    margin-top: 5px;
  }

  [data-bs-theme="dark"] .current-file {
    color: #94a3b8;
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
            <h1 class="h3 mb-0">Update Website Settings</h1>
            <a href="setting_table.php" class="btn btn-outline-secondary">
              <i class="bi bi-arrow-left me-2"></i> Back to Settings
            </a>
          </div>
        </div>

        <!-- Settings Form Card -->
        <div class="card settings-card">
          <form action="setting_update.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data" class="row g-3">
            <div class="col-md-6">
              <label for="first-name" class="form-label">First Name</label>
              <input type="text" class="form-control" id="first-name"
                value="<?php echo htmlspecialchars($settings['first_name']); ?>"
                name="first_name" required>
            </div>

            <div class="col-md-6">
              <label for="inputemail" class="form-label">Email Address</label>
              <input type="email" class="form-control" id="inputemail"
                value="<?php echo htmlspecialchars($settings['email']); ?>"
                name="email" required>
            </div>

            <div class="col-md-6">
              <label for="inputnumber" class="form-label">Contact Number</label>
              <input type="tel" class="form-control" id="inputnumber"
                value="<?php echo htmlspecialchars($settings['number']); ?>"
                name="number" pattern="[0-9]{10}" required>
              <div class="form-text">Enter 10-digit phone number</div>
            </div>

            <div class="col-md-6">
              <label for="inputimage" class="form-label">Profile Image</label>
              <input type="file" class="form-control" id="inputimage" name="images">
              <?php if ($settings['images']): ?>
                <div class="current-file">Current: <?php echo htmlspecialchars($settings['images']); ?></div>
                <img src="image/<?php echo htmlspecialchars($settings['images']); ?>"
                  alt="Current Profile Image"
                  class="file-preview">
              <?php endif; ?>
            </div>

            <div class="col-md-6">
              <label for="inputlogo" class="form-label">Website Logo</label>
              <input type="file" class="form-control" id="inputlogo" name="logo">
              <?php if ($settings['logo']): ?>
                <div class="current-file">Current: <?php echo htmlspecialchars($settings['logo']); ?></div>
                <img src="image/<?php echo htmlspecialchars($settings['logo']); ?>"
                  alt="Current Logo"
                  class="file-preview">
              <?php endif; ?>
            </div>

            <div class="col-12 text-end mt-4">
              <button type="submit" class="btn btn-primary btn-submit" name="submit">
                <i class="bi bi-save me-2"></i> Update Settings
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  </div>

  <?php
  ob_end_flush();
  ?>