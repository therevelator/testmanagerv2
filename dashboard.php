
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
<?php session_start(); var_dump($_POST); if (isset($_SESSION['username'])) {  ?>
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
      <input type="text" placeholder="Search.." onkeyup="showResult(this.value)">
  </form>
</div>

<form>
      <div id="livesearch"></div>
</form>
<?php
  include_once("classes/class.menu.php");
  $menu = new menu();
  include_once("classes/class.table.php");
  $table = new table();

  $table->rendertable();
  if (isset($_POST['AddRecord'])) {
    unset($table);
    include_once("classes/class.table.php");
    $table = new table();
    $table->addproject();
  }

?>
<?php  } else {echo  "<script type=\"text/javascript\">swal(\"Nope !\", \"Not allowed, redirecting...\", \"warn\");</script>"; header ('Location: login.php');} ?>
