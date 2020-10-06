<?php

include "connect.php";

$user_id =$_POST['user_id'];
$address =$_POST['address'];
$units =$_POST['avail_unit'];
$rent =$_POST['unit_price'];
$description =$_POST['description'];
$contact_person=$_POST['contact_person'];
$tel = $_POST['tel'];
$email =$_POST['email'];
$trackno =$_POST['trackno'];

$sql = "insert into hmo_acc(user_id, address, units, rent, description, contact_person, tel, email, trackno)
values ('$user_id','$address', '$units', '$rent','$description','$contact_person', '$tel', '$email','$trackno')";

if ($connect->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();



?>