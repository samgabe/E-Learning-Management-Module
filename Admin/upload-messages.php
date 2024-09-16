<?php
session_start();
include'server/database.php';
// checking session is valid ror not  
if (empty($_SESSION['id'])) {
    header('location:logout.php');
  }
//Upload Message
if (isset($_POST['send'])) {
  # code...
  $sender_name = $_POST['sender_name'];
  $message_title = $_POST['message_title'];
  $message = $_POST['message'];
  $date = date('y-m-d h:i:s');

  $sql = "INSERT INTO messages (sender_name,message_title
    ,message,posting_date) VALUES('$sender_name','$message_title','$message','$date')";
   mysqli_query($con, $sql);
  if ($sql) {
    # code...
    echo "<script>alert('Message sent Successfully.');</script>";
  }
  else
  {
    echo "<script>alert('Error in sending the message.');</script>";
    mysqli_close($con);
  }
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Staff, Template, Theme, Responsive, Fluid, Retina">

    <title>Staff || Students' Messages</title>
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
                      <a href="manage-stsudents.php" >
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
          	<h3><i class="fa fa-angle-right"></i> Manage Students' Messages</h3>

                <h4><i class="fa fa-angle-right"></i><a href="view-messages.php">View Message</a></h4>
	                  
                  <div class="col-md-12">
                      <div class="content">
                          
          <form method="post" action="" enctype="multipart/form-data" >
            <div class="row">
                <label>Sender's Name</label>
                <div>
                    <input type="text" class="form-control" name="sender_name"
                         placeholder="Enter your Name" required="">

                </div>
            </div>

            <div class="row">
                <label>Message Title</label>
                <div>
                    <input type="text" name="message_title" 
                        class="form-control"
                        placeholder="Enter the Message Title" required="">

                </div>
            </div>

            <div class="row">
                <label>Message</label>
                <div>
                    <textarea name="message"
                        class="form-control"> </textarea> 

                </div>
            </div>
      
            <br><br>
            
             <div class="row">
                <div align="right">
                    <button type="submit" name="send" 
                        class="btn btn-primary">Send</button>
                </div>
            </div>
            </form>
                </div>
                  </div>
                   
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
