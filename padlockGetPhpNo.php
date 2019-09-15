<!DOCTYPE=html>
<title> Padlock </title>
<head></head>
<?php
header('Content-Type: text/xml');
echo '<?xml version="1.0"encoding="UTF-8" standalone="yes" ?>';
$username 	= "mydb1620";
$password 	= "Mydb_16_20";
$dbname 	= "mydb16";
$usertable	= "padlock1";
$userfield	= "id";
//$q = intval($_POST['q']);
$q = test_input($_POST['q']);

// production:$con = mysqli_connect('localhost',$username,$password,$dbname);
$con = new mysqli("localhost", "mydb2016", "Mydb2016", "mydb16");
if ($con->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
//$con = mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
//if (!$con) {
 //   die('Could not connect: ' . mysqli_error($con));
//}
$longtstop=strpos($q,':');
$longlstart=strpos($q,':') + 1;
$longl=substr($q,0,strpos($q,':'));
$longt=substr($q,strpos($q,':') +1);

mysqli_select_db($con,"padlock1");
$sql="SELECT count(*) FROM padlock1 WHERE padlock1_Long = $longt and padlock_Lat = $longl";

$result = mysqli_query($con,$sql);
echo($result);
mysqli_close($con);
?>
z.innerHTML = locnumber;
<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>
