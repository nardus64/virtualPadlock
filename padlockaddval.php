<?php
echo "help";

function renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink, $pcmBridgeId, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>


<title>Add Padlock</title>

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
<h2 class="w3-xxxlarge"> Add Padlock to a bridge </h2>

<?php
    $id = $_GET['id'];
// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post" class="w3-xlarge">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>Bridge Name:</strong> <?php echo $_GET['id']; ?></p>

<strong>Your name_: *</strong>   <input type="text" 
name="name1" /><br/>
<br>
<strong>Add a link__: *</strong>   <input type="text" 
name="link"/><br/>
<br>
<strong>Next name_: *</strong>   <input type="text" 
name="name2" /><br/>
<br>

<strong>Padlock Key: *</strong>  <input type="text"
 name="Padlockkey" /><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>
</form>
</body>
</html>

<?php
}

  //ops
  //$con=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
  //dev
  $con =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
    // Check connection
   or 
  die("Could not connect to server ... \n" . mysqli_error ($con));
//    validate the bridge id send from the previous page url in ?id
/*    $id = $_GET[test_input('id')];
    echo "$id";
    $sql = "SELECT plbName FROM padlockbridge WHERE plbId = $id";
    $result = mysqli_query($con,$sql);
     or die("Could not read ... \n" . mysql_error ());
   // $row = mysqli_fetch_array($result);
    if($result->num_rows < 1)
    { 
    //echo "No valid bridge found, please select a bridge. Thank you.";
    $error = 'No valid bridge found, please select a bridge. Thank you.';
    //error, display form

    renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink,$pcmBridgeId, $error);
    }
    */
if (isset($_POST['submit'])) //submit was pressed
    {
    $id = test_input($_POST['id']); 
    $pcmBridgeId = test_input($_POST['id']);
    $pcmName1 = test_input($_POST['name1']);        
    $pcmLink = test_input($_POST['link']);
    $pcmName2 =  test_input($_POST['name2']);
    $pcmPcid = test_input($_POST['Padlockkey']); 
    
  // check that fields are filled in
    if ($pcmName1 == '' || $pcmName2 == '' || $pcmBridgeId == '' || $pcmLink == '' || $pcmPcid == '')
        {
          echo "value error";
        $pcmid = mysqli_real_escape_string($con, 'id');
        $error = 'ERROR: Please fill in all required fields!';
  //error, display form
          renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink, $pcmBridgeId, $error);
        }
     else
        {
            // verify the padlockkey
// show values
            //        echo "key - ".$id. " ".$pcmPcid." ".$pcmName2.$pcmLink;
          $sql = "SELECT pcStripeCode, pcUsed FROM padlockcodes WHERE
              pcStripeCode = $pcmPcid";
              //mysqli_query($con,$sql) or die(mysqli_error($con));
          $result = mysqli_query($con,$sql);
               if($result->num_rows > 0)
                  {$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                    if ($row["pcUsed"] <> ''){
                    
                    $error = "This Key lock code was used, you should purchase a padlocks. Thank you.";
                    renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink, $pcmBridgeId, $error);
                  }
                    else
                    {
                      $sql="INSERT INTO pcmessage (pcmPcid, pcmName1, pcmName2, pcmLink, pcmBridgeId) values ($pcmPcid, $pcmName1, 
                        $pcmName2, $pcmLink, $pcmBridgeId;";
                       mysqli_query($con,$sql)
                       or die(mysqli_error($con));
                    }
                  }
                  else
                    {
                     $error = 'ERROR: This Key lock code is invalid, you can purchase a padlock.';
                    renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink, $pcmBridgeId, $error);
                  }


          // once saved, redirect back to the view page

          header("Location: bridgeList.php");

          }

        }
else
  // if the form hasn't been submitted, get the id and display empty form

  // get the 'id' value from the URL (if it exists), making sure that it is valid (checking that it is numeric/larger than 0)

  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

  {     $id = $_GET['id'];
    if ('name1' == '' || 'name2' == '' || 'link' == '' || 
      'Padlockkey' == '')

          {

          // generate error message

          $error = 'ERROR: Please fill in all required fields!';

          //error, display form

          renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink,$pcmBridgeId, $error);

          }
      else
      {
    // query mesages table on this bridge
        $g_bridgeid = $_GET['id'];
//
        $sql = "SELECT pcmid, pcmPcid, pcmName1, pcmName2, pcmLink FROM pcmessage WHERE
          pcmBridgeId = $g_bridgeid";

        $result = $con->query($sql) or die("Could not read messages ... \n" . mysql_error ());

        if($result->num_rows < 1)
        { 
        echo "No padlocks found on this bridge, you can add the first Padlock. Thank you.";
        }

 // get data from screen input
        $pcmBridgeId = test_input('id');
        $pcmName1 = test_input('name1');        
        $pcmLink = test_input('link');
        $pcmName2 =  test_input('name2');
        $pcmPcid = test_input('Padlockkey');
        $pcmid = test_input('1') ;
        
// show form need to have previous data from screen
        renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink,$pcmBridgeId, '');    
      }
    }
    else

    // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

    {

    echo ' url Error!';

    $error = 'ERROR: URL invalid!';

    //error, display form

    renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink,$pcmBridgeId, $error);    

    }


?>  

<br>
<br>
<input type="button" VALUE="Back" onClick="history.go(-1);return true;" class="w3-jumbo">
</center>
</div></center></body></html>
<?php
function test_input($data) {
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
 return $data;
}
?>