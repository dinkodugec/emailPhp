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
$mail->CharSet = 'UTF-8'; //always include, it can send a content without englis charachter, croatian example

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

/* Add a different reply to address */
$mail->addReplyTo('someadress@gmail.com');  //Send an email with a Different Address for Replies

$mail->Subject = 'An email sent from PHP'; //naslov 
$mail->Body = 'This is a test message'; // teks koji je poslan

if ($mail->send()) {
	echo 'Message sent!';
} else {
    echo 'Mailer error: ' . $mail->ErrorInfo;
}

