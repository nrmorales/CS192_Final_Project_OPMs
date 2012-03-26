<?php
	require_once "includes/sessionstart.php";
	require_once "includes/conn.php";
?>

<html>
    <head>
        <title>	Transact </title>
    </head>
<script type="text/javascript" src="script/validate.js"> </script>
    <body>
        <?php
        $type = $_REQUEST['type'];

        if ($type == 'Service')
            require_once "transact_service.php";
        else if ($type == 'Item')
            require_once "transact_item.php";
        ?>
    </body>
</html>