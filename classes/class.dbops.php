<?php
session_start();








  // $ID = $_POST['DeleteID'];
  // $statement = $con->prepare("DELETE  FROM projects
  //     WHERE ID = '$ID'");
  // $statement->execute();
  // }  catch (PDOException $e) {
  //   echo "Failed to get DB handle: " . $e->getMessage() . "\n";
  //   exit;
  // }
$con = null;
}





 header('Location: ../dashboard.php');
?>
