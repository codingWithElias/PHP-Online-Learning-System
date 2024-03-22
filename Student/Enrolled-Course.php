<?php 
session_start();
include "../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {

    include "../Controller/Student/Course.php";
    include "../Controller/Student/EnrolledStudent.php";
    
    $student_id = $_SESSION['student_id'];
    $courses = getEnrolledCourses($student_id);
    $row_count =  $courses[0]['count'];

    # Header
    $title = "EduPulse - Students ";
    include "inc/Header.php";
    
?>
<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>

  <?php if ($row_count > 0) { ?>
  <h4 class="course-list-title">All Enrolled Courses (<?=$row_count?>)</h4>
  <div class="course-list">

    <?php 
      for ($i=1; $i <= $row_count; $i++) { ?>
    
    <div class="card mb-3 course">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="../Upload/thumbnail/<?=$courses[$i]["cover"]?>" 
             class="img-fluid rounded-start" 
             alt="course"
             width="500">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title"><?=$courses[$i]["title"]?></h5>
          <p class="card-text"><?=$courses[$i]["description"]?></p>
          <p class="card-text"><small class="text-body-secondary"><?=$courses[$i]["created_at"]?></small></p>
          <a href="Courses-Enrolled.php?course_id=<?=$courses[$i]["course_id"]?>" class="btn btn-primary">View Course</a>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  </div>
<?php }else{ ?>
  <div class="alert alert-info" role="alert">
      0 courses record found in the database
   </div>
<?php } ?>
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>

<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>