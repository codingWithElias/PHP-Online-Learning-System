<?php 
include "../Models/Certificate.php";
include "../Models/Course.php";

include "../Database.php";


function getSomeCourses($offset, $num){

	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Course($db_conn);

	$data = $student_models->getSome($offset, $num);
	
	return $data;
}

function getCount(){
	$db = new Database();
      $db_conn = $db->connect();
	$student_models = new Course($db_conn);
	$res = $student_models->count();
	return $res;
}

function getById($cou_id, $chapter_id, $topic_id){
	$db = new Database();
    $db_conn = $db->connect();
	$course = new Course($db_conn);
	$course->init($cou_id);
	$course_data = $course->getData();
	$chapters = $course->getChapters($cou_id);
	$topics = $course->getTopics($cou_id);
	$content = $course->getContent($cou_id, $chapter_id, $topic_id);

	$data = array('content'  => $content,
	              'course' => $course_data,
	              'chapters' => $chapters,
	              'topics'   => $topics );
	return $data;
}

function pageExes($cou_id, $chapter_id){
	$db = new Database();
    $db_conn = $db->connect();
	$course = new Course($db_conn);
	$page_exes = $course->pageExes($cou_id, $chapter_id);
	
	return $page_exes;
}

function getCourseById($instructor_id){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$courses = $course_model->getByInstructorId($instructor_id);
	return $courses;
}