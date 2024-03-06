<?php

$databaseHost     = 'localhost';
$databaseName     = 'hmscli';
$databaseUsername = 'root';
$databasePassword = '';

// create a connection
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";


?>


