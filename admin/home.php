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
    <title>Online Movie Booking | Admin</title>
	
    <link href="assets/css/style.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
  
</head>
<body>
   
   <body>
<div id ="container">
<div id="header">
<h1>Online Movie Ticket Booking </h1>
<div class="select">
<button><a href="#" >Log out</a> </button>
</div>
</div>
        <!-- /. NAV TOP  -->
        <?php
		include("includes/menu.php");
		?>
       <div id="content">
<div id="main">
<div class="btn-group1">
<font face="arial" size="5px" color="#21D159">Dashboard</font>
<button><a href="payment_detail.php">Payment Static</a></button>
</div>
<div class="btn-group2">

<button><a href="user_complaint.php">User Complaint</a></button>
</div>


<div class="btn-group4">

<button><a href="admin_MS.php">Setting</a></button>
</div>


</div>
    
   
   
</body>
</html>
<?php
}
?>