<?php
require_once "includes/sessionstart.php";
session_unset();
?>

<script type="text/javascript">
    function check(form){
        var username = form.username.value;
        var password = form.password.value;        
		var toreturn = false;

        if(username=="") alert("Please enter username!");
        else if(password=="") alert("Please enter password!");
        else toreturn = true;

		return toreturn;
    }
</script>

<html>
    <head>
        <title>	Home </title>
        <style type="text/css">
            <!--
            @import url("rawstyles.css");
            -->
        </style>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    </head>
    <body>
        <form action="logincheck.php" method="post" onSubmit="return check(this)">
            <table width="402" height="449" border="0" align="center" class="wholetable">
                <tr>
                    <th width="396" height="277" scope="col"> 
                <div align="left" class="welcomestyle">
                    <p><img src="img/OPMpics.png" alt="logo" width="394" height="257"></p>
                    <p> <?php include "includes/welcomemsg.php"; ?> </p>
                </div>
                	</th>
                </tr>
                <tr>
                    <th height="138" scope="col"><table width="243" height="161" border="0" align="center" class="loginformstyle">
                    <tr>
                        <th width="237" bgcolor="#0099FF" class="accountinfostyle" scope="col"> <div align="center">LOGIN FORM</div> </th>
                    </tr>
                    <tr>
                        <th bgcolor="#0099FF" class="accountinfostyle" scope="col"> <label>Username: </label>
                            <input type="text" name="username">
                        </th>
                    </tr>
                    <tr>
                        <th bgcolor="#0099FF" class="accountinfostyle" scope="col"> <label>Password: </label>
                            <input type="password" name="password">
                        </th>
                    </tr>
                    <tr>
                        <th height="56" bgcolor="#0099FF" class="accountinfostyle" scope="col"> 
						<p align="center">
                        	<input type="submit" name="Submit" value="Login">
                        	<br>
                        	or <br>
                        	<a href="logincheck.php?guest=true">Login as Guest </a>
						</p>
                    </th>
                    </tr>
                </table>
                </th>
                </tr>
            </table>
        </form>

        <p>&nbsp;</p>
    </body>
</html>