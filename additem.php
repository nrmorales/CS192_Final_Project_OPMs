<?php
require_once "includes/sessionstart.php";
require_once "includes/conn.php";
?>
<script type="text/javascript" src="script/validate.js"> </script> 
<html>
    <head>
        <title>	Add Item </title>
    </head>

    <body>
        <?php
        $name = $_REQUEST['name'];
        $price = $_REQUEST['price'];
        $category = $_REQUEST['category'];

        $query = "SELECT * FROM items WHERE name='$name'";
        $result = mysql_query($query) or die(mysql_error());

        //check if the item exists in database
        $exist = mysql_num_rows($result);

        if ($exist == 1) {
            $message = <<<MSG
					<script type="text/javascript">
						alert("'$name' already exists in the database!");
						redirect('items.php');
					</script>
MSG;
            echo $message;
        } else {
            $query = "SELECT category_id FROM category_item WHERE category='$category[0]'";
            $result = mysql_query($query) or die(mysql_error());
            $row = mysql_fetch_array($result);
            $category_id = $row['category_id'];

            $query = <<<QUERY
						INSERT INTO items(item_id, category_id, name, info, price, stock)
						VALUES(NULL, '$category_id', '$name', '', '$price', '')
QUERY;

            $result = mysql_query($query) or die(mysql_error());

            $message = <<<MSG
						<script type="text/javascript">
							alert("Added\\nItem name: $name\\nItem price: $price\\nItem category: $category[0]\\nto the database!");
							redirect('items.php');
					</script>
MSG;
            echo $message;
        }
        ?>

    </body>
</html>
