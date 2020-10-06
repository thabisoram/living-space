<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Mailer = "smtp";

$mail->SMTPDebug  = 1;  
$mail->SMTPAuth   = TRUE;
$mail->SMTPSecure = "tls";
$mail->Port       = 587;
$mail->Host       = "smtp.gmail.com";
$mail->Username   = "thabisoyoungpro@gmail.com";
$mail->Password   = "ramokopu";

$mail->IsHTML(true);
$mail->AddAddress($_POST["email"], "Client"); //reciever email
$mail->SetFrom("from-email@gmail.com", "Living Space Support"); //sender email
//$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
//$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
$mail->Subject = "Password recovery";
$content = "Here's you recovery code <b>".$_POST["code"]."</b>";

$mail->MsgHTML($content); 
if(!$mail->Send()) {
  $_SESSION['mail'] = "fail";
  echo "Error while sending Email.";
  var_dump($mail);
} else {
  echo "success";
  $_SESSION['mail'] = "success";

}

?>