<?php
// connect to DB
mysql_connect('localhost', 'root', 'root');
mysql_select_db('xbee_power');

$query = "SELECT * FROM history ORDER BY id DESC LIMIT 0, 20";
$result = mysql_query($query);

$foo = array();

while($row = mysql_fetch_object($result)){
	array_push($foo, array('time' => $row->datetime, 'watt' => $row->watt, 'energy' => $row->energy));
}

// var_dump($foo);
echo json_encode($foo);