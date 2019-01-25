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
</head>
  <?php

                  $memberID=$_SESSION['memberID'];
                  $sqlCopy="select count(borrowerID) as NoOfBooksBorrowed from borrow where borrowerID='".$memberID."' ";
                  $resultCopy=mysqli_query($connect, $sqlCopy);
                  $rowCopy=mysqli_fetch_array($resultCopy);
                  $bookBorrowed= $rowCopy['NoOfBooksBorrowed'];

          if(isset($_GET['search'])){
                    
                  if ($bookBorrowed<5){

      
                      // How many adjacent pages should be shown on each side?

                      $adjacents = 3;

                      

                      /* 

                         First get total number of rows in data table. 

                         If you have a WHERE clause in your query, make sure you mirror it here.

                      */


                      $query = "SELECT COUNT(*) as num FROM book WHERE title LIKE '%".$_GET["search"]."%' OR author LIKE '%".$_GET["search"]."%'";
                      
                      $total_pages = mysqli_fetch_array(mysqli_query($connect, $query));

                      $total_pages = $total_pages['num'];

                      

                      /* Setup vars for query. */

                      $getSearch=$_GET["search"];
                      $targetpage = "bookSearch.php?search=$getSearch";   //your file name  (the name of this file)

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

                      $sql = "SELECT * FROM book WHERE title LIKE '%".$_GET["search"]."%' OR author LIKE '%".$_GET["search"]."%' ORDER BY noOfCopies DESC LIMIT $start, $limit ";
                      
                      
                      $result = mysqli_query($connect, $sql);
                      

                      

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

                          $pagination.= "<a href=\"$targetpage&page=$prev&limit=$limit\">previous</a>";

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

                              $pagination.= "<a href=\"$targetpage&page=$counter&limit=$limit\">$counter</a>";          

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

                                $pagination.= "<a href=\"$targetpage&page=$counter&limit=$limit\">$counter</a>";          

                            }

                            $pagination.= "...";

                            $pagination.= "<a href=\"$targetpage&page=$lpm1&limit=$limit\">$lpm1</a>";

                            $pagination.= "<a href=\"$targetpage&page=$lastpage&limit=$limit\">$lastpage</a>";    

                          }

                          //in middle; hide some front and some back

                          elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))

                          {

                            $pagination.= "<a href=\"$targetpage&page=1&limit=$limit\">1</a>";

                            $pagination.= "<a href=\"$targetpage&page=2&limit=$limit\">2</a>";

                            $pagination.= "...";

                            for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)

                            {

                              if ($counter == $page)

                                $pagination.= "<span class=\"current\">$counter</span>";

                              else

                                $pagination.= "<a href=\"$targetpage&page=$counter&limit=$limit\">$counter</a>";          

                            }

                            $pagination.= "...";

                            $pagination.= "<a href=\"$targetpage&page=$lpm1&limit=$limit\">$lpm1</a>";

                            $pagination.= "<a href=\"$targetpage&page=$lastpage&limit=$limit\">$lastpage</a>";    

                          }

                          //close to end; only hide early pages

                          else

                          {

                            $pagination.= "<a href=\"$targetpage&page=1&limit=$limit\">1</a>";

                            $pagination.= "<a href=\"$targetpage&page=2&limit=$limit\">2</a>";

                            $pagination.= "...";

                            for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)

                            {

                              if ($counter == $page)

                                $pagination.= "<span class=\"current\">$counter</span>";

                              else

                                $pagination.= "<a href=\"$targetpage&page=$counter&limit=$limit\">$counter</a>";          

                            }

                          }

                        }

                        

                        //next button

                        if ($page < $counter - 1) 

                          $pagination.= "<a href=\"$targetpage&page=$next&limit=$limit\">next</a>";

                        else

                          $pagination.= "<span class=\"disabled\">next</span>";

                        $pagination.= "</div>\n";   

                      }
                     
                 }
            }
      ?>

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
      <div id="contentright">
          <div>
          <br/>
          <div> 
            <div class="search">
            <form method="GET" action="bookSearch.php">
            <input  required name="search" type="text" 
            placeholder="Search for author or book title or both"
            id="search" value="<?php if(isset($_GET['search'])) echo $_GET['search']; ?>">
            <input type="submit" value="Search" id="search_button"> 
            </form>
            </div>
          </div>
             <div style="height: 295px; clear: both;">
             <?php if(isset($_GET['search'])){
                  if($bookBorrowed<5){
              ?>
                  <table id='table-style' summary='Book Info'>
                    <thead>
                      <tr>
                        <th scope='col'>Title</th>
                          <th scope='col'>Author</th>
                          <th scope='col'>Copies</th>
                          <th scope='col'>Borrow</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php } 
                           else{ 
                            echo "<p style='font-weight:bolder;color:red;font-size:16px;text-align:center;'>
                            You can not borrow more than 5 books.</p>";}

                         }
                      ?>
                    <?php if(isset($_GET['search'])){
                             if($bookBorrowed<5){
                            while($row=mysqli_fetch_array($result)){
                          ?>
                          <tr>
                            <td width="30%"><?php echo $row['title']; ?></td>
                            <td width="40%"><?php echo $row['author']; ?></td>
                          <td width="10%"><?php echo $row['noOfCopies']; ?></td>
                            <td width="20%"> 
                            
                            <?php 
                                $copy=$row['noOfCopies'];
                               if($copy>0){
                                 $borrowerID=$_SESSION['memberID'];

                                 $sqlCheck="select bookid from borrow where bookid='".$row['bookID']."' and borrowerid='".$borrowerID."'";
                                 $resultCheck=mysqli_query($connect, $sqlCheck);
                                 $count=mysqli_num_rows($resultCheck);
                                    if($count==1)
                                     echo "<span style='color:red;'><b>Borrowed</b></span>";
                                    else
                                   echo "<a href='bookSearchDetails.php?id=".$row['bookID']."'>Borrow</a>";
                                    
                                 }
                               else{
                                echo "<b>Due Date:</b>";
                             
                              $sqlDate="select returndate from book join borrow on book.bookid = borrow.bookid where book.bookid='".$row['bookID']."' order by returndate asc limit 3";
                              $resultDate= mysqli_query($connect, $sqlDate);
                              while($rowDate=mysqli_fetch_array($resultDate)){
                                echo "<br>";
                                echo date('d-M-Y', strtotime($rowDate['returndate']));
                                 }
                              }
                             ?>
                            </td>
                          </tr>
                            <?php } } ?>
                      </tbody>
                    </table>
                    <?php } ?>
              </div><br>
                    <div style="background-color:;position:;bottom:90px;left:0%">
                       <div align="center" style="height:30px;"> 
                       <div> <?php 
                       if(isset($_GET['search'])){
                        if($bookBorrowed<5){
                       echo $pagination; }}?></div>
                       </div>
                    </div>

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