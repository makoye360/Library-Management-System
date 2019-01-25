<?php
    session_start();
    
    unset($_SESSION['firstName']);
    unset($_SESSION['lastName']);
    unset($_SESSION['memberType']);
    unset($_SESSION['memberID']);
    unset($_SESSION['level']);
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
   <title>Library Management System</title>
      <link rel="stylesheet" href="css/loginRegister.css">
</head>

<body>  
<div class="container">
  <div class="info">
   <!-- <h3>Register Form</h3> -->
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/logo.png"/></div>
  <form class="login-form" method="POST" action="registerUser.php">
    <input type="text" name="regNo" placeholder="Registration Number" required />
    <input type="text" name="username" placeholder="Username" required/>
    <input type="password" name="password" placeholder="Password" required />
    <input type="password" name="rePassword" placeholder="Re-type password" required/>
    <button>Register</button>
  <p class="message">Already registered? <a href="index.php">Sign In</a></p>
  </form>
  <br>
  <?php
        if (isset($_SESSION['alert'])) {
           echo  '<span style="color:red;" >';
           echo   $_SESSION['alert'];
           echo '</span><br><br>';
           unset($_SESSION['alert']); 
         } 
         if (isset($_SESSION['success'])) {
           echo  '<span style="color:green;" >';
           echo  '<img height="18px" width="18px" src="img/tick.png">&nbsp;';
           echo   $_SESSION['success'];
           echo '</span><br><br>';
           unset($_SESSION['success']); 
         } 

         
    ?>
</div>
</body>
</html>
