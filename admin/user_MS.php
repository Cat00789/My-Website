<?php
session_start();
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
                    
                  <font face="arial" size="5px" color="#21D159">   User Management System </font> 
                   <div class="btn-group1">
                        <button>
                           <a href="all_user.php" >

                      View User Detail
                      </a></button> 
                      </div>
              
                     
               
                    

                  <div class="btn-group4">
                      
                          <button> <a href="edit_user.php" >

                     User Edit
                      </a></button>
                      </div>
                     
                     
                  
     
       
                 </div>
                 
      
		 
          


    
   
</body>
</html>
<?php
}
?>