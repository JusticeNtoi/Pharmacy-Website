<?php
session_start();

include_once 'DatabaseConnection.php';

$id = $_GET['id'];
$sql="SELECT * FROM pharmacist WHERE id=$id";

$result = mysqli_query($mysqli,$sql);

while($res=mysqli_fetch_array($result))
{
	$name = $res['name'];
	$surname = $res['surname'];
	$email = $res['email'];
	$password = $res['password'];
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
        <h4>Maluti Pharmacy, Welcome, <?php echo $_SESSION['first_name']; ?>! </h4>
          
      </div>

      <ul class="nav-links">
        <li><a href="AdminDashboard.php">Home</a></li>
        <li><a  href="AccountsAdministrator.php">Administrator</a></li>
        <li><a class="active" href="AccountsPharmacists.php">Pharmacists</a></li>  
        <li><a href="AdminLogout.php">Logout</a></li>
      </ul>
    </nav>
      
    <div class="header">
            <h1>UPDATE PHARMACIST</h1>
    </div>

<div class="back">
<ul>
    <li><a href="AccountsPharmacists.php">BACK</a></li>
</ul>
</div>

<div class="first-box">

    <form name="form1" method="post" action="PharmacistUpdateProcess.php">
            Name <br>
            <input type="text" name="name" value="<?php echo $name;?>">
            SURNAME<br>
            <input type="text" name="surname" value="<?php echo $surname;?>">
            EMAIL<br>
            <input type="text" name="email" value="<?php echo $email;?>">
            PASSWORD<br>
            <input type="text" name="password" value="<?php echo $password;?>">
            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
            <input type="submit" name="update" value="Update">
    </form>
</div>
</body>
</html>