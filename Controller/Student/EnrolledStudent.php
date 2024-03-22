<?php 
include "../Models/EnrolledStudent.php";

function check_enrolled_student($data){
	$db = new Database();
	$conn = $db->connect();
	$enrolled_student = new EnrolledStudent($conn);
	      
	$res = $enrolled_student->check_enrolled_student($data);
	return $res;
}

function getEnrolledCourses($stud_id){

	$db = new Database();
    $db_conn = $db->connect();
	$obj = new EnrolledStudent($db_conn);

	$data = $obj->getEnrolled($stud_id);
	$countNum = $data[0]['count'];
	$db = new Database();
	$db_conn = $db->connect();
	$course_model = new Course($db_conn);
    $newData = array(array("count"=>$countNum));
	for($i=0; $i < $countNum; $i++) { 
	    $cou_id = $data[1][$i]['course_id'];
		$course = $course_model->getCourseDetails($cou_id);
		$ii = $i+1;
		$newData[$ii] = $course;

	}
	return $newData;
}
