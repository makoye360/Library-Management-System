<?php
	require('connection.php');

	$phone=trim($_post['code'].['phone']);

	$sql="insert into contact values('$phone')";
	$results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
	
?>