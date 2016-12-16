<?php
session_start();
if(isset($_POST["submit"]))
{
if($_POST["user_name"]&&$_POST["user_pass"])
{
	$dbhost = "localhost";
	$dbuser = "guest";
	$dbpass = "guest123";
	$dbname = "mylibrary";

	$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname) or die(mysqli_connect_error());

	$user_name = mysqli_real_escape_string($con,$_POST["user_name"]);
	$user_pass = mysqli_real_escape_string($con,$_POST["user_pass"]);

	$query="select * from library where user_name='$user_name' AND user_pass='$user_pass'";
	$result=mysqli_query($con, $query);
	$rows=mysqli_num_rows($result);
	if($rows==1)
	{
		$_SESSION["user_login"]=$user_name;
	    header("location:profile/");
    }
    else { $_SESSION["error"]="ERROR : Enter valid credentials";}
    mysqli_close($con);
}
else
    {
	 $_SESSION["error"]="ERROR : Enter valid credentials";
     }
}
?>
