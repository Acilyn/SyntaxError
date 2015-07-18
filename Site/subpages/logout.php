<?php
	session_start();
	require_once "sql/functions.php";
	unset($_SESSION['PHP_AUTH_USER']);
	unset($_SESSION['PHP_AUTH_SKEY']);
	
	redirectTo();
?>