<?php
require_once "includes/sessionstart.php";
require_once "includes/conn.php";
require_once "includes/createtemp.php";
?>

<script type="text/javascript" src="script/validate.js"> </script>

<html>
    <head>
        <title>	Edit Services </title>
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
							<a href="order.php" onMouseOut="MM_swapImgRestore()" onMouseOver="MM_swapImage('order','','img/orderrollover.png',1)"><img src="img/order.png" name="order" width="157" height="40" border="0"></a>
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
<th width="802" class="maintable" scope="col">				<?php
        $name = $_REQUEST['name'];
        $output = '';

        $query = "SELECT * FROM services WHERE name='$name'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);

        $info = $row['info'];
        $price = $row['price'];
        $status = $row['status'];
        $id = $row['service_id'];

        $output .=<<<OUTPUT
				<form name="editservice" method="post" action="edit.php?type=service&id=$id&name2=$name" onsubmit=" return edit(this, 'Service')">
					<label> Name: </label> <input type="text" name="name" size="40" value='$name'> <br>
					<label> Info: </label> <textarea rows="5" cols="30" name="info"> $info </textarea> <br>
					<label> Price: </label> <input type="text" name="price" value='$price'> <br>
					<label> Status: </label> <input type="text" name="status" value='$status'> <br>
					<label> Category: </label> <select id="category" name="category[]">
						<option value="0"> --Choose category-- </option>
OUTPUT;

        //select box for category table
        $query = "SELECT category FROM category_service";
        $result = mysql_query($query) or die(mysql_error());

        while ($row2 = mysql_fetch_array($result)) {
            $category = $row2['category'];
            $output .= "<option value='$category'> $category </option>";
        }

        $output .=<<<OUTPUT
				<br> <input type="submit" value="Edit"> <br>
				</form>
OUTPUT;
        echo $output;
        ?>

</table>
</body>
</html>
