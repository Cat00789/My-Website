<?php
session_start();
include("includes/db_connection.php");
$query="select * from movie where status='1'";
	  $result1=mysqli_query($con,$query);
		$rows=mysqli_fetch_array($result1);
		$movie_id=$rows['movie_id'];
if( !isset($_SESSION['login_user']) )
{
	header("location:check.php");
}
else
{
	
							$sql = "update movie set status='Inactive' where movie_id='$movie_id'" ;
							if (mysqli_query($con, $sql)) 
								{
										header("location:activate_movie.php");
								}

							else 
								{
									echo "<script> alert('Check if the field contain any special charecter');</script>";
									echo mysqli_error($con);
								}
	
}
?>