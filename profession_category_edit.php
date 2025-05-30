<?php
include 'admin_panel.php';

// Check if category ID is provided
if (!isset($_GET['id'])) {
    header("Location: profession_category_table.php");
    exit();
}

$id = intval($_GET['id']); // Sanitize input

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    if (!empty($name)) {
        $name = mysqli_real_escape_string($conn, $name);

        $sql = "UPDATE categories SET name='$name' WHERE id=$id";

        if (mysqli_query($conn, $sql)) {
            $_SESSION['success_message'] = "Category updated successfully!";
            header("Location: profession_category_table.php");
            exit();
        } else {
            $error = "Error updating category: " . mysqli_error($conn);
        }
    } else {
        $error = "Category name cannot be empty";
    }
}

// Fetch category data
$sql = "SELECT * FROM categories WHERE id=$id";
$result = mysqli_query($conn, $sql);
$category = mysqli_fetch_assoc($result);

if (!$category) {
    $_SESSION['error_message'] = "Category not found!";
    header("Location: profession_category_table.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category | Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        .edit-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.03);
            padding: 2rem;
        }

        [data-bs-theme="dark"] .edit-card {
            background-color: #1e293b;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .page-header {
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            padding-bottom: 1rem;
            margin-bottom: 2rem;
        }

        [data-bs-theme="dark"] .page-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-control {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            border: 1px solid #d1d5db;
        }

        [data-bs-theme="dark"] .form-control {
            background-color: #334155;
            border-color: #475569;
            color: #f8fafc;
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
        }

        .btn-primary:hover {
            background-color: var(--primary-hover);
            border-color: var(--primary-hover);
        }
    </style>
</head>

<body>
    <!-- Main Content -->
    <!-- Page Content -->
    <div class="container-fluid px-4 py-4">
        <!-- Page Header -->
        <div class="page-header">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h1 class="h3 mb-0">Edit Category</h1>
                <a href="profession_category_table.php" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-2"></i> Back to Categories
                </a>
            </div>
        </div>

        <!-- Edit Form Card -->
        <div class="card edit-card">
            <?php if (isset($error)): ?>
                <div class="alert alert-danger mb-4"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-4">
                    <label for="categoryName" class="form-label">Category Name</label>
                    <input type="text" class="form-control" id="categoryName" name="name"
                        value="<?php echo htmlspecialchars($category['name']); ?>" required>
                    <div class="form-text">Enter the new name for this category</div>
                </div>

                <div class="d-flex justify-content-end gap-3 mt-4">
                    <a href="profession_category_table.php" class="btn btn-outline-secondary">
                        Cancel
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-2"></i> Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
    </div>