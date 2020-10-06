<?php
session_start();
$searchtxt="";


if(isset($_POST['searchtxt'])){
  $searchtxt = $_POST['searchtxt'];
  $_SESSION['location'] = $searchtxt;
  echo "success";
}
else{
   echo "not found";
}

  ?>