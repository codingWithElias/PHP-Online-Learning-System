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
    # Header
    $title = "EduPulse - Students ";
    include "inc/Header.php";

?>
<div class="container">
  <!-- NavBar & Profile-->
  <?php include "inc/NavBar.php"; 
        include "inc/Profile.php"; ?>


    <div class="r-side p-5  mx-2 shadow">
    <?php 
      if (isset($_GET['error'])) { ?>
        <p class="alert alert-danger"><?=Validation::clean($_GET['error'])?></p>
    <?php } ?>
    <?php 
      if (isset($_GET['success'])) { ?>
        <p class="alert alert-success"><?=Validation::clean($_GET['success'])?></p>
    <?php } ?>
      <h4>Edit Account Information</h4>
        <form style="max-width: 600px;"
              action="Action/upload-profile-details.php"
              method="POST">
          <div class="mb-3">
            <label class="form-label">First name</label>
            <input type="text" 
                   class="form-control"
                   name="first_name"
                   value="<?=$student['first_name']?>">
          </div>
          <div class="mb-3">
            <label class="form-label">Last name</label>
            <input type="text" 
                   class="form-control"
                   value="<?=$student['last_name']?>"
                   name="last_name">
          </div>
          <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" 
                   class="form-control"
                   value="<?=$student['email']?>"
                   name="email">
          </div>
          <div class="mb-3">
            <label class="form-label">Date of birth</label>
            <input type="date" 
                   class="form-control"
                   value="<?=$student['date_of_birth']?>"
                   name="date_of_birth">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
        
        <h4 class="mt-5">Change Password</h4>
        <form id="ChangePassword"
              method="post"
              action="Action/change-password.php"
              style="max-width: 600px;">
          <div class="mb-3">
            <label class="form-label">Current password</label>
            <input type="password" 
                   placeholder="Current password" 
                   class="form-control"
                   name="password">
          </div>
          <div class="mb-3">
              <label for="instructorPassword" class="form-label">New Password</label>
              <div class="input-group">
                  <input type="password" class="form-control" id="instructorPassword" name="new_password" placeholder="Enter new password" aria-describedby="generatePasswordButton" >
                  <button class="btn btn-outline-secondary" type="button" id="generatePasswordButton" onclick="generatePassword()">Auto Generate</button>
              </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Confirm password</label>
            <input type="password" 
                   placeholder="Current password" 
                   class="form-control"
                   id="confirmPassword"
                   name="confirm_password">
          </div>

          
          <button type="submit" class="btn btn-primary">Change Password</button>
        </form>
    </div>
  </div>
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>
 <script>
    function generatePassword() {
        const randomString = Math.random().toString(36).slice(-6);
        document.getElementById('instructorPassword').value = randomString;
        document.getElementById('confirmPassword').value = randomString;
        document.getElementById('instructorPassword').type = "text";
        document.getElementById('confirmPassword').type = "text";
    }
</script>
<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>
