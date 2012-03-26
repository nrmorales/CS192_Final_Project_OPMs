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
        $type = $_POST['Submit'];
        $name = $_POST['pname'];
        $address = $_POST['paddress'];
        $email = $_POST['pemail'];
        $number = $_POST['pnumber'];
        $puser = $_POST['puser'];
        $ppass = $_POST['ppass'];

        if ($type == 'Register') {
            if (!($puser == "") && !($ppass == ""))
                require_once("register.php");
            else
                echo "<script> alert('Please enter a username and password!'); </script> ";
        }else {
            //check if account is already in the database if exists, login
            if (!($puser == "") && !($ppass == "")) {
                $query2 = "SELECT * FROM client WHERE username = '$puser' AND password = '$ppass'";
                $result2 = mysql_query($query2) or die(mysql_error());
                $exist2 = mysql_num_rows($result2);

                //check if account is already in the database
                if ($exist2) {
                    $_SESSION['username'] = $puser;
                    echo "<script> alert('Please check/update your account details'); </script> ";
                }else
                    echo "<script> alert('The username/password is incorrect!\\n or it does not exist in the database!'); </script> ";
            }else
                require_once("confirmorder.php");
        }

        echo "<script> redirect('order.php');</script>";
        ?>		

    </body>
</html>