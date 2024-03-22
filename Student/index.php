<?php 
// session_start();
include "../Utils/Util.php";
// if (isset($_SESSION['user_name']) &&
//     isset($_SESSION['student_id'])) {

// 	 include "../Controller/Student.php";
//     $student_obj->init($_SESSION['student_id']);
//     $student = $student_obj->getStudent();

Util::redirect("Courses.php", "", "");
 ?>



<?php
//  }else { 
// $em = "First login ";
// Util::redirect("login.php", "error", $em);
// } ?>