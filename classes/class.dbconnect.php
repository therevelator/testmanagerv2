<?php
    /**This is the class with which we connect to the DB
     * MySQL, hosted locally
     */
    class dbConnect
    {
      protected $db_conn;
      public $db_name = "testmanager";
      public $db_user = "root";
      public $db_pass = "";
      public $db_host = "localhost";

      function connect() {
        try {
          $this->db_conn = new PDO ("mysql:host=localhost;db_name=testmanager", $this->db_user, $this->db_pass);
          $this->db_conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $this->db_conn->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
          return $this->db_conn;
        } catch (Exception $e) {
          var_dump ($e->getMessage());
    }

  }
  

}























?>
