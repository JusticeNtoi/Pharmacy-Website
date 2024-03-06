<?php
    session_start();
?>

<html>
<body>

<?php
include_once("DatabaseConnection.php");
if(isset($_POST['save']))
{
    $email = trim($_SESSION['email']);

	$medicine_id = $_POST['medicine_id'];
	$name = $_POST['name'];
	$price = $_POST['price'];
	
	$sql = "INSERT INTO temp_order (email,medicine_name,price)
	VALUES ('$email','$name','$price')";
	if(mysqli_query($mysqli, $sql))
	{
		header("location: Catalog.php");
	}
}	
?>

</body>
</html>