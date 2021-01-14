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

    <img src="scheduleHero.jpg" alt="schedule hero" style="width:100%"> 

    <div class="grid-container"> 
      <div class="heading1"> 
        <h1>Schedule an Appointment</h1>
      </div> 
      
      <div class="heading"> 
        <h2>Customer Information</h2> 
      </div> 

      <!-- Customer information is taken (appointment time, date, dentist, name, etc.) 
      and added to the database in the file ApptScheduled.php -->
      <form action="ApptScheduled.php" method="post"> 
        <div class="grid-col2"> 
          <p>Required field<span class="required">*</span></p> 
        </div> 

          <div class="grid-col4"> 
            <label class="fname" for="fname">First Name<span class="required">*</span></label> 
            <input class="fnamein" type="text" name="fname" placeholder="First Name"/> 
            <label class="lname" for="lname">Last Name<span class="required">*</span></label> 
            <input class="lnamein" type="text" name="lname" placeholder="Last Name"/><br> 
          </div> 

            <div class="grid-col2"> 
              <label for="phone">Phone#<span class="required">*</span></label> 
              <input type="text" name="phone" placeholder="555-555-5555"/><br> 
              <label for="email">Email</label> <input type="text" name="email" placeholder="example@gmail.com"/><br> 
              <label for="address">Address<span class="required">*</span></label> 
              <input type="text" name="address" placeholder="1234 Martin Luther King Jr. Blvd"/><br> 
            </div> 

            <div class="heading"> 
              <h2>Appointment Information</h2> 
            </div> 

            <div class="grid-col2-service"> 
              <p>Dentist Request<span class="required">*</span></p> 
              <select name="dentist"><span class="required">*</span> 
                <option value=""></option> 

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
                $sql = 'select DENTIST.DFName, DENTIST.DLName, DENTIST.DentistID, LOCATIONS.Name, SERVICES.ServiceType from DENTIST inner join LOCATIONS on DENTIST.LocationID=LOCATIONS.LocationID inner join SERVICES on DENTIST.ServiceID=SERVICES.ServiceID';
                $result = $conn->query($sql);

                if($result->num_rows > 0) {
                  while($row = $result->fetch_assoc()) {
                      $DFName = $row['DFName'];
                      $DLName = $row['DLName'];
                      $DLocation = $row['Name'];
                      $DService = $row['ServiceType'];
                      $val = $row['DentistID'];
                      echo "<option value='$val'>$DFName $DLName, $DLocation, $DService</option>";
                    }
                  }
                ?> 
              </select>

              <p>Appointment Time<span class="required">*</span></p> 
              <select name="time" id="time"> <!--Dropdown values for appointment time--> 
                <option value=""></option> 
                <option value="8AM">8:00 AM</option> 
                <option value="9AM">9:00 AM</option> 
                <option value="10AM">10:00 AM</option> 
                <option value="11AM">11:00 AM</option> 
                <option value="12PM">12:00 PM</option> 
                <option value="1PM">1:00 PM</option> 
                <option value="2PM">2:00 PM</option> 
                <option value="3PM">3:00 PM</option> 
                <option value="4PM">4:00 PM</option> 
                <option value="5PM">5:00 PM</option> 
                <option value="6PM">6:00 PM</option> 
              </select> 
              <!--Displays a mini-calendar for appointment date--> 
              <label for="date">Date<span class="required">*</span></label> 

              <div class="date-box"> 
                <input type="date" id="date" name="date"></div><br>
              </div> 

                <div class="grid-col2-sub"> 
                  <input class="subbutton" type="submit" id="submitButton" value="Submit"/>
                </div> 
        </form> 
    </div> 
      
    <div class="footer"> 
      <h1>Happy Smiles Dentistry Services</h1> 
      <p>Random Address &nbsp; &nbsp; Random Place&nbsp; &nbsp; Copyright 2020</p>
    </div> 

  </body> 
</html>