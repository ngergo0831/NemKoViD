<?php
    session_start();
    if(!isset($_SESSION['login'])) {
        header('LOCATION:login.php'); die();
    }
?>
<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Admin Page</title>
    </head>
    <body>
        This is admin page view able only by logged in users.
    </body> 
</html>