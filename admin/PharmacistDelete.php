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
        <li><a href="AccountsAdministrator.php">Administrator</a></li>
        <li><a class="active" href="AccountsPharmacists.php">Pharmacists</a></li>  
        <li><a href="AdminLogout.php">Logout</a></li>
      </ul>
    </nav>
      
<div class="header">
    <h1>ACCOUNT DELETION</h1>
</div>  

<div class="back">
    <ul>
        <li><a href="AccountsPharmacists.php">BACK</a></li>
    </ul>
</div>
      
<?php

include_once 'DatabaseConnection.php';

$id = $_GET ['id'];

$sql = "DELETE FROM pharmacist WHERE id = $id";

$result = mysqli_query($mysqli, $sql);

echo"Record Successfully Deleted";
?>
</body>
</html>