<?php
include 'admin_panel.php';
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

  .badge {
    padding: 0.35rem 0.65rem;
    border-radius: 50rem;
    font-size: 0.75rem;
    font-weight: 600;
  }

  .action-btn {
    width: 80px;
    margin: 2px;
  }

  .add-btn {
    padding: 0.5rem 1.5rem;
    border-radius: 8px;
  }
</style>


<!-- Page Content -->
<div class="container-fluid px-4 py-4">
  <!-- Page Header -->
  <div class="page-header">
    <div class="d-sm-flex align-items-center justify-content-between">
      <h1 class="h3 mb-0">Category Management</h1>
      <a href="profession_add_category.php" class="btn btn-primary add-btn">
        <i class="bi bi-plus-circle me-2"></i> Add New Category
      </a>
    </div>
  </div>

  <!-- Table Card -->
  <div class="card table-card">
    <div class="table-responsive">
      <table class="table align-middle">
        <thead>
          <tr>
            <th width="10%">ID</th>
            <th width="30%">Category Name</th>
            <th width="20%">Created At</th>
            <th width="20%">Status</th>
            <th width="20%">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $result = $conn->query("SELECT * FROM categories ORDER BY id DESC");
          while ($row = $result->fetch_assoc()):
          ?>
            <tr>
              <td><?php echo htmlspecialchars($row['id']); ?></td>
              <td><?php echo htmlspecialchars($row['name']); ?></td>
              <td><?php echo date('M d, Y', strtotime($row['created_at'])); ?></td>
              <td>
                <span class="badge bg-success">Active</span>
              </td>
              <td>
                <div class="d-flex gap-2">
                  <a href="profession_category_edit.php?id=<?php echo $row['id']; ?>"
                    class="btn btn-sm btn-outline-primary action-btn">
                    <i class="bi bi-pencil"></i> Edit
                  </a>
                  <!-- <a href="profession_delete_category.php?id=<?php echo $row['id']; ?>" 
                       class="btn btn-sm btn-outline-danger action-btn"
                       onclick="return confirm('Are you sure you want to delete this category?')">
                      <i class="bi bi-trash"></i> Delete
                    </a> -->
                  <a href="profession_delete_category.php?id=<?php echo $row['id']; ?>"
                    class="btn btn-sm btn-outline-danger action-btn">
                    <i class="bi bi-trash"></i> Delete
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
</div>