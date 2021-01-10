<?php
define('JAN','Január');
define('FEB','Február');
define('MAR','Március');
define('APR','Április');
define('MAY','Május');
define('APP','../data/appointments.json');

$months = [JAN,FEB,MAR,APR,MAY];

$file = $string = file_get_contents(APP);
$appointments = json_decode($file, true);
$numAppointments = count($appointments);

function haveAppointment($username){
    global $appointments;
    foreach ($appointments as $appoints) {
        foreach ($appoints['users'] as $user) {
            if($user == $username){
                $_SESSION['appointmenttime'] = $appoints['time'];
                return true;
            }
        }
    }
    return false;
}

function getMonth($month){
    switch($month){
        case 1: return JAN;
        case 2: return FEB;
        case 3: return MAR;
        case 4: return APR;
        case 5: return MAY;
        default: return "fasz";
    }
}

function addAppointment($appointment){
    global $appointments;
    $appointments = array_merge($appointments,$appointment);
    $fp = fopen(APP, 'w');
    fwrite($fp, json_encode($appointments,JSON_PRETTY_PRINT));
    fclose($fp);
}

function modifyAppointment($appointments){
    $fp = fopen(APP, 'w');
    fwrite($fp, json_encode($appointments,JSON_PRETTY_PRINT));
    fclose($fp);
}

function disclaimReservation($username){
    global $appointments;
    foreach ($appointments as $key => $appoints) {
        foreach ($appoints['users'] as $user) {
            if($user == $username){
                $arraydiff = array_diff($appoints['users'], [$username]);
                $appointments[$key]['users'] = $arraydiff;
                modifyAppointment($appointments);
                break;
            }
        }
    }
}

function showReservedUsers($time){
    require_once('../data/users.php');
    global $appointments;
    foreach ($appointments as $appoints) {
        if($appoints['time'] == $time){
            foreach ($appoints['users'] as $user) {
                showDetails($user);
            }
        }
    } 
}

?>