<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    
   if ($_SERVER['REQUEST_METHOD'] == "POST") {
     include "../../Database.php";
      include "../../Models/Instructor.php";

     $password   = Validation::clean($_POST["password"]);
     $new_password   = Validation::clean($_POST["new_password"]);
     $confirm_password   = Validation::clean($_POST["confirm_password"]);
     $instructor_id = $_SESSION['instructor_id'];
     if(Validation::match($new_password, $confirm_password)){
      if (Validation::password($new_password)) {
         $db = new Database();
         $conn = $db->connect();
         $instructor = new Instructor($conn);
         $instructor_id = $_SESSION['instructor_id'];
         $res = $instructor->changePassword($instructor_id, $password, $new_password);
         if ($res) {
            $sm = "The password has been successfully changed!";
            Util::redirect("../Profile-Edit.php", "success", $sm);
         }else {
          $em = "Incorrect password";
          Util::redirect("../Profile-Edit.php", "error", $em);
        }
      }else {
       $em = "New password required";
       Util::redirect("../Profile-Edit.php", "error", $em);
     }
     }else {
       $em = "Password and confirm password not match";
       Util::redirect("../Profile-Edit.php", "error", $em);
     }

     
   }else { 
      $em = "unknown error occurred!";
      Util::redirect("../Profile-Edit.php", "error", $em);
   } 
}else { 
   $em = "First login ";
   Util::redirect("../../login.php", "error", $em);
} 