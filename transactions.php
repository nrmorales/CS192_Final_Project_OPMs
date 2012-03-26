<?php
	require_once "includes/sessionstart.php";
	require_once "includes/conn.php";
?>

<html>
    <head>
        <title>	Transactions </title>
        <style type="text/css">
            <!--
            .wholetable {
                height: auto;
                width: 1000px;
                border-top-style: none;
                border-right-style: none;
                border-bottom-style: none;
                border-left-style: none;
                background-color: #DAE8FE;
                text-align: left;
                font-size: 10px;
            }
            .liststyle {
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 12px;
                background-color: #DAE8FE;
                width: 600px;
            }
            .bannerstyle {
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 10px;
                border: thin none #000000;
                background-image: url(img/banner.png);
                background-repeat: no-repeat;
                background-position: center top;
                height: 120px;
                width: 1000px;
                text-align: left;
            }
            .buttonstyle {
                color: #FFFFFF;
                background-color: #000066;
                height: 15px;
                width: 90px;
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 12px;
                border: thin solid #000000;
            }
            .maintable {
                border: thin solid #13A3F0;
                text-align: left;
                vertical-align: text-top;
                background-color: #BDDDFD;
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 12px;
                font-style: normal;
                height: auto;
                width: 1000px;
            }
            .accountinfostyle {
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 12px;
                font-style: italic;
                background-color: #ACC8F7;
                color: #000000;
                text-align: left;
                vertical-align: top;
            }
            .logoutstyle {
                color: #003399;
                font-size: 12px;
                border-top-style: none;
                border-right-style: none;
                border-bottom-style: none;
                border-left-style: none;
            }
            .welcomestyle {
                font-family: Georgia, "Times New Roman", Times, serif;
                font-size: 10px;
                border-top-width: thin;
                border-right-width: thin;
                border-bottom-width: thin;
                border-left-width: thin;
                border-top-style: solid;
                border-right-style: solid;
                border-bottom-style: solid;
                border-left-style: solid;
                height: 40px;
                width: 1000px;
                background-image: none;
                background-color: #FFFFFF;
            }
            .sidetablestyle {
                background-color: #BDDDFD;
                width: 200px;
                height: 50px;
            }
            .menubuttons {
                background-position: center center;
                border-top-style: none;
                border-right-style: none;
                border-bottom-style: none;
                border-left-style: none;
                height: auto;
                width: 1000px;
                background-repeat: no-repeat;
                background-image: none;
            }
            -->
        </style>
        <script type="text/JavaScript">
            <!--
            function MM_preloadImages() { //v3.0
                var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
                    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
                        if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
                }

                function MM_swapImgRestore() { //v3.0
                    var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
                }

                function MM_findObj(n, d) { //v4.01
                    var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
                        d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
                    if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
                    for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
                    if(!x && d.getElementById) x=d.getElementById(n); return x;
                }

                function MM_swapImage() { //v3.0
                    var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
                    if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
                }
                //-->
        </script>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
            <!--
            body {
                background-image: url(img/background.png);
                background-repeat: repeat-x;
            }
            .style2 {font-size: 9px}
            -->
        </style>
    </head>
    <body onLoad="MM_preloadImages('../CS192_presented/img/orderrollover.png','img/homerollover.png','img/servicesrollover.png','img/itemsrollover.png','img/aboutrollover.png','img/transactionsrollover.png','img/adminrollover.png')">
        <table width="990" height="185" border="0" cellpadding="0" cellspacing="0" class="bannerstyle" align="center">
            <tr class="bannerstyle">
                <th height="195" class="bannerstyle style2" scope="col"><div>
                <p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
                <p align="center">&nbsp;</p>
                <p align="center"><a href="home.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('home','','img/homerollover.png',1)"><img src="img/home.png" name="home" width="157" height="40" border="0"></a><a href="services.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('Image2','','img/servicesrollover.png',1)"><img src="img/services.png" name="Image2" width="157" height="40" border="0"></a><a href="items.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('items','','img/itemsrollover.png',1)"><img src="img/items.png" name="items" width="157" height="40" border="0"></a><a href="about.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('about','','img/aboutrollover.png',1)"><img src="img/about.png" name="about" width="157" height="40" border="0"></a>

                    <?php
                    if ($guest == true) {
                        $write = <<<WRITE
							<a href="order.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('order','','img/orderrollover.png',1)"><img src="img/order.png" name="order" width="157" height="40" border="0"></a><a href="receipt.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('receipt','','img/receiptrollover.png',1)"><img src="img/receipt.png" name="receipt" width="157" height="40" border="0"></a>
WRITE;
                        echo $write;
                    } else {
                        $write = <<<WRITE
<a href="transactions.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('transactions','','img/transactionsrollover.png',1)"><img src="img/transactions.png" name="transactions" width="157" height="40" border="0"></a>
<a href="admin.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('admin','','img/adminrollover.png',1)"><img src="img/admin.png" name="admin" width="157" height="40" border="0"></a>
WRITE;
                        echo $write;
                    }
                    ?>

                </p>
            </div>            </th>
    </tr>
</table>
<table width="532" height="40" border="0" cellpadding="0" cellspacing="0" class="wholetable" align="center">
    <tr>
        <th width="532" height="40" bordercolor="0" class="welcomestyle" scope="col"><div align="center">
        <?php include "includes/welcomemsg.php"; ?>
    </div></th>
</tr>
</table>

<table width="1020" height="200" border="1" align="center" class="maintable">
    <tr>
        <th width="200" scope="col"><table width="168" height="666" border="0" class="sidetablestyle">
        <tr class="buttonstyle">
            <th width="158" height="27" scope="col">Account</th>
        </tr>
        <tr class="accountinfostyle">
            <th height="103" scope="col"><?php echo "Welcome $user!"; ?>
        <div align="center"></div></th>
        </tr>
        <tr>
            <th height="35" scope="col"><div align="left" class="logoutstyle"><a href="logout.php"> Logout </div></th>
        </tr>
        <tr class="accountinfostyle">
            <th height="489" scope="col">&nbsp;</th>
        </tr>
    </table></th>
<th width="802" class="maintable" scope="col">
<center><u>Services</u> <br>
<br> <table width="70%" border="1" cellpadding="2" class="liststyle">
    <tr>
        <th> Services </th>
        <th> Client </th>
        <th> Transaction Number </th>
        <th> Quantity </th>
        <th> Status </th>        
		<th> Cancel </th>
        <th> Date Started </th>
        <th> Date Completed </th>
    </tr>
    <?php
    $query = "SELECT * FROM transaction";
    $result = mysql_query($query) or die(mysql_error());

    $output = '';
	$csv_hdr = "Services, Client, Transaction Number, Quantity, Status, Date Started, Date Completed";
	$csv_out = "";
    //TRANSACTIONS
    while ($row = mysql_fetch_array($result)) {
        $tid = $row['transaction_id'];
        $date = $row['date'];
        $pid = $row['person_id'];

        //TRANSACTION SERVICES
        $query2 = "SELECT * FROM transaction_service WHERE transaction_id = '$tid'";
        $result2 = mysql_query($query2) or die(mysql_error());

        while ($row2 = mysql_fetch_array($result2)) {

            $sid = $row2['service_id'];
            $quantity = $row2['quantity'];
            $status_id = $row2['status_id'];
            $date_started = $row2['date_started'];
            $date_completed = $row2['date_completed'];

            $query_status = "SELECT status FROM status WHERE status_id = '$status_id'";
            $result_status = mysql_query($query_status) or die(mysql_error());
            $row_status = mysql_fetch_array($result_status);
            $status = $row_status['status'];

            $query_service = "SELECT name FROM services WHERE service_id = '$sid'";
            $result_service = mysql_query($query_service) or die(mysql_error());
            $row_service = mysql_fetch_array($result_service);
            $name = $row_service['name'];

            $query_person = "SELECT name FROM person WHERE person_id = '$pid'";
            $result_person = mysql_query($query_person) or die(mysql_error());
            $row_person = mysql_fetch_array($result_person);
            $pname = $row_person['name'];

            $output .=<<<OUTPUT
							<tr>
								<td align="center"> $name </td>
								<td align="center"> $pname </td>
								<td align="center"> $tid </td>
								<td align="center"> $quantity </td>
OUTPUT;
			$csv_out .= $name . ", " . $pname . ", " . $tid . ", " . $quantity . ", " . $status . ", " . $date_started . ", " . $date_completed . "\n";
            if ($status == 'Pending') {
                $output .=<<<OUTPUT
								<td align="center"> <a href="statusupdate.php?status=$status&name=$name&tid=$tid"> $status </td>
								<td align="center"> <a href="cancelrequest.php?option=3&sid=$sid&tid=$tid"> Cancel </td>
OUTPUT;
            } else if ($status == 'On-going') {
                $output .=<<<OUTPUT
								<td align="center"> <a href="statusupdate.php?status=$status&name=$name&tid=$tid"> $status </td>
								<td align="center"> <a href="cancelrequest.php?option=3&sid=$sid&tid=$tid"> Cancel </td>
OUTPUT;
            } else {
                $output .=<<<OUTPUT
								<td align="center"> $status </td>
								<td align="center"> -------- </td>
OUTPUT;
            }

            $output .=<<<OUTPUT
								<td align="center"> $date_started </td>
								<td align="center"> $date_completed </td>
							</tr>
OUTPUT;
        }
    }
    $output .= "</table></center>";
    echo $output;
    ?>

    <br>
    <br>    
   <center><u>Items</u> <br>
    <br>
    <table width="70%" border="1" cellpadding="2" class="liststyle">
        <tr>
            <th> Items </th>
            <th> Client </th>
            <th> Transaction Number </th>
            <th> Quantity </th>
        </tr>
        <?php
        $query = "SELECT * FROM transaction";
        $result = mysql_query($query) or die(mysql_error());
        $output2 = '';

        while ($row = mysql_fetch_array($result)) {
            $tid = $row['transaction_id'];
            $date = $row['date'];
            $pid = $row['person_id'];

            //TRANSACTION ITEMS
            $query2 = "SELECT * FROM transaction_items WHERE transaction_id = '$tid'";
            $result2 = mysql_query($query2) or die(mysql_error());

            while ($row2 = mysql_fetch_array($result2)) {
                $iid = $row2['item_id'];
                $quantity = $row2['quantity'];

                $query_item = "SELECT name FROM items WHERE item_id = '$iid'";
                $result_item = mysql_query($query_item) or die(mysql_error());
                $row_item = mysql_fetch_array($result_item);
                $name = $row_item['name'];

                $query_person = "SELECT name FROM person WHERE person_id = '$pid'";
                $result_person = mysql_query($query_person) or die(mysql_error());
                $row_person = mysql_fetch_array($result_person);
                $pname = $row_person['name'];

                $output2 .=<<<OUTPUT
							<tr>
								<td align="center"> $name </td>
								<td align="center"> $pname </td>
								<td align="center"> $tid </td>
								<td align="center"> $quantity </td>
							</tr>
OUTPUT;
            }            
        }
		$output2 .= "</table></center>";
		
		//select box for date in report generation  
		$output2 .=<<<OUTPUT
			<center>
			<form action="csvreport.php" method="post">
				<input type="submit" value="Generate Report">
				<input type="hidden" value="$csv_hdr" name="csv_hdr">
				<input type="hidden" value="$csv_out" name="csv_out">
			</form>
			</center>
OUTPUT;
        echo $output2;
        ?>
    	</table>
    </body>
</html>