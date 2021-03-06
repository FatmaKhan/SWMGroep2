<?php
require __DIR__.'/vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

date_default_timezone_set('Etc/UTC');

//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "PXLAON13@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "hoi12345";
//Set who the message is to be sent from
$mail->setFrom('Stage@pxl.be', 'AON 13');
//Set an alternative reply-to address
//$mail->addReplyTo('maarten.silkens2@student.pxl.be', 'First Last');
//Set who the message is to be sent to
$mail->addAddress($_POST['Email'], $_POST['Bedrijfsnaam']);
//Set the subject line
$mail->Subject = 'Registratie aanvraag stagebedrijf PXL';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
$mail->msgHTML('Uw registratie aanvraag is succesvol ontvangen en zal zo spoedig mogelijk worden behandeld.');
//Replace the plain text body with one created manually
$mail->AltBody = 'Uw registratie aanvraag is succesvol ontvangen en zal zo spoedig mogelijk worden behandeld.';
//Attach an image file
//$mail->addAttachment('images/phpmailer_mini.png');
//send the message, check for errors
if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
}