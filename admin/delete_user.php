<?php
session_start();
include("includes/db_connection.php");
$user_id=$_GET["Serial_no"];
if( !isset($_SESSION['login_user']) )
{
	header("location:check.php");
}
else
{
	$sql="delete from user_register where user_id='$user_id'";
	if(mysqli_query($con,$sql))
	{
		header("location:edit_user.php");
	}
	
}
?>