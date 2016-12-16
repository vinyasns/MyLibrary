<?php
$dbhost = "localhost";
$dbuser = "guest";
$dbpass = "guest123";
$dbname = "mylibrary";

$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die(mysqli_connect_error());
session_start();
$user_check=$_SESSION["user_login"];
$result=mysqli_query($con,"select * from library where user_name='$user_check'");
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
$session_user=$row["fullname"];
if(!isset($session_user))
{
	mysqli_close($con);
	header("location:index.php");
}
?>
