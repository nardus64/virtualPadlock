<?php
session_start();
?>
<!DOCTYPE html>
<html  lang="en">
<meta charset="utf-8"> 
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
	<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
	<link rel="shortcut icon" sizes="128x128" href="./icns/pl.png">
<style>
body {
    background-color: white;
    border: 1px solid black;  
}


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
<body>
</body>
</html>
<?php

$g_name1 	= test_input($_POST['Name1']);
$g_name2 	= test_input($_POST['Name2']);
$g_link 	= test_input($_POST['link']);
$g_plkey	= test_input($_POST['plkey']);
$g_valid_key = 'N';
echo "	<h1><center> Key used : </h1><br>";
echo "<center>" . $g_plkey; 
//dev
$conn =  new mysqli("localhost","mydb2016","Mydb2016","mydb16");
//ops 
//$conn=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
//or die ("unable to connect");
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
	} 

	// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}else
{
	$g_name1 	= test_input($_POST['Name1']);
	$g_name2 	= test_input($_POST['Name2']);
	$g_link 	= test_input($_POST['link']);
	$g_linkdate = test_input($_POST['linkdate']);
	$g_plkey	= test_input($_POST['plkey']);
	$g_bridgeid = test_input($_POST['bid']);	
	$g_bday 	= test_input($_POST['bday']);
	$g_valid_key == 'N';
	$l_date = date("Y-m-d");
	if($g_linkdate == ' '){$g_linkdate = 'On';}
	echo "<h1 class='w3-xxlarge w3-card w3-teal'><center>Padlock</h1><br><br>";
if ($g_plkey === " " )
	{echo "	<h1><center> Please enter your key</h1><br><br>".$g_plkey; }
else
	{
	 $sqlk = "SELECT pcStripeCode, pcUsed FROM padlockcodes where pcStripeCode = '$g_plkey'";
		 $result = $conn->query($sqlk);
		  $rowcount=mysqli_num_rows($result);
		
		 if ($rowcount < 1) {echo "<h2 class='w3-xxlarge w3-card w3-red'><center>Invalid Key! Check your email and retry.</h2>".	 "<center>" .$g_plkey .	"<br><br>";}
		else{$row = $result->fetch_assoc();
			if ($row["pcUsed"] == 'Y')
				{echo "<h2 class='w3-xxlarge w3-card w3-red'><center>Key used previously - check your email and retry.</h2>";}  	
			else{ $g_valid_key = 'Y';
				}
		 	}
	 }
	// echo "valid key" . $g_valid_key;
	if($g_valid_key === 'Y')
	{	
		$sql = "INSERT INTO pcmessage (pcmBridgeId, pcmPcid, pcmName1,pcmName2,pcmLink,Pcmlinktodate,usrdate)
			VALUES ('$g_bridgeid', '$g_plkey', '$g_name1', '$g_name2','$g_link','$g_linkdate','$g_bday')";		
			if ($conn->query($sql) === TRUE) 
			{			
		    echo "<h2 class='w3-xxlarge w3-card w3-blue'><center> Success! Padlock was added to bridge.</h2> " ;
		    echo "<h2><center> Your Key code was : ".$g_plkey."</h2>";
		    $sqlcode = "UPDATE padlockcodes set pcUsed = 'Y' where pcStripeCode = '$g_plkey'";
			    if ($conn->query($sqlcode) !== TRUE) 
					{	 	//	echo("Error description: " . mysqli_error($conn));	
						$sqle = "INSERT INTO padlockError (plEMsg)
						VALUES ('Padlock code not marked as used. Error: pladd.php')";
						$conn->query($sqle); 
					}
			}else
			{			
			echo "<h1 class='w3-xxlarge w3-card w3-red'><center> Padlock Error, please retry. </h2>";
				echo " <br>error: " . $conn->error;			
			$sqle = "INSERT INTO padlockError (plEMsg)
			VALUES ('New padlock not created: Error: pladd.php')";		
			if ($conn->query($sqle) === TRUE) 
			{						
		    echo "<h2><center> New padlock not created: Error: " . $g_plkey;
		    echo "<h2 class='w3-xxlarge w3-card w3-blue'><center> Please try again.</h2> ";
			}}
//return;
	} else 
		{ 
			$sqle = "INSERT INTO padlockError (plEMsg)
			VALUES ('New padlock not created: Error: pladd.php')";		
			if ($conn->query($sqle) === TRUE) 
			{						
		    echo "<h2><center> New padlock not created: Error: " . $g_plkey;
			}
		}		
		$conn->close();
}
?>
<br>
<br>
<center>
	<a href="padlockPutDB.html" class="w3-btn w3-jumbo"  id="b1"> Back </a><br><br>

</center>
<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}

function test_padlockkey($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>
