<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {

    if (isset($_POST["val"]) && isset($_POST["student_id"])) {
        $val = Validation::clean($_POST["val"]);
        $student_id = Validation::clean($_POST["student_id"]);
        
        include "../../Models/Student.php";
        include "../../Database.php";
        
        $db = new Database();
        $conn = $db->connect();
        $stud = new Student($conn);
        $res = $stud->active($val,  $student_id);
        echo $res;

    }
}else {
    $em = "First login ";
    Util::redirect("index.php", "error", $em);
}