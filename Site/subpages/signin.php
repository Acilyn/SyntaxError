<?php

	session_start();
	require_once "sql/functions.php";
	$servername = 'localhost';
	$db_database = 'owend2014';
	$db_username = 'owend2014';
	$db_password = 'code69red';
	
	$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$conn) die("Unable to connect to MySQL: " . mysqli_connect_error());
	

	if( isset($_POST["loginUsername"]) && isset($_POST["loginPassword"]) ){
		$sql = "SELECT * FROM tbl_users WHERE username='" . $_POST["loginUsername"] . "'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) > 0) {
			// output data of each row
			if($row = mysqli_fetch_assoc($result)){
				$password = saltAndHash($_POST["loginPassword"]);
				if($row["password"] == $password){
					$session_key = genRanStr();
					$session_ts = date('Y-m-d G:i:s');
					$sql = "UPDATE tbl_users SET session_key= '" . $session_key . "', session_stamp='" . $session_ts . "' WHERE id= " .  $row["ID"] ;

					if (mysqli_query($conn, $sql)) {
						//record updated
						$_SESSION['PHP_AUTH_USER'] = $row["username"];
						$_SESSION['PHP_AUTH_SKEY'] = $session_key;
						$_SESSION['PHP_AUTH_USER_ID'] = $row["ID"];
						
					} else {
						//record failed
					}
				}else {
					$_SESSION['PHP_CURRENT_PAGE'] = "recover";
					
				}
			}		
		} else {
			$_SESSION['PHP_CURRENT_PAGE'] = "recover";
		}
		
		
	}
	
	
	redirectTo();


?>