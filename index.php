<!DOCTYPE html>
<html>
<head>
	<title>Welcome :: E-learning</title>
	<!-- Bootstrap files css Files -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/fontawesome.css">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/js/all.js">
  <link rel="stylesheet" type="text/css" href="assets/fontawesome/js/fontawesome.js">
  	
  	<!-- Custom css -->
  	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  	<link href="assets/css/footer.css" rel="stylesheet">
  	<!-- custom js -->
  	<script src="assets/js/jquery-1.11.1.min.js"></script>  
  	<script src="assets/bootstrap/js/bootstrap.min.js"></script>

  	<style>
  	  /* Remove the navbar's default margin-bottom and rounded borders */ 
  	  .navbar {
  	    margin-bottom: 0;
  	    border-radius: 0;
  	  }
  	  
  	  /* Add a gray background color and some padding to the footer */
  	  footer {
			  background-color: #f2f2f2;
  	          padding: 25px;
  	  }
  	</style>
  	<script>
            // show the given page, hide the rest
            function show(elementID) {
                // try to find the requested page and alert if it's not found
                var ele = document.getElementById(elementID);
                if (!ele) {
                    alert("no such element");
                    return;
                }

                // get all pages, loop through them and hide them
                var pages = document.getElementsByClassName('page');
                for(var i = 0; i < pages.length; i++) {
                    pages[i].style.display = 'none';
                }

                // then show the requested page
                ele.style.display = 'block';
            }
        </script>
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">E-Learning</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#" onclick="show('Home');">Home</a></li>
        <li class="active"><a href="#" onclick="show('Gallery');">Gallery</a></li>
        <li class="active"><a href="#" onclick="show('Contact');">Contact</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
      </ul>
    </div>
  </div>
</nav>

<div id="Home" class="page">
<div class="jumbotron">
  <div class="container text-center">
    <h1>Welcome to My E-Learning Platform</h1>      
    <p>The leading best virtual interative electronic platform to have your Classes.</p>
      <p>We have the state of the art technology 
          to ensure you don't miss out on any lesson, class, any learning materials.          

      Our plaform offers you with recorded tutorials from pre-qualified staff making sure they deliver
      the best information to our learners.
      we have a variety of faculty  to ensure we deliver all rounded knowledge to all students.
      To enjoy this service and more sign up by clicking on this link <a href="sign up.php">Sign Up</a>

     </p>

  </div>
</div><br><br>
</div>
  
<div id="Gallery" class="page" style="display: none;"> 
<div class="container-fluid bg-3 text-center">    
  <h3>Some of the availables Faculties</h3><br>
  <div class="row">
    <div class="col-sm-3">
      <p>School of Engineering</p>
      <img src="assets/img/Engineering/Engineering3[1].png" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>School of Applied and Social Sciences</p>
      <img src="assets/img/Business/Business2.jpeg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>School of Medicine</p>
      <img src="assets/img/Computer/Comp5.jpeg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>Institute of Computing and Informatics</p>
      <img src="assets/img/Engineering/Engineering.jpeg" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br><br>

<div class="container-fluid bg-3 text-center">    
  <div class="row">
    <div class="col-sm-3">
      <p>School of Business</p>
      <img src="assets/img/Business/Business5[1].jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>School of Hospitality and Tourism.</p>
      <img src="assets/img/Social/Social2[1].jpg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3"> 
      <p>School of Media and Journalism</p>
      <img src="assets/img/Medicine/Med2.jpeg" class="img-responsive" style="width:100%" alt="Image">
    </div>
    <div class="col-sm-3">
      <p>School of Natural Resources</p>
      <img src="assets/img/Social/Social1.jpeg" class="img-responsive" style="width:100%" alt="Image">
    </div>
  </div>
</div><br><br>
</div> 

<div id="Contact" class="page" style="display: none;" >

<!-- Footer -->
<footer class="footer">
	<div class="footer-container">
		<div class="footer-logo">
			<img src="assets/img/elearning.jpg" alt="Footer Logo">
		</div>
		<ul class="footer-nav">
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Case Studies</a></li>
			<li><a href="#">Our Work</a></li>
			<li><a href="#">Blog</a></li>
		</ul>
		<ul class="footer-secondary-nav">
			<li><a href="#">Latest News</a></li>
			<li><a href="#">Our Partners</a></li>
			<li><a href="#">Jobs</a></li>
			<li><a href="#">Freebies</a></li>
			<li><a href="#">Fun stuff</a></li>
		</ul>
		<div class="contact-block">
			<h3>We're  happy to hear from you!</h3>
			<a href="telephone:0735-874-963"> <i class="fas fa-address-card"></i> 0735-874-963 </a>
			<a href="mailto:info@www.E-Learning.org"> <i class="fas fa-envelope-open-text"> info@www.E-Learning.org </i></a>
		</div>
		<div class="newsletter">
			<div class="newsletter-text">
				<div class="icon">
					<i class="fas fa-paper-plane"></i>
				</div>
				<p>
					Subscribe to our NewsLetter
				</p>
			</div>
			<div class="text-input">
				<form action="POST">
					<input type="email" name="Enter your Email Address" size="20" autocomplete="off">
					<input type="submit" name="submit">
				</form>
			</div>
		</div>
		<div class="social-networks">
			<h3>Share our content</h3>
			<div class="facebook">
				<i class="fab fa-facebook"></i>
			</div>
			<div class="twitter">
				<i class="fab fa-twitter"></i>
			</div>
			<div class="youtube">
				<i class="fab fa-youtube"></i>
			</div>
		</div>
	</div>
</footer>
<div class="bottom-line">
	<p>@2020 :Sam Gabe Designs</p>
	<div class="legal">
		<a href="#">Terms of use</a>
		<a href="#">Privacy</a>
		<a href="#">Legal</a>
	</div>
</div>
   

</div>

</body>
</html>