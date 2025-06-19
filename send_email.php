<?php
include 'connection.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'PHPMailer/src/Exception.php';
include 'PHPMailer/src/PHPMailer.php';
include 'PHPMailer/src/SMTP.php';

if (isset($_POST['send'])) {
    $to = $_POST['to'];
    $subject = $_POST['subject'];
    $body = "email:" . $_POST['to'] .
        " <br> message:" . $_POST['message'];


    $to = filter_var($_POST['to'], FILTER_SANITIZE_EMAIL);

    $subject = htmlspecialchars($_POST['subject']);
    $body = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);
    try {
        // SMTP config
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'udayveerdiwaker2@gmail.com';      // Your Gmail address
        $mail->Password   = 'nijdtytmopspptzd';         // App password (not your Gmail password)
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email settings
        $mail->setFrom('udayveerdiwaker2@gmail.com', 'udayveerdiwaker');
        $mail->addAddress($to);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $body;

        $mail->send();
        echo "<script>alert('Email has been sent successfully!'); window.location.href='send_email.php';</script>";
    } catch (Exception $e) {
        echo "<script>alert('Email could not be sent. Error: {$mail->ErrorInfo}'); window.location.href='send_email.php';</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Sender</title>
    <style>
        * {
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f5f7fa;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .email-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            padding: 30px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #34495e;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border 0.3s;
        }

        input:focus,
        textarea:focus {
            border-color: #3498db;
            outline: none;
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.1);
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .send-btn {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            width: 100%;
            transition: background-color 0.3s;
        }

        .send-btn:hover {
            background-color: #2980b9;
        }

        .status-message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            display: none;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
            display: block;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
            display: block;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <h1>Send Email</h1>
        <form action="" method="post">
            <div class="form-group">
                <label for="to">Recipient Email</label>
                <input type="email" id="to" name="to" required placeholder="Enter recipient's email address">
            </div>

            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" id="subject" name="subject" required placeholder="Enter email subject">
            </div>

            <div class="form-group">
                <label for="message">Message</label>
                <textarea id="message" name="message" required placeholder="Type your message here"></textarea>
            </div>

            <button type="submit" class="send-btn" name="send">Send Email</button>
        </form>

        <!-- This will be shown/hidden by your PHP script -->
        <div id="statusMessage" class="status-message"></div>
    </div>
</body>

</html>