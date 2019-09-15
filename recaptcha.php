<?php
 session_start();
 if (isset($_POST['Submit']))
{
$url= 'https://www.google.com/recaptcha/api/siteverify';
$privatekey="6LcMQ0gUAAAAAC9wjTZLqbdTAQDmc9dvchGHC-BN";
$response=file_get_contents($url."?secret=".$privatekey."&response=".$_POST['g-recaptcha-response']."&remoteip=".$_SERVER['REMOTE_ADDR']);
$data = json_decode($response);
if(isset($data->success) AND $data->success==true){
  echo "<h1>Success</h1>";
  header('Location: recaptcha.php?CaptchaPass=True');
}
else {
  echo "unsuccesfull";
  header('Location: recaptcha.php?CaptchaFail=True'); 
}
}

//URL: https://www.google.com/recaptcha/api/siteverify
 if(isset($POST['Login'])){
$response=file_get_contents("");
}

?>

<html>
  <head>
    <title>reCAPTCHA demo: Simple page</title>

  <script type="text/javascript">
  var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : "6LcMQ0gUAAAAAE68i8N9VRGeS3kz3FgPtfYT0UAX"
        });
      };
        var onloadCallback = function() {
        grecaptcha.getResponse('html_element', {
          'sitekey' : "6LcMQ0gUAAAAAE68i8N9VRGeS3kz3FgPtfYT0UAX"
        });
      };
    </script>
     <script src="https://www.google.com/recaptcha/api.js"></script>    
  </head>
  <body>
    <h1> recaptcha </h1>
    <div>
      <?php if(isset($GET['CaptchaPass'])){?>
         <div>Massage sent</div>
       <?php } ?>
       <?php if(isset($GET['CaptchaFail'])){?>
         <div>Captcha failed, please try again!</div> 
       <?php } ?> 
    <form action="" method="POST"  onSubmit="window.location.reload()" id="form1" name="gymmy">
      <div id="html_element"></div>
      <br/>
      <div class="FormElement">        
      <div class="g-recaptcha" data-sitekey="6LcMQ0gUAAAAAE68i8N9VRGeS3kz3FgPtfYT0UAX"></div>
    </div>
      <input name="Submit" type="submit" value="Submit" id="Submit" class="Button">
    </form>
</div>
</script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>
  </body>
</html>