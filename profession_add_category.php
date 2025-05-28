<?php
ob_start();
include 'admin_panel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    if (!empty($name)) {
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $name);
        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Category added successfully!";
            header("Location: profession_category_table.php");
            exit();
        } else {
            $error = "Error adding category: " . $conn->error;
        }
    } else {
        $error = "Category name cannot be empty";
    }
}
?>
<style>
    .add-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.03);
        padding: 2rem;
    }

    .form-control {
        border-radius: 8px;
        padding: 0.75rem 1rem;
        border: 1px solid #d1d5db;
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


<!-- Page Content -->
<div class="container-fluid px-4 py-4">
    <!-- Page Header -->
    <div class="page-header">
        <div class="d-sm-flex align-items-center justify-content-between">
            <h1 class="h3 mb-0">Add New Category</h1>
            <a href="profession_category_table.php" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i> Back to Categories
            </a>
        </div>
    </div>

    <!-- Add Form Card -->
    <div class="card add-card">
        <?php if (isset($error)): ?>
            <div class="alert alert-danger mb-4"><?php echo $error; ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="mb-4">
                <label for="categoryName" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="categoryName" name="name" required autofocus>
                <div class="form-text">Enter a descriptive name for the new category</div>
            </div>

            <div class="d-flex justify-content-end gap-3 mt-4">
                <a href="profession_category_table.php" class="btn btn-outline-secondary">
                    Cancel
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-plus-circle me-2"></i> Add Category
                </button>
            </div>
        </form>
    </div>
</div>
<?php
ob_end_flush();
?>