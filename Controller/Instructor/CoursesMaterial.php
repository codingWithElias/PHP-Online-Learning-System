<?php 

include "../Models/CoursesMaterial.php";

include "../Database.php";


function getSomeCoursesMaterialsByInstructorId($offset, $num, $instructor_id){

	$db = new Database();
      $db_conn = $db->connect();
	$obj = new CoursesMaterial($db_conn);

	$data = $obj->getSomeCoursesMaterialsByInstructorId($offset, $num, $instructor_id);
	
	return $data;
}

function getCountByInstructorId($instructor_id){
	$db = new Database();
      $db_conn = $db->connect();
	$obj = new CoursesMaterial($db_conn);
	$res = $obj->getCountByInstructorId($instructor_id);
	return $res;
}


