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
<style>
select
{

  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  
  border-radius: 10px;
}
 .btn1 {
  background-color: #66ffff;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 50%;
  
  border-radius: 10px;
}

.btn1:hover {
	outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
 background-color:#00cccc;
 border-radius: 10px;
}


select:hover
{
  	outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
 background-color:#cccc;
 border-radius: 10px;

}
.btn
{
	width:200px;
}
td{
	 border-radius:10px;
  border: 1px;
  background-color:#fff;
  padding:10px;
  padding-left:50px;
   padding-right:50px;
   
}
th{
 padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color:#000;
  color: white;
  border-radius:10px;
}
table {
  border-collapse: collapse;
  width: 100%;
  
  -webkit-box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);
box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);
}

th {
  text-align: left;
}
</style>
</head>
<body>
<script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint');
       var popupWin = window.open('', '_blank', 'width=1360,height=650');
       popupWin.document.open();
       popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
            }
 </script>

<?php
include("includes/home_menu.php");

	   $query="select * from movie where status='1'";
	  $result=mysqli_query($con,$query);
		$rows=mysqli_fetch_array($result);
		$movie_name=$rows['movie_name'];
		$movie_id=$rows['movie_id'];

	 ?>
<section>
<form action="" method="post">
 <li> <select name="tm">
					<option value="">Select Timing</option>
					<option value="10.15 A.M">10.15 A.M</option>
					<option value="12.15 P.M">12.15 P.M</option>
					<option value="3.15 P.M">3.15 P.M</option>
					<option value="5.15 P.M">5.15 P.M</option>
					<option value="7.15 P.M">7.15 P.M</option>
				</select> </li>
				<li><button class="btn1" name="btn2">Fetch</button></li>
				</form>
				<?php
			if(isset($_POST["btn2"]))
			{
			$timing=$_POST['tm'];
			$sql2="SELECT * from payment where email='$email'";
			$result2=mysqli_query($con,$sql2);
			while($row3=mysqli_fetch_array($result2))
			{
			 $check=$row3['status'];
			 $movieid=$row3['movie_id'];
			 $tm=$row3['timing'];
 			if ($check=="1" and $movieid==$movie_id and $tm==$timing)
			{
			
			?>
 <input type="submit" class="btn" value="print" onClick="PrintDiv();" /></center>
<br><br>
 <div id="divToPrint">
<table>

			<tr>
			<th colspan="5"><center><h2><?php echo $movie_name?></center></h2></th>
			</tr>
			<tr>
			<?php
			$sql="SELECT name from user_register where email='$email'";
			$result1=mysqli_query($con,$sql);
					$row1=mysqli_fetch_array($result1);
					$name=$row1['name'];
			?>
			<td>Booking owner:</td>
			<td colspan="3"><?php echo $name;?></td>
			</tr>
			<?php
										
			$sql1="SELECT * from book JOIN seat on book.seat_id=seat.seat_id where email='$email' and book.timing='$timing'";
			$result1=mysqli_query($con,$sql1);
					while($row2=mysqli_fetch_array($result1))
					{
							$seat1=$row2['seat_type'];
							$seatno=$row2['seat_no'];
							$dat=$row2['dt'];
							$tm=$row2['timing'];
							?>
							<tr>
							<?php
							echo "<td><b>Ticket Type</b></td>";
							echo "<td><b>Seat Number</b></td>";
							echo "<td><b>Date</b></td>";
							echo "<td><b>Time</b></td>";
							echo "<tr>";
							echo "<td>$seat1</td>";
							echo "<td>$seatno</td>";
							echo "<td>$dat</td>";
							echo "<td>$tm</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td colspan='4'><hr></td>";
							echo "</tr>";
							?>
							</tr>
							<?php
					
					}
		
		?>
		

</table>

</div>
<?php
			}
			if ($check=="none" and $movieid==$movie_id and $tm==$timing)
			{
				header("location:booking_checking.php");
				
			}
			}
			}
				?>
</section>
<br><br><br><br><br><br>
<br><br>

<div class="footer">
  <p>&copy Online Movie Booking</p>
</div>

</body>
</html>
<?php
}
?>