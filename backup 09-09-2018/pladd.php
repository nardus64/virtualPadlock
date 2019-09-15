<?php
session_start();
?>
<!DOCTYPE html>
<html  lang="en">
<meta charset="utf-8"> 
<head>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
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
$g_plkey	= test_input($_POST['plkey']);
$g_bridgeid = test_input($_POST['bid']);	
$g_valid_key == 'N';

	if ($g_plkey > " " )
		{
		 $sqlk = "SELECT pcStripeCode, pcUsed FROM padlockcodes where pcStripeCode = '$g_plkey'";
  		 $result = $conn->query($sqlk);
  		  $rowcount=mysqli_num_rows($result);
  		
  		 if ($rowcount < 1) {echo "Invalid Key entered - check your email and retry.";}
  		else{$row = $result->fetch_assoc();
  			if ($row["pcUsed"] == 'Y')
  				{echo "1 invalid Key entered - check your email and retry.";}  	
  			else{ $g_valid_key = 'Y';
  				}
 		 	}
 		 }
 		// echo "valid key" . $g_valid_key;
	if($g_valid_key === 'Y')
		{	$sql = "INSERT INTO pcmessage (pcmBridgeId, pcmPcid, pcmName1,pcmName2,pcmLink)
				VALUES ('$g_bridgeid', '$g_plkey', '$g_name1', '$g_name2','$g_link')";		
				if ($conn->query($sql) === TRUE) 
				{
				
				echo "<h1><center> The Xpens collection</h1>";
				echo "<h2><center> Personal padlock </h2>";				
			    echo "<h2><center> Your new padlock was added to bridge: successfull</h2> " ;
			    echo "<h2><center> Your Key code is : ".$g_plkey."</h2>";
			    $sqlcode = "UPDATE padlockcodes set pcUsed = 'Y' where pcStripeCode = '$g_plkey'";
				    if ($conn->query($sqlcode) !== TRUE) 
						{	 	//	echo("Error description: " . mysqli_error($conn));	
							$sqle = "INSERT INTO padlockError (plEMsg)
							VALUES ('Padlock code not marked as used. Error: pladd.php')";
							$conn->query($sqle); 
						}
				}
    //return;
		} else 
			{ echo "valid key3" . $g_valid_key;
				$sqle = "INSERT INTO padlockError (plEMsg)
				VALUES ('New padlock not created: Error: pladd.php')";		
				if ($conn->query($sqle) === TRUE) 
				{
				echo "<h1><center> The Xpens collection</h1>";
				echo "<h2><center> Personal padlock </h2>";							
			    echo "<h2><center> New padlock not created: Error: " . $g_plkey;
				}
			}
}
$conn->close();


?>
<br>
<br>
<center>
	<a href="padlockPutDB.html" class="btn w3-jumbo"> Back </a>

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
