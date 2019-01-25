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
  			<span id="headerText"><h2>The Institute of Finance Management</h2>
          <span id="library">
           <h4>Library Management System</h4>
           </span>
  		 </span>
  </div>  	
    <div id="featured-section">
    	<div id="contentleft">
    		<ul class="menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="bookBorrow.php">Books Borrowed</a></li>
        <li><a href="bookSearch.php">Borrow</a></li>
        <li class="current_page_item"><a href="contacts.php">Contacts</a></li>
         <li><a href="../index.php">Log out</a></li>
         </ul>
    		
    	</div>
    	<div id="contentright" style="align:center;">
       <div style="align:center; padding: 50px 100px;">

                IFM Library<br/>
                5 Shaaban Robert St<br/>
                Dar es Salaam, Dar es Salaam<br/>
                Tanzania<br/>
                +255222112931-4; rector@ifm.ac.tz<br/>

                Type: Library<br/>

                Web site: <a href="http://www.ifm.ac.tz/">http://www.ifm.ac.tz/</a><br/>

                Description: P.O.Box: 3918<br/>

                Location: Block A Second Floor
    	</div>
    </div>
  <!--end frontpage-main-->
  <br/>
  <br>
  <div id="footer">
   <p align="center" class="copyright">Copyright &copy; - All Rights Reserved </p>
  </div>
</div>
</div>
</body>
</html>