<?php
session_start();
include'server/database.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for deleting user
if(isset($_GET['id']))
{
$adminid=$_GET['id'];
$msg=mysqli_query($con,"delete from lessons where id='$adminid'");
if($msg)
{
echo "<script>alert('Data deleted');</script>";
}
}
?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Staff, Template, Theme, Responsive, Fluid, Retina">

    <title>Staff || Manage Lessons</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <a href="#" class="logo"><b>Staff Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">
               
                         
                   
                </ul>
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="#"><img src="assets/img/friends/fr-05.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['login'];?></h5>
              	  	
                  <li class="mt">
                      <a href="change-password.php">
                          <i class="fa fa-file"></i>
                          <span>Change Password</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="manage-students.php" >
                          <i class="fa fa-users"></i>
                          <span>Manage Students</span>
                      </a>
                   
                  </li>
                  <li class="sub-menu">
                      <a href="view-courses.php">
                          <i class="fa fa-university"></i>
                          <span>Upload Courses<span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="view-lessons.php" >
                          <i class="fas fa-book-open"></i>
                          <span>Upload Lessons</span>
                      </a>
                   
                  </li>
                  <li class="sub-menu">
                      <a href="view-messages.php" >
                          <i class="far fa-comments"></i>
                          <span>Students Messages</span>
                      </a>
                   
                  </li>
              
                 
              </ul>
          </div>
      </aside>
      <section id="main-content">
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> Manage Lessons</h3>
            <h4><i class="fa fa-angle-right"></i><a href="upload-lessons.php">Upload Lessons</a></h4>
				<div class="row">
				
                  
	                  
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> Lesson Details </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Lno.</th>
                                  <th class="hidden-phone">Lesson Title</th>
                                  <th> Lesson Code</th>
                                  <th> Lesson Due Date</th>
                                  <th> Lesson Media</th>
                                  <th> Lesson Upload Date</th>
                                  <th> Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from lessons");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                                  <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['ltitle'];?></td>
                                  <td><?php echo $row['lcode'];?></td>
                                  <td><?php echo $row['due_date'];?></td>
                                  <td><?php echo $row['lesson'];?></td>  
                                  <td><?php echo $row['upload_date'];?></td>
                                  <td>
                                     
                                     <a href="view-lessons.php?id=<?php echo $row['id'];?>"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Do you really want to delete');"><i class="far fa-trash-alt "></i></button></a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
		</section>
      </section>
    </section>

    <footer  class="footer">
   <div class="container">
      <div class="row">
         <div class="col-md-12 col-sm-12 text-center"> 
            <p class="">Sam Gabe &copy; 2020 </p>
         </div>
      </div>
   </div>
    </footer>


    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>

  </body>
</html>
<?php } ?>