<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eng">
<head>
	<title> Padlock, Show Love. </title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" type="text/css" href="./css/styles.css">
    <link rel="shortcut icon" sizes="128x128" href="./icns/pl.png">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
<style>
body {
    background-color: white;
    border: 1px solid black;  
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

#b1 {
  box-shadow: 0 9px #999;
  border-radius: 15px;
  border: none;
  outline: none;
}

#b1:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>	
</head>

<body class="w3-container w3-finger">

<div  class="main-wrapper  w3-center">	
<h1 class="w3-xxxlarge w3-card w3-teal"> Love messages</h1>
<h2 class="w3-xxlarge"> Padlocks found </h2>

	<header>
	<nav >
		<div class="grid-container" >
			<div class="item2">		
			<a class="btn" href="padlockPutDB.html" class="w3-large"> Padlock Screen -</a>	
			<a class="btn" href="plListrep2.php" class="w3-xlarge"> Search</a>	
			
			</div>
	</nav>
	</header>	

<br>
</div>
<?php
	$g_bridgeid = test_input($_GET["id"]);	
//if ($o == 0 ){ 
  //  echo "Please mark where you are, location not avalable at the moment";}
//else{
	//dev
	$con =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
	//ops 
	//$con=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
	or die ("unable to connect");
    // Check connection
    if ($con->connect_error){
	die("Connection failed: " . $con->connect_error);
    }
    $sql = "SELECT pcmName1, pcmLink, pcmName2, pcmlinktodate,  usrdate  FROM pcmessage
    where pcmBridgeId = '$g_bridgeid'";

	$result = $con->query($sql);
		if($result->num_rows < 1)
		{ 
		echo "No Padlocks here. Thank you for visiting.";
		echo " Use Search to find any available bridge with padlocks.";

		}
			else{
			//echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";	
			echo "<table  class='w3-table-all w3-hoverable w3-large'>
			<tr>
			<th>Name</th>
			<th></th> 
			<th>Name</th> 
			<th></th> 
			<th></th>			
			</tr>";
		    while($row = $result->fetch_assoc()) {
				    echo "<tr>";
				    echo '<td>' . $row['pcmName1'] . '</td>';
				    echo '<td>' . $row['pcmLink'] . '</td>';
				    echo "<td>" . $row['pcmName2'] . "</td>";
				    echo "<td>" . $row['pcmlinktodate'] . "</td>";
				    echo "<td>" . $row['usrdate'] . "</td>";
				    echo "</tr>";		        
					}
		echo "</table>";
			}
	$con->close();
//}
?>
<br>
<div>
<center>
<a class="w3-btn w3-xlarge" href="padlockPutDB.html" id="b1" > Exit</a><br><br>
</center>
</div>

</body>
</html>
<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>

