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

$username 	= "mydb1620";
$password 	= "Mydb_16_20";
$dbname 	= "mydb16";
$usertable	= "books1";
$userfield	= "id";
$servername = "localhost";
// Create connection
//$conn = new mysqli_connect($servername, $username, $password, $dbname);
//localhost xammp2
//dev
$conn =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")  or die ("unable to connect");
//ops 
//$conn =  mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16") or die ("unable to connect");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else
{
	$g_keycode	 = test_input($_POST['keycode1']);
	$g_name1 	= test_input($_POST['Name1']);
	$g_name2 	= test_input($_POST['Name2']);
	$g_link     = test_input($_POST['link']);
	//get 	the session bridgeid
	$g_bridgeid 	= $_SESSION["bridgeid"];

	echo "link: ".$g_link;
	echo ",  key: ".$g_keycode;
	echo ", name1: ".$g_name1;
	echo ", name2: ".$g_name2;
	echo ", bridgeid: ".$g_bridgeid;
	//test if the $g_userid not received test wth my id 123456

/*	
	if ($g_userid > " "){
	$sql = "INSERT INTO pcmessage (pcmBridgeId, pcmPcid	 pcmLink, pcmName1,pcmName1,)
	VALUES ('$g_bridgeid', $g_keycode1, '$g_name1', '$g_name2','$g_link')";

		if ($conn->query($sql) === TRUE) {
	    echo "<h2>".$g_book."</h2>";
	    echo "<h2> New message insert: successfull</h2>";
    //return;
	} else 
		{
	    echo "New message insert: Error: " . $sql . "<br>" . $conn->error;
		}
	} */
}
$conn->close();


?>
<br>
<br>
<input type="button" VALUE="Return here" onClick="history.go(-1);return true;" class="w3-jumbo  ">
<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>
