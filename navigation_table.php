<?php
include 'admin_panel.php';

$sql = "SELECT `id`, `navbar_links`, `body`, `href` FROM `navigationbar`";
$result = mysqli_query($conn, $sql);
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
    }

    .table tbody td {
      padding: 1rem;
      vertical-align: middle;
      border-top: 1px solid rgba(0, 0, 0, 0.05);
    }

    [data-bs-theme="dark"] .table tbody td {
      border-top: 1px solid rgba(255, 255, 255, 0.05);
    }

    .table tbody tr:last-child td {
      border-bottom: none;
    }

    .action-btn {
      width: 100px;
    }

    .add-btn {
      padding: 0.5rem 1.5rem;
      border-radius: 8px;
    }

    .status-badge {
      padding: 0.35rem 0.65rem;
      border-radius: 50rem;
      font-size: 0.75rem;
      font-weight: 600;
    }

    .badge-active {
      background-color: rgba(16, 185, 129, 0.1);
      color: #10b981;
    }

    .badge-inactive {
      background-color: rgba(239, 68, 68, 0.1);
      color: #ef4444;
    }
  </style>
</head>

<body>



    <!-- Page Content -->
    <div class="container-fluid px-4 py-4">
      <!-- Page Header -->
      <div class="page-header">
        <div class="d-sm-flex align-items-center justify-content-between">
          <h1 class="h3 mb-0">Navigation Management</h1>
          <a href="navigation_form.php" class="btn btn-primary add-btn">
            <i class="bi bi-plus-circle me-2"></i> Add New Link
          </a>
        </div>
      </div>

      <!-- Table Card -->
      <div class="card table-card">
        <div class="table-responsive">
          <table class="table table-hover align-middle">
            <thead>
              <tr>
                <th width="5%">ID</th>
                <th width="25%">Link Text</th>
                <th width="40%">URL</th>
                <th width="15%">Status</th>
                <th width="15%">Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php while ($rows = mysqli_fetch_assoc($result)): ?>
              <tr>
                <td><?php echo $rows['id']; ?></td>
                <td><?php echo $rows['navbar_links']; ?></td>
                <td>
                  <a href="<?php echo $rows['href']; ?>" target="_blank" class="text-decoration-none">
                    <?php echo $rows['href']; ?>
                  </a>
                </td>
                <td>
                  <span class="status-badge badge-active">Active</span>
                </td>
                <td>
                  <div class="d-flex gap-2">
                    <a href="navbar_update.php?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-outline-primary action-btn">
                      <i class="bi bi-pencil-square me-1"></i> Edit
                    </a>
                    <a href="delete.php?id=<?php echo $rows['id']; ?>" class="btn btn-sm btn-outline-danger action-btn">
                      <i class="bi bi-trash me-1"></i> Delete
                    </a>
                  </div>
                </td>
              </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

