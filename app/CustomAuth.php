<?php
namespace App;

class CustomAuth{
	function __construct(){
		$this->key = "6548949845644984489498ghggdwfq41513";
	}
	public function loggedInType(){
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

	public function login($type , $user){
		setcookie($type , $user . "-" . hash_hmac("md5" , $user , $this->key) , time() + (86400 * 30));
	}

	public function validate($type){
		if($type){
			$cookie_data = explode("-" , $_COOKIE[$type]);
			$user = $cookie_data[0];
			$encrypted_val = $cookie_data[1];
			if(hash_hmac("md5" , $user , $this->key) != $encrypted_val){
				setcookie($type , "" , time() - 3600);
				return redirect("/")->with("status" , "يانصااااااب");
			}
		}
	}

	public function WhoIsHere(){
		$type = $this->loggedInType();
		if($type){
			$this->validate($type);
			return explode("-" , $_COOKIE[$type])[0];
		}
		else{
			return 0;
		}
	}

	public function logout(){
		$type = $this->loggedInType();
		if($type){
			setcookie($type , "" , time() - 3600);
		}
	}
}

?>