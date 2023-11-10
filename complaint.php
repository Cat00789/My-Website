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
select {
  width: 80%;
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

 textarea {
  width: 80%;
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

textarea:hover{
outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
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

 </nav>

<article>
<center><h1><u>Complaint Form</u></h1></center>

<center>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<select name="topic">
				<option value="">Select Complaint Topic</option>
				<option value="Seat Cancellation">Seat Cancellation </option>
				<option value="Seat refund">Seat refund</option>
				<option value="Payment Problem">Payment Problem</option>
				<option value="Seat Allocated Problem">Seat Allocated Problem</option>
				<option value="Cinema Service Problem">Cinema Service Problem</option>
				<option value="Others">Others</option>
				</select>
				 <textarea name="reason" Placeholder="Reason"></textarea>
				 <button name="submit">Send</button>
			</form>

</center>
</article>
</section>
<br><br><br><br><br><br>
<br><br>

<div class="footer">
  <p>&copy 2023 Online Cinema Ticket Booking</p>
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
	$topic =validate_input( $_POST["topic"]);
	$reason =validate_input( $_POST["reason"]);
	date_default_timezone_set("Asia/Calcutta");
	$dt_reg=date("M-D-Y h:i:sa");
if(empty($topic) || empty($reason))
	{
		echo "<script> alert('All field required');</script>";
		return;
	}
	
	else
	{
				
						$sql = "INSERT INTO complaint (email,topic,reason,dt_complaint) VALUES ('$email','$topic','$reason','$dt_reg')";
							if (mysqli_query($con, $sql))
								{
									echo "<script> alert('Successful Save');</script>";
								} 
							else 
								{
									echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
								}

	}

		
}
?>



<?php
}
?>