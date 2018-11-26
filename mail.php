<?php
if(isset( $_POST['name']))
    $name = $_POST['name'];
if(isset($_POST['email']))
    $email = $_POST['email'];
if(isset($_POST['message']))
    $message = $_POST['message'];
if(isset($_POST['subject']))
    $subject = $_POST['subject'];
header('Content-Type: application/json');
if ($name === ''){
  print json_encode(array('message' => 'Name cannot be empty', 'code' => 0));
  exit();
}
if ($email === ''){
  print json_encode(array('message' => 'Email cannot be empty', 'code' => 0));
  exit();
} else {
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
  print json_encode(array('message' => 'Email format invalid.', 'code' => 0));
  exit();
  }
}
if ($subject === ''){
  print json_encode(array('message' => 'Subject cannot be empty', 'code' => 0));
  exit();
}
if ($message === ''){
  print json_encode(array('message' => 'Message cannot be empty', 'code' => 0));
  exit();
}
$content="From: $name \n Email: $email \n Message: $message";
$recipent = "jessica-dione@outlook.com";
$mailheader = "From: $email \r\n";
mail($recipent, $subject, $content, $mailheader) or die("Error!");
echo "Email Sent!";
?>