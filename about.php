<?php
include("includes/db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Movie Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="menu.css">
<style>
.container {
  position: absolate;
  text-align: center;
  color: white;
}

.centered {
  position: absolute;
  width:100%;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color:white;
   background: rgb(9,28,233);
	background: linear-gradient(62deg, rgba(9,28,233,1) 0%, rgba(255,0,151,0.5746498428472951) 48%, rgba(0,228,255,1) 100%); 
opacity:.8;
	}
</style>
</head>
<body>

<?php
include("includes/menu.php");
	   $query="select * from movie where status='1'";
	  $result=mysqli_query($con,$query);
		$rows=mysqli_fetch_array($result);
		$movie_name=$rows['movie_name'];
		$movie_id=$rows['movie_id'];
		$movie_path=$rows['movie_path'];
		$movie_des=$rows['movie_des'];
	 ?>

<div>
<h1>Welcome to JC Edutech</h1>
<h3>"Your first step towards right career !"</h3>
<p>Welcome to the World of J.C. Institution. We are committed to provide you the best guidance more effectively than ever before. We take care that our students will not only produce better results but also be able to rule the world. We are changing the common perception that all success student comes with a extraordinary capability of merit. Our objective is to provide excellent guidance to the outstanding student as well as guiding the ordinary student to upgrade them self up to a certain level. J.C. Institution has been formed with the joint collaboration between Professors of different engineering colleges and Industry Pioneers. We are committed to incessantly research, innovate and develop projects, products and protocols that are first of its kind in the market, absolutely safe and better than all existing products.</p>
</div>
<div class="footer">
  <p>&copy 2023 - Online Cinema Ticket Booking</p>
</div>

</body>
</html>