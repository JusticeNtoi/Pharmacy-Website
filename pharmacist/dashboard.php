<?php
    // Start session
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['id'])) {
       header("Location: index.php");
       exit();
    }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/style.css" />

    <style>
      body {
        background-image: url("../pharmacy.jpg");
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>

    <title>Home</title>
  </head>

  <body>

    <nav>
      <div class="heading">
        <h4>Welcome <?php echo $_SESSION['name']; ?>! </h4>
          
      </div>

      <ul class="nav-links">
        <li><a class="active" href="dashboard.php">Home</a></li>
        <li><a href="update_pharmacist.php">Update Profile</a></li>
        <li><a href="Orders.php">Orders</a></li> 
        <li><a href="medicine_reg.php">Add Medicine</a></li>
        <li><a href="view_patients.php">ALL Patients</a></li>
        <li><a href="medical_history.php">Patients Consultation</a></li>  
        <li> <a href="logout.php">Logout</a></li>
      </ul>
    </nav>

        <div class="header">
            <h1>WELCOME!!!</h1>
        </div>

        <div class="products">            
            <div class="product">
                <div class="image">
                    <img src="Med.jpg" alt="">
                </div>
                <div class="medName">
                    <h3>About Us</h3>
                </div>    
                <p class="description">We are a pharmacy located in Maluting...</p>
            </div>

            <div class="product">
                <div class="image">
                    <img src="Med.jpg" alt="">
                </div>
                <div class="medName">
                    <h3>Contact Us</h3>
                </div>    
                
                <p class="description">You can call us at +266 5023 6578...</p>
            </div>

            
        </div>
  </body>

</html>