<?php
session_start();
error_reporting(0);
include'server/database.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
  header('location:logout.php');
  } else{

 // for  password change   
if(isset($_POST['Submit']))
{
$oldpassword=$_POST['oldpass'];
$sql=mysqli_query($con,"SELECT password FROM users where password='$oldpassword'");
$num=mysqli_fetch_array($sql);
if($num>0)
{
$userid=$_SESSION['id'];
$newpass=$_POST['newpass'];
 $ret=mysqli_query($con,"update users set password='$newpass' where id='$userid'");
$_SESSION['msg']="Password Changed Successfully !!";
//header('location:user.php');
}
else
{
$_SESSION['msg']="Old Password not match !!";
}
}
?>
<script language="javascript" type="text/javascript">
function valid()
{
if(document.form1.oldpass.value=="")
{
alert(" Old Password Field Empty !!");
document.form1.oldpass.focus();
return false;
}
else if(document.form1.newpass.value=="")
{
alert(" New Password Field Empty !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value=="")
{
alert(" Re-Type Password Field Empty !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.newpass.value.length<6)
{
alert(" Password Field length must be atleast of 6 characters !!");
document.form1.newpass.focus();
return false;
}
else if(document.form1.confirmpassword.value.length<6)
{
alert(" Re-Type Password Field less than 6 characters !!");
document.form1.confirmpassword.focus();
return false;
}
else if(document.form1.newpass.value!= document.form1.confirmpassword.value)
{
alert("Password and Re-Type Password Field do not match  !!");
document.form1.newpass.focus();
return false;
}
return true;
}
</script>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>E-Learning || Change Password</title>
	<!-- css files --->
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
	
<!-- The main body -->
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

?><a href="messages.php">
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
		            <a href="Dashboard.php" class="active">
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
	    	<form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                           <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Old Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="oldpass" value="" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">New Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="newpass" value="" >
                              </div>
                          </div>
                          
                              <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Confirm Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="confirmpassword" value="" >
                              </div>
                          </div>
                          <div style="margin-right: 20px;">
                            <div align="right">
                          <input type="submit" name="Submit" value="Change" class="btn btn-primary  btn btn-signup">
                            </div>
                           </div>
                          </form>
	    </div>
	</div>
</div>
 
<script>
      $(function(){
          $('select.styled').customSelect();
      });

  </script>


</body>
</html>
<?php } ?>