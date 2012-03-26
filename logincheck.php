<?php
require_once("includes/sessionstart.php");
require_once("includes/conn.php");
?>
<script type="text/javascript">
    function loginerror(){
        alert("The username/password that you entered is not valid!");
        window.location = "rawHome.php";
    }
</script>

<html>
    <title> Login Check </title>
    <body>
        <script type="text/javascript" src="script/validate.js"> </script>

        <?php
        $guest = $_REQUEST['guest'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($guest == true) {
            $_SESSION['guest'] = true;
            echo "<script> redirect('home.php'); </script>";
        } else {
            $query = "SELECT username, password FROM admin WHERE username='$username'";
            $result = mysql_query($query) or die(mysql_error());

            //check if username exists in admin table
            $exist = mysql_num_rows($result);

            $query2 = "SELECT username, password FROM client WHERE username='$username'";
            $result2 = mysql_query($query2) or die(mysql_error());

            //check if username exists in admin table
            $exist2 = mysql_num_rows($result2);

            if ($exist == 1) {
                //fetch username and password
                $row = mysql_fetch_array($result);
                $dbusername = $row['username'];
                $dbpassword = $row['password'];

                //check if data entered matches that of the database content
                if ($username == $dbusername && $password == $dbpassword) {
                    $_SESSION['username'] = $username;
                    $_SESSION['guest'] = false;
                    echo "<script> redirect('home.php'); </script>";
                }else
                    echo "<script> loginerror(); </script>";
            }else if ($exist2 == 1) {
                //fetch username and password
                $row = mysql_fetch_array($result2);
                $dbusername = $row['username'];
                $dbpassword = $row['password'];

                //check if data entered matches that of the database content
                if ($username == $dbusername && $password == $dbpassword) {
                    $_SESSION['username'] = $username;
                    $_SESSION['guest'] = true;
                    echo "<script> redirect('home.php'); </script>";
                }else
                    echo "<script> loginerror(); </script>";
            }else
                echo "<script> loginerror(); </script>";
        }
        ?>

    </body>
</html>