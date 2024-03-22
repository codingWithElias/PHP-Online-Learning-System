<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {

    if (isset($_POST["val"]) && isset($_POST["course_id"])) {
        $val = Validation::clean($_POST["val"]);
        $course_id = Validation::clean($_POST["course_id"]);
        
        include "../../Models/Course.php";
        include "../../Database.php";
        
        $db = new Database();
        $conn = $db->connect();
        $cour = new Course($conn);
        $res = $cour->active($val,  $course_id);
        echo $res;

    }
}else {
    $em = "First login ";
    Util::redirect("index.php", "error", $em);
}