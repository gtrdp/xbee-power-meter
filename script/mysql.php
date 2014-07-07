<?php
// define global variable for database connection

$mysqli = new mysqli('localhost', 'root', 'root', 'xbee_power');

if($mysqli->connect_errno){
	echo $mysqli->connect_error;
	exit();
}
?>