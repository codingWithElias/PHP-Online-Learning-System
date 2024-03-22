<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {
    
  if (isset($_GET['instructor_id'])) {
    include "../Controller/Admin/Instructor.php";
    $_id = Validation::clean($_GET['instructor_id']);
    $instructor = getById($_id);
   if (empty($instructor['instructor_id'])) {
     $em = "Invalid Student id";
     Util::redirect("index.php", "error", $em);
   }
   $courses = getCourseById($_id);
    # Header 
    $title = "EduPulse - Student ";
    include "inc/Header.php";
?>

<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>
  
  <div class="list-table pt-5">
  <div class="r-side p-5 shadow" style="max-width: 500px;">
      <!-- <h4>Student Details</h4><br> circle -->
      <div class="profile text-center">
        <img  class="circle"
              src="../assets/Upload/profile/<?=$instructor['profile_img']?>" alt="PROFILE IMG" width="150">
              <h5 class="p-2"><?=$instructor['first_name']?> <?=$instructor['last_name']?></h5>
      </div><br><br>
        <ul class="list-group">
          <li class="list-group-item">First name: <?=$instructor['first_name']?></li>
          <li class="list-group-item">Last name: <?=$instructor['last_name']?></li>
          <li class="list-group-item">Email: <?=$instructor['email']?></li>
          <li class="list-group-item">Date of birth: <?=$instructor['date_of_birth']?></li>
          <li class="list-group-item">Joined at: <?=$instructor['date_of_joined']?></li>
           <li class="list-group-item p-3"></li>
          <li class="list-group-item">instructor id: <?=$instructor['instructor_id']?></li>
          <li class="list-group-item">Username: <?=$instructor['username']?></li>
          
        </ul>
        <div class="mt-3">
          <a href="Reset-Password.php?for=instructor&instructor_id=<?=$instructor['instructor_id']?>" class="btn btn-primary">Reset Password</a>
        </div>
        <?php if (!empty($courses)) { ?>
        <h4 class="mt-5">Courses</h4>
        <ul class="list-group">
           <?php 
             $i = 0;
             foreach ($courses as $course) { $i++;
           ?>
              <li class="list-group-item">
                <b><?=$i ?>. </b>
                <a href="Course.php?course_id=<?=$course['course_id']?>"> <?=$course['title']?> </a>
              </li>

           <?php } ?>
          
        </ul> 
        <?php } ?>
    </div>
  </div>
  </div>



 <!-- Footer -->
<?php include "inc/Footer.php"; ?>

<?php
 }else { 
  $em = "Invalid instructor id";
  Util::redirect("index.php", "error", $em);
  }

}else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>