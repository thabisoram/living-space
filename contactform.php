<?php

if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $emailFrom = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $emailTo = "thabisoramokopu@yahoo.com";
    $header ="From: ".$emailFrom;
    $txt = "You have recieved an email from ".$name.".\n\n".$message;

    if(mail($emailTo,$subject,$txt,$header)){
echo "success";
    }
else {
    # code...
    echo "Message couldn't send... please try again later, thank you";
}
    
    
}

?>