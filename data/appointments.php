<?php
function haveAppointment($username){
    global $appointments;
    foreach ($appointments as $appoints) {
        foreach ($appoints['users'] as $user) {
            if($user == $username){
                return true;
            }
        }
    }
    return false;
}

define('JAN','Január');
define('FEB','Február');
define('MAR','Március');
define('APR','Április');
define('MAY','Május');

$months = [JAN,FEB,MAR,APR,MAY];

$file = $string = file_get_contents("../data/appointments.json");
$appointments = json_decode($file, true);

?>