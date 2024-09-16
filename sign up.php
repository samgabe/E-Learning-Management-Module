<?php
session_start();
include "server/config.php";
?>
<!DOCTYPE html>
<html>
<head>
<title>E-Learning || Sign Up</title>
<link rel="stylesheet" type="text/css" href="assets/css/login.css">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<?php 
    $error_message = "";$success_message = "";

    // Register user
    if(isset($_POST['btnsignup'])){
        $fname = trim($_POST['fname']);
        $lname = trim($_POST['lname']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $confirmpassword = trim($_POST['confirmpassword']);

        $isValid = true;

        // Check fields are empty or not
        if($fname == '' || $lname == '' || $email == '' || $password == '' || $confirmpassword == ''){
            $isValid = false;
            $error_message = "Please fill all fields.";
        }

        // Check if confirm password matching or not
        if($isValid && ($password != $confirmpassword) ){
            $isValid = false;
            $error_message = "Confirm password not matching.";
        }

        // Check if Email-ID is valid or not
        if ($isValid && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $isValid = false;
            $error_message = "Invalid Email-ID.";
        }

        if($isValid){

            // Check if Email-ID already exists
            $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
            if($result->num_rows > 0){
                $isValid = false;
                $error_message = "Email-ID is already existed.";
            }
            
        }

        // Insert records
        if($isValid){
            $insertSQL = "INSERT INTO users(fname,lname,email,password ) values(?,?,?,?)";
            $stmt = $con->prepare($insertSQL);
            $stmt->bind_param("ssss",$fname,$lname,$email,$password);
            $stmt->execute();
            $stmt->close();

            $success_message = "Account created successfully.";

        }
    }
    ?>

</head>
<body>

    <H1>Registration Form</H1>

    <div class="demo-content">
          <form method="post" action="sign up.php" autocomplete="off">

    <?php 
    // Display Error message
    if(!empty($error_message)){
    ?>
        <div class="alert alert-danger">
            <strong>Error!</strong> <?= $error_message ?>
        </div>

    <?php
    }
    ?>

    <?php 
    // Display Success message
    if(!empty($success_message)){
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?= $success_message ?>
        </div>

    <?php
    }
    ?>
    <div class="row">
      <label for="fname">First Name:</label>
        <div>
          <input type="text" class="form-control" name="fname" id="fname" required="required" maxlength="80">
        </div>
    </div>
    <div class="row">
     <label for="lname">Last Name:</label>
      <div>
        <input type="text" class="form-control" name="lname" id="lname" required="required" maxlength="80">
      </div>
    </div>
    <div class="row">
     <label for="email">Email address:</label>
      <div>
        <input type="email" class="form-control" name="email" id="email" required="required" maxlength="80">
      </div>
       </div>
       <div class="row">
      <label for="password">Password:</label>
      <div>
        <input type="password" class="form-control" name="password" id="password" required="required" maxlength="80">
      </div>
      </div>
      <div class="row">
     <label for="pwd">Confirm Password:</label>
      <div>
         <input type="password" class="form-control" name="confirmpassword" id="confirmpassword" required="required" maxlen
         gth="80">
         </div>
     </div>

     <div class="row">
      <div>
        <button type="submit" name="btnsignup" class="btn signup">Submit</button>
      </div>
     </div>

     <div class="row">
       <div>
          <a href="login.php"><button type="button" name="submit"
           class="btn login">Login</button></a>
       </div>

    <div class="row">
     <div id="footer">
         <p class="">Sam Gabe &copy; 2020 </p>  
     </div>
    </div>
  </form>
    </div>
</body>
</html>