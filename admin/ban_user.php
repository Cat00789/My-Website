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
	$status="none";
	$sql="update user_register set status='$status' where user_id='$user_id'";
	if(mysqli_query($con,$sql))
	{
	header("location:edit_user.php");

	}
	else
	{
		echo mysqli_error($con);
	}
	
}
?>