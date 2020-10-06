<?php
session_start();

include 'connect.php';

$email = $_POST['email'];

if ($email != ""){

    $sql_query = "select * from user where email='".$email."'";
    $result = mysqli_query($connect,$sql_query);
    $row = mysqli_fetch_array($result);

    $count = $row['user_id'];

    if($count > 0){
        
        echo "success";
    }else{
        echo "fail";
    }
}

?>