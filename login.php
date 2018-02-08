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
  <!-- DC iMenu Start -->
  <!-- choose the menu -->
<!-- <div class="dc_imenu">
  <ul>
    <li class="logo"><a href="0#"><img src="http://www.dcodes.net/2/menus/imenu/images/logo.png" border="0"></a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Products</a></li>
    <li><a href="#">Portfolio</a></li>
    <li><a href="#">Store</a></li>
    <li><a href="#">Contact</a></li>
    <li class="search"><a><input type="text" value="Search" onclick="(this.value=='Search' ? this.value = '' : null)"></a></li>
  </ul>
</div> -->
<!-- DC iMenu End -->
<div align="center">
  <div class="wrapper" >
    <h1>Welcome to the Test Manager V2</h1>
    <p>Please log in using the form below</p>
    <form class="form" method="post" action="">
      <input type="text" class="username" placeholder="Username">
      <div>
        <p class="name-help">Username</p>
      </div>
      <input type="text" class="username" placeholder="Password">
      <div>
        <p class="name-help">Password</p>
      </div>
      <input type="submit" class="submit"  value="Log In"><br><br>
      <input type="submit" class="submit"  value="Register">
      <a href="register.php">Temp Link</a>
    </form>
  </div>
</div>


</body>
</html>
