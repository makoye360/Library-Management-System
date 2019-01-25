<?php
require_once('authenticate.php');
require_once ('../connection.php'); 

       //session_start();
       $borrowerID=$_SESSION['memberID'];
       $bookID=trim($_POST['bookID']);
       $day=$_POST['day'];

        $sql="INSERT into borrow values('$borrowerID','$bookID', current_date, adddate(current_date, '$day'))";
        $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));


          $sql="SELECT noOfCopies from book where bookID='$bookID'";
          $results=mysqli_query ($connect, $sql);
          $row = mysqli_fetch_array($results);
          $noOfCopies=$row["noOfCopies"];
          $noOfCopies--;

          $sql="UPDATE book SET noOfCopies='$noOfCopies' WHERE bookID='$bookID' ";
          $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));

        if($results){ 
          header("location:bookSearch.php");}
          else{echo "Insertion Goes Wrong"; }

   mysqli_close($connect);
?>