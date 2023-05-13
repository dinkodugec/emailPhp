<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


/**
 * Check PHPMailer is loaded
 */
$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'dinko.dugec@gmail.com';
/* $mail->Password = 'ronbetelges'; */
 $mail->Password = 'qmmrmolcxodilouz'; 
$mail->SMTPSecure = 'tls';

/**
 * Enable SMTP debug messages
 */
$mail->SMTPDebug = 2;

/**
 * Send an email
 */
$mail->setFrom('dinko.dugec@gmail.com');
$mail->addAddress('dugecdinko@gmail.com');
$mail->Body = 'This is a test message';

if ($mail->send()) {
	echo 'Message sent!';
} else {
    echo 'Mailer error: ' . $mail->ErrorInfo;
}