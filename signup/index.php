<html>
<head><title>MyLibrary | Sign Up</title>
    <link type="text/css" rel="stylesheet" href="../index.css" /> </head>
<body>
      <?php include("../header.php");
     if(isset($_POST["submit_signup"]))
     {
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
        header("Location:index.php");
     }
     else
         $_SESSION["signup_error"]="WARNING : Enter all the fields!";
     }
    ?>
    <form action="" method="post" name="register_form">
          <table>
                <tr><th colspan="2">Enter the following form and submit it to signup for MyLibrary.</th></tr>
              <tr><td>Full Name : </td>
                  <td><input type="text" name="fullname" /> </td></tr>
              <tr><td>Username : </td>
                   <td><input type="text" name="user_name" maxlength="32" /> </td></tr>
              <tr><td>Password : </td>
                  <td><input type="password" name="user_pass" min="8" /> </td></tr>
              <tr><td colspan="2"><input type="submit" name="submit_signup" value="Sign Up" /> </td></tr>
              <tr><td colspan=2><?php if(isset($_SESSION["signup_error"]))
        echo $_SESSION["signup_error"];?></td></tr>
          </table>
    </form>
</body>
</html>
