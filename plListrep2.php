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
.error {color: #FF0000;}
</style>	
</head>

<body class="w3-container w3-finger">
<?php
$emailErr = $email = $sqlcodes =  $sqlpcm = $rowEmail = $rowcodes = "";
$noCodes1 = "No padlocks for this email yet,";
$noCodes2 = "buy a code and add a padlock.";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<div  class="main-wrapper  w3-center">	
<h1 class="w3-xxxlarge w3-card w3-teal"> Love messages</h1>
<h2 class="w3-xxlarge"> Search Padlocks</h2>

	<header>
	<nav >
		<div class="grid-container" >
			<div class="item2">		
			<a class="btn" href="padlockPutDB.html" class="w3-large"> Back or</a>	
			<a class="btn" href="padlocklistrep.php" class="w3-large"> see All</a>				
			</div>
	</nav>
	</header>	

<br>
<form method="post" action="<?php
htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
  E-mail: <input type="text" name="email" value="<?php echo $email;?>"  placeholder=" Enter Your Email Address to find your padlock.">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>
<br><br><input type="submit" value="Find" class="w3-xlarge w3-btn w3-centre" id="b1"   ></input>
<input type="reset"  class="w3-xlarge w3-btn" id="b1"></input></td>
<br><br>
</form>
</div>
<?php

if ($email == "" ){ 
    echo "Please enter your email address to find your padlock message";}
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
    else {
    //first read padlockcodes to get the records = hashed email address
    $sqlcodes = "SELECT pcUsed, pcemail, pcStripeCode, pcmPcid, pcmName1, pcmLink, pcmName2, pcmlinktodate, usrdate   FROM padlockcodes
		left join pcmessage on pcmPcid = pcStripeCode where pcUsed = 'Y'";
    //select the codes for this emails
    $result = $con->query($sqlcodes);
	if($result !== false){
		if($result->num_rows == 0)
		{ 
		echo($noCodes1);		
		echo($noCodes1); 
		}
		else{
			echo "<table  class='w3-table-all w3-hoverable w3-xlarge'>
			<tr>			
			<th center>Padlock</th>
			<th center></th>
			<th center></th>
			<th center></th>
			<th center></th>
			</tr>";
			while($row = $result->fetch_assoc()) {
		    	$rowEmail = $row['pcemail'];
		    	if (PASSWORD_VERIFY($email,$rowEmail)){	        					
				    echo "<tr>";
				    echo "<td>" . $row['pcmName1'] . "</td>";
				    echo "<td>" . $row['pcmLink'] . "</td>";
				    echo "<td>" . $row['pcmName2'] . "</td>";
				    echo "<td>" . $row['pcmlinktodate'] . "</td>";
				    echo "<td>" . $row['usrdate'] . "</td>";				    
				    echo "</tr>";}}
				echo "</table>";}
				}
		$con->close();
		}
} 
?>
<br>
<div>
<center>
<a class="w3-btn w3-xlarge" href="padlockPutDB.html" id="b1" > Exit</a><br><br>
</center>
</div>

</body>
</html>