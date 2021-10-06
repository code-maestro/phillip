<?php

  class DatabaseModule {

    // VARIABLES SPECIFYING THE SERVER AND DATABASE.
    private $server;
    private $username;
    private $password;
    private $dbname;
      
    // FUNCTION/METHOD TO INSTANTIATE THE CONNECTION TO THE DATABASE.
    private function connect(){

      //LOCAL DATABASE CONNECTION.
      $this->server = "localhost";
      $this->username = "root";
      $this->password = "";
      $this->dbname = "β-prototype";

      try {

        $conn = new mysqli(

          // Local development
          $this->server,
          $this->username,
          $this->password,
          $this->dbname

        );
      } catch (Exception $e) {

        echo "connection to the database failed " . $e->getMessage();

      }

      return $conn;
      
    }

    //READ FUNCTION/METHOD TO RETRIEVE DATA PASSED TO IT WHEN IT'S CALLED
    public function readData($query){

      $conn = $this->connect();

      $result = mysqli_query($conn, $query);

      if (!$result) {

        return false;

      }else {
        
        $data = false;

        while ($row = mysqli_fetch_assoc($result)) {
          
          $data[] = $row;

        }

        return $data;

      }
    }

    //SAVE METHOD TO STORE THE DATA PASSED TO IT WHEN IT'S CALLED
    public function saveData($query){
      
      $conn = $this->connect();

      $result = mysqli_query($conn, $query);

      if (!$result) {

        echo " DATA ENTRY FAILED, TRY AGAIN LATER  ";
        
        return false;

      }else {
        return true;
      }
    }

  }

  ?>