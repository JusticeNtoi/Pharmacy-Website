<?php

$databasehost='localhost';
$databaseusername='root';
$databasepassword='';
$databasename='hmscli';

$mysqli = mysqli_connect($databasehost,$databaseusername,$databasepassword,$databasename);
if(!$mysqli)
{
	die('Could not connect My SQL:' .mysql_error());
}

?>
