<?php
$file = $string = file_get_contents("../data/users.json");
$users = json_decode($file, true);
?>