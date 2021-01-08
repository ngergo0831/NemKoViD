d<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="../style/style.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">NemKoViD</a>
        </div>
        <div style="color: white">
        <?php
          session_start();
          if(isset($_SESSION['login'])) {
            $username = $_SESSION['username']; 
            echo $username;
            echo '<a href="/src/logout.php">Kijelentkezés</a>';
          }else{
            echo '<a href="/src/login.php">Bejelentkezés</a>';
          }
        ?>
        </div>
      </div>
    </nav>

    <div class="container" style="margin-top: 60px">
      <div class="d-flex flex-column align-items-center">
        <h3>NemKoViD</h3>
        <p>
          A Nemzeti Koronavírus Depó (NemKoViD - Mondj nemet a koronavírusra!)
          központi épületében különböző időpontokban oltásokat szervez.
        </p>
        <p>Az oldalon a koronavírus elleni oltásra lehet időpontot foglalni.</p>
        <h5 style="margin-top:50px;">Időpontok</h5>
        <?php
          require_once(dirname(__DIR__).'/data/appointments.php');
          foreach ($appointments as $appoints) {
            echo '<div style="margin-top:20px;" class="';
            if($appoints["capacity"]-count($appoints["users"]) > 0){
              echo 'available">';
            }else{
              echo 'unavailable">';
            }
            echo $appoints["time"].' '.$appoints["capacity"]-count($appoints["users"]).'/'.$appoints["capacity"].' szabad hely</div>';
            if($appoints["capacity"]-count($appoints["users"]) > 0){
              #ha nem vagyunk bejelentkezve, akkor a loginra dob
              echo '<a href="./reservation.php">Jelentkezés</a>';
            }
          }
        ?>
      </div>
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
