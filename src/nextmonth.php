<?php
session_start();
require_once("../data/appointments.php");
echo $_SESSION['month'];
if(isset($_SESSION['month']) && $_SESSION['month'] != MAY){
    $index = array_search($_SESSION['month'], $months);
    $_SESSION['month'] = $months[$index+1];
}
header('LOCATION:index.php'); 
die();
?>