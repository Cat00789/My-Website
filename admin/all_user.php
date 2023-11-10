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
       <?php
		include("includes/menu.php");
		?>
        <!-- /. NAV SIDE  -->
       <div id="main">  
                    
                  <font face="arial" size="5px" color="#21D159"> All User Details</font> 
               
				  
				<table>
			<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Address</th>
			<th>Date Of Reg</th>
			</tr>
			<?php							
			$sql="SELECT * from user_register";
			$result=mysqli_query($con,$sql);
					while($row=mysqli_fetch_array($result))
					{
							$email=$row['email'];
							$name=$row['name'];
							$phone=$row['phone'];
							$address=$row['address'];
							$dt=$row['dt'];

							echo "<td>$name</td>";
							echo "<td>$email</td>";
								echo "<td>$phone</td>";
							echo "<td>$address</td>";
							echo "<td>$dt</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td colspan='5'><hr></td>";
							echo "</tr>";
							?>
							</tr>
							<?php
					
					}
		
		?>
		

</table>
					   
     
       
              
                
        </div>
        </div>
          

   
</body>
</html>
<?php
}
?>