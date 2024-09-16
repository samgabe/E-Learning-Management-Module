<?php 
session_start();
include'server/database.php';
include'download.php';
// Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{  	

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Learning || Lessons</title>
	<script type="text/javascript" src="assets/js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
	<script src="assets/js/jquery-1.11.1.js"></script>
	<script src="assets/js/jquery-1.11.1.min.js"></script>
	<script src="assets/js/wow.js"></script>
	<script src="assets/js/placeholder.js"></script>
	<script>
		$(document).ready(function(){
			$(".hamburger").click(function(){
			  $(".wrapper").toggleClass("active")
			})
		});
	</script>
</head>
<body>
	

<div class="wrapper">

	<div class="top_navbar">
		<div class="logo">
			<a href="#">Student Panel</a>
		</div>
		<div class="top_menu">
			<div class="home_link">
				<a href="#">
					<span class="icon"><i class="fas fa-home"></i></span>
					<span>Home</span>
				</a>
			</div>
			
			<div class="profile_wrap">
					<div class="icon">
						<i class="fas fa-users"></i>
						Welcome <?php echo $_SESSION["name"]; ?>! Click to <a href="logout.php">Logout</a>.
					</div>
				</div>
			<div class="right_info">
<?php 
$sql_get = mysqli_query($con, "SELECT * FROM messages WHERE status=0");
$count = mysqli_num_rows($sql_get);

?>
			<a href="messages.php">
				<div class="icon_wrap">
					<div class="icon">
						<i class="fas fa-bell"></i>
						 <span badge badge-primary id="count"><?php echo $count; ?></span>
					</div>
				</div>
			</a>
			   

				<a href="change-password.php">
				<div class="icon_wrap">
					<div class="icon">
						<i class="fas fa-cog"></i>
					</div>
				</div>
				</a>
			</div>
		</div>
	</div>

	<div class="main_body">
		
		<div class="sidebar_menu">
	        <div class="inner__sidebar_menu">
	        	
	        	<ul>
		          <li>
		            <a href="dashboard.php" >
		              <span class="icon">
		              	<i class="fa fa-border-all"></i></span>
		              <span class="list">Dashboard</span>
		            </a>
		          </li>
		          <li>
		            <a href="courses.php" >
		              <span class="icon"><i class="fas fa-university"></i></span>
		              <span class="list">Courses </span>
		            </a>
		          </li>
		          
		          <li>
		            <a href="lessons.php" class="active">
		              <span class="icon"><i class="fas fa-book-open"></i></span>
		              <span class="list">Lessons</span>
		            </a>
		          </li>
		          <li>
		            <a href="messages.php"> 
		              <span class="icon"><i class="fas fa-bell"></i></span>
		              <span class="list">Messages</span>
		            </a>
		          </li>
		          <li>
		            <a href="student_info.php">
		              <span class="icon"><i class="fas fa-user-graduate"></i></span>
		              <span class="list">Student Info</span>
		            </a>
		          </li>
		          
		        </ul>

		        <div class="hamburger">
			        <div class="inner_hamburger">
			            <span class="arrow">
			                <i class="fas fa-long-arrow-alt-left"></i>
			                <i class="fas fa-long-arrow-alt-right"></i>
			            </span>
			        </div>
			    </div>

	        </div>
	    </div>

	    <div class="container">

	    	<table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> All Lessons Media Uploaded </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Lno.</th>
                                  <th class="hidden-phone"> Lesson Title</th>
                                  <th> Unit Code</th>
                                  <th> Due Date</th>
                                  <th> Lessons</th>
                                  <th> Upload Date</th>
                                  <th> Download</th>
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
                                     <a href="download.php?lid=<?php echo $row['lesson']; ?>">
									 <button class="btn btn-primary btn-xs"><i class="fa fa-download" aria-hidden="true"></i></button> 
									 </a>
                                  </td>
                              </tr>
                              <?php $cnt=$cnt+1; }?>
                             
                              </tbody>
                          </table>
	    	
	    </div>
	    </div>
	</div>
</div>

</body>
</html>
<?php } ?>