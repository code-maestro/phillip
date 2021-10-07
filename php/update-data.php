<?php

  include_once "database.php";

  $department_name = $_POST['selected-department-name'];
  $equipment_name = $_POST['update-equipment-name'];
  $equipment_model = $_POST['update-equipment-model'];
  $equipment_manufacturer = $_POST['update-equipment-manufacturer'];
  $equipment_serial_no = $_POST['update-equipment-serial-no'];
  $equipment_status = $_POST['update-equipment-status'];
  $equipment_quantity = $_POST['update-equipment-quantity'];
  $engineer_name = $_POST['update-engineer-name'];
  $manufacturer_name = $_POST['update-manufacturer-name'];
  $manufacturer_country = $_POST['update-manufacturer-country'];
  $servicing_date = $_POST['update-servicing-date'];

  // UPDATE QUERIES
  $department_update =  " UPDATE department SET Name = '$department_name' ";

  $equipment_update =  " UPDATE equipment SET Name = '$equipment_name', model = '$equipment_model', manufacturer = '$equipment_manufacturer', serial_no = '$equipment_serial_no', status = '$equipment_status', Quantity = '$equipment_quantity' ";

  $engineers_update =  " UPDATE engineers SET Name = '$engineer_name' ";

  $manufacturer_update =  " UPDATE manufacturer SET name = '$manufacturer_name', country = '$manufacturer_country' ";

  $servicing_update =  " UPDATE servicing SET date = '$servicing_date' ";
  
  $database = new Database();

  if (($database->saveData($department_update))) {
  
    $database->saveData($equipment_update);
    
    $database->saveData($engineers_update);
    
    $database->saveData($manufacturer_update);
    
    $database->saveData($servicing_update); 

    echo "DATA UPDATED SUCCESSFULLY";

    header('Location: ../dashboard.php');

  }else {
    
   echo "DATA UPDATE FAILED";

  }

?>