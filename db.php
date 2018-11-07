<?php 
	$hostname = '127.0.0.1';
	$username = 'root';
	$password = '';
	$dbname = 'courses';

	$conn = mysql_connect($hostname, $username, $password);

	if (!$conn || !mysql_select_db($dbname) ) {
		die("could not connect");
	}
?>