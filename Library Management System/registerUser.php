<?php
require_once ('connection.php');
session_start();
       $regNo=trim($_POST['regNo']);
       $username=trim($_POST['username']);
       $password=trim($_POST['password']);
       $rePassword=trim($_POST['rePassword']);

   if(empty($regNo) || empty($username) || empty($password) || empty($rePassword) ){
     $_SESSION['alert']="Please, Fill all required fields.";
     header("location:registerForm.php");
    }	
    else {

        if($password==$rePassword){
        $sql="select memberID from member where memberID='".$regNo."' ";
        $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
        $row=mysqli_fetch_array($results);
        $memberID=$row['memberID'];
        $regNo=strtoupper($regNo);

        if($memberID==$regNo){
             $sql="select memberID from userlogin where memberID='".$regNo."' ";
		     $results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));
		     $row=mysqli_fetch_array($results);
		     if($row){
                $_SESSION['alert']="You already have an account";
     			header("location:registerForm.php");
		     }
		     else{
		     	$sql= "SELECT userID from userlogin order by userID desc limit 1";
				$results = mysqli_query ($connect, $sql);
				$row = mysqli_fetch_array($results);
				$userID= $row["userID"];
				$userID++;
				/*$userID="$userID";
				$number="1";
				$userID=$userID+$number;*/

				$sql="INSERT into userlogin values('$userID','$username', md5('$password'), 'Member', '$memberID')";
				$results=mysqli_query ($connect, $sql) or die(mysqli_error($connect));

				if($results){
					$_SESSION['success']="You have successfully registered";
     			    header("location:registerForm.php");
				}else{echo "Insert goes wrong";}

		     }

           }
        	else{
	        $_SESSION['alert']="You're unvalid IFM Student/Lecturer";
	        header("location:registerForm.php");}

        }
        else{
        $_SESSION['alert']="Password do not match.";
        header("location:registerForm.php");}
	}

   mysqli_close($connect);
?>