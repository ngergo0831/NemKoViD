<!-- 

Állapottartás!!

-->



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
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
   </head>
<body>
  <div class="container">
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
      <button type="submit" name="submit" class="btn btn-default">Bejelentkezés</button>
    </form>
    <div class="containter" style="margin-top: 20px;">
        Még nincs fiókja?
        <a href="register.php">Regisztráció</a>
    </div>
  </div>
</body>
</html>