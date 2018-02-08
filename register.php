<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<?php include_once('classes/class.header.php');
$header = new headers();
?>
<body>
  <!-- DC iMenu Start -->
<!-- look for a nice menu -->
<!-- DC iMenu End -->
<div align="center">
  <div class="wrapper" >
    <h1>Welcome to the Test Manager V2</h1>
    <p>To sign-up for an account please fill in the form below</p>
    <form class="form" method="post" action="">
      <input type="text" class="username" name="username" placeholder="Username">
      <div>
      </div>
      <input type="text" class="email" name="email" placeholder="Email">
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
//check if the button is pressed
if (isset($_POST['register'])) {
  include_once('login_users.php');
  //instantiate the register users class
  $user = new register();
}
//checks if any errors have been stored in the session
if (isset($_SESSION['error'])) {
  //and echoes if not empty
  echo $_SESSION['error'];
}
//after done displaying errors, unset errors variable.
$_SESSION['error'] = NULL;
?>
  </div>
</div>


</body>
</html>
