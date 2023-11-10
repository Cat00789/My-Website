<?php
ob_start();
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
		   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<li> 	<select name="tm">
					<option value="">Select Timing</option>
					<option value="10.15 A.M">10.15 A.M</option>
					<option value="12.15 P.M">12.15 P.M</option>
					<option value="3.15 P.M">3.15 P.M</option>
					<option value="5.15 P.M">5.15 P.M</option>
					<option value="7.15 P.M">7.15 P.M</option>
				</select>
		</li>
    </ul>
  </nav>
  
  <article>
  <center>
   
				<table>
				<tr>
				<td colspan="10"><center>Diamond (Rs. 400)</center><td>
				</tr>
				<tr>
				<?php
					 $sql = "SELECT * FROM seat where seat_allocate='3'";
										$result = mysqli_query($con, $sql);
										while($row=mysqli_fetch_array($result))
									{ 
										$s_id=$row["seat_id"];
										$s_no=$row["seat_no"];
										echo "<td><input type='checkbox' value='$s_id' name='diamond[]' class='chck'>$s_no</td>";
										}
				?>
				</tr>
				<tr>
				<td><br><td>
				</tr>
				<tr>
				<td><br><td>
				</tr>
				<tr>
				<td colspan="10"><center>GOLD (Rs. 350)</center><td>
				</tr>
				<tr>
				<?php
					 $sql = "SELECT * FROM seat where seat_allocate='2'";
										$result = mysqli_query($con, $sql);
										while($row=mysqli_fetch_array($result))
									{ 
										$s_id=$row["seat_id"];
										$s_no=$row["seat_no"];
										echo "<td><input type='checkbox' value='$s_id' name='gold[]' class='chck'>$s_no</td>";
										if($s_no==10)
										{
											echo "<tr></tr>";
										}
										}
				?>
				</tr>
				<tr>
				<td><br><td>
				</tr>
				<tr>
				<td colspan="10"><center>Standard (Rs. 150)</center><td>
				</tr>
				<tr>
				<?php
					 $sql = "SELECT * FROM seat where seat_allocate='1'";
										$result = mysqli_query($con, $sql);
										while($row=mysqli_fetch_array($result))
									{ 
										$s_id=$row["seat_id"];
										$s_no=$row["seat_no"];
										echo "<td><input type='checkbox' value='$s_id' name='standard[]' class='chck'>$s_no</td>";
										if($s_no==10)
										{
											echo "<tr></tr>";
										}
										if($s_no==20)
										{
											echo "<tr></tr>";
										}
										}
				?>
				</tr>		
				<tr>
				<td colspan="10" style="background-color:red;" height="20"><td>
				</tr>
				</table>
				 <button name="submit">Book</button>
			</form>
			</center>
  </article>
</section>
<br><br><br><br><br><br>
<br><br>

<div class="footer">
  <p>&copy 2023-- Online Cinema Ticket Booking</p>
</div>

</body>
</html>
<?php
if(isset($_POST["submit"]))
{


	function validate_input($data) 
		{
  			 $data = trim($data);
  			 $data = stripslashes($data);
   			$data = htmlspecialchars($data);
   			return $data;
		}
	$tm =validate_input( $_POST["tm"]);
	$pay='0';
	date_default_timezone_set("Asia/Calcutta");
	$dt_reg=date("M-D-Y");
if(empty($tm))
	{
		echo "<script> alert('All field required');</script>";
		return;
	}

	else
	{		
	$sql = "SELECT * FROM payment where email='$email' and status='none'";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						header("location:booking_checking.php");
			
					}
	else
	{
			$diapay=0;
			if(isset($_POST['diamond']))
			{
				$count=0;
				$rs=0;
				foreach($_POST['diamond'] as $diamond)
				{
				echo $diamond;
				$count++;
				$sql = "INSERT INTO book (email, movie_id, seat_id, dt, timing)VALUES ('$email', '$movie_id', '$diamond','$dt_reg','$tm')";
				$diapay=400*$count;
				if (mysqli_multi_query($con, $sql)) 
				{
					echo "New records created successfully";
					
				} 
				else 
				{
					echo "Error: " . $sql . "<br>" . mysqli_error($con);
				}
				
				echo $count."<br>";
				}
				
				
			}
			$goldpay=0;
			if(isset($_POST['gold'])) 
			{
				$count=0;
				$rs=0;
					foreach($_POST['gold'] as $gold)
					{
						echo $gold;
						$count++;
						$sql = "INSERT INTO book (email, movie_id, seat_id, dt, timing)VALUES ('$email', '$movie_id', '$gold','$dt_reg','$tm')";
						$goldpay=350*$count;
						if (mysqli_multi_query($con, $sql)) 
						{
							echo "New records created successfully";
			
						} 
						else 
						{
							echo "Error: " . $sql . "<br>" . mysqli_error($con);
						}
						
						echo $count."<br>";
					}
			}
			$stanpay=0;
			if(isset($_POST['standard']))
			{
				$count=0;
				$rs=0;
				
				foreach($_POST['standard'] as $standard){
					echo $standard;
						$count++;
						$sql = "INSERT INTO book (email, movie_id, seat_id, dt, timing)VALUES ('$email', '$movie_id', '$standard','$dt_reg','$tm')";
						$stanpay=150*$count;
						if (mysqli_multi_query($con, $sql)) 
						{
							echo "New records created successfully";
							
						} 
						else 
						{
							echo "Error: " . $sql . "<br>" . mysqli_error($con);
						}
						
						echo $count."<br>";
				}
			}
			echo $payment= $diapay+ $goldpay + $stanpay;
			$status="none";
			$sql = "INSERT INTO payment (email,movie_id, amount, dt, timing, status)VALUES ('$email', $movie_id,'$payment','$dt_reg','$tm','$status')";
						if (mysqli_multi_query($con, $sql)) 
						{
							header("location:booking_redirect.php");
						} 
						else 
						{
							echo "Error: " . $sql . "<br>" . mysqli_error($con);
						}
			
		}
	}
}
?>
<?php
}
?>