<?php session_start(); if (isset($_SESSION['username'])) {  ?>


<?php include_once('classes/class.header.php'); $headers = new headers(); ?>
<link type="text/css" rel="stylesheet" href="css/navbar.css" />
<link type="text/css" rel="stylesheet" href="css/macwindow.css" />

<body>
<div align="center">
  <form class="form" method="post" align="center">
    <!-- DC 3D Buttons Start -->
<button class="dc_3d_button black" name="logout">Log out</button>
<button class="dc_3d_button black" name="logout">Log out</button>
<button class="dc_3d_button black" name="logout">Log out</button>
<button class="dc_3d_button black" name="logout">Log out</button>
<button class="dc_3d_button black" name="logout">Log out</button>
<button class="dc_3d_button black" name="logout">Log out</button>
<button class="dc_3d_button black" name="logout">Log out</button>
<button class="dc_3d_button black" name="logout">Log out</button>

<!-- DC 3D Buttons End -->
    <!-- <input type="submit" class="submit" name="logout" value="Log Out"> -->
  </form>
</div>
<!-- create a class which exports html with parameters in the mac window-->
<?php include_once('classes/class.macwindow.php');
$macWindow = new MacWindow();//add parameters?>
<?php
if (isset($_POST['logout'])) {
  include_once('classes/class.Logout.php');
  $manageUsers = new Logout();
}
?>

</body>
<?php  } else {echo  "<script type=\"text/javascript\">swal(\"Nope !\", \"Not allowed, redirecting...\", \"warn\");</script>"; header ('Location: login.php');} ?>
