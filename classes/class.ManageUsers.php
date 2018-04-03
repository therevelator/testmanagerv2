<?php
  include_once('class.dbconnect.php');

  /**ManageUsers: allows the users to be registered and logged in
   *
   */
  class ManageUsers
  {
    public $link;
    public $username;
    public function __construct() {
      $db_connect = new dbConnect();
      $this->link = $db_connect->connect();
      return $this->link;
    }

    public function registerUsers ($username, $password, $ip_address, $reg_time, $reg_date, $email) {
      //select database
      $query = $this->link->prepare("use testmanager");
      $query->execute();
      //create prepared statement using PDO
      $query = $this->link->prepare("INSERT INTO users (username, password, ip_address, reg_time, reg_date, email) VALUES (?,?,?,?,?,?)");
      //the question marks in the VALUES paranthesis are for protecting the DB against injection
      $values = array($username, $password, $ip_address, $reg_time, $reg_date, $email);
      //executes the query prepared earlier
      $query->execute($values);
      //counts number of rows inserted
      $counts = $query->rowCount();
      return $counts;
    }

    public function loginUsers ($username, $password) {
      $username = $_POST['username'];
      $password = $_POST['password'];
      $query = $this->link->prepare("use testmanager");
      $query->execute();
      $query = $this->link->prepare("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
      $query->execute();
      $rowCount = $query->rowCount();
      if ($rowCount == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Success :)\", \"Successfully logged in, please wait\", \"success\");</script>";
        header ('Location: dashboard.php');
      } elseif ($rowCount == 0) {
        $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Nope! \", \"Please check username / password combination...\", \"error\");</script>";
      } else {
        $_SESSION['error'] = "<script type=\"text/javascript\">swal(\"Hmmm... \", \"Please enter an username and a password first...\", \"warn\");</script>";

      }
    }

      //make the user login and redirect to the dashboard
      //or make the system give an error, saying invalid credentials
    public function GetUserInfo ($username) {
      $query = $this->link->prepare("use testmanager");
      $query->execute();
      $query = $this->link->query("SELECT * FROM users WHERE username = '$username'");
      $rowCount = $query->rowCount();
      if ($rowCount == 1) {
        $result = $query->fetchAll();
        return $result;
      } else {
        return $rowCount;
      }
    }
  }







?>
