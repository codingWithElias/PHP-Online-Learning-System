<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {

  $title = "EduPulse - Add Instructor ";
  include "inc/Header.php";

    $fname = $uname = $email =$bd = $lname ="";
    if (isset($_GET["fname"])) {
        $fname = Validation::clean($_GET["fname"]);
    }
    if (isset($_GET["uname"])) {
        $uname = Validation::clean($_GET["uname"]);
    }
    if (isset($_GET["email"])) {
        $email = Validation::clean($_GET["email"]);
    }
    if (isset($_GET["bd"])) {
        $bd = Validation::clean($_GET["bd"]);
    }
    if (isset($_GET["lname"])) {
        $lname = Validation::clean($_GET["lname"]);
    }
?>

<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>
  
  <div class="container mt-5">
    <form style="max-width: 600px;"
          class="shadow p-3"
          action="Action/instructor-add.php"
          method="POST">
          <h4 class="py-4">Add Instructor Profile</h4>
          <?php 
                if (isset($_GET['error'])) { ?>
                    <p class="alert alert-danger "><?=Validation::clean($_GET['error'])?></p>
            <?php } ?>
            <?php 
                if (isset($_GET['success'])) { ?>
                    <p class="alert alert-success"><?=Validation::clean($_GET['success'])?></p>
            <?php } ?>


        <div class="mb-3">
            <label for="instructorFirstName" class="form-label">First Name</label>
            <input type="text" class="form-control" id="instructorFirstName" placeholder="Enter instructor's first name" name="fname" value="<?=$fname?>" required>
        </div>
        <div class="mb-3">
            <label for="instructorLastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" id="instructorLastName" placeholder="Enter instructor's last name" name="lname" value="<?=$lname?>" required>
        </div>
        <div class="mb-3">
            <label for="instructorDOB" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="instructorDOB" value="<?=$db?>" name="date_of_birth" required>
        </div>
        <div class="mb-3">
            <label for="instructorEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="instructorEmail" placeholder="Enter instructor's email"  name="email" value="<?=$email?>" required>
        </div>
        <div class="mb-3">
            <label for="instructorUsername" class="form-label">Username</label>
            <div class="input-group">
                <input type="text" class="form-control" id="instructorUsername" placeholder="Enter instructor's username" name="username" value="<?=$uname?>" required>
                <button class="btn btn-outline-secondary" type="button" id="generateUsernameButton" onclick="generateUsername()">Auto Generate</button>
            </div>
        </div>
        <div class="mb-3">
            <label for="instructorPassword" class="form-label">Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="instructorPassword" name="password" placeholder="Enter new password" aria-describedby="generatePasswordButton" required>
                <button class="btn btn-outline-secondary" type="button" id="generatePasswordButton" onclick="generatePassword()">Auto Generate</button>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

</div>


  </div>

  <script>
    function generatePassword() {
        const randomString = Math.random().toString(36).slice(-6);
        document.getElementById('instructorPassword').value = randomString;
        document.getElementById('instructorPassword').type = "text";
    }

    function generateUsername() {
        const randomString = Math.random().toString(36).slice(-3);
        
        let name = document.getElementById('instructorFirstName').value;
        name = name + randomString;
        document.getElementById('instructorUsername').value = name;
    
    }
</script>
</div>
 <!-- Footer -->
<?php include "inc/Footer.php"; ?>

<?php

}else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>