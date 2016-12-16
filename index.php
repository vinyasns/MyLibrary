<?php include("login.php");
 if(isset($_SESSION["user_login"]))
        {
        header("location:profile/");
        }?>
<html><head><title>MyLibrary</title>
    <link type="text/css" rel="stylesheet" href="index.css" />
    <script type="text/javascript" src="js/main.js"></script> </head>
    <body onload="document.login_form.user_name.focus()">
    <?php
        include("header.php");
    ?>
         <br />
        <form action="" method="post" name="login_form" onfocus ="return validate(this)">
        <table class="table_login" >
        <tr><th colspan="2">Login to MyLibrary</th></tr>
        <tr><td>Username : </td><td><input type="text" min="3" maxlength="32" name="user_name" /></td></tr>
        <tr><td>Password : </td><td><input type="password" min="8" name="user_pass" /> </td></tr>
            <tr><td colspan="2"><input type="submit" name="submit" value="Sign In" /> </td> </tr>
            <tr><td colspan="2">Don't have an account?<a href="/signup" > Sign Up here</a></td></tr>
        <tr><td colspan=2><?php if(isset($_SESSION["error"]))
        echo $_SESSION["error"];?></td></tr>
        </table>
        </form>
    </body>
</html>
