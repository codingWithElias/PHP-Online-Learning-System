<?php 
session_start();
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {

	include "../../Utils/Validation.php";
	include "../../Utils/Util.php";
	include "../../Database.php";
	include "../../Models/Instructor.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

   $first_name = Validation::clean($_POST["first_name"]);
   $last_name  = Validation::clean($_POST["last_name"]);
   $email      = Validation::clean($_POST["email"]);
   $date_of_birth = Validation::clean($_POST["date_of_birth"]);
   $instructor_id = $_SESSION['instructor_id'];

    if (!Validation::name($first_name)) {
    	$em = "Invalid first name";
	    Util::redirect("../Profile-Edit.php", "error", $em);
    }else if (!Validation::name($last_name)) {
    	$em = "Invalid last name";
	    Util::redirect("../Profile-Edit.php", "error", $em);
    }else if (!Validation::email($email)) {
    	$em = "Invalid email";
	    Util::redirect("../Profile-Edit.php", "error", $em);
    }else {
       $db = new Database();
       $conn = $db->connect();
       $user = new Instructor($conn);
	       $user_data = [$first_name, $last_name, $email, $date_of_birth, $instructor_id];
	       $res = $user->update($user_data);
	       $conn = null;
	       if ($res) {
	       	$sm = "Successfully Updated!";
		      Util::redirect("../Profile-Edit.php", "success", $sm);
	       }else {
	       	$em = "An error occurred";
		      Util::redirect("../Profile-Edit.php", "error", $em);
	       }
	   }
	}else {
    	$em = "An error occurred";
      Util::redirect("../Profile-Edit.php", "error", $em);
    }

}else { 
   $em = "First login ";
   Util::redirect("../../login.php", "error", $em);
} 