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
            <h1>ADMINISTRATOR ACCOUNTS</h1>
        </div>  

    <div class="back">
        <ul>
            <li><a href="AdminRegistration.php">Add Administrator</a></li>
        </ul>
    </div>

    <?php
    $dbc= mysqli_connect('localhost','root','','hmscli'); 
    $sql= "SELECT * FROM admin";

    $result= mysqli_query($dbc,$sql) or die("bad query");

    echo "<table id=\"customers\">";
    echo "<tr><th> Admin ID</th><th> First Name</th> <th> Last Name</th><th> Password</th><th> Delete</th></tr>";
    while ($row =mysqli_fetch_assoc($result)) {
    echo "<tr><td> {$row['ID']} </td><td> {$row['first_name']}</td> <td> {$row['last_name']}</td><td> {$row['password']}</td>
    
    <td><a href='AdminDelete.php?ID=$row[ID]' >Delete Record</a></td></tr>";
    }
            
    echo"</table>";
    ?>

    <br>
</body>
</html>