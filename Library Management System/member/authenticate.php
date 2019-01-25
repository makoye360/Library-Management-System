<?php
    session_start();

	if(!isset($_SESSION['memberID']) || (trim($_SESSION['memberID']) == '') || 
	$_SESSION['level'] !='Member') {
		$_SESSION['alert']="Sorry, only registered Member have access to that page";
		header("location: ../index.php");
		exit();
	}
?>