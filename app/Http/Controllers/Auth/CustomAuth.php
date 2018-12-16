<?php

class CustomAuth{
	function __construct(){
		$this->key = "6548949845644984489498ghggdwfq41513";
	}
	public function WhoIsHere(){
		$applicant_logged_in = isset($_COOKIE['applicant']);
		$org_logged_in = isset($_COOKIE['org']);
		$sup_logged_in = isset($_COOKIE['sup']);
		if($applicant_logged_in){
			return "applicant";
		}
		else if($org_logged_in){
			return "org";
		}
		else if($sup_logged_in){
			return "sup";
		}
		else{
			return 0;
		}
	}

	public function login(type , user){
		setcookie(type , user . "|" . hash_hmac(md5, user, $this->key));
	}

	public function validate(type){
		if(type){
			$logged_in = $_COOKIE[type];
			
		}
	}
}

?>