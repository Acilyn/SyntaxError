<?php
	session_start();
	
	$servername = 'localhost';
	$db_database = 'owend2014';
	$db_username = 'owend2014';
	$db_password = 'code69red';
	//$db_database = "owend2014"
	//$db_tbl_user = "tbl_users";

	

	$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$conn) die("Unable to connect to MySQL: " . mysqli_connect_error());
	
	$acc_user = "NULL";
	$acc_skey = "NULL";
	if (isset($_SESSION['PHP_AUTH_USER']) && isset($_SESSION['PHP_AUTH_SKEY']))
	{
		$acc_user = $_SESSION['PHP_AUTH_USER'];
		$acc_skey = $_SESSION['PHP_AUTH_SKEY'];
		
		$sql = "SELECT username, session_key FROM tbl_users WHERE username='" . $_SESSION['PHP_AUTH_USER'] . "'";
		$result = mysqli_query($conn, $sql);
	}else
	{
	
	}
	
	function isLoggedIn(){
		$acc_user = "NULL";
		$acc_skey = "NULL";
		if (isset($_SESSION['PHP_AUTH_USER']) && isset($_SESSION['PHP_AUTH_SKEY']))
		{
			$acc_user = $_SESSION['PHP_AUTH_USER'];
			$acc_skey = $_SESSION['PHP_AUTH_SKEY'];
			return true;
		}
		return false;
	}
	
	function getUsername(){
		
		if (isset($_SESSION['PHP_AUTH_USER']))
		{
			return $acc_user = $_SESSION['PHP_AUTH_USER'];
		}
		return null;
	}
?>