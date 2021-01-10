<?php
require_once('../data/appointments.php');
require_once('../data/users.php');
session_start();
define('ADMIN','admin@nemkovid.hu')
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
    <?php
        echo 'Időpont: '.$_GET['restime'].'<br>';
        echo 'Név: '.$_SESSION['username'].'<br>';
        echo 'Lakcím: '.$_SESSION['address'].'<br>';
        echo 'TAJ szám: '.$_SESSION['taj'].'<br>';
    ?>
    <form action="" method="POST" novalidate>
        <input type="checkbox" name="accept" id="accept">
        <label for="accept" id='label'>A jelentkezéssel elfogadja az <a href="https://vakcinainfo.gov.hu/adatkezelesi-tajekoztato" target="_blank">általános feltételeket</a>.</label><br>
        <?php
        if(isset($_SESSION['logedemail']) && $_SESSION['logedemail'] == ADMIN){
          echo '<p style="font-size:1.3em;color: red;">Adminként az időpontfoglalás nem lehetséges!</p>';
        }
        else if(isset($_POST['accept']) && isset($_POST['acceptBtn'])){
            if(isset($_GET['restime']) && isset($_SESSION['login']) && $_SESSION['login'] && isset($_SESSION['logedemail'])){
                foreach ($appointments as $key => $appoints) {
                    if($appoints['time'] == $_GET['restime'] && count($appoints['users']) < $appoints['capacity'] && !haveAppointment($_SESSION['logedemail'])){
                        array_push($appointments[$key]['users'],$_SESSION['logedemail']);
                        modifyAppointment($appointments);
                        header('LOCATION:ressuccessfull.php'); 
                        die();
                    }
                }
            }else{
                echo 'Fatális hiba';
            }
        }else{
            if(isset($_POST['acceptBtn'])){
                echo '<p style="font-size:1.3em;color: red;">Az általános feltételek elfogadása kötelező!</p>';
            }
        }
        ?>
        <?php 
        if(isset($_SESSION['logedemail']) && $_SESSION['logedemail'] == ADMIN){
          echo '<a href="../src/index.php" class="btn btn-primary">Vissza a főoldalra</a>';
        }else{
          echo '<button type="submit" name="acceptBtn" class="btn btn-primary">Jelentkezés megerősítése</button>';
        }
        ?>
      </form>

    <?php
      if(isset($_SESSION['login']) && isset($_SESSION['logedemail']) && $_SESSION['logedemail'] == "admin@nemkovid.hu"){
        echo '<div>Az időpontra regisztráltak adatai:</div>';
        showReservedUsers($_GET['restime']);
      } 
    ?>

    </div>
    <script>
        const accept = document.querySelector('#label');
        accept.addEventListener('mousedown', (e) => e.preventDefault(), false);
    </script>
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