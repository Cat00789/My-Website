<?php
session_start();
include("includes/db_connection.php");
if( !isset($_SESSION['login_user']) )
{
	header("location:check.php");
}
else
{
	 $session_name =  $_SESSION['login_user'];
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
  position: relative;
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
include("includes/home_menu.php");
	   $query="select * from movie where status='1'";
	  $result=mysqli_query($con,$query);
		$rows=mysqli_fetch_array($result);
		$movie_name=$rows['movie_name'];
		$movie_id=$rows['movie_id'];
		$movie_path=$rows['movie_path'];
		$movie_des=$rows['movie_des'];
	 ?>
<div class="container">
  <img src="<?php echo "admin/uploads/$movie_path"?>" alt="Snow" style="width:100%;">
  <div class="centered">
  
 <h1>Now Showing</h1>
  <h1><?php echo "$movie_name";?></h1>

  </div>
</div>

<section>
  <nav>
    <ul>
      <li><a href="#">Facebook</a></li><br>
      <li><a href="#">Instagram</a></li><br>
      <li><a href="#">Twitter</a></li>
    </ul>
  </nav>
  
  <article>
      <h1>On screen Now <?php echo "$movie_name";?></h1>
	  <table>
	  <tr>
	  <td>
	  <?php
	   $sql="select * from video_url where video_name='$movie_name'";
	  $result1=mysqli_query($con,$sql);
		$row1=mysqli_fetch_array($result1);
		$video_url=$row1['video_url'];
	 ?>
    <iframe width="420" height="250"src="https://www.youtube.com/embed/<?php echo $video_url;?>">
</iframe></td>
<td>
<?php echo $movie_des;?>
<h1>Hurry <a href="booking.php">Click Here</a> to Book your show</h1>
</td>
</tr>
</table>
  </article>
</section>
<br><br><br><br><br><br>
<br><br><br><br><br><br>

<div class="footer">
  <p>&copy 2023 - Online Cinema Ticket Booking</p>
</div>

</body>
</html>
<?php
}
?>