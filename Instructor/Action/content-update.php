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
       $data = $_POST["text"];
   }

   $db = new Database();
   $conn = $db->connect();
   $course = new Course($conn);
   $array_data = [$data, $course_id, $chapter_id, $topic_id];
   $contents = $course->update_content($array_data);
   
   Util::redirect("../Courses-content-update.php", "content_id", "");
}
}else {
      
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}


