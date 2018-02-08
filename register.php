<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset=utf-8>
  <title></title>
  <link type="text/css" rel="stylesheet" href="css/login.css" />
  <link type="text/css" rel="stylesheet" href="http://cdn.dcodes.net/2/menus/imenu/css/dc_imenu.css" />
  <link href='https://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
  <link type="text/css" rel="stylesheet" href="css/sweetalert.css" />
  <script src="js/sweetalert.min.js"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
</head>
<body>
  <!-- DC iMenu Start -->

<!-- DC iMenu End -->
<div align="center">
  <div class="wrapper" >
    <h1>Welcome to the Test Manager V2</h1>
    <p>To sign-up for an account please fill in the form below</p>
    <form class="form" method="post" action="">

      <input type="text" class="username" name="username" placeholder="Username">
      <div>
        <!-- check errors / validators -->
      </div>
      <input type="email" class="email" name="email" placeholder="Email">
       <div>

      </div>
      <input type="password" class="password" name="password" placeholder="Password">
      <div>

      </div>
      <input type="password" class="password" name="repassword" placeholder="Retype Password">
      <div>

      </div>
      <input type="submit" class="submit" name="register" value="Register">
    </form>
    <?php
if (isset($_POST['register'])) {
  include_once('login_users.php');
  $user = new reg();
}
if (isset($_SESSION['error'])) {
  echo $_SESSION['error'];
}
$_SESSION['error'] = NULL;

 ?>
  </div>
</div>


</body>
</html>
