<?php

include "connect.php";

$user_id =$_POST['user_id'];
$address =$_POST['address'];
$family_bedroom =$_POST['family_bedroom'];
$family_rent =$_POST['family_rent'];
$description =$_POST['description'];
$contact_person=$_POST['contact_person'];
$tel = $_POST['tel'];
$email =$_POST['email'];
$trackno =$_POST['trackno'];

$sql = "insert into family_acc(user_id, address, bedrooms, rent, description, contact_person, tel, email, trackno)
values ('$user_id','$address', '$family_bedroom', '$family_rent','$description','$contact_person', '$tel', '$email','$trackno')";

if ($connect->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();
?>