<?php
session_start();
/*

EDIT.PHP

Allows user to edit specific entry in database

*/
// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($pcmPcid, $pcmName1, $pcmName2, $pcmLink, $error)

{
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>


<title>Add a Padlock</title>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3mobile.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css">
<style>
body {
    background-color: white;  
}
</style>
</head>

<body>
<center>
<div  class="main-wrapper">	
<h1 class="w3-jumbo w3-teal"> The Xpens collection</h1>
<h2 class="w3-xxlarge"> Add your Love padlock at the bridge </h2>

<?php

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>
<form action="" method="post" class="w3-xlarge">

<input type="hidden" name="seq" value="<?php echo $seq; ?>"/>

<div>



<strong>Padlock code: *</strong>		<input type="text" name="plcode" /><br/>
<br>
<strong>Your Name___: *</strong> 	<input type="text" name="name1" value="<?php echo $pcmName1; ?>"/><br/>
<br>
<strong>Link________: *</strong> 	<input type="text" name="link" value="<?php echo $pcmLink; ?>"/><br/>
<br>
<strong>Name________: *</strong> 	<input type="text" name="name2" value="<?php echo $pcmName2; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php
}
//echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

	//ops
	//$con=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
	//dev
$con =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
    // Check connection
   or 
	die("Could not connect to server ... \n" . mysqli_error ($con));

	// query db
	//$id = $_GET['plbid'];
	$id = 1;
	$result = $con->query("SELECT * FROM pcmessage WHERE pcmBridgeId=$id")
	 or die("Could not read 2... \n" . mysqli_error ($con));
	$row = mysqli_fetch_array($result);

	// check that the 'id' matches up with a row in the databse
	if($row)
	{
	// get data from db
	$pcmPcid = 		$row['pcmPcid'];
	$pcmName1 = 	$row['pcmName1'];
	$pcmName2 = 	$row['pcmName2'];
	$pcmLink = 		$row['pcmLink'];
	//$pcmBridgeId =  $row['pcmBridgeId'];
	//$bookdate = $row['bookdate'];
	// show form
	renderForm($pcmPcid, $pcmName1, $pcmName2, $pcmLink, '');
	}

?>	

<br>
<br>
<input type="button" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo">
</center>

<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
		}
?>
