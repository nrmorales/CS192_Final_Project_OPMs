<?php
	define('HOST', 'localhost');
	define('USER', 'nok');
	define('PASSWORD', 'nok');
	define('DATABASE', 'company');

	$conn = mysql_connect(HOST, USER, PASSWORD) or die('Could not connect to the database! ' . mysql_error());
	mysql_select_db(DATABASE, $conn) or die('Could not select database! ' . mysql_error());
?>