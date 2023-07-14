<?php
require 'vendor/autoload.php';
use \Mailjet\Resources;
class Mailjet{

	public function send($from, $to, $subject, $message){
        $from = [
            'Email' => "info@wsss.rafusoft.com",
            'SYSTEM | KOKORO SUSHI & BENTO'
        ];

		// Use your saved credentials, specify that you are using Send API v3.1

// $mj = new \Mailjet\Client('80dd7f51283eb3116e07ce96fc7893e4', '88c734c456704da8d954e3ca761cbfe7',true,['version' => 'v3.1']);
// $mj = new \Mailjet\Client('185cf2cc6698aed60cb71fdb46ca21b5', '53d7cb2002b4e9584ef56d8fd8aa5391',true,['version' => 'v3.1']);
$mj = new \Mailjet\Client('6a302c8396dddcc6095a3f008c9d2fcc', 'a417afdec0dbb81fc4aa7b9084be7b77',true,['version' => 'v3.1']);

// Define your request body

$body = [
    'Messages' => [
        [
            'From' => $from,
            'To' => $to,
            'Subject' => $subject,
            'TextPart' => "Your mail client does not support HTML mail.",
            'HTMLPart' => $message
        ]
    ]
];

// All resources are located in the Resources class

$response = $mj->post(Resources::$Email, ['body' => $body]);

// Read the response

return $response;
return $response->success();

return $response->success() && var_dump($response->getData());
	}
	
}
