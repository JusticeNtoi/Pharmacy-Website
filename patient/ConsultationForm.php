<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Home</title>
  </head>

  <body>

    <nav>
      <div class="heading">
        <h4>Maluti Pharmacy</h4>
      </div>

      <ul class="nav-links">
        <li><a href="Catalog.php">Medicine</a></li>  
        <li><a href="Order.php">View Cart</a></li>
        <li><a href="ViewOrder.php">View Order</a></li>
        <li><a class="active" href="ConsultationForm.php">Consultation</a></li> 
        <li><a href="ViewMedicalHistory.php">Medical History</a></li>
        <li> <a href="Logout.php">Logout</a></li>   
      </ul>
    </nav>
      
    <div class="header">
        <h1>CONSULTATION</h1>
    </div>  
      
   <div class="first-box">       
			<h1>Patient</h1>
            <br>
			<form action="consult.php" method="post">
                
							Describe Your Issue:<br>
							<textarea name="issue"></textarea>
							<input type="submit" value="Submit"> 
			</form>
    </div>
    
    <div class="header">
        <h1>CONSULTATIONS LIST</h1>
    </div>

<?php
// Include database connection file
session_start();
include_once("DatabaseConnection.php");
$email = $_SESSION['email'];
// Select all rows from the medicines table
$sql = "SELECT * FROM consultations WHERE email='$email'";
$result = mysqli_query($mysqli, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Start an HTML table to display the data
    echo "<table id=\"customers\">";
    echo "<tr><th>Health Issue</th><th>consultation_date</th><th>Status</th><th>Response</th></tr>";
    // Loop through each row and output the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['health_issue'] . "</td>";
        echo "<td>" . $row['consultation_date'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
		    echo "<td>" . $row['reply'] . "</td>";

	   echo "</tr>";
	
    }
    echo "</table>";
    echo"<br><br><br><br>";
} else {
    echo "No Consultations History found.";
}

// Close the database connection
mysqli_close($mysqli);

?>

	</body>
</html>

