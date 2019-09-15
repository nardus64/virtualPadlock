<?php
session_start();
/*

EDIT.PHP

Allows user to edit specific entry in database

*/
// creates the edit record form

// since this form is used multiple times in this file, I have made it a function that is easily reusable

function renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink,$pcmBridgeId, $error)

{

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">

<html>

<head>


<title>Edit Record</title>

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

// if there are any errors, display them

if ($error != '')

{

echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';

}

?>



<form action="" method="post" class="w3-xlarge">

<input type="hidden" name="id" value="<?php echo $id; ?>"/>

<div>

<p><strong>Bridge ID:</strong> <?php echo $id; ?></p>

<strong>Your name: *</strong>   <input type="text" name="name1" value="<?php echo $pcmName1; ?>"/><br/>
<br>
<strong>Add a link: *</strong>   <input type="text" name="link" value="<?php echo $pcmLink; ?>"/><br/>
<br>
<strong>Next name: *</strong>   <input type="text" name="name2" value="<?php echo $pcmName2; ?>"/><br/>
<br>

<strong>Padlock Key___: *</strong>  <input type="text" name="Padlockkey" value="<?php echo $pcmPcid; ?>"/><br/>

<p>* Required</p>

<input type="submit" name="submit" value="Submit">

</div>

</form>

</body>

</html>

<?php

}

//$o = ($_SESSION["bookid"]);

//if ($o == 0 ){ 
//    echo "Please sign on to see your wish list books. Books are not available at the moment";}
//else{
  //ops
  //$con=mysqli_connect("localhost","mydb1620","Mydb_16_20","mydb16")
  //dev
  $con =  mysqli_connect("localhost","mydb2016","Mydb2016","mydb16")
    // Check connection
   or 
  die("Could not connect to server ... \n" . mysqli_error ($con));

    $g_bridgeid = $_GET['id'];
//    $g_bridgeid   = $_SESSION["bridgeid"];
    $sql = "SELECT pcmid, pcmPcid, pcmName1, pcmName2, pcmLink FROM pcmessage WHERE
          pcmBridgeId = $g_bridgeid";

  $result = $con->query($sql)
   or die("Could not read ... \n" . mysql_error ());

  if($result->num_rows < 1)
    { 
    echo "No padlocks found on this bridge, you can add the first Padlock. Thank you.";
    }
 // else  
 //   {
  if (isset($_POST['submit']))
      {
  // confirm that the bridge 'id' value is a valid integer before getting the form data
      if (is_numeric($_POST['id']))

        {

        // get form data, making sure it is valid

        $pcmid = mysqli_real_escape_string($con, $_POST['pcmid']);

        $pcmBridgeId = test_input($_POST['pcmid']);;
        $pcmName1 = test_input($_POST['name1']);        
        $pcmLink = test_input($_POST['link']);
        $pcmName2 =  test_input($_POST['name2']);
        $pcmPcId = test_input($_POST['Padlockkey']); 
        // check that author / name fields are both filled in
        if ($pcmName1 == '' || $pcmName == '' || $pcmBridgeId == '' || $pcmLink == '' || $pcmPcId == '')

          {

          // generate error message

          $error = 'ERROR: Please fill in all required fields!';

          //error, display form

          renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink,$pcmBridgeId, $error);

          }

        else

          {
            // verify the padlockkey
          $sql = "SELECT pcStripeCode, pcUsed FROM padlockcodes WHERE
              pcStripeCode = $pcmPcId";
          $result = mysqli_query($con,$sql);
                if($result->num_rows > 0)
                  { 
                    if ($result['pcUsed'] <> ''){
                    echo "This Key lock code was used, you should purchase more padlocks. Thank you.";}
                    else
                    {
                       mysqli_query($con,"INSERT INTO pcmessage (pcmPcId, pcmName1, pcmName2, pcmLink, pcmBridgeId) values ($pcmPcid, $pcmName1, 
                        $pcmName2, $pcmLink, $pcmBridgeId;")
                       or die(mysqli_error($con));
                    }
                  }
                  else
                    {echo "This Key lock code is invalid, you should purchase a padlock key. Thank you.";}


          // once saved, redirect back to the view page

          header("Location: padlockaddval.php");

          }

        }

        else

          {

          // if the 'id' isn't valid, display an error

          echo ' id Error!';

          }

      }

      else

        // if the form hasn't been submitted, get the data from the db and display the form

        {

        // get the 'id' value from the URL (if it exists), making sure that it is valid (checing that it is numeric/larger than 0)

        if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0)

          {
 
            // query db
            $id = $_GET['id'];
            $sql = "SELECT pcmid, pcmPcid, pcmName1, pcmName2, pcmLink FROM pcmessage WHERE
          pcmBridgeId = $id";
            $result = $con->query($sql)
             or die("Could not read ... \n" . mysql_error ());
            $row = mysqli_fetch_array($result);

            // check that the 'id' matches up with a row in the database
            if($row)
            {
            // get data from db
            $pcmBridgeId = test_input($_POST['pcmid']);;
            $pcmName1 = test_input($_POST['name1']);        
            $pcmLink = test_input($_POST['link']);
            $pcmName2 =  test_input($_POST['name2']);
            $pcmPcId = test_input($_POST['Padlockkey']); 
                // show form
            renderForm($pcmid, $pcmPcid, $pcmName1, $pcmName2, $pcmLink,$pcmBridgeId, '');


            else

            // if no match, display result

                {

                echo "No results!";

                }

        }

        else

        // if the 'id' in the URL isn't valid, or if there is no 'id' value, display an error

        {

        echo ' url Error!';

        }

  }
 
//  }
//}
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