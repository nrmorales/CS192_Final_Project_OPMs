<?php
	$query =<<<QUERY
		CREATE TABLE IF NOT EXISTS temp_service(
		id int(10) auto_increment, 
		name varchar(100),	
		quantity int(10), 
		PRIMARY KEY (id)
		)
QUERY;

	$result = mysql_query($query) or die(mysql_error());

	$query =<<<QUERY
		CREATE TABLE IF NOT EXISTS temp_item(
		id int(10) auto_increment, 
		name varchar(100),	
		quantity int(10),
		PRIMARY KEY (id)
		)
QUERY;

	$result = mysql_query($query) or die(mysql_error());
?>