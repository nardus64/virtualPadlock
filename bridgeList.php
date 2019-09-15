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
<link rel="stylesheet" type="/css" href="styles.css">
    <link rel="shortcut icon" sizes="300x300" href="./icns/pl.png">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

<style>
body {
    background-color: white; 
      border: 2px solid green; 
}
#mapholder {
  height: 100%;
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

#b1, #b2, #b3,b4 {background-color:#009999;
  color: black;
  box-shadow: 0 9px #999;
  border-radius: 15px;
  border: none;
  outline: none;}
#b1, #b2, #b3, b4:hover {background-color: #3e8e42}
#b1, #b2, #b3, b4:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);}

table, tr:nth-child(even){background-color: #f2f2f2;}
table, tr:hover {background-color: #ddd;}

</style>	
</head>

<body>
<div class="w3-container w3-finger w3-border w3-border-green">
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

</script>

<div  class="main-wrapper  w3-center">	
<h1 class="w3-xxlarge w3-card w3-teal"> Love Padlock.</h1>
<h2 class="w3-xxlarge"> Bridge list  </h2>

	<header >
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
<div class="container"  align="center" style="border:1px solid green">
  <div id="demo1" class="w3-large w3-read w3-center w3-pale-red w3-border">Where am I?
  <p id="mapholder" name="mapholdera" class="w3-pale-red "> Press "Allow access to your location" or go Back!</p>
</div>
     <div>
      <br>
    	<button type="w3-button" id="b1" name="markLo" onclick="getLocation();" class="w3-xlarge w3-teal centre" autofocus >Allow access to your location</button><br>
    	<p id="plat" ></p> <p id="plon" > </p><br>
     </div>

  </p>

<div>
	<form action="bridgeList2.php" method="POST"   name="histo"  class="w3-white"  id="form1a" onSubmit="window.location.reload()">
	<input type="text" id="graflong" name="graflo" hidden>  <span class="error"> <?php echo $longErr;?></span> <br>
	<input type="text" id="graflat" name="grafla" hidden >
  
  <button type="input" class="w3-xlarge w3-teal  w3-btn" id="b3" name="hidebtn" disabled style="cursor:pointer"> List Bridges near you</button><br>

  	</form>
  </div>
</p>
<p>
    <form action="bridgeList3.php" method="POST"  name="histo"  class="w3-white"  id="form1a" onSubmit="window.location.reload()"><br>
  <button type="input" class="w3-xlarge w3-teal  w3-btn" id="b2" disabled style="cursor:pointer"> List All Bridges</button><br>
    </form>

</p>
</div>
<br>
<br>
<br>
<div align="center" >
<input type="button" id="b1" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo w3-teal ">
<a class="w3-xxlarge button w3-teal" id="b4" href="https://xpens.co.uk/padlock/padlockPutDB.html" hidden>Back</a>
</center>
</div>
</p>
</body>
</html>

