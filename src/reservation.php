<?php
require_once('../data/appointments.php');
session_start();
if(isset($_GET['restime']) && isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['logedemail'])){
    foreach ($appointments as $key => $appoints) {
        if($appoints['time'] == $_GET['restime'] && count($appoints['users']) < $appoints['capacity'] && !haveAppointment($_SESSION['logedemail'])){
            array_push($appointments[$key]['users'],$_SESSION['logedemail']);
            modifyAppointment($appointments);
            header('LOCATION:index.php'); 
            die();
        }
    }
}
?>