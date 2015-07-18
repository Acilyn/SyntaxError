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
		
		/*
		if (mysqli_num_rows($result) > 0) {
			if($row = mysqli_fetch_assoc($result)){ 
				if(($row["username"] == $acc_user) &&
				   ($row["session_key"] == $acc_skey) &&
				   ){  //user logged in
				   
				} else {
					unset($_SESSION['PHP_AUTH_USER']);
					unset($_SESSION['PHP_AUTH_SKEY']);
					$acc_user = "NULL";
				}
			}
		}
		*/

	}else
	{
	
	}

?>