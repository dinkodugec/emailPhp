<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require '../vendor/autoload.php';
require '../classes/Config.php';


/**
 * Check PHPMailer is loaded
 */
$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = Config::SMTP_HOST;
$mail->Port = Config::SMTP_PORT;
$mail->SMTPAuth = true;
$mail->Username = Config::SMTP_USER;
 $mail->Password = Config::SMTP_PASSWORD; 
$mail->SMTPSecure = 'tls';

/**
 * Enable SMTP debug messages
 */
/* $mail->SMTPDebug = 2;
 */
/**
 * Send an email
 */
$mail->setFrom('dinko.dugec@gmail.com', 'Dinko Dugec');
$mail->addAddress('dugecdinko@gmail.com', 'Dugi');
$mail->Subject = 'An email sent from PHP'; //naslov 
$mail->Body = 'This is a test message'; // teks koji je poslan

if ($mail->send()) {
	echo 'Message sent!';
} else {
    echo 'Mailer error: ' . $mail->ErrorInfo;
}

/* Multiple "To" address*/
$mail->addAddress('dinko.dugec@gmail.com');
$mail->addAddress('eva.dugec@gmail.com');

/*  "Cc" address*/
$mail->addCC('dinko.dugec@gmail.com');
$mail->addCC('eva.dugec@gmail.com');

/*  "Bc" address - bc other recipient can not see, to and cc can see */
$mail->addBCC('dinko.dugec@gmail.com');
$mail->addBCC('eva.dugec@gmail.com');