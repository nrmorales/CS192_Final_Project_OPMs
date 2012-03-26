<?php

$order = $_POST['order'];
$index = 0;
$keys = array_keys($order);

for ($i = 0; $i < count($keys); $i++) {
    $name = $keys[$i];
    $quantity = $order[$name];

    if (($quantity != null) && is_numeric($quantity) && ($quantity != 0)) {
        $index = 1;
        $query = "SELECT name FROM temp_item WHERE name = '$name'";
        $result = mysql_query($query) or die(mysql_error());

        //check if the item exists in database
        $exist = mysql_num_rows($result);
        if ($exist == 1) {
            $message = <<<MSG
				<script>
					alert("You already ordered $name! It will not be recorded!");
					redirect('items.php');
				</script>
MSG;
            echo $message;
        } else {
            $query = <<<QUERY
				INSERT INTO temp_item(id, name, quantity)
				VALUES(NULL, '$name', '$quantity')
QUERY;
            $result = mysql_query($query) or die(mysql_error());
        }
    } else if ($quantity == 'Enter number') {
        
    } else {
        echo "<script> alert('Please enter valid number!'); redirect('items.php'); </script>";
        break;
    }
}

if ($index == 1)
    echo "<script> alert('Successfully ordered item!'); redirect('items.php'); </script>";
else
    echo "<script> alert('Please enter a valid number!'); redirect('items.php'); </script>";
?>