<?php include('server/server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="register.php" autocomplete="off">
  	<?php include('errors.php'); ?>
  	<div class="row">
  	  <label>First name</label>
  	  <input type="text" class="form-control" name="fname" value="<?php echo $fname; ?>">
  	</div>
    <div class="row">
      <label>Last name</label>
      <input type="text" class="form-control" name="lname" value="<?php echo $lname; ?>">
    </div>
  	<div class="row">
  	  <label>Email</label>
  	  <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
  	</div>
  	<div class="row">
  	  <label>Password</label>
  	  <input type="password" class="form-control" name="password_1">
  	</div>
  	<div class="row">
  	  <label>Confirm password</label>
  	  <input type="password" class="form-control" name="password_2">
  	</div>
    <div class="row">
      <label>Contact</label>
      <input type="tel" class="form-control" name="contact" value="<?php echo $contact; ?>">
    </div>
  	<div class="row">
  	  <button type="submit" class="form-control" class="btn" name="reg_user">Register</button>
  	</div>
  	<div class="row">
      <div>
         <a href="login.php"><button type="button" name="submit"
          class="btn login">Login</button></a>
      </div>
    </div>
    <div class="row">
        <div id="footer">
          <p class="">Sam Gabe &copy; 2020 </p>  
         </div>
       </div>
  </form>
</body>
</html>
<form name="registration" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" autocomplete="off">

            <div class="row">
                <label>First Name</label>
                <div>
                    <input type="text" name="fname" class="form-control" placeholder="Enter your first name" required=""maxlength="80">
                </div>
            </div>

            <div class="row">
                <label>Last Name</label>
                <div>
                    <input type="text" name="lname" class="form-control" placeholder="Enter your last name" required=""maxlength="80">
                </div>
            </div>

            <div class="row">
                <label>Email</label>
                <div>
                    <input type="email" name="email" class="form-control" placeholder="Enter valid email" required=""maxlength="80">
                </div>
            </div>

            <div class="row">
                <label>Password</label>
                <div>
                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required=""maxlength="80">
                </div>
            </div>

            <div class="row">
                <label>Contact No</label>
                <div>
                    <input type="text" name="contact" class="form-control" placeholder="Enter valid contact" required=""maxlength="80">
                </div>
            </div>


            <div class="row">
                <div align="center">
                    <button type="submit" name="reg_user" class="btn signup">Sign Up</button>
                </div>
            </div>

            <div class="row">
                <div>
                    <a href="login.php"><button type="button" name="submit"
                        class="btn login">Login</button></a>
                </div>
            </div>

            <div class="row">
                <div id="footer">
                    <p class="">Sam Gabe &copy; 2020 </p>  
                </div>
            </div>
    
    </div>



    </form>