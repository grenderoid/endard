<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require "vendor/autoload.php";
$mail = new PHPMailer(true);
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'untukiklanbnews@gmail.com';
$mail->Password = 'OneOkRock23';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;
$mail->setFrom('untukiklanbnews@gmail.com', 'Iklan Bnews');
$mail->addAddress($email, $username);
$mail->isHTML(true);
$mail->Subject = "(Aktivasi pendaftaran)";
$mail->Body = "Selamat, anda telah berhasil membuat akun. Tahap selanjutnya adalah mengaktifkan akun anda. Untuk mengaktifkannya silahkan klik atau copy link berikut ini.
 <a href='http://localhost/IklanBNews/activation.php?t=".$token."'>http://localhost/IklanBNews/activation.php?t=".$token."</a>  ";
$mail->send();
?>
