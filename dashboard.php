<?php
include 'admin_panel.php';

?>

  <!-- Main Content -->
    

    <!-- Page Content -->
    <div class="container-fluid px-4 py-4">
      <!-- Page Header -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0">Dashboard Overview</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-primary shadow-sm">
          <i class="bi bi-plus-circle me-2"></i> Add New Content
        </a> -->
      </div>

      <!-- Stats Cards -->
      <div class="row g-4 mb-4">
        <div class="col-md-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="count"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM navigationbar")); ?></div>
                  <div class="label">Navigation Links</div>
                </div>
                <div class="card-icon bg-primary bg-opacity-10 text-primary">
                  <i class="bi bi-link-45deg"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="count"><?php echo mysqli_num_rows(mysqli_query($conn, "SELECT * FROM categories")); ?></div>
                  <div class="label">Profession Categories</div>
                </div>
                <div class="card-icon bg-success bg-opacity-10 text-success">
                  <i class="bi bi-briefcase"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="count">12</div>
                  <div class="label">Projects</div>
                </div>
                <div class="card-icon bg-info bg-opacity-10 text-info">
                  <i class="bi bi-collection"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-md-6 col-lg-3">
          <div class="card h-100">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between">
                <div>
                  <div class="count">1.2K</div>
                  <div class="label">Monthly Views</div>
                </div>
                <div class="card-icon bg-warning bg-opacity-10 text-warning">
                  <i class="bi bi-eye"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Quick Actions -->
      <div class="row g-4 mb-4">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4">Quick Actions</h5>
              <div class="row g-3">
                <div class="col-md-3">
                  <a href="navigation_table.php" class="btn btn-outline-primary w-100 py-3">
                    <i class="bi bi-pencil-square me-2"></i> Edit Navigation
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="profession_category_table.php" class="btn btn-outline-success w-100 py-3">
                    <i class="bi bi-tags me-2"></i> Manage Categories
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="setting_table.php" class="btn btn-outline-info w-100 py-3">
                    <i class="bi bi-sliders me-2"></i> Website Settings
                  </a>
                </div>
                <div class="col-md-3">
                  <a href="home.php" target="_blank" class="btn btn-outline-success w-100 py-3">
                    
                    <i class="bi bi-eye me-2"></i> View Portfolio
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Recent Activity -->
      <div class="row g-4">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4">Recent Activity</h5>
              
              <div class="activity-item">
                <div class="dot"></div>
                <div class="mb-2">
                  <strong>Updated navigation menu</strong>
                  <div class="time">2 hours ago</div>
                </div>
                <p class="mb-0">Added new "Contact" link to the main navigation</p>
              </div>
              
              <div class="activity-item">
                <div class="dot"></div>
                <div class="mb-2">
                  <strong>Added new profession</strong>
                  <div class="time">Yesterday, 4:30 PM</div>
                </div>
                <p class="mb-0">Created "UI/UX Designer" category in professions</p>
              </div>
              
              <div class="activity-item">
                <div class="dot"></div>
                <div class="mb-2">
                  <strong>Updated website settings</strong>
                  <div class="time">Monday, 10:15 AM</div>
                </div>
                <p class="mb-0">Changed primary color to indigo</p>
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-4">System Status</h5>
              
              <div class="d-flex align-items-center mb-3">
                <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                  <i class="bi bi-check-circle-fill text-success"></i>
                </div>
                <div>
                  <h6 class="mb-0">PHP Version</h6>
                  <small class="text-muted">8.1.12</small>
                </div>
              </div>
              
              <div class="d-flex align-items-center mb-3">
                <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                  <i class="bi bi-check-circle-fill text-success"></i>
                </div>
                <div>
                  <h6 class="mb-0">MySQL Version</h6>
                  <small class="text-muted">8.0.31</small>
                </div>
              </div>
              
              <div class="d-flex align-items-center mb-3">
                <div class="bg-warning bg-opacity-10 p-2 rounded me-3">
                  <i class="bi bi-exclamation-triangle-fill text-warning"></i>
                </div>
                <div>
                  <h6 class="mb-0">Storage</h6>
                  <small class="text-muted">85% used (12.3GB/14.4GB)</small>
                </div>
              </div>
              
              <div class="d-flex align-items-center">
                <div class="bg-success bg-opacity-10 p-2 rounded me-3">
                  <i class="bi bi-check-circle-fill text-success"></i>
                </div>
                <div>
                  <h6 class="mb-0">Last Backup</h6>
                  <small class="text-muted">Today, 3:00 AM</small>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
