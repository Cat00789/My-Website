<div class="topnav" id="myTopnav">
 
  <a href="contact.php">Contact</a>
  
  <a href="about.php">About</a>
 <a href="login.php">Account</a>
   <a href="index.php">Home</a>

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
