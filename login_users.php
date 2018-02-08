<?php

include_once('classes/class.ManageUsers.php');
//include_once('../classes/class.errors.php');
/**
 *
 */
class reg
{

  function __construct()
  {


      $users = new ManageUsers();
      $username = $_POST['username'];
      $password = $_POST['password'];
      $repassword = $_POST['repassword'];
      $email = $_POST['email'];
      $ip_address = $_SERVER['REMOTE_ADDR'];
      $reg_date = date("Y-m-d");
      $reg_time = date("H:i:s");

      if (empty($username) || empty($password) || empty($email) || empty($repassword) ) {
        //maybe validate user input with a class and functions, might work better
        return $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"All fields are required\", \"error\");</script>";
        header ('Location: register.php');
        //add an elseif and check $password !== $repassword, and then give the error
      } else {
        $check_availability = $users->GetUserInfo($username);
        if ($check_availability == 0) {
          $users->registerUsers ($username, $password, $ip_address, $reg_time, $reg_date, $email);
          if ($check_availability == 1) {
            $_SESSION['error'] = NULL;
            $make_sessions = $users->GetUserInfo($username);
            print_r($make_sessions);
          }
        } else {
          
          // header ('Location: register.php');
        }
      }

    }

}




 ?>
