<?php

if( isset($_POST) ){
  
  $formok = true;

  $errors = array();
  $data = array();  
 
  $name = $_POST['name'];
  $message = $_POST['message'];
  $email = $_POST['email'];  

  if (empty($_POST['name']) ){
    $errors['name'] = 'Name is required.';
    $formok = false;
  }

  if (empty($_POST['email']) ){
    $errors['email'] = 'Please include an email.';
    $formok = false;
  }

  if (empty( $_POST['message']) ){
    $errors['message'] = 'Please include a message.';
    $formok = false;
  }

  if (empty($errors) && $formok) {
    $headers = "From: Eden <hello@edenpitt.com>" . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'MIME-Version: 1.0' . "\r\n";
 
    $emailbody = "<h1 style='font-size:18px;'>{$name} sent you an email.</h1>
                  <p style='border-top:1px solid #333;padding-top:20px;margin-top:10px;'>{$message} </p>
                  <p style='border-top:1px solid #333;padding-top:10px;margin-top:10px;'>Their return email is:</p>
                  <h2 style='font-size:16px;'>{$email}</h2>";
 
    $emailMessage = "Eden Email Sent.";

    mail("shaneckel@gmail.com",$emailMessage,$emailbody,$headers);

    $data['success'] = true;
    $data['message'] = 'Your email was successfully sent on '. date('l jS \of F Y h:i:s A');
 
  }else{
    $data['success'] = false;
    $data['errors'] = $errors;
  }

  echo json_encode($data);

}