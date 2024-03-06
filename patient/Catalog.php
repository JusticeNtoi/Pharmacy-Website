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
        <li><a class="active" href="Catalog.php">Medicine</a></li>  
        <li><a href="Order.php">View Cart</a></li>
        <li><a href="ViewOrder.php">View Order</a></li>
        <li><a href="ConsultationForm.php">Consultation</a></li> 
        <li><a href="ViewMedicalHistory.php">Medical History</a></li>
        <li> <a href="Logout.php">Logout</a></li> 
      </ul>
    </nav>
      
<div class="header">
    <h1>OUR MEDICINE</h1>
</div>       

<?php
include_once("DatabaseConnection.php");

$sql="SELECT * FROM medicines WHERE status='available'";

$result = mysqli_query($mysqli,$sql);

while($res=mysqli_fetch_array($result))
{
	$medicine_id = $res['medicine_id'];
	$medicine_image = $res['medicine_image'];
	$name = $res['name'];
	$price = $res['price'];
    $description = $res['description'];
?>
    <div class="product">
                <div class="image">
                <?php echo "<img src='../pharmacist/uploads/" . $medicine_image . "' width='100' height='200'>";?>
                </div>
                <div class="medName">
                    <h3><?php echo "$name";?></h3>
                </div>    
                    <div class="medPrice">
                        <span>M <?php echo "$price";?></span>
                    </div>
                
                <p class="description"><?php echo "$description";?></p>
                <button class="order-button">
                    <FORM id="form" name="form" method="post" action="CatalogOrder.php">
                        <fieldset>
                        <input type="hidden" name="medicine_id" value="<?php echo $medicine_id;?>">
                        <input type="hidden" name="name" value="<?php echo $name;?>">
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <input type="submit" name="save" id="submit" value="Add to Cart">
                        </fieldset>
                    </FORM>
                </button>
            </div>
<?php

}
?>

</body>

</html>