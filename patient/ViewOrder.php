<?php
    session_start();
?>


<!DOCTYPE html>
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
        <li><a class="active" href="ViewOrder.php">View Order</a></li>
        <li><a href="ConsultationForm.php">Consultation</a></li>   
        <li><a href="ViewMedicalHistory.php">Medical History</a></li>
        <li> <a href="Logout.php">Logout</a></li>   
      </ul>
    </nav>
      
    <div class="header">
        <h1>VIEW ORDER</h1>
    </div>  


<?php	

// Include database connection file
include_once("DatabaseConnection.php");

$email = $_SESSION['email'];

$sql = "SELECT * FROM orders where email = '$email'";
$result = mysqli_query($mysqli, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Start an HTML table to display the data
    echo "<table id=\"customers\">";
    echo "<tr><th>Medicine_Names</th><th>Date</th><th>Price</th><th>status</th></tr>";
    // Loop through each row and output the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['medicine_names'] . "</td>";
        echo "<td>" . $row['date'] . "</td>";
        echo "<td> M " . $row['price'] . "</td>";
        echo "<td>" . $row['status'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
        echo "<div class=\"messages\">";
        echo "No Order Found.";
        echo "</div>";
}

// Close the database connection
mysqli_close($mysqli);

?>

</body>
</html>