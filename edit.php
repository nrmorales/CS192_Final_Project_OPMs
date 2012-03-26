<?php
require_once "includes/sessionstart.php";
require_once "includes/conn.php";
?>
<script type="text/javascript" src="script/validate.js"> </script>
<html>
    <head>
        <title>	Edit</title>
    </head>

    <body>
		<?php
			$type = $_REQUEST['type'];
			$id = $_REQUEST['id'];
			$name_orig = $_REQUEST['name2'];
			
			$name = $_POST['name'];
			$info = $_POST['info'];
			$price = $_POST['price'];
			$category = $_POST['category'];

			if($type=='service'){
				$query = "SELECT category_id FROM category_service WHERE category = '$category[0]'";
				$result = mysql_query($query) or die(mysql_error());

				//check if name is already in the database
				$check_query = "SELECT name FROM services WHERE name = '$name'";
				$check_result = mysql_query($check_query) or die(mysql_error());
				$exist = mysql_num_rows($check_result);

				if($name_orig==$name){
					$row = mysql_fetch_array($result);
					$cid = $row['category_id'];
					$query =<<<UPDATE
						UPDATE services 
						SET info = '$info', price = '$price',
							category_id = '$cid'
						WHERE service_id = '$id'
UPDATE;
					$result = mysql_query($query) or die(mysql_error());
					$message =<<<MSG
					<script type="text/javascript">
						alert("Successfully edited\\n$name!");
						redirect("services.php");
					</script>
MSG;
				}else if($exist!=1){
					$row = mysql_fetch_array($result);
					$cid = $row['category_id'];
					$query =<<<UPDATE
						UPDATE services 
						SET name = '$name', info = '$info', price = '$price',
							category_id = '$cid'
						WHERE service_id = '$id'
UPDATE;
					$result = mysql_query($query) or die(mysql_error());
					$message =<<<MSG
					<script type="text/javascript">
						alert("Successfully changed/edited\\n$name!");
						redirect("services.php");
					</script>
MSG;
				}else{
					$message =<<<MSG
					<script type="text/javascript">
						alert("$name already exist in the database!");
						redirect("services.php");
					</script>
MSG;
				}
			}else{
				$stock = $_POST['stock'];

				$query = "SELECT category_id FROM category_item WHERE category = '$category[0]'";
				$result = mysql_query($query) or die(mysql_error());

				//check if name is already in the database
				echo $name_orig . $name;
				$check_query = "SELECT name FROM items WHERE name = '$name'";
				$check_result = mysql_query($check_query) or die(mysql_error());
				$exist = mysql_num_rows($check_result);

				if($name_orig==$name){
					$row = mysql_fetch_array($result);
					$cid = $row['category_id'];
					$query =<<<UPDATE
						UPDATE items
						SET info = '$info', price = '$price', stock = '$stock',
							category_id = '$cid'
						WHERE item_id = '$id'
UPDATE;
					$result = mysql_query($query) or die(mysql_error());
					$message =<<<MSG
					<script type="text/javascript">
						alert("Successfully edited\\n$name!");
						redirect("items.php");
					</script>
MSG;
				}else if($exist!=1){
					$row = mysql_fetch_array($result);
					$cid = $row['category_id'];
					$query =<<<UPDATE
						UPDATE items
						SET name = '$name', info = '$info', price = '$price',
							stock = '$stock', category_id = '$cid'
						WHERE item_id = '$id'
UPDATE;
					$result = mysql_query($query) or die(mysql_error());
					$message =<<<MSG
					<script type="text/javascript">
						alert("Successfully edited\\n$name!");
						redirect("items.php");
					</script>
MSG;
				}else{
					$message =<<<MSG
					<script type="text/javascript">
						alert("$name already exist in the database!");
						redirect("items.php");
					</script>
MSG;
				}
			}
			echo $message;
		?>			

    </body>
</html>