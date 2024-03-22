<?php 
  # Header
  $course = $arrayName = array('name' => "Intro to Python");
  $title = $course['name']." - EduPulse";
  include "inc/Header.php";
?>
<div class="container">
  <!-- NavBar & Profile-->
  <?php include "inc/NavBar.php";?>
  <div class="side-by-side mt-5">
    <div class="l-side shadow p-3">
      <ul class="list-group">
          <li class="list-group-item">
            <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn badge-primary">Chapter 1</a>
             <ul>
               <li>
                 <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn badge-primary">Topic 1</a>
               </li>
               <li>
                 <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn badge-primary">Topic 1</a>
               </li>
               <li>
                 <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn badge-primary">Topic 1</a>
               </li>
             </ul>
           </li>
           <li class="list-group-item">
             <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=2" class="btn badge-primary">Chapter 2</a>
             <ul>
               <li>
                 <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn badge-primary">Topic 1</a>
               </li>
               <li>
                 <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn badge-primary">Topic 2</a>
               </li>
               <li>
                 <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn badge-primary">Topic 3</a>
               </li>
               
             </ul>
             </li>
               <li class="list-group-item">
               <a href="../certificate.php?certificate_id=555" class="btn ">Certificate</a>
            </li>
          
          
        </ul>
    </div>
    <div class="r-side p-5 shadow">
    <a href="Course-edit.php" class="btn btn-primary">Update Course</a><br><br>
      <h4>Chapter 1</h4>
      <h5>Topic 1</h5>
        <div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="d-flex  justify-content-between mt-5">
               <a href="Courses-Enrolled.php?course_id=435&topic=3&chapter=1" class="btn btn-secondary">Previous</a>
               <a href="Courses-Enrolled.php?course_id=435&topc=4&chapter=1" class="btn btn-success">Next</a>
            </div>
        </div>
    </div>
  </div>
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>