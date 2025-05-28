<?php
include 'admin_panel.php';
$Setting = "SELECT `id`, `first_name`, `email`, `number`, `images`,`logo` FROM `basic_setting`";
$settingresult = mysqli_query($conn, $Setting);
$setting = mysqli_fetch_assoc($settingresult);
?>


  <style>
   

    .table {
      margin-bottom: 0;
    }

    .table thead th {
      background-color: var(--primary);
      color: white;
      border-bottom: none;
      padding: 1rem;
      vertical-align: middle;
    }

    .table tbody td {
      padding: 1rem;
      vertical-align: middle;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    [data-bs-theme="dark"] .table tbody td {
      border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .table-img {
      width: 80px;
      height: 50px;
      object-fit: cover;
      border-radius: 6px;
      border: 1px solid rgba(0, 0, 0, 0.1);
    }

    [data-bs-theme="dark"] .table-img {
      border-color: rgba(255, 255, 255, 0.1);
    }

    .action-btn {
      min-width: 100px;
    }
  </style>
</head>

<body>

    <!-- Page Content -->
    <div class="container-fluid px-4 py-4">
      <!-- Page Header -->
      <div class="page-header">
        <h1 class="h3 mb-0 text-center">Website Basic Settings</h1>
      </div>

      <!-- Settings Card -->
      <div class="card settings-card">
        <div class="table-responsive">
          <table class="table align-middle">
            <thead>
              <tr>
                <th width="5%">ID</th>
                <th width="15%">Name</th>
                <th width="20%">Email</th>
                <th width="15%">Mobile</th>
                <th width="15%">Image</th>
                <th width="15%">Logo</th>
                <th width="15%">Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo htmlspecialchars($setting['id']); ?></td>
                <td><?php echo htmlspecialchars($setting['first_name']); ?></td>
                <td><?php echo htmlspecialchars($setting['email']); ?></td>
                <td><?php echo htmlspecialchars($setting['number']); ?></td>
                <td>
                  <img src="image/<?php echo htmlspecialchars($setting['images']); ?>" 
                       alt="Profile Image" 
                       class="table-img">
                </td>
                <td>
                  <img src="image/<?php echo htmlspecialchars($setting['logo']); ?>" 
                       alt="Website Logo" 
                       class="table-img">
                </td>
                <td>
                  <a href="setting_update.php?id=<?php echo $setting['id']; ?>" 
                     class="btn btn-outline-primary action-btn">
                    <i class="bi bi-pencil-square me-1"></i> Update
                  </a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

