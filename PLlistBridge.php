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
    <link rel="shortcut icon" sizes="128x128" href="./icns/money.ico">
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
#b1 {
  background-color:#009999;
  border: 2px solid green;
  color: black;
}

#b1:hover {background-color: #3e8e41}

#b1:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}

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

</script>

<div  class="main-wrapper  w3-center">	
<h1 class="w3-xxlarge w3-card w3-teal"> Eternal love message.</h1>
<h2 class="w3-xxlarge"> Bridge list  </h2>

	<header hidden>
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
  <br>
	<p id="demo1" class="w3-xlarge w3-read"	>Where am I?</p>

  <div>
    <p>
    <br>
  	<button type="w3-button" id="b1" name="markLo" onclick="getLocation();" class="w3-xlarge w3-teal centre" autofocus >Allow access to your location</button><br>
  	<p id="plat" ></p> <p id="plon" >
      
    </p>
        <br>
    </div>
    <p align="center" id="mapholder" style="width:20%;height:100%;"></p>
  </p>


	<form action="PLlistbridge2.php" method="POST"  style="cursor:pointer" name="histo"  class="w3-white"  id="form1a" onSubmit="window.location.reload()">
	<input type="text" id="graflong" name="graflo" hidden>  <span class="error"> <?php echo $longErr;?></span> <br>
	<input type="text" id="graflat" name="grafla" hidden >

  <button type="input" class="w3-xlarge w3-btn" id="b1"> List Bridges near you</button><br>
  	</form>
</p>
</div>
<br>
<br>
<br>
<div align="center" >
<input type="button" id="b1" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo">
<a class="w3-xxlarge button w3-teal" id="b1" href="https://xpens.co.uk/padlock/padlockPutDB.html" hidden>Back</a>
</center>
</div>
</p>
</body>
</html>

