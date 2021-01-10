<?php
$file = file_get_contents("../data/users.json");
$users = json_decode($file, true);

function addUser($user){
    global $users;
    $users = array_merge($users,$user);
    $fp = fopen('../data/users.json', 'w');
    fwrite($fp, json_encode($users,JSON_PRETTY_PRINT));
    fclose($fp);
}

function isEmailNew($email){
    global $users;
    foreach ($users as $user => $userdata) {
        if($user == $email){
            return false;
        }
    }
    return true;
}

function isTajNew($taj){
    global $users;
    foreach ($users as $user => $userdata) {
        if($userdata['taj'] == $taj){
            return false;
        }
    }
    return true;
}

function showDetails($email){
    global $users;
    foreach ($users as $user => $userdata) {
        if($user == $email){
            echo '<b>Név:</b> '.$userdata['name'].' ';
            echo '<b>Lakcím:</b> '.$userdata['address'].' ';
            echo '<b>TAJ szám:</b> '.$userdata['taj'].'<br>';
            break;
        }
    }
}

?>