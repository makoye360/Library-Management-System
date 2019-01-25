<?php
session_start();
require_once "connection.php"; 

$username=$_POST['username']; 
$password=$_POST['password'];

// To protect MySQL injection 
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($connect, $username);
$password = mysqli_real_escape_string($connect, $password);

$sql="select firstName,lastName,memberType,member.memberID,level from member join userlogin on member.memberID=userlogin.memberID and username='$username' and password=md5('$password')";

$result=mysqli_query($connect,$sql);
$count=mysqli_num_rows($result);

if($count==1){
$row = mysqli_fetch_array($result);

$_SESSION['firstName']=$row['firstName'];
$_SESSION['lastName']=$row['lastName'];
$_SESSION['memberType']=$row['memberType'];
$_SESSION['memberID']=$row['memberID'];
$_SESSION['level']=$row['level'];

if($row['level']=="Librarian")
header("location:librarian/index.php");
else if($row['level']=="Member")
header("location:member/index.php");
else{$_SESSION['alert']="Sorry, No permission to any page.";
header("location:index.php"); 
echo $row['level'];}
}

else{$_SESSION['alert']="Incorrect username or password";	
header("location:index.php");}
?>