<?php
 
if(isset($_POST['email'])) {
 
    $email_to = "anglos@anglos.hr";
	$name = $_POST['name'];
	$message = $_POST['message'];
	$email = $_POST['email'];
    $email_subject = "New message from:"." ".$email;
 
     
 
     
 
    function died($error) {
 
        // your error code can go here
 
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
 
        echo "These errors appear below.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Please go back and fix these errors.<br /><br />";
 
        die();
 
    }
 
     
 
    // validation expected data exists
 
    if(!isset($_POST['name']) ||
 
        !isset($_POST['message'])) {
 
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
 
    }
 
     
 
    $name = $_POST['name']; // required
 
    $message = $_POST['message']; // required
	
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$name)) {
 
    $error_message .= 'The First Name you entered does not appear to be valid.<br />';
 
  }
 
 
  if(strlen($message) < 2) {
 
    $error_message .= 'The Message you entered do not appear to be valid.<br />';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Name: ".clean_string($name)."\n";
    
    $email_message .= "URL: ".clean_string($url)."\n";
    
    $email_message .= "Phone Number: ".clean_string($phone)."\n";

    $email_message .= "\nMessage:\n----------------------------------------------------------------\n\n".clean_string($message)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$name."\r\n".
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);
 
?>
 
 
 
<!-- include your own success html here -->
 
 
 
Thank you for contacting us. We will be in touch with you very soon.
(you will be redirected to homepage in 5 secs)

<?php

header('Refresh: 5; URL=index.html');

}
 
?>