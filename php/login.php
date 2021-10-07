<?php
  
  include_once "database.php";

  if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
            
    // QUERIES TO RETRIEVE THE  DATA 
    $query = "SELECT * FROM login WHERE email = '$email' 
              AND password = '$password' LIMIT 1;";

    $DB = new Database();
    $result = $DB->readData($query);

    if ($result) {

      $row = $result[0];

      if ($password === $row['password']) {

        echo " LOGIN SUCCESSFUL ";

        header("Location: ../dashboard.php");

      }

      }else {

        echo " LOGIN FAILED ";

      }

    }

  ?>