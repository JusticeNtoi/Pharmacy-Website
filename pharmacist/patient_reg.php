<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
</head>
<body>
	<h2>Registration Form</h2>
    <div class="first-box">
	<form action="patient_reg.php" method="POST">
		<label for="id">ID:</label><br>
		<input type="text" id="id" name="patient_id" required><br>

		<label for="name">Name:</label><br>
		<input type="text" id="name" name="name" required><br>

		<label for="surname">Surname:</label><br>
		<input type="text" id="surname" name="surname" required><br>

		<label for="email">Email:</label><br>
		<input type="email" id="email" name="email" required><br>

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
</body>
</html>
	  
	  
	  
	 <?php
	 //including the database connection file
		include_once("conn.php");

		$valid = true; // Initialize validation flag as true

		// Validate id field
		if(empty($_POST['patient_id'])) {
			echo "Please enter your ID.<br>";
			$valid = false;
		} elseif(!ctype_digit($_POST['patient_id'])) {
			echo "ID should contain only digits.<br>";
			$valid = false;
		} elseif(strlen($_POST['patient_id']) != 6) {
			echo "ID should be at least 6 digits long.<br>";
			$valid = false;
		} else {
			$patient_id = $_POST['patient_id'];
		}

		// Validate name field
		if(empty($_POST['name'])) {
			echo "Please enter your name.<br>";
			$valid = false;
		} elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST['name'])) {
			echo "Name should contain only letters and white spaces.<br>";
			$valid = false;
		} else {
			$name = $_POST['name'];
		}

		// Validate surname field
		if(empty($_POST['surname'])) {
			echo "Please enter your surname.<br>";
			$valid = false;
		} elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST['surname'])) {
			echo "Surname should contain only letters and white spaces.<br>";
			$valid = false;
		} else {
			$surname = $_POST['surname'];
		}

		// Validate email field
		if(empty($_POST['email'])) {
			echo "Please enter your email.<br>";
			$valid = false;
		} elseif(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			echo "Invalid email format.<br>";
			$valid = false;
		} else {
			$email = $_POST['email'];
		}
		
		      // Validate gender field
        if(empty($_POST['gender'])) {
            //echo "Please enter your gender.<br>";
            $valid = false;
        } elseif(!preg_match("/^[a-zA-Z ]*$/", $_POST['gender'])) {
            echo "gender should contain only letters and white spaces.<br>";
            $valid = false;
        } else {
            $gender = $_POST['gender'];
        }
		
		
		
		
	//elseif (empty($password)) {
     //   $error_msg = "Please enter a password.";
   // } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/', $password)) {
    //    $error_msg = "Invalid password. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.";
    //} else {
		  // Validate id field
      
		  // Validate password field
        if(empty($_POST['password'])) {
           // echo "Please enter your password.<br>";
            $valid = false;
        } elseif(strlen($_POST['password']) != 8) {
            echo "Password should be at least 8 characters long.<br>";
            $valid = false;
        } elseif(!preg_match('/^(?=.*\d)(?=.*[A-Z])(?=.*[a-z])(?=.*[^\w\d\s:])([^\s]){8,}$/m', $_POST['password'])) {
			
			echo "Password should contain at least one uppercase letter, one lowercase letter, one digit, and one special character.<br>";
$valid = false;
} else {
$password = $_POST['password'];
}

$status = "Pending...";

 if ($valid) {
    // Insert data into database
    $stmt = $conn->prepare("INSERT INTO patients (patient_id, name, surname, email, gender, password) VALUES (?, ?, ?, ?, ?, ?)");
	


    if ($stmt !== false) {
        // bind parameters
        $stmt->bind_param('isssss', $patient_id, $name, $surname, $email, $gender, $password);

        // set parameter values
       // $id = 1; // example value
        //$name = "John"; // example value
       // $surname = "Doe"; // example value
       // $email = "john.doe@example.com"; // example value
       // $password = "password123"; // example value

        // execute query
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: " . $conn->error;
    }
}

  ?>


