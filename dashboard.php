<?php

  include_once("php/database.php");
  
  $equipment_list =  " SELECT * FROM equipment ORDER BY eqp_id DESC LIMIT 1 ";

  $department_list =  " SELECT Name FROM department LIMIT 1 ";

  $engineers_list =  " SELECT Name FROM engineers ORDER BY eng_id DESC LIMIT 1 ";

  $manufacturer_list =  " SELECT name, country FROM manufacturer ORDER BY id DESC LIMIT 1 ";

  $servicing_list =  " SELECT date FROM servicing ORDER BY engineer_id DESC LIMIT 1 ";

  // Creating databse object to execute the queries
  $database = new Database();

  $equipment_result = $database->readData($equipment_list);
  
  $department_result = $database->readData($department_list);
  
  $engineers_result = $database->readData($engineers_list);
  
  $manufacturer_result = $database->readData($manufacturer_list);
  
  $servicing_result = $database->readData($servicing_list);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> test </title>

  <link rel="stylesheet" href="css/main.css">

</head>
<body>
  
  <header>
    <nav class="topnav">
      <p>
        DASHBOARD
      </p>
    </nav>
  </header>

  <main>
    
    <!-- REGISTRATION FORM -->
    <section id="registration">

      <div class="container">

        <h2>
          REGISTRATION FORM
        </h2>

        <form action="php/save-data.php" method="post">

        <?php

          if ($department_result) {

          foreach ($department_result as $ROW) { ?>

            <label for="departments"> Select A Departments </label>
            <select id="list">
              <option value="<?php echo $ROW['Name'] ?>"> <?php echo $ROW['Name'] ?> </option>
              <option value="OBS AND GYN"> OBS AND GYN </option>
              <option value="SURGERY"> SURGERY </option>
              <option value="ENT"> ENT </option>
              <option value="ORTHOPEDICS"> ORTHOPEDICS </option>
            </select>

          <?php

          }

          }

          ?>

          <input type="text" name="department-name" placeholder="Department Name" value="" id="selected-department-name" hidden>
          
          <label for="equipment"> Equipment Table </label>
          <input type="text" name="equipment-name" placeholder="Equipment Name" >
          <input type="text" name="equipment-model" placeholder="Equipment Model" >
          <input type="text" name="equipment-manufacturer" placeholder="Equipment Manufacturer Name" >
          <input type="text" name="equipment-serial-no" placeholder="Equipment Serial Number" >
          <input type="text" name="equipment-status" placeholder="Equipment Status" >
          <input type="text" name="equipment-quantity" placeholder="Equipment Quantity" >

          <label for="equipment"> Engineers Table </label>
          <input type="text" name="engineer-name" placeholder="Engineer's Name" >

          <label for="manufacturer"> Manufacturer's Table </label>
          <input type="text" name="manufacturer-name" placeholder="Manufacturer's Name" >
          <input type="text" name="manufacturer-country" placeholder="Manufacturer's Country" >

          <label for="servicing"> ServicingTable </label>
          <input type="datetime-local" name="servicing-date" placeholder="Servicing Date and Time">

          <input type="submit" name="register" value=" REGISTER ">

        </form>

      </div>

    </section>

    <!-- VIEW SECTION -->
    <section id="view">

      <div class="container">

        <h2>
          VIEW FORM
        </h2>

        <form action="" method="post">

          <?php

            if ($department_result) {
            
            foreach ($department_result as $ROW) { ?>
        
              <label for="department-name"> Department's Name </label>
              <input type="text" name="department-name" value=' <?php echo $ROW["Name"]; ?> '>

          <?php

            }
        
          }
                  
          if ($equipment_result) {
            
            foreach ($equipment_result as $ROW) { ?>

              <label for="equipment-name"> Equipment Name </label>
              <input type="text" name="equipment-name" value=' <?php echo $ROW["Name"]; ?> '>
              
              <label for="equipment-model"> Equipment Model </label>
              <input type="text" name="equipment-model" value=' <?php echo $ROW["model"]; ?> '>
              
              <label for="equipment-manufacturer"> Equipment Manufacturer Name </label>
              <input type="text" name="equipment-manufacturer" value=' <?php echo $ROW["manufacturer"]; ?> '>
              
              <label for="equipment-serial-no"> Equipment Serial Number </label>
              <input type="text" name="equipment-serial-no" value=' <?php echo $ROW["serial_no"]; ?> '>
              
              <label for="equipment-status"> Equipment Status </label>
              <input type="text" name="equipment-status" value=' <?php echo $ROW["status"]; ?> '>
              
              <label for="equipment-quantity"> Equipment Quantity </label>
              <input type="text" name="equipment-quantity" value=' <?php echo $ROW["Quantity"]; ?> '>

              <?php
            }

          }

          if ($engineers_result) {
            
            foreach ($engineers_result as $ROW) { ?>

              <label for="engineer-name"> Engineer's Name </label>
              <input type="text" name="engineer-name" value=' <?php echo $ROW["Name"]; ?> '>
              
          <?php 

            }

          }

            
          if ($manufacturer_result) {
        
            foreach ($manufacturer_result as $ROW) { ?>
        
              <label for="manufacturer-name"> Manufacturer's Name </label>
              <input type="text" name="manufacturer-name" value=' <?php echo $ROW["name"]; ?> '>

              <label for="manufacturer-country"> Manufacturer's Country </label>
              <input type="text" name="manufacturer-country" value=' <?php echo $ROW["country"]; ?> '>

        <?php

            }
        
          }
      

          if ($servicing_result) {
            
            foreach ($servicing_result as $ROW) { ?>

            <label for="servicing-date"> Servicing Date and Time </label>
            <input type="text" name="servicing-date" value=' <?php echo $ROW["date"]; ?> '>
                
            <?php
          
            }
          
          }
            
        ?>

        </form>

      </div>

    </section>

    <!-- UPDATE SECTION -->
    <section id="update">

      <div class="container">

        <h2>
          UPDATE FORM
        </h2>

        <form action="php/update-data.php" method="post">

          <?php

            if ($department_result) {
            
            foreach ($department_result as $ROW) { ?>
        
              <label for="departments"> Select A Departments </label>
              <select id="list">
                <option  value="<?php echo $ROW['Name']?>"> <?php echo $ROW['Name']?> </option>
                <option value="OBS AND GYN"> OBS AND GYN </option>
                <option value="SURGERY"> SURGERY </option>
                <option value="ENT"> ENT </option>
                <option value="ORTHOPEDICS"> ORTHOPEDICS </option>
              </select>

              <input type="text" name="selected-department-name" placeholder="Department Name" value="<?php echo $ROW['Name']?>" id="selected-department-name" hidden>

          <?php

            }
        
          }
                  
          if ($equipment_result) {
            
            foreach ($equipment_result as $ROW) { ?>

              <label for="equipment-name"> Equipment Name </label>
              <input type="text" name="update-equipment-name" value=' <?php echo $ROW["Name"]; ?> '>
              
              <label for="equipment-model"> Equipment Model </label>
              <input type="text" name="update-equipment-model" value=' <?php echo $ROW["model"]; ?> '>
              
              <label for="equipment-manufacturer"> Equipment Manufacturer Name </label>
              <input type="text" name="update-equipment-manufacturer" value=' <?php echo $ROW["manufacturer"]; ?> '>
              
              <label for="equipment-serial-no"> Equipment Serial Number </label>
              <input type="text" name="update-equipment-serial-no" value=' <?php echo $ROW["serial_no"]; ?> '>
              
              <label for="equipment-status"> Equipment Status </label>
              <input type="text" name="update-equipment-status" value=' <?php echo $ROW["status"]; ?> '>
              
              <label for="equipment-quantity"> Equipment Quantity </label>
              <input type="text" name="update-equipment-quantity" value=' <?php echo $ROW["Quantity"]; ?> '>

              <?php
            }

          }

          if ($engineers_result) {
            
            foreach ($engineers_result as $ROW) { ?>

              <label for="engineer-name"> Engineer's Name </label>
              <input type="text" name="update-engineer-name" value=' <?php echo $ROW["Name"]; ?> '>
              
          <?php 

            }

          }

            
          if ($manufacturer_result) {
        
            foreach ($manufacturer_result as $ROW) { ?>
        
              <label for="manufacturer-name"> Manufacturer's Name </label>
              <input type="text" name="update-manufacturer-name" value=' <?php echo $ROW["name"]; ?> '>

              <label for="manufacturer-country"> Manufacturer's Country </label>
              <input type="text" name="update-manufacturer-country" value=' <?php echo $ROW["country"]; ?> '>

        <?php

            }
        
          }
      

          if ($servicing_result) {
            
            foreach ($servicing_result as $ROW) { ?>

            <label for="servicing-date"> Servicing Date and Time </label>
            <input type="text" name="update-servicing-date" value=' <?php echo $ROW["date"]; ?> '>
                
            <?php
          
            }
          
          }
            
        ?>

        <input type="submit" name="update-btn" value="UPDATE">

        </form>

      </div>

    </section>

  </main>

  <footer>

  </footer>

</body>

</html>