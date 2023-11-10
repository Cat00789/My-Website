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
	 $sql2="SELECT * from payment where email='$email' and status='none'";
			$result2=mysqli_query($con,$sql2);
			$row3=mysqli_fetch_array($result2);
			 $tm=$row3['timing'];

 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Movie Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta http-equiv="Refresh" content="8; url=payment_card_confirm.php?timing=<?php echo $tm?>">

<style>
* {
  box-sizing: border-box;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
 
  img  {
	width:100%;
  }

}


   </style>
</head>
<body>
<center>
<img src="images/pleasewait.gif">
</center>
</body>
</html>
<?php
}
?>