<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Make sure you have PHPMailer installed

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $service = $_POST['selectedService'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'malnaby87@gmail.com'; // Your Gmail address
        $mail->Password = 'iriv qugm lknv nkcj'; // Your Gmail app password
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('malnaby87@gmail.com', 'Emad');
        $mail->addAddress('malnaby87@gmail.com');

        $mail->isHTML(true);
        $mail->Subject = 'New Service Request';
        $mail->Body    = "Name: $name<br>Email: $email<br>Phone: $phone<br>Service: $service<br>Message: $message";

        $mail->send();
        echo 'Email sent successfully!';
    } catch (Exception $e) {
        echo "Failed to send email. Error: {$mail->ErrorInfo}";
    }
} else {
    echo "This script only accepts POST requests.";
}
?>
