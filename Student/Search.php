<?php 
  # Header
  $title = "EduPulse - Search result... for 'key word'";
  include "inc/Header.php";
?>
<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>

  <h4 class="course-list-title">Search result... for "key word"</h4>
  <div class="course-list">

    <?php for ($i=0; $i < 20; $i++) { ?>
    
    <div class="card mb-3 course">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="..." class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
          <a href="Course.php?course_id=3224" class="btn btn-primary">View Course</a>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  </div>
  
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>