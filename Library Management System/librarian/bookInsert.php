<?php
require_once('authenticate.php');
require_once ('../connection.php'); 

session_start();
       $title=trim($_POST['title']);
       $author=trim($_POST['author']);
       $publisher=trim($_POST['publisher']);
       $noOfCopies=trim($_POST['noOfCopies']);

   if(empty($title) || empty($author) || empty($publisher) || empty($noOfCopies) ){
     $_SESSION['alert']="Please, Fill all required fields.";
     header("location:bookForm.php");
    } 
    else {

        $sql="select title, author from book where title='".$title."' and author='".$author."' ";
        $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
        $row=mysqli_fetch_array($results);
        if($row){
          $_SESSION['alert']="The Book was already existed";
          header("location:bookForm.php");
         }
         else{
            $sql= "SELECT bookID from book order by bookID desc limit 1";
            $results = mysqli_query ($connect, $sql);
            $row = mysqli_fetch_array($results);
            $bookID= $row["bookID"];
            $bookID++;

        $sql="INSERT into book values('$bookID','$title','$author','$publisher', '$noOfCopies')";
        $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));

        if($results){
          $_SESSION['success']="The Book was successfully inserted";
              header("location:bookForm.php");
        }else{
          $_SESSION['alert']="Insertion Goes Wrong";
              header("location:bookForm.php");
            }

         }
       }

   mysqli_close($connect);
?>