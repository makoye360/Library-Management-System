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
        <li class="current_page_item"><a href="bookSearch.php">Borrow</a>
        <li><a href="contacts.php">Contacts</a></li>
         <li><a href="../index.php">Log out</a></li>
         </ul>
    	</div>
      <?php
        $sql = "SELECT * from book where bookID='".$_GET["id"]."' ";
        $results = mysqli_query ($connect, $sql);
        $row = mysqli_fetch_array($results);
        ?>
    	<div id="contentright">
		      <div class="bookform">
                <br>
                <br>
           <table border="0">
              <form method="POST" action="borrowInsert.php">
             <input name="bookID" type="hidden" value="<?php echo $row["bookID"]; ?>"/>
             <tr>
              <td id="lab"><label>Book Title :</label></td>
              <td id="cell"><input readonly type="text" name="title" required placeholder="Book Title" value="<?php echo $row["title"]; ?>" /></td>
              </tr>
                <tr>
                <td id="lab"><label>Author :</label></td>
                <td id="cell"><textarea readonly name="author" required cols="39" rows="2" placeholder="Book Authors"><?php echo $row["author"]; ?></textarea>
                </td>
                </tr>
                <tr>
                <td id="lab"><label>Day(s) :</label></td>
                <td id="cell">
                <select name="day" placeholder="Days" id="select">
                  <option value="1" selected>1 Day</option> 
                  <option value="2">2 Days</option>
                  <option value="3">3 Days</option>
                  <option value="4">4 Days</option>
                  <option value="5">5 Days</option>
                  <option value="6">6 Days</option>
                  <option value="7">7 Days</option>
                  <option value="8">8 Days</option>
                  <option value="9">9 Days</option>
                  <option value="10">10 Days</option>
                  <option value="11">11 Days</option>
                  <option value="12">12 Days</option>
                  <option value="13">13 Days</option>
                  <option value="14">14 Days</option>
                </select>
                </td></tr>
                <tr>
                <td>&nbsp;</td>
                <td><button type="submit">Borrow</button></td>
                </tr>
              </form>
            </table>
            </div>
    	</div>
    </div>
  <!--end frontpage-main-->
  <div id="footer">
   <p align="center" class="copyright">Copyright &copy; - All Rights Reserved </p>
  </div>
</div>
</body>
</html>