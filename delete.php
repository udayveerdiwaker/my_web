<?php
include 'connection.php';

$id = $_GET['id'];
$table = $_GET['table'] ?? 'navigationbar'; // Default to navigationbar if not specified

// Process deletion if confirmed
if (isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    if (!is_numeric($id)) {
        die("Invalid ID");
    }

    // Determine which table to delete from
    $redirect = 'navigation_table.php';
    $sql = "DELETE FROM `navigationbar` WHERE `id` = ?";
    
    if ($table === 'profession_categories') {
        $sql = "DELETE FROM `profession_categories` WHERE `id` = ?";
        $redirect = 'profession_category_table.php';
    }

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: $redirect?delete=success");
    } else {
        header("Location: $redirect?delete=error");
    }
    exit();
}

// Show confirmation popup
if (isset($_GET['id'])) {
    // Get the current page URL to return to
    $referer = $_SERVER['HTTP_REFERER'] ?? ($table === 'profession_categories' ? 'profession_category_table.php' : 'navigation_table.php');
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Confirm Deletion</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            .modal-overlay {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(0,0,0,0.5);
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 1050;
            }
            .modal-dialog {
                max-width: 400px;
                width: 90%;
            }
            .modal-content {
                border: none;
                border-radius: 8px;
                box-shadow: 0 5px 15px rgba(0,0,0,0.2);
            }
            .modal-header {
                border-bottom: none;
                padding: 1.5rem;
                background: #f8f9fa;
                border-radius: 8px 8px 0 0;
            }
            .modal-title {
                font-weight: 600;
                color: #dc3545;
            }
            .modal-body {
                padding: 1.5rem;
            }
            .modal-footer {
                border-top: none;
                padding: 1rem 1.5rem;
                background: #f8f9fa;
                border-radius: 0 0 8px 8px;
            }
            .btn-danger {
                background-color: #dc3545;
                border-color: #dc3545;
            }
            .warning-icon {
                font-size: 3rem;
                color: #dc3545;
                margin-bottom: 1rem;
            }
        </style>
    </head>
    <body>
        <div class="modal-overlay">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Confirm Deletion</h5>
                    </div>
                    <div class="modal-body text-center">
                        <div class="warning-icon">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                        </div>
                        <p>Are you sure you want to delete this item? This action cannot be undone.</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <a href="<?= $referer ?>" class="btn btn-secondary">Cancel</a>
                        <a href="?id=<?= $id ?>&table=<?= $table ?>&confirm=yes" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
    <?php
    exit();
}

// Default redirect if no ID provided
header("Location: " . ($table === 'profession_categories' ? 'profession_category_table.php' : 'navigation_table.php'));
exit();
?>