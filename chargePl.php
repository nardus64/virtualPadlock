<?php
$emaill= $email = $stoken = "";
require_once('vendor/autoload.php');
// THIS IS THE SERVER KEY
\Stripe\Stripe::setApiKey("sk_test_YBYOSY1HjIPorVFiFkRwolMm");

// SANITISE
$POST = filter_var_array($_POST, FILTER_SANITIZE_STRING);
//print_r($POST); //print the array
$stoken = $POST['stripeToken'];
//$email = $POST['email'];
$email = $POST['stripeEmail'];
// lowercase only
	$emaill = strtolower($email);
//echo "posted values 1" . ($_POST[1]);
//echo "array count: " . count($POST);

  //dev  
$conn =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
  //ops 
//$conn=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
or die ("unable to connect");
  // Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else
{
//create the stripe customer
$customer = \Stripe\Customer::create(array(
"email" => $emaill,
"source" => $stoken
));

//charge the customer
$charge = \Stripe\Charge::create(array(
"amount" => 200,
"currency" => "gbp",
"description" => "virtual padlock",
"customer" => $customer -> id,
"receipt_email" => $emaill
));
	$g_stripe_code 	= $charge->id;
	// now hash the email
	 $hashEmail = password_hash($emaill, PASSWORD_DEFAULT);
	if ($g_stripe_code > " "){
	$sql = "INSERT INTO padlockcodes (pcStripeCode,pcemail)
	VALUES ('$g_stripe_code','$hashEmail')";		
		if ($conn->query($sql) === TRUE) 
		{
    //return;
			header('Location: successPl.php?tid='.$charge->id);
		} else 
		{
		$sqle = "INSERT INTO padlockErrorrLog (plEMsg)
		VALUES ('Could not add the stripe id to the table in charge.php')";		
		if ($conn->query($sqle) === TRUE) {	
			header('Location: erroradded.php?tid='.$charge->id);
				}
		}
	}
}
$conn->close();
showSucces();
//redirect to success
header('Location: successPl.php?tid='.$charge->id);

function strtolower_utf8($string){ 
  echo "Email entered: " . strtolower($string);
  return $string; 
} 
function showSucces(){
	<div id="spinner"></div>

<div class="container mt-4" id="spinner">
	<h2 style="background-color:#009999;"><center>Thank you for purchasing a padlock</h2>
	<br>
	<p id="p2"><h2><center>Your Padlock key Code is : </p><br>
	<p id="p1" class="w3-large"><h3><?php echo $tid;?></p><br><br>

	<p><h2><center> Read your email for more information,</p>
	<p><h1><center> Remember to copy the key Code!</h1></p>
	<p><h2><center> Key is also available in search area.</p>
}
?>