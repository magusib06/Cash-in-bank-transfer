<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$type = $_POST['type'];
$name = $_POST['name'];
$number = $_POST['number'];

$mail = new PHPMailer(true);

try {

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'magusibjuanjr06@gmail.com';
$mail->Password = 'dff54b44-2b0d-4fd3-aac8-d69399652672';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->setFrom('magusibjuanjr06@gmail.com', 'Payment System');
$mail->addAddress('magusibjuanjr06@gmail.com');

$mail->isHTML(true);
$mail->Subject = 'New Payment Transaction';

$mail->Body = "
<h3>Payment Receipt</h3>
<p><b>Payment Type:</b> $type</p>
<p><b>Name:</b> $name</p>
<p><b>Number:</b> $number</p>
<p><b>Status:</b> Successful</p>
";

$mail->send();

echo "<h2>Transaction Successful!</h2>";
echo "<p>Email sent to admin.</p>";

} catch (Exception $e) {

echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

}

?>