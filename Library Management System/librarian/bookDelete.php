<?php
require_once('authenticate.php');
require_once ('../connection.php'); 

if(empty(trim($_GET['id']))){
  session_start();
  $_SESSION['alert']="Please, select a book to delete.";
    header("location:bookInfo.php");
} else{
$sql="DELETE from book where bookID='".$_GET['id']."' ";
$results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
header("location:bookInfo.php");
}
?>
