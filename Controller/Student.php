<?php 
include "../Models/Student.php";
include "../Database.php";

$db = new Database();
$db_conn = $db->connect();
$student_obj = new Student($db_conn);