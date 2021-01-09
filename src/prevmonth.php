<?php
session_start();
require_once("../data/appointments.php");
if(isset($_SESSION['month']) && $_SESSION['month'] != JAN){
    $index = array_search($_SESSION['month'], $months);
    $_SESSION['month'] = $months[$index-1];
}
header('LOCATION:index.php'); 
die();
?>