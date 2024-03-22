<?php 
session_start();
include "../../Utils/Util.php";
include "../../Utils/Validation.php";
if (isset($_SESSION['username']) &&
    isset($_SESSION['instructor_id'])) {
    
   if (isset($_FILES['profile_picture']['name'])) {
      include "../../Database.php";
      include "../../Models/Instructor.php";

       $db = new Database();
       $conn = $db->connect();
       $instructor = new Instructor($conn);
       $instructor_id = $_SESSION['instructor_id'];
       $old_pp = $instructor->getProfileImg($instructor_id);
       $username = $_SESSION['username'];

       $img_name = $_FILES['profile_picture']['name'];
       $tmp_name = $_FILES['profile_picture']['tmp_name'];
       $error = $_FILES['profile_picture']['error'];

       if($error === 0){
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_to_lc = strtolower($img_ex);

            $allowed_exs = array('jpg', 'jpeg', 'png');
            if(in_array($img_ex_to_lc, $allowed_exs)){
               $new_img_name = uniqid($username, true).'.'.$img_ex_to_lc;
               $img_upload_path = '../../Upload/profile/'.$new_img_name;
               // Delete old profile pic
               $old_pp_des = '../../Upload/profile/'.$old_pp;
               if ($old_pp != "default.jpg") {
                   if(unlink($old_pp_des)){
                     // just deleted
                     move_uploaded_file($tmp_name, $img_upload_path);
                   }else {
                     // error or already deleted
                     move_uploaded_file($tmp_name, $img_upload_path);
                   }
               }else {
                  // default img
                  move_uploaded_file($tmp_name, $img_upload_path);
               }
               // update the Database
               $instructor->updateProfile($instructor_id, $new_img_name);
               $sm = "Changed!";
              Util::redirect("../Profile-Edit.php", "success", $sm);
            }else {
               $em = "You can't upload files of this type";
              Util::redirect("../Profile-Edit.php", "error", $em);
            }
         }else {
            $em = "unknown error occurred!";
           Util::redirect("../Profile-Edit.php", "error", $em);
         }
   }else { 
      $em = "unknown error occurred!";
           Util::redirect("../Profile-Edit.php", "error", $em);
   } 
}else { 
   $em = "First login ";
   Util::redirect("../../login.php", "error", $em);
} 