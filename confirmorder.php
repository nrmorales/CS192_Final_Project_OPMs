<?php

if ($user == 'guest') {
    $query = "INSERT INTO person(" .
            "person_id, " .
            "name, " .
            "address, " .
            "email, " .
            "mobile_no)" .
            "VALUES(NULL, '$name', '$address', '$email', '$number')";
    $result = mysql_query($query) or die(mysql_error());
    $pid = mysql_insert_id();
} else {
    $query = "SELECT person_id FROM person WHERE email = '$email'";
    $result = $result = mysql_query($query) or die(mysql_error());
    $row = mysql_fetch_array($result);
    $pid = $row['person_id'];
}

//TRANSACTION
$query = <<<QUERY
		INSERT INTO transaction(transaction_id, date, person_id)
		VALUES(NULL, '$date', '$pid')
QUERY;
$result = mysql_query($query) or die(mysql_error());

//get the transaction_id from transaction table
$tid = mysql_insert_id();
$_SESSION['tid'] = $tid;

//get data from temp_service table
$query = <<<QUERY
		SELECT temp_service.name, temp_service.quantity, services.service_id
		FROM temp_service, services
		WHERE temp_service.name = services.name
QUERY;
$result = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
    $sid = $row['service_id'];
    $quantity = $row['quantity'];

    $query = <<<QUERY
			INSERT INTO transaction_service(transaction_id, service_id, quantity, status_id, date_started, date_completed)
			VALUES('$tid', '$sid', '$quantity', 3, '', '')
QUERY;
    mysql_query($query) or die(mysql_error());
}

//get data from temp_item table
$query = <<<QUERY
		SELECT temp_item.name, temp_item.quantity, items.item_id
		FROM temp_item, items
		WHERE temp_item.name = items.name
QUERY;
$result = mysql_query($query) or die(mysql_error());

while ($row = mysql_fetch_array($result)) {
    $itemid = $row['item_id'];
    $quantity = $row['quantity'];

    $query = <<<QUERY
			INSERT INTO transaction_items(transaction_id, item_id, quantity)
			VALUES('$tid', '$itemid', '$quantity')
QUERY;
    mysql_query($query) or die(mysql_error());
}

echo "<script> alert('Successfully placed order!'); </script>";
?>