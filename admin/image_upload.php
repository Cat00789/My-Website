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
   
   
   select {
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
   
   
   
   input[type=text], input[type=file] {
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

 textarea {
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

textarea:hover{
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
                    
                  
              <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
				 <input type="text" name="name" value="<?php if(isset($_POST["submit"])){echo $_POST['name'];} ?>" placeholder="Name of the Movie">
				 <textarea name="des" value="<?php if(isset($_POST["submit"])){echo $_POST['des'];} ?>" Placeholder="Enter Movie Describtion"></textarea>
				<input type="file" name="Filename"  id="Filename">
				 <input type="text" name="dt" value="<?php if(isset($_POST["submit"])){echo $_POST['dt'];} ?>" placeholder="date of release">
								<button value="Upload Image" name="submit">Upload</button>
			</form>
                 <!-- /. ROW  -->           
   

   </div>

</body>
</html>

<?php
if(isset($_POST["submit"]))
	{
		$target = "uploads/";
		$target = $target . basename( $_FILES['Filename']['name']);

			function validate_input($data) 
						{
							  $data = trim($data);
							  $data = stripslashes($data);
							  $data = htmlspecialchars($data);
							  
							  return $data;
						}


							$Filename=validate_input(basename( $_FILES['Filename']['name']));
							$name=validate_input($_POST['name']);
							$Des=validate_input($_POST['des']);
							$dt=validate_input($_POST['dt']);
							$status="none";

			if(empty($name) || empty($Des) || empty($dt) || empty($status))
				{
							echo "<script> alert('All Field are required');</script>";
				}
			else
				{
					$descript = mysqli_real_escape_string($con, $Des);
				if(move_uploaded_file($_FILES['Filename']['tmp_name'], $target)) 
					{
							$sql = "INSERT INTO movie (movie_name,movie_des,movie_path,movie_release,status)VALUES ('$name','$descript','$Filename','$dt','$status')" ;
							if (mysqli_query($con, $sql)) 
								{
										echo "<script> alert('Successfully Upload');</script>";
								}
								else
								{
									echo mysqli_error($con);
								}


					}
				else 
					{
						echo "<script> alert('Sorry, there was a problem uploading your file.');</script>";
					}
				}
	}

?>
<?php
}
?>
