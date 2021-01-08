<?php 
session_start();
$_SESSION["username"] = "";
$_SESSION["email"] = "";
$_SESSION['login'] = false;
session_destroy();
header("Location: index.php");
?>