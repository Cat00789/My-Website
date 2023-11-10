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
<h1>Add your information here........</h1>
</div>
<div class="footer">
  <p>&copy 2023 - Online Cinema Ticket Booking</p>
</div>

</body>
</html>