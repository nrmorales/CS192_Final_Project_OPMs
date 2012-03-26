<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Orders Table</title>
</head>
    <table align="center" border="1" cellpadding="0" cellspacing="0" width="90%">
	<tr class="dataTableRow">
		<td class="main" width="5%"><b>Order ID</b></td>
		<td class="main" width="10%">Ordered By</td>
		<td class="main" width="10%">Email</td>
		<td class="main" width="5%">Ordered On</td>
		<td class="main" width="5%">Completed On</td>
		<td class="main" width="15%">Line Items</td>
		<td class="main" width="5%">Order Total</td>
	</tr>
<?php
//Now that we've created such a nice heading for our html table, lets create a heading for our csv table
    $csv_hdr = "Order ID, Ordered By, Email, Order Date, Completed Date, Line Items, Total";
  
// Ok, we're done with the table heading, lets connect to the database
    $database="test";
    mysql_connect("localhost","nok","nok");
    mysql_select_db("test");

// Lets say we wanted a table with all orders, their products and totals...a summary report of sorts
    $result=mysql_query("select * from orders o, orders_products p, orders_total t where o.orders_id = t.orders_id and o.orders_id = p.orders_id");

// If our query has some results, lets store them in array of rows.
    if (mysql_num_rows($result) > 0) {
    
        //While our rows array has stuff in it...meaning it has column data, lets print it to each of the cells in our table
        while ($row = mysql_fetch_assoc($result)) {
?> 
        <tr>
            <td align="left" valign="center">
            <br><?php echo $row['orders_id']; //here we are displaying the contents of the field or column in our rows array for a particular row.
            //while we're at it we might as well store the data in comma separated values (csv) format in the csv_output variable for later use.
            $csv_output .= $row['orders_id'] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row['customers_name']; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row['customers_name'] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row['customers_email_address']; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row['customers_email_address'] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row['date_purchased']; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row['date_purchased'] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo $row['last_modified']; //repeat for all remaining fields or columns we have headings for...
            $csv_output .= $row['last_modified'] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php //repeat for all remaining fields or columns we have headings for...
            echo $row['products_quantity'] . " x " . $row['products_model'] . " " . $row['products_name'] . " ($" . number_format($row['products_price'], 2, '.', '') . ")"; 
            $csv_output .= $row['products_model'] . " " . $row['products_name'] . ", ";?>
            </td>
            <td align="left" valign="center">
            <br><?php echo " <b>$" . number_format($row['value'], 2, '.', '') . "</b>"; 
            $csv_output .= $row['value'] . "\n"; //ensure the last column entry starts a new line ?>
            </td>
        </tr>
<?php
        } //closing while loop
    } //closing if stmnt
?>
    <!--closing the table-->
    </table>   
<?php
/*
Here is the important part. we've got the 2 variables (csv_hdr & csv_output) to create our csv file, but we can't do it in this file.
Why? Because the header for this file has already been sent and will show up in our csv file if we generate it on this page. We don't
want any html header in our csv file, so we've got to post our 2 variables to another php page (export.php) on which we generate our csv
file.

Here's the code for a form & button that'll post our 2 variables as hidden _POST to export.php.
*/
?>
<br />
<center>
<form name="export" action="export.php" method="post">
    <input type="submit" value="Export table to CSV">
    <input type="hidden" value="<?php echo $csv_hdr; ?>" name="csv_hdr">
    <input type="hidden" value="<?php echo $csv_output; ?>" name="csv_output">
</form>
</center>