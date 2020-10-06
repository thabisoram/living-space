<?php

session_start();

include 'connect.php';

$email = mysqli_real_escape_string($connect,$_POST['email']);
$password = mysqli_real_escape_string($connect,$_POST['password']);


if ($email != "" && $password != ""){

    $sql_query = "select * from user where email='".$email."' and password='".$password."'";
    $result = mysqli_query($connect,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['user_id'];

    if($count > 0){
        $_SESSION['user_id'] =  $row['user_id'];
        $_SESSION['user_logged_in'] = true;
        
        echo "success";
    }else{
        echo "fail";
    }

}

?>