<?php
session_start();
error_reporting(0);
include("server/database.php");
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=$_POST['password'];
$ret=mysqli_query($con,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="manage-students.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
$_SESSION['action1']="*Invalid username or password";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

  <title> E-Learning || Staff </title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">  
    <link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="screen">
    <script src="assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>
</head>

<body style="background-color: #ABC">
<br><br> 
  <div class="container" style="border: 5px solid blue; padding-top: 20px; border-radius: 5px; background-color:white;
  ">

  <div class="alert alert-info" role="alert" >
  <h3>
     Staff Login
  </h3>
  </div>
  
  <div class="row-fluid">
    <div class="span6" style="margin-left: 120px;">
    
      <form class="form-horizontal" method="post">
       <p style="color:#F00; padding-top:20px;" align="center">
                    <?php echo $_SESSION['action1'];?><?php echo $_SESSION['action1']="";?></p>
      <div class="control-group">
      <label class="control-label" for="inputEmail">Username</label>
      <div class="controls">
      <input type="text" id="inputEmail" name="username" placeholder="Username" required>
      </div>
      </div>
      <div class="control-group">
      <label class="control-label" for="inputPassword">Password</label>
      <div class="controls">
      <input type="password" name="password" id="inputPassword" placeholder="Password" required>
      </div>
      </div>
      <br><br> 
      <div class="control-group">
      <div class="controls">
      <button type="submit" name="login" class="btn btn-primary">Login</button>
      </div>
      <br>
      </div>
      <div class="row">
          <footer  class="footer">
           <div class="container">
             <div class="row">
                <div class="col-md-12 col-sm-12 text-center"> 
                 <p class="">Sam Gabe &copy; 2020 </p>
                </div>
             </div>
            </div>
          </footer>

      </div>
      </form>
    </div>
  </div>
    
  </div>

</body>
</html>
