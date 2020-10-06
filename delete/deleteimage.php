<?php
$path = "C:/xampp/htdocs/LivingSpace/";
 

$connect = mysqli_connect("localhost","root","","living_space_db");

$conn = new mysqli("localhost", "root", "", "living_space_db");

if(isset($_POST['ad_id'])){

$ad_id = $_POST['ad_id'];
$myTable = $_POST['table'];  


$sql = "SELECT * FROM $myTable WHERE ad_id= $ad_id";
$query = mysqli_query($connect, $sql);

if($query) {

  while($row = mysqli_fetch_assoc($query)){
    $newname = str_replace("upload", "upload/trash",  $row['image']);
    rename($path.$row['image'],  $path.$newname);      
  }
}

$sql = "delete from $myTable WHERE ad_id=$ad_id";

if ($conn->query($sql) === TRUE) {
  echo "success";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
/////////////
}

  
$connect->close();
?>