<?php 
	include "includes/sessionstart.php"; 
	include "includes/conn.php";
?>
<html>
	<head>
		<title> Do Order </title>
	</head>
<script type="text/javascript" src="script/validate.js"> </script>
	<body>
		<?php
			$date = date("Y-m-d");
			$tid = $_REQUEST['tid'];
			$status = $_REQUEST['status'];
			$name = $_REQUEST['name'];

			$query = "SELECT service_id FROM services WHERE name = '$name'";
			$result = mysql_query($query) or die(mysql_error());
			$row = mysql_fetch_array($result);
			$sid = $row['service_id'];

			if($status=='Pending'){
				$query = "UPDATE transaction_service SET date_started = '$date', status_id = 2 WHERE service_id = '$sid' AND transaction_id = '$tid'";
				$result = mysql_query($query) or die(mysql_error());
			}else{
				$query = "UPDATE transaction_service SET date_completed = '$date', status_id = 1 WHERE service_id = '$sid' AND transaction_id = '$tid'";
				$result = mysql_query($query) or die(mysql_error());
			}
			echo "<script> redirect('transactions.php'); </script>";

		?>
	</body>
</html>