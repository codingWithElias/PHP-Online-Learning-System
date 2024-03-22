<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {
    
   if (isset($_GET['course_id'])) {
      include "../../Database.php";
      include "../../Models/EnrolledStudent.php";
      include "../../Models/Course.php";
      $course_id = Validation::clean($_GET['course_id']);
      $student_id = $_SESSION['student_id'];
      $data = array($course_id, $student_id);
      $db = new Database();
      $conn = $db->connect();
      $enrolled_student = new EnrolledStudent($conn);

      if($enrolled_student->check_enrolled_student($data)){
      }else {
          $enrolled_student->enroll($data);
          $course_model = new Course($conn);
          $res = $course_model->createStudentProgress($course_id, $student_id, 0);
      }
      Util::redirect("../Courses-Enrolled.php", "course_id", $course_id);
   }else { 
      $em = "First login ";
      Util::redirect("../Courses.php", "error", $em);
   } 
}else { 
   $em = "First login ";
   Util::redirect("../../login.php", "error", $em);
} 