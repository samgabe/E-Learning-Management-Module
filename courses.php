<?php 
session_start();
include'server/database.php';
// Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  }   	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Learning || Courses</title>
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
			<div class="home_link">
				<a href="courses-registration.php">
					<span class="icon"><i class="far fa-registered"></i></span>
					<span>Register</span>
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
		            <a href="courses.php" class="active">
		              <span class="icon"><i class="fas fa-university"></i></span>
		              <span class="list">Courses </span>
		            </a>
		          </li>
		          
		          <li>
		            <a href="lessons.php">
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
	                  	  	  <h4><i class="fa fa-angle-right"></i> Available Courses </h4>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                  <th>Cno.</th>
                                  <th class="hidden-phone">Course's Name</th>
                                  <th> Status</th>
                                  <th> View</th>
                              </tr>
                              </thead>
                              <tbody>
                              <?php $ret=mysqli_query($con,"select * from courses");
							  $cnt=1;
							  while($row=mysqli_fetch_array($ret))
							  {?>
                              <tr>
                              <td><?php echo $cnt;?></td>
                                  <td><?php echo $row['coursename'];?></td>
                                  <td><?php 
                        if ($row['status']==0) {
                          # code...
                          echo "<p>Available</p>";
                        }
                        else{
                          echo "<p>Not Available</p>";
                        }
                        ?></td>
                                  <td>
                                     
                                     <a href="courses-registration.php"> 
                                     <button class="btn btn-danger btn-xs" onClick="return confirm('Click on it to Register the Course.');"><i class="far fa-eye "></i></button></a>
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
