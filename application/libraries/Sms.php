<?php
//require 'vendor/autoload.php';
class Sms{

	protected $baseUrl = 'http://sms.avsdk.com/create_message';

	public function send($phone, $message){
		$params = [
			'phone'=> $phone,
			'message' => $message
		];

		$url = $this->baseUrl . '?' . http_build_query($params);

//		$client = new GuzzleHttp\Client();
//		$res = $client->request('GET', $url);
//
//		var_dump($res);


		// try {
		$json = 	file_get_contents($url );
		
		if($json){
			$res = json_decode($json);
			if($res->status == 1){
			return true;
		}else{
			return false;
		}}
		else{
			return false;
		}
		// }catch (Exception $exception){
		// 	return false;
		// }


	}

}
