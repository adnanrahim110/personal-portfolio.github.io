<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Get form data
if (isset($_POST['add_client'])) {
    $mail = new PHPMailer(true);

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'adnankaka.786110@gmail.com';
    $mail->Password = 'xcvk pfwy wwkf bfbo';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;

    $mail->setfrom($email);

    $mail->addAddress('adnankaka.786110@gmail.com');

    $mail->isHTML(true);

    $mail->Subject = $subject;

    $mail->Body  = "Name: $name<br>
                    Email: $email<br>
                    Phone: $phone<br>
                    Message: $message";

    $mail->send();

    echo
    "
    <script>
    alert('Your Message Sent Successfully')
    document.location.href = '../../index.html';
    </script>
    ";
} else {
    echo $mail->ErrorInfo;
    header("location: ../../index.html");
    echo "Error: "."<br>" . $conn->error;
}

$conn->close();
