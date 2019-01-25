<?php
    session_start();

	if(!isset($_SESSION['memberID']) || (trim($_SESSION['memberID']) == '') || 
	$_SESSION['level'] !='Librarian') {
		$_SESSION['alert']="Sorry, you dont have Librarian privilleges";
		header("location: ../index.php");
		exit();
	}
?>