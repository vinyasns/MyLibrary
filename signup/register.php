<?php
     if($_POST["fullname"]&&$_POST["user_name"]&&$_POST["user_pass"])
     {
        $dbhost = "localhost";
        $dbuser = "guest";
        $dbpass = "guest123";
        $dbname = "mylibrary";
        //Connect to MySQL Server
        $con=mysqli_connect($dbhost, $dbuser, $dbpass);
        //Select Database
        mysqli_select_db($con,$dbname) or die(mysqli_error($con)); 
        $user_name=$_POST["user_name"];
        $user_pass=$_POST["user_pass"];
        $fullname=$_POST["fullname"];
        // Escape User Input to help prevent SQL Injection
        $user_name = mysqli_real_escape_string($con,$user_name);
        $user_pass = mysqli_real_escape_string($con,$user_pass);
        $fullname = mysqli_real_escape_string($con,$fullname);
         
        $query="INSERT INTO library VALUES ('$user_name','$user_pass','$fullname')";
        $qry_result = mysqli_query($con,$query) or die(mysqli_error($con));
        $query="SELECT * FROM library WHERE user_name='$user_name'";
        $qry_result = mysqli_query($con,$query) or die(mysqli_error($con));
        $row=mysqli_fetch_array($qry_result,MYSQLI_ASSOC);
        $display="Welcome ";
         echo $display.$row["fullname"];
        header("Location:/");
     }
     else
         echo "0";
?>