<?php
    session_start();
?>

<html>
<body>

<?php
include_once("DatabaseConnection.php");

$email = trim($_SESSION['email']);
$medicine_names = '';
$status = 'pending';

$sql="SELECT * FROM temp_order WHERE email = '$email'";
$result = mysqli_query($mysqli,$sql) or die("bad query1");
while($res=mysqli_fetch_array($result))
{
	$medicine_name = $res['medicine_name'] . ', ';
    $medicine_names .= $medicine_name;
}


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

$Date = date('Y-m-d H:i:s');

if($price > 0)
{
    $sql = "INSERT INTO orders (email,medicine_names,date,location_name,price,status)
    VALUES ('$email','$medicine_names','$Date','$location_name','$total','$status')";
}
else {
    header("location: Order.php");
}

if(mysqli_query($mysqli, $sql))
{
    $sql = "DELETE FROM temp_order WHERE email = '$email'";
    $result = mysqli_query($mysqli, $sql);

    header("location: Order.php");
}

?>

</body>
</html>