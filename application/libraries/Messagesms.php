<?php
// composer require messente/messente-api-php

require_once __DIR__.'/vendor/autoload.php';
use Messente\Api\Api\OmnimessageApi;
use Messente\Api\Model\Omnimessage;
use Messente\Api\Configuration;
use Messente\Api\Model\SMS;

class Messagesms
{

	public function send($phone, $message){
		$config = Configuration::getDefaultConfiguration()
			->setUsername('9535b591a770433ca53881081d50d6bb')
			->setPassword('3920583a74b741318417f07f2edcfd7c');

		$apiInstance = new OmnimessageApi(
			new GuzzleHttp\Client(),
			$config
		);

		$omnimessage = new Omnimessage([
			'to' => $phone,
		]);

		$sms = new SMS(
			[
				'text' => $message,
//				'sender' => '<sender name (optional)>',
			]
		);

		$omnimessage->setMessages([$sms]);

		try {
			// $result = $apiInstance->sendOmnimessage($omnimessage);
			// print_r($result);
			return true;
		} catch (Exception $e) {
			// echo 'Exception when calling sendOmnimessage: ', $e->getMessage(), PHP_EOL;
			return false;
		}
	}

}
