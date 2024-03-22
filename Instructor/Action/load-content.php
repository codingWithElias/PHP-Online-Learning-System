<?php 
session_start();
include "../../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../../Utils/Validation.php";
    include "../../Database.php";
    include "../../Models/Course.php";



   if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $course_id = Validation::clean($_POST["chapter_id"]);
   $chapter_id = Validation::clean($_POST["chapter_id"]);
   $topic_id = Validation::clean($_POST["topic_id"]);

   // echo "<option> $course_id</option>";

   $db = new Database();
   $conn = $db->connect();
   $course = new Course($conn);

   $contents = $course->getContent($course_id, $chapter_id, $topic_id);
   if ($contents) {
        echo $contents['data'];
   }else {
    echo 0;
   }
}
}else {
	  
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}


