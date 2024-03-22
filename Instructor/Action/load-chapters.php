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

   $db = new Database();
   $conn = $db->connect();
   $course = new Course($conn);

   $chapters = $course->getChapters($course_id);
   if ($chapters) {
       foreach($chapters as $chapter){
        echo "<option value='".$chapter['chapter_id']."'>". $chapter['title']."</option>";
       }
   }else {
    echo 0;
   }
}
}else {
	  
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}


