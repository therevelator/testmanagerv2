<?php
session_start();
if (isset($_POST['add'])) {

  $name = $_POST['ProjectName'];
  $description = $_POST['Description'];
  $timestamp = date("Y-m-d H:i:s");
  // $posted_details_id = $_SESSION['posted_details_id'];
  $dbhost = "localhost";
  try {
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
}  catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
}


  $conn->close();
//header('Location: dashboard.php');
?>
