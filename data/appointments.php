<?php
define('JAN','Január');
define('FEB','Február');
define('MAR','Március');
define('APR','Április');
define('MAY','Május');

$months = [JAN,FEB,MAR,APR,MAY];

$file = $string = file_get_contents("../data/appointments.json");
$appointments = json_decode($file, true);

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

function addAppointment($appointment){
    echo 'TBA';
}

function modifyAppointment($appointments){
    $fp = fopen('../data/appointments.json', 'w');
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

?>