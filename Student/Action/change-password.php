<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {
    
   if ($_SERVER['REQUEST_METHOD'] == "POST") {
     include "../../Database.php";
      include "../../Models/Student.php";

     $password   = Validation::clean($_POST["password"]);
     $new_password   = Validation::clean($_POST["new_password"]);
     $confirm_password   = Validation::clean($_POST["confirm_password"]);
     $student_id = $_SESSION['student_id'];
     if(Validation::match($new_password, $confirm_password)){
      if (Validation::password($new_password)) {
         $db = new Database();
         $conn = $db->connect();
         $student = new Student($conn);
         $student_id = $_SESSION['student_id'];
         $res = $student->changePassword($student_id, $password, $new_password);
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