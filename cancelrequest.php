<?php
	require_once "includes/sessionstart.php";
	require_once "includes/conn.php";
?>
<script type="text/javascript" src="script/validate.js"> </script>
<html>
    <head>
        <title>	Cancel </title>
    </head>

    <body>
        <?php
        $name = $_REQUEST['tocancel'];
        $option = $_REQUEST['option'];        
		$sid = $_REQUEST['sid'];
		$tid = $_REQUEST['tid'];

        if ($option == 1)
            $query = "DELETE FROM temp_service WHERE name = '$name'";
        else if ($option == 2)
            $query = "DELETE FROM temp_item WHERE name = '$name'";            
		else if ($option == 3)
			$query = "DELETE FROM transaction_service WHERE transaction_id = '$tid' AND service_id = '$sid'"; 

        $result = mysql_query($query) or die(mysql_error());

		if($option == 3)
			echo "<script> redirect('transactions.php') </script>";
        else
			echo "<script> redirect('order.php') </script>";
        ?>
    </body>
</html>

