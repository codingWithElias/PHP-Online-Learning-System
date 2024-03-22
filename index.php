<!DOCTYPE html>
<html>
<head>
	<title>EduPulse - online learning system</title>
	<link rel="stylesheet" type="text/css" href="assets/css/welcome.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <section class="section-1 home-p">
    	<div class="overl">.</div>
    	<header>
    		<h2 class="logo">
	    		  <img src="assets/img/Logo.png">
	    	     <span>EduPulse</span>
	        </h2>
	    	<nav>
	    		<a href="index.php" class="active">Home</a>
	    		<a href="about.php">About</a>
	    		<a href="signup.php">Sign Up</a>
	    		<a href="login.php">Login</a>
	    		
	    	</nav>
    	</header>
    </section>
    <section class="section-2">
    	<h1>Welcome to EduPulse</h1>
    	<p>
    	Welcome to our Online Learning System, where knowledge meets accessibility. Our platform is crafted to empower learners, instructors, and administrators with the tools they need for a dynamic and enriching educational experience.
    	</p>
    	<h1>For Learners:</h1>
    	<p>
    		Embark on your learning journey with ease. Browse through a diverse range of courses, enroll effortlessly, and track your progress in real-time. Engage with fellow learners through discussion forums, share insights, and earn certificates as a testament to your accomplishments.
    	</p>
    	<h1>For Instructors:</h1>
    	<p>
    		Shape the future of education by creating captivating courses. Our instructor version provides an intuitive environment for content creation, quiz management, and grading. Stay connected with your students through forums, monitor their progress, and witness the impact of your expertise.

    		
    	</p>
    	<p>
    		At the heart of our platform is a commitment to fostering a collaborative and interactive learning experience. Join us on this educational adventure, where knowledge knows no bounds. Welcome to a world of learning at your fingertips.
    	</p>


    </section>
    <footer class="main-footer">
      <h4>RCD2013C - EduPulse&copy;2024</h4>
    </footer>

    <script src="assets/js/jquery-3.5.1.min.js"></script>

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