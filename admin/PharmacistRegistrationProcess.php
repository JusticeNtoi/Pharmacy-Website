<?php

session_start();

include_once 'DatabaseConnection.php';
if(isset($_POST['save']))
{
	$name = $_POST['name'];
	$surname = $_POST['surname'];
    $email = $_POST['email'];
    $status = $_POST['status'];
	$password = $_POST['password'];
	
	$sql = "INSERT INTO pharmacist (name,surname,email,status,password)
	VALUES ('$name','$surname','$email','$status','$password')";
	if(mysqli_query($mysqli, $sql))
	{
		?>
        <a href="PharmacistRegistration.php">BACK</a>
        <br><br>
	<?php
    echo"Pharmacist Successfuly Registered";
	}
	else
	{
		?>
		<a href="PharmacistRegistration.php">BACK</a>
        <br><br>
		<?php
        echo"Error: The User alredy exist";
	}
}	
?>
