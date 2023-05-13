<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


/**
 * Check PHPMailer is loaded
 */
$mail = new PHPMailer();

echo get_class($mail);