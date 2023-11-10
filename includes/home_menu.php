<div class="topnav" id="myTopnav">
  <a href="home.php">Home</a>
  <a href="booking.php">Booking</a>
  <a href="status.php">Status</a>
  <a href="complaint.php">Complaint</a>
  <a href="logout.php">Logout</a>
  <a href="javascript:void(0);" class="icon" onclick="myFunction()">
    <i class="fa fa-bars"></i>
  </a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>
