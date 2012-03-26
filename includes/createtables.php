<?php
	require_once 'conn.php';

	//create the tables needed pg 439

	$sql =<<<EOS
		CREATE TABLE IF NOT EXISTS

EOS;
	$result = mysql_query($sql) or die(mysql_error());

?>