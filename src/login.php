<?php
    session_start();
    echo isset($_SESSION['login']);
    if(isset($_SESSION['login'])) {
      header('LOCATION:index.php');
      die();
    }
?>
<!DOCTYPE html>
<html lang="hu">
   <head>
     <meta http-equiv='content-type' content='text/html;charset=utf-8' />
     <title>NemKoViD - Bejelentkezés</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <a class="navbar-brand" href="../src/index.php">NemKoViD</a>
      </div>
    </div>
  </nav>
  <div class="container" style="margin-top: 60px">
    <h3 class="text-center">Login</h3>
    <?php
      if(isset($_SESSION['regsuccess'])){
        echo $_SESSION['regsuccess'];
      }
      if(isset($_POST['submit'])){
        $email = $_POST['email']; 
        $password = $_POST['password'];
        if(isUserValid($email,$password)){
          $_SESSION['login'] = true;
          header('LOCATION:login.php'); 
          die();
        } {
          echo "<div class='alert alert-danger'>Hibás email cím vagy jelszó</div>";
        }
      }

      function isUserValid($email,$passw){
        require_once('../data/users.php');
          foreach ($users as $user => $userdata) {
              if($user === $email && $userdata['password'] === $passw) {
                  $_SESSION['username'] = $userdata['name'];
                  $_SESSION['logedemail'] = $user;
                  $_SESSION['address'] = $userdata['address'];
                  $_SESSION['taj'] = $userdata['taj'];
                  return true;
              }
          }
          return false;
      }
    ?>
    <form action="" method="post" novalidate>
      <div class="form-group">
        <label for="email">Email cím</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="Email cím" required autofocus>
      </div>
      <div class="form-group">
        <label for="pwd">Jelszó</label>
        <input type="password" class="form-control" id="pwd" name="password" placeholder="Jelszó" required>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Bejelentkezés</button>
    </form>
    <div class="containter" style="margin-top: 20px;">
        Még nincs fiókja?
        <a href="register.php">Regisztráció</a>
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