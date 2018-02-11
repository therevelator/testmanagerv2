<?php
  /**
   *
   */
  class CheckLogin
  {

    function CheckIfUserLoggedIn()
    {
      //checks if the username is set by getting the value from the session variable
      if (!isset($_SESSION['username'])) {
        unset($_SESSION['username']);
        header ('Location: login.php');
        $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"Not authorized, redirecting...\", \"error\");</script>";
      }
    }
  }

 ?>
