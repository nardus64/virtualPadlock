<?php
session_start();
$bridges=$bname=$long=$lat=$err=$sql="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
if(empty($_POST['bridgeName'])){
  $err = "bridge is empty";
}else{
  $bname =test_input($_POST['bridgeName']);
}

if(isset($_POST['graflo']))
  $long=(float)test_input($_POST["graflo"]);
if(isset($_POST['grafla']))
  $lat=(float)test_input($_POST['grafla']);

echo "string ". $err;
$sql = "INSERT INTO padlockbridge (plbLatitude , plbLongitude, plbName)
        VALUES ('$lat', '$long', '$bname') ";
if ($lat == 0 ){ 
   echo "Please mark where you are, location not available at the moment";}
else{
  //dev
  $conn =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16");
  //ops 
  //$conn=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16");
    // Check connection
  if ($conn->query($sql) === TRUE)
    {      
      echo "<h1><center> The bridge admin</h1>";
      echo "<h2><center> Personal padlock </h2>";       
      echo "<h2><center> Your new bridge was added to bridge: successfull</h2> " ;

    }
    else{
      echo("Error description: " . mysqli_error($conn));
      echo "<h1><center> The bridge admin</h1>";
      echo "<h2><center> Personal padlock </h2>";       
      echo "<h2><center> Your new bridge was not added to bridge list: NOT successfull</h2> " ;
    }
  }
}
?>
<!DOCTYPE html>
<html lang="eng">
    <script type="text/javascript" src="location.js"></script>
<head>
	<title> Padlock, Show Love. </title>
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
<h1 class="w3-xxxlarge w3-card w3-teal"> Eternal love Padlock.</h1>
<h2 class="w3-xxxlarge"> Add Bridge  </h2>

<br>
</div>
<div class="grid-container"  align="center" style="border:1px solid green">
	<p id="demo1" class="w3-large w3-read w3-center"	>Where am I?

  <div>
    <br>
  	<button type="w3-button" id="b1" name="markLo" onclick="getLocation();" class="w3-xxxlarge w3-btn" autofocus >Mark this Bridge</button><br>
  	<p id="plat" ></p> <p id="plon" ></p>
    </div><br>
    <p id="mapholder" style="width:20%;height:10%;"></p>
  </p>


	<form  method="POST"  style="cursor:pointer" name="bridges"  class="w3-white"  id="form1a" onSubmit="window.location.reload()">
    <fieldset><legend class="w3-large">Add the bridge</legend>
    <label class="w3-xxxlarge">
        <h4  class="w3-xxxlarge">Bridge Name</h4>
    <input type="text" id="brName" name="bridgeName" class="w3-text"  placeholder="Name this bridge" size=50pc>
    <br>
    <br>
	<input type="text" id="graflong" name="graflo" hidden>  <span class="error"> <?php echo $longErr;?></span> <br>
	<input type="text" id="graflat" name="grafla" hidden >
</label>

  <button type="input" class="w3-xxxlarge w3-btn" id="b1"> Add this bridge</button><br><br>
</fieldset>
  	</form>
</p>
</div>
<br>
<br>
<br>
<div align="center" >
  <div class="item22">
    <br><br>
    <form action="PLlogout.php" method="get">
    <button  class="w3-xxxlarge button w3-teal" > Logout </button>
    </form>
  </div>
  <br><br>
</center>
</div>
</p>
</body>
</html>

