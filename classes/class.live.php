<?php
session_start();
/**
 *
 */
class dbops
{

  function add()
  {
    if (isset($_POST['add'])) {
      $user = $_SESSION['username'];
      $name = $_POST['ProjectName'];
      $description = $_POST['Description'];
      $timestamp = date("Y-m-d H:i:s");
      try {
        $dbhost = "localhost";
      $dbname = "testmanager";
      $dbusername = "root";
      $dbpassword = "";
      $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
      $statement = $link->prepare("INSERT INTO projects(ProjectName, CreatedBy, CreatedTime, Description)
          VALUES(:pname, :createdby, :createdtime, :description)");
      $statement->execute(array(
          "pname" => $name,
          "createdby" => $user,
          "createdtime" => $timestamp,
          "description" => $description
      ));
      $_SESSION['success'] = "success";
      }  catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage() . "\n";
        exit;
      }
    }

  }
}


//header('Location: ../dashboard.php');
?>
