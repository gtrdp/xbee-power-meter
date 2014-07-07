<?php
// define global variable for database connection
$database['server'] = 'localhost';
$database['username'] = 'root';
$database['password'] = 'root';
$database['database'] = 'xbee_power';

$mysqli = new mysqli('localhost', 'root', 'root', 'xbee_power');

if($mysqli->connect_errno){
	echo $mysqli->connect_error;
	exit();
}
?>