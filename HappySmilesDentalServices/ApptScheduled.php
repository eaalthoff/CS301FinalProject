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
      <img src="confirmHero.jpg" alt="schedule hero" style="width:100%">
<div class="heading1"> <h1>Appointment Confirmation</h1> </div> <div class="grid-col1"> <div class="apptGrid">
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

$email = $_POST['email'];


$fnameErr = $lnameErr = $phoneErr = $addressErr = $apptTimeErr = $apptDateErr = $dentistErr = "";
$fname = $lname = $phone = $address = $apptTime = $apptDate = $dentist = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["fname"])) {
    $fnameErr = "First name is required";
  } else {
    $name = ($_POST["fname"]);
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["lname"])) {
      $lnameErr = "Last name is required";
    } else {
      $lname = ($_POST["lname"]);
    }

  if (empty($_POST["phone"])) {
    $phoneErr = "Phone is required";
  } else {
    $phone = ($_POST["phone"]);
  }

  if (empty($_POST["address"])) {
    $addressErr = "Address is required";
  } else {
    $address = ($_POST["address"]);
  }

  if (empty($_POST["date"])) {
    $dateErr = "Date is required";
  } else {
    $date = ($_POST["date"]);
  }

  if (empty($_POST["time"])) {
    $timeErr = "Time is required";
  } else {
    $time = ($_POST["time"]);
  }
}
if ($fname || $lname || $phone || $address || $apptTime || $apptDate || $dentist == ""){
    echo "<p>$fnameErr</p>";
    echo "<p>$lnameErr</p>";
    echo "<p>$phoneErr</p>";
    echo "<p>$addressErr</p>";
    echo "<p>$apptTimeErr</p>";
    echo "<p>$apptDateErr</p>";
    echo "<p>$dentistErr</p>";
    echo "<p>Please fill out the form with the required fields</p>";

}
else{
    $sql = "INSERT INTO Customer (FName, LName, Phone, Email, Address) VALUES ('".$_POST['fname']."', '".$_POST['lname']."', '".$_POST['phone']."', '".$_POST['email']."', '".$_POST['address']."')";
    if ($conn->query($sql) === TRUE) {
        $GLOBALS['custid'] = $conn->insert_id;
        echo "<p>Customer information added succesfully.</p>";
    
    }
    
    
    $sqlappt="INSERT INTO Appointment(Date, Time, CustomerID, DentistID) VALUES ('".$_POST['date']."', '".$_POST['time']."', '".$custid."', '".$_POST['dentist']."')";
    
    if ($conn->query($sqlappt) === TRUE) {
        echo "<p>Appointment has been made.</p>";
        $GLOBALS['apptID'] = $conn->insert_id;
    }
    else{
        echo $sqlappt;
    }
    $sqldinfo="SELECT * FROM DENTIST where DentistID LIKE '%$dentist%'";
    $result = $conn->query($sqldinfo);
                
                    if($result->num_rows > 0){    
                 
                            while($row = $result->fetch_assoc()){
                                echo "<h2>Your Appointment Has Been Made</h2>";
                                echo "<p>Hello, $fname! Your appointment with " . $row['DFName'] . " " ;
                                echo $row['DLName'] . " has been made. Thank you for scheduling. We will call you at $phone to confirm the appointment time on $apptDate at $apptTime. Below is your appointment information for reference.</p>";
                                echo "<h3>Appointment for $fname</h3>";
                                echo "<p>Your phone number: $phone  </p>";
                                echo "<p>Your address: $address  </p>";
                                echo "<p>Dentist: ". $row['DFName'] . " ";
                                echo  $row['DLName'] . "</p>";
                                echo "<p>Your appointment is at $apptTime on $apptDate </p>"; 
                          }
                        }
}
    
}


/*else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
}*/
mysqli_close($conn);
?> 
    </div> 
    </div> 
      <div class="footer">
          <h1>Happy Smiles Dentistry Services</h1>
            <p>Random Address &nbsp;&nbsp; Random Place&nbsp;&nbsp;Copyright 2020</p></div>
          </div>
        </div>
     </body>
    
    </html>