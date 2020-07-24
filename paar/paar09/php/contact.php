<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

if(!$_POST) exit;

define(EMAIL, 'info@paar.in');
define(PASSWORD, 'Karthick@2211');
define(EMAIL_TO, 'sriweb2211@gmail.com');



//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'paar.in;mail.par.in';  				  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAIL;	                  		  // SMTP username
$mail->Password = PASSWORD; 	                      // SMTP password
// $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 465;                                    // TCP port to connect to
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAIL, 'Paar - Contact From');
$mail->addAddress(EMAIL_TO);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}