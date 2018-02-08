<?php
  include_once('class.dbconnect.php');

  /**ManageUsers: allows the users to be registered and logged in
   *
   */
  class ManageUsers
  {
    public $link;

    function __construct() {
      $db_connect = new dbConnect();
      $this->link = $db_connect->connect();
      return $this->link;
    }

    function registerUsers ($username, $password, $ip_address, $reg_time, $reg_date, $email) {
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

    function loginUsers ($username, $password) {
      //select the DB, apparently I have to do that everytime with PDO
      $query = $this->link->prepare("use testmanager");
      $query->execute();
      $query = $this->link->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
      $rowCount = $query->rowCount();
      return $rowCount;
      //make the user login and redirect to the dashboard
      //or make the system give an error, saying invalid credentials
    }

    function GetUserInfo ($username) {
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
