<?php
session_start();
//if (isset($POST['submit'])) {

$g_userid   = test_input($_POST['email']);
$g_passw    = test_input($_POST['passw']);   
If (empty($g_userid) || empty($g_passw))
	{
	header("Location: adminPL.html?signup=empty");
	exit();
	}
$logid = " ";
//dev
$con =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
//ops
//$con =  mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16") 
		or die ("unable to connect");
if ($con->connect_error){
	header("Location: adminPL.html?signup=connectError");
	exit();
    } else 
    {
    	$g_userid   = test_input($_POST['email']);
		$g_passw    = test_input($_POST['passw']); 
	};

if (empty($g_userid) || empty($g_passw)){
	header("Location: adminPL.html?signup=empty");
	exit();
	} else 
	{ 
	$sql = "SELECT booklogid, booklogname, booklogpass FROM booklog WHERE booklogname =
	 '$g_userid'";
 	$result = $con->query($sql);

	if($result->num_rows < 1)		
		{ header("Location: adminPL.html?signup=NotFound");
				exit();
		}else
		{
			$row = $result->fetch_assoc();
			$password =  $row["booklogpass"];
			echo  $user_password_hash ;
			if	(password_verify( $g_passw,$password))

			{ 
				$_SESSION["bookid"] = $row["booklogid"];
				header("Location: adminPL.php?login=loggedinValid");
				exit();
					
			}else 
			{
				header("location: adminPL.html?login=notLoggedin"); 
				echo "login was unsuccessfull";
			}				
		}
	}	

$con->close();
  
?>
<center>
<br>
<br>
<input type="button" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo">
</center>

</div>
<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;}

?>
