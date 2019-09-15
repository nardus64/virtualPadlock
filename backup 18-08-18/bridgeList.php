<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eng">
    <script type="text/javascript" src="location.js"></script>
<head>
	<title> The Xpens company app. Padlock, Show Love. </title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" sizes="128x128" href="./icns/money.ico">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

<style>
body {
    background-color: white;  
}

table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}

table, tr:nth-child(even){background-color: #f2f2f2;}
table, tr:hover {background-color: #ddd;}

</style>	
</head>

<body class="w3-container w3-finger">
<?php	
$longErr = ' ';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["graflo"])) {
    $longErr = "You must allow access to your location";
  } else {
    $name = test_input($_POST["graflo"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}  
?>
<script>
var maplat  = " ";
var maplon = " ";
<
</script>

<div  class="main-wrapper  w3-center">	
<h1 class="w3-jumbo w3-card w3-teal"> The Xpens collection</h1>
<h2 class="w3-xxxlarge"> Bridge list  </h2>

	<header>
	<nav >
		<div class="grid-container" >
			<div class="item2">		
			<a class="btn" href="https://xpens.co.uk/Default.html">Main menu</a>
			<a class="btn" href="padlockPutDB.html" class="w3-large"> Back</a>	
	
			
			</div>
	</nav>
	</header>	

<br>
</div>
<center>
	<p id="demo1" class="w3-xlarge w3-read w3-center"	>Where am I :-(?
  <div id="map" style="width:100%;height:400px;"></p>
    <br>
  	<button type="w3-button" id="testbut" name="markLo" onclick="getLocation();" class="w3-xxlarge w3-teal centre" autofocus >Allow access to your location</button><br>
  	<p id="plat" ></p> <p id="plon" ></p>
<p>
	<form action="bridgeList2.php" method="POST" type="button" style="cursor:pointer" name="histo"  class="w3-white"  id="form1a" >
	<input type="text" id="graflong" name="graflo" hidden>  <span class="error">* <?php echo $longErr;?></span> <br>
	<input type="text" id="graflat" name="grafla" hidden >

  	<button type="input w3-button" class="w3-xlarge w3-btn"> List Bridges near you</button><br>
  	</form>

<br>
<br>
<div>
<input type="button" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo">
</center>
</div>
</p>
</body>
</html>

