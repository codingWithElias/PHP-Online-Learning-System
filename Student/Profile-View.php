<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['student_id'])) {
    include "../Controller/Student/Student.php";

    $_id =  $_SESSION['student_id'];
    $student = getById($_id);

   if (empty($student['student_id'])) {
     $em = "Invalid Student id";
     Util::redirect("../logout.php", "error", $em);
   }
   // get Certificates
   $certificates = getCertificate($_id);
    # Header
    $title = "EduPulse - Students ";
    include "inc/Header.php";

?>
<div class="container">
  <!-- NavBar & Profile-->
  <?php include "inc/NavBar.php"; 
        include "inc/Profile.php"; ?>
    <div class="r-side p-5 shadow mx-2">
      <h4>Account Information</h4>
        <ul class="list-group" style="max-width: 600px;">
          <li class="list-group-item">First name: <?=$student['first_name']?></li>
          <li class="list-group-item">Last name: <?=$student['last_name']?></li>
          <li class="list-group-item">Email: <?=$student['email']?></li>
          <li class="list-group-item">Date of birth: <?=$student['date_of_birth']?></li>
          <li class="list-group-item">Joined at: <?=$student['date_of_joined']?></li>
           <li class="list-group-item p-3"></li>
          <li class="list-group-item">Student id: <?=$student['student_id']?></li>
          <li class="list-group-item">Username: <?=$student['username']?></li>
        </ul>
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
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>
