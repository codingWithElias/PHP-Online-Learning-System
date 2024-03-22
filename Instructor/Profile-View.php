<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../Controller/Instructor/Instructor.php";

    $_id =  $_SESSION['instructor_id'];
    $instructor = getById($_id);

   if (empty($instructor['instructor_id'])) {
     $em = "Invalid instructor id";
     Util::redirect("../logout.php", "error", $em);
   }
    # Header
    $title = "EduPulse - Instructor ";
    include "inc/Header.php";

?>
<div class="container">
  <!-- NavBar & Profile-->
  <?php include "inc/NavBar.php"; 
        include "inc/Profile.php"; ?>
    <div class="r-side p-5 shadow mx-2">
      <h4>Account Information</h4>
        <ul class="list-group" style="max-width: 600px;">
          <li class="list-group-item">First name: <?=$instructor['first_name']?></li>
          <li class="list-group-item">Last name: <?=$instructor['last_name']?></li>
          <li class="list-group-item">Email: <?=$instructor['email']?></li>
          <li class="list-group-item">Date of birth: <?=$instructor['date_of_birth']?></li>
          <li class="list-group-item">Joined at: <?=$instructor['date_of_joined']?></li>
           <li class="list-group-item p-3"></li>
          <li class="list-group-item">Username: <?=$instructor['username']?></li>
        </ul>
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
