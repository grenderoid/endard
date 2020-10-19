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
$mail->addAddress($_POST['email'], $_POST['username']);
$mail->isHTML(true);
$mail->Subject = "(Reset Password)";
$mail->Body = "Silahkan klik link dibawah ini untuk me-reset password anda. (Link hanya berlaku selama 24jam)
 <a href='http://localhost/IklanBNews/resetpass.php?t=".$token."'>http://localhost/IklanBNews/resetpass.php?t=".$token."</a>  ";
$mail->send();
?>
