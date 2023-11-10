<?php
session_start();
include("includes/db_connection.php");
if( !isset($_SESSION['temp_user']) )
{
	header("location:check.php");
}
else
{
	 $email =  $_SESSION['temp_user'];
	 
	 $sql = "SELECT * FROM user_register WHERE email = '$email'";
				$result = mysqli_query($con,$sql);
				$rows=mysqli_fetch_array($result);
				$security=$rows['security_question'];
				$answer=$rows['security_answer'];
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
label {
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

 input[type=text], input[type=password] {
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

input:hover{
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
<section>

  <center>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
						  <label>Your Security Question is: <?php echo $security?></label>
						  <input type="text" id="txtEmail" name="ans" value="<?php if(isset($_POST["submit"])){echo $_POST['ans'];} ?>" placeholder="Answer">
						  <button name="submit">Proceed</button>
				</form>

 <center> <a href="forget_cancel.php"> Click Here </a> If you have not yet Register </center>
</center>
</section>
<br><br><br><br><br><br>
<br><br>

<!--<div class="footer">
  <p>&copy Online Movie Booking</p>
</div>-->

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
				 $answer = validate_input($_POST["ans"]);

		if(empty($answer))
			{
				echo "<script>alert('All Field Required');</script>";
			}
		else
			{
				$sql = "SELECT * FROM user_register WHERE security_answer = '$answer' and security_question='$security'";
				$result = mysqli_query($con,$sql);
				if (mysqli_num_rows($result) > 0)
				{
				header("location:forget3.php");
				}
				else 
				{
					echo "<script> alert('Your Login Name or Password is invalid');</script>";

				}
			}
}
?>
<?php
}
?>
