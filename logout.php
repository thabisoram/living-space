<?php
session_start();
// remove all session variables
unset($_SESSION["user_id"]);
 // where $_SESSION["nome"] is your own variable. if you do not have one use only this as follow **session_unset();**
session_destroy();
header("Location: {$_SERVER['HTTP_REFERER']}");
?>