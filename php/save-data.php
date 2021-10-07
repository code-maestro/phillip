<?php

 include_once('database.php');

  $new_num = rand(1,10);

  $other_num = rand(1,5);

  echo $new_num;

  if (isset($_POST['register'])) {

    $equipment_name = $_POST['equipment-name'];
    $equipment_model = $_POST['equipment-model'];
    $equipment_manufacturer = $_POST['equipment-manufacturer'];
    $equipment_serial_no = $_POST['equipment-serial-no'];
    $equipment_status = $_POST['equipment-status'];
    $equipment_quantity = $_POST['equipment-quantity'];

    $engineer_name = $_POST['engineer-name'];

    $manufacturer_name = $_POST['manufacturer-name'];
    $manufacturer_country = $_POST['manufacturer-country'];

    $servicing_date = $_POST['servicing-date'];
    
    $equipment_query = "INSERT INTO equipment (Name, model, manufacturer, serial_no, status, Quantity, department_id)
                        VALUES ('$equipment_name', '$equipment_model', '$equipment_manufacturer', '$equipment_serial_no', '$equipment_status', '$equipment_quantity', '$new_num')";
    
    $engineers_query = "INSERT INTO engineers (Name)
                        VALUES ('$engineer_name')";

    $manufacturer_query = "INSERT INTO manufacturer (name, country, equipment_id)
                         VALUES ('$manufacturer_name', '$manufacturer_country', '$new_num')";

    $servicing_query = "INSERT INTO servicing (engineer_id, equipment_id, date)
                        VALUES ('$new_num', '$other_num', '$servicing_date')";


    $database = new Database();

    if ($database->saveData($equipment_query)) {
      
      $database->saveData($engineers_query);
      $database->saveData($manufacturer_query);
      $database->saveData($servicing_query);

      header('Location: ../dashboard.php');
      
    }else {
      
      exit();

    }

  }

?>