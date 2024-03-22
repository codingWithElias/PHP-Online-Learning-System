<?php 
  # Header
  $title = "Edit Profile - EduPulse";
  include "inc/Header.php";
?>
<div class="container">
  <!-- NavBar & Profile-->
  <?php include "inc/NavBar.php"; ?>

  
    <div class="p-5 shadow">
        <h4 class="">Change Admin Password</h4><hr>
        <form id="ChangePassword"
              method="post"
              action="">
          <div class="mb-3">
            <label class="form-label">Old password</label>
            <input type="password" 
                   class="form-control"
                   value="Elias A">
          </div>
          <div class="mb-3">
            <label for="newPassword" class="form-label">New password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" aria-describedby="generatePasswordButton" required>
                <button class="btn btn-outline-secondary" type="button" id="generatePasswordButton" onclick="generatePassword()">Auto Generate</button>
            </div>
           </div>
           <div class="mb-3">
            <label class="form-label">Confirm new password</label>
            <input type="password" 
                   class="form-control"
                   id="confirmPassword">
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
  </div>
</div>

 <script>
    function generatePassword() {
        const randomString = Math.random().toString(36).slice(-6);
        document.getElementById('newPassword').value = randomString;
        document.getElementById('newPassword').type = "text";

        document.getElementById('confirmPassword').value = randomString;
        document.getElementById('confirmPassword').type = "text";
     }
</script>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>
