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
    <style>
      body {
        background-image: url("../pharmacy.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
  </head>

  <body>

    <nav>
      <div class="heading">
        <h4>Maluti Pharmacy, Welcome, <?php echo $_SESSION['first_name']; ?>! </h4>
          
      </div>

      <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="AccountsAdministrator.php">Administrator</a></li>
        <li><a href="AccountsPharmacists.php">Pharmacists</a></li>  
        <li><a href="AdminLogout.php">Logout</a></li>
      </ul>
    </nav>
      
    <div class="header">
            <h1>HOME</h1>
    </div>

    </body>

</html>