<?php
require_once('authenticate.php');
require_once ('../connection.php'); 

       session_start();
       $username=trim($_POST['username']);
       $password=trim($_POST['password']);
       $userID=trim($_POST['id']);

   if(empty($username) || empty($password) ){
     $_SESSION['alert']="Please, Fill all required fields.";
     header("location:userEdit.php?id=$userID");
    } 
    else {

        $sql="select username from userLogin where username='".$username."' and userID!='".$userID."' ";
        $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
        $row=mysqli_fetch_array($results);
        if($row){
          $_SESSION['alert']="That Username was already existed";
          header("location:userEdit.php?id=$userID");
         }
         else{
             $sql="UPDATE userLogin SET 
            username= '". $username ."',
            password= MD5('".$password."') WHERE userID='". $userID ."' ";
            $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));

        if($results){
          $_SESSION['success']="User was successfully updated";
              header("location:userEdit.php?id=$userID");
        }else{
          $_SESSION['alert']="Updation Went Wrong";
              header("location:userEdit.php");
            }

         }
       }

   mysqli_close($connect);
?>