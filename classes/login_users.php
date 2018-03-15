<?php

include_once('classes/class.ManageUsers.php');
/**
 *this class checks if everything is ok with the form and validates stuff
 */
class register
{

  function __construct()
  {
      $users = new ManageUsers();
      $username = $_POST['username'];
      $password = $_POST['password'];
      $repassword = $_POST['repassword'];
      $email = $_POST['email'];
      $ip_address = $_SERVER['REMOTE_ADDR'];
      date_default_timezone_set('Europe/Dublin');
      $reg_date = date("Y-m-d");
      $reg_time = date("H:i:s");
      if (empty($username) || empty($password) || empty($email) || empty($repassword) ) {
        return $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"All fields are required\", \"error\");</script>";
        header ('Location: register.php');
        //add an elseif and check $password !== $repassword, and then give the error
      }elseif ($password !== $repassword) {
        return $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"Passwords must match\", \"error\");</script>";
        header ('Location: register.php');
      }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"Email must be valid\", \"error\");</script>";
        header ('Location: register.php');
      // pass length commented for testing purposes
      } elseif (strlen($password) <= 7) {
        return $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"Password is too short. Try more characters\", \"error\");</script>";
        header ('Location: register.php');
 } else {
   //like checking for username, implement a function called GetEmail and check if the e-mail has been in use before
        $check_availability = $users->GetUserInfo($username);
        if ($check_availability == 0) {
          $users->registerUsers ($username, $password, $ip_address, $reg_time, $reg_date, $email);
          if ($check_availability == 1) {
            return $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"Username already in use\", \"error\");</script>";
            header ('Location: register.php');
            $make_sessions = $users->GetUserInfo($username);
        }
      }
    }
    echo  "<script type=\"text/javascript\">swal(\"Success :)\", \"The user has been successfully created!\", \"success\");</script>";

  }
}




 ?>
