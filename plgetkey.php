<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eng">
 <head>
	<title>Padlock, Show Love. </title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">

    <link rel="shortcut icon" sizes="128x128" href="./icns/pl.png">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">

<style>
body {
    background-color: white;  
}
#b1 {
  background-color:#009999;
  color: black;
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

<div class="container"  align="center" style="border:1px solid green">	
<h1 class="w3-xxlarge w3-card w3-teal"> Padlock key</h1>
<h2 class="w3-xxlarge">List of keys available</h2>

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

<?php
$ol= $string = " ";
$o = test_input($_POST["email1"]);
$c1 = "<h3>No unused Keys registered for this address.</h3>";
$c2 = " <h3>Hint. Type the address and retry.</h3>";
 echo "<br> Email entered: " . $o;
$ol = strtolower($o);
if ($o == ' ' ){ 
   echo "<p class='w3-red w3-xlarge'>Invalid email entered.";}
else{
	//dev
	$con =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
	//ops 
	//$con=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
	or die ("unable to connect");
    // Check connection
    if ($con->connect_error){
	die("Connection failed: " . $con->connect_error);
    } 
    $sql = "SELECT pcid,pcStripeCode,pcUsed, pcemail, pcAdded FROM padlockcodes where pcUsed  = 'N'";
	$result = $con->query($sql);
	if($result !== false){
		if($result->num_rows == 0)
		{ 
		echo($c1);		
		echo($c2); 
		}
			else{ 				
			//echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";
			echo "<table  class='w3-table-all w3-hoverable w3-xlarge'>
			<tr>			
			<th>Key code</th> 
			<th>Key date</th> 
			</tr>";
		    while($row = $result->fetch_assoc()) {
		    	$rowEmail = $row['pcemail'];
		    	if (PASSWORD_VERIFY($ol,$rowEmail)){
				    echo "<tr>";
				    echo "<td>" . $row['pcStripeCode'] . "</td>";
				    echo "<td>" . $row['pcAdded'] . "</td>";
				    echo "</tr>";}		        
					}
		echo "</table>";}
			
		} else {echo($c1);	}
	$con->close();
}

?>
<center>
<br>
<br>
<div allign = "center">
<input type="button" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo" id="b1"><br><br>
</center>
</div>
</body>
</html>

