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
    <h3 style="color:#009;font-family: 'Lucida Sans Unicode', 'Lucida Grande', Sans-Serif;font-size: 16px;">IFM Library Management System</h3>
  </div>
</div>
<div class="form">
  <div class="thumbnail"><img src="img/logo.png"/></div>
    <form class="" method="POST" action="validateUser.php">
    <input type="text" name="username" placeholder="Username" required />
    <input type="password" name="password" placeholder="Password" required />
    <button>Login</button>
    <p class="message">Not registered? 
    <a href="registerForm.php">Create an account</a></p>
  </form>
  <br>
  <?php
        if (isset($_SESSION['alert'])) {
           echo  '<span style="color:red;" >';
           echo $_SESSION['alert'];
           echo '</span><br><br>';
         }  
         unset($_SESSION['alert']);
         
    ?>
</div>
</body>
</html>