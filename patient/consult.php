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

<div class="back">
<ul>
    <li><a  href="ConsultationForm.php"> BACK</a></li>
</ul>
    <?php
session_start();

// Include database connection file
include_once("DatabaseConnection.php");
// set the parameters from the form data
$email = trim($_SESSION['email']);
$issue = trim($_POST['issue']);
$consultation_date = date('Y-m-d H:i:s');
$status = 'pending';

// prepare the SQL statement
$stmt = $mysqli->prepare("INSERT INTO consultations (email, health_issue, consultation_date, status) VALUES (?, ?, ?, ?)");

// bind the parameters to the statement
$stmt->bind_param("ssss", $email, $issue, $consultation_date, $status);

// execute the statement
if ($stmt->execute() === TRUE) {
	
        echo "<div class=\"messages\">";
        echo "Consultation details saved successfully!";
        echo "</div>";
} else {
	
        echo "<div class=\"messages\">";
        echo "Error: " . $stmt->error;
        echo "</div>";
}

// close the statement and connection
$stmt->close();
$mysqli->close();

?>
</div>
</body>
</html>

