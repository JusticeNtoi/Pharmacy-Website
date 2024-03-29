<?php
    // Start session
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['id'])) {
       header("Location: index.php");
       exit();
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
	
	 <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />
    <title>Home</title>
  </head>

  <body>

    <nav>
      <div class="heading">
        <h4>Welcome <?php echo $_SESSION['name']; ?>! </h4>
          
      </div>

      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="update_pharmacist.php">Update Profile</a></li>
        <li><a href="Orders.php">Orders</a></li>
        <li><a href="medicine_reg.php">Add Medicine</a></li>
        <li><a href="view_patients.php">ALL Patients</a></li>
        <li><a class="active" href="medical_history.php">Patients Consultation</a></li>  
        <li> <a href="logout.php">Logout</a></li>
      </ul>
    </nav>
      
    <div class="header">
            <h1>PATIENT CONSULTAIONS</h1>
        </div>
      <?php
// Include database connection file
include_once("conn.php");





// Select all rows from the medicines table
$sql = "SELECT * FROM consultations";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Start an HTML table to display the data
    echo "<table id=\"customers\">";
    echo "<tr><th>ID</th><th>email</th><th>Health Issue</th><th>consultation_date</th><th>Status</th><th>Reply</th></tr>";
    // Loop through each row and output the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['id'] . "</td>";
		 echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['health_issue'] . "</td>";
        echo "<td>" . $row['consultation_date'] . "</td>";
		echo "<td>" . $row['status'] . "</td>";
		
		
		//echo "<td><a href='pharmacist_reply.php?ID =" . $row['ID'] . "'>Make response</a></td>";
        //echo "<td><a href='delete_response.php?ID =" . $row['ID'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
       
		echo "<td><a href='pharmacist_reply.php?ID=" . $row['id'] . "'>Reply</a></td>";
       

	   echo "</tr>";
		
		
		
	
    }
    echo "</table>";
} else {
    echo "No Patients consaltation found.";
}

// Close the database connection
mysqli_close($conn);

?>
    </body>
</html>
