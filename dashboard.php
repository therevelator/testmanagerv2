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
      <button class="dc_3d_button black" name="logout">Log out</button>
  </form>
</div>


<?php
  include_once("classes/class.menu.php");
  $menu = new menu();
  include_once("classes/class.table.php");
  $menu = new table();
?>
<?php  } else {echo  "<script type=\"text/javascript\">swal(\"Nope !\", \"Not allowed, redirecting...\", \"warn\");</script>"; header ('Location: login.php');} ?>
