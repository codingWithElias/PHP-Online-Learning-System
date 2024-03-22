<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {
    
    $student_id = $_SESSION['student_id'];
     if(!isset($_GET['course_id'])) {
        $em = "First login ";
        Util::redirect("../Courses.php", "error", $em);
     }
      include "../../Database.php";
      include "../../Models/EnrolledStudent.php";
      include "../../Models/Certificate.php";

      $course_id = Validation::clean($_GET['course_id']);
      // check if the student finesh the courese
      $db = new Database();
      $conn = $db->connect();
      $enrolled_student = new EnrolledStudent($conn);
      $data = array($course_id, $student_id);
      $progress = $enrolled_student->check_enrolled_student_progress($data);

      if ($progress >= 100) {
         // check if already generated
         $db = new Database();
         $db_conn = $db->connect();
         $certificate = new Certificate($db_conn);
         
         $certificate_id =  $certificate->getCertificateByIds($data);
         if ($certificate_id != 0) {
            Util::redirect("../../certificate.php", "certificate_id", $certificate_id);
         }else {
              $certificate->insert($data);
              $em = "Successfully certificate generated";
              Util::redirect("../Courses.php", "success", $em);
         }
      }else{
         $em = "First login ";
         Util::redirect("../Courses.php", "error", $em);
      }
 }else { 
$em = "First login ";
Util::redirect("../../login.php", "error", $em);
} ?>