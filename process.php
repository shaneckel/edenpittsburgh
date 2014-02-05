<?php

if( isset($_POST) ){
  
  $errors   = array();
  $data     = array();  
  
  $name     = $_POST['name'];
  $message  = $_POST['message'];
  $email    = $_POST['email'];  


  if (empty($name))
    $errors['name'] = 'Name is required.';

  if (empty($email))
    $errors['email'] = 'Please include an email.';

  if (empty($message))
    $errors['message'] = 'Please include a message.';

  if (!empty($errors)) {
    $headers = "Edenpitt.com email from " . $name .  ".\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    
    $emailbody = "<h2>Hey Hilary.</h2>";
    $emailbody .= "<h3>". $name . "Has sent you an email.</h3>";
    $emailbody .= "<p>" . $message . "</p><p>Their email is:</p>"
    $emailbody .= "<h2>" . $email . "</h2><p>:)</p>"
 
    mail("shaneckel@gmail.com","EdenPitt Email from " . $name . ".",$emailbody,$headers);

    $data['success'] = true;
    $data['message'] = 'Your email was successfully sent on '. date('l jS \of F Y h:i:s A');
 
  }else{
    $data['success'] = false;
    $data['errors']  = $errors;
  }

  echo json_encode($data);

}