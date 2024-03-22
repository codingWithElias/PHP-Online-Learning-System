<?php 
include "../Models/Instructor.php";
include "../Models/Certificate.php";
include "../Models/Course.php";

include "../Database.php";


function getSomeInstructors($offset, $num){

	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Instructor($db_conn);

	$data = $student_models->getSome($offset, $num);
	
	return $data;
}

function getCount(){
	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Instructor($db_conn);
	$res = $student_models->count();
	return $res;
}

function getById($instructor_id){
	$db = new Database();
    $db_conn = $db->connect();
	$student = new Instructor($db_conn);
	$student->init($instructor_id);
	return $student->getData();
}

function getCourseById($instructor_id){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$courses = $course_model->getByInstructorId($instructor_id);
	return $courses;
}