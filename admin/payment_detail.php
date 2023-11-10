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
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Online Movie Booking Admin</title>
	<!-- BOOTSTRAP STYLES-->
    <
        <!-- CUSTOM STYLES-->
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
  
<style>
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
   padding-left:50px;
   padding-right:50px;
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
     
           
          
    <div id ="container">
<div id="header">
<h1>Online Movie Ticket Booking </h1>
<div class="select">
<button><a href="logout.php" >Log out</a> </button>
</div>
</div>
        <!-- /. NAV TOP  -->
       <?php
		include("includes/menu.php");
		?>
     
                    
     <div id="main">  
 <h2>Payment Management System</h2>   	 
  <table>
			<tr>
			<th>Email</th>
			<th>Movie</th>
			<th>Price</th>
			<th>Date of Booking</th>
			<th>Movie Timing</th>
			</tr>
			<?php							
			$sql="SELECT * from payment join movie on payment.movie_id=movie.movie_id";
			$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
							$email=$row['email'];
							$movie_name=$row['movie_name'];
							$amount=$row['amount'];
							$dt=$row['dt'];
							$timing=$row['timing'];
							echo "<td>$email</td>";
							echo "<td>$movie_name</td>";
								echo "<td>Rs. $amount</td>";
							echo "<td>$dt</td>";
							echo "<td>$timing</td>";
							echo "</tr>";
							?>
							</tr>
							<?php
					
					}
		
		?>
		

</table>
                    

        </div>             
            
</body>
</html>
<?php
}
?>