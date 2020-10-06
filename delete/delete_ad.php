<?php

$connect = mysqli_connect("localhost","root","","living_space_db");

$ad_id = $_POST['ad_id'];
$myTable = $_POST['table']; 
$featTable = $_POST['feat_table'];

$sql = "DELETE from $myTable WHERE ad_id = '".$_POST["ad_id"]."'";

if ($connect->query($sql) === TRUE) {

 echo "success";
    
} else {
    echo "Error deleting record: " . $connect->error;
}

$sql1 = "DELETE from $featTable WHERE ad_id = '".$_POST["ad_id"]."'";

if ($connect->query($sql1) === TRUE) {

    
} else {
    echo "Error deleting record: " . $connect->error;
}

  
$connect->close();
?>