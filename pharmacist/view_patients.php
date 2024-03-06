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
        <li><a class="active" href="view_patients.php">ALL Patients</a></li>
        <li><a href="medical_history.php">Patients Consultation</a></li>  
        <li> <a href="logout.php">Logout</a></li>
      </ul>
    </nav>
      
    <div class="header">
            <h1>REGISTER PATIENTS</h1>
        </div>
      
          
      <div class="first-box">
	<form action="view_patients.php" method="POST">
        
        
        	 <?php
	 //including the database connection file
		include_once("conn.php");

		$valid = true; // Initialize validation flag as true

		// Validate id field
		if(empty($_POST['patient_id'])) {
			//echo "Please enter your ID.<br>";
			$valid = true;
		} else {
			$patient_id = $_POST['patient_id'];
		}

		// Validate name field
		if(empty($_POST['name'])) {
			//echo "Please enter your name.<br>";
			$valid = true;
		} else {
			$name = $_POST['name'];
		}

		// Validate surname field
		if(empty($_POST['surname'])) {
			//echo "Please enter your surname.<br>";
			$valid = true;
		} else {
			$surname = $_POST['surname'];
		}

		// Validate email field
		if(empty($_POST['email'])) {
			//echo "Please enter your email.<br>";
			$valid = true;
		} else {
			$email = $_POST['email'];
		}
        
      		// Validate location field
		if(empty($_POST['place'])) {
			//echo "Please enter your place.<br>";
			$valid = true;
		} else {
			$place = $_POST['place'];
		}

        // Validate distance field
        if(empty($_POST['distance'])) {
           // echo "Please enter your distance.<br>";
            $valid = true;
        } else {
            $distance = $_POST['distance'];
        }

		
		      // Validate gender field
        if(empty($_POST['gender'])) {
            //echo "Please enter your gender.<br>";
            $valid = true;
        } else {
            $gender = $_POST['gender'];
        }
		
      
		  // Validate password field
        if(empty($_POST['password'])) {
           // echo "Please enter your password.<br>";
            $valid = true;
        } else {
        $password = $_POST['password'];
        }

$status = "Pending...";
        
if ($valid) {
    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO patients (patient_id, name, surname, email, gender, password) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt1 = $conn->prepare("INSERT INTO locations (email, place, distance) VALUES (?, ?, ?)");

    if ($stmt !== false && $stmt1 !== false)  {
        // bind parameters
        $stmt->bind_param('isssss', $patient_id, $name, $surname, $email, $gender, $password);
        $stmt1->bind_param('sss', $email, $place, $distance);
        
        // execute query
        try {
            $conn->begin_transaction();
            if ($stmt->execute() && $stmt1->execute()) {
                $conn->commit();
                echo "New record created successfully" .$email;
            } else {
                throw new Exception("Error When Registering, Please Try Again");
            }
        } catch (Exception $e) {
            $conn->rollback();
        }
    }
}

?>  
        <br>
		<label for="id">ID:</label><br>
		<input type="text" id="id" name="patient_id" required><br>

		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name" required><br>

		<label for="surname">Surname:</label><br>
		<input type="text" id="surname" name="surname" required><br>

		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br>
        <label for="place">Location:</label><br>
		<input type="text" id="place" name="place" required><br>
        <label for="distance">Distance:(km)</label><br>
		<input type="number" id="distance" name="distance" required><br>

		<label for="gender">Gender:</label><br>
		<select id="gender" name="gender" required>
			<option value="">Select gender</option>
			<option value="M">Male</option>
			<option value="F">Female</option>
			<option value="O">Other</option>
		</select><br>

		<label for="password">Password:</label><br>
		<input type="password" id="password" name="password" required><br><br>

		<input type="submit" value="submit">
	</form>
      </div>
      
          <div class="header">
            <h1>VIEW PATIENTS</h1>
        </div>
</body>
</html>
	  
<?php
// Include database connection file
include_once("conn.php");


// Select all rows from the medicines table
$sql = "SELECT * FROM patients";
$result = mysqli_query($conn, $sql);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {
    // Start an HTML table to display the data
    echo "<table id=\"customers\">";
    echo "<tr><th>ID</th><th>Name</th><th>Surname</th><th>Email</th><th>Gender</th><th>Update</th><th>Delete</th></tr>";
    // Loop through each row and output the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['patient_id'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['surname'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['gender'] . "</td>";
		
		echo "<td><a href='update_patient.php?email=" . $row['email'] . "'>Update</a></td>";
        //echo "<td><a href='delete_patients.php?email=" . $row['email'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
        
		
	
        echo "<td><a href='delete_patients.php?email=" . $row['email'] . "' onclick='return confirm(\"Are you sure you want to delete this record?\");'>Delete</a></td>";
        
		echo "</tr>";
		
		
	
    }
    echo "</table>";
} else {
    echo "No Patients found.";
}

// Close the database connection
mysqli_close($conn);

?>
      
</body>
</html>      

