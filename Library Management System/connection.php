<?php
$host="localhost";
$user="root";
$password="";
$db="lms";

$connect = mysqli_connect($host, $user, $password) or die("The Server can not create a connection");
$select_db = mysqli_select_db($connect, $db) or die("The Database was not found");
?>
