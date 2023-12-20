<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require './PHPMailer/src/Exception.php';
require './PHPMailer/src/PHPMailer.php';
require './PHPMailer/src/SMTP.php';
// Créer une instance de PHPMailer
$mail = new PHPMailer();
// Paramètres du serveur SMTP
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;               //Enable verbose debug output
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'asmaa1.dev@gmail.com';
$mail->Password = 'ctrlsipmdvzdjbmk';
$mail->SMTPSecure = 'tls';
$mail->Port = 587;  
//envoyer le message format html
$mail->isHTML(true);  
$mail->CharSet='UTF-8';

?>