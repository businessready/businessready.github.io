<?php

require("/home/jil1wr6zicu0/public_html/PHPMailer-master/src/PHPMailer.php");
require("/home/jil1wr6zicu0/public_html/PHPMailer-master/src/Exception.php");

$mail = new PHPMailer\PHPMailer\PHPMailer(true);

$name = $_POST['name'];

$email_address = $_POST['email'];

$message = $_POST['message'];

$subject = $_POST['subject'];

try {
	$mail->SMTPDebug = 0;
	$mail->Host	 = 'mail.businessready.in;';
	$mail->SMTPAuth = true;
	$mail->Username = 'contact@businessready.in';
	$mail->Password = 'l2KEyYi[v&Zb';
	$mail->SMTPSecure = 'tls';
	$mail->Port	 = 26;

	$mail->setFrom('contact@businessready.in', 'Web Query');
	$mail->addAddress('office@businessready.in');

	$mail->isHTML(true);
	$mail->Subject = 'New Query from - '.$email_address." | ".$subject;
	$mail->Body = '<b>New query received from website contact form.</b><br><p>Please find details below</p><p> Name - '.$name.'</p><p> Message - '.$message.'</p><p>Thank you</p>';
	$mail->AltBody = 'Body in plain text for non-HTML mail clients';
	$mail->send();
	echo "OK";
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>
