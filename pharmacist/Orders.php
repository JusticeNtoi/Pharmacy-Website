<?php
    // Start session
    session_start();

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
        <li><a class="active" href="Orders.php">Orders</a></li>
        <li><a href="medicine_reg.php">Add Medicine</a></li>
        <li><a href="view_patients.php">ALL Patients</a></li>
        <li><a href="medical_history.php">Patients Consultation</a></li>  
        <li> <a href="logout.php">Logout</a></li>
      </ul>
    </nav>
      
    <div class="header">
            <h1>PENDING ORDERS</h1>
        </div>
      <?php
// Include database connection file
include_once("conn.php");





$sql = "SELECT * FROM orders WHERE status='pending'";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Start an HTML table to display the data
    echo "<table id=\"customers\">";
    "<tr><th>email</th><th>Medicine_Names</th><th>Date</th><th>Price</th><th>status</th></tr>";
    // Loop through each row and output the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['medicine_names'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td>" . $row['location_name'] . "</td>";
        echo "<td> M " . $row['price'] . "</td>";
        echo "<td><a href='ProcessOrder.php?order_id=" . $row['order_id'] . "'>Delivered</a></td>";
        echo "</tr>";
	
    }
    echo "</table>";
} else {
    echo "No Orders found.";
}

// Close the database connection
mysqli_close($conn);

?>
    </body>
</html>
