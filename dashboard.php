<head>
  <link type="text/css" rel="stylesheet" href="css/table.css" />
  <link type="text/css" rel="stylesheet" href="css/dashboard.css" />
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
  xmlhttp.open("GET","livesearch.php?q="+str,true);
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
      <div id="livesearch" class="livesearch"></div>
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
    if (!empty($_POST['ProjectName']) && !empty($_POST['Description'])) {
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
        "createdby" => $_SESSION['username'],
        "createdtime" => $timestamp,
        "description" => $description
    ));
    }  catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
    }
  $conn = null;
  $_POST['DeleteID'] = NULL;
  //echo "<script type=\"text/javascript\">swal(\"Success :)\", \"Record added...\", \"success\");</script>";
} else {
  echo "<script type=\"text/javascript\">swal(\"Error :(\", \"Both fields are required...\", \"error\");</script>";
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
    $stmt = $pdo->query("DELETE FROM projects WHERE ID = '".$ID."'");
    echo "<script type=\"text/javascript\">swal(\"Project deleted\", \"\", \"error\");</script>";
    } catch (Exception $e) {
      $error = $e->getMessage();
        echo "<script type=\"text/javascript\">swal(\"Can't delete project\", \"Project not empty\", \"error\");</script>";
        //echo $error; for debugging purposes only
    }
  }

    if (isset($_POST["Details"]) && is_numeric($_POST["DetailsID"]))
    {
    $posted_details_id = $_POST["DetailsID"];
    $_SESSION['posted_details_id'] = $posted_details_id;
    // var_dump($posted_details_id);
    echo  '<script type="text/javascript">swal("Please wait ...", "Getting project details...", "warn");</script>';
    header ('Location: testcases.php?projectid=' . $posted_details_id);
    }
    $posted_details_id = NULL;


    if (isset($_GET['pageno'])) {
                $pageno = $_GET['pageno'];
            } else {
                $pageno = 1;
            }
            $no_of_records_per_page = 10;
            $offset = ($pageno-1) * $no_of_records_per_page;

            $conn=mysqli_connect("localhost","root","","testmanager");
            // Check connection
            if (mysqli_connect_errno()){
                echo "Failed to connect to MySQL: " . mysqli_connect_error();
                die();
            }

            $total_pages_sql = "SELECT COUNT(*) FROM projects";
            $result = mysqli_query($conn,$total_pages_sql);

            $total_rows = mysqli_fetch_array($result)[0];

            $total_pages = ceil($total_rows / $no_of_records_per_page);
            //var_dump($total_pages);
            $sql = "SELECT * FROM projects LIMIT $offset, $no_of_records_per_page";
            $res_data = mysqli_query($conn,$sql);
            while($row = mysqli_fetch_array($res_data)){
                //here goes the data
            }
            mysqli_close($conn);
            include_once("classes/class.table.php");
            $table = new table();
            $table->rendertable($offset, $no_of_records_per_page);

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
