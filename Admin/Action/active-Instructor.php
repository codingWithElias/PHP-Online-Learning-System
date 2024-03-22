<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {

    if (isset($_POST["val"]) && isset($_POST["instructor_id"])) {
        $val = Validation::clean($_POST["val"]);
        $instructor_id = Validation::clean($_POST["instructor_id"]);
        
        include "../../Models/Instructor.php";
        include "../../Database.php";
        
        $db = new Database();
        $conn = $db->connect();
        $inst = new Instructor($conn);
        $res = $inst->active($val,  $instructor_id);
        echo $res;

    }
}else {
    $em = "First login ";
    Util::redirect("index.php", "error", $em);
}