<!DOCTYPE html> 
<html> 
  <head> 
    <link href="HSD.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" /> 
    <script src="HSDS.js"></script> 
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

      <img alt="Dentist Hero" style="width:100%;" src="dentistsHero.jpg">

      <div class="heading1">
        <h1>Dentists</h1> 
      </div>

      <div class="grid-col1">
        <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <!-- Gives an option to search by dentist name and dentist location -->
          <p>Location: <input type="text" name="location" placeholder="Search by locations">
          Service: <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
          <input type="text" name="service" placeholder="Search by service"></p>
          <br>

            <div class="grid-col2-sub">
              <input class="subbutton" type="submit">
            </div>

        </form>
      </div>

    <br>
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
        } else {
            //echo "connected to the db successfully";
        }
        //Determines where the user input was added (location or service or nothing) and searches the database for the input
            if(isset($_GET["location"]) or isset($_GET["service"]))
             {	
              $location = isset($_GET["location"])?$_GET["location"]:"";
                  $service = isset($_GET["service"])?$_GET["service"]:"";
             }
                  
            if($location == "" and $service == "") {
              $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType 
                          from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID";
                  }
            else if($location != "" and $service==""){
                    $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType 
                    from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID
                    where LOCATIONS.Name like '%$location%';";
                  }
            else if($location == "" and $service!=""){
              $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType 
                    from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID 
                    where SERVICES.ServiceType like '%$service%';";
              }
            else {
              $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType 
                    from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID
                    where (LOCATIONS.Name like '%$location%') and SERVICES.ServiceType like '%$service%';";
              }
            
          $result = $conn->query($sql);
            //Returns a table based on user input
            if($result->num_rows > 0){    
              while($row = $result->fetch_assoc()){
                echo "<h2>";
                echo  $row['DFName']  ;
                echo" ";
                echo  $row['DLName'];
                echo "</h2>";
                echo "<span class='desc'>" . $row['Name'] . "</span><br>";
                echo  "<span class='desc'>" . $row['ServiceType'] . "</span>";
              }
            } else{
                echo "<p>No results found.</p>";
            }
        ?>
      <div class="footer">
          <h1>Happy Smiles Dentistry Services</h1>
            <p>Random Address &nbsp;&nbsp; Random Place&nbsp;&nbsp;Copyright 2020</p>
        </div>

  </body>
</html>