<?php

session_start();
include'server/database.php';
// checking session is valid for not 

if (empty($_SESSION['id'])) {
    header('location:logout.php');
  }
//code for course registration.
if (isset($_POST['signup'])) {
  # code...
  $sname = $_POST['sname'];
  $courseid = $_POST['courseid'];
  $coursename = $_POST['coursename'];
  $units = implode(',', $_POST['units']);
  
  $sql = "INSERT INTO courses (sname,courseid,coursename,units) VALUES('$sname','$courseid','$coursename','$units')";
   mysqli_query($con, $sql);
  if ($sql) {
    # code...
    echo "<script>alert('Course registered Successfully.');</script>";
  }
  else
  {
    echo "<script>alert('Error in Course registration.');</script>";
    mysqli_close($con);
  }
}
/*if (isset( $_GET['C'])) {
	$id = $_GET['C'];
	$courses = $con->query("SELECT * FROM courses WHERE id ='$id' ");
	$course = $courses->fetch_assoc();
	print_r($course);
	die();
	 
}*/
//while($cos = $courses->fetch_assoc()){
//	print_r($cos);
//}

//die('-------------');
 //foreach ($courses as $course) {
 //}
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
				<a href="Courses.php">
					<span class="icon"><i class="fas fa-angle-left"></i></span>
					<span>Return</span>
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

	    	<h3><i class="fa fa-angle-right"></i> Course Registration Information</h3>

        <form  method="post" action="" enctype="multipart/form-data" >
            <div class="row">
                <label>School / Institute Name</label>
                <div>
                    <input type="text" class="form-control" name="sname"
                         placeholder="Enter your School / Institute Name" value="<?php echo $row['sname'];?>" required="">

                </div>
            </div>

            <div class="row">
                <label>Course ID</label>
                <div>
                    <input type="text" name="courseid" class="form-control"
                        placeholder="Enter your Course ID" value="<?php echo $row['courseid'];?>"  required="">

                </div>
            </div>

            <div class="row">
                <label>Course Name</label>
                <div>
                    <input type="text" name="coursename" class="form-control"
                        placeholder="Enter your Course Name" value="<?php echo $row['coursename'];?>"  required="">

                </div>
            </div>
            
            <div class="row">
                <label>Course Units</label>
                <div>
                    <input type="checkbox" name="units[]" value="EIT 4401 Microprocessor Systems.">EIT 4401 Microprocessor Systems.

                </div>
                <div>
                    <input type="checkbox" name="units[]" value="EIT 4402 Advanced Web Development.">EIT 4402 Advanced Web Development.
 
                </div>
                <div>
                    <input type="checkbox" name="units[]" value="EIT 4403 EIT 4403 Artificial Intelligence.">EIT 4403 Artificial Intelligence.

                </div>
                <div>
                    <input type="checkbox" name="units[]" value="EIT 4404 Database Management Systems.">EIT 4404 Database Management Systems.

                </div>
                <div>
                    <input type="checkbox" name="units[]" value="EIT 4405 Workflow Management Systems.">EIT 4405 Workflow Management Systems.

                </div>
            </div>
						
             <div class="row">
                <div align="right">
                    <button type="submit" name="signup" class="btn btn-ptimary btn signup">Register</button>
                </div>
            </div>
          </form>


	    	</div>

	    	</div>
	    </div>
	

</body>
</html>

