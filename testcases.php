<head>
 <link type="text/css" rel="stylesheet" href="css/tabletestcases.css" />
  <link type="text/css" rel="stylesheet" href="css/testcases.css" />
</head>
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
  xmlhttp.open("GET","livesearchtestcases.php?q="+str,true);
  xmlhttp.send();
}
</script>
<?php session_start();  if (isset($_SESSION['username'])) {  ?>
<?php include_once('classes/class.header.php'); $headers = new headers(); ?>
<?php
if (isset($_POST['logout'])) {
  include_once('classes/class.Logout.php');
  $manageUsers = new Logout();
}
if (isset($_POST['back'])) {
  header ('Location: dashboard.php');
}
?>
<div align="center">
  <form class="form" method="post" align="center">
      <button class="dc_3d_button black" name="back">Back to Projects</button>
      <button class="dc_3d_button black" name="logout">Log out</button>
      <button class="dc_3d_button black" name="logout">Log out</button>
      <button class="dc_3d_button black" name="logout">Log out</button>
      <button class="dc_3d_button black" name="AddRecord">Add Record</button>
      <input type="text" placeholder="Search.." onkeyup="showResult(this.value)" style="width: 300px;height: 40px;margin-top: 7px; text-align: center; color: aliceblue;">
  </form>
</div>
<form>
      <div id="livesearch" class="livesearchtestcases"></div>
</form>

<div class="container">
  <table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Created By</th>
				<th>Project ID</th>
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
    $table->addtestcase();

  }

  if (isset($_POST['add'])) {//put this into a class

    if (!empty($_POST['ProjectName'])) {
    $name = $_POST['ProjectName'];
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
    $stmt = $pdo->prepare("INSERT INTO testcase(Name, CreatedBy, CreatedTime, ProjectID)
        VALUES(:pname, :createdby, :createdtime, :projectID)");
        $projectID = $_SESSION['posted_details_id'];
        $user = $_SESSION['username'];
    $stmt->execute(array(
        "pname" => $name,
        "createdby" => $user,
        "createdtime" => $timestamp,
        "projectID" => $projectID
    ));
    }  catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
    }
    $conn = null;
    echo "<script type=\"text/javascript\">swal(\"Success :)\", \"Record added...\", \"success\");</script>";
  }else {
    echo "<script type=\"text/javascript\">swal(\"Error :(\", \" Name field cannot be empty...\", \"error\");</script>";
  }
}


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
    $stmt = $pdo->query("DELETE FROM testcase WHERE ID = '".$ID."'");
    } catch (Exception $e) {
      $error = $e->getMessage();
      echo $error;
    }
    echo "<script type=\"text/javascript\">swal(\"Deleted \", \"\", \"error\");</script>";
}

if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_pagetests = 7;
        $offsettests = ($pageno-1) * $no_of_records_per_pagetests;

        $conn=mysqli_connect("localhost","root","","testmanager");
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            die();
        }
        $posted_details_id = $_SESSION['posted_details_id'];
        $total_pages_sql = "SELECT COUNT(*) FROM testcase WHERE ProjectID = $posted_details_id";
        $result = mysqli_query($conn,$total_pages_sql);

        $total_rows = mysqli_fetch_array($result)[0];

        $total_pages = ceil($total_rows / $no_of_records_per_pagetests);
        //var_dump($total_pages);
        $sql = "SELECT * FROM testcase WHERE ProjectID = $posted_details_id LIMIT $offsettests, $no_of_records_per_pagetests";
        $res_data = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_array($res_data)){
            //here goes the data
        }
        mysqli_close($conn);
        include_once("classes/class.table.php");
        $table = new table();
        $table->rendertestcases($offsettests, $no_of_records_per_pagetests);

?>

    <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        <!-- asta e buna si pentru link-uri pe sus pentru search -->
    </ul>
</body>
</html>
</div>
<?php  } else {echo  "<script type=\"text/javascript\">swal(\"Nope !\", \"Not allowed, redirecting...\", \"warn\");</script>"; header ('Location: login.php');}


 ?>
