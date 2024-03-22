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


function isPageExes($cou_id, $chapter_id, $topic_id){
	$db = new Database();
    $db_conn = $db->connect();
	$course = new Course($db_conn);
	$page_exes = $course->isPageExes($cou_id, $chapter_id, $topic_id);
	
	return $page_exes;
}

function getCourseById($instructor_id){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$courses = $course_model->getByInstructorId($instructor_id);
	return $courses;
}
// ------------------------------------------------

function getCourseDetails($cou_id){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$course = $course_model->getCourseDetails($cou_id);
	return $course;
}
// 

function getStudentProgress($cou_id, $stud_id){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$progress = $course_model->getStudentProgress($cou_id, $stud_id);
	return $progress;
}

function updateStudentProgress($cou_id, $stud_id, $val){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$course_model->updateStudentProgress($cou_id, $stud_id, $val);
    $progress = getStudentProgress($cou_id, $stud_id);
	if ($progress) {
         $progress = $val;
	}else {
		$course_model->createStudentProgress($cou_id, $stud_id, $val);
	}
}

function getSomeEnrolledCourses($stud_id){

	$db = new Database();
    $db_conn = $db->connect();
	$student_models = new Course($db_conn);

	$data = $student_models->getSomeEnrolled($stud_id);
	
	return $data;
}

function getFirstChapterByCourseId($course_id){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$Chapters = $course_model->getChapters($course_id);
	return $Chapters[0];
}

function getFirstTopicByCourseId($course_id){
	$db = new Database();
    $db_conn = $db->connect();
    $course_model = new Course($db_conn);
	$Topics = $course_model->getTopics($course_id);
	return $Topics[0];
}

// getFirstChapterByCourseId
// getFirstTopicByCourseId