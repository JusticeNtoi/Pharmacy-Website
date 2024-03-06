 
  

<?php

include_once("conn.php");


$email = $_GET['email'];
$sql="DELETE FROM patients WHERE email= '$email'";
$result = mysqli_query($conn,$sql);
header("Location: view_patients.php");
?>

 <script>
  alert("Record Deleted!");
  
 </script>
<br><br>
  
  </body>
 </html>