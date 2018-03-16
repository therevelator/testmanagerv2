<?php ?>
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
  <?php  ?>
<!-- menu placeholder -->
<div align="center">
  <div class="wrapper" style="width: 500px; margin-top: 10%;">
    <h1>Welcome to the Test Manager V2</h1>
    <p>Please log in using the form below</p>
    <form class="form" method="post" action="">
      <input type="text" class="username" name="username" style="height: 50px;" placeholder="Username">
      <input type="password" class="username"  name="password" style="height: 50px;" placeholder="Password">
      <input type="submit" class="loginbutton"  name="login" value="Log In"><br><br>
      <!-- <input type="submit" class="submit"  value="Register"> -->
    </form>
    <?php
    session_start();
    // var_dump($_SESSION);
    // var_dump($_POST);
    if (isset($_POST['login']) && !empty($_POST['login'])) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      include_once('classes/class.ManageUsers.php');
      $login = new ManageUsers();
      $login->loginUsers($username, $password);
      $_SESSION['username'] = $username;
    } else {
      session_destroy();
    }
    if (isset($_SESSION['error'])) {
      //and echoes if not empty
      echo $_SESSION['error'];
    }


    // if (isset($_SESSION['username'])) {
    //   header ('Location: dashboard.php');
    // }
    //after done displaying errors, unset errors variable.

    ?>
  </div>
</div>
</body>
</html>
