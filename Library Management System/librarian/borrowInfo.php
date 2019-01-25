<?php
    require_once('authenticate.php');
    require_once ('../connection.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <title>Library Management System</title>
	<link type="text/css" rel="stylesheet" href="../css/style.css" />
  <link type="text/css" rel="stylesheet" href="../css/pagination.css" />
  <script type="text/javascript">
    function confirmSubmit(){
   var agree=confirm("Are you sure you want to Delete this Record?");
    if (agree)
        return true ;
    else
        return false ;
   }
  </script>
</head>
  <?php

                      // How many adjacent pages should be shown on each side?

                      $adjacents = 5;

                      

                      /* 

                         First get total number of rows in data table. 

                         If you have a WHERE clause in your query, make sure you mirror it here.

                      */

                      $query = "SELECT COUNT(*) as num FROM borrow";
                      
                      $total_pages = mysqli_fetch_array(mysqli_query($connect, $query));

                      $total_pages = $total_pages['num'];

                      

                      /* Setup vars for query. */

                      $targetpage = "borrowInfo.php";   //your file name  (the name of this file)

                      $limit = 3;                //how many items to show per page
                      if(isset($_GET['limit']))
                      $limit=$_GET['limit'];
                  
                      if(isset($_GET['page']))
                       $page = $_GET['page'];
                       else
                        $page=1;

                      if($page) 

                        $start = ($page - 1) * $limit;      //first item to display on this page

                      else

                        $start = 0;               //if no page var is given, set start to 0

                      

                      /* Get data. */

                      $sql = "SELECT *, datediff(returnDate, current_date) as datediff FROM  borrow ORDER BY borrowerID DESC LIMIT $start, $limit ";
                      
                      
                      $result = mysqli_query($connect, $sql);
                      $numRows= mysqli_num_rows($result);

                      

                      /* Setup page vars for display. */

                      if ($page == 0) $page = 1;          //if no page var is given, default to 1.

                      $prev = $page - 1;              //previous page is page - 1

                      $next = $page + 1;              //next page is page + 1

                      $lastpage = ceil($total_pages/$limit);    //lastpage is = total pages / items per page, rounded up.

                      $lpm1 = $lastpage - 1;            //last page minus 1

                      

                      /* 

                        Now we apply our rules and draw the pagination object. 

                        We're actually saving the code to a variable in case we want to draw it more than once.

                      */

                      $pagination = "";

                      if($lastpage > 1)

                      { 

                        $pagination .= "<div class=\"pagination\">";

                        //previous button

                        if ($page > 1) 

                          $pagination.= "<a href=\"$targetpage?page=$prev&limit=$limit\">previous</a>";

                        else

                          $pagination.= "<span class=\"disabled\">previous</span>"; 

                        

                        //pages 

                        if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up

                        { 

                          for ($counter = 1; $counter <= $lastpage; $counter++)

                          {

                            if ($counter == $page)

                              $pagination.= "<span class=\"current\">$counter</span>";

                            else

                              $pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";          

                          }

                        }

                        elseif($lastpage > 5 + ($adjacents * 2))  //enough pages to hide some

                        {

                          //close to beginning; only hide later pages

                          if($page < 1 + ($adjacents * 2))    

                          {

                            for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)

                            {

                              if ($counter == $page)

                                $pagination.= "<span class=\"current\">$counter</span>";

                              else

                                $pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";          

                            }

                            $pagination.= "...";

                            $pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

                            $pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";    

                          }

                          //in middle; hide some front and some back

                          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

                          {

                            $pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

                            $pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

                            $pagination.= "...";

                            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

                            {

                              if ($counter == $page)

                                $pagination.= "<span class=\"current\">$counter</span>";

                              else

                                $pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";          

                            }

                            $pagination.= "...";

                            $pagination.= "<a href=\"$targetpage?page=$lpm1&limit=$limit\">$lpm1</a>";

                            $pagination.= "<a href=\"$targetpage?page=$lastpage&limit=$limit\">$lastpage</a>";    

                          }

                          //close to end; only hide early pages

                          else

                          {

                            $pagination.= "<a href=\"$targetpage?page=1&limit=$limit\">1</a>";

                            $pagination.= "<a href=\"$targetpage?page=2&limit=$limit\">2</a>";

                            $pagination.= "...";

                            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

                            {

                              if ($counter == $page)

                                $pagination.= "<span class=\"current\">$counter</span>";

                              else

                                $pagination.= "<a href=\"$targetpage?page=$counter&limit=$limit\">$counter</a>";          

                            }

                          }

                        }

                        

                        //next button

                        if ($page < $counter - 1) 

                          $pagination.= "<a href=\"$targetpage?page=$next&limit=$limit\">next</a>";

                        else

                          $pagination.= "<span class=\"disabled\">next</span>";

                        $pagination.= "</div>\n";   

                      }
       

      ?>


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
        <li><a href="bookInfo.php">Books</a></li>
        <li class="current_page_item"><a href="borrowInfo.php">Books Borrowed</a></li>
        <li><a href="userInfo.php">Users</a></li>
        <li><a href="contacts.php">Contact</a></li>
        <li><a href="../index.php">Log out</a></li>
         </ul>
    		
    	</div>
    	<div id="contentright">

          <div>
          <br/>
          <div class="search">
          <form method="GET" action="borrowSearch.php">
          <input name="search" type="text" placeholder="Search for BorrowerID or bookID"  id="search">
          <input name="do" type="submit" value="Search" id="search_button"> 
          </form>
          </div>
          <div style="height: 295px;">
                  <table id="table-style" summary="Borrower Info">
                   <?php
                   if($numRows>0){
                    echo " <thead>
                          <tr>
                            <th scope='col'>Borrower ID</th>
                              <th scope='col'>Book ID</th>
                              <th scope='col'>Issue Date</th>
                              <th scope='col'>Return Date</th>
                              <th scope='col'>Days to Return</th>
                              <th scope='col'>Returned ? </th>
                          </tr>
                          </thead>
                          <tbody> ";
                            }
                          ?>
                         <?php
                            while($row=mysqli_fetch_array($result)){
                          ?>
                              
                          <tr>
                            <td><?php echo $row['borrowerID']; ?></td>
                            <td><?php echo $row['bookID']; ?></td>
                            <td><?php echo $row['issueDate']; ?></td>
                            <td><?php echo $row['returnDate']; ?></td>
                            <td><?php 
                                $date=$row['datediff'];
                                            if($date<0)
                                                 echo "<b style='color:red'>".abs($date)."</b> day(s) exceeded.";
                                                else if($date==0) 
                                                 echo "<b style='color:green'>Today</b>";
                                                 else
                                                 echo "<b style='color:blue'>".abs($date)."</b> day(s) remained.";            

                            ?>
                            </td>
                            <td>
                            &nbsp;&nbsp;
                             <span><a onclick="return confirmSubmit()" href="borrowDelete.php?bookID=<?php echo $row['bookID']; ?>&borrowerID=<?php echo $row['borrowerID']; ?>">YES</a>&nbsp;/ &nbsp;NO</span>
                              </td>
                          </tr>
                            <?php } ?>
                      </tbody>
                    </table>
          </div>

                    <div style="background-color:;position:;bottom: 90px;left:0%">
                       <div align="center" style="height:30px; "> 
                       <div> <?php echo $pagination; ?></div>
                       </div>
                    </div>
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