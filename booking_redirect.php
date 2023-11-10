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
<!DOCTYPE html>
<html lang="en">
<head>
<title>Online Movie Booking</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="menu.css">
<link rel="stylesheet" href="forminput.css">
<style>
.chck
{
	width:35px;
	height:35px;
}
select
{

  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  
  border-radius: 50px 0px 50px 0px;
-moz-border-radius: 50px 0px 50px 0px;
-webkit-border-radius: 50px 0px 50px 0px;
border: 1px solid #000000;
}

select:hover
{
  	outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
 background-color:#cccc;
 border-radius: 50px 0px 50px 0px;
-moz-border-radius: 50px 0px 50px 0px;
-webkit-border-radius: 50px 0px 50px 0px;
border: 1px solid #000000;
}

   button {
  background-color: #66ffff;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  
  border-radius: 50px 0px 50px 0px;
-moz-border-radius: 50px 0px 50px 0px;
-webkit-border-radius: 50px 0px 50px 0px;
border: 1px solid #000000;
}

button:hover {
	outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
 background-color:#00cccc;
 border-radius: 50px 0px 50px 0px;
-moz-border-radius: 50px 0px 50px 0px;
-webkit-border-radius: 50px 0px 50px 0px;
border: 1px solid #000000;
}

   </style>
</head>
<body>

<?php
include("includes/home_menu.php");
?>
<section>
				<nav>
    <ul>

	
      <li>Now On screen Showing <h1>
	  <?php
	   $query="select * from movie where status='1'";
	  $result=mysqli_query($con,$query);
		$rows=mysqli_fetch_array($result);
		echo $rows['movie_name'];
		$movie_id=$rows['movie_id'];

	 ?>
	  
	  
	  </h1></li>
		<li>  <img src="images/jawan.jpg" width="250"></li>
		    </ul>
  </nav>
  
  <article>
  <center>
   
				<table>
				<tr>
				<td colspan="10"><center>Complete your payment</center><td>
				</tr>
				<tr>
				<td>
				<br>
				<br>
				</td>
				</tr>
				<tr>
				<?php
				date_default_timezone_set("Asia/Calcutta");
				$dt_reg=date("M-D-Y");
				$count=0;
					 $sql = "SELECT * FROM payment where email='$email' && movie_id='$movie_id' && dt='$dt_reg' ";
										$result = mysqli_query($con, $sql);
										while($row=mysqli_fetch_array($result))
										{ 
										$amount=$row["amount"];
										}
										echo "<td colspan='4'><b>Total to be paid: Rs.$amount</b></td>";
										
				?>
				</tr>
				<tr>
				</table>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				 <button name="submit">Proceed to Payment</button>
			</form>
			</center>
  </article>
</section>
<br><br><br><br><br><br>
<br><br>

<div class="footer">
  <p>&copy Online Movie Booking</p>
</div>

</body>
</html>
<?php
if(isset($_POST["submit"]))
{
header("location:payment_card.php");
}
?>
<?php
}
?>