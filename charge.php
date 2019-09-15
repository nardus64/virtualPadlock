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
			header('Location: success.php?tid='.$charge->id);
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

//redirect to success
header('Location: success.php?tid='.$charge->id);

function strtolower_utf8($string){ 
  echo "Email entered: " . strtolower($string);
  return $string; 
} 
?>