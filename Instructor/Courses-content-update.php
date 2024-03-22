
<?php 
session_start();
include "../Utils/Util.php";
include "../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../Controller/Instructor/Course.php";

    $instructor_id = $_SESSION['instructor_id'];
    if (!isset($_SESSION['content'])) {
        Util::redirect("Courses-content-add.php", "error", "");
    }
    $content = $_SESSION['content'];
    $content_array = explode(",", $content);
    $cou_id = $content_array[3];
    $chapter_id = $content_array[2];
    $topic_id = $content_array[1];
    $content_id = $content_array[0];

    # Header
    $title = "EduPulse - Create Course ";
    include "inc/Header.php";
    $course = getById($cou_id, $chapter_id, $topic_id);
        // $data = array('content'  => $content,
        //           'course' => $course_data,
        //           'chapters' => $chapters,
        //           'topics'   => $topics );
    foreach ($course['chapters'] as $key => $value) {
        if ($value['chapter_id'] == $chapter_id) {
            $chapter = $value;
        }
    }
    foreach ($course['topics'] as $key => $value) {
        if ($value['topic_id'] == $topic_id) {
            $topic = $value;
        }
    }

   // $chapter = in_array($course['chapters'], haystack);

// print_r($course['chapters']);
// ?>

<div class="container">
  <!-- NavBar -->
  <?php include "inc/NavBar.php"; ?>
<div class="container mt-5">

    <!-- Form for creating course content -->
    <form class="border p-5"
          action="Action/content-update.php"
          method="POST">
        <h4>Create / Edit Course Content</h4>
          <div class="mb-3">
            <label for="courseSelectTopic" class="form-label">Select Course</label>
            <select class="form-select " id="courseSelectTopic" name="course_id" required >
               <option value="<?=$course['course']['course_id']?>"><?=$course['course']['title']?></option>
            </select>
        </div>
        <div class="mb-3">
            <label for="chapterSelect" class="form-label">Select Chapter</label>
            <select class="form-select" 
                    id="chapterSelect" 
                    name="chapter_id" 
                    required >
               <option value="<?=$chapter['chapter_id']?>"><?=$chapter['title']?></option>

            </select>
        </div>
         
          <div class="mb-3">
            <label for="topicSelect" class="form-label">Select Topic</label>
            <select class="form-select" 
                    id="topicSelect" 
                    name="topic_id" 
                    required >
               <option value="<?=$topic['topic_id']?>"><?=$topic['title']?></option>

            </select>
        </div>

        <div class="mb-3">
            <label for="contentEditor" class="form-label">Course Content</label>
            <textarea
                   class="form-control text"
                   name="text"
                   id="contentEditor"><?=$course['content']['data']?></textarea>
                   
        </div>
        <button type="submit" class="btn btn-primary" >Save Content</button>
    </form>

</div>

<script type="text/javascript">
     $(document).ready(function() {
        $('.text').richText();
    });

   
</script>
 <!-- Footer -->
<?php include "inc/Footer.php"; ?>

 

<?php
 }else { 
$em = "First login ";
Util::redirect("../login.php", "error", $em);
} ?>