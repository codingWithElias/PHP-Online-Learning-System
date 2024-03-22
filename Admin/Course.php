<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['admin_id'])) {
    
  if (isset($_GET['course_id'])) {
     include "../Controller/Admin/Course.php";
     $_id = Validation::clean($_GET['course_id']);
     $_chapter_id = 1;
     $_topic_id = 1;
     if(isset($_GET['chapter'])) {
      $_chapter_id = Validation::clean($_GET['chapter']);
     }
     if(isset($_GET['topic'])) {
      $_topic_id = Validation::clean($_GET['topic']);
     }
     $psag_exes = pageExes($_id, $_chapter_id);
     if($psag_exes == 0){
         Util::redirect("../404.php", "error", "404");
     }
     
     $course = getById($_id, $_chapter_id, $_topic_id);

     if (empty($course['course']['course_id'])) {
       $em = "Invalid course id";
       Util::redirect("courses.php", "error", $em);
     }
      $num_topic = 0;

    # Header
    $title = "EduPulse - ". $course['course']["title"];
    include "inc/Header.php";
    
?>
<div class="container">
  <!-- NavBar & Profile-->
  <?php include "inc/NavBar.php";?>
  <div class="side-by-side mt-5">
    <div class="l-side shadow p-3">
      <ul class="list-group">
        <?php foreach ($course['chapters'] as $chapter ) { ?>
          <li class="list-group-item">
            <a href="#" class="btn badge-primary"><?=$chapter['title'] ?></a>
             <ul>
              <?php foreach ($course['topics'] as $topic ) {
                if ($chapter['chapter_id'] == $_chapter_id && $topic['chapter_id'] == $_topic_id)  $num_topic++;

                if ($chapter['chapter_id'] == $_chapter_id) $chapter_title = $chapter['title'];
                if ($topic['topic_id'] == $_topic_id) $topic_title = $topic['title'];
                if ($chapter['chapter_id'] != $topic['chapter_id']) continue;
                

               ?>
               <li>
                 <a href="Course.php?course_id=<?=$_id ?>&chapter=<?=$chapter['chapter_id']?>&topic=<?=$topic['topic_id']?>" class="btn badge-primary"><?=$topic["title"]?></a>
               </li>
               <?php } ?>

             </ul>
           </li>
          <?php } ?>
          
        </ul>
    </div>
    <div class="r-side p-5 shadow">
      
      <h5><?=$course['course']["title"]?></h5>
      <h6><?=$chapter_title?> - <?=$topic_title?></h6><hr>
        <div>
           
            <?php 
            if (!empty($course['content']["data"])) {
              echo $course['content']["data"]; 
            } ?>
            
        </div>
    </div>
  </div>
</div>

 <!-- Footer -->
<?php include "inc/Footer.php"; ?>

<?php
}else { 
  $em = "Invalid course id";
  Util::redirect("courses.php", "error", $em);
  }

 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>