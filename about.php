<!DOCTYPE html>
<html>
<head>
	<title>About - EduPulse</title>
	<link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <section class="section-1 about-p">
    	<div class="overl">.</div>
    	<header>
    		<h2 class="logo">
    		  <img src="assets/img/Logo.png">
    	     <span>EduPulse</span>
        </h2>
	    	<nav>
	    		<a href="index.php">Home</a>
	    		<a href="about.php"  class="active">About</a>
	    		<a href="signup.php">Sign Up</a>
	    		<a href="login.php">Login</a>
	    		
	    		
	    	</nav>
    	</header>
    </section>
    <section class="section-2">

    	<h1 style="text-align: center;">

    		<img src="assets/img/Logo.png"><br>
    		EduPulse 
    	</h1>
    	<p>
    	The online learning system website aims to provide a user-friendly and accessible platform for learners, instructors, and administrators. The system is designed to facilitate seamless interaction, efficient course management, and a rich learning experience. The website incorporates the following versions:
    	</p>
    	<h1>Goals</h1>
    	<p>
    		  - Enable users to easily navigate and explore available courses. <br>
    		  - Streamline the course enrollment process for a hassle-free experience. <br>
    		  - Provide an intuitive dashboard for tracking course progress, achievements, and certificates. <br>
    		  - Implement responsive design for optimal user experience across devices.<br>
    		  - Foster engagement through discussion forums, ratings, and reviews.<br>
    		  - Offer instructors a straightforward interface for course creation and content management.<br>
		     - Provide tools for quiz and assignment creation, as well as grading functionalities.<br>
		     - Enable instructors to view and analyze user progress and quiz performance.<br>
		     - Facilitate the generation of certificates for course completion.<br>
		     - Support effective communication through discussion forums.<br>
    	</p>

    </section>
     
    <footer class="main-footer">
      <h4>RCD2013C - EduPulse&copy;2024</h4>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script>
    	$(document).ready(function(){
    		$(window).on('scroll', function(){
    			if ($(window).scrollTop()) {
                    $("header").addClass('bgc');
    			}else{
                    $("header").removeClass('bgc');
    			}
    		});
    	});
    </script>
</body>
</html>