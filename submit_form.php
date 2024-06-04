<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <!-- Dodajemo Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            padding: 50px 0;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            opacity: 0; /* Početna vrednost opacity-a postavljena na 0 */
            animation: fadeInUp 0.5s ease forwards; /* Dodajemo CSS animaciju za pojavu */
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .img-fluid {
            max-width: 200px;
            margin-bottom: 20px;
        }
        h2 {
            color: #007bff;
            font-size: 28px;
            margin-bottom: 20px;
        }
        p {
            color: #6c757d;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="images/success.png" alt="Success" class="img-fluid mb-4">
        <h2 class="mb-3">Thank You for Your Message!</h2>
        <p class="lead">We have received your message and will get back to you as soon as possible.</p>
    </div>

    <!-- Dodajemo jQuery i Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Koristimo jQuery za promenu opacity-a .container elementa nakon što se stranica učita
        $(document).ready(function() {
            $(".container").css("opacity", "1");
        });
    </script>
</body>
</html>






<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prikupljanje podataka iz forme
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $mobile = htmlspecialchars($_POST['mobile']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    $mail = new PHPMailer(true);

    try {
        // Konfiguracija SMTP servera
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'risticfilip712@gmail.com'; 
        $mail->Password = 'akug nbnb ahvw gxjy'; 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        // Primaoci
        $mail->setFrom('risticfilip712@gmail.com', 'Filip Ristic'); 
        $mail->addAddress('risticfilip712@gmail.com', 'Filip Ristic'); 

        // Sadržaj emaila
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = "<p>Name: $name</p><p>Email: $email</p><p>Mobile: $mobile</p><p>Message: $message</p>";

        $mail->send();
        // echo 'Form submitted successfully!';
    } catch (Exception $e) {
        echo "Failed to send the email. Mailer Error: {$mail->ErrorInfo}";
    }
} else {
    // Ako nije POST metoda, vrati se na formu
    header('Location: index.html');
    exit();
}
?>
