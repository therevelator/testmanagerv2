
<script>
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","livesearch.php?q="+str,true);
  xmlhttp.send();
}
</script>
<?php session_start(); var_dump($_POST);  if (isset($_SESSION['username'])) {  ?>
<?php include_once('classes/class.header.php'); $headers = new headers(); ?>
<?php
if (isset($_POST['logout'])) {
  include_once('classes/class.Logout.php');
  $manageUsers = new Logout();
}
?>
<div align="center">
  <form class="form" method="post" align="center">
      <button class="dc_3d_button black" name="logout">Log out</button>
      <button class="dc_3d_button black" name="logout">Log out</button>
      <button class="dc_3d_button black" name="logout">Log out</button>
      <button class="dc_3d_button black" name="logout">Log out</button>
      <button class="dc_3d_button black" name="AddRecord">Add Record</button>
      <input type="text" placeholder="Search.." onkeyup="showResult(this.value)" style="width: 300px;height: 40px;margin-top: 7px; text-align: center; color: aliceblue;">
  </form>
</div>
<form>
      <div id="livesearch"></div>
</form>

<div class="container">
  <table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Created By</th>
				<th>Description</th>
        <th>Actions</th>
			</tr>
		</thead>
		<tbody>
<?php
  include_once("classes/class.menu.php");
  $menu = new menu();
  if (isset($_POST['AddRecord'])) {
    include_once("classes/class.table.php");
    $table = new table();
    $table->addproject();

  }


  if (isset($_POST['add'])) {//put this into a class
    $user = $_SESSION['username'];
    $name = $_POST['ProjectName'];
    $description = $_POST['Description'];
    $timestamp = date("Y-m-d H:i:s");
    try {
      $host = '127.0.0.1';
     $db   = 'testmanager';
     $user = 'root';
     $pass = '';
     $charset = 'utf8mb4';
     if(isset($_POST['DeleteID'])){
     $ID = $_POST['DeleteID'];
 }
     $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
     $opt = [
         PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
         PDO::ATTR_EMULATE_PREPARES   => false,
     ];
     $pdo = new PDO($dsn, $user, $pass, $opt);
    $stmt = $pdo->prepare("INSERT INTO projects(ProjectName, CreatedBy, CreatedTime, Description)
        VALUES(:pname, :createdby, :createdtime, :description)");
    $stmt->execute(array(
        "pname" => $name,
        "createdby" => $user,
        "createdtime" => $timestamp,
        "description" => $description
    ));
    }  catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
    }
  $conn = null;
  }

  // $_POST['DeleteID'] = NULL;
  // $_POST['Delete'] = NULL;
  if (isset($_POST["Delete"]))
{
  $delete = $_POST["Delete"];
} else {
  $delete = NULL;
}
  if ($delete == "Delete") {//put this into a class
    $user = $_SESSION['username'];
    @$name = $_POST['ProjectName'];
    @$description = $_POST['Description'];
    $timestamp = date("Y-m-d H:i:s");
    try {
    $host = '127.0.0.1';
    $db   = 'testmanager';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    $ID = $_POST['DeleteID'];
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
    ];
    $pdo = new PDO($dsn, $user, $pass, $opt);
    $stmt = $pdo->query("DELETE FROM projects WHERE ID = '".$ID."'");
    // while ($row = $stmt->fetch())
    // {
    //     echo $row['name'] . "\n";
    // }
    } catch (Exception $e) {
      $error = $e->getMessage();
      echo $error;
    }
}

include_once("classes/class.table.php");
$table = new table();
$table->rendertable();
if(isset($_SESSION['success'])) {

}
?>
</div>
<?php  } else {echo  "<script type=\"text/javascript\">swal(\"Nope !\", \"Not allowed, redirecting...\", \"warn\");</script>"; header ('Location: login.php');}


 ?>
