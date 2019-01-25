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
        <li class="current_page_item"><a href="index.php">Home</a></li>
        <li><a href="bookInfo.php">Books</a></li>
        <li><a href="borrowInfo.php">Books Borrowed</a></li>
        <li><a href="userInfo.php">Users</a></li>
        <li><a href="contacts.php">Contact</a></li>
        <li><a href="../index.php">Log out</a></li>
         </ul>
    		
    	</div>
    	<div id="contentright">
        <div id="welcome">
       <p class="alignleft"> <b>WELCOME</b>, <?php echo $_SESSION['firstName']." ".$_SESSION['lastName']; ?>.</p>  
       <p class="alignright"><b>Level:</b> <?php echo $_SESSION['level']; ?></p>
      </div>

      <div id="insidecontentright">
      <?php
        $BorrowedBooks=mysqli_num_rows(mysqli_query($connect,"select * from borrow"));
        $sql="select sum(noOfCopies) as SUM from book";
        $results=mysqli_query($connect, $sql);
        $row= mysqli_fetch_array($results);
        $AvailableBooks=$row['SUM'];

        $totalUsers=mysqli_num_rows(mysqli_query($connect,"select * from userLogin"));

      ?>
      <div id="panel">
      Borrowed Books
      <hr height=2px; width=80%; solid; center aligned;>
      <br>
      <p id="panelcontent"> <?php echo $BorrowedBooks; ?> </p>
      
      </div>

       <div id="panel">
       Available Books
      <hr height=2px; width=80%; solid; center aligned;>
      <br>
      <p id="panelcontent"><?php echo $AvailableBooks; ?></p>
      </div>

       <div id="panel">
      Total Users 
      <hr height=2px; width=80%; solid; center aligned;>
      <br>
      <p id="panelcontent"><?php echo $totalUsers; ?></p>
      </div>
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