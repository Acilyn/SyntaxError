<?php
	function saltAndHash($password){
		$salt1 = "1@3$";
		$salt2 = "^7*9";
		return md5($salt1 . $password . $salt2);
	}
	
	function redirectTo(){
		header("Location: http://lamp.cse.fau.edu/~owend2014/");
	}
	
	function genRanStr($length = 30) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}

?>