		<?php
		// Start session
		session_start();

		//connect to database
		include_once("conn.php");
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
				<li><a  href="update_pharmacist.php">Update Profile</a></li>
				<li><a href="Orders.php">Orders</a></li>
				<li><a href="medicine_reg.php">Add Medicine</a></li>
				<li><a class="active" href="view_patients.php">ALL Patients</a></li>
				<li><a href="medical_history.php">Patients Consultation</a></li>  
				<li> <a href="logout.php">Logout</a></li>
			  </ul>
			</nav>
			  
			<div class="header">
					<h1>UPDATE PATIENTS</h1>
				</div>
              
    <div class="back">
        <ul>
            <li><a  href="view_patients.php"> BACK</a></li>
        </ul>
    </div>
			  
			  <div class="first-box"> 
		<!-- HTML form -->
		<form action="update_patient.php?email=<?php echo $_GET['email']; ?>" method="post">
	<?php
		//check if the form is submitted
		if(isset($_POST['submit'])) {
			$patient_id = mysqli_real_escape_string($conn, $_POST['patient_id']);
			$name = mysqli_real_escape_string($conn, $_POST['name']);
			$surname = mysqli_real_escape_string($conn, $_POST['surname']);
			$email = mysqli_real_escape_string($conn, $_POST['email']);
			$place = mysqli_real_escape_string($conn, $_POST['place']);
			$distance = mysqli_real_escape_string($conn, $_POST['distance']);
			$gender = mysqli_real_escape_string($conn, $_POST['gender']);
			$password = mysqli_real_escape_string($conn, $_POST['password']);
			
			//$location_id = mysqli_real_escape_string($conn, $_POST['location_id']);

			//update query
			$sql = "UPDATE patients SET patient_id='$patient_id', name='$name', surname='$surname', gender='$gender', password='$password' WHERE email='$email'";
			
			$sql1 = "UPDATE locations SET place='$place', distance='$distance' WHERE email='$email'";
			
			//execute the query
			if(mysqli_query($conn, $sql) && mysqli_query($conn, $sql1)) {
				echo "Record updated successfully";
			} else {
				echo "Error updating record: " . mysqli_error($conn);
			}
		}

		// Get patient email from URL parameter
		$email = $_GET['email'];

		// Fetch patient details from database
		//$sql = "SELECT * FROM patients WHERE email='$email'";
	    //$sql = "SELECT place,distance FROM locations WHERE location_id='$location_id'";
		  
			$sql = "SELECT patients.patient_id,patients.name,patients.surname,patients.email, patients.gender, patients.password, locations.place, locations.distance FROM patients 
        INNER JOIN locations ON patients.email=locations.email WHERE patients.email='$email'";

		  
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    // ...
  } else {
    echo "Patient not found";
  }
		


		//close the database connection
		mysqli_close($conn);
	?>

	<br>

	<label for="id">ID:</label><br>
	<input type="text" id="id" name="patient_id" value="<?php echo $row['patient_id']; ?>" required><br>

	<label for="name">Name:</label><br>
	<input type="text" id="name" name="name" value="<?php echo $row['name']; ?>" required><br>

	<label for="surname">Surname:</label><br>
	<input type="text" id="surname" name="surname" value="<?php echo $row['surname']; ?>" required><br>

	<label for="email">Email:</label><br>
	<input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required readonly><br>

	<label for="place">Location:</label><br>
	<input type="text" id="place" name="place" value="<?php echo $row['place']; ?>" required><br>

	<label for="distance">Distance:</label><br>
	<input type="text" id="distance" name="distance" value="<?php echo $row['distance']; ?>" required><br>

	<label for="gender">Gender:</label><br>
	<input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>" required><br>

	<label for="password">Password:</label><br>
	<input type="text" name="password" value="<?php echo $row['password']; ?>"><br>

	<input type="submit" name="submit" value="Update">
	
			
		</form>
			  </div>
			</body>
		</html>