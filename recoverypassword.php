<?php
include "connect.php";

$email = $_POST["email"];
$password = $_POST["password"];

$sql ="update user SET password = '$password' WHERE email = '$email'";

if ($connect->query($sql) === TRUE) {
    echo "success";
} else {
    echo "Error: " . $sql . "<br>" . $connect->error;
}

$connect->close();

?>