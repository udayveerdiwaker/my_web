<?php
include 'connection.php';
session_start();
if (!isset($_SESSION["user"])) {
  header("Location: signin.php");
  exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio Admin</title>
  <link rel="icon" type="image/x-icon" href="b.jpg">

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="admin_panel.css">
</head>

<body>
  <!-- Sidebar -->
  <aside class="sidebar">
    <div class="sidebar-brand">
      <a href="dashboard.php">
        <img src="b.jpg" alt="Admin">
      </a>
      <span class="fw-bold ms-2">Portfolio Admin</span>
    </div>

    <nav class="sidebar-nav">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" href="dashboard.php">
            <i class="bi bi-speedometer2"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="navigation_table.php">
            <i class="bi bi-chevron-double-right"></i>
            <span>Navigation</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="profession_category_table.php">
            <i class="bi bi-briefcase"></i>
            <span>Professions</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="setting_table.php">
            <i class="bi bi-gear"></i>
            <span>Settings</span>
          </a>
        </li>

        <li class="nav-item mt-4">
          <a class="nav-link" href="logout.php">
            <i class="bi bi-box-arrow-right"></i>
            <span>Logout</span>
          </a>
        </li>
      </ul>
    </nav>
  </aside>

  <div class="main-content">
    <!-- Topbar -->
    <header class="topbar sticky-top">
      <div class="container-fluid d-flex align-items-center justify-content-between px-4" style="height: 100%;">
        <button class="btn d-lg-none" id="sidebarToggle">
          <i class="bi bi-list" style="font-size: 1.5rem;"></i>
        </button>

        <div class="d-flex align-items-center">
          <div class="theme-toggle me-3" id="themeToggle">
            <i class="bi bi-moon-fill"></i>
          </div>

          <div class="dropdown">
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" data-bs-toggle="dropdown">
              <img src="b.jpg" alt="Admin" width="36" height="36" class="rounded-circle me-2">
              <span class="d-none d-md-inline">Shiva Diwaker</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item" href="home.php" target="_blank"><i class="bi bi-person me-2"></i> Profile</a></li>
              <li><a class="dropdown-item" href="setting_table.php"><i class="bi bi-gear me-2"></i> Settings</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i> Sign out</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>



    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Theme toggle functionality
      const themeToggle = document.getElementById('themeToggle');
      const html = document.documentElement;

      // Check for saved theme preference
      const savedTheme = localStorage.getItem('theme') || 'light';
      html.setAttribute('data-bs-theme', savedTheme);

      // Update icon based on current theme
      updateThemeIcon(savedTheme);

      themeToggle.addEventListener('click', function() {
        const currentTheme = html.getAttribute('data-bs-theme');
        const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

        html.setAttribute('data-bs-theme', newTheme);
        localStorage.setItem('theme', newTheme);

        updateThemeIcon(newTheme);
      });

      function updateThemeIcon(theme) {
        const icon = themeToggle.querySelector('i');
        icon.className = theme === 'dark' ? 'bi bi-sun-fill' : 'bi bi-moon-fill';
      }

      // Toggle sidebar
      document.getElementById('sidebarToggle').addEventListener('click', function() {
        document.querySelector('.sidebar').classList.toggle('show');
      });
    </script>