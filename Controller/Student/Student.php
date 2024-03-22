<?php 
include "../Models/Student.php";
include "../Models/Certificate.php";
include "../Models/Course.php";

include "../Database.php";


function getSomeStudent($offset, $num){

	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Student($db_conn);

	$data = $student_models->getSome($offset, $num);
	
	return $data;
}

function getCount(){
	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Student($db_conn);
	$res = $student_models->count();
	return $res;
}

function getById($student_id){
	$db = new Database();
      $db_conn = $db->connect();
	$student = new Student($db_conn);
	$student->init($student_id);
	return $student->getData();
}

function getCertificate($student_id){

	$db = new Database();
    $db_conn = $db->connect();
	$certificate_model = new Certificate($db_conn);
	$certificates = $certificate_model->getAllByStudentId($student_id);
    
	$course_model = new Course($db_conn);
	$data[0] = array('certificate_id' => "", 
			          'course_title' => ""
	                     );
	if ($certificates != 0) {
    for ($i=0; $i < count($certificates); $i++) { 
    	$c_id = $certificates[$i]['course_id'];
    	$certif_id = $certificates[$i]['certificate_id'];
        $course = $course_model->getById($c_id);
        $course_title = $course["title"];

		$data[$i] = array('certificate_id' => $certif_id, 
			              'course_title' => $course_title,
	                      );
    }
    }

	return $data;
}