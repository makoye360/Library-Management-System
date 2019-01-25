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
        <li class="current_page_item"><a href="index.php">Home</a></li>
        <li><a href="bookBorrow.php">Books Borrowed</a></li>
        <li><a href="bookSearch.php">Borrow</a>
        <li><a href="contacts.php">Contacts</a></li>
         <li><a href="../index.php">Log out</a></li>
         </ul>
    		
    	</div>
    	<div id="contentright">
          <div id="welcome">
       <p class="alignleft"> <b>WELCOME</b>, <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?>.</p>  
       <p class="alignright"><b>Level:</b> <?php echo $_SESSION['level']; ?></p>
      </div>

      <div style="text-align:center;width:90%;height:210px; padding:0 0 5px 22px;">
      <img src="../img/indxx.jpg" width="88%" height="210px" style="border-radius:5px;" >
       
      </div>
      <div id="ruedesfacs">

                <table  border="0" id="tableday">
                  <tr><td colspan="3"> OPENING HOURS  <hr height=2px; width=90%; solid; center aligned;></td>  </tr>

                  <tr> <td> Weekdays<hr height=2px; width=80%; solid; center aligned;></td><td> Weekends<hr height=2px; width=80%; solid; center aligned;></td><td> Public Holidays<hr height=2px; width=80%; solid; center aligned;></td></tr>
                  <tr> <td id="tdcontent" width="250"> Monday - Friday : </td><td id="tdcontent">Saturday: 8:00 - 17:00</td><td rowspan="2" id="tdcontent"> Closed</td></tr>
                  <tr><td id="tdcontent">8:00 - 20:30</td><td id="tdcontent">Sunday : 9:00 - 12:00</td></tr>
                </table>
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