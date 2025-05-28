<?php
include 'connection.php';

// Process deletion if confirmed
if (isset($_GET['id']) && isset($_GET['confirm']) && $_GET['confirm'] === 'yes') {
    $id = $_GET['id'];
    
    if (!is_numeric($id)) {
        die("Invalid category ID");
    }

    $stmt = $conn->prepare("DELETE FROM categories WHERE id=?");
    $stmt->bind_param("i", $id);
    
    if ($stmt->execute()) {
        header("Location: profession_category_table.php?delete=success");
    } else {
        header("Location: profession_category_table.php?delete=error");
    }
    exit();
}

// Show confirmation UI
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Confirm Deletion</title>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
        <style>
            :root {
                --primary: #4361ee;
                --danger: #ef233c;
                --light: #f8f9fa;
                --dark: #212529;
                --gray: #6c757d;
                --border: #dee2e6;
            }
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            body {
                font-family: 'Inter', sans-serif;
                background-color: rgba(0,0,0,0.03);
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                padding: 20px;
            }
            .modal {
                background: white;
                border-radius: 12px;
                box-shadow: 0 10px 25px rgba(0,0,0,0.08);
                width: 100%;
                max-width: 420px;
                overflow: hidden;
                animation: fadeIn 0.3s ease-out;
            }
            .modal-header {
                padding: 20px 24px;
                border-bottom: 1px solid var(--border);
            }
            .modal-title {
                font-size: 1.25rem;
                font-weight: 600;
                color: var(--dark);
            }
            .modal-body {
                padding: 24px;
            }
            .modal-text {
                color: var(--gray);
                line-height: 1.5;
                margin-bottom: 24px;
            }
            .modal-footer {
                display: flex;
                gap: 12px;
                padding: 0 24px 24px;
            }
            .btn {
                padding: 10px 16px;
                border-radius: 8px;
                font-weight: 500;
                font-size: 0.875rem;
                cursor: pointer;
                flex: 1;
                text-align: center;
                transition: all 0.2s;
                border: none;
            }
            .btn-danger {
                background: var(--danger);
                color: white;
            }
            .btn-danger:hover {
                background: #d90429;
                transform: translateY(-1px);
            }
            .btn-secondary {
                background: white;
                color: var(--gray);
                border: 1px solid var(--border);
            }
            .btn-secondary:hover {
                background: var(--light);
                transform: translateY(-1px);
            }
            @keyframes fadeIn {
                from { opacity: 0; transform: translateY(10px); }
                to { opacity: 1; transform: translateY(0); }
            }
            .warning-icon {
                display: flex;
                justify-content: center;
                margin-bottom: 16px;
            }
            .warning-icon svg {
                width: 48px;
                height: 48px;
                color: var(--danger);
            }
        </style>
    </head>
    <body>
        <div class="modal">
            <div class="modal-header">
                <h3 class="modal-title">Delete Category</h3>
            </div>
            <div class="modal-body">
                <div class="warning-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </div>
                <p class="modal-text">
                    This will permanently delete the category and cannot be undone. 
                    Are you sure you want to continue?
                </p>
            </div>
            <div class="modal-footer">
                <a href="profession_category_table.php" class="btn btn-secondary">Cancel</a>
                <a href="?id=<?= $id ?>&confirm=yes" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </body>
    </html>
    <?php
    exit();
}

// Default redirect if no ID
header("Location: profession_category_table.php");
exit();
?>