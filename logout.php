<?php
session_start();

// Check if logout was confirmed
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    session_unset();
    session_destroy();
    header("Location: signin.php?logout=success");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logging Out | Your App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --light-color: #f8f9fa;
            --dark-color: #212529;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }
        
        .logout-container {
            width: 100%;
            max-width: 420px;
            padding: 0 15px;
            text-align: center;
        }
        
        .logout-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }
        
        .logout-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 20px;
        }
        
        .btn-logout {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            height: 48px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            max-width: 200px;
            color: white;
            margin-top: 20px;
        }
        
        .btn-cancel {
            border: 1px solid #ddd;
            height: 48px;
            border-radius: 8px;
            font-weight: 600;
            width: 100%;
            max-width: 200px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="logout-container">
        <div class="logout-card">
            <div class="logout-icon">
                <i class="bi bi-box-arrow-right"></i>
            </div>
            <h3>Ready to leave?</h3>
            <p>Are you sure you want to sign out?</p>
            
            <div class="d-flex flex-column align-items-center">
                <a href="logout.php?confirm=true" class="btn btn-logout">
                    <i class="bi bi-box-arrow-right"></i> Sign Out
                </a>
                <a href="javascript:history.back()" class="btn btn-cancel">
                    Cancel
                </a>
            </div>
        </div>
    </div>

    <!-- If you want immediate logout without confirmation, use this instead: -->
    <?php
    /*
    session_start();
    session_unset();
    session_destroy();
    
    // Show a brief logout message before redirecting
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Logging Out</title>
        <style>
            .logout-message {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                font-family: Arial, sans-serif;
            }
            .spinner {
                border: 4px solid rgba(0, 0, 0, 0.1);
                border-radius: 50%;
                border-top: 4px solid #3498db;
                width: 40px;
                height: 40px;
                animation: spin 1s linear infinite;
                margin: 20px auto;
            }
            @keyframes spin {
                0% { transform: rotate(0deg); }
                100% { transform: rotate(360deg); }
            }
        </style>
        <meta http-equiv="refresh" content="2;url=signin.php">
    </head>
    <body>
        <div class="logout-message">
            <h2>Signing you out...</h2>
            <div class="spinner"></div>
            <p>You will be redirected to the login page</p>
        </div>
    </body>
    </html>';
    exit();
    */
    ?>
</body>
</html>