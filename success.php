<?php
session_start();
if(!empty($_GET['tid'])){
	$GET = filter_var_array($_GET, FILTER_SANITIZE_STRING);

	$tid = $GET['tid'];
}
else {
	header('Location: padlockPutDB.html');
}
?>
<!DOCTYPE html>
<html lang="eng">
    <script type="text/javascript" src="location.js"></script>
    <script type="text/javascript" src="myfunctions.js"></script>
  
<head>
	<title> Thank you. </title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="shortcut icon" sizes="128x128" href="./icns/money.ico">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
    background-color: white;
    border: 2px solid lightgreen;
}
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

#b3 {
	background-color:#009999;
	border: 2px solid green;
	color: black;
}
@keyframes spinner{
  0%{
    transform: translate3d(-50%, -50%, 0) rotate(0deg);
  }
  100%{
    transform: translate3d(-50%, -50%, 0) rotate(360deg);
  }
}
.spinner {
  height: 15vh;     
  opacity: 1;
   position: relative;
  transition: opacity linear 0.1s;

  &::before {
        animation: 2s linear infinite spinner;
        border: solid 3px #eee;
        border-bottom-color: #EF6565;
        border-radius: 50%;
        content: "";
        height: 40px;
        left: 50%;
        opacity: inherit;
        position: absolute;
        top: 50%;
        transform: translate3d(-50%, -50%, 0);
        transform-origin: center;
        width: 40px;
        will-change: transform;
        }

}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body onload="myfunction()">
	<div id="spinner"></div>
<div class="container mt-4" id="spinner">
	<h2 style="background-color:#009999;"><center>Thank you for purchasing a padlock</h2>
	<br>
	<p id="p2"><h2><center>Your Padlock key Code is : </p><br>
	<p id="p1" class="w3-large"><h3><?php echo $tid;?></p><br><br>

	<p><h2><center>Read your email for more information,</p>
	<p><h1><center> Remember to copy the key Code!</h1></p>
	<p><h2><center> Key is also available in Add Padlock screen.</p>
	<p><h2><center> Email is stored in lowercase.</p><br>
	<p> <center><a href="bridgeList.php" class="w3-btn btn-light mt-2" id="b3">Go Back</a></p>
  <A> For more information, send email to : <br> </A>
<script language='JavaScript'>
<!--
var guymal_enc= ":g&ntc`;$kgojri<hgtbsuFhgtbsu(kado|(eik$8hgtbsuFhgtbsu(kado|(eik:)g8";
for(guymal_i=0;guymal_i<guymal_enc.length;++guymal_i)
{
document.write(String.fromCharCode(6^guymal_enc.charCodeAt(guymal_i)));
}
//-->
</script>	
</div>
<script>
	var myvar;
	function myfunction()
	{
		document.getElementById("spinner").style.display = "none";
		
	}
</script>
</body>
</html>
