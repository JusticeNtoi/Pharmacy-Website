<?php
    session_start();
?>

<html>
<body>

<?php

include_once("DatabaseConnection.php");

$temp_id = $_GET ['id'];

$sql = "DELETE FROM temp_order WHERE temp_id = $temp_id";

$result = mysqli_query($mysqli, $sql);

header("location: Order.php");
?>
</body>
</html>