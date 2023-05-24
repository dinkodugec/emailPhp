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
$mail->isHTML('true');

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
$mail->Body = '<h2>External Image</h2>'
             . '<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/1/15/Red_Apple.jpg/265px-Red_Apple.jpg">'
             . "\n"
             . '<h2>Embedded Image</h2>'
             . '<img src="cid:banana">';

$mail->AddEmbeddedImage(dirname(__FILE__) . '/banana.png', 'banana');

/* $mail->Body = '<h1 style="font-style: italic;">Hello</h1>'
             . "\n"
             . '<p style="color: #f00;">This is an email with some <span style="color: #0f0">CSS styles</span>.</p>';
 The safest way to style email recipient, but time consuming*/
 
if ($mail->send()) {
	echo 'Message sent!';
} else {
    echo 'Mailer error: ' . $mail->ErrorInfo;
}

