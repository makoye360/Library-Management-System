<?php
require_once('authenticate.php');
require_once ('../connection.php'); 

$bookID=trim($_GET['bookID']);
$borrowerID=trim($_GET['borrowerID']);
 
if(empty($bookID) || empty($borrowerID)){
  session_start();
  $_SESSION['alert']="Please, select a record to delete.";
    header("location:borrowInfo.php");
  } 
   else{

		$sql="DELETE from borrow where bookID='$bookID' and borrowerID='$borrowerID' ";
		$results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
		

          $sql="SELECT noOfCopies from book where bookID='$bookID'";
          $results=mysqli_query ($connect, $sql);
          $row = mysqli_fetch_array($results);
          $noOfCopies=$row["noOfCopies"];
          $noOfCopies++;

          $sql="UPDATE book SET noOfCopies='$noOfCopies' WHERE bookID='$bookID' ";
          $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));

          header("location:borrowInfo.php");

   }
?>
