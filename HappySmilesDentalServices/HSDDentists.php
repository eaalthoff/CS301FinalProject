<!DOCTYPE html>
<html>
  <head>
  <link href="HSD.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <meta charset="UTF-8">
    <title>Happy Smiles Dentistry Services</title>
    <script type="text/javascript">
        function myFunction(x) {
            x.classList.toggle("change");

            var y = document.getElementById("mobile-menu");
            if (y.style.display === "none") {
                y.style.display = "block";
            } else {
                y.style.display = "none";
            }
    
            
         }
        </script>
    </head>
    
    <body>
    
      <header>
        <nav>
          <div id="navbar">
            <div id="logo">
              <div class="logo"><a href="HSDHome.html">Happy Smiles Dental Services</a></div>
    
            </div>
            <div id="links">
              <a href="HSDLocations.php">Locations</a>
              <a href="HSdDentists.php">Dentists</a>
              <a href="HSDSchedule.php">Schedule An Appointment</a>
              <a href="HSDAbout.html">About Us</a>
              <a href="HSDContact.html">Contact Us</a>

            </div>      
            <div class="mobile-btn" onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            </div>
          </nav>
           <!-- Mobile Menu -->
        <div id="mobile-menu" class="mobile-menu">
          <ul class="mobile-links">
            <li class="nav-list"><a href="HSDHome.html">Home</a></li>
            <li class="nav-list"><a href="HSDLocations.php">Locations</a></li>
            <li class="nav-list"><a href="HSDDentists.php">Dentists</a></li>
            <li class="nav-list"><a href="HSDSchedule.php">Schedule an Appointment</a></li>
            <li class="nav-list"><a href="HSDAbout.html">About Us</a></li>
            <li class="nav-list"><a href="HSDContact.html">Contact</a></li>
          </ul>
        </div>
      </header>
      <img alt="Dentist Hero" style="width:100%;" src="dentistsHero.jpg">
      <div class="heading1">
      <h1>Dentists</h1> </div>
      <div class="grid-col1">
      <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <p>Location: <input type="text" name="location" placeholder="Search by locations">
       Service: <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <input type="text" name="service" placeholder="Search by service"></p>
       <br>
       <div class="grid-col2-sub">

    <input class="subbutton" type="submit">
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
                }
                else {
                    //echo "connected to the db successfully";
                }
                if(isset($_GET["location"]) or isset($_GET["service"]))
                {	
                  $location = isset($_GET["location"])?$_GET["location"]:"";
                  $service = isset($_GET["service"])?$_GET["service"]:"";
                  
                  if($location == "" and $service == "") {
                          $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID
                          ";
                      }
                  else if($location != "" and $service==""){
                    $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID
                    where LOCATIONS.Name like '%$location%';";
                      }
                  else if($location == "" and $service!=""){
                    $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID where SERVICES.ServiceType like '%$service%';";
                      }
                  else {
                    $sql = "select DENTIST.DFName, DENTIST.DLName, LOCATIONS.Name, SERVICES.ServiceType from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID
                     where (LOCATIONS.Name like '%$location%') and SERVICES.ServiceType like '%$service%';";
                      }
            
                $result = $conn->query($sql);
            
                if($result->num_rows > 0){    
             
                        while($row = $result->fetch_assoc()){
                              echo "<h2>";
                              echo  $row['DFName']  ;
                              echo" ";
                              echo  $row['DLName'];
                              echo "</h2>";
                              echo "<span>" . $row['Name'] . "</span><br>";
                              echo  "<span>" . $row['ServiceType'] . "</span>";
                              

  
                      }
                    }  
                    else{
                      echo "<p>No results found.</p>";
                      //echo $sql;
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