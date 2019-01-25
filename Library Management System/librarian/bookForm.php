<?php
    require_once('authenticate.php');
    require_once ('../connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Library Management System</title>
	<link type="text/css" rel="stylesheet" href="../css/style.css" />
</head>

<body class="home">
<div id="content">
    <div id="header"> 
  			<img src="../img/logo.png" />
  			<span id="headerText"><h2>The Institute of Finance Management</h3>
          <span id="library">
           <h4>Library Management System</h4>
           </span>
  		 </span>
  </div>  	
    	<div id="featured-section">
    	<div id="contentleft">
    		<ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li class="current_page_item"><a href="bookInfo.php">Books</a></li>
        <li><a href="borrowInfo.php">Books Borrowed</a></li>
        <li><a href="userInfo.php">Users</a></li>
        <li><a href="contacts.php">Contact</a></li>
        <li><a href="../index.php">Log out</a></li>
         </ul>
    		
    	</div>
    	<div id="contentright">
         <div class="form">
              <form method="POST" action="bookInsert.php">
             <input type="text" name="title" required placeholder="Book Title"/>
              <textarea name="author" required cols="39" rows="2" placeholder="Book Authors"></textarea>
                <input type="text" required name="publisher" placeholder="Publisher"/>
                <input type="text" required name="noOfCopies" placeholder="Number of copy"/>
                <br>
                <button type="submit">Submit</button>
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
                     echo  '<img height="18px" width="18px" src="../img/tick.png">&nbsp;';
                     echo   $_SESSION['success'];
                     echo '</span><br><br>';
                     unset($_SESSION['success']); 
                   } 

         
                  ?>
            </div>
    	</div>
    </div>
  <!--end frontpage-main-->
  <br/>
  <br>
  <div id="footer">
   <p align="center" class="copyright">Copyright &copy; - All Rights Reserved </p>
  </div>
</div>
</body>
</html>