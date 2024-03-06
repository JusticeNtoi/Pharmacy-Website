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
        <li><a href="AccountsAdministrator.php">Administrator</a></li>
        <li><a class="active" href="AccountsPharmacists.php">Pharmacists</a></li>  
        <li><a href="AdminLogout.php">Logout</a></li>
      </ul>
    </nav>
      
    <div class="header">
            <h1>PHARMACIST REGISTRATION</h1>
    </div>

    </body>
<div class="back">
<ul>
    <li><a href="AccountsPharmacists.php">BACK</a></li>
</ul>
</div>

<div class="first-box">    
<form id="form" name="form" method="post" action="PharmacistRegistrationProcess.php">
        NAME:<br>
        <input type="text" name="name" placeholder="Enter name" required>
        <br>
        SURNAME:<br>
        <input type="text" name="surname" placeholder="Enter surname" required>
        <br>
        EMAIL:<br>
        <input type="text" name="email" placeholder="Enter email" required>
        <br>
        <input type="hidden" name="status" value="active">
        PASSWORD:<br>
        <input type="password" name="password" placeholder="Enter password" required> </label>
        <br>
        <input type="submit" name="save" id="submit" value="Submit">
        <br>
</form>
</div>

<body>
</html>