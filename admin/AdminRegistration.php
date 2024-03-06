<?php
    // Start session
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

<div class="back">
<ul>
    <li><a href="AccountsAdministrator.php">BACK</a></li>
</ul>
</div>

<div class="first-box">
        <form id="form" name="form" method="post" action="AdminRegistrationProcess.php">
        
        ADMIN ID:
        <br>
        <input type="text" name="ID" placeholder="Enter admin ID" required>
        <br>
        FIRST NAME:<br>
        <input type="text" name="first_name" placeholder="Enter first name" required>
        <br>
        LAST NAME:<br>
        <input type="text" name="last_name" placeholder="Enter last name" required>
        <br>
        PASSWORD:<br>
        <input type="password" id="password" name="password" placeholder="Enter password" required>
        <br>
        <input type="submit" name="save" id="submit" value="Submit">
        <br>	
</form>
</div>
</body>      
</html>