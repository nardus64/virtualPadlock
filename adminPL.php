<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<script> 
var x = document.getElementById("demo");

</script>
<head>
<title> Virtual padlock app admin.
    <link rel="shortcut icon" sizes="128x128" href="./icns/money.ico">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
</title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" type="text/css" href="adminstyle.css">
<style>
body {
    background-color: white;  text-align: "center";
    padding: 20px;
    border: 2px solid green; 
}
</style>
</head>
<body class="w3-container w3-finger";>
<center>
<div  class="main-wrapper">
<h1 class="w3-jumbo w3-teal"> The Virtual padlock app</h1>
<h2 class="w3-xxxlarge"> Administration </h2>

<br> <text id="loginCheck"></text>
<br>
<div class="grid-container2">

<section>
	<div class="item21">
	<?php
	$longErr=' ';
	if(isset($_SESSION['bookid'])){
	echo 'You are logged in. <br>';
	}
	else {
		echo 'You are Not logged in.<br>';
	}
	
	?>

	<form action="PLAddBridge.php" method="get">
	<button class="btn  w3-jumbo" > Add a Bridge </button>
	</form>
	
	
	<br><br><br>
	</form>
	</div>

	<div class="item22">
		<form action="PLlistbridge2.php" method="get">
		<button class="btn  w3-jumbo"> List bridges </button>
		</form>
	
	<br><br><br><br>
	
	</div>

	<div class="item22">
		<form action="PLlogout.php" method="get">
		<button class="btn  w3-jumbo"> Logout </button>
		</form>
	<br>	
	<br>
	
 </div>


</section>
</center>

</body>

<footer>
	<p id="demo"></p>
</footer>
</html>
