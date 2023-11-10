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
     
   
    <style>

	
  select{
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 50px 0px 50px 0px;
-moz-border-radius: 50px 0px 50px 0px;
-webkit-border-radius: 50px 0px 50px 0px;
border: 1px solid #000000;
}

select:hover{
outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
}


   button {
  background-color: #66ffff;
  padding: 14px 20px;
  margin: 2px 0;
  border: none;
  cursor: pointer;
  
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
        <div id="main">  
                    
                  <font face="arial" size="5px" color="#21D159"> Movie Editor</font>  
                 
				 <form action="" method="post">
				 <select name="act">
				 <option value="">Select Movie</option>
				 <?php
				    $query="select * from movie where status='none'";
					  $result=mysqli_query($con,$query);
						while($rows=mysqli_fetch_array($result))
						{
						$movie_id=$rows['movie_id'];
						$movie_name=$rows['movie_name'];
						$movie_re=$rows['movie_release'];
						echo "<option value='$movie_id'>$movie_name Release On $movie_re</option>";
						}
		 
				 ?>
				 </select>
					<button name="submit">Activate Movie</button>
				</form>
				<a href="movie_remove.php"><button name="submit">Remove Movie</button></a>
              
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
							$act=validate_input($_POST['act']);

			if(empty($act))
				{
							echo "<script> alert('Select a Movie');</script>";
				}
			else
				{
					 $query="select * from movie where status='1'";
					  $result=mysqli_query($con,$query);
						$rows=mysqli_fetch_array($result);
	
						$status=$rows['status'];
						if($status=='1')
						{
							echo "<script> alert('Please Remove a Current Movie From Now Showing');</script>";
						}			
					else
					{	

							
							$sql = "update movie set status='1' where movie_id='$movie_id'" ;
							if (mysqli_query($con, $sql)) 
								{
									echo "<script> alert('Movie Activate');</script>";
									
								}

							else 
								{
									echo "<script> alert('Check if the field contain any special charecter');</script>";
									echo mysqli_error($con);
								}
					}			
				}
	}

?>
<?php
}
?>
