<?php session_start();
require_once('server/database.php');


// Code for login 
if(isset($_POST['login']))
{
$password=$_POST['password'];
$useremail=$_POST['email'];
$ret= mysqli_query($con,"SELECT * FROM users WHERE email='$useremail' and password='$password'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";
$_SESSION['login']=$_POST['email'];
$_SESSION['id']=$num['id'];
$_SESSION['name']=$num['fname'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>E-Learning || Login</title>
<link rel="stylesheet" type="text/css" href="assets/css/login.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

    <H1>Login Form</H1>

    <div class="demo-content">
        <form name="login" action="" method="post">

      <?php include('errors.php'); ?>
            <div class="row">
                <label>Email</label><span id="email_error"></span>
                <div>
                    <input type="text" name="email" 
                       class="form-control"
                        placeholder="Enter your registered email"  >
                </div>
            </div>

            <div class="row">
                <label>Password</label><span id="password_error"></span>
                <div>
                    <input type="Password" name="password" 
                        class="form-control"
                        placeholder="Enter valid password"  >

                </div>
            </div>
            <div class="row">
                <div>
                    <button type="submit" name="login" value="LOG IN" 
                        class="btn login" class="clear">Login</button>
                </div>
            </div>
            <div class="row">
                <div>
                    <a href="sign up.php"><button type="button"
                            name="submit" class="btn signup">Signup</button></a>
                </div>
            </div>
             <footer  class="footer">
                 <div class="container">
                  <div class="row">
                   <div class="col-md-12 col-sm-12 text-center"> 
                        <p class="">Sam Gabe &copy; 2020 </p>
                   </div>
                  </div>
                 </div>
              </footer>
        </form>
    </div>
</body>
</html>