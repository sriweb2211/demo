<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail_reply = new PHPMailer;

if(!$_POST) exit;

define(EMAIL, 'info@paar.in');
define(PASSWORD, 'Karthick@2211');
define(EMAIL_TO, 'paar@bipolarfactpry.com');
define(EMAIL_TO_2, 'sriweb2211@gmail.com');

$name   	= $_POST['name'];
$mobile   	= $_POST['mobile'];
$bname     	= $_POST['businessname'];
$email    	= $_POST['email'];
$type 		= $_POST['type'];
$comments 	= $_POST['comments'];

$mail->isSMTP();                                // Set mailer to use SMTP
// $mail->Host = 'paar.in;mail.par.in';  		// Specify main and backup SMTP servers
$mail->Host = 'localhost';  				  	// Specify main and backup SMTP servers
$mail->SMTPAuth = false;                        // Enable SMTP authentication
$mail->SMTPAutoTLS = false; 
$mail->Username = EMAIL;	                  	// SMTP username
$mail->Password = PASSWORD; 	                // SMTP password
$mail->Port = 25;                               // TCP port to connect to


$mail->setFrom(EMAIL, 'Paar - Contact From');
$mail->addAddress(EMAIL_TO);     				// Add a recipient
$mail->addAddress(EMAIL_TO_2);     				// Add a recipient
$mail->addReplyTo(EMAIL);
// $mail->addCC('cc@example.com');
// $mail->addBCC('bcc@example.com');

$mail->isHTML(true);							// Set email format to HTML


$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr><td style='background: #eee; text-align: center;' colspan='2'><strong>Contact from " . strip_tags($name) . "</strong></td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Mobile:</strong> </td><td>" . strip_tags($mobile) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Business Name:</strong> </td><td>" . strip_tags($bname) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Required Type:</strong> </td><td>" . strip_tags($type) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Message:</strong> </td><td>" . htmlentities($comments) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";


$mail->Subject = 'Paar.in - Contact From ' . strip_tags($name);
// $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->Body    = $message;
// $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}



$mail_reply->isSMTP();                                // Set mailer to use SMTP
$mail_reply->Host = 'localhost';  				  	// Specify main and backup SMTP servers
$mail_reply->SMTPAuth = false;                        // Enable SMTP authentication
$mail_reply->SMTPAutoTLS = false; 
$mail_reply->Username = EMAIL;	                  	// SMTP username
$mail_reply->Password = PASSWORD; 	                // SMTP password
$mail_reply->Port = 25;                               // TCP port to connect to


$mail_reply->setFrom(EMAIL, 'Paar - Contact From');
$mail_reply->addAddress($email);     				// Add a recipient
$mail_reply->addReplyTo(EMAIL);

$mail_reply->isHTML(true);							// Set email format to HTML


$message = '<html><body>';
$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
$message .= "<tr><td style='background: #eee; text-align: center;' colspan='2'><strong>Contact from " . strip_tags($name) . "</strong></td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Name:</strong> </td><td>" . strip_tags($name) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Mobile:</strong> </td><td>" . strip_tags($mobile) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Business Name:</strong> </td><td>" . strip_tags($bname) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Email:</strong> </td><td>" . strip_tags($email) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Required Type:</strong> </td><td>" . strip_tags($type) . "</td></tr>";
$message .= "<tr><td style='background: #eee;'><strong>Message:</strong> </td><td>" . htmlentities($comments) . "</td></tr>";
$message .= "</table>";
$message .= "</body></html>";


$mail_reply->Subject = 'Paar.in - Thank you for contacting us ' . strip_tags($name);
$mail_reply->Body    = $message;

if(!$mail_reply->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail_reply->ErrorInfo;
} else {
    echo 'Message has been sent';
}
