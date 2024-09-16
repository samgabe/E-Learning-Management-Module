<?php
session_start();
include'server/database.php';
// checking session is valid for not 
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
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

    <title>Staff || Manage Lessons</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/bootstrap.min.css">

    <style type="text/css">
   .btn-file {
    position: relative;
    overflow: hidden;
   }
   .btn-file input[type=file] {
       position: absolute;
       top: 0;
       right: 0;
       min-width: 100%;
       min-height: 100%;
       font-size: 100px;
       text-align: right;
       filter: alpha(opacity=0);
       opacity: 0;
       outline: none;
       background: white;
       cursor: inherit;
       display: block;
   }
   #preview{margin-bottom: 35px;}
   .footer{position: absolute; bottom:0; left: 0; text-align: center;}
     </style>

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
                          <span>Upload Courses</span>
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
          	<h3><i class="fa fa-angle-right"></i> Upload Lessons</h3>
            <h4><i class="fa fa-angle-right"></i> <a href="view-lessons.php">View Lessons</a></h4>

				<div class="col-md-12">
           <div class="content">
               <form id="upload">
                  <div class="row">
                     <div class="col-sm-12" id="result"></div>
                     <div class="col-md-12 col-sm-12">
                        <div class="form-group bottom35">
                           <label>Lesson Title:</label>
                           <input class="form-control" type="text" placeholder="Lesson Title" required id="title" name="title">
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-6">
                        <div class="form-group bottom35">
                           <label>Lesson Unit Code:</label>
                           <input class="form-control" type="text" placeholder="Lesson Code:" required id="code" name="code">
                        </div>
                     </div> 
                     <div class="col-md-6 col-sm-6">
                        <div class="form-group bottom35">
                           <label>Lesson Due Date:</label>
                           <input class="form-control" type="date" placeholder="Phone:" id="phone" name="date">
                        </div>
                     </div>
                     <div class="col-md-6 col-sm-6 bottom35">
                        <div class="form-group bottom35">
                           <label>Lesson Media:</label>                              
                           <span class="btn btn-default btn-block btn-file">
                               Select & Upload Lesson Media Files
                               <input type="file" accept="video/mp4,video/x-m4v,video/*" name="file" onchange="loadFile(event)">
                           </span> 
                        </div>
                     </div> 

                     <div class="col-md-12 col-sm-12">
                        <div class="input-group input-file" name="file-preview">
                            <video  class="img preview img-responsive" id="preview"></video> 
                        </div>
                     </div>

                     <div class="col-sm-12">
                        <button  align="right" type="submit" class="btn btn-primary btn-signup" id="submit_btn">Save Lesson</button>
                     </div>
                  </div>

                  
            </form>            
         

           </div>    
    
         </div>
        
     </section>
   </section>
 </section>

  
    <script src="assets/js/jquery.js"></script>
    <script src="assets/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/sweetalert2@9.js"></script>
   
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
  <script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>
  <script type="text/javascript">
   
   var loadFile = function(event) {
      var output = document.getElementById('preview');
      output.src = URL.createObjectURL(event.target.files[0]);
      output.controls = 1; 
   };
 

   $('#upload').submit( function(e){
      e.preventDefault();
      var data =  new FormData(this); 
      data.append('upload', true);
       $.ajax( {
            url:'server/ftp.php',
            type: 'POST',
            data: data,
            processData: false,
            contentType: false
        })
        .done( function (res){ 
             response = JSON.parse(res)
              console.log(response);
             if(response.code==200){
                 Swal.fire({
                  icon: 'success',
                  title: 'Lesson saved successfully',
                  showConfirmButton: false,
                  timer: 3000
                }) 
               }
               else
               {
                  Swal.fire({
                      icon: 'warning',
                      title: 'Ooops! Something went wrong.'+e,
                      showConfirmButton: false,
                      timer: 3000
                  }) 
               }
        })
        .fail( function (e) {
            Swal.fire({
                icon: 'warning',
                title: 'Lesson saved failed \nError: '+e,
                showConfirmButton: false,
                timer: 3000
            }) 
        });

    return false;   
   });

</script>

  </body>
</html>
