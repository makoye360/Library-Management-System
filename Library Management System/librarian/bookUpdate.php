<?php
require_once('authenticate.php');
require_once ('../connection.php'); 

       session_start();
       $title=trim($_POST['title']);
       $author=trim($_POST['author']);
       $publisher=trim($_POST['publisher']);
       $noOfCopies=trim($_POST['noOfCopies']);
       $bookID=trim($_POST['id']);

   if(empty($title) || empty($author) || empty($publisher) || empty($noOfCopies) ){
     $_SESSION['alert']="Please, Fill all required fields.";
     header("location:bookEdit.php?id=$bookID");
    } 
    else {

        $sql="select title, author from book where title='".$title."' and author='".$author."' and bookID!='".$bookID."' ";
        $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
        $row=mysqli_fetch_array($results);
        if($row){
          $_SESSION['alert']="The Book was already existed";
          header("location:bookEdit.php?id=$bookID");
         }
         else{
             $sql="UPDATE book SET 
            title= '". $title ."',
            author= '". $author ."',
            publisher= '". $publisher ."',
            noOfCopies= '". $noOfCopies ."' WHERE bookID='". $bookID ."' ";
            $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));

        if($results){
          $_SESSION['success']="The Book was successfully updated";
              header("location:bookEdit.php?id=$bookID");
        }else{
          $_SESSION['alert']="Updation went Wrong";
              header("location:bookEdit.php");
            }

         }
       }

   mysqli_close($connect);
?>