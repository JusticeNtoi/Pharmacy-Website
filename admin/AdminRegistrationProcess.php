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
        <h4>Maluti Pharmacy, Welcome, <?php echo $_SESSION['first_name']; ?>! </h4>
          
      </div>

      <ul class="nav-links">
        <li><a href="AdminDashboard.php">Home</a></li>
        <li><a class="active" href="AccountsAdministrator.php">Administrator</a></li>
        <li><a href="AccountsPharmacists.php">Pharmacists</a></li>  
        <li><a href="AdminLogout.php">Logout</a></li>
      </ul>
    </nav>
      
<div class="header">
    <h1>ADMIN REGISTRATION</h1>
</div>  


<?php
include_once 'DatabaseConnection.php';
if(isset($_POST['save']))
{
    $ID = $_POST['ID'];
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$password = $_POST['password'];
	
	$sql = "INSERT INTO admin (ID,first_name,last_name,password)
	VALUES ('$ID','$first_name','$last_name','$password')";
	if(mysqli_query($mysqli, $sql))
	{
		?>
		<a href="AdminRegistration.php">BACK</a>
        <br><br>
	<?php
    echo('Administrator Successfuly Registered');
	}
	else
	{
		?>
      
        <div class="back">
            <ul>
                <li><a href="AdminRegistration.php">BACK</a></li>
            </ul>
        </div>
        
        <br><br>
		<?php
        echo('Error: The User alredy exist');
	}
}	
?>

</body>
</html>