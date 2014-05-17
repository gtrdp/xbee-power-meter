<?php
/**
 * Database connection
 * @author  guntur.dharma@gmail.com
 * 
 * Sample input
 * 409f40e8 	2014-05-08 	11:22:34.844705 298.837158203 	209.039810181 	1.43536436558 	1.04167819023
 */


// get the arguments
$sensor_ID	= $argv[1];
$watt		= number_format((float)$argv[2], 2, '.', ''); //$argv[2];
$voltage	= number_format((float)$argv[3], 2, '.', ''); //$argv[3];
$current	= number_format((float)$argv[4], 2, '.', ''); //$argv[4];
$energy		= number_format((float)$argv[5], 2, '.', ''); //$argv[5];

// connect to mysql
mysql_connect('localhost', 'root', 'root');
mysql_select_db('xbee_power');

$query =	"INSERT INTO history (sensor_ID, watt, voltage, current, energy)".
			"VALUES ('$sensor_ID', '$watt', '$voltage', '$current', '$energy')";

mysql_query($query);

// =====================