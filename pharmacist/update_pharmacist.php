<?php
// Start session
session_start();

//connect to database
include_once("conn.php");

//check if the form is submitted
if(isset($_POST['submit'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $surname = mysqli_real_escape_string($conn, $_POST['surname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //update query
    $sql = "UPDATE pharmacist SET name='$name', surname='$surname', email='$email', password='$password' WHERE id=$id";

    //execute the query
    if(mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
}

// Get pharmacist ID from session
$id = $_SESSION['id'];

// Fetch pharmacist details from database
$sql = "SELECT * FROM pharmacist WHERE id=$id";
$result = mysqli_query($conn, $sql);

if($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Pharmacist not found";
}

//close the database connection
mysqli_close($conn);
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
        <li><a href="dashboard.php">Home</a></li>
        <li><a class="active" href="update_pharmacist.php">Update Profile</a></li>
        <li><a href="Orders.php">Orders</a></li>
        <li><a href="medicine_reg.php">Add Medicine</a></li>
        <li><a href="view_patients.php">ALL Patients</a></li>
        <li><a href="medical_history.php">Patients Consultation</a></li>  
        <li> <a href="logout.php">Logout</a></li>
      </ul>
    </nav>
      
    <div class="header">
            <h1>UPDATE PHARMACIST</h1>
        </div>
      
      <div class="first-box"> 
<!-- HTML form -->
<form action="" method="post">
    <label for="id">ID:</label>
    <input type="text" name="id" value="<?php echo $row['id']; ?>" readonly><br>

    <label for="name">Name:</label>
    <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>

    <label for="surname">Surname:</label>
    <input type="text" name="surname" value="<?php echo $row['surname']; ?>"><br>

    <label for="email">Email:</label>
    <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>

    <label for="password">Password:</label>
    <input type="text" name="password" value="<?php echo $row['password']; ?>"><br>

    <input type="submit" name="submit" value="Update">
	<a  href="dashboard.php"> BACK</a>
</form>
      </div>
    </body>
</html>