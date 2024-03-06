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
            <h1>PHARMACISTS ACCOUNTS</h1>
    </div>

    </body>
<div class="back">
    <ul>
        <li><a href="PharmacistRegistration.php">Add Pharmacist</a></li>
    </ul>
    <ul>
        <li><a href="AccountsPharmacistsBlocked.php">Blocked Accounts</a></li>
    </ul>
</div>

    <?php
    $dbc= mysqli_connect('localhost','root','','hmscli'); 
    $sql= "SELECT * FROM pharmacist WHERE status ='active'";

    $result= mysqli_query($dbc,$sql) or die("bad query");

    echo "<table id=\"customers\">";
    echo "<tr><th> Pharmacist ID</th><th> Name</th><th> Surname</th><th> Email</th><th> Password</th><th>Update</th><th>Block</th><th>Delete</th></tr>";
    while ($row =mysqli_fetch_assoc($result)) {
    echo "<tr><td> {$row['id']} </td><td> {$row['name']}</td><td> {$row['surname']}</td><td> {$row['email']}</td><td> {$row['password']}</td>
    <td><a href='PharmacistUpdate.php?id=$row[id]'>Update Record</a></td>
    <td><a href='PharmacistBlock.php?id=$row[id]'>Block Account</a></td>
    <td><a href='PharmacistDelete.php?id=$row[id]'>Delete Record</a></td></tr>";
    }
    echo"</table>";
    ?>

    <br>

<body>
</html>