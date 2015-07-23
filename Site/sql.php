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
	
	function getPlaces($type){
		global $conn;
		if (!$conn) return null;
		$sql = "SELECT tbl_Place.ID_Place, tbl_Place.Title, tbl_Place.Description, tbl_Place.Address, tbl_Category.Cat_Type FROM tbl_Place INNER JOIN tbl_Category ON tbl_Place.Category_ID = tbl_Category.ID_Category WHERE tbl_Category.ID_Category = " . $type . ";";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	function getPlace($place_id){
		global $conn;
		if (!$conn) return null;
		$sql = "SELECT tbl_Place.ID_Place, tbl_Place.Title, tbl_Place.Description, tbl_Place.Address, tbl_Place.picture, tbl_Category.Cat_Type FROM tbl_Place INNER JOIN tbl_Category ON tbl_Place.Category_ID = tbl_Category.ID_Category WHERE tbl_Place.ID_Place = " . $place_id . ";";
		$result = mysqli_query($conn, $sql);
		return $result;
	}
	
	class myPlace {
		public $picture;
		public $title;
		public $description;
		public $address;
		public $category;
		
		function __construct() {
			$pResult = getPlace($_GET['place_id']);
			if($pResult != null && (mysqli_num_rows($pResult) > 0)){
				$row = mysqli_fetch_assoc($pResult);
				$this->title = $row["Title"];
				$this->description = $row["Description"];
				$this->address = $row["Address"];
				$this->picture = "subpages/pictures/places/" . $row["picture"];
				$this->category = $row["Cat_Type"];
			}
		}
	}

?>