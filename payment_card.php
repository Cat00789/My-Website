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
	 $query="select * from movie where status='1'";
	  $result=mysqli_query($con,$query);
		$rows=mysqli_fetch_array($result);
		$movie_name=$rows['movie_name'];
		$movie_id=$rows['movie_id']
	 
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
.chck
{
	width:35px;
	height:35px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

input[type=password] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

select
{
	  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #ffff33;
  color: black;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
  border-radius:20px;
}

.btn:hover {
  background-color: #b3b300;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}


   </style>
</head>
<body>

<?php
include("includes/home_menu.php");
?>
 <form action="" method="post">
 <li> <select name="tm">
					<option value="">Select Timing</option>
					<option value="10.15 A.M">10.15 A.M</option>
					<option value="12.15 P.M">12.15 P.M</option>
					<option value="3.15 P.M">3.15 P.M</option>
					<option value="5.15 P.M">5.15 P.M</option>
					<option value="7.15 P.M">7.15 P.M</option>
				</select> </li>
				<li><button class="btn1" name="btn2">Fetch</button></li>
				</form>
<section>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
       <div class="row">
            <div class="col-50">
			<?php
			if(isset($_POST["btn2"]))
			{
			$timing=$_POST['tm'];
			$sql2="SELECT * from payment where email='$email'";
			$result2=mysqli_query($con,$sql2);
			while($row3=mysqli_fetch_array($result2))
			{
			 $check=$row3['status'];
			 $movieid=$row3['movie_id'];
			 $tm=$row3['timing'];
 			if ($check=="1" and $movieid==$movie_id and $tm==$timing)
			{
				header("location:complete_payment.php");
			}
			if ($check=="none" and $movieid==$movie_id and $tm==$timing)
			{
			?>
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" value="<?php if(isset($_POST["submit"])){echo $_POST['cardname'];} ?>" placeholder="John Dkhar">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" value="<?php if(isset($_POST["submit"])){echo $_POST['cardnumber'];} ?>" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <select id="expmonth" name="expmonth">
			<option value="">Select Exp Month</option>
			<option value="1">1 Jan</option>
			<option value="2">2 Feb</option>
			<option value="3">3 March</option>
			<option value="4">4 April</option>
			<option value="5">5 May</option>
			<option value="6">6 June</option>
			<option value="7">7 July</option>
			<option value="8">8 August</option>
			<option value="9">9 Sept</option>
			<option value="10">10 Oct</option>
			<option value="11">11 Nov</option>
			<option value="12">12 Dec</option>
			</select>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <select id="expyear" name="expyear">
				<option value="">Select Exp Year</option>
				<?php
				for ($i=2020;$i<=2032;$i++)
				{
					echo "<option>$i</option>";
				}
				?>
				</select>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="password" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
		  
        </div>

        <input type="submit" name="submit" value="Continue to checkout" class="btn">
		
      </form>
    </div>
  </div>
  <div class="col-25">
    <div class="container">
      <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
     <hr>
	 <?php
				date_default_timezone_set("Asia/Calcutta");
				$dt_reg=date("M-D-Y");
				$count=0;
					$sql = "SELECT * FROM payment where email='$email' and timing='$timing'";
										$result = mysqli_query($con, $sql);
										while($row=mysqli_fetch_array($result))
										{ 
										$amount=$row["amount"];
										}
										echo "<p>Total <span class='price' style='color:black'><b>Rs. $amount</b></span></p>";
		?>
            
    </div>
  </div>
</div>
<?php
			}
			}
			}
			?>
</section>
<br><br><br><br><br><br>
<br><br>

<div class="footer">
  <p>&copy  2023-- Online Cinema Ticket Booking</p>
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
	$cardname =validate_input( $_POST["cardname"]);
	$cardnumber =validate_input( $_POST["cardnumber"]);
	$expmonth =validate_input( $_POST["expmonth"]);
	$expyear =validate_input( $_POST["expyear"]);
	$cvv =validate_input( $_POST["cvv"]);
	$crdleng=strlen($cardnumber);
	$cvvleng=strlen($cvv);
	if(empty($cardname) || empty($cardnumber) || empty($expmonth) || empty($expyear) || empty($cvv))
	{
		echo "<script> alert('Fill All Necessary Field');</script>";
		return;
	}
	if($crdleng < 16 OR $crdleng > 16)
	{
		echo "<script> alert('Invalid Card Number');</script>";
	}
	if($cvvleng < 3 OR $cvvleng > 4)
	{
		echo "<script> alert('Invalid CVV');</script>";
	}

	if ( !preg_match ("/^[a-zA-Z\s]+$/",$cardname)) 
		{
			echo "<script> alert('Name must only contain letters and space!');</script>";
		}
	
	
	else
	{
			header("location:payment_redirect_loading_bank.php");

	}

		
}
?>
<?php
}
?>