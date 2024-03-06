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
        <h4>Maluti Pharmacy </h4>
        </div>      
    </nav>
      
<div class="header">
    <h1>ACCOUNTS</h1>
</div>  

<?php
session_start();
include_once("DatabaseConnection.php");
if (isset($_POST['login'])) {
    $ID = $_POST['ID'];
    $password = $_POST['password'];
    
    $result = mysqli_query($mysqli, "select * from admin
        where ID='$ID' and Password='$password'");

    $user_matched = mysqli_num_rows($result);

    if ($user_matched > 0) {

        $_SESSION["ID"] = $ID;
        $_SESSION["first_name"] = mysqli_fetch_array($result)['first_name'];
        
        header("location: AdminDashboard.php");
    } else {
        ?>
        
          <div class="back">
            <ul>
                <li><a href="AdminLogin.php">BACK</a></li>
            </ul>
          </div>
      
        <br><br>
        <?php
        echo "User admin ID or password does not match <br/><br/>";

    }
}
?>
<html>
<body>