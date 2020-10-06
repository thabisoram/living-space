<?php
include "connect.php";

$trackno = $_POST['trackno'];
$bool = false;


$query = mysqli_query($connect, "SELECT * FROM student_acc WHERE trackno='".$trackno."'");
if(mysqli_num_rows($query) > 0){
    echo json_encode($bool);
    exit;

}else{
    $query = mysqli_query($connect, "SELECT * FROM guest_acc WHERE trackno='".$trackno."'");
    if(mysqli_num_rows($query) > 0){
        echo json_encode($bool);
        exit;
    
    }else{
        $query = mysqli_query($connect, "SELECT * FROM professional_acc WHERE trackno='".$trackno."'");
        if(mysqli_num_rows($query) > 0){
            echo json_encode($bool);
            exit;
        
        }else{
        $bool = true;
        echo json_encode($bool);
         exit;
        }
    
    }

}
?>