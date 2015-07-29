<?php
	session_start();
	require_once "sql/functions.php";
	
	$servername = 'localhost';
	$db_database = 'owend2014';
	$db_username = 'owend2014';
	$db_password = 'code69red';
	$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	
	if (!$conn) die("Unable to connect to MySQL: " . mysqli_connect_error());

	if(isset($_POST["recUserName"]) && isset($_POST["recPWCode"]) && isset($_POST["recPassword"])){
		$username = $_POST["recUserName"];
		$sql = "SELECT ID, username, pw_code FROM tbl_users WHERE username='$username'";
		$result = mysqli_query($conn, $sql);
		
		if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if($row["pw_code"] == $_POST["recPWCode"]){
				$sql = "UPDATE tbl_users SET password= '" . saltAndHash($_POST["recPassword"]) . "' WHERE id= " .  $row["ID"] ;
				$result = mysqli_query($conn, $sql);
				$_SESSION['PHP_CURRENT_PAGE'] = "home";
			}
		}
	}
	if($_SESSION['PHP_CURRENT_PAGE'] != "home"){
		$_SESSION['PHP_CURRENT_PAGE'] = "recover&passed=false";
	}
	redirectTo();
?>