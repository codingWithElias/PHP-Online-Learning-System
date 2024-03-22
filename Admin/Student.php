<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {
    
  if (isset($_GET['student_id'])) {
    include "../Controller/Admin/Student.php";
    $_id = Validation::clean($_GET['student_id']);
    $student = getById($_id);
   if (empty($student['student_id'])) {
     $em = "Invalid Student id";
     Util::redirect("index.php", "error", $em);
   }
   // get Certificates
   $certificates = getCertificate($_id);
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
              src="../Upload/profile/<?=$student['profile_img']?>" alt="PROFILE IMG" width="150">
              <h5 class="p-2"><?=$student['first_name']?> <?=$student['last_name']?></h5>
      </div><br><br>
        <ul class="list-group">
          <li class="list-group-item">First name: <?=$student['first_name']?></li>
          <li class="list-group-item">Last name: <?=$student['last_name']?></li>
          <li class="list-group-item">Email: <?=$student['email']?></li>
          <li class="list-group-item">Date of birth: <?=$student['date_of_birth']?></li>
          <li class="list-group-item">Joined at: <?=$student['date_of_joined']?></li>
           <li class="list-group-item p-3"></li>
          <li class="list-group-item">Student id: <?=$student['student_id']?></li>
          <li class="list-group-item">Username: <?=$student['username']?></li>
          
        </ul>
        <div class="mt-3">
          <a href="Reset-Password.php?for=Student&student_id=<?=$student['student_id']?>" class="btn btn-primary">Reset Password</a>
        </div>
        <?php if (!empty($certificates[0]["certificate_id"])) { ?>
        <h4 class="mt-5">Certificates</h4>
        <ul class="list-group">
           <?php 
             $i = 0;
             foreach ($certificates as $certificate) { $i++;
           ?>
              <li class="list-group-item">
                <b><?=$i ?>. </b>
                <a href="../Certificate.php?certificate_id=<?=$certificate['certificate_id']?>"> <?=$certificate['course_title']?> </a>
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
  $em = "Invalid Student id";
  Util::redirect("index.php", "error", $em);
  }

}else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>