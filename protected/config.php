<?php
/* Config File*/

date_default_timezone_set("Europe/Paris");  //Server Timzone

$SQL		= array(
'host'		=>	'localhost',
'user'		=>	'root',
'pass'		=>	'',
'db'		=>	'wordpress'
);

/* Connecting Database */
$mysqli 	= new mysqli($SQL['host'],$SQL['user'],$SQL['pass'],$SQL['db']);

if ($mysqli->connect_errno)
{
	echo "Failed to connect to MySQL: " . $mysqli->connect_errno;
}
$mysqli->set_charset("utf8");

