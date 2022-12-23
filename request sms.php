<?php 
 
 
require __DIR__ . '/vendor/autoload.php';
 
use Twilio\Rest\Client;
 
$sid    = "AC345903b2020c25a2f8faf24aa88ffae9"; 
$token  = "605845ad7919ebb7722fee2a8f72f39c"; 
$twilio = new Client($sid, $token); 
 
$message = $twilio->messages 
                  ->create("+251985123075", // to 
                           array( 
                               "from" => "+15752543476",       
                               "body" => "Your Trade License Request is Suucessefuly  Approved !You Can Register and get License. " 
                           ) 
                  ); 
 
//print($message->sid);
echo "<script>alert('Successefuly Message Sent');</script>";


?>

 