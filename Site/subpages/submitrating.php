<?php
	session_start();
	require_once "sql/functions.php";
	$servername = 'localhost';
	$db_database = 'owend2014';
	$db_username = 'owend2014';
	$db_password = 'code69red';
	$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
	if (!$conn) die("Unable to connect to MySQL: " . mysqli_connect_error());
	
	if(isset($_POST["rating"])){
		$rating = $_POST["rating"];
		$place_id = $_SESSION['PHP_PLACE_ID'];
		$user_id = $_SESSION['PHP_AUTH_USER_ID'];
		
		echo $rating . "<br>" . $place_id . "<br>" . $user_id;
		
		$sql = "INSERT INTO tbl_Ratings (Place_ID, User_ID, Rating) VALUES('$place_id', '$user_id', '$rating')";
		
		if(mysqli_query($conn, $sql)){
			
		} else {
			echo "Failed";
		}
		
	}
	
	redirectTo();

?>