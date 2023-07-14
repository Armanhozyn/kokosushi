<?php
class G extends CI_Model{

    public static function path($param){
        return base_url() ."public/{$param}/";
    }

    public static function getShortMonthName($monthNum){

        $dateObj   = DateTime::createFromFormat('!m', $monthNum);
        $monthName = $dateObj->format('M');
        return $monthName;
    }

    public static function getTime(){
        return date("Y-m-d H:i:s");
    }

    public function getUser(){
	return 	$this->ion_auth->user()->row()->id;
	}
	public  function getStatusByCode($code){
		$status[1] = 'Active';
		$status[0] = 'Disable';
		if(array_key_exists($code,$status)){
			return $status[$code];
		}else{
			return '';
		}
	}

	public function getAlertLebelByCode($code){
		$status[1] = 'badge-success';
		$status[0] = 'badge-secondary';
		if(array_key_exists($code,$status)){
			return $status[$code];
		}else{
			return '';
		}
	}





}
