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
        <h4>Maluti Pharmacy</h4>
      </div>

      <ul class="nav-links">
        <li><a href="Catalog.php">Medicine</a></li>  
        <li><a class="active" href="Order.php">View Cart</a></li>
        <li><a href="ViewOrder.php">View Order</a></li>
        <li><a href="ConsultationForm.php">Consultation</a></li> 
        <li><a href="ViewMedicalHistory.php">Medical History</a></li>
        <li> <a href="Logout.php">Logout</a></li>   
      </ul>
    </nav>
      
    <div class="header">
        <h1>CART LIST</h1>
    </div>  

     
    <?php
    include('DatabaseConnection.php');
    $email = trim($_SESSION['email']);
     
    $sql="SELECT * FROM locations WHERE email = '$email'";
    $result = mysqli_query($mysqli,$sql) or die("bad query2");
    while($res=mysqli_fetch_array($result))
    {
      $distance = $res['distance'];
        $charge = ($distance - 10) * 5;
        $location_name = $res['place'];
    }

    $sql="SELECT SUM(price) AS total FROM temp_order WHERE email ='$email'";
    $result = mysqli_query($mysqli,$sql) or die("bad query2");
    if($result->num_rows > 0)
    {
        $row = $result->fetch_assoc();
        $price = $row['total'];
        $total = $price + $charge;
    }

    $sql= "SELECT * FROM temp_order WHERE email ='$email'";
    $result= mysqli_query($mysqli,$sql) or die("bad query");
      
    echo "<div class=\"messages\">";
    echo "Scroll Down To Confirm the order!!!";
    echo "</div>";   

    echo "<table id=\"customers\">";
    echo "<tr><th> Medicine Name</th><th> Price</th><th> Remove Order</th></tr>";
    while ($row =mysqli_fetch_assoc($result)) {
           
    echo "<tr><td> {$row['medicine_name']} </td><td> {$row['price']}</td><td><a href='RemoveOrder.php?id=$row[temp_id]'>Remove</a></td></tr>";
    }
    if($result->num_rows > 0)
    {
      echo "<tr><td>Total</td><td colspan='2'>M $total</td></tr>";
    }
    echo"</table>";

    if($result->num_rows > 0 && $charge > 0)
    {
        echo "<div class=\"pay\">";
        echo "The total amount include the charge of (M $charge.00 ) for delivery.";
        echo "</div>";
    }
    ?>
    <div> 
        <a href="ConfirmOrder.php"><button class="pay-button">Confirm Order </button></a>
        
      </div>    
    <br>

</body>

</html>