<?php
$mysqli = new mysqli('localhost', 'root', 'root', 'xbee_power');
if(mysqli_connect_errno()) {
	echo(mysqli_connect_error());
	exit();
}
?>