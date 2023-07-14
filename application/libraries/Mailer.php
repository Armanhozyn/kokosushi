<?php
//Load Composer's autoloader
require 'vendor/autoload.php';
class Mailer{
  public function send($from, $to, $subject, $message){
   
    $url = "https://api.sendinblue.com/v3/smtp/email";
    $rootObj = new stdClass;
   
    $senderObj =  new stdClass;
     $senderObj->name = "SYSTEM | KOKORO SUSHI & BENTO";
     $senderObj->email = "order@kokorosushi.be";
    $msgObj=  new stdClass;
    $toObj =  new stdClass;
    $toObj->name = null;
    $toObj->email = $to;
   

    

    
     $rootObj->sender = $senderObj;
    $rootObj->to =  [$toObj];
    $rootObj->subject = $subject;
    $rootObj->htmlContent = $message;
    

    $payload = json_encode($rootObj);
$ch = curl_init( $url );
# Setup request to send json via POST.

curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('content-type:application/json','content-type','accept: application/json','api-key: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'));
# Return response instead of printing.
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
# Send request.
$result = curl_exec($ch);
curl_close($ch);
# Print response.
//echo "<pre>$result</pre>";
    return true;
}
  
}