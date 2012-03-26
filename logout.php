<?php

require_once "includes/sessionstart.php";
require_once "includes/conn.php";
session_destroy();
//mysql_close($conn);

if ($guest == true) {
    $query = "DROP TABLE temp_service";
    mysql_query($query) or die(mysql_error());

    $query = "DROP TABLE temp_item";
    mysql_query($query) or die(mysql_error());
}
//redirect to homepage
header('Location: rawhome.php');
?>