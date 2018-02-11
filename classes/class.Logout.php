<?php

  /**
   *This one does only Log-out. Nothing more.
   */
  class Logout
  {
    function __construct()
    {
        echo "<script type=\"text/javascript\">swal(\"Please wait...\", \"Logging out, redirecting to Log In page\", \"warn\");</script>";
        session_destroy();
        header ('Location: login.php');

    }
  }





 ?>
