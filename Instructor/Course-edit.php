<?php 
  # Header
  $title = "EduPulse - Courses";
  include "inc/Header.php";
?>
<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>

  <h4 class="course-list-title"></h4>
  <div class="card">
    <div class="card-body">
      <form>
          <div class="mb-3">
            <label class="form-label">Course Title:</label>
            <input type="text" 
                   class="form-control"
                   value="Machine Learning Algorithms in Python">
          </div>
          <div class="mb-3">
            <label class="form-label">Course Description</label>
            <textarea name="" class="form-control" rows="3">Machine learning (ML) is a subfield of artificial intelligence (AI) that focuses on developing algorithms and models that enable computers to learn patterns from data and make predictions or decisions without being explicitly programmed.
            </textarea>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>

        <form class="mt-5">
          <h4 id="Chapters">Chapters</h4>
          <div class="mb-3">
            <input type="text" 
                   class="form-control"
                   value="Chapter-1">
          </div>
          <div class="mb-3">
            <input type="text" 
                   class="form-control"
                   value="Chapter-2">
          </div>
        <button type="submit" class="btn btn-primary">Save</button>
        </form>


        <form class="mt-5">
        <h4 id="Chapters">Topic</h4>
        <ul class="list-group mb-3">
          <li class="list-group-item">
              Chapter-1
              <ul class="list-group mb-3">
                 <li class="list-group-item">
                  <div class="mb-3 d-flex align-items-center">
                    <a href="Courses-content-edit.php" > <i class="fa fa-edit fs-4"></i></a>
                    <input type="text" 
                           class="form-control"
                           value="Topic-1">
                  </div>
                  <div class="mb-3 d-flex align-items-center">
                    <a href="Courses-content-edit.php"> <i class="fa fa-edit fs-4"></i></a>
                    <input type="text" 
                           class="form-control"
                           value="Topic-2">
                  </div>
                 </li>
              </ul>
          </li>
          <li class="list-group-item">
              Chapter-2 
              <ul class="list-group mb-3">
                 <li class="list-group-item">
                  <div class="mb-3 d-flex align-items-center">
                    <a href="Courses-content-edit.php" > <i class="fa fa-edit fs-4"></i></a>
                    <input type="text" 
                           class="form-control"
                           value="Topic-1">
                  </div>
                  <div class="mb-3 d-flex align-items-center">
                    <a href="Courses-content-edit.php"> <i class="fa fa-edit fs-4"></i></a>
                    <input type="text" 
                           class="form-control"
                           value="Topic-2">
                  </div>
                 </li>
              </ul>
          </li>
        </ul>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
</div>
</div>
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>