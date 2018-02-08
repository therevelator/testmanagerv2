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
}

$users = new ManageUsers();
echo $users->registerUsers('ionut', 'pass', '127.127.127.127', '12:00:05', '07-02-2018', 'ionut.apostu@mail.com');

















?>
