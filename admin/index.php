﻿<?php
session_start();
include("includes/db_connection.php");

?>
<html>
<head>
<title>Online Movie Booking || Admin Login
</title>
<style>
body{
	background-color:#fff;
}
.container1
{
	padding-left:500px;
	padding-right:500px;
	padding-top:100px;
}
input[type=text], input[type=password] {
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

input:hover{
outline: none;
    border-color: #9ecaed;
    box-shadow: 0 0 10px #9ecaed;
}

/* Set a style for all buttons */
button {
  background-color: #66ffff;
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

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
}


.container {
  padding: 16px;
  border:double;
border-radius: 50px 0px 50px 0px;
-moz-border-radius: 50px 0px 50px 0px;
-webkit-border-radius: 50px 0px 50px 0px;
border: 1px solid #000000;

-webkit-box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);
-moz-box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);
box-shadow: 10px 10px 16px -8px rgba(0,0,0,0.75);

}



</style>
</head>
<body>
<div class="container1">
<center><h1>Admin Login</h1></center>

   <form  method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

    <div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" value="<?php if(isset($_POST["btn_login"])){echo $_POST['uname'];} ?>" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="btn_login">Login</button>
    </div>
  </form>
  
</div>
</body>
</html>

<?php
if(isset($_POST["btn_login"]))
{

		function validate_input($data) 
			{
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
			}
				 $username = validate_input($_POST["uname"]);
				 $password = validate_input($_POST["psw"]);

		if(empty($username) || empty($password))
			{
				echo "<script>alert('All Field Required');</script>";
			}
		else
			{
				$sql = "SELECT * FROM admin_credential WHERE admin_username = '$username' and admin_password = '$password'";
				$result = mysqli_query($con,$sql);
				if (mysqli_num_rows($result) > 0)
				{
					$_SESSION['login_user'] = $username;
					header("location: home.php");
				}
				else 
				{
					 echo "<script> alert('Your Login Name or Password is invalid');</script>";
				}
			}
}
?>


