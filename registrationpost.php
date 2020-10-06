<?php

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

    $db = mysqli_connect('localhost', 'root', '', 'living_space_db');
    $email =$_POST['email'];
    $name =$_POST['company_name'];
    $phone =$_POST['phone'];
    $password =$_POST['password'];

  	$sql_e = "SELECT * FROM user WHERE email='$email'";
  	
  	$res_e = mysqli_query($db, $sql_e);

  	if(mysqli_num_rows($res_e) > 0){

        echo "Sorry... email already taken"; 
        	
      }
      else
      {
          $mail->IsHTML(true);
          $mail->AddAddress($_POST["email"], "Client"); //reciever email
          $mail->SetFrom("from-email@gmail.com", "Living Space Team"); //sender email
          //$mail->AddReplyTo("reply-to-email@domain", "reply-to-name");
          //$mail->AddCC("cc-recipient-email@domain", "cc-recipient-name");
          $mail->Subject = "New Registration";
          $content = "Welcome $name to living space \n\n <b>Login email:</b> $email \n <b>Password:</b> $password" ;

          $mail->MsgHTML($content); 
          if(!$mail->Send()) {
           
            $result = array("sent" => false); // or $result = array('error' => false);
             
            echo json_encode($result);
            var_dump($mail);

          } else {
 
            $query = "INSERT into user(email, name, phone, password) values ('$email', '$name', '$phone','$password')";
            $results = mysqli_query($db, $query);

            $result = array("sent" => true); // or $result = array('error' => false);
            echo json_encode($result);
            
           exit();
            
          }
        }
    
?>