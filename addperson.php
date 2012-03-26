<?php
include "includes/sessionstart.php";
include "includes/conn.php";
?>

<html>
    <head>
        <title>	Add Person </title>
    </head>

    <script type="text/javascript" src="script/validate.js"> </script>

    <body>
        <?php
        $name = $_POST['pname'];
        $address = $_POST['paddress'];
        $email = $_POST['pemail'];
        $number = $_POST['pnumber'];
        $puser = $_POST['puser'];
        $ppass = $_POST['ppass'];

        $query2 = "SELECT * FROM client WHERE username = '$puser' AND password = '$ppass'";
        $result2 = mysql_query($query2) or die(mysql_error());
        $exist2 = mysql_num_rows($result2);

        //check if account is already in the database
        if (!($puser == "") && !($ppass == "")) {
            if ($exist2) {
                $_SESSION['username'] = $puser;
                echo "<script> alert('Please check/update your account details'); redirect('order.php'); </script> ";
            } else {
                echo "<script> alert('The username/password is incorrect!\\n or it does not exist in the database!'); </script> ";
            }
        } else {
            //check if email do not exist in database
            $query = "SELECT name, person_id FROM person WHERE email = '$email'";
            $result = mysql_query($query) or die(mysql_error());
            $exist = mysql_num_rows($result);

            if (!$exist) {
                $query = "INSERT INTO person(" .
                        "person_id, " .
                        "name, " .
                        "address, " .
                        "email, " .
                        "mobile_no)" .
                        "VALUES(NULL, '$name', '$address', '$email', '$number')";
                $result = mysql_query($query) or die(mysql_error());
            }

            //get the person_id from person table
            $query = "SELECT person_id FROM person where name='$name'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $pid = $row['person_id'];

            //TRANSACTION
            $query = <<<QUERY
					INSERT INTO transaction(transaction_id, date, person_id)
					VALUES(NULL, '', $pid)
QUERY;
            $result = mysql_query($query) or die(mysql_error());

            //get the transaction_id from transaction table
            $tid = mysql_insert_id();

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
						INSERT INTO transaction_service(transaction_id, service_id, quantity)
						VALUES($tid, $sid, $quantity)
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
						VALUES($tid, $itemid, $quantity)
QUERY;
                mysql_query($query) or die(mysql_error());
            }
        }

        echo "<script> redirect('order.php');</script>";
        ?>		

    </body>
</html>