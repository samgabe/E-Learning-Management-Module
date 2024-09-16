<?php
session_start();
include'server/database.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

// for updating user info    
if(isset($_POST['Submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
  $uid=intval($_GET['uid']);
$query=mysqli_query($con,"update users set fname='$fname' ,lname='$lname'  where id='$uid'");
$_SESSION['msg']="Profile Updated successfully";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Learning || Student Info</title>

	<!-- script and css files -->
	<script type="text/javascript" src="assets/js/script.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/dashboard.css">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
	<link href="assets/css/style-responsive.css" rel="stylesheet">
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
		            <a href="dashboard.php">
		              <span class="icon">
		              	<i class="fa fa-border-all"></i></span>
		              <span class="list">Dashboard</span>
		            </a>
		          </li>
		          <li>
		            <a href="courses.php">
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
		            <a href="student_info.php" class="active">
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
	    <?php $ret=mysqli_query($con,"select * from users where id=' ".$_SESSION['id']." '"); 
	  while($row=mysqli_fetch_array($ret))
	  
	  {?>
	    <div class="container">
	  		<h3><i class="fa fa-angle-right"></i> <?php echo $row['fname'];?>'s Information</h3>
	  		<div class="item-wrapper">
	  			

	 <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
        <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">First Name </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fname" value="<?php echo $row['fname'];?>" >
                    </div>
            </div>
                          
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Last Ename</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="lname" value="<?php echo $row['lname'];?>" >
                    </div>
            </div>
                          
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" readonly >
                    </div>
            </div>
            
            <div class="form-group">
                <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Registration Date </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="timemodified" value="<?php echo $row['timemodified'];?>" readonly >
                    </div>
            </div>
            
    </form>
    
	  		</div>
	  		

	    </div>
	<?php } ?>
	</div>
</div>

</body>
</html>

<?php } ?>
