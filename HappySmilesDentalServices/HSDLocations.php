<!DOCTYPE html> 
<html> 
  <head> 
    <link href="HSD.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> 
    <meta charset="UTF-8"> <title>Happy Smiles Dentistry Services</title> 
  </head> 
  <body> 

    <div class="nav-container"> 
      <nav class="navbar"> 
        <div id="navbar-logo">
          <a href="HSDHome.html">Happy Smiles Dental Services</a>
        </div> 

        <div class="menu-toggle" id="mobile-menu"> 
          <span class="bar"></span> 
          <span class="bar"></span> 
          <span class="bar"></span> 
        </div> 

        <ul class="nav-menu"> 
          <li><a href="HSDLocations.php" class="nav-links">Locations</a></li> 
          <li><a href="HSDDentists.php" class="nav-links">Dentists</a></li> 
          <li><a href="HSDSchedule.php" class="nav-links">Schedule an Appointment</a></li> 
          <li><a href="HSDAbout.html" class="nav-links">About Us</a></li> 
          <li><a href="HSDContact.html" class="nav-links nav-links-btn">Contact Us</a></li> 
        </ul> 
      </nav> 
    </div> 
    <script src="HSDS.js"></script> 

      <img style="width:100%;" alt="Location Hero" src="locations4.jpg">

      <div class="grid-container">
        <div class="heading1">
          <h1>Locations</h1>
        </div>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "Happy_Smiles_DB";
            
                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
                }
                else {
                  //echo "connected to the db successfully";
                }
            
                $sql = 'select * from LOCATIONS';
                $result = $conn->query($sql);
            
                if($result->num_rows > 0){    
                  while($row = $result->fetch_assoc()){
                    echo "<h2>" . $row['Name'] . "</h2>";
                    echo "<span class='desc'>";
                    echo $row['Description'];
                    echo "</span><br>";
                    echo "<span class='desc'>";
                    echo  $row['City']  ;
                    echo", ";
                    echo   $row['State']  ;
                    echo", ";
                    echo   $row['ZIPCode']  ;
                    echo".</span><br>";
                  }
                 }
            ?>
        </div>
      <div class="footer">
          <h1>Happy Smiles Dentistry Services</h1>
            <p>Random Address &nbsp;&nbsp; Random Place&nbsp;&nbsp;Copyright 2020</p></div>
          </div>
        </div>
     </body>
    
    </html>