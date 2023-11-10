<?php
include("includes/db_connection.php");
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
include("includes/menu.php");
?>
<section>

<center>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
				<input type="text" name="name" value="<?php if(isset($_POST["submit"])){echo $_POST['name'];} ?>" placeholder="Name">
				 <input type="text" id="txtEmail" name="email" value="<?php if(isset($_POST["submit"])){echo $_POST['email'];} ?>" onblur="checkEmail()" placeholder="Email">
				 <input type="text" id="txtmobile" name="phone" value="<?php if(isset($_POST["submit"])){echo $_POST['phone'];} ?>" onblur="mobile()" placeholder="Mobile"> 
				  <input type="password" name="pwd" placeholder="Password">
				   <input type="password" name="c_pwd" placeholder="Confirm Password">
				   	<textarea name="address" Placeholder="Address"><?php if(isset($_POST["submit"])){echo $_POST['address'];} ?> </textarea>
				    <input type="text" name="qst" value="<?php if(isset($_POST["submit"])){echo $_POST['qst'];} ?>" placeholder="Enter Your Security Question?">
				   <input type="text" name="ans" value="<?php if(isset($_POST["submit"])){echo $_POST['ans'];} ?>" placeholder="Your Security Answer">
				
				 <button name="submit">Register</button>
			</form>

</center>
 <center> <a href="login.php"> Click Here </a> If already Register </center>

</section>
<br><br><br><br><br><br>
<br><br>

<div class="footer">
  <p>&copy Online Movie Booking</p>
</div>

</body>
</html>

 <script>
function checkEmail() 
{

    var email = document.getElementById('txtEmail');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
	document.getElementById("txtEmail").value = "";
	document.getElementById('txtEmail').style.border ="1px solid red";
    email.focus;
    return false;
 }
}
</script>

 <script>
function mobile() 
{

    var email = document.getElementById('txtmobile');
    var filter = /^([0-9])/;
    if (!filter.test(email.value)) {
    alert('Please provide a valid Mobile Number');
	document.getElementById("txtmobile").value = "";
	document.getElementById('txtmobile').style.border ="1px solid red";
    email.focus;
    return false;
 }
}
</script>
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
	$name =validate_input( $_POST["name"]);
	$email =validate_input( $_POST["email"]);
	$phone =validate_input( $_POST["phone"]);
	$pwd =validate_input( $_POST["pwd"]);
	$c_pwd =validate_input( $_POST["c_pwd"]);
	$address=validate_input( $_POST["address"]);
	$question =validate_input( $_POST["qst"]);
	$answer=validate_input( $_POST["ans"]);
	$status="1";
	$pwdleng =strlen($pwd);
	date_default_timezone_set("Asia/Calcutta");
	$dt_reg=date("M-D-Y h:i:sa");
if(empty($name) || empty($email)|| empty($phone) || empty($pwd) || empty($c_pwd) || empty($address) || empty($question) || empty($answer))
	{
		echo "<script> alert('All field required');</script>";
		return;
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
		 $sql = "SELECT * FROM user_register where email='$email' || phone='$phone'";
					$result = mysqli_query($con, $sql);
					if (mysqli_num_rows($result) > 0) 
					{
						echo "<script> alert('Email or Phone Already Exsist');</script>";
			
					}	
					else	
					{			
						$en_pwd=md5($pwd);				
						$sql = "INSERT INTO user_register (name,email,phone,password,address,security_question,security_answer,dt,status) VALUES ('$name','$email','$phone','$en_pwd','$address','$question', '$answer','$dt_reg','$status')";
							if (mysqli_query($con, $sql))
								{
									echo "<script> alert('Successful created, Goto Login From Account Menu');</script>";
								} 
							else 
								{
									//echo "<script> alert('Check if the field contain special charecter, or contact an administrator');</script>";
									echo mysqli_error($con);
									return;
								}
		
					}
	}

		
}
?>