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
	 <div class="btn-group1">
	 <font face="arial" size="5px" color="#21D159">Content Management System  </font> 
                    
                

         <button><a href="image_upload.php" >
 
                      Movie Poster Upload
                      </a></button>
                      </div>
                  
                     <div class="btn-group4">
                   
                        <button>   <a href="activate_movie.php" >

                     Image View/ Edit/ Delete</button>
                      </a>
                      </div>
                     
         
    </div>
	
</body>
</html>
<?php
}
?>