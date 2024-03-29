<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// SMTP ayarları
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com'; // SMTP sunucu adresi
    $mail->SMTPAuth   = true;
    $mail->Username   = 'furkan.kazanci.hukuk.burosu@gmail.com';
    $mail->Password   = 'hidictqximqpcjys';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 465;

    // Gönderen ve alıcı ayarları
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('furkan.kazanci.hukuk.burosu@gmail.com');
    $mail->addReplyTo($_POST['email'], $_POST['name']);

    // E-posta içeriği
    $mail->isHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['message'];

    $mail->send();
    echo 'E-posta başarıyla gönderildi.';
} catch (Exception $e) {
    echo "E-posta gönderilemedi. Hata: {$mail->ErrorInfo}";
}
?>
