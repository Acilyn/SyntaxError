<?php
	session_start();
	
	$servername = 'localhost';
	$db_database = 'owend2014';
	$db_username = 'owend2014';
	$db_password = 'code69red';
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
	
	function getComments($place_id){
		global $conn;
		if(!$conn) return null;
		$sql = "SELECT "; //WRITE THE SQL STATEMENT
		$result = mysqli_query($conn, $sql);
	}
	
	class myPlace {
	    public $id;
		public $picture;
		public $title;
		public $description;
		public $address;
		public $category;
		public $comments;
		
		function __construct() {
			$pid = $_GET['place_id'];
			$pResult = getPlace($pid);
			if($pResult != null && (mysqli_num_rows($pResult) > 0)){
				$row = mysqli_fetch_assoc($pResult);
				$this->id = $row["Place_ID"];
				$this->title = $row["Title"];
				$this->description = $row["Description"];
				$this->address = $row["Address"];
				$this->picture = "subpages/pictures/places/" . $row["picture"];
				$this->category = $row["Cat_Type"];
			}
			$pResult = getComments($pid);
			if($pResult != null && (mysqli_num_rows($pResult) > 0)){
				while($row = mysqli_fetch_assoc($pResult)){
					$comments .= "<div>";
					$comments .= $row["User"] . " - " $row["CommentTS"]; //User - Timestamp
					$comments .= "<hr>"; //horizontal bar
					$comments .= $row["Comment"]; //comments
					$comments .= "</div>";
				}
				
			}
		}
	}
	
	
	
	

?>