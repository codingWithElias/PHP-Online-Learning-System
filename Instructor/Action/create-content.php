<?php 
session_start();
include "../../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../../Utils/Validation.php";
    include "../../Database.php";
    include "../../Models/Course.php";



   if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $course_id = Validation::clean($_POST["course_id"]);
   $chapter_id = Validation::clean($_POST["chapter_id"]);
   $topic_id = Validation::clean($_POST["topic_id"]);
   $data = "";
   if (isset($_POST["text"])) {
       $data = Validation::clean($_POST["text"]);
   }
   $topic_id = Validation::clean($_POST["topic_id"]);

   $db = new Database();
   $conn = $db->connect();
   $course = new Course($conn);
   $array_data = [$course_id, $chapter_id, $topic_id, $data];
   $array_data_check = [$course_id, $chapter_id, $topic_id];

   
   $contents = $course->check_content( $array_data_check);
   if ($contents == 0) {
      $res = $course->insert_content( $array_data);
   }
   $contents = $course->check_content( $array_data_check);
   
   $_SESSION['content'] = $contents['content_id'].",".$contents['topic_id'].",".$contents['chapter_id'].",".$contents['course_id'];
   
    Util::redirect("../Courses-content-update.php", "content_id", "");
   
   
}
}else {
      
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}


