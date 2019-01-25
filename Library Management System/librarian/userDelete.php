<?php
require_once('authenticate.php');
require_once ('../connection.php'); 

if(empty(trim($_GET['id']))){
  session_start();
  $_SESSION['alert']="Please, select a user to delete.";
    header("location:bookInfo.php");
} else{
$sql="DELETE from userLogin where userID='".$_GET['id']."' ";
$results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
header("location:userInfo.php");
}
?>
