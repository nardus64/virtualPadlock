<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" name= "Padlocks" content="padlocks 1.0" >
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="Keywords" content="bridge, lock, locks, locks on bridge, padlock, padlocks">
<meta name="Description" content="Help keeping track of books read" >
<meta name="copyright" content="Copyright, 2018 NSauer">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title> Add a padlock</title>
    <link rel="shortcut icon" sizes="128x128" href="./icns/gym.ico">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">



<style>

body {
    background-color: white;        
}
form {border: 3px solid #659960;
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
</style>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css"> 
</head>

<body background-color: #dcffcc;>
<center>
<div  class="main-wrapper">  
<h1 class="w3-jumbo w3-teal "> The Xpens collection</h1>
<h2 class="w3-xxxlarge"> Virtual Padlock on a bridge </h2>
  <?php echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>'; 
   $g_bridgeid  = $_SESSION["bridgeid"];
    ?>
</center>

<script>
function librarylogin()
{

}
 </script> 

<div class="wrapper">
<h1 class="w3-xxlarge w3-teal" ><center>Add your Padlock</center></h1>
<div class="wrapper1"> 
<button disabled hidden onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>


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
<div class="wrapper">
  <centre>
<form action="padlockadd.php" method="POST" onSubmit="window.location.reload()" id="form1" name="gymmy" >
<br><center>Bridge id : <input type="text" name="bid" id="bidid" placeholder="bridge" size="50rem" center 
  value="<?php echo $g_bridgeid;?>">
<br><center>Your padlock key code <input type="text" name="keycode1" id="plkeycode" placeholder="key code" size="50rem" center>
<br><center>Your Name <input type="text" name="Name1" id="plName1" placeholder="Your" size="50rem">
  <br><br>
    select a link
  <select name="link">
        <option value="plus"> loves </option>
        <option value="love"> + </option>
        <option value="is with"> is with </option>
        <option value="likes"> likes </option>
        <option value="want"> want </option>
        <option value="met"> met </option>
      </select><br> <br> 
  <br><center>Name <input type="text" name="Name2" id="plName2" placeholder="Another name" size="50rem">

<br><br><input type="submit" value="Add" class="w3-xxlarge w3-btn w3-centre" id="saveMyData"   >
<br><br><input type="reset"  class="w3-xlarge w3-btn" ></input></td>
</center>
</form>


</center>
</div>
<center>padlocks found: <input type ='text' name="extotal" id="total" size=10% disabled 
class="fontAmt"><br></center><br>
<center><button type= "button" onclick="emaillocal()" disabled hidden >Email list  </button><br>

<p class="w3-center">
<form action="libtoreadReports.php" method="get" type="button" style="cursor:pointer" name="histo"
 class="w3-container" id="form2" name="listy">
<button type="input w3-button" class="w3-xlarge w3-btn"> list Padlocks</button><br><br>
</form>
</p>
<button type="w3-button" value="Finish" class="w3-xxlarge cancelbtn" 
	onClick="history.go(-1);return true;">Exit</button>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-84659766-1', 'auto');
  ga('send', 'pageview');
  function init(){
    
  }
</script>
</body>
<nav>
<div class="footer">
	<u1>
</li>
	</center>
<center><li>This app save to the cloud.</li>	
	</u1>
	</div>
	<p id="demo"></p>
</nav>
</head>