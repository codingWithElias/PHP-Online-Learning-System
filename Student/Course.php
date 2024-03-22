<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {
    
   if (isset($_GET['course_id'])) {
      include "../Controller/Student/Course.php";
      $_id = Validation::clean($_GET['course_id']);
      $course = getCourseDetails($_id); 
    }else{
        $em = "Invalid course id ";
        Util::redirect("../Courses.php", "error", $em);
    }
    if ($course == 0) {
       $em = "Invalid course id ";
        Util::redirect("Courses.php", "error", $em);
    }
    # Header
    $title = "EduPulse - Students ";
    include "inc/Header.php";

?>
<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>

  <h4 class="course-list-title"></h4>
  <div class="card" style="max-width: 700px;">
    <div class="card-body">
      
      <h5 class="card-title">Course Title: <?=$course['title']?></h5>
      <h5 class="card-title pt-3">Course Description: </h5>
      <p class="card-text">
        <?=$course['description']?>
      </p>
    </div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">Lessons  :  <?=$course['topic_nums']?></li>
        <li class="list-group-item">Chapters:   <?=$course['chapter_nums']?></li>
        <li class="list-group-item">Instructor: <?=$course['instructor_name']?></li>
        <li class="list-group-item">Created at: <mark><?=$course['created_at']?></mark></li>
        <li class="list-group-item"><mark>Certificate After Complete The Course</mark></li>
      </ul>
    <div class="card-body">
      <?php if( $course['topic_nums'] > 0) { ?>
        <a href="Action/Courses-Enrolled.php?course_id=<?=$course['course_id']?>" class="btn btn-success">Enroll Courses</a> 
     <?php } ?>
      
    </div>
      <?php if ($course["cover"] != "default_course.jpg") { ?>
    
      <div>
        <img src="../Upload/thumbnail/<?=$course["cover"]?>" 
             class="img-fluid rounded-start" 
             alt="course"
             width="100%">
      </div>
      <?php } ?>
</div>
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>

<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>