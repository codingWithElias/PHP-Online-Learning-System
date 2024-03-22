<?php 
session_start();
include "../../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../../Utils/Validation.php";
    include "../../Database.php";
    include "../../Models/Course.php";



   if ($_SERVER['REQUEST_METHOD'] == "POST") {
   $chapter_id = Validation::clean($_POST["chapter_id"]);

   // echo "<option> $course_id</option>";

   $db = new Database();
   $conn = $db->connect();
   $course = new Course($conn);

   $topcs = $course->getTopicsByChapterId($chapter_id);
   if ($topcs) {
       foreach($topcs as $topc){
        echo "<option value='".$topc['topic_id']."'>". $topc['title']."</option>";
       }
   }else {
    echo 0;
   }
}
}else {
	  
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}


