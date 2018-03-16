<head>
  <meta charset=utf-8>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link type="text/css" rel="stylesheet" href="css/dcodes.net.css" />
  <link type="text/css" rel="stylesheet" href="css/table.css" />
  <link type="text/css" rel="stylesheet" href="css/buttons.css" />
  <link type="text/css" rel="stylesheet" href="css/login.css" />
  <link type="text/css" rel="stylesheet" href="css/sweetalert.css" />
  <link type="text/css" rel="stylesheet" href="css/search.css" />
  <script src="js/sweetalert.min.js"></script>
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
<?php session_start(); if (isset($_SESSION['username'])) {  ?>
<?php// include_once('classes/class.header.php'); $headers = new headers(); ?>
<?php
if (isset($_POST['logout'])) {
  include_once('classes/class.Logout.php');
  $manageUsers = new Logout();
}
var_dump($_POST);
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
    if (isset($_POST['Add'])) {
      $name = $_POST['ProjectName'];
      $description = $_POST['Description'];
    }
  }
  include_once("classes/class.table.php");
  $table = new table();
  $table->rendertable();
?>
</div>
<?php  } else {echo  "<script type=\"text/javascript\">swal(\"Nope !\", \"Not allowed, redirecting...\", \"warn\");</script>"; header ('Location: login.php');} ?>
