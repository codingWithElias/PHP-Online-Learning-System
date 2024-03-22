<?php 
include "Utils/Validation.php";


$fname = $uname = $email =$bd = $lname ="";
if (isset($_GET["fname"])) {
	$fname = Validation::clean($_GET["fname"]);
}
if (isset($_GET["uname"])) {
	$uname = Validation::clean($_GET["uname"]);
}
if (isset($_GET["email"])) {
	$email = Validation::clean($_GET["email"]);
}
if (isset($_GET["bd"])) {
	$bd = Validation::clean($_GET["bd"]);
}
if (isset($_GET["lname"])) {
	$lname = Validation::clean($_GET["lname"]);
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Sign Up</title>
	<link rel="stylesheet" 
	      type="text/css" 
	      href="Assets/css/login-signup.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
    <div class="wrapper">
    	<div class="form-holder">
    		<h2>Create New Account</h2>
    		<?php 
                if (isset($_GET['error'])) { ?>
                	<p class="error"><?=Validation::clean($_GET['error'])?></p>
            <?php } ?>
            <?php 
                if (isset($_GET['success'])) { ?>
                	<p class="success"><?=Validation::clean($_GET['success'])?></p>
            <?php } ?>
    		
    		<form class="form"
    		      action="Action/signup.php" 
    		      method="POST">
    			<div class="form-group">
    				<label>First Name</label>
    				<input type="text" 
    				       name="fname"
    				       placeholder="First name"
    				       value="<?=$fname?>">
    			</div>
    			<div class="form-group">
    				<label>Last Name</label>
    				<input type="text" 
    				       name="lname"
    				       placeholder="Last name"
    				       value="<?=$lname?>">
    			</div>
    			<div class="form-group">
    				<label>Email</label>
    				<input type="text" 
    				       name="email"
    				       placeholder="Email"
    				       value="<?=$email?>">
    			</div>
    			<div class="form-group">
    				<label>Birth Day</label>
    				<input type="date" 
    				       name="date_of_birth"
    				       placeholder="Date of birth"
    				       value="<?=$bd?>">
    			</div>
    			<div class="form-group">
    				<label>Username</label>
    				<input type="text" 
    				       name="username"
    				       placeholder="User name"
    				       value="<?=$uname?>">
    			</div>

    			<div class="form-group">
    				<label>New Password</label>
    				<input type="password" 
    				       name="password"
    				       placeholder="Password">
    			</div>
    			<div class="form-group">
    				<label>Confirm Password</label>
    				<input type="password" 
    				       name="re_password"
    				       placeholder="Confirm Password">
    			</div><br />
    			<div class="form-group">
    				<button type="submit">Sign Up</button>
    			</div>
    			<div class="form-group">
    				<a href="login.php">Sign In</a>
    				<a href="index.php">| Home</a>
    			</div>
    		</form>
    	</div>
    </div>
  
</body>
</html>