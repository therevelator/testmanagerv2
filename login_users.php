<?php
session_start();
//include_once('../classes/class.errors.php');
  if (isset($_POST['register'])) {
    include_once('classes/class.ManageUsers.php');
    $users = new ManageUsers();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];
    $ip_address = $_SERVER['REMOTE_ADDR'];
    $reg_date = date("Y-m-d");
    $reg_time = date("H:i:s");

    if (empty($username) || empty($password) || empty($email) || empty($repassword) ) {
      $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope!\", \"All fields are required\", \"error\");</script>";
      header ('Location: register.php');
    // } elseif ($password !== $repassword) {
    //   header( 'Location: ../register.php' ) ;
      // $_SESSION['error'] = '<script type="text/javascript">swal("Nope!", "Passwords do not match", "error");</script>';
    } elseif ($password !== $repassword) {
      $_SESSION['error'] = '<script type="text/javascript">swal("Nope!", "Passwords must match", "error");</script>';
      header ('Location: register.php');
    } else {
      $check_availability = $users->GetUserInfo($username);
      if ($check_availability == 0) {
        $users->registerUsers ($username, $password, $ip_address, $reg_time, $reg_date, $email);
        if ($check_availability == 1) {
          $make_sessions = $users->GetUserInfo($username);
          print_r($make_sessions);
        }
      } else {
        $_SESSION['error'] = '<script type="text/javascript">swal("Nope!", "Username already in use", "error");</script>';
        header ('Location: register.php');
      }
    }
  }


 ?>
