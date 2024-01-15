<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

// SMTP ayarları
$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com'; // SMTP sunucu adresi
$mail->SMTPAuth   = true;
$mail->Username   = 'furkan.kazanci.hukuk.burosu@gmail.com';
$mail->Password   = '9.Furkankazancı';
$mail->SMTPSecure = 'tls';
$mail->Port       = 5500;

// Gönderen ve alıcı ayarları
$mail->setFrom('furkan.kazanci.hukuk.burosu@gmail.com', 'Furkan Kazancı');
$mail->addAddress($_POST['email'], $_POST['name']);

// E-posta içeriği
$mail->isHTML(true);
$mail->Subject = $_POST['subject'];
$mail->Body    = $_POST['message'];

try {
    $mail->send();
    echo 'E-posta başarıyla gönderildi.';
} catch (Exception $e) {
    echo "E-posta gönderilemedi. Hata: {$mail->ErrorInfo}";
}
?>