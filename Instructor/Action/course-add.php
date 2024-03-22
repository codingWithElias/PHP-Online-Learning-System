<?php 
session_start();
include "../../Utils/Util.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    include "../../Utils/Validation.php";
    include "../../Database.php";
    include "../../Models/Course.php";

   if ($_SERVER['REQUEST_METHOD'] == "POST") {

    

   $title   = Validation::clean($_POST["title"]);
   $description = Validation::clean($_POST["description"]);
   $instructor_id = $_SESSION['instructor_id'];
   $cover = "default_course.jpg";

   $data = "title=".$title."&description=".$description;

    if (!Validation::name($title)) {
        $em = "Invalid Title";
        Util::redirect("../Courses-add.php", "error", $em, $data);
    }else if (!empty($last_name)) {
        $em = "Invalid description";
        Util::redirect("../Courses-add.php", "error", $em, $data);
    }else {
       if (isset($_FILES['cover']['name'])) {
           $img_name = $_FILES['cover']['name'];
           $tmp_name = $_FILES['cover']['tmp_name'];
           $error = $_FILES['cover']['error'];

           if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid("COVER-", true).'.'.$img_ex_to_lc;
               $img_upload_path = '../../Upload/thumbnail/'.$new_img_name;
               move_uploaded_file($tmp_name, $img_upload_path);
               // update the Database
                $cover = $new_img_name;
            }else {
               $em = "You can't upload files of this type";
              Util::redirect("../Courses-add.php", "error", $em);
            }
         }else {
            $em = "unknown error occurred!";
           Util::redirect("../Courses-add.php", "error", $em);
         }
       }

       $db = new Database();
       $conn = $db->connect();
       $course = new Course($conn);

       $course_data = [$title, $description, $instructor_id, $cover];
       $res = $course->insert($course_data);
       if ($res) {
        $sm = "Successfully Created!";
        Util::redirect("../Courses-add.php", "success", $sm);
       }else {
        $em = "An error occurred";
        Util::redirect("../Courses-add.php", "error", $em, $data);
       }
       $conn = null;
    }
    }else {
        $em = "REQUEST Error";
        Util::redirect("../Courses-add.php", "error", $em);
    }
}else {
    $em = "First login ";
    Util::redirect("../../login.php", "error", $em);
}