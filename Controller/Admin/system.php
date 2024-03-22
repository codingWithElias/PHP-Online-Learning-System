<?php 
include "../Models/Student.php";
include "../Models/Certificate.php";
include "../Models/Course.php";
include "../Models/Instructor.php";
include "../Database.php";




function getstudentsCount(){
	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Student($db_conn);
	$res = $student_models->count();
	return $res;
}

function getInstructorCount(){
	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Instructor($db_conn);
	$res = $student_models->count();
	return $res;
}

function getCourseCount(){
	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Course($db_conn);
	$res = $student_models->count();
	return $res;
}