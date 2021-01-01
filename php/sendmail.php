<?php

include('db.php');
//print_r($_POST);
$name=$_POST['name'];
$email=$_POST['email'];
$mobile=$_POST['mobile'];
$subject=$_POST['subject'];

$message="NAME : ".$name;
$message.="\nEMAIL : ".$email;
$message.="\nMOBILE NO : ".$mobile."\n";


$message.=$_POST['message'];

$to = "care@yourbankifsc.com";

$headers="";
// Always set content-type when sending HTML email
//$headers = "MIME-Version: 1.0" . "\r\n";
//$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <'.$email. ">\r\n";
//$headers .= 'Cc: myboss@example.com' . "\r\n";

$stat=mail($to,$subject,$message,$headers);
if($stat==1)
{
  echo '<div class="alert alert-success" role="alert">
  Thank You For Contacting Us.
</div>';
}
else
{
    echo '<div class="alert alert-danger" role="alert">
  Message Can\'t Be Send!
</div>';
}


?>