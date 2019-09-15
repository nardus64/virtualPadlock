<?php
session_start();
?>
<!DOCTYPE html>
<html lang="eng">
<head>
	<title> The Xpens company app. Show Love. </title>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" type="text/css" href="style.css">
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

<div  class="main-wrapper  w3-center">	
<h1 class="w3-jumbo w3-card w3-teal"> The Xpens collection</h1>
<h2 class="w3-xxxlarge"> Bridge list  </h2>

	<header>
	<nav >
		<div class="grid-container" >
			<div class="item2">		
			<a class="btn" href="https://xpens.co.uk/Default.html">Main menu</a>
			<a class="btn" href="padlockPutDB.html" class="w3-large"> Back</a>	
			<a class="btn" href="padlockPutDB.html" class="w3-large"> Search</a>	
			
			</div>
	</nav>
	</header>	

<br>
</div>
<?php

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
	die("Connection failed: " . $conn->connect_error);
    }
//	$g_userid 	= $_SESSION["bookid"];
    // assign lattitude and longitude from $_SESSION[]
    // ADD A 1000M radius range
    $sql = "SELECT plbid,plbName FROM padlockbridge";

	$result = $con->query($sql);
		if($result->num_rows < 1)
		{ 
		echo "No Bridge registered here. Thank you for visiting.";
		echo " Use Search to find any available bridge.";

		}
			else{
			//echo "<p><b>View All</b> | <a href='view-paginated.php?page=1'>View Paginated</a></p>";	
			echo "<table  class='w3-table-all w3-hoverable w3-xlarge'>
			<tr>
			<th>ID</th>
			<th>Bridge name</th>
			<th></th> 
			<th></th> 
			</tr>";
		    while($row = $result->fetch_assoc()) {
				    echo "<tr>";
				    echo '<td>' . $row['plbid'] . '</td>';
				    echo "<td>" . $row['plbName'] . "</td>";
				    echo '<td><a href="padlockaddval.php?id=' . $row['plbid'] . '"  title="Will need a lock key">Add a padlock</a></td>';
				    echo '<td><a href="padlocklistrep.php?id=' . $row['plbid'] . '"  title="On this bridge">Show padlocks</a></td>';
				    echo "</tr>";	
				        
					}
		echo "</table>";
			}
	$con->close();
//}
?>
<center>
<br>
<br>
<div>
<input type="button" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo">
</center>
<?php

$_SESSION["bridgeid"] = $row['plbid'];

?>
</div>

</body>
</html>

