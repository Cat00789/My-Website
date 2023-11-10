<?php
session_start();
include("includes/db_connection.php");
if( !isset($_SESSION['login_user']) )
{
	header("location:check.php");
}
else
{
	 $email =  $_SESSION['login_user'];
	  echo $timing=$_GET["timing"];

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Movie Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<body>
<h3>Payment order </h3>
			<hr>
            <label >click confirm to Complete</label>
      <form action="" method="post">

            
 
        <input type="submit" name="submit" value="Confirm" class="btn">
      </form>


</body>
</html>
<?php
if(isset($_POST["submit"]))
{
	echo $tim;
	$status ="1";
	$sql="UPDATE payment SET status = '$status' WHERE email='$email' and timing='$timing'";
	if (mysqli_multi_query($con, $sql)) 
						{
							header("location:confirm_redirect.php");
						} 
						else
						{
							echo mysqli_error($con);
						}
}
?>
<?php
}
?>