<?php
    session_start();
    if(isset($_SESSION['login'])) {
      header('LOCATION:index.php');
      die();
    }

    define('VAL','value="');

    $errors = [];
    if(isset($_POST['register'])){
        if(isset($_POST['name'])){
            $name = $_POST['name']; 
        }
        if(isset($_POST['taj'])){
            $taj = $_POST['taj'];
        }
        if(isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if(isset($_POST['regemail'])){
            $regemail = $_POST['regemail'];
        }
        if(isset($_POST['regpassw'])){
            $regpassw = $_POST['regpassw'];
        }
        if(isset($_POST['regpassw2'])){
            $regpassw2 = $_POST['regpassw2'];
        }
    }
    $_POST = array();
?>
<!DOCTYPE html>
<html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>NemKoViD - Regisztráció</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h3 class="text-center">Regisztráció</h3>
            <div>
                <?php
                    foreach ($errors as $error) {
                        echo $error.'<br>';
                    }
                ?>
            </div>
            <form action="" method="post" novalidate>
                <div class="form-group">
                    <label for="name">Teljes név</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Teljes név" <?php 
                        if(isset($name)){
                            echo VAL.$name.'"';
                        }
                    ?> required>
                </div>
                <div class="form-group">
                    <label for="taj">TAJ szám</label>
                    <input type="text" class="form-control" id="taj" name="taj" placeholder="TAJ szám" <?php 
                        if(isset($taj)){
                            echo VAL.$taj.'"';
                        }
                    ?> required>
                </div>
                <div class="form-group">
                    <label for="address">Értesítési cím</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Értesítési cím" <?php 
                        if(isset($address)){
                            echo VAL.$address.'"';
                        }
                    ?> required>
                </div>
                <div class="form-group">
                  <label for="regemail">Email cím</label>
                  <input type="email" class="form-control" id="regemail" name="regemail" placeholder="Email cím" <?php 
                        if(isset($regemail)){
                            echo VAL.$regemail.'"';
                        }
                    ?> required>
                </div>
                <div class="form-group">
                  <label for="regpassw">Jelszó</label>
                  <input type="password" class="form-control" id="regpassw" name="regpassw" placeholder="Jelszó" <?php 
                        if(isset($regpassw)){
                            echo VAL.$regpassw.'"';
                        }
                    ?> required>
                </div>
                <div class="form-group">
                  <label for="regpassw2">Jelszó megerősítése</label>
                  <input type="password" class="form-control" id="regpassw2" name="regpassw2" placeholder="Jelszó megerősítése" <?php 
                        if(isset($regpassw2)){
                            echo VAL.$regpassw2.'"';
                        }
                    ?> required>
                </div>
                <button type="submit" name="register" class="btn btn-default">Regisztráció</button>
            </form>
        </div>
    </body>
</html>
