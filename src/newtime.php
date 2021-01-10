<?php
session_start();
require_once('../data/appointments.php');
if(!isset($_SESSION['login']) || !isset($_SESSION['logedemail']) || $_SESSION['logedemail'] != "admin@nemkovid.hu") {
    header('LOCATION:login.php'); 
    die();
}
define('VAL','value="');
$errors = [];
    if(isset($_POST['backToMain'])){
        header('LOCATION:login.php');
        die();
    }
    if(isset($_POST['newtime'])){
        if(isset($_POST['date'])){
            $date = $_POST['date'];
            if(strlen($date) != 10 || !preg_match ("/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/", $date)){
                array_push($errors,"Hibás dátum formátum. Az elfogadott formátum: 2021-01-10.");
            }else{
                if(intval(mb_substr($date, 6, 1)) > 5){
                    array_push($errors,"Májusnál későbbre nem adható meg új időpont.");
                }
            }
        }
        if(isset($_POST['time'])){
            $time = $_POST['time'];
            if(strlen($time) != 5 || !preg_match ("/^(0[0-9]|1[0-9]|2[0-3]):[0-5][0-9]$/", $time)){
                array_push($errors,"Hibás idő formátum. Az elfogadott formátum: 12:00.");
            }
        }
        if(isset($_POST['capacity'])){
            $capacity = $_POST['capacity'];
            if(!is_numeric($_POST['capacity']) || intval($_POST['capacity'])<=0){
                array_push($errors,"A férőhely száma csak pozitív egész lehet.");
            }
        }
        if(count($errors) == 0){
            $newAppointment = [
                "appid".strval(($numAppointments+1)) => [
                    'time' => $date.' '.$time,
                    'month' => getMonth(intval(mb_substr($date, 6, 1))),
                    'capacity' => $capacity,
                    'users' => []
                ]
            ];
            addAppointment($newAppointment);
            echo '<div style="color:green;">Időpont mentése sikeres!</div>';
        }
    }

$_POST = array();
?>
<!DOCTYPE html>
<html lang="hu">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>NemKoViD - Mondj nemet a koronavírusra!</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="../src/index.php">NemKoViD</a>
        </div>
      </div>
    </nav>
    <div class="container" style="margin-top: 60px">
        <h1>Új időpont meghirdetése</h1>
        <?php
            foreach ($errors as $error) {
                echo '<div style="color:red;">'.$error.'</div><br>';
            }
        ?>
        <form action="" method="post" novalidate>
            <div class="form-group">
                <label for="date">Dátum</label>
                <input type="text" class="form-control" id="date" name="date" placeholder="Dátum" <?php 
                    if(isset($date)){
                        echo VAL.$date.'"';
                    }
                ?> required>
            </div>
            <div class="form-group">
                <label for="time">Időpont</label>
                <input type="text" class="form-control" id="time" name="time" placeholder="Időpont" <?php 
                    if(isset($time)){
                        echo VAL.$time.'"';
                    }
                ?> required>
            </div>
            <div class="form-group">
                <label for="capacity">Helyek száma</label>
                <input type="text" class="form-control" id="capacity" name="capacity" placeholder="Helyek száma" <?php 
                    if(isset($capacity)){
                        echo VAL.$capacity.'"';
                    }
                ?> required>
            </div>
             <button type="submit" name="newtime" class="btn btn-primary">Időpont mentése</button>
             <p></p>
             <button type="submit" name="backToMain" class="btn btn-primary">Vissza a főoldalra</button>
        </form>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
