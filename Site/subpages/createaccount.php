<?php
	session_start();
	require_once "sql/functions.php";
	unset($_SESSION['PHP_AUTH_USER']);
	unset($_SESSION['PHP_AUTH_SKEY']);
	
	$servername = 'localhost';
	$db_database = 'owend2014';
	$db_username = 'owend2014';
	$db_password = 'code69red';
	$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$conn) die("Unable to connect to MySQL: " . mysqli_connect_error());
	

	if(isset($_POST["regPassword"]) && isset($_POST["regPWCode"]) && isset($_POST["regUserName"]) && isset($_POST["regFirst"]) && isset($_POST["regLast"])){
		$username = $_POST["regUserName"];
		$password = saltAndHash($_POST["regPassword"]);
		$pw_code = substr($_POST["regPWCode"], 0, 4);
		$first = $_POST["regFirst"];
		$last = $_POST["regLast"];
		$email = "";

		if( isset($_POST["regEmail"]) ){
			$email = $_POST["regEmail"];
		}
		else { $email = NULL; }

		$sql = "SELECT username, session_key FROM tbl_users WHERE username='" . $username . "'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			//username exist
		}else {
			//username doesn't exist, create account
			$sql = "INSERT INTO tbl_users (username, password, pw_code, firstname, lastname, email) VALUES('$username', '$password', '$pw_code', '$first', '$last', '$email')";

			if (mysqli_query($conn, $sql)) {
				
			}else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
				
		}
		
		
	}
	
	redirectTo();

?>