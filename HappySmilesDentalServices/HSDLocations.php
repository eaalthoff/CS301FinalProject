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
      <img style="width:100%;" alt="Location Hero" src="locations4.jpg">
      <div class="grid-container">
        <div class="heading1">
      <h1>Locations</h1></div>
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
                              echo "<span>";
                              echo $row['Description'];
                              echo "</span><br>";
                              echo "<span>";
                              echo  $row['City']  ;
                              echo", ";
                              echo   $row['State']  ;
                              echo", ";
                              echo   $row['ZIPCode']  ;
                              echo".</span><br>";

  
                      }
                    }
                    
                    //echo "</table>";
                    
                
  
            
                ?>
                </div>
      <div class="footer">
          <h1>Happy Smiles Dentistry Services</h1>
            <p>Random Address &nbsp;&nbsp; Random Place&nbsp;&nbsp;Copyright 2020</p></div>
          </div>
        </div>
     </body>
    
    </html>