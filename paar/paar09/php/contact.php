<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

if(!$_POST) exit;

define(EMAIL, 'info@paar.in');
define(PASSWORD, 'Karthick@2211');
define(EMAIL_TO, 'paar@bipolarfactpry.com');
define(EMAIL_TO_2, 'sriweb2211@gmail.com');

$name   	= $_POST['name'];
$bname     	= $_POST['businessname'];
$email    	= $_POST['email'];
$type 		= $_POST['type'];
$comments 	= $_POST['comments'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

// $mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'paar.in;mail.par.in';  				  // Specify main and backup SMTP servers
// $mail->SMTPAuth = true;                               // Enable SMTP authentication
// $mail->Username = EMAIL;	                  		  // SMTP username
// $mail->Password = PASSWORD; 	                      // SMTP password
// // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
// $mail->Port = 587;                                    // TCP port to connect to

$mail->isSMTP();                                      // Set mailer to use SMTP
// $mail->Host = 'paar.in;mail.par.in';  				  // Specify main and backup SMTP servers
$mail->Host = 'localhost';  				  // Specify main and backup SMTP servers
$mail->SMTPAuth = false;                               // Enable SMTP authentication
$mail->SMTPAutoTLS = false; 
$mail->Username = EMAIL;	                  		  // SMTP username
$mail->Password = PASSWORD; 	                      // SMTP password
$mail->Port = 25;                                    // TCP port to connect to


$mail->setFrom(EMAIL, 'Paar - Contact From');
$mail->addAddress(EMAIL_TO);     // Add a recipient
$mail->addAddress(EMAIL_TO_2);     // Add a recipient
// $mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

// $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
// $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML


$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
$message .= "<tr style='background: #eee;'><td><strong>Business Name:</strong> </td><td>" . strip_tags($bname) . "</td></tr>";
$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
$message .= "<tr><td><strong>Required Type:</strong> </td><td>" . strip_tags($type) . "</td></tr>";
$message .= "<tr><td><strong>Message:</strong> </td><td>" . htmlentities($comments) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";


$mail->Subject = 'Paar.in - Contact From';
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->Body    = $message;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

header("Location: ../.");