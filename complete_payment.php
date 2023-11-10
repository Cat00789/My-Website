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
	 ?>
<html>
<head>
<title>Online Movie Booking || Admin Login
</title>
<style>

.container1
{
	padding-left:500px;
	padding-right:500px;
	padding-top:100px;
}



.container {
  padding: 16px;
  border:double;
border-radius: 50px 0px 50px 0px;
-moz-border-radius: 50px 0px 50px 0px;
-webkit-border-radius: 50px 0px 50px 0px;
border: 1px solid #000000;

-webkit-box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);
box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);

}



</style>
</head>
<body>
<div class="container1">
<center><h1>Online Cinema Ticket Booking</h1></center>

    <div class="container">
	<center>	You have already Complete your payment<br>
	<a href="status.php"> Click here</a> to return</center>
    </div>
  
</div>
</body>
</html>
<?php
}
?>

