<?php 
session_start();
include "../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
  
    include "../Controller/Instructor/CoursesMaterial.php";
  
    $instructor_id = $_SESSION['instructor_id'];
    $row_count = getCountByInstructorId($instructor_id);

    $page = 1;
    $row_num = 5;
    $offset = 0;
   
    $last_page = ceil($row_count / $row_num);
    if(isset($_GET['page'])){
    if($_GET['page'] > $last_page){
        $page = $last_page;
    }else if($_GET['page'] <= 0){
        $page = 1; 
    }else $page = $_GET['page'];
    }
    if($page != 1) $offset = ($page-1) * $row_num;
    $CoursesMaterials = getSomeCoursesMaterialsByInstructorId($offset, $row_num, $instructor_id);
    # Header
    $title = "EduPulse - Courses Materials ";
    include "inc/Header.php";

?>

<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>
  
  <div class="list-table pt-5">
  
 <h4>All Courses Materials (<?=$row_count?>) <a href="Courses-Materials-add.php" class="btn btn-primary">Upload Material</a></h4><br>
 <?php if ($CoursesMaterials) { ?>
  <table class="table table-bordered">
      <tr>
      <th>File</th>
        <th>Type</th>
        <th>URL</th>
      </tr>
      <?php foreach ($CoursesMaterials as $CoursesMaterial) {?>
      <tr>
      <td><a href="<?=$CoursesMaterial["URL"]?>"><img src="../assets/img/Logo.jpg" width="100"></td>
       <td><?=$CoursesMaterial["type"]?></td>
       <td class="status"> <mark><code class="p-2"><?=$CoursesMaterial["URL"]?></code></td>
      </tr>
      <?php } ?>
  </table>
  <?php if ($last_page > 1 ) { ?>
  <div class="d-flex justify-content-center mt-3 border">
      <?php
            $prev = 1;
            $next = 1;
            $next_btn = true;
            $prev_btn = true;
            if($page <= 1) $prev_btn = false; 
            if($last_page ==  $page) $next_btn = false; 
            if($page > 1) $prev = $page - 1;
            if($page < $last_page) $next = $page + 1;
            
            if ($prev_btn){
            ?>
            <a href="Courses-Materials.php?page=<?=$prev?>" class="btn btn-secondary m-2">Prev</a>
           <?php }else { ?>
            <a href="#" class="btn btn-secondary m-2 disabled">Prev</a>
            
           <?php 
           }
           $push_mid = $page;
           if ($page >= 2)  $push_mid = $page - 1;
           if ($page > 3)  $push_mid = $page - 3;
          
           for($i = $push_mid; $i < 5 + $page; $i++){
            if($i == $page){ ?>
             <a href="Courses-Materials.php?page=<?=$i?>" class="btn btn-success m-2"><?=$i?></a>
           <?php }else{ ?>
             <a href="Courses-Materials.php?page=<?=$i?>" class="btn btn-secondary m-2"><?=$i?></a>

           <?php } 
           if($last_page <= $i)break;

            } 
            if($next_btn){
            ?>
            <a href="Courses-Materials.php?page=<?=$next?>" class="btn btn-secondary m-2">Next</a>
        <?php }else { ?>
           <a href="#" class="btn btn-secondary m-2 disabled" des>Next</a>
        <?php } ?>
  </div>

  <?php }}else { ?>
    <div class="alert alert-info" role="alert">
      0 Course record found in the database
</div>

  <?php } ?>
  </div>



</div>
 <!-- Footer -->
<?php include "inc/Footer.php"; ?>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>