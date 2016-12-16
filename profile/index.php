<?php
include("../session.php");
include("../header.php");
include("menu.php");
?>
<html>
<head><title>MyLibrary | Home</title>
    <link type="text/css" rel="stylesheet" href="../index.css" /></head>
    <body class="profile">
        <p>Welcome <?php echo $session_user; ?></p>
    </body>
</html>