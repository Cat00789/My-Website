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
						 
						 <input type="text"  name="pwd" placeholder="Password">
						 
						 <input type="password" name="c_pwd"  placeholder="Confirm Password">
						  
						  <button name="submit">Reset</button>
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
				 $pwd = validate_input($_POST["pwd"]);
				 $c_pwd = validate_input($_POST["c_pwd"]);
				$pwdleng =strlen($pwd);
		if(empty($pwd) || empty($c_pwd))
			{
				echo "<script>alert('All Field Required');</script>";
			}
			if($pwd!=$c_pwd)
				{
					echo "<script> alert('Password didnot Match');</script>";
					return;
				}

				if($pwdleng < 6)
				{
					echo "<script> alert('Password should be More than 6 charecter');</script>";
					return;
				}
				else
					{
						$en_pwd=md5($pwd);
						$sql = "update user_register set password= '$en_pwd' where email='$email'";
						if(mysqli_query($con,$sql))
						{
						session_unset(); 
						session_destroy(); 
						echo "<script> alert('Your Password Has been reset');</script>";
						echo "<center><h2><a href='login.php'>click Here</a> to Go back to Login</h2></center>";
						}
	
					}
}
?>
<?php
}
?>