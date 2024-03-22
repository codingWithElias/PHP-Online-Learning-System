
<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../Controller/Instructor/Course.php";
    $instructor_id = $_SESSION['instructor_id'];
    $courses = getCoursesByInstructorId($instructor_id);

    # Header
    $title = "EduPulse - Create Course ";
    include "inc/Header.php";
    
    $title = $description  ="";
    if (isset($_GET["title"])) {
        $title = Validation::clean($_GET["title"]);
    }
    if (isset($_GET["description"])) {
        $description = Validation::clean($_GET["description"]);
    }
?>
<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>
    <!-- Form for creating a course -->
    <div class="mt-5" style="max-width: 800px;">
    <form id="courseForm" 
          class="mt-5"
          action="Action/course-add.php"
          method="POST"
          enctype="multipart/form-data">
         <?php if (isset($_GET['error'])) { ?>
        <p class="alert alert-warning"><?=Validation::clean($_GET['error'])?></p>
        <?php } ?>
        <?php 
        if (isset($_GET['success'])) { ?>
        <p class="alert alert-success"><?=Validation::clean($_GET['success'])?></p>
        <?php } ?>
        <h2>Create a New Course</h2>
        <div class="mb-3" >
            <label for="courseTitle" class="form-label">Course Title</label>
            <input type="text" 
                   class="form-control" 
                   id="courseTitle" 
                   name="title"
                   placeholder="Enter course title" 
                   value="<?=$title?>"
                   required />
        </div>
        <div class="mb-3">
            <label for="courseDescription" class="form-label">Course Description</label>
            <textarea class="form-control" 
                      id="courseDescription" 
                      rows="4" 
                      name="description" 
                      placeholder="Enter course description" 
                      required ><?=$description?></textarea>
        </div>
        <div class="mb-3">
            <label for="Cover" class="form-label">Cover Image</label>
            <input type="file" class="form-control" 
                   id="Cover" placeholder="Enter course title" 
                   name="cover" />
        </div>

        <button type="submit" class="btn btn-primary">Create Course</button>
    </form>

    <hr>

    <!-- Form for creating chapters linked to a specific course -->
    <form id="Chapter" 
          class="mt-5"
          action="Action/course-chapter-add.php"
          method="POST">
        <h2>Create a New Chapter</h2>
        <div class="mb-3">
            <label for="courseSelect" class="form-label">Select Course</label>
            <select class="form-select" id="courseSelect" name="course_id" required>
                <?php if ($courses) { ?>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?=$course['course_id']?>"><?=$course['title']?></option>
                    <?php }?>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="chapterTitle" class="form-label">Chapter Title</label>
            <input type="text" 
                   class="form-control" 
                   id="chapterTitle" 
                   placeholder="Enter chapter title" 
                   name="chapter_title" 
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Create Chapter</button>
    </form>

    <hr>


    <form id="Topic" 
          class="mt-5"
          action="Action/course-topic-add.php"
          method="POST">
        <h2>Create a New Topic</h2>
        <div class="mb-3">
            <label for="courseSelectTopic" class="form-label">Select Course</label>
            <select class="form-select" id="courseSelectTopic" name="course_id" required>
               <?php if ($courses) { ?>
                    <?php foreach ($courses as $course) { ?>
                        <option value="<?=$course['course_id']?>"><?=$course['title']?></option>
                    <?php }?>
                <?php } ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="chapterSelect" class="form-label">Select Chapter</label>
            <select class="form-select" 
                    id="chapterSelect" 
                    name="chapter_id" 
                    required>
            </select>
        </div>
        <div class="mb-3">
            <label for="topicTitle" class="form-label">Topic Title</label>
            <input type="text" 
                   class="form-control" 
                   id="topicTitle" 
                   placeholder="Enter topic title" 
                   name="topic_title" 
                   required>
        </div>
        <button type="submit" class="btn btn-primary">Create Topic</button>
    </form>
   </div>
</div>


</div>
<script src="../assets/js/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $("#courseSelectTopic").change(function(){
        $courseSelectTopicVal = $("#courseSelectTopic").val();
        $.post("Action/load-chapters.php", 
              {'course_id': $courseSelectTopicVal}, 
              function(data, status){
                    if(status == "success"){
                       
                        if (data != 0) {
                        $("#chapterSelect").html(data);
                    }else {
                         alert("First create Capter");
                         $("#chapterSelect").html("");
                    }
                }
        });
    });
</script>
 <!-- Footer -->
<?php include "inc/Footer.php"; ?>

 

<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>
