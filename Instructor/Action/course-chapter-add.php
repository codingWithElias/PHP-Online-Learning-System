<?php 
session_start();
include "../../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../../Utils/Validation.php";
    include "../../Database.php";
    include "../../Models/Course.php";

   if ($_SERVER['REQUEST_METHOD'] == "POST") {

    

   $chapter_title   = Validation::clean($_POST["chapter_title"]);
   $course_id = Validation::clean($_POST["course_id"]);

    if(empty($chapter_title)) {
        $em = "Invalid Title";
        Util::redirect("../Courses-add.php", "error", $em);
    }else if (empty($course_id)) {
        $em = "Invalid course";
        Util::redirect("../Courses-add.php", "error", $em);
    }else {

       $db = new Database();
       $conn = $db->connect();
       $course = new Course($conn);

       $data = [$course_id, $chapter_title];
       $res = $course->insert_chapter($data);
       if ($res) {
        $sm = "New chapter Successfully Created!";
        Util::redirect("../Courses-add.php", "success", $sm);
       }else {
        $em = "An error occurred";
        Util::redirect("../Courses-add.php", "error", $em);
       }
       $conn = null;
    }
    }else {
        $em = "REQUEST Error";
        Util::redirect("../Courses-add.php", "error", $em);
    }
}else {
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}