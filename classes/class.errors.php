<?php
  /**
   *
   */
  class CustomError
  {

    function error()
    {
      echo '<script src="js/sweetalert.min.js"></script>';
      echo '<link rel="stylesheet" href="css/sweetalert.css" />';
      echo  '<script type="text/javascript">swal("Nope!", "All fields are required", "error");</script>';
    }
  }












 ?>
