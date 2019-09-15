<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8" name= "Add Padlocks" content="my library 1.0" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Keywords" content="padlock, virtual, lock, lees, reading, book, books">
<meta name="Description" content="Add a virtual Padlock" >
<meta name="copyright" content="Copyright, 2018 NSauer">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Add a virtual padlock</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
<link rel="shortcut icon" sizes="128x128" href="./icns/pl.png">



<style>

body {
    background-color: white;
    border: 1px solid black;         
}
form {border: 3px solid white;
}
@media screen and (max-width: 300px) {
  span.psw{
    display: block;
    float: none;
  }
  .cancelbtn{
    width: 100%;
  }
};
.wrapper{
  grid-template-colums: 1fr 2fr 1fr
  display:grid;
  justify-items:centre;
  grid-row-gap:1em;
}

.wrapper > div{
  padding:1em;
  justify-items:centre;

}

.wrapper1{
  grid-template-colums: 1fr 2fr 1fr
  display:grid;
  justify-items:centre;
  grid-row-gap:1em;
}

.wrapper1 > div{
  padding:1em;
  justify-items:centre;

}
.wrapper2{
  grid-template-colums: 1fr 2fr 1fr
  display:grid;
  justify-items:centre;
  grid-row-gap:1em;
}

.wrapper2 > div{
  padding:1em;
  justify-items:centre;

}
#b1 {
  box-shadow: 0 9px #999;
  border-radius: 15px;
  border: none;
  outline: none;
}
#b1:hover {background-color: #3e8e41}

#b1:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
<style>
/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)} 
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)} 
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
#myDiv2 {
  display: none;
  text-align: center;
}
</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css"> 
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="https://js.stripe.com/v3"></script>

</head>
<body  background-color: #dcffcc;>
<center>
<h1 class="w3-xlarge w3-teal "> Love Padlock</h1>
</center>

<?php 
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  
?>

<div  class="main-wrapper  w3-center">
  <img src="padlock.jpg" width="75" height="45">
  <img src="padlock.jpg" width="75" height="45">
  <img src="padlock.jpg" width="75" height="45">
<h1 class="w3-xlarge " ><center>Add your Padlock here</center></h1>

<div class="wrapper1"> 

  <header>
  <nav >
    <div class="grid-container" >
      <div class="item2">   
  
      
      </div>
  </nav>
  </header>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

</script>


</div> 

<?php
$result = " ";
$bridgename = " ";
$id2  = test_input($_GET["id"]);
$_SESSION["bridgeid2"] = $id2;


if ($id2 == 0 ){ 
    echo "Please select a valid bridge, no bridge registered. Thanks you for visiting. ";}
else{

  //dev
  $conn =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
  //ops 
  //$conn=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
  or die ("unable to connect");
  
  $sql = "SELECT plbid,plbName FROM padlockbridge where plbid = $id2";
  $result = $conn->query($sql)
   or die("Could not read bridge row.. \n" . mysql_error());
   $row = mysqli_fetch_array($result);
    if($result->num_rows < 1)
    { 
    echo "No Bridge registered here. Thank you for visiting.";
    }
    else
    {
   if (is_numeric($id2))
    {
          $bridgename = $row['plbName'];
           $bridgeid = $row['plbid'];
    echo "<h3> Bridge name: ".  $bridgename . "</h3>";
   }
  }
}
?>
    <img src="padlock.jpg" width="75" height="45">

<div class="wrapper">
  <centre>
<form action="pladd.php" method="POST" onSubmit="window.location.reload()" id="form1" name="gymmy" >

<br><center>
  <input type="hidden"  name="bid" id="bidid"  value= <?php echo $bridgeid;?> >
<br><center>
  <input type="text" required name="Name1" id="Name1id" placeholder="Your Name" size="50rem" focus>
  <img src="padlock.jpg" width="50" height="25">
  <select name="link" size="1rem" required>
        <option value="love"> love </option>
        <option value="plus"> plus </option>
        <option value="iswith"> is with </option>
        <option value="likes"> likes </option>
        <option value="want"> want </option>
        <option value="met"> met </option>
  </select>
    <img src="padlock.jpg" width="50" height="25">
<br><br><input type="text" required name="Name2" id="name2id" width="2" placeholder="Another Name" size="50rem" > 
<br><br>
  <img src="padlock.jpg" width="50" height="25">
  <select name="linkdate" size="1rem">
        <option value="since"> since </option>
        <option value="on"> on </option>
  </select>
    <img src="padlock.jpg" width="50" height="25"><br><br>
   Date <input type="date" required name="bday">
   <br><br>

Padlock key <input type="text" required name="plkey" id="plkeyid" placeholder="Padlock key you bought (scroll down for reminder)" size="50rem">

<center>
<div class="g-recaptcha" data-sitekey="6LcMQ0gUAAAAAE68i8N9VRGeS3kz3FgPtfYT0UAX"></div>
<br><br><input type="submit" value="Add" class="w3-xxlarge w3-btn w3-centre" id="b1"   >
<input type="reset"  class="w3-xlarge w3-btn" id="b1"></input></td>
</center>

</form>

</div>
</form>

  <p>

<a href="https://stripe.com/gb/privacy" target="_blank">Stripe privacy policy </a>
<div id="#card-element">
 Buy your padlock key
 <button id="checkout-button" >Buy a padlock key</button>
<form action="./charge.php" method="POST" id="payment-Form1" value="pay me">    
  <script
    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
    data-key="pk_test_kcM9zRjme8jVEQbGlLfIaqlW"
    data-amount="174"
    data-name="xpens padlock"
    data-description="Charge for a Virtual padlock"
    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
    data-locale="auto"
    data-currency="gbp"
    data-zip-code="true">
  </script>
  <div id="card-errors" role="alert"></div>
  </div>
</form>
<br><br>
</div>

</p>
<div>
  <center>
<form action="plgetkey.php" method="POST" onSubmit="window.location.reload()" id="getkey" 
name="keykey">
Padlock key reminder <br>
<input type="email" required name="email1" id="email1id" placeholder=" Enter Your Email Address to find your key." size="50rem" class="large">
<br><br><input type="submit" value="Find" class="w3-xlarge w3-btn w3-centre" id="b1"   ></input>
<input type="reset"  class="w3-xlarge w3-btn" id="b1"></input></td>

</form>
</div>
<br>
<div>
<center>

<a class="w3-btn w3-xlarge" href="padlockPutDB.html" id="b1" > Exit</a>
<br><br>
<div class="sharethis-inline-share-buttons"></div>
</center>
</div>
</p>
<script>
  function init(){
   
  } 
</script>

</body>
<nav>
<div class="footer">
	<u1>
</li>
	</center>
<center><li>This app save to the cloud. On submitting, <a href="https://stripe.com/gb/privacy" target="_blank">terms & conditions</a> are deemed accepted.</li>	
	</u1>
	</div>
  </div>gmail
  <br>

	<p id="demo"></p>
</nav>
</head>
</html>