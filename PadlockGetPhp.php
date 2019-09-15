<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3.css"> 
<style>
html, body, h1, h2, h3, h4, h5, h6 {
  font-family: "Comic Sans MS", cursive, sans-serif;
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Bangers|Finger+Paint|Freckle+Face|Luckiest+Guy|Rubik+Mono+One" rel="stylesheet">
<style>
.w3-tangerine {
    font-family: "Tangerine", serif;
}
.w3-finger {font-family: 'Finger Paint', cursive;}
.w3-bang {font-family: 'Bangers', cursive;}
.w3-luck {font-family: 'Luckiest Guy', cursive;}
.w3-freckl {font-family: 'Freckle Face', cursive;}
.w3-rubik {font-family: 'Rubik Mono One', sans-serif;}
</style>
<body>
<div class="w3-container w3-finger"  align="center">
<h1  class = "w3-jumbo w3-card w3-teal"> Padlock message list </h1> 
<?php
$o = (float)$_POST["graflo"];
$a = (float)$_POST["grafla"];
if ($a == 0 ){ 
    echo "Please signon to see all the padlocks, location not available at the moment";}
else{
    $west = $o - 0.001;
    $east = $o + 0.001;
    $north = $a + 0.0015;
    $south = $a - 0.0015;
    $con=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16");
    // Check connection
    if ($con->connect_error){
	die("Connection failed: " . $conn->connect_error);
    }
$sql = "SELECT padlock1_name1, padlock1_name2, padlock1_middle FROM padlock1 
WHERE (padlock1Long >= '$north' and padlock1Long <= '$south')
and (padlock1Lat >= '$west'  and padlock1Lat <= '$east')
";

$result = $con->query($sql);
if($result->num_rows < 1)
{ 
echo "Padlocks not found here. Add a padlock.";
	
}
else{
	echo "<table  class='w3-table-all w3-hoverable w3-xlarge'>
	<tr>
	<th>padlock</th>
	</tr>";
    while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['padlock1_name1'] . "</td>";
    echo "</tr>";	
     //   echo "Graffiti: " . $row["grffiti"]. "<br>";
    //    document.getElementById("lextxtarea").value("found some graffiti here.");
        
	}
	echo "</table>";
}
$con->close();
}
?>
<center>
<br>
<br>
<input type="button" VALUE="Exit" onClick="history.go(-1);return true;" class="w3-jumbo">
</center>
<php
$_SESSION['id'] = $row['id'];
?>
</div>
<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>
</body>
</html>